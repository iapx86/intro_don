<div class="songs form">
<?php echo $this->Form->create('Song'); ?>
	<fieldset>
		<legend><?php echo __('iTunes Search'); ?></legend>
	<?php
		echo $this->Form->input('term');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Songs'), array('action' => 'index')); ?></li>
	</ul>
</div>
