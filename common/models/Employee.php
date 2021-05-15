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
    const MALE =        true;
    const MALE_NAME =   'Мужчина';

    const FEMALE =      false;
    const FEMALE_NAME = 'Женщина';

    public $full_name;
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
            'number' => 'Табельный номер',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'gender' => 'Пол',
            'address' => 'Домашний адрес',
            'phone' => 'Номер телефона',
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

    public function getEmployeeFullName()
    {
        $full_name = $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;
        return $full_name;
    }

    public function getGenderName($gender)
    {
        $gender_name = null;
        $gender === self::MALE ?
            $gender_name = self::MALE_NAME : ($gender === self::FEMALE ?
                $gender_name = self::FEMALE_NAME : $gender_name);

        return $gender_name;
    }
}
