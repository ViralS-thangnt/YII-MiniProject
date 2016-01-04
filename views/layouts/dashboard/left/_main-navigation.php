
<?php
use yii\helpers\Url;
?>

  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>


    <li>
      <a href="<?= Url::to('/') ?>">
        <i class="fa fa-th"></i> <span>Welcome</span> <small class="label pull-right bg-green">new</small>
      </a>
    </li>


    <li class="treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i>
        <span>Categories</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?= Url::to('/knock/list-device') ?>"><i class="fa fa-chrome"></i> List Devices</a></li>
        <li><a href="<?= Url::to('/knock/add-device') ?>"><i class="fa fa-chrome"></i> Add Devices</a></li>

      </ul>
    </li>


  </ul>
