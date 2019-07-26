<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\FilmGenre */

$this->title = 'Update Film Genre: ' . $model->film_id;
$this->params['breadcrumbs'][] = ['label' => 'Film Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->film_id, 'url' => ['view', 'film_id' => $model->film_id, 'genre_id' => $model->genre_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="film-genre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
