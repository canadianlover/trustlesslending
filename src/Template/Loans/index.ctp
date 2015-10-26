<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Collaterial'), ['controller' => 'Collaterial', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Collaterial'), ['controller' => 'Collaterial', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loans index large-9 medium-8 columns content">
    <h3><?= __('Loans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('lender_id') ?></th>
                <th><?= $this->Paginator->sort('lendee_id') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('collaterial_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loans as $loan): ?>
            <tr>
                <td><?= $this->Number->format($loan->id) ?></td>
                <td><?= $loan->has('user') ? $this->Html->link($loan->user->id, ['controller' => 'Users', 'action' => 'view', $loan->user->id]) : '' ?></td>
                <td><?= $this->Number->format($loan->lendee_id) ?></td>
                <td><?= $this->Number->format($loan->amount) ?></td>
                <td><?= $this->Number->format($loan->collaterial_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $loan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
