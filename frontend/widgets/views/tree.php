<?php
/* @var  $models \yii\db\ActiveRecord[]
 * @var integer $level
 */

foreach ($models as $model) {
    echo $this->render('_comment', [
        'model' => $model,
        'newCommentModel' => $newCommentModel,
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
        'level' => $level
    ]);
    if ($children = $model->{$childrenMethod}) {
        $level++;
        echo $this->render('tree', [
            'models' => $children,
            'newCommentModel' => $newCommentModel,
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
            'level' => $level
        ]);
        $level--;
    }
}