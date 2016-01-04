<?php
use yii\helpers\Url;
?>

      <header class="main-header">
        <!-- Logo -->
        <a href="<?= Url::to('/') ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>T</b>W3</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Team</b> Web 3</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


            <?php if(!Yii::$app->user->isGuest) { ?>

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= Url::to('/dist/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?= Yii::$app->user->identity->email ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?= Url::to('/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
                    <p>
                      <?= Yii::$app->user->identity->email ?>
                      <small><?= Yii::$app->user->identity->created_at ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= Url::to(['/auth/logout']) ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>


            <?php
              } else {
            ?>

              <li class="dropdown user user-menu">
                  <a href="<?= Url::to('/auth/login') ?>">
                    <span class="hidden-xs">Login</span>
                  </a>
              </li>

            <?php
              }

            ?>

              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>