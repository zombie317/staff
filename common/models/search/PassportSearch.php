<?php

namespace common\models\search;

use common\models\Employee;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Passport;

/**
 * PassportSearch represents the model behind the search form of `common\models\Passport`.
 *
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 */
class PassportSearch extends Passport
{
    public $last_name;
    public $first_name;
    public $middle_name;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_employee', 'series', 'number'], 'integer'],
            [['name', 'date'], 'safe'],
            [['last_name', 'first_name', 'middle_name'], 'safe'],
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
        $query = Passport::find()
            ->joinWith(['employee']);

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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_employee' => $this->id_employee,
            'series' => $this->series,
            'number' => $this->number,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name]);
        $query->andFilterWhere(['like', 'LOWER(last_name)', mb_strtolower($this->last_name)]);
        $query->andFilterWhere(['like', 'LOWER(first_name)', mb_strtolower($this->first_name)]);
        $query->andFilterWhere(['like', 'LOWER(middle_name)', mb_strtolower($this->middle_name)]);

        return $dataProvider;
    }
}
