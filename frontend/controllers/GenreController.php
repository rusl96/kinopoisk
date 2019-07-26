<?php

namespace frontend\controllers;

use frontend\services\GenreService;
use Yii;
use common\entities\Genre;
use common\entities\GenreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GenreController implements the CRUD actions for Genre model.
 */
class GenreController extends Controller
{

    private $genreService;

    public function __construct($id, $module, GenreService $genreService, $config = [])
    {
        $this->genreService = $genreService;
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
     * Lists all Genre models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GenreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Genre model.
     * @param string $slug
     * @return mixed
     */
    public function actionView($slug)
    {
        return $this->render('view', [
            'model' => $this->genreService->genreRepository->getBySlug($slug),
        ]);
    }

}
