<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;

class PromoView extends Widget
{
    public $objects;
    public $linkPart;
    public $classname;
    public $amountOfPromos;

    public function run()
    {
        $data = ArrayHelper::toArray($this->objects, [
            'common\entities\\' . $this->classname => [
                'name',
                'slug',
                'image_url',
                'global_rating',
                'local_rating',
            ],
        ]);
        ArrayHelper::multisort($data, ['global_rating', 'local_rating'], SORT_DESC);
        for ($i = 0; $i < $this->amountOfPromos; $i++) {
                $result[] = "<a href='/{$this->linkPart}/{$data[$i]['slug']}'><img src='{$data[$i]['image_url']}' height='300' alt='{$data[$i]['name']}'></a>";
            }
        return implode(' ', $result);
    }
}

