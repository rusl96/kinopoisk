<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\ProducerActorAward */

$this->title = 'Update Producer Actor Award: ' . $model->producer_actor_id;
$this->params['breadcrumbs'][] = ['label' => 'Producer Actor Awards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->producer_actor_id, 'url' => ['view', 'producer_actor_id' => $model->producer_actor_id, 'award_id' => $model->award_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="producer-actor-award-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
