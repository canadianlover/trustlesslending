<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Loan'), ['action' => 'edit', $loan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Loan'), ['action' => 'delete', $loan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Collaterial'), ['controller' => 'Collaterial', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collaterial'), ['controller' => 'Collaterial', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loans view large-9 medium-8 columns content">
    <h3><?= h($loan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $loan->has('user') ? $this->Html->link($loan->user->id, ['controller' => 'Users', 'action' => 'view', $loan->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($loan->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Lendee Id') ?></th>
            <td><?= $this->Number->format($loan->lendee_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($loan->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Collaterial Id') ?></th>
            <td><?= $this->Number->format($loan->collaterial_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Collaterial') ?></h4>
        <?php if (!empty($loan->collaterial)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Loan Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Escrow') ?></th>
                <th><?= __('Details') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($loan->collaterial as $collaterial): ?>
            <tr>
                <td><?= h($collaterial->id) ?></td>
                <td><?= h($collaterial->loan_id) ?></td>
                <td><?= h($collaterial->type) ?></td>
                <td><?= h($collaterial->escrow) ?></td>
                <td><?= h($collaterial->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Collaterial', 'action' => 'view', $collaterial->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Collaterial', 'action' => 'edit', $collaterial->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Collaterial', 'action' => 'delete', $collaterial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collaterial->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
