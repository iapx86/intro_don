<div class="rankings form">
<?php echo $this->Form->create('Ranking'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ranking'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('game_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('user_score');
		echo $this->Form->input('start_event');
		echo $this->Form->input('end_event');
		echo $this->Form->input('modifid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ranking.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Ranking.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
