<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $item->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Item Types'), ['controller' => 'ItemTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Type'), ['controller' => 'ItemTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Imgs'), ['controller' => 'ItemImgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Img'), ['controller' => 'ItemImgs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Edit Item') ?></legend>
        <?php
            echo $this->Form->input('item_name');
            echo $this->Form->input('item_type_id', ['options' => $itemTypes]);
            echo $this->Form->input('item_qty');
            echo $this->Form->input('item_price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
