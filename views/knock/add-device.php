<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

echo $this->render('_notice-box', ['message' => Yii::$app->session->getFlash('message')]);
?>

<?= $this->render('_form', [
    'btn_title' => 'Add New',
    'btn_class' => 'btn btn-info',
    'form_status'   => 'new',
    'model' =>  $model,
    'users' =>  $users,
]) ?>

























