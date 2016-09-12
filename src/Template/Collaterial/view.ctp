<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Collaterial'), ['action' => 'edit', $collaterial->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Collaterial'), ['action' => 'delete', $collaterial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collaterial->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Collaterial'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collaterial'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="collaterial view large-9 medium-8 columns content">
    <h3><?= h($collaterial->collaterial) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($collaterial->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($collaterial->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Loan Id') ?></th>
            <td><?= $this->Number->format($collaterial->loan_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Escrow') ?></th>
            <td><?= $this->Number->format($collaterial->escrow) ?></td>
        </tr>
        <tr>
            <th><?= __('Details') ?></th>
            <td><?= h($collaterial->details) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Loans') ?></h4>
        <?php if (!empty($collaterial->loans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Lender Id') ?></th>
                <th><?= __('Lendee Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Collaterial Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($collaterial->loans as $loans): ?>
            <tr>
                <td><?= h($loans->id) ?></td>
                <td><?= h($loans->lender_id) ?></td>
                <td><?= h($loans->lendee_id) ?></td>
                <td><?= h($loans->amount) ?></td>
                <td><?= h($loans->collaterial_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Loans', 'action' => 'view', $loans->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Loans', 'action' => 'edit', $loans->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Loans', 'action' => 'delete', $loans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loans->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
