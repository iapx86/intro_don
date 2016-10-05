<div class="scores form">
<?php echo $this->Form->create('Score'); ?>
	<fieldset>
		<legend><?php echo __('Add Score'); ?></legend>
	<?php
		echo $this->Form->input('first_score');
		echo $this->Form->input('second_score');
		echo $this->Form->input('third_score');
		echo $this->Form->input('fourth_score');
		echo $this->Form->input('fifth_score');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Scores'), array('action' => 'index')); ?></li>
	</ul>
</div>
