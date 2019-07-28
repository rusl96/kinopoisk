<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $newCommentModel common\entities\Comment */
/* @var $form yii\widgets\ActiveForm */
/* @var $articleId int*/
/* @var $actionNewCommentPath string*/
/* @var $contentColumn string*/
/* @var $models \yii\db\ActiveRecord[]*/
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(['action' => $actionNewCommentPath . $viewId]); ?>
    <div class="row">
    <div class="col-lg-6">
    <?= $form->field($newModel, $contentColumn)->textarea(['rows' => 5])->label("<h4>Add new comment:</h4>"); ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
    if ($models) {
        echo $this->render('tree', [
            'models' => $models,
            'newModel' => $newModel,
            'childrenMethod' => $childrenMethod,
            'createdByMethod' => $createdByMethod,
            'userNameColumn' => $userNameColumn,
            'avatarColumnName' => $avatarColumnName,
            'createdAtColumnName' => $createdAtColumnName,
            'contentColumn' => $contentColumn,
            'viewId' => $viewId,
            'viewIdColumn' => $viewIdColumn,
            'idColumn' => $idColumn,
            'parentIdColumn' => $parentIdColumn,
            'actionCommentPath' => $actionCommentPath,
            'actionChangeCommentPath' => $actionChangeCommentPath,
            'level' => 0]);
    }
    ?>
