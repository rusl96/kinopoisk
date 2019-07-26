<?php

namespace common\entities;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\entities\ProducerActorAward;

/**
 * ProducerActorAwardSearch represents the model behind the search form of `common\entities\ProducerActorAward`.
 */
class ProducerActorAwardSearch extends ProducerActorAward
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['producer_actor_id', 'award_id'], 'integer'],
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
        $query = ProducerActorAward::find();

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
            'producer_actor_id' => $this->producer_actor_id,
            'award_id' => $this->award_id,
        ]);

        return $dataProvider;
    }
}
