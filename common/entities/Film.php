<?php

namespace common\entities;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "film".
 *
 * @property int $id
 * @property string $name
 * @property string $tagline
 * @property string $image_url
 * @property string $video_url
 * @property string $slug
 * @property string $global_rating
 * @property string $country
 * @property string $year
 * @property string $duration
 * @property string $local_rating
 * @property int $producer_id
 * @property int $mpaa_id
 *
 * @property Comment[] $comments
 * @property Mpaa $mpaa
 * @property ProducerActor $producer
 * @property FilmGenre[] $filmGenres
 * @property Genre[] $genres
 * @property FilmProducerActor[] $filmProducerActors
 * @property ProducerActor[] $producerActors
 * @property UserFilm[] $userFilms
 * @property User[] $users
 */
class Film extends \yii\db\ActiveRecord
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
        return 'film';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tagline', 'image_url', 'video_url'], 'string'],
            [['global_rating', 'year', 'local_rating'], 'number'],
            [['duration'], 'safe'],
            [['producer_id', 'mpaa_id'], 'integer'],
            [['name', 'slug', 'country'], 'string', 'max' => 255],
            [['mpaa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mpaa::className(), 'targetAttribute' => ['mpaa_id' => 'id']],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProducerActor::className(), 'targetAttribute' => ['producer_id' => 'id']],
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
            'tagline' => 'Tagline',
            'image_url' => 'Image Url',
            'video_url' => 'Video Url',
            'slug' => 'Slug',
            'global_rating' => 'Global Rating',
            'country' => 'Country',
            'year' => 'Year',
            'duration' => 'Duration',
            'local_rating' => 'Local Rating',
            'producer_id' => 'Producer ID',
            'mpaa_id' => 'Mpaa ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMpaa()
    {
        return $this->hasOne(Mpaa::className(), ['id' => 'mpaa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(ProducerActor::className(), ['id' => 'producer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmGenres()
    {
        return $this->hasMany(FilmGenre::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])->viaTable('film_genre', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmProducerActors()
    {
        return $this->hasMany(FilmProducerActor::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducerActors()
    {
        return $this->hasMany(ProducerActor::className(), ['id' => 'producer_actor_id'])->viaTable('film_producer_actor', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFilms()
    {
        return $this->hasMany(UserFilm::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_film', ['film_id' => 'id']);
    }
}
