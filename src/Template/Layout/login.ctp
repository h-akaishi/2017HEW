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
    <?= $this->Html->css('AdminLTE/blue.css') ?>
    

    
</head>


<body class="hold-transition login-page">

    <?= $this->Flash->render() ?>
    <!-- Main content -->
        
      <?= $this->fetch('content') ?>
      <!-- Your Page Content Here -->

  
    <!-- /.content -->
 
<!-- jQuery 2.2.3 -->
<?= $this->Html->script('jquery-3.1.1.js') ?>
<!-- Bootstrap 3.3.6 -->
<?= $this->Html->script('AdminLTE/bootstrap.min.js') ?>
<!-- AdminLTE App -->
<?= $this->Html->script('AdminLTE/app.min.js') ?>

<?= $this->Html->script('AdminLTE/icheck.js') ?>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
