<?php
/**
 * Created by PhpStorm.
 * User: semenpatnickij
 * Date: 14.06.17
 * Time: 22:32
 */
namespace app\models;

use yii\db\ActiveRecord;


class Contact extends ActiveRecord {

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            ['name', 'unique', 'targetAttribute' => ['name'], 'message' => 'Contact name must be unique.'],
            [['city_id'], 'safe'],

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity() {

        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getTelephones() {

        return $this->hasMany(Telephone::className(), ['contact_id' => 'id']);
    }

}