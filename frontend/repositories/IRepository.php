<?php

namespace frontend\repositories;

use yii\db\ActiveRecord;
use yii\db\Query;
use yii\web\NotFoundHttpException;

class IRepository
{
    /**
     * @var $type ActiveRecord
     */
    protected $type;

    protected function getBy(array $condition): ActiveRecord
    {
        $object = $this->type::find()->andWhere($condition)->limit(1)->one();
        return $this->found($object);
    }

    protected function getColumnsFromBy(array $columns, array $condition, string $tableName): array
    {
        $object = (new Query())->select($columns)->from($tableName)->where($condition)->all();
        return $this->found($object);
    }

    /**
     * @param $id
     * @return ActiveRecord
     */
    public function getById($id): ActiveRecord
    {
        return $this->getBy(['id' => $id]);
    }

    public function getByIds(array $ids)
    {
        return $this->getSome(['id' => $ids]);
    }

    /**
     * @param $slug
     * @return ActiveRecord
     */
    public function getBySlug($slug): ActiveRecord
    {
        return $this->getBy(['slug' => $slug]);
    }

    protected function found($object)
    {
        if (!$object) {
            throw new NotFoundHttpException(($this->type::className())." is not found");
        }
        return $object;
    }
    protected function getSome(array $condition): array
    {
        $objects = $this->type::find()->andWhere($condition)->all();
        return $this->found($objects);
    }
    protected function makeQueryBy(array $condition)
    {
        return $this->type->find()->where($condition);
    }
}