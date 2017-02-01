<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item Types'), ['controller' => 'ItemTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Type'), ['controller' => 'ItemTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item Imgs'), ['controller' => 'ItemImgs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Img'), ['controller' => 'ItemImgs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Item Name') ?></th>
            <td><?= h($item->item_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Item Type') ?></th>
            <td><?= $item->has('item_type') ? $this->Html->link($item->item_type->id, ['controller' => 'ItemTypes', 'action' => 'view', $item->item_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Item Qty') ?></th>
            <td><?= $this->Number->format($item->item_qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Item Price') ?></th>
            <td><?= $this->Number->format($item->item_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($item->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($item->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Item Imgs') ?></h4>
        <?php if (!empty($item->item_imgs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Item Url') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->item_imgs as $itemImgs): ?>
            <tr>
                <td><?= h($itemImgs->id) ?></td>
                <td><?= h($itemImgs->item_id) ?></td>
                <td><?= h($itemImgs->item_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ItemImgs', 'action' => 'view', $itemImgs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ItemImgs', 'action' => 'edit', $itemImgs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ItemImgs', 'action' => 'delete', $itemImgs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemImgs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
