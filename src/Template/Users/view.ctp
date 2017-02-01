<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Sei Name') ?></th>
            <td><?= h($user->sei_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Mei Name') ?></th>
            <td><?= h($user->mei_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Sei Kana') ?></th>
            <td><?= h($user->sei_kana) ?></td>
        </tr>
        <tr>
            <th><?= __('Mei Kana') ?></th>
            <td><?= h($user->mei_kana) ?></td>
        </tr>
        <tr>
            <th><?= __('User Sex') ?></th>
            <td><?= h($user->user_sex) ?></td>
        </tr>
        <tr>
            <th><?= __('Mail No') ?></th>
            <td><?= h($user->mail_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Mail Add') ?></th>
            <td><?= h($user->mail_add) ?></td>
        </tr>
        <tr>
            <th><?= __('User Tel') ?></th>
            <td><?= h($user->user_tel) ?></td>
        </tr>
        <tr>
            <th><?= __('User Mail') ?></th>
            <td><?= h($user->user_mail) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Rule') ?></th>
            <td><?= h($user->rule) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Birth') ?></th>
            <td><?= h($user->birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
    </table>
</div>
