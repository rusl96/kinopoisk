<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\Mpaa */

$this->title = 'Update Mpaa: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mpaas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mpaa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
