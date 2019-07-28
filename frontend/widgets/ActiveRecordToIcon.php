<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;


class ActiveRecordToIcon extends Widget
{
    public $objects;
    public $classname;

    public function run()
    {
        if ($this->objects) {
            $data = ArrayHelper::toArray($this->objects, [
                'common\entities\\' . $this->classname => [
                    'name',
                    'image_url',
                    'source_url',
                ],
            ]);
            foreach ($data as $item) {
                $result[] = "<a href='{$item['source_url']}'><img src='{$item['image_url']}' class='image-in-detailview' alt='{$item['name']}'></a>";
            }
            return implode(' ', $result);
        } else return 'none';
    }
}

