<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

?>

<style type="text/css">
    thead {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .grid-view {
        padding-top: 15px;
    }

</style>
<!--
<link rel="stylesheet" type="text/css" href="<?= Url::to(['plugins/datatables/dataTables.bootstrap.css']) ?>">
 -->

<?= $this->render('_notice-box', ['message' => Yii::$app->session->getFlash('message')]); ?>

<?= Html::a('Add', Url::to(['add-device']), ['class'   =>  'btn btn-primary', "style"   => "min-width: 160px"]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        [
            'attribute' =>  'user_id',
            'value'     =>  'user.email',
        ],
        'device_code',
        [
            'attribute'     =>  'Action',
            'format'        =>  'raw',
            'value'         =>  function($model) {

                return $this->render('_action-column', ['model' => $model]);

            },
        ]

    ],
]);
?>















