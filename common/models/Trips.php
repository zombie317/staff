<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trips".
 *
 * @property int $id
 * @property string $number
 * @property string $date
 * @property int $id_employee
 * @property int $id_firm
 * @property string|null $place
 * @property string $date_start
 * @property string $date_end
 * @property int $quantity_days
 * @property string|null $cause
 *
 * @property Employee $employee
 * @property Firm $firm
 */
class Trips extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trips';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'date', 'id_employee', 'id_firm', 'date_start', 'date_end', 'quantity_days'], 'required'],
            [['date', 'date_start', 'date_end'], 'safe'],
            [['id_employee', 'id_firm', 'quantity_days'], 'default', 'value' => null],
            [['id_employee', 'id_firm', 'quantity_days'], 'integer'],
            [['number'], 'string', 'max' => 10],
            [['place', 'cause'], 'string', 'max' => 255],
            [['id_employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['id_employee' => 'id']],
            [['id_firm'], 'exist', 'skipOnError' => true, 'targetClass' => Firm::className(), 'targetAttribute' => ['id_firm' => 'id']],
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
            'place' => 'Место командирования',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'quantity_days' => 'Количество дней',
            'cause' => 'Цель командировки',
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

    /**
     * Gets query for [[Firm]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFirm()
    {
        return $this->hasOne(Firm::className(), ['id' => 'id_firm']);
    }
}
