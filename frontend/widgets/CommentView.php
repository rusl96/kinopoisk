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
    public $articleIdColumn;
    public $idColumn;
    public $parentIdColumn;
    public $actionCommentPath;
    public $actionChangeCommentPath;

    public function run()
    {
        return $this->render('tree', [
            'models' => $this->models,
            'newCommentModel' => $this->newCommentModel,
            'childrenMethod' => $this->childrenMethod,
            'createdByMethod' => $this->createdByMethod,
            'userNameColumn' => $this->userNameColumn,
            'avatarColumnName' => $this->avatarColumnName,
            'createdAtColumnName' => $this->createdAtColumnName,
            'contentColumn' => $this->contentColumn,
            'articleIdColumn' => $this->articleIdColumn,
            'idColumn' => $this->idColumn,
            'parentIdColumn' => $this->parentIdColumn,
            'actionCommentPath' => $this->actionCommentPath,
            'actionChangeCommentPath' => $this->actionChangeCommentPath,
            'level' => 0]);
    }
}

