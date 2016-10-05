<div class="games form">
<?php echo $this->Form->create('Game'); ?>
	<fieldset>
		<legend><?php echo __('Add Game'); ?></legend>
	<?php
		echo $this->Form->input('question1_correct_songid');
		echo $this->Form->input('question1_select1_songid');
		echo $this->Form->input('question1_select2_songid');
		echo $this->Form->input('question1_select3_songid');
		echo $this->Form->input('question1_select4_songid');
		echo $this->Form->input('question2_correct_songid');
		echo $this->Form->input('question2_select1_songid');
		echo $this->Form->input('question2_select2_songid');
		echo $this->Form->input('question2_select3_songid');
		echo $this->Form->input('question2_select4_songid');
		echo $this->Form->input('question3_correct_songid');
		echo $this->Form->input('question3_select1_songid');
		echo $this->Form->input('question3_select2_songid');
		echo $this->Form->input('question3_select3_songid');
		echo $this->Form->input('question3_select4_songid');
		echo $this->Form->input('question4_correct_songid');
		echo $this->Form->input('question4_select1_songid');
		echo $this->Form->input('question4_select2_songid');
		echo $this->Form->input('question4_select3_songid');
		echo $this->Form->input('question4_select4_songid');
		echo $this->Form->input('question5_correct_songid');
		echo $this->Form->input('question5_select1_songid');
		echo $this->Form->input('question5_select2_songid');
		echo $this->Form->input('question5_select3_songid');
		echo $this->Form->input('question5_select4_songid');
		echo $this->Form->input('question6_correct_songid');
		echo $this->Form->input('question6_select1_songid');
		echo $this->Form->input('question6_select2_songid');
		echo $this->Form->input('question6_select3_songid');
		echo $this->Form->input('question6_select4_songid');
		echo $this->Form->input('question7_correct_songid');
		echo $this->Form->input('question7_select1_songid');
		echo $this->Form->input('question7_select2_songid');
		echo $this->Form->input('question7_select3_songid');
		echo $this->Form->input('question7_select4_songid');
		echo $this->Form->input('question8_correct_songid');
		echo $this->Form->input('question8_select1_songid');
		echo $this->Form->input('question8_select2_songid');
		echo $this->Form->input('question8_select3_songid');
		echo $this->Form->input('question8_select4_songid');
		echo $this->Form->input('question9_correct_songid');
		echo $this->Form->input('question9_select1_songid');
		echo $this->Form->input('question9_select2_songid');
		echo $this->Form->input('question9_select3_songid');
		echo $this->Form->input('question9_select4_songid');
		echo $this->Form->input('question10_correct_songid');
		echo $this->Form->input('question10_select1_songid');
		echo $this->Form->input('question10_select2_songid');
		echo $this->Form->input('question10_select3_songid');
		echo $this->Form->input('question10_select4_songid');
		echo $this->Form->input('entry_user1');
		echo $this->Form->input('entry_user2');
		echo $this->Form->input('entry_user3');
		echo $this->Form->input('entry_user4');
		echo $this->Form->input('entry_user5');
		echo $this->Form->input('gold_user');
		echo $this->Form->input('silver_user');
		echo $this->Form->input('bronze_user');
		echo $this->Form->input('gold_score');
		echo $this->Form->input('silver_score');
		echo $this->Form->input('bronze_score');
		echo $this->Form->input('host');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Games'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
	</ul>
</div>
