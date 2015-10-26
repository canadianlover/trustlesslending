<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Deposits'), ['controller' => 'Deposits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deposit'), ['controller' => 'Deposits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></tr>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Deposits') ?></h4>
        <?php if (!empty($user->deposits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Repay Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->deposits as $deposits): ?>
            <tr>
                <td><?= h($deposits->id) ?></td>
                <td><?= h($deposits->user_id) ?></td>
                <td><?= h($deposits->amount) ?></td>
                <td><?= h($deposits->date) ?></td>
                <td><?= h($deposits->repay_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Deposits', 'action' => 'view', $deposits->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Deposits', 'action' => 'edit', $deposits->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deposits', 'action' => 'delete', $deposits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deposits->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
