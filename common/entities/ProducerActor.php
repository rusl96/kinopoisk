<?php

namespace common\entities;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "producer_actor".
 *
 * @property int $id
 * @property string $name
 * @property string $birthday
 * @property string $birthplace
 * @property int $height
 * @property string $image_url
 * @property string $function
 * @property string $slug
 *
 * @property Comment[] $comments
 * @property Film[] $films
 * @property FilmProducerActor[] $filmProducerActors
 * @property Film[] $films0
 * @property ProducerActorAward[] $producerActorAwards
 * @property Award[] $awards
 */
class ProducerActor extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producer_actor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthday'], 'safe'],
            [['birthplace'], 'string'],
            [['height'], 'integer'],
            [['image_url'], 'string'],
            [['name', 'function', 'slug'], 'string', 'max' => 255],
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
            'birthday' => 'Birthday',
            'birthplace' => 'Birthplace',
            'height' => 'Height',
            'image_url' => 'Image Url',
            'function' => 'Function',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['producer_actor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['producer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmProducerActors()
    {
        return $this->hasMany(FilmProducerActor::className(), ['producer_actor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms0()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('film_producer_actor', ['producer_actor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducerActorAwards()
    {
        return $this->hasMany(ProducerActorAward::className(), ['producer_actor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAwards()
    {
        return $this->hasMany(Award::className(), ['id' => 'award_id'])->viaTable('producer_actor_award', ['producer_actor_id' => 'id']);
    }
}
