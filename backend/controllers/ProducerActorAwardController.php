<?php

namespace backend\controllers;

use Yii;
use common\entities\ProducerActorAward;
use common\entities\ProducerActorAwardSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProducerActorAwardController implements the CRUD actions for ProducerActorAward model.
 */
class ProducerActorAwardController extends Controller
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
     * Lists all ProducerActorAward models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProducerActorAwardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProducerActorAward model.
     * @param integer $producer_actor_id
     * @param integer $award_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($producer_actor_id, $award_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($producer_actor_id, $award_id),
        ]);
    }

    /**
     * Creates a new ProducerActorAward model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProducerActorAward();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'producer_actor_id' => $model->producer_actor_id, 'award_id' => $model->award_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProducerActorAward model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $producer_actor_id
     * @param integer $award_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($producer_actor_id, $award_id)
    {
        $model = $this->findModel($producer_actor_id, $award_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'producer_actor_id' => $model->producer_actor_id, 'award_id' => $model->award_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProducerActorAward model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $producer_actor_id
     * @param integer $award_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($producer_actor_id, $award_id)
    {
        $this->findModel($producer_actor_id, $award_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProducerActorAward model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $producer_actor_id
     * @param integer $award_id
     * @return ProducerActorAward the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($producer_actor_id, $award_id)
    {
        if (($model = ProducerActorAward::findOne(['producer_actor_id' => $producer_actor_id, 'award_id' => $award_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
