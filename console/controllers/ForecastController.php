<?php

namespace console\controllers;

use frontend\models\Countries;
use frontend\models\Forecast;
use Yii;
use yii\httpclient\Client;
use yii\console\ExitCode;
use yii\console\Controller;

class ForecastController extends Controller
{
    public function actionGetForecast(string $start, string $end): bool
    {
        $countries = Countries::find()
            ->innerJoinWith('cities')
            ->asArray()
            ->all()
        ;

        $client = new Client();
        $rowsInserted = 0;
        foreach ($countries as $country) {

            foreach ($country['cities'] as $city) {
                echo "Send request for city: {$city['name']} \n";
                $request = $client->get('http://quiz.dev.travelinsides.com/forecast/api/getForecast', [
                    'start' => $start, 'end' => $end, 'city' => $city['name'],
                ]);

                $response = $client->send($request)->getData();

                if (isset($response['error'])) {
                    continue;
                }

                foreach ($response['row'] as $forecastData) {
                    $forecast = Yii::createObject([
                        'class' => Forecast::class,
                        'city_id' => $city['id'],
                        'temperature' => $forecastData['temperature'],
                        'when_created' => $forecastData['ts'],
                    ]);
                    if ($forecast->save()) {
                        $rowsInserted++;
                    }
                }
            }
        }
        echo 'Data inserted: ' . $rowsInserted;

        return ExitCode::OK;
    }

}

