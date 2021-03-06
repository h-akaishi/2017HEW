<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'ZOOZOOTOWN';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset('utf-8') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <?= $this->Html->css('AdminLTE/bootstrap.min.css') ?>
    <?= $this->Html->css('AdminLTE/AdminLTE.min.css') ?>
    <?= $this->Html->css('AdminLTE/skin-blue.css') ?>

    
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?= $this->Url->build(['controller'=>'Pages', 'action'=>'top']) ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo $this->Html->image('mini_logo.png',[
                    'alt' => 'User Image' 
                    ]);
                 ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ZOOZOOTOWN</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="<?php echo $this->Url->build(['controller'=>'Items', 'action'=>'myCart']); ?>" class="" data-toggle="">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success"><?= $countCart ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <?php echo $this->Html->image('user/no_image.jpg',[
                    'alt' => 'User Image',
                    'class' => 'user-image' 
                    ]);
                 ?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Administrator</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?php echo $this->Html->image('user/no_image.jpg',[
                    'alt' => 'User Image',
                    'class' => 'img-circle' 
                    ]);
                 ?>

                <p>
                  Administrator - ZOOZOO 管理者
                  <small>admin@gmail.com</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'adminindex']); ?>" class="btn btn-default btn-flat">マイページ</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'logout']); ?>" class="btn btn-default btn-flat">ログアウト</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          
          <?php echo $this->Html->image('user/no_image.jpg',[
                    'alt' => 'User Image',
                    'class' => 'img-circle' 
                    ]);
                 ?>
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php if($this->request->params['action'] == 'adminindex'){ echo 'active'; } ?>"><a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'adminindex']); ?>"><i class="fa fa-dashboard"></i> <span>ダッシュボード</span></a></li>
        <li class="treeview <?php if($this->request->params['controller'] == 'Earnings'){ echo 'active'; } ?>">
          <a href="#"><i class="fa fa-line-chart"></i> <span>売上管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(['controller'=>'Earnings', 'action'=>'index']); ?>"><i class="fa fa-circle-o"></i>受注一覧</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($this->request->params['controller'] == 'Items'){ echo 'active'; } ?>">
          <a href="#"><i class="fa fa-shopping-cart"></i> <span>商品管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(['controller'=>'Items', 'action'=>'index']); ?>"><i class="fa fa-circle-o"></i>アイテム一覧</a></li>
            <li><a href="<?php echo $this->Url->build(['controller'=>'Items', 'action'=>'add']); ?>"><i class="fa fa-circle-o"></i>アイテム追加</a></li>
            <li><a href="<?php echo $this->Url->build(['controller'=>'ItemTypes', 'action'=>'index']); ?>"><i class="fa fa-circle-o"></i>商品カテゴリ一覧</a></li>
            <li><a href="<?php echo $this->Url->build(['controller'=>'ItemTypes', 'action'=>'add']); ?>"><i class="fa fa-circle-o"></i>商品カテゴリ追加</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($this->request->params['controller'] == 'Users' && $this->request->params['action'] != 'adminindex'){ echo 'active'; } ?>">
          <a href="#"><i class="fa fa-users"></i> <span>ユーザ管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'index']); ?>"><i class="fa fa-circle-o"></i>会員一覧</a></li>
            <li><a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'add']); ?>"><i class="fa fa-circle-o"></i>会員追加</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php 
        if($this->request->params['action'] == 'adminindex'){ 
            echo 'ダッシュボード'; 
        }elseif($this->request->params['controller'] == 'Users'){ 
            echo 'ユーザ管理'; 
        }elseif($this->request->params['controller'] == 'Items'){
            echo '商品管理'; 
        }elseif ($this->request->params['controller'] == 'Earnings') {
            echo '売上管理';
        }else{
            echo '管理画面';
        }

        ?>
        <small>ZOOZOOTOWN</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
    <?= $this->Flash->render() ?>
    <!-- Main content -->
    <section class="content">
        
        <?= $this->fetch('content') ?>
      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 ZooZooTOWN.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<?= $this->Html->script('jquery-3.1.1.js') ?>
<!-- Bootstrap 3.3.6 -->
<?= $this->Html->script('AdminLTE/bootstrap.min.js') ?>
<!-- AdminLTE App -->
<?= $this->Html->script('AdminLTE/app.min.js') ?>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
