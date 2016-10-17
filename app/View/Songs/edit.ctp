<div class="songs form">
<?php echo $this->Form->create('Song'); ?>
	<fieldset>
		<legend><?php echo __('Edit Song'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Song.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Song.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Songs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('iTunes Serach'), array('action' => 'search')); ?></li>
	</ul>
</div>
