<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item Img'), ['action' => 'edit', $itemImg->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Img'), ['action' => 'delete', $itemImg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemImg->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Imgs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Img'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemImgs view large-9 medium-8 columns content">
    <h3><?= h($itemImg->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Item') ?></th>
            <td><?= $itemImg->has('item') ? $this->Html->link($itemImg->item->id, ['controller' => 'Items', 'action' => 'view', $itemImg->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Item Url') ?></th>
            <td><?= h($itemImg->item_url) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemImg->id) ?></td>
        </tr>
    </table>
</div>
