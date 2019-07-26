<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\entities\ProducerActorAwardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Producer Actor Awards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producer-actor-award-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Producer Actor Award', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'producer_actor_id',
            'award_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
