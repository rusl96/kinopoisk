<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\ProducerActorAward */

$this->title = 'Create Producer Actor Award';
$this->params['breadcrumbs'][] = ['label' => 'Producer Actor Awards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producer-actor-award-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
