<?php

namespace common\entities;

use Yii;

/**
 * This is the model class for table "film_producer_actor".
 *
 * @property int $film_id
 * @property int $producer_actor_id
 *
 * @property Film $film
 * @property ProducerActor $producerActor
 */
class FilmProducerActor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film_producer_actor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'producer_actor_id'], 'required'],
            [['film_id', 'producer_actor_id'], 'integer'],
            [['film_id', 'producer_actor_id'], 'unique', 'targetAttribute' => ['film_id', 'producer_actor_id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'id']],
            [['producer_actor_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProducerActor::className(), 'targetAttribute' => ['producer_actor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'film_id' => 'Film ID',
            'producer_actor_id' => 'Producer Actor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducerActor()
    {
        return $this->hasOne(ProducerActor::className(), ['id' => 'producer_actor_id']);
    }
}
