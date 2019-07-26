<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\entities\ProducerActorAward */

$this->title = $model->producer_actor_id;
$this->params['breadcrumbs'][] = ['label' => 'Producer Actor Awards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="producer-actor-award-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'producer_actor_id' => $model->producer_actor_id, 'award_id' => $model->award_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'producer_actor_id' => $model->producer_actor_id, 'award_id' => $model->award_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'producer_actor_id',
            'award_id',
        ],
    ]) ?>

</div>
