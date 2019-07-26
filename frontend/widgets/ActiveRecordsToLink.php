<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;

class ActiveRecordsToLink extends Widget
{
    public $objects;
    public $classname;
    public $linkPart;

    public function run()
    {
        $data = ArrayHelper::toArray($this->objects, [
            'common\entities\\' . $this->classname => [
                'name',
                'slug',
            ],
        ]);
        if(isset($data['0'])) {
            foreach ($data as $item) {
                $result[] = "<a href='/{$this->linkPart}/{$item['slug']}'> {$item['name']}</a>";
            }
            return implode(', ', $result);
        } else return "<a href='/{$this->linkPart}/{$data['slug']}'> {$data['name']}</a>";

    }
}

