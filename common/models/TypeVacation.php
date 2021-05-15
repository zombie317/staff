<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "type_vacation".
 *
 * @property int $id
 * @property string $name
 *
 * @property Vacation[] $vacations
 */
class TypeVacation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_vacation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

    /**
     * Gets query for [[Vacations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacations()
    {
        return $this->hasMany(Vacation::className(), ['id_type_vacation' => 'id']);
    }
}
