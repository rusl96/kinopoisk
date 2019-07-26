<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class GridImage extends Widget
{
    public $data;

    public function run()
    {
        return Html::img($data->image_url,[
        'alt' => $data->name,
        'style' => 'width:150px;'
    ]);
    }
}

