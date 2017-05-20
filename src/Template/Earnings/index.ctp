
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">受注一覧</h3>

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
                <th><?= $this->Paginator->sort('id',['label' => '受注番号']) ?></th>
                <th><?= $this->Paginator->sort('sei_name',['label' => '姓']) ?></th>
                <th><?= $this->Paginator->sort('mei_name',['label' => '名']) ?></th>
                <th><?= $this->Paginator->sort('sei_kana',['label' => 'セイ']) ?></th>
                <th><?= $this->Paginator->sort('mei_kana',['label' => 'メイ']) ?></th>
                <th><?= $this->Paginator->sort('mail_no',['label' => '郵便番号']) ?></th>
                <th><?= $this->Paginator->sort('mail_add',['label' => 'お届け先住所']) ?></th>
                <th><?= $this->Paginator->sort('user_tel',['label' => '電話番号']) ?></th>
                <th><?= $this->Paginator->sort('created',['label' => '受注日時']) ?></th>
                <th><?= $this->Paginator->sort('user_id',['label' => 'ID']) ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $this->Number->format($order->id) ?></td>
                    <td><?= h($order->sei_name) ?></td>
                    <td><?= h($order->mei_name) ?></td>
                    <td><?= h($order->sei_kana) ?></td>
                    <td><?= h($order->mei_kana) ?></td>
                    <td><?= h($order->mail_no) ?></td>
                    <td><?= h($order->mail_add) ?></td>
                    <td><?= h($order->user_tel) ?></td>
                    <td><?= h($order->created->format('Y年n月j日G時i分')) ?></td>
                    <td><?= h($order->user_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('詳細'), ['action' => 'order_detail', $order->id]) ?>
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