<div class="games answer">
<h2><?php echo __('Answer '.$question); ?></h2>
	<dl>
		<dt><?php echo __('correct'); ?></dt>
		<dd>
			<?php echo $songs[$correct[$question]]['Song']['artist'].' / '.$songs[$correct[$question]]['Song']['title']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('select1'); ?></dt>
		<dd>
			<?php echo $songs[$select[$question][1]]['Song']['artist'].' / '.$songs[$select[$question][1]]['Song']['title']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('select2'); ?></dt>
		<dd>
			<?php echo $songs[$select[$question][2]]['Song']['artist'].' / '.$songs[$select[$question][2]]['Song']['title']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('select3'); ?></dt>
		<dd>
			<?php echo $songs[$select[$question][3]]['Song']['artist'].' / '.$songs[$select[$question][3]]['Song']['title']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('select4'); ?></dt>
		<dd>
			<?php echo $songs[$select[$question][4]]['Song']['artist'].' / '.$songs[$select[$question][4]]['Song']['title']; ?>
			&nbsp;
		</dd>
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
	if ($question < 10) {
		echo $this->Form->postLink(__('Next'), array('action' => 'question'));
	}
	else {
		echo $this->Form->postLink(__('Result'), array('action' => 'result'));
	}
	?>
</div>
