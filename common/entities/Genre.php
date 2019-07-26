<?php

namespace common\entities;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $source_url
 * @property string $slug
 *
 * @property FilmGenre[] $filmGenres
 * @property Film[] $films
 */
class Genre extends \yii\db\ActiveRecord
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
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'source_url'], 'string'],
            [['name', 'slug'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'source_url' => 'Source Url',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmGenres()
    {
        return $this->hasMany(FilmGenre::className(), ['genre_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('film_genre', ['genre_id' => 'id']);
    }
}
