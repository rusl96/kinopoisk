<?php

namespace frontend\entities;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\entities\Film;

/**
 * FilmSearch represents the model behind the search form of `common\entities\Film`.
 */
class FilmSearch extends Film
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'producer_id', 'mpaa_id'], 'integer'],
            [['name', 'tagline', 'image_url', 'slug', 'country', 'duration'], 'safe'],
            [['global_rating', 'year', 'local_rating'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Film::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'global_rating' => $this->global_rating,
            'year' => $this->year,
            'duration' => $this->duration,
            'local_rating' => $this->local_rating,
            'producer_id' => $this->producer_id,
            'mpaa_id' => $this->mpaa_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tagline', $this->tagline])
            ->andFilterWhere(['like', 'image_url', $this->image_url])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}
