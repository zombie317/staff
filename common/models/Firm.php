<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "firm".
 *
 * @property int $id
 * @property string $full_name
 * @property string $short_name
 * @property string|null $legal_address
 * @property string|null $mail_address
 * @property int|null $inn
 * @property int|null $kpp
 * @property int|null $bik
 * @property int|null $bank_account
 * @property string|null $email
 * @property int|null $phone
 * @property string|null $site
 *
 * @property Dismissal[] $dismissals
 * @property Recruitment[] $recruitments
 * @property Trips[] $trips
 * @property Vacation[] $vacations
 */
class Firm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'firm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'short_name'], 'required'],
            [['inn', 'kpp', 'bik', 'bank_account', 'phone'], 'default', 'value' => null],
            [['inn', 'kpp', 'bik', 'bank_account', 'phone'], 'integer'],
            [['full_name', 'short_name', 'legal_address', 'mail_address', 'email', 'site'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'short_name' => 'Short Name',
            'legal_address' => 'Legal Address',
            'mail_address' => 'Mail Address',
            'inn' => 'Inn',
            'kpp' => 'Kpp',
            'bik' => 'Bik',
            'bank_account' => 'Bank Account',
            'email' => 'Email',
            'phone' => 'Phone',
            'site' => 'Site',
        ];
    }

    /**
     * Gets query for [[Dismissals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDismissals()
    {
        return $this->hasMany(Dismissal::className(), ['id_firm' => 'id']);
    }

    /**
     * Gets query for [[Recruitments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecruitments()
    {
        return $this->hasMany(Recruitment::className(), ['id_firm' => 'id']);
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trips::className(), ['id_firm' => 'id']);
    }

    /**
     * Gets query for [[Vacations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacations()
    {
        return $this->hasMany(Vacation::className(), ['id_firm' => 'id']);
    }
}
