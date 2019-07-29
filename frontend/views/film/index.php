<?php

use frontend\assets\KinopoiskAsset;
use frontend\widgets\ActiveRecordsToLink;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\entities\FilmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

KinopoiskAsset::register($this);
$this->title = 'Films';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Promo',
                'attribute' => 'image_url',
                'format' => ['image',['class'=>'image-in-gridview']],
                'headerOptions' => ['class'=>'image-in-gridview'],
                'filter' => false,
            ],
            [
                'attribute' => 'name',
                'value' => function($data) {
                    return "<a href='/film/$data->slug'> $data->name</a>";
                },
                'format' => 'raw'
            ],
            'global_rating',
            'country',
            'year',
            ['label' => 'Genres',
                'format' => 'raw',
                'value' => function($data) {
                    $links = ActiveRecordsToLink::widget([
                        'objects' => $data->genres,
                        'classname' => 'Genre',
                        'linkPart' => 'genre']);
                    return $links;
                },
            ],
        ],
    ]); ?>


</div>
