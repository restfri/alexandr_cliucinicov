<?php


namespace frontend\models;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Countries
 * @package frontend\models
 * @property integer $id
 * @property-read ActiveQuery $cities
 * @property string $name
 */

class Countries extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%countries}}';
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['id'], 'integer',],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCities(): ActiveQuery
    {
        return $this->hasMany(Cities::class, ['country_id' => 'id']);
    }
}