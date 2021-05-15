<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recruitment".
 *
 * @property int $id
 * @property string $number
 * @property string $date
 * @property int $id_employee
 * @property int $id_firm
 * @property int $id_position
 * @property int $id_department
 * @property int $quantity
 *
 * @property Department $department
 * @property Employee $employee
 * @property Firm $firm
 * @property Position $position
 */
class Recruitment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recruitment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'date', 'id_employee', 'id_firm', 'id_position', 'id_department', 'quantity'], 'required'],
            [['date'], 'safe'],
            [['id_employee', 'id_firm', 'id_position', 'id_department', 'quantity'], 'default', 'value' => null],
            [['id_employee', 'id_firm', 'id_position', 'id_department', 'quantity'], 'integer'],
            [['number'], 'string', 'max' => 10],
            [['id_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['id_department' => 'id']],
            [['id_employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['id_employee' => 'id']],
            [['id_firm'], 'exist', 'skipOnError' => true, 'targetClass' => Firm::className(), 'targetAttribute' => ['id_firm' => 'id']],
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
            'number' => 'Номер приказа',
            'date' => 'Дата',
            'id_employee' => 'Сотрудник',
            'id_firm' => 'Организация',
            'id_position' => 'Должность',
            'id_department' => 'Отдел',
            'quantity' => 'Ставка',
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
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'id_employee']);
    }

    /**
     * Gets query for [[Firm]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFirm()
    {
        return $this->hasOne(Firm::className(), ['id' => 'id_firm']);
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
