<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Types'), ['controller' => 'ItemTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Type'), ['controller' => 'ItemTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Imgs'), ['controller' => 'ItemImgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Img'), ['controller' => 'ItemImgs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items index large-9 medium-8 columns content">
    <h3><?= __('Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
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
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->id) ?></td>
                <td><?= h($item->item_name) ?></td>
                <td><?= $item->has('item_type') ? $this->Html->link($item->item_type->type_name, ['controller' => 'ItemTypes', 'action' => 'view', $item->item_type->id]) : '' ?></td>
                <td><?= $this->Number->format($item->item_qty) ?></td>
                <td><?= $this->Number->format($item->item_price) ?></td>
                <td><?= h($item->created) ?></td>
                <td><?= h($item->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
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
