<div class="games result">
<h2><?php echo __('Result '); ?></h2>
	<table>
		<tr><th>#</th><th>id</th><th>judge</th></tr>
		<?php for ($i = 1; $i <= 10; $i++): ?>
			<tr><td><?php echo $i; ?></td><td><?php echo $correct[$i]; ?></td><td><?php echo $judge[$i] ? 'correct' : 'wrong'; ?></td></tr>
		<?php endfor; ?>
	</table>
	<?php echo $this->Html->link(__('Retry'), array('action' => 'start')); ?>
</div>
