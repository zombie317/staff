<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Firm;

/**
 * FirmSearch represents the model behind the search form of `common\models\Firm`.
 */
class FirmSearch extends Firm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'inn', 'kpp', 'bik', 'bank_account', 'phone'], 'integer'],
            [['full_name', 'short_name', 'legal_address', 'mail_address', 'email', 'site'], 'safe'],
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
        $query = Firm::find();

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
            'inn' => $this->inn,
            'kpp' => $this->kpp,
            'bik' => $this->bik,
            'bank_account' => $this->bank_account,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['ilike', 'full_name', $this->full_name])
            ->andFilterWhere(['ilike', 'short_name', $this->short_name])
            ->andFilterWhere(['ilike', 'legal_address', $this->legal_address])
            ->andFilterWhere(['ilike', 'mail_address', $this->mail_address])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'site', $this->site]);

        return $dataProvider;
    }
}
