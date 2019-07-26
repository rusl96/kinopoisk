<?php

use frontend\assets\MyAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

/**
 * @var $this yii\web\View
 * @var $comment \common\models\Comments
 * @var integer $level
 * @var $newComment \common\models\Comments
 */
MyAsset::register($this);
if ($level==0) $style = "margin-left:40px";
else {
    $otstup = 40+50*$level;
    $style = "margin-left:" . $otstup . "px";
}
?>
<li style="<?= Html::encode($style);?>">
    <i><?= Html::img($model->{$createdByMethod}->{$avatarColumnName}, ['class' => 'perfectavatar']);?></i>
    <i>| <?= Html::encode($model->{$createdByMethod}->{$userNameColumn});?></i>
    <i>| <?= Yii::$app->formatter->asDatetime($model->{$createdAtColumnName});?></i>
    <i>| <?php Modal::begin([
                'toggleButton' => ['label' => 'Редактировать', 'class' => 'btn btn-link btn-xs'],
            ]); ?>

            <div class="comments-form">

                <?php
                $form = ActiveForm::begin(['action' => $actionChangeCommentPath . $model->{$idColumn}]);
                ?>

                <?= $form->field($model, $contentColumn)->textarea(['rows' => 6]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

           <?php Modal::end();?></i>
    <br>
    <p style="margin-left:73px">
        <?= Html::encode($model->{$contentColumn}); ?>
    </p>
    <i style="margin-left:73px">  <?php Modal::begin([
            'toggleButton' => ['label' => 'Ответить', 'class' => 'btn btn-info btn-xs'],
        ]); ?>

        <div class="comments-form">

            <?php
            $form = ActiveForm::begin(['action' => $actionCommentPath . $model->{$articleIdColumn}]);
            ?>

            <?= $form->field($newCommentModel, $articleIdColumn, ['template' => '{input}'])->hiddenInput(['value' => $model->{$articleIdColumn}]) ?>

            <?= $form->field($newCommentModel, $parentIdColumn, ['template' => '{input}'])->hiddenInput(['value' => $model->{$idColumn}]) ?>

            <?= $form->field($newCommentModel, $contentColumn)->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

        <?php Modal::end();?></i>
    <br>
    <hr>
</li>