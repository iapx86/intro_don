<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sum Answer'); ?></dt>
		<dd>
			<?php echo h($user['User']['sum_answer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sum Correct'); ?></dt>
		<dd>
			<?php echo h($user['User']['sum_correct']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($user['User']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sum Score'); ?></dt>
		<dd>
			<?php echo h($user['User']['sum_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gold Count'); ?></dt>
		<dd>
			<?php echo h($user['User']['gold_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Silver Count'); ?></dt>
		<dd>
			<?php echo h($user['User']['silver_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blonze Count'); ?></dt>
		<dd>
			<?php echo h($user['User']['blonze_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Logs'); ?></h3>
	<?php if (!empty($user['Log'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Game Id'); ?></th>
		<th><?php echo __('Score'); ?></th>
		<th><?php echo __('Botton Number'); ?></th>
		<th><?php echo __('Correct'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Log'] as $log): ?>
		<tr>
			<td><?php echo $log['id']; ?></td>
			<td><?php echo $log['user_id']; ?></td>
			<td><?php echo $log['game_id']; ?></td>
			<td><?php echo $log['score']; ?></td>
			<td><?php echo $log['botton_number']; ?></td>
			<td><?php echo $log['correct']; ?></td>
			<td><?php echo $log['created']; ?></td>
			<td><?php echo $log['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'logs', 'action' => 'view', $log['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'logs', 'action' => 'edit', $log['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'logs', 'action' => 'delete', $log['id']), array('confirm' => __('Are you sure you want to delete # %s?', $log['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Rankings'); ?></h3>
	<?php if (!empty($user['Ranking'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Game Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('User Score'); ?></th>
		<th><?php echo __('Start Event'); ?></th>
		<th><?php echo __('End Event'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modifid'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Ranking'] as $ranking): ?>
		<tr>
			<td><?php echo $ranking['id']; ?></td>
			<td><?php echo $ranking['game_id']; ?></td>
			<td><?php echo $ranking['user_id']; ?></td>
			<td><?php echo $ranking['user_score']; ?></td>
			<td><?php echo $ranking['start_event']; ?></td>
			<td><?php echo $ranking['end_event']; ?></td>
			<td><?php echo $ranking['created']; ?></td>
			<td><?php echo $ranking['modifid']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rankings', 'action' => 'view', $ranking['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rankings', 'action' => 'edit', $ranking['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rankings', 'action' => 'delete', $ranking['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ranking['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
