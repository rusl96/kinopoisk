<?php

use frontend\assets\KinopoiskAsset;
use frontend\widgets\ActiveRecordsToLink;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\entities\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
KinopoiskAsset::register($this);
?>
<div class="user-view">

    <div class="row">
        <div class="col-6 col-md-3">

            <?= Html::img($model->image_url, ['class' => 'profile-avatar']) ?>

        </div>
        <div class="col-12 col-md-9">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'username',
                    'email:email',
                    ['attribute'=>'created_at',
                        'format'=>'datetime'],
                    ['attribute'=>'updated_at',
                        'format'=>'datetime'],
                    'image_url:ntext',
                ],
            ]) ?>

        </div>



    </div>



    <p>
        <?= Html::a('Update profile', ['update', 'id' => $model->id], ['class' => 'btn btn-primary profile-avatar']) ?>
    </p>

    <br>

    <h3 align="center">Favorite films:</h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            [
//                'label' => 'Promo',
//                'attribute' => 'image_url',
//                'format' => ['image',['class'=>'image-in-gridview']],
//                'headerOptions' => ['class'=>'image-in-gridview'],
//                'filter' => false,
//            ],
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
