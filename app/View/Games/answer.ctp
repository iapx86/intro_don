<div class="games answer">
	<h2><?php echo __('Answer ' . $question); ?></h2>
	<dl>
		<dt><?php echo __('correct'); ?></dt>
		<dd>
			<?php echo $songs[$correct[$question]]['Song']['artist'] . ' / ' . $songs[$correct[$question]]['Song']['title']; ?>
			&nbsp;
		</dd>
		<?php for ($i = 1; $i <= MAX_SELECT; $i++): ?>
			<dt><?php echo __('select' . $i); ?></dt>
			<dd>
				<?php echo $songs[$select[$question][$i]]['Song']['artist'] . ' / ' . $songs[$select[$question][$i]]['Song']['title']; ?>
				&nbsp;
			</dd>
		<?php endfor; ?>
		<dt><?php echo __('answer'); ?></dt>
		<dd>
			<?php echo $answer[$question]; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('judge'); ?></dt>
		<dd>
			<?php echo $judge[$question] ? 'correct' : 'wrong'; ?>
			&nbsp;
		</dd>
	</dl>
	<?php
	if ($question < MAX_QUESTION) {
		echo $this->Form->postLink(__('Next'), array('action' => 'question'));
	} else {
		echo $this->Form->postLink(__('Result'), array('action' => 'result'));
	}
	?>
</div>
