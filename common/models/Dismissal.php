<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dismissal".
 *
 * @property int $id
 * @property string $number
 * @property string $date
 * @property int $id_employee
 * @property int $id_firm
 * @property int $id_position
 * @property int $id_department
 * @property string $article
 * @property string|null $cause
 *
 * @property Department $department
 * @property Employee $employee
 * @property Firm $firm
 * @property Position $position
 */
class Dismissal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dismissal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'date', 'id_employee', 'id_firm', 'id_position', 'id_department', 'article'], 'required'],
            [['date'], 'safe'],
            [['id_employee', 'id_firm', 'id_position', 'id_department'], 'default', 'value' => null],
            [['id_employee', 'id_firm', 'id_position', 'id_department'], 'integer'],
            [['number'], 'string', 'max' => 10],
            [['article', 'cause'], 'string', 'max' => 255],
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
            'number' => 'Number',
            'date' => 'Date',
            'id_employee' => 'Id Employee',
            'id_firm' => 'Id Firm',
            'id_position' => 'Id Position',
            'id_department' => 'Id Department',
            'article' => 'Article',
            'cause' => 'Cause',
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
