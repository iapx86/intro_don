<div class="songs index">
	<h2><?php echo __('Songs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('artist'); ?></th>
			<th><?php echo $this->Paginator->sort('genre'); ?></th>
			<th><?php echo $this->Paginator->sort('album'); ?></th>
			<th><?php echo $this->Paginator->sort('jacket_img'); ?></th>
			<th><?php echo $this->Paginator->sort('preview'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($songs as $song): ?>
	<tr>
		<td><?php echo h($song['Song']['id']); ?>&nbsp;</td>
		<td><?php echo h($song['Song']['title']); ?>&nbsp;</td>
		<td><?php echo h($song['Song']['artist']); ?>&nbsp;</td>
		<td><?php echo h($song['Song']['genre']); ?>&nbsp;</td>
		<td><?php echo h($song['Song']['album']); ?>&nbsp;</td>
		<td><?php echo h($song['Song']['jacket_img']); ?>&nbsp;</td>
		<td><?php echo h($song['Song']['preview']); ?>&nbsp;</td>
		<td><?php echo h($song['Song']['created']); ?>&nbsp;</td>
		<td><?php echo h($song['Song']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $song['Song']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('iTunes Serach'), array('action' => 'search')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete Duplicated Songs'), array('action' => 'deleteDup')); ?></li>
	</ul>
</div>
