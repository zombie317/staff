<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $number
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property bool|null $gender
 * @property string|null $address
 * @property int|null $phone
 *
 * @property Dismissal[] $dismissals
 * @property Passport[] $passports
 * @property Recruitment[] $recruitments
 * @property Trips[] $trips
 * @property Vacation[] $vacations
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'last_name', 'first_name', 'middle_name'], 'required'],
            [['gender'], 'boolean'],
            [['phone'], 'default', 'value' => null],
            [['phone'], 'integer'],
            [['number'], 'string', 'max' => 10],
            [['last_name', 'first_name', 'middle_name', 'address'], 'string', 'max' => 255],
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
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'gender' => 'Gender',
            'address' => 'Address',
            'phone' => 'Phone',
        ];
    }

    /**
     * Gets query for [[Dismissals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDismissals()
    {
        return $this->hasMany(Dismissal::className(), ['id_employee' => 'id']);
    }

    /**
     * Gets query for [[Passports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPassports()
    {
        return $this->hasMany(Passport::className(), ['id_employee' => 'id']);
    }

    /**
     * Gets query for [[Recruitments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecruitments()
    {
        return $this->hasMany(Recruitment::className(), ['id_employee' => 'id']);
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trips::className(), ['id_employee' => 'id']);
    }

    /**
     * Gets query for [[Vacations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacations()
    {
        return $this->hasMany(Vacation::className(), ['id_employee' => 'id']);
    }
}
