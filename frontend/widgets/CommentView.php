<?php

namespace common\components;

use yii\base\Widget;

class CommentView extends Widget
{
    public $models;
    public $newCommentModel;
    public $childrenMethod;
    public $createdByMethod;
    public $userNameColumn;
    public $avatarColumnName;
    public $createdAtColumnName;
    public $contentColumn;
    public $viewId;
    public $viewIdColumn;
    public $idColumn;
    public $parentIdColumn;
    public $actionNewCommentPath;
    public $actionCommentPath;
    public $actionChangeCommentPath;

    public function run()
    {
        return $this->render('addCommentForm', [
            'models' => $this->models,
            'newCommentModel' => $this->newCommentModel,
            'childrenMethod' => $this->childrenMethod,
            'createdByMethod' => $this->createdByMethod,
            'userNameColumn' => $this->userNameColumn,
            'avatarColumnName' => $this->avatarColumnName,
            'createdAtColumnName' => $this->createdAtColumnName,
            'contentColumn' => $this->contentColumn,
            'viewId' => $this->viewId,
            'viewIdColumn' => $this->viewIdColumn,
            'idColumn' => $this->idColumn,
            'parentIdColumn' => $this->parentIdColumn,
            'actionNewCommentPath' => $this->actionNewCommentPath,
            'actionCommentPath' => $this->actionCommentPath,
            'actionChangeCommentPath' => $this->actionChangeCommentPath,
            'level' => 0]);
    }
}

