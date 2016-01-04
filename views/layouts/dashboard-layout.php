<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DashboardAsset;


DashboardAsset::register($this);
?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body  class="hold-transition skin-blue sidebar-mini wysihtml5-supported">
<?php $this->beginBody() ?>

<div class="wrap" style="background-color: #222d32;">


<?= $this->renderFile(Yii::$app->basePath . '/views/layouts/dashboard/_header.php'); ?>

<?= $this->renderFile(Yii::$app->basePath . '/views/layouts/dashboard/_left-slider.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $this->renderFile(Yii::$app->basePath . '/views/_partials/_title-header.php', ['title_header' => Yii::$app->controller->title_header]); ?>

        <!-- Main content -->
        <section class="content">

            <?= $content ?>

        </section>
    </div>

</div>

<?=
    $this->renderFile(Yii::$app->basePath.'/views/layouts/dashboard/_footer.php');
?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
