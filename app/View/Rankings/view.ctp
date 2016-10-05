<div class="rankings view">
<h2><?php echo __('Ranking'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ranking['Game']['id'], array('controller' => 'games', 'action' => 'view', $ranking['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ranking['User']['id'], array('controller' => 'users', 'action' => 'view', $ranking['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Score'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['user_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Event'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['start_event']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Event'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['end_event']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifid'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['modifid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ranking'), array('action' => 'edit', $ranking['Ranking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ranking'), array('action' => 'delete', $ranking['Ranking']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ranking['Ranking']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
