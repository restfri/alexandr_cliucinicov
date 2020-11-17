<?php


namespace console\controllers;


use Yii;
use yii\console\Controller;

class DbDataController extends Controller
{
    public function actionInsertCountries()
    {
        $path = Yii::getAlias('@frontend/web/country_city.json');
        $data = json_decode(file_get_contents($path));
        echo '<pre>'; var_dump($data); die;
    }
}