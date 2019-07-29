<?php

use frontend\assets\KinopoiskAsset;
use frontend\widgets\ActiveRecordsToLink;
use frontend\widgets\ActiveRecordToIcon;
use frontend\widgets\CommentView;use frontend\widgets\PromoView;
use frontend\widgets\YearsOld;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\entities\ProducerActor */
/* @var $filmsLikeThis array */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Producer-actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
KinopoiskAsset::register($this);
?>
<div class="film-view">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <div class="row">

        <div class="col-6 col-md-3">

        <?= Html::img($model->image_url, ['class' => 'image-in-view']) ?>

        </div>

        <div class="col-12 col-md-8">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'birthday',
                    'value' => $model->birthday . ' (' . YearsOld::widget(['birthday' => $model->birthday]) . ')',
                ],
                'birthplace',
                'height',
                [
                    'label' => 'Genres',
                    'format' => 'raw',
                    'value' => ActiveRecordsToLink::widget([
                        'objects' => $genres,
                        'classname' => 'Genre',
                        'linkPart' => 'genre'
                    ])
                ],
                [
                    'label' => 'Films',
                    'format' => 'raw',
                    'value' => ActiveRecordsToLink::widget([
                        'objects' => $films,
                        'classname' => 'Film',
                        'linkPart' => 'film'
                    ])
                ],
                [
                    'label' => 'Amount of films',
                    'value' => count($films),
                    'format' => 'raw',
                ],
                [
                    'label' => 'Awards',
                    'format' => 'raw',
                    'value' => ActiveRecordToIcon::widget([
                        'objects' => $model->awards,
                        'classname' => 'Award',
                    ])
                ],

            ],
        ]) ?>
        </div>

    </div>

    <br>

    <h2 align="center">Actors films:</h2>
    <p align="center">
        <?= PromoView::widget([
            'objects' => $films,
            'linkPart' => 'film'
        ]) ?>
    </p>

    <br>

    <?= CommentView::widget([
        'models' => $comments,
        'newModel' => $newComment,
        'viewId' => $model->id,
        'viewIdColumn' => 'producer_actor_id',
        'actionNewCommentPath' => '/producer-actor/newcomment/',
        'actionCommentPath' => '/producer-actor/commenttocomment/',
        'actionChangeCommentPath' => '/producer-actor/changecomment/',
    ])?>

</div>


