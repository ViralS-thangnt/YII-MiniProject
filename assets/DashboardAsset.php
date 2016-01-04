<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'dist/css/skins/_all-skins.min.css',
        'css/AdminLTE.min.css',
        // 'plugins/iCheck/flat/blue.css',
        // 'plugins/morris/morris.css',
        // 'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        // 'plugins/datepicker/datepicker3.css',
        // 'plugins/daterangepicker/daterangepicker-bs3.css',
        // 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',



    ];
    public $js = [
        'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        'dist/js/app.min.js',
        'js/bootstrap.min.js',


        // 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        // 'dist/js/pages/dashboard.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        // 'plugins/morris/morris.min.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',



    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}












