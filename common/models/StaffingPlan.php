<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "staffing_plan".
 *
 * @property int $id
 * @property int $id_position
 * @property int $id_department
 * @property int $quantity
 *
 * @property Department $department
 * @property Position $position
 */
class StaffingPlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staffing_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_position', 'id_department', 'quantity'], 'required'],
            [['id_position', 'id_department', 'quantity'], 'default', 'value' => null],
            [['id_position', 'id_department', 'quantity'], 'integer'],
            [['id_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['id_department' => 'id']],
            [['id_position'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['id_position' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_position' => 'Id Position',
            'id_department' => 'Id Department',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'id_department']);
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'id_position']);
    }
}
