<?php

namespace common\entities;

use Yii;

/**
 * This is the model class for table "award".
 *
 * @property int $id
 * @property string $name
 * @property string $image_url
 * @property string $source_url
 *
 * @property ProducerActorAward[] $producerActorAwards
 * @property ProducerActor[] $producerActors
 */
class Award extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'award';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image_url', 'source_url'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image_url' => 'Image Url',
            'source_url' => 'Source Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducerActorAwards()
    {
        return $this->hasMany(ProducerActorAward::className(), ['award_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducerActors()
    {
        return $this->hasMany(ProducerActor::className(), ['id' => 'producer_actor_id'])->viaTable('producer_actor_award', ['award_id' => 'id']);
    }
}
