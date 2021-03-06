<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\entities\ProducerActorAward */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producer-actor-award-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'producer_actor_id')->textInput() ?>

    <?= $form->field($model, 'award_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
