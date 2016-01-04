<?php

namespace app\controllers;

use app\models\Device;
use yii\helpers\Json;

class ApiController extends \yii\web\Controller
{
    public function actionListDevice()
    {
        $devices = Device::find()->all();

        return Json::encode($devices);
    }






}
