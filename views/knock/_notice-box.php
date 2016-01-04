
<?php

if(isset($message) and !empty($message)) {

    echo '<div class="alert alert-info">' . $message . '</div>';
}

// echo Yii::$app->session->hasFlash('message') ? '<div class="alert alert-info">' . Yii::$app->session->getFlash('message') . '</div>' : '';
