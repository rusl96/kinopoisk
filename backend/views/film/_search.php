<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\entities\FilmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="film-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'tagline') ?>

    <?= $form->field($model, 'image_url') ?>

    <?= $form->field($model, 'video_url') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'global_rating') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'local_rating') ?>

    <?php // echo $form->field($model, 'producer_id') ?>

    <?php // echo $form->field($model, 'mpaa_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
