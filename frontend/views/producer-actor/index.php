<?php

use frontend\assets\KinopoiskAsset;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\entities\ProducerActorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Producer Actors';
$this->params['breadcrumbs'][] = $this->title;
KinopoiskAsset::register($this);
?>
<div class="producer-actor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Face',
                'attribute' => 'image_url',
                'format' => ['image',['class'=>'image-in-gridview']],
                'headerOptions' => ['class'=>'image-in-gridview'],
                'filter' => false,
            ],
            [
                'attribute' => 'name',
                'value' => function($data) {
                    return "<a href='/producer-actor/$data->slug'> $data->name</a>";
                },
                'format' => 'raw'
            ],
            'birthday',
            'height',
            'function',
        ],
    ]); ?>


</div>
