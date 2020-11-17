<?php


namespace frontend\models;


use yii\db\ActiveRecord;

/**
 * Class Forecast
 * @package frontend\models
 * @property integer $id
 * @property integer $city_id
 * @property float $temperature
 * @property string $when_created
 */
class Forecast extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%forecast}}';
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['id', 'city_id'], 'integer',],
            [['temperature'], 'number',],
        ];
    }
}