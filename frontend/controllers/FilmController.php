<?php

namespace frontend\controllers;

use common\entities\Comment;
use common\entities\Film;
use frontend\services\CommentService;
use frontend\services\FilmGenreService;
use Yii;
use frontend\services\FilmService;
use common\entities\FilmSearch;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * FilmController implements the CRUD actions for Film model.
 */
class FilmController extends Controller
{

    private $filmService;
    private $filmGenreService;
    private $commentService;

    public function __construct($id, $module, FilmService $filmService, FilmGenreService $filmGenreService, CommentService $commentService, $config = [])
    {
        $this->filmService = $filmService;
        $this->filmGenreService = $filmGenreService;
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
     * Lists all Film models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Film model.
     * @param string $slug
     * @return mixed
     */
    public function actionView($slug)
    {
        $film = $this->filmService->filmRepository->getBySlug($slug);
        /* @var $film Film */
        $filmsIdLikeThis = $this->filmGenreService->getFilmsIdLikeThis($film->id);
        $filmsLikeThis = $this->filmService->filmRepository->getPromoOfFilmsById($filmsIdLikeThis);
        return $this->render('view', [
            'model' => $film,
            'filmsLikeThis' => $filmsLikeThis,
            'newComment' => new Comment(),
            'comments' => $this->commentService->commentRepository->getAllRootCommentsWithFilmId($film->id),
        ]);
    }

    /**
     * Adds new comment to film.
     * @param integer $filmId
     * @return mixed
     */
    public function actionNewcomment($filmId)
    {
        /** @var $comment Comment */
        $comment = $this->commentService->newCommentWithFilmId($filmId);
        if ($comment->load(Yii::$app->request->post()) && $comment->save()) {
            Yii::$app->session->setFlash('success', "Комментарий добавлен");
        } else Yii::$app->session->setFlash('danger', "Недопустимый комментарий");
        return $this->redirect(['view', 'slug' => $this->filmService->getSlugById($filmId)]);
    }

    /**
     * Adds new comment to another comment.
     * @param integer $filmId
     * @return mixed
     */
    public function actionCommenttocomment($filmId)
    {
        $comment = new Comment();
        if ($comment->load(Yii::$app->request->post()) && $comment->save()) {
            Yii::$app->session->setFlash('success', "Комментарий добавлен");
        }
        else Yii::$app->session->setFlash('danger', "Недопустимый комментарий");
        return $this->redirect(['view', 'slug' => $this->filmService->getSlugById($filmId)]);
    }

    /**
     * Changes comment
     * @param integer $filmId
     * @param integer $commentId
     * @return mixed
     */
    public function actionChangecomment($filmId, $commentId)
    {
        /**
         * @var $comment Comment
         */
        $comment = $this->commentService->commentRepository->getById($commentId);
        if ($comment->load(Yii::$app->request->post()) && $comment->save()) {
            Yii::$app->session->setFlash('success', "Комментарий изменен");
        }
        else Yii::$app->session->setFlash('danger', "Недопустимый комментарий");
        return $this->redirect(['view', 'slug' => $this->filmService->getSlugById($filmId)]);
    }

}
