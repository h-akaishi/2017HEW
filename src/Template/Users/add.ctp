<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('sei_name');
            echo $this->Form->input('mei_name');
            echo $this->Form->input('sei_kana');
            echo $this->Form->input('mei_kana');
            echo $this->Form->input('user_sex');
            /*echo $this->Form->input('birth', ['empty' => true]);*/
            echo $this->Form->input('birth', array(
                'label' => '生年月日',
                'type' => 'date',
                'dataFormat' => 'YMD',
                'monthNames' => false,
                'maxYear' => date('Y'),
                'minYear' => date('Y') - 100,
                ));
            echo $this->Form->input('mail_no');
            echo $this->Form->input('mail_add');
            echo $this->Form->input('user_tel');
            echo $this->Form->input('user_mail');
            echo $this->Form->input('password');
            echo $this->Form->input('rule');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
