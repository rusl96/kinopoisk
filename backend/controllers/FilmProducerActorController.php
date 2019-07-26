<?php

namespace backend\controllers;

use Yii;
use common\entities\FilmProducerActor;
use common\entities\FilmProducerActorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FilmProducerActorController implements the CRUD actions for FilmProducerActor model.
 */
class FilmProducerActorController extends Controller
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
     * Lists all FilmProducerActor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilmProducerActorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FilmProducerActor model.
     * @param integer $film_id
     * @param integer $producer_actor_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($film_id, $producer_actor_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($film_id, $producer_actor_id),
        ]);
    }

    /**
     * Creates a new FilmProducerActor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FilmProducerActor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'film_id' => $model->film_id, 'producer_actor_id' => $model->producer_actor_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FilmProducerActor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $film_id
     * @param integer $producer_actor_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($film_id, $producer_actor_id)
    {
        $model = $this->findModel($film_id, $producer_actor_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'film_id' => $model->film_id, 'producer_actor_id' => $model->producer_actor_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FilmProducerActor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $film_id
     * @param integer $producer_actor_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($film_id, $producer_actor_id)
    {
        $this->findModel($film_id, $producer_actor_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FilmProducerActor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $film_id
     * @param integer $producer_actor_id
     * @return FilmProducerActor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($film_id, $producer_actor_id)
    {
        if (($model = FilmProducerActor::findOne(['film_id' => $film_id, 'producer_actor_id' => $producer_actor_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
