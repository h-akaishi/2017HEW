<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item Type'), ['action' => 'edit', $itemType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Type'), ['action' => 'delete', $itemType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemTypes view large-9 medium-8 columns content">
    <h3><?= h($itemType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Type Name') ?></th>
            <td><?= h($itemType->type_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <?php if (!empty($itemType->items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Item Name') ?></th>
                <th><?= __('Item Type Id') ?></th>
                <th><?= __('Item Qty') ?></th>
                <th><?= __('Item Price') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($itemType->items as $items): ?>
            <tr>
                <td><?= h($items->id) ?></td>
                <td><?= h($items->item_name) ?></td>
                <td><?= h($items->item_type_id) ?></td>
                <td><?= h($items->item_qty) ?></td>
                <td><?= h($items->item_price) ?></td>
                <td><?= h($items->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
