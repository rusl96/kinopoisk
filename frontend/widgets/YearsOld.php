<?php

namespace frontend\widgets;

use DateTime;
use yii\base\Widget;
use yii\helpers\Html;

class YearsOld extends Widget
{
    public $birthday;

    public function run()
    {
        $datetime = new DateTime($this->birthday);
        $interval = $datetime->diff(new DateTime(date("Y-m-d")));
        return $interval->format("%Y");
    }
}

