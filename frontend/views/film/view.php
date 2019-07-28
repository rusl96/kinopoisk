<?php

use frontend\assets\KinopoiskAsset;
use frontend\widgets\ActiveRecordsToLink;
use frontend\widgets\CommentView;use frontend\widgets\PromoView;use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\entities\Film */
/* @var $filmsLikeThis array */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
KinopoiskAsset::register($this);
?>
<div class="film-view">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <div class="row">

        <div class="col-6 col-md-3">
        <?= Html::img($model->image_url, ['class' => 'image-in-view']) ?>
            <br>
            <?= Html::a('Watch trailer', $model->video_url, ['class' => 'btn btn-info image-in-view']) ?>
        </div>

        <div class="col-12 col-md-8">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'country',
                'year',
                'tagline:ntext',
                [
                    'label' => 'Producer',
                    'format' => 'raw',
                    'value' => ActiveRecordsToLink::widget([
                        'objects' => $model->producer,
                        'classname' => 'ProducerActor',
                        'linkPart' => 'producer-actor'
                    ])
                ],
                [
                    'label' => 'Actors',
                    'format' => 'raw',
                    'value' => ActiveRecordsToLink::widget([
                        'objects' => $model->producerActors,
                        'classname' => 'ProducerActor',
                        'linkPart' => 'producer-actor'
                    ])
                ],
                [
                    'label' => 'MPAA rating',
                    'value' => $model->mpaa->image_url,
                    'format' => ['image',['class'=>'image-in-detailview']],
                ],
                'duration',
                [
                    'label' => 'Local rating',
                    'format' => 'raw',
                    'value' => Progress::widget([
                        'percent' => 20*$model->local_rating,
                        'barOptions' => ['class' => 'rating'],
                        'options' => ['class' => 'rating-width']
                    ]),
                ],

            ],
        ]) ?>
        </div>

    </div>

    <br>

    <h2 align="center">Films like this:</h2>
    <p align="center">
        <?= PromoView::widget([
            'objects' => $filmsLikeThis,
            'linkPart' => 'film'
        ]) ?>
    </p>

    <br>

    <?= CommentView::widget([
        'models' => $comments,
        'newModel' => $newComment,
        'viewId' => $model->id,
        'viewIdColumn' => 'film_id',
        'actionNewCommentPath' => '/film/newcomment/',
        'actionCommentPath' => '/film/commenttocomment/',
        'actionChangeCommentPath' => '/film/changecomment/',
    ])?>

</div>


