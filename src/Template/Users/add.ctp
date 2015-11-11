<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Deposits'), ['controller' => 'Deposits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deposit'), ['controller' => 'Deposits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
		   	  echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('Location');
			echo $this->Form->input('Country');
			echo $this->Form->input('Phone');
			echo $this->Form->input('Identification');
			echo $this->Form->input('Type', ['type' => 'select', 'options' => ['Driver\'s License', 'Passport', 'National ID Card']]);           
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
