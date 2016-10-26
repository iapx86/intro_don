<div class="games index">
	<h2><?php echo __('Games'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('question1_correct_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question1_select1_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question1_select2_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question1_select3_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question1_select4_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question2_correct_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question2_select1_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question2_select2_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question2_select3_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question2_select4_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question3_correct_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question3_select1_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question3_select2_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question3_select3_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question3_select4_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question4_correct_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question4_select1_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question4_select2_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question4_select3_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question4_select4_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question5_correct_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question5_select1_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question5_select2_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question5_select3_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question5_select4_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question6_correct_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question6_select1_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question6_select2_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question6_select3_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question6_select4_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question7_correct_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question7_select1_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question7_select2_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question7_select3_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question7_select4_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question8_correct_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question8_select1_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question8_select2_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question8_select3_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question8_select4_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question9_correct_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question9_select1_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question9_select2_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question9_select3_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question9_select4_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question10_correct_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question10_select1_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question10_select2_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question10_select3_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('question10_select4_songid'); ?></th>
			<th><?php echo $this->Paginator->sort('entry_user1'); ?></th>
			<th><?php echo $this->Paginator->sort('entry_user2'); ?></th>
			<th><?php echo $this->Paginator->sort('entry_user3'); ?></th>
			<th><?php echo $this->Paginator->sort('entry_user4'); ?></th>
			<th><?php echo $this->Paginator->sort('entry_user5'); ?></th>
			<th><?php echo $this->Paginator->sort('gold_user'); ?></th>
			<th><?php echo $this->Paginator->sort('silver_user'); ?></th>
			<th><?php echo $this->Paginator->sort('bronze_user'); ?></th>
			<th><?php echo $this->Paginator->sort('gold_score'); ?></th>
			<th><?php echo $this->Paginator->sort('silver_score'); ?></th>
			<th><?php echo $this->Paginator->sort('bronze_score'); ?></th>
			<th><?php echo $this->Paginator->sort('host'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($games as $game): ?>
	<tr>
		<td><?php echo h($game['Game']['id']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question1_correct_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question1_select1_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question1_select2_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question1_select3_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question1_select4_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question2_correct_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question2_select1_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question2_select2_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question2_select3_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question2_select4_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question3_correct_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question3_select1_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question3_select2_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question3_select3_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question3_select4_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question4_correct_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question4_select1_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question4_select2_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question4_select3_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question4_select4_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question5_correct_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question5_select1_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question5_select2_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question5_select3_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question5_select4_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question6_correct_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question6_select1_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question6_select2_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question6_select3_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question6_select4_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question7_correct_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question7_select1_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question7_select2_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question7_select3_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question7_select4_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question8_correct_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question8_select1_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question8_select2_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question8_select3_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question8_select4_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question9_correct_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question9_select1_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question9_select2_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question9_select3_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question9_select4_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question10_correct_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question10_select1_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question10_select2_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question10_select3_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['question10_select4_songid']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['entry_user1']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['entry_user2']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['entry_user3']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['entry_user4']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['entry_user5']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['gold_user']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['silver_user']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['bronze_user']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['gold_score']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['silver_score']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['bronze_score']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['host']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['created']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $game['Game']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
	</ul>
</div>
