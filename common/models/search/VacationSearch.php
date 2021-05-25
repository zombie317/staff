<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vacation;
use common\models\Employee;
use common\models\Firm;

/**
 * VacationSearch represents the model behind the search form of `common\models\Vacation`.
 *
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property string $short_name
 */
class VacationSearch extends Vacation
{
    public $last_name;
    public $first_name;
    public $middle_name;
    public $short_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_employee', 'id_firm', 'id_type_vacation', 'quantity_days'], 'integer'],
            [['number', 'date', 'date_start', 'date_end', 'article'], 'safe'],
            [['last_name', 'first_name', 'middle_name'], 'safe'],
            [['short_name'], 'safe'],
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
        $query = Vacation::find()
            ->joinWith(['employee'])
            ->joinWith(['firm']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['last_name'] = [
            'asc' => [Employee::tableName().'.last_name' => SORT_ASC],
            'desc' => [Employee::tableName().'.last_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['first_name'] = [
            'asc' => [Employee::tableName().'.first_name' => SORT_ASC],
            'desc' => [Employee::tableName().'.first_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['middle_name'] = [
            'asc' => [Employee::tableName().'.middle_name' => SORT_ASC],
            'desc' => [Employee::tableName().'.middle_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['short_name'] = [
            'asc' => [Firm::tableName().'.short_name' => SORT_ASC],
            'desc' => [Firm::tableName().'.short_name' => SORT_DESC],
        ];

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
            ->andFilterWhere(['ilike', 'article', $this->article])
            ->andFilterWhere(['like', 'LOWER(last_name)', mb_strtolower($this->last_name)])
            ->andFilterWhere(['like', 'LOWER(first_name)', mb_strtolower($this->first_name)])
            ->andFilterWhere(['like', 'LOWER(middle_name)', mb_strtolower($this->middle_name)])
            ->andFilterWhere(['like', 'LOWER(short_name)', mb_strtolower($this->short_name)]);

        return $dataProvider;
    }
}
