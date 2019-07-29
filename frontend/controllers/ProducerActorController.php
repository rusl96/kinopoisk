<?php

namespace frontend\controllers;

use common\entities\Comment;
use frontend\services\CommentService;
use frontend\services\FilmGenreService;
use frontend\services\FilmProducerActorService;
use frontend\services\FilmService;
use frontend\services\GenreService;
use frontend\services\ProducerActorService;
use Yii;
use common\entities\ProducerActor;
use common\entities\ProducerActorSearch;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * ProducerActorController implements the CRUD actions for ProducerActor model.
 */
class ProducerActorController extends Controller
{

    public $producerActorService;
    public $filmProducerActorService;
    public $filmGenreService;
    public $genreService;
    public $filmService;
    public $commentService;

    public function __construct($id, $module, ProducerActorService $producerActorService, FilmProducerActorService $filmProducerActorService, FilmGenreService $filmGenreService, GenreService $genreService, FilmService $filmService, CommentService $commentService, $config = [])
    {
        $this->producerActorService = $producerActorService;
        $this->filmProducerActorService = $filmProducerActorService;
        $this->filmGenreService = $filmGenreService;
        $this->genreService = $genreService;
        $this->filmService = $filmService;
        $this->commentService = $commentService;
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProducerActor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProducerActorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProducerActor model.
     * @param string $slug
     * @return mixed
     */
    public function actionView($slug)
    {
        $producerActor = $this->producerActorService->producerActorRepository->getBySlug($slug);
        /** @var $producerActor ProducerActor */
        $filmIds = $this->producerActorService->getFilmIdsAsConditionToQueryByProducerActorId($producerActor);
        $genreIds = $this->filmGenreService->getGenreIdAsConditionToQueryByFilmIds($filmIds);
        return $this->render('view', [
            'model' => $producerActor,
            'genres' => $this->genreService->genreRepository->getByIds($genreIds),
            'films' => $this->filmService->filmRepository->getByIds($filmIds),
            'newComment' => new Comment(),
            'comments' => $this->commentService->commentRepository->getAllRootCommentsWithProducerActorId($producerActor->id),
        ]);
    }

    /**
     * Adds new comment to film.
     * @param integer $producerActorId
     * @return mixed
     */
    public function actionNewcomment($producerActorId)
    {
        /** @var $comment Comment */
        $comment = $this->commentService->newCommentWithProducerActorId($producerActorId);
        if ($comment->load(Yii::$app->request->post()) && $comment->save()) {
            Yii::$app->session->setFlash('success', "Комментарий добавлен");
        } else Yii::$app->session->setFlash('danger', "Недопустимый комментарий");
        return $this->redirect(['view', 'slug' => $this->producerActorService->getSlugById($producerActorId)]);
    }

    /**
     * Adds new comment to another comment.
     * @param integer $producerActorId
     * @return mixed
     */
    public function actionCommenttocomment($producerActorId)
    {
        $comment = new Comment();
        if ($comment->load(Yii::$app->request->post()) && $comment->save()) {
            Yii::$app->session->setFlash('success', "Комментарий добавлен");
        }
        else Yii::$app->session->setFlash('danger', "Недопустимый комментарий");
        return $this->redirect(['view', 'slug' => $this->producerActorService->getSlugById($producerActorId)]);
    }

    /**
     * Changes comment
     * @param integer $producerActorId
     * @param integer $commentId
     * @return mixed
     */
    public function actionChangecomment($producerActorId, $commentId)
    {
        /**
         * @var $comment Comment
         */
        $comment = $this->commentService->commentRepository->getById($commentId);
        if ($comment->load(Yii::$app->request->post()) && $comment->save()) {
            Yii::$app->session->setFlash('success', "Комментарий изменен");
        }
        else Yii::$app->session->setFlash('danger', "Недопустимый комментарий");
        return $this->redirect(['view', 'slug' => $this->producerActorService->getSlugById($producerActorId)]);
    }

}
