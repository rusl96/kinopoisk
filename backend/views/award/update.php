<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\Award */

$this->title = 'Update Award: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Awards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="award-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
