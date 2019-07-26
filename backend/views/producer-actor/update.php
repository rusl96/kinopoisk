<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\ProducerActor */

$this->title = 'Update Producer Actor: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Producer Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="producer-actor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
