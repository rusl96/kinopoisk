<?php

namespace frontend\controllers;

use common\entities\Film;
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

    public function __construct($id, $module, FilmService $filmService, FilmGenreService $filmGenreService, $config = [])
    {
        $this->filmService = $filmService;
        $this->filmGenreService = $filmGenreService;
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
        $model = $this->filmService->filmRepository->getBySlug($slug);
        /* @var $model Film */
        $filmsIdLikeThis = $this->filmGenreService->getFilmsIdLikeThis($model->id);
        $filmsLikeThis = $this->filmService->filmRepository->getPromoOfFilmsById($filmsIdLikeThis);
        return $this->render('view', [
            'model' => $model,
            'filmsLikeThis' => $filmsLikeThis,
        ]);
    }

}
