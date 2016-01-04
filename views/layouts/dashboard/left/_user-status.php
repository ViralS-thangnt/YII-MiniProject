
<?php
use yii\helpers\Url;

if(!Yii::$app->user->isGuest) {

?>

<!-- Sidebar user panel -->
<div class="user-panel">
  <div class="pull-left image">
    <img src="<?= Url::to('/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
  </div>
  <div class="pull-left info">
    <p>Alexander Pierce</p>
    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
  </div>
</div>


<?php

}
?>
