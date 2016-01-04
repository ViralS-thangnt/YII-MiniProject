<?php

namespace app\controllers;

use Yii;
use app\models\LoginForm;


class AuthController extends \yii\web\Controller
{
    public $title_header;

    public function init()
    {

        // $this->layout = 'main_';
        $this->layout = 'dashboard-layout';
        $this->title_header = "Dashboard";
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();
    }


}
