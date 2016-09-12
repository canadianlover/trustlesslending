<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $loan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Collaterial'), ['controller' => 'Collaterial', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Collaterial'), ['controller' => 'Collaterial', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loans form large-9 medium-8 columns content">
    <?= $this->Form->create($loan) ?>
    <fieldset>
        <legend><?= __('Edit Loan') ?></legend>
        <?php
            echo $this->Form->input('lender_id', ['options' => $users]);
            echo $this->Form->input('lendee_id');
            echo $this->Form->input('amount');
            echo $this->Form->input('collaterial_id');
            echo $this->Form->input('collaterial._ids', ['options' => $collaterial]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
