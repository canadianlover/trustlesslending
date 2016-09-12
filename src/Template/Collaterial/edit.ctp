<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $collaterial->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $collaterial->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Collaterial'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="collaterial form large-9 medium-8 columns content">
    <?= $this->Form->create($collaterial) ?>
    <fieldset>
        <legend><?= __('Edit Collaterial') ?></legend>
        <?php
            echo $this->Form->input('loan_id');
            echo $this->Form->input('type');
            echo $this->Form->input('escrow');
            echo $this->Form->input('details');
            echo $this->Form->input('loans._ids', ['options' => $loans]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
