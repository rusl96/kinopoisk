<?php

namespace frontend\widgets;

use yii\base\Widget;

class PromoView extends Widget
{
    public $objects;
    public $linkPart;

    public function run()
    {
            foreach ($this->objects as $item) {
                $result[] = "<a href='/{$this->linkPart}/{$item['slug']}'><img src='{$item['image_url']}' height='300' alt='{$item['name']}'></a>";
            }
            return implode(' ', $result);
    }
}

