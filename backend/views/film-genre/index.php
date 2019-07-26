<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\entities\FilmGenreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Film Genres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-genre-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Film Genre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'film_id',
            'genre_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
