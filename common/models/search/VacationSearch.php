<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vacation;

/**
 * VacationSearch represents the model behind the search form of `common\models\Vacation`.
 */
class VacationSearch extends Vacation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_employee', 'id_firm', 'id_type_vacation', 'quantity_days'], 'integer'],
            [['number', 'date', 'date_start', 'date_end', 'article'], 'safe'],
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
        $query = Vacation::find();

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
            'date' => $this->date,
            'id_employee' => $this->id_employee,
            'id_firm' => $this->id_firm,
            'id_type_vacation' => $this->id_type_vacation,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'quantity_days' => $this->quantity_days,
        ]);

        $query->andFilterWhere(['ilike', 'number', $this->number])
            ->andFilterWhere(['ilike', 'article', $this->article]);

        return $dataProvider;
    }
}
