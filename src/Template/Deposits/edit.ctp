<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deposit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deposit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Deposits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deposits form large-9 medium-8 columns content">
    <?= $this->Form->create($deposit) ?>
    <fieldset>
        <legend><?= __('Edit Deposit') ?></legend>
        <?php
            echo $this->Form->input('user_id');
            echo $this->Form->input('amount');
            echo $this->Form->input('date');
            echo $this->Form->input('repay_date');
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
