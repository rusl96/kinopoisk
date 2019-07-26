<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\ProducerActor */

$this->title = 'Create Producer Actor';
$this->params['breadcrumbs'][] = ['label' => 'Producer Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producer-actor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
