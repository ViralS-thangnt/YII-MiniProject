

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">


    <?= $this->renderFile(Yii::$app->basePath.'/views/layouts/dashboard/left/_user-status.php'); ?>

    <?= $this->renderFile(Yii::$app->basePath.'/views/layouts/dashboard/left/_search.php'); ?>

    <?= $this->renderFile(Yii::$app->basePath.'/views/layouts/dashboard/left/_main-navigation.php'); ?>

  </section>
  <!-- /.sidebar -->
</aside>