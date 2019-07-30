<?php
use frontend\assets\KinopoiskAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

/**
 * @var $this yii\web\View
 * @var $comment \common\models\Comments
 * @var integer $level
 * @var $newComment \common\models\Comments
 */
KinopoiskAsset::register($this);
if ($level==0) $style = "margin-left:40px";
else {
    $otstup = 40+50*$level;
    $style = "margin-left:" . $otstup . "px";
}
if ($model->created_by ==  NULL) {
    $imageUrl = 'https://ziser.ru/templates/ziser_2017/dleimages/noavatar.png';
    $authorName = 'Guest';
} else {
    $imageUrl = $model->{$createdByMethod}->{$avatarColumnName};
    $authorName = $model->{$createdByMethod}->{$userNameColumn};
}
?>
<li style="<?= Html::encode($style);?>">
    <i><?= Html::img($imageUrl, ['class' => 'comment-avatar']);?></i>
    <i>| <?= Html::encode($authorName);?></i>
    <i>| <?= Yii::$app->formatter->asDatetime($model->{$createdAtColumnName});?></i>
    <i>| <?php Modal::begin([
                'toggleButton' => ['label' => 'Редактировать', 'class' => 'btn btn-link btn-xs'],
            ]); ?>

            <div class="comments-form">

                <?php
                $form = ActiveForm::begin(['action' => $actionChangeCommentPath . $viewId . '-' . $model->{$idColumn}]);
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
            $form = ActiveForm::begin(['action' => $actionCommentPath . $viewId]);
            ?>

            <?= $form->field($newModel, $viewIdColumn, ['template' => '{input}'])->hiddenInput(['value' => $viewId]) ?>

            <?= $form->field($newModel, $parentIdColumn, ['template' => '{input}'])->hiddenInput(['value' => $model->{$idColumn}]) ?>

            <?= $form->field($newModel, $contentColumn)->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

        <?php Modal::end();?></i>
    <br>
    <hr>
</li>