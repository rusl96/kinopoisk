<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\entities\FilmProducerActor */

$this->title = $model->film_id;
$this->params['breadcrumbs'][] = ['label' => 'Film Producer Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="film-producer-actor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'film_id' => $model->film_id, 'producer_actor_id' => $model->producer_actor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'film_id' => $model->film_id, 'producer_actor_id' => $model->producer_actor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'film_id',
            'producer_actor_id',
        ],
    ]) ?>

</div>
