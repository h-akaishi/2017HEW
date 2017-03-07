<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ユーザ情報</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <tr>
                  <th>お名前</th>
                  <td><?= h($user->sei_name.$user->mei_name) ?></td>
                </tr>
                <tr>
                  <th>フリガナ</th>
                  <td><?= h($user->sei_kana.$user->mei_kana) ?></td>
                </tr>
                <tr>
                  <th>性別</th>
                  <td><?= h($user->user_sex) ?></td>
                </tr>
                <tr>
                  <th>郵便番号</th>
                  <td><?= '〒'.h($user->mail_no) ?></td>
                </tr>
                <tr>
                  <th>住所</th>
                  <td><?= h($user->mail_add) ?></td>
                </tr>
                <tr>
                  <th>電話番号</th>
                  <td><?= h($user->user_tel) ?></td>
                </tr>
                <tr>
                  <th>メールアドレス</th>
                  <td> <?= h($user->user_mail) ?></td>
                </tr>
                <tr>
                  <th>会員ID</th>
                  <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                  <th>会員名</th>
                  <td><?= h($user->birth->format('Y/n/j')) ?></td>
                </tr>
    
              </table>
            </div>
            <!-- /.box-body -->
</div>
          <!-- /.box -->
          
