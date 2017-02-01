<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item Img'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemImgs index large-9 medium-8 columns content">
    <h3><?= __('Item Imgs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('item_id') ?></th>
                <th><?= $this->Paginator->sort('item_url') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itemImgs as $itemImg): ?>
            <tr>
                <td><?= $this->Number->format($itemImg->id) ?></td>
                <td><?= $itemImg->has('item') ? $this->Html->link($itemImg->item->id, ['controller' => 'Items', 'action' => 'view', $itemImg->item->id]) : '' ?></td>
                <td><?= h($itemImg->item_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itemImg->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemImg->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemImg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemImg->id)]) ?>
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
