<h2>Add new collaterial</h2>
<?php
	echo $this->Form->create();
	echo $this->Form->radio('type', [['value' => 'D', 'text' => 'Digital'], ['value' => 'P', 'text' => 'Physical']]); 
	
	echo $this->Form->input('escrow', ['type' => 'select', 'options' => array($escrow)]);
	echo $this->Form->input('collaterial');
	echo $this->Form->textarea('details');
	echo $this->Form->button(__('Add collaterial'));
	echo $this->Form->end();
	?>