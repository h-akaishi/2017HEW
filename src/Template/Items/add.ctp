<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('アイテム一覧'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('アイテム種別一覧'), ['controller' => 'ItemTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('アイテム種別追加'), ['controller' => 'ItemTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('アイテム画像一覧'), ['controller' => 'ItemImgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('アイテム画像追加'), ['controller' => 'ItemImgs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('アイテム追加') ?></legend>
        <?php
            echo $this->Form->input('item_name');
            //echo $this->Form->input('item_type_id', ['options' => $itemTypes]);
            echo $this->Form->input('item_type_id', ['options' => $itemTypes]);
            echo $this->Form->input('item_qty');
            echo $this->Form->input('item_price');
            echo $this->Form->file('img');
        ?>
    </fieldset>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>
