<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AnOrder;

/**
 * AnOrderSearch represents the model behind the search form of `backend\models\AnOrder`.
 */
class AnOrderSearch extends AnOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'zip', 'binding_order'], 'integer'],
            [['name', 'surname', 'town', 'street', 'street_no', 'phone', 'email', 'company', 'business_id', 'tax_id', 'items'], 'safe'],
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
        $query = AnOrder::find();

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
            'zip' => $this->zip,
            'binding_order' => $this->binding_order,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'town', $this->town])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'street_no', $this->street_no])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'business_id', $this->business_id])
            ->andFilterWhere(['like', 'tax_id', $this->tax_id])
            ->andFilterWhere(['like', 'items', $this->items]);

        return $dataProvider;
    }
}
