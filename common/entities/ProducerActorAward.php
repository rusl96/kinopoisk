<?php

namespace common\entities;

use Yii;

/**
 * This is the model class for table "producer_actor_award".
 *
 * @property int $producer_actor_id
 * @property int $award_id
 *
 * @property Award $award
 * @property ProducerActor $producerActor
 */
class ProducerActorAward extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producer_actor_award';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['producer_actor_id', 'award_id'], 'required'],
            [['producer_actor_id', 'award_id'], 'integer'],
            [['producer_actor_id', 'award_id'], 'unique', 'targetAttribute' => ['producer_actor_id', 'award_id']],
            [['award_id'], 'exist', 'skipOnError' => true, 'targetClass' => Award::className(), 'targetAttribute' => ['award_id' => 'id']],
            [['producer_actor_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProducerActor::className(), 'targetAttribute' => ['producer_actor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'producer_actor_id' => 'Producer Actor ID',
            'award_id' => 'Award ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAward()
    {
        return $this->hasOne(Award::className(), ['id' => 'award_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducerActor()
    {
        return $this->hasOne(ProducerActor::className(), ['id' => 'producer_actor_id']);
    }
}
