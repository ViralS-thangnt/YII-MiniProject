<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

if($model) {

    $form = ActiveForm::begin(['id'   => 'device-form']);

    if($form_status === 'update') {

        echo $form->field($model, 'id')->textInput(['disabled' => 'disabled']);
    }
?>

    <?= $form->field($model, 'user_id')->dropDownList($users); ?>

    <?= $form->field($model, 'device_code'); ?>

    <?= $form->field($model, 'platform')->dropDownList(getAllPlatform(), ['class' => 'form-control form-group']) ?>

    <?= Html::a('List Device', Url::to(['list-device']), ['class'   => 'btn btn-primary'] ) ?>

    <?= Html::submitButton($btn_title, ['class' => $btn_class]); ?>

<?php ActiveForm::end();

}

?>


