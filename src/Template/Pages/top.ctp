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
    <?= $this->Html->css('top/top.css') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <?= $this->Html->css('AdminLTE/bootstrap.min.css') ?>
    <?= $this->Html->css('AdminLTE/AdminLTE.min.css') ?>
    <?= $this->Html->css('AdminLTE/skin-blue.css') ?>


    
</head>


<body>
    <header class="main-header">

    <!-- Logo -->
    <a href="<?= $this->Url->build(['controller'=>'Pages', 'action'=>'top']) ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ZOOZOOTOWN</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="form-erea">
              <form action="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewAll']) ?>" method="post" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="なにをお探しですか？">
                      <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
              </form>
          </li>
          <?php 
            if(!empty($user)){
          ?>
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
              <span class="label label-warning">2</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">10件の通知があります。</li>
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
      
          <!-- User Account Menu -->
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
              <span class="hidden-xs"><?= $user['sei_name'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?php echo $this->Html->image('user/no_image.jpg',[
                    'alt' => 'User Image',
                    'class' => 'img-circle' 
                    ]);
                 ?>
                <p style="color: #333">
                  <?= $user['sei_name'].$user['mei_name'] ?>
                  <small><?= $user['user_mail'] ?></small>
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
                <a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'index']); ?>" class="btn btn-default btn-flat">マイページ</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'logout']); ?>" class="btn btn-default btn-flat">ログアウト</a>
                </div>
              </li>
            </ul>
          </li>
          <?php }else{ ?>
          <li class="dropdown">
              <a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'login']); ?>" class=""><b>ログイン</b></a>
          </li>


          <!-- Control Sidebar Toggle Button -->
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>
  <main>
    <div class="banner" id="home">
    <?= $this->Html->image('top/main_logo.png',[
                    'alt' => 'ロゴ',
                    'class' => 'main-logo'
                    ]) ?>
    <h2>ペットとの暮らしを楽しもう</h2>
    </div>

    <div class="bnr grid">
        <div class="col-md-3 col-sd-12 bnr-left">
        <a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewDog']) ?>">
            <figure class="effect-oscar">
                <?= $this->Html->image('top/4top1.jpeg',[
                    'alt' => 'カテゴリ・ドッグ',
                    ]) ?>
                <figcaption class="text-area">
                    <h3>Item for Dogs</h3>
                    <p>定番の商品からめずらしい商品まで</p>
                </figcaption>           
            </figure>
        </a>
        </div> 
        <div class="col-md-3 col-sd-12 bnr-left">
        <a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewCat']) ?>">
            <figure class="effect-oscar">
                <?= $this->Html->image('top/4top2.jpeg',[
                    'alt' => 'カテゴリ・キャット',
                    'url' => ''
                    ]) ?>
                <figcaption>
                    <h3>Item for Cats</h3>
                    <p>二つとないものを</p>
                </figcaption>           
            </figure>
        </a>
        </div>
        <div class="bnr-left col-sd-12 col-md-3">
        <a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewBird']) ?>">
            <figure class="effect-oscar">
                <?= $this->Html->image('top/4top3.jpg',[
                    'alt' => 'カテゴリ・バード',
                    'url' => ''
                    ]) ?>
                <figcaption>
                    <h3>Item for Birds</h3>
                    <p>こんなものがあるなんて</p>
                </figcaption>           
            </figure>
        </a>
        </div>
        <div class="col-md-3 col-sd-12 bnr-left">
        <a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewFish']) ?>">
            <figure class="effect-oscar">
                <?= $this->Html->image('top/4top4.jpg',[
                    'alt' => 'カテゴリ・フィッシュ',
                    'url' => ''
                    ]) ?>
                <figcaption>
                    <h3>Item for Fishs</h3>
                    <p>これが欲しかった</p>
                </figcaption>           
            </figure>
        </a>
        </div>
        <div class="clearfix"></div>
    </div>
</main>
    <?= $this->Html->script('jquery-3.1.1.js') ?>
<!-- Bootstrap 3.3.6 -->
<?= $this->Html->script('AdminLTE/bootstrap.min.js') ?>
<!-- AdminLTE App -->
<?= $this->Html->script('AdminLTE/app.min.js') ?>

</body>
</html>
