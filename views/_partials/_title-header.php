<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= isset($title_header) ? $title_header : "" ?>
    <small><?= isset($sub_title_header) ? $sub_title_header : "" ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= \yii\helpers\Url::to('/knock/list-device') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>