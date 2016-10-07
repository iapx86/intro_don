<div class="games result">
	<h2><?php echo __('Result '); ?></h2>
	<table>
		<tr><th>#</th><th>title</th><th>judge</th></tr>
		<?php for ($i = 1; $i <= MAX_QUESTION; $i++): ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $songs[$correct[$i]]['Song']['artist'].' / '.$songs[$correct[$i]]['Song']['title']; ?></td>
				<td><?php echo $judge[$i] ? 'correct' : 'wrong'; ?></td>
			</tr>
		<?php endfor; ?>
	</table>
	<?php echo $this->Html->link(__('Retry'), array('action' => 'start')); ?>
</div>
