<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\FilmProducerActor */

$this->title = 'Create Film Producer Actor';
$this->params['breadcrumbs'][] = ['label' => 'Film Producer Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-producer-actor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
