<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\FilmProducerActor */

$this->title = 'Update Film Producer Actor: ' . $model->film_id;
$this->params['breadcrumbs'][] = ['label' => 'Film Producer Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->film_id, 'url' => ['view', 'film_id' => $model->film_id, 'producer_actor_id' => $model->producer_actor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="film-producer-actor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
