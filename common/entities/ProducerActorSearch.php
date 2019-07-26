<?php

namespace common\entities;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\entities\ProducerActor;

/**
 * ProducerActorSearch represents the model behind the search form of `common\entities\ProducerActor`.
 */
class ProducerActorSearch extends ProducerActor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'height'], 'integer'],
            [['name', 'birthday', 'image_url', 'function', 'slug'], 'safe'],
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
        $query = ProducerActor::find();

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
            'birthday' => $this->birthday,
            'height' => $this->height,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'image_url', $this->image_url])
            ->andFilterWhere(['like', 'function', $this->function])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
