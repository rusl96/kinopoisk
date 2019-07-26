<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\entities\FilmProducerActorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Film Producer Actors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-producer-actor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Film Producer Actor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'film_id',
            'producer_actor_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
