<?php

namespace console\controllers;

use yii\httpclient\Client;
use yii\console\ExitCode;
use yii\console\Controller;

class ForecastController extends Controller
{
    public function actionGetForecast(): bool
    {
        $client = new Client();

        $request = $client->get('http://quiz.dev.travelinsides.com/forecast/api/getForecast', [
            'start' => '20.07.2018', 'end' => '21.07.2018', 'city' => 'Moscow',
        ]);

        $response = $client->send($request);
        echo '<pre>'; var_dump($response->getData()); die;
        return ExitCode::OK;
    }

}

