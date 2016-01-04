<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

echo $this->render('_notice-box', ['message' => Yii::$app->session->getFlash('message')]);
?>

<?= $this->render('_form', [
    'btn_title' => 'Update',
    'btn_class' => 'btn btn-danger',
    'form_status'   => 'update',
    'model' =>  $model,
    'users' =>  $users,
]) ?>

