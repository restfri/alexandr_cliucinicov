<?php


namespace frontend\models;


use yii\db\ActiveRecord;

/**
 * Class Countries
 * @package frontend\models
 * @property integer $id
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
}