<div class="scores view">
<h2><?php echo __('Score'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($score['Score']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Score'); ?></dt>
		<dd>
			<?php echo h($score['Score']['first_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Second Score'); ?></dt>
		<dd>
			<?php echo h($score['Score']['second_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Third Score'); ?></dt>
		<dd>
			<?php echo h($score['Score']['third_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fourth Score'); ?></dt>
		<dd>
			<?php echo h($score['Score']['fourth_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fifth Score'); ?></dt>
		<dd>
			<?php echo h($score['Score']['fifth_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($score['Score']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($score['Score']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Score'), array('action' => 'edit', $score['Score']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Score'), array('action' => 'delete', $score['Score']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $score['Score']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('action' => 'add')); ?> </li>
	</ul>
</div>
