<?php


namespace frontend\models;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Cities
 * @package frontend\models
 * @property integer $id
 * @property integer $country_id
 * @property-read ActiveQuery $forecasts
 * @property-read ActiveQuery $country
 * @property string $name
 */
class Cities extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%cities}}';
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['id', 'country_id'], 'integer',],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCountry(): ActiveQuery
    {
        return $this->hasOne(Countries::class, ['id' => 'country_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getForecasts(): ActiveQuery
    {
        return $this->hasMany(Forecast::class, ['city_id' => 'id']);
    }
}