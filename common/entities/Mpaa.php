<?php

namespace common\entities;

use Yii;

/**
 * This is the model class for table "mpaa".
 *
 * @property int $id
 * @property string $name
 * @property string $image_url
 * @property string $source_url
 *
 * @property Film[] $films
 */
class Mpaa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mpaa';
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
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['mpaa_id' => 'id']);
    }
}
