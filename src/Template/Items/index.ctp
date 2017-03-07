<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">アイテム一覧</h3>

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
                <th><?= $this->Paginator->sort('id','アイテムID') ?></th>
                <th><?= $this->Paginator->sort('item_name','アイテム名') ?></th>
                <th><?= $this->Paginator->sort('item_type_id','カテゴリ') ?></th>
                <th><?= $this->Paginator->sort('item_qty','個数') ?></th>
                <th><?= $this->Paginator->sort('item_price','価格') ?></th>
                <th><?= $this->Paginator->sort('created','登録日時') ?></th>
                <th><?= $this->Paginator->sort('modified','更新日時') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $this->Number->format($item->id) ?></td>
                <td><?= h($item->item_name) ?></td>
                <td><?= $item->has('item_type') ? $this->Html->link($item->item_type->type_name, ['controller' => 'ItemTypes', 'action' => 'view', $item->item_type->id]) : '' ?></td>
                <td><?= $this->Number->format($item->item_qty) ?></td>
                <td><?= $this->Number->format($item->item_price).'円' ?></td>
                <td><?= h($item->created->format('Y年n月j日')) ?></td>
                <td><?= h($item->modified->format('Y年n月j日')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $item->id], ['confirm' => __('本当に削除してよろしいですか？ # {0}?', $item->id)]) ?>
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