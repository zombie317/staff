<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StaffingPlan;
use common\models\Position;
use common\models\Department;

/**
 * StaffingPlanSearch represents the model behind the search form of `common\models\StaffingPlan`.
 *
 * @property string $position_name
 * @property string $department_name
 */
class StaffingPlanSearch extends StaffingPlan
{
    public $position_name;
    public $department_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_position', 'id_department', 'quantity'], 'integer'],
            [['position_name', 'department_name'], 'safe'],
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
        $query = StaffingPlan::find()
            ->joinWith(['position'])
            ->joinWith(['department']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['position_name'] = [
            'asc' => [Position::tableName().'.name' => SORT_ASC],
            'desc' => [Position::tableName().'.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['department_name'] = [
            'asc' => [Department::tableName().'.name' => SORT_ASC],
            'desc' => [Department::tableName().'.name' => SORT_DESC],
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
//            'id_position' => $this->id_position,
//            'id_department' => $this->id_department,
            'quantity' => $this->quantity,
        ]);
        $query->andFilterWhere(['like', 'LOWER(position.name)', mb_strtolower($this->position_name)]);
        $query->andFilterWhere(['like', 'LOWER(department.name)', mb_strtolower($this->department_name)]);


        return $dataProvider;
    }
}
