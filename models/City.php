<?php
/**
 * Created by PhpStorm.
 * User: de
 * Date: 14.06.2017
 * Time: 14:19
 */
namespace app\models;

use yii\db\ActiveRecord;

class City extends ActiveRecord {

    public function rules()
    {
        return [
            [['name'], 'required'],
            ['name', 'unique', 'targetAttribute' => ['name'], 'message' => 'City name must be unique.'],
        ];
    }
}