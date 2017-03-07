
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">会員一覧</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                <th><?= $this->Paginator->sort('id',['label' => 'ID']) ?></th>
                <th><?= $this->Paginator->sort('sei_name',['label' => '姓']) ?></th>
                <th><?= $this->Paginator->sort('mei_name',['label' => '名']) ?></th>
                <th><?= $this->Paginator->sort('sei_kana',['label' => 'セイ']) ?></th>
                <th><?= $this->Paginator->sort('mei_kana',['label' => 'メイ']) ?></th>
                <th><?= $this->Paginator->sort('user_sex',['label' => '性別']) ?></th>
                <th><?= $this->Paginator->sort('birth',['label' => '生年月日']) ?></th>
                <th><?= $this->Paginator->sort('mail_no',['label' => '郵便番号']) ?></th>
                <th><?= $this->Paginator->sort('mail_add',['label' => '住所']) ?></th>
                <th><?= $this->Paginator->sort('user_tel',['label' => '電話番号']) ?></th>
                <th><?= $this->Paginator->sort('user_mail',['label' => 'メールアドレス']) ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->sei_name) ?></td>
                    <td><?= h($user->mei_name) ?></td>
                    <td><?= h($user->sei_kana) ?></td>
                    <td><?= h($user->mei_kana) ?></td>
                    <td><?= h($user->user_sex) ?></td>
                    <td><?= h($user->birth->format('Y年n月j日')) ?></td>
                    <td><?= h($user->mail_no) ?></td>
                    <td><?= h($user->mail_add) ?></td>
                    <td><?= h($user->user_tel) ?></td>
                    <td><?= h($user->user_mail) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('本当に削除してよろしいですか？ ID {0}', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
              </table>
              <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
