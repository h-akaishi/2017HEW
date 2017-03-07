<?php

switch (true) {
    case !isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']):
    case $_SERVER['PHP_AUTH_USER'] !== 'admin':
    case $_SERVER['PHP_AUTH_PW']   !== 'zoozootown':
        header('WWW-Authenticate: Basic realm="Enter username and password."');
        header('Content-Type: text/plain; charset=utf-8');
        die('このページを見るにはログインが必要です');
}

header('Content-Type: text/html; charset=utf-8');

?>
<div class="login-box">
  <div class="login-logo">
    <a href="<?= $this->Url->build(['controller'=>'Pages', 'action'=>'top']) ?>"><b>ZOOZOOTOWN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">ログイン</p>

    <?= $this->Form->create() ?>
      <div class="form-group has-feedback">
      	<?= $this->Form->input('user_mail',['class' => 'form-control' , 'placeholder' => 'Email' , 'label' => false]) ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
		<?= $this->Form->input('password', ['class' => 'form-control','placeholder' => 'Password', 'label' => false]) ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
			<?= $this->Form->button('Sign In',['class' => 'btn btn-primary btn-block btn-flat'])?>
        </div>
        <!-- /.col -->
      </div>
    <?= $this->Form->end() ?>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">パスワード再発行</a><br>
    <?= $this->Html->link(__('ZOOZOO新規登録'), ['controller' => 'Users', 'action' => 'add']) ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->