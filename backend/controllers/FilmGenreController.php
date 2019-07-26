<?php

namespace backend\controllers;

use Yii;
use common\entities\FilmGenre;
use common\entities\FilmGenreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FilmGenreController implements the CRUD actions for FilmGenre model.
 */
class FilmGenreController extends Controller
{
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
     * Lists all FilmGenre models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilmGenreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FilmGenre model.
     * @param integer $film_id
     * @param integer $genre_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($film_id, $genre_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($film_id, $genre_id),
        ]);
    }

    /**
     * Creates a new FilmGenre model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FilmGenre();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'film_id' => $model->film_id, 'genre_id' => $model->genre_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FilmGenre model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $film_id
     * @param integer $genre_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($film_id, $genre_id)
    {
        $model = $this->findModel($film_id, $genre_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'film_id' => $model->film_id, 'genre_id' => $model->genre_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FilmGenre model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $film_id
     * @param integer $genre_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($film_id, $genre_id)
    {
        $this->findModel($film_id, $genre_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FilmGenre model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $film_id
     * @param integer $genre_id
     * @return FilmGenre the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($film_id, $genre_id)
    {
        if (($model = FilmGenre::findOne(['film_id' => $film_id, 'genre_id' => $genre_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
