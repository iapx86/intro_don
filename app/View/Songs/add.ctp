<div class="songs form">
<?php echo $this->Form->create('Song'); ?>
	<fieldset>
		<legend><?php echo __('Add Song'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('artist');
		echo $this->Form->input('genre');
		echo $this->Form->input('album');
		echo $this->Form->input('jacket_img');
		echo $this->Form->input('preview');
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
