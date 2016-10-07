<div class="games answer">
<h2><?php echo __('Answer '.$question); ?></h2>
	<dl>
		<dt><?php echo __('correct'); ?></dt>
		<dd>
			<?php echo $correct; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('select1'); ?></dt>
		<dd>
			<?php echo $select[1]; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('select2'); ?></dt>
		<dd>
			<?php echo $select[2]; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('select3'); ?></dt>
		<dd>
			<?php echo $select[3]; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('select4'); ?></dt>
		<dd>
			<?php echo $select[4]; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('answer'); ?></dt>
		<dd>
			<?php echo $answer; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('judge'); ?></dt>
		<dd>
			<?php echo $judge ? 'correct' : 'wrong'; ?>
			&nbsp;
		</dd>
	</dl>
	<?php
	if ($question < 10) {
		echo $this->Form->postLink(__('Next'), array('action' => 'question'));
	}
	else {
		echo $this->Form->postLink(__('Result'), array('action' => 'result'));
	}
	?>
</div>
