<?php

namespace common\entities;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\entities\FilmProducerActor;

/**
 * FilmProducerActorSearch represents the model behind the search form of `common\entities\FilmProducerActor`.
 */
class FilmProducerActorSearch extends FilmProducerActor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'producer_actor_id'], 'integer'],
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
        $query = FilmProducerActor::find();

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
            'film_id' => $this->film_id,
            'producer_actor_id' => $this->producer_actor_id,
        ]);

        return $dataProvider;
    }
}
