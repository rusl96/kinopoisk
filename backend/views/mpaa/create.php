<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\Mpaa */

$this->title = 'Create Mpaa';
$this->params['breadcrumbs'][] = ['label' => 'Mpaas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpaa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
