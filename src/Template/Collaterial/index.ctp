<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Collaterial'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="collaterial index large-9 medium-8 columns content">
    <h3><?= __('Collaterial') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('loan_id') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('escrow') ?></th>
                <th><?= $this->Paginator->sort('details') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($collaterial as $collaterial): ?>
            <tr>
                <td><?= $this->Number->format($collaterial->id) ?></td>
                <td><?= $this->Number->format($collaterial->loan_id) ?></td>
                <td><?= h($collaterial->type); ?></td>
                <td><?= $this->Number->format($collaterial->escrow) ?></td>
                <td><?= h($collaterial->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $collaterial->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $collaterial->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $collaterial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collaterial->id)]) ?>
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
