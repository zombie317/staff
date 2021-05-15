<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property string $name
 * @property float|null $salary
 *
 * @property Dismissal[] $dismissals
 * @property Recruitment[] $recruitments
 * @property StaffingPlan[] $staffingPlans
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['salary'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'salary' => 'Оклад',
        ];
    }

    /**
     * Gets query for [[Dismissals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDismissals()
    {
        return $this->hasMany(Dismissal::className(), ['id_position' => 'id']);
    }

    /**
     * Gets query for [[Recruitments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecruitments()
    {
        return $this->hasMany(Recruitment::className(), ['id_position' => 'id']);
    }

    /**
     * Gets query for [[StaffingPlans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffingPlans()
    {
        return $this->hasMany(StaffingPlan::className(), ['id_position' => 'id']);
    }
}
