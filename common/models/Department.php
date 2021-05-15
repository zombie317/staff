<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $name
 * @property string|null $room_number
 * @property int|null $phone
 *
 * @property Dismissal[] $dismissals
 * @property Recruitment[] $recruitments
 * @property StaffingPlan[] $staffingPlans
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['phone'], 'default', 'value' => null],
            [['phone'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['room_number'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название ',
            'room_number' => 'Номер кабинета',
            'phone' => 'Телефон',
        ];
    }

    /**
     * Gets query for [[Dismissals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDismissals()
    {
        return $this->hasMany(Dismissal::className(), ['id_department' => 'id']);
    }

    /**
     * Gets query for [[Recruitments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecruitments()
    {
        return $this->hasMany(Recruitment::className(), ['id_department' => 'id']);
    }

    /**
     * Gets query for [[StaffingPlans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffingPlans()
    {
        return $this->hasMany(StaffingPlan::className(), ['id_department' => 'id']);
    }
}
