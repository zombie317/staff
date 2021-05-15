<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "passport".
 *
 * @property int $id
 * @property int $id_employee
 * @property int $series
 * @property int $number
 * @property string $name
 * @property string $date
 *
 * @property Employee $employee
 */
class Passport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_employee', 'series', 'number', 'name', 'date'], 'required'],
            [['id_employee', 'series', 'number'], 'default', 'value' => null],
            [['id_employee', 'series', 'number'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['id_employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['id_employee' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_employee' => 'Сотрудник',
            'series' => 'Серия',
            'number' => 'Номер',
            'name' => 'Кем выдан',
            'date' => 'Когда выдан',
        ];
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

    public function getEmployeeFullName()
    {
        $employee = $this->hasOne(Employee::className(), ['id' => 'id_employee'])->one();
        $full_name = $employee->last_name . ' ' . $employee->first_name . ' ' . $employee->middle_name;
        return $full_name;
    }
}
