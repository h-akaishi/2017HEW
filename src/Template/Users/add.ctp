<?= $this->Html->css('user/add.css') ?>

<div class="container">
            <div class="row main">
                <div class="main-login main-center">
                <h5>新規会員登録</h5>
                    <?= $this->Form->create($user) ?>
                        
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">あなたの名前（姓）</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <?= $this->Form->input('sei_name',['class' => 'form-control', 'placeholder' => 'Enter your Name', 'label' => false])?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">あなたの名前（名）</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <?= $this->Form->input('mei_name',['class' => 'form-control', 'placeholder' => 'Enter your Name', 'label' => false])?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">フリガナ（セイ）</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <?= $this->Form->input('sei_kana',['class' => 'form-control', 'placeholder' => 'Enter your Name', 'label' => false])?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">フリガナ（メイ）</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <?= $this->Form->input('mei_kana',['class' => 'form-control', 'placeholder' => 'Enter your Name', 'label' => false])?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">メールアドレス</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <?= $this->Form->input('user_mail',['class' => 'form-control', 'placeholder' => 'メールアドレスを入力', 'label' => false])?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">性別</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <?= $this->Form->input('user_sex',['class' => 'form-control', 'placeholder' => 'Men or Women', 'label' => false])?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">郵便番号</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <?= $this->Form->input('mail_no',['class' => 'form-control', 'placeholder' => '郵便番号を入力', 'label' => false])?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">住所</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <?= $this->Form->input('mail_add',['class' => 'form-control', 'placeholder' => '住所を入力', 'label' => false])?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">電話番号</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <?= $this->Form->input('user_tel',['class' => 'form-control', 'placeholder' => '電話番号を入力', 'label' => false])?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">生年月日</label>
                            
                                    <?= $this->Form->input('birth', array(
                                        'label' => false,
                                        'type' => 'date',
                                        'dataFormat' => 'YMD',
                                        'monthNames' => false,
                                        'maxYear' => date('Y'),
                                        'minYear' => date('Y') - 100,
                                        )) ?>
                        </div>

                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">パスワード</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <?= $this->Form->input('password',['class' => 'form-control', 'placeholder' => 'パスワードを入力', 'label' => false])?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <?= $this->Form->button(__('新規登録'),['class' => 'btn btn-primary btn-lg btn-block login-button']) ?>
                        </div>
                        
                     <?= $this->Form->end() ?>
                </div>
            </div>
        </div>




