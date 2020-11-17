<?php


namespace frontend\models;


use yii\db\ActiveRecord;

/**
 * Class Cities
 * @package frontend\models
 * @property integer $id
 * @property integer $country_id
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
}