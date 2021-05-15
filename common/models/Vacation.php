<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vacation".
 *
 * @property int $id
 * @property string $number
 * @property string $date
 * @property int $id_employee
 * @property int $id_firm
 * @property int $id_type_vacation
 * @property string $date_start
 * @property string $date_end
 * @property int $quantity_days
 * @property string $article
 *
 * @property Employee $employee
 * @property Firm $firm
 * @property TypeVacation $typeVacation
 */
class Vacation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'date', 'id_employee', 'id_firm', 'id_type_vacation', 'date_start', 'date_end', 'quantity_days', 'article'], 'required'],
            [['date', 'date_start', 'date_end'], 'safe'],
            [['id_employee', 'id_firm', 'id_type_vacation', 'quantity_days'], 'default', 'value' => null],
            [['id_employee', 'id_firm', 'id_type_vacation', 'quantity_days'], 'integer'],
            [['number'], 'string', 'max' => 10],
            [['article'], 'string', 'max' => 255],
            [['id_employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['id_employee' => 'id']],
            [['id_firm'], 'exist', 'skipOnError' => true, 'targetClass' => Firm::className(), 'targetAttribute' => ['id_firm' => 'id']],
            [['id_type_vacation'], 'exist', 'skipOnError' => true, 'targetClass' => TypeVacation::className(), 'targetAttribute' => ['id_type_vacation' => 'id']],
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
            'id_type_vacation' => 'Вид отпуска',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'quantity_days' => 'Количество дней',
            'article' => 'Основание',
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

    /**
     * Gets query for [[TypeVacation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeVacation()
    {
        return $this->hasOne(TypeVacation::className(), ['id' => 'id_type_vacation']);
    }
}
