<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Telephone
 * @package app\models
 */
class Telephone extends ActiveRecord {

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['telephone'], 'required'],
            [['city_id', 'telephone'], 'safe'],

            ['telephone', 'unique', 'targetAttribute' => ['telephone'], 'message' => 'telephone name must be unique.'],

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity() {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}