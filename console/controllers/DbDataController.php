<?php


namespace console\controllers;


use frontend\models\Cities;
use frontend\models\Countries;
use Yii;
use yii\console\Controller;

class DbDataController extends Controller
{
    public function actionInsertCountries()
    {   /*fast solution for data prepare*/
        $path = Yii::getAlias('@frontend/web/country_city.json');
        $data = json_decode(file_get_contents($path), true);

        foreach ($data as $country => $cities) {
            $countriesModel = new Countries();
            $countriesModel->name = $country;
            $countriesModel->save();

            foreach ($cities as $city) {
                $citiesModel = new Cities();
                $citiesModel->country_id = $countriesModel->id;
                $citiesModel->name = $city;
                $citiesModel->save();
            }
        }
    }
}