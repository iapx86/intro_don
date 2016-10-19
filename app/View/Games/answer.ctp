<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<div id="wrap_answer">
		<?php echo $this->Form->create(array('url' => array('action' => $question < MAX_QUESTION ? 'question' : 'result'))); ?>
			<div class="correct_answer"><?php echo $songs[$correct[$question]]['Song']['title']; ?>
				<span><?php echo $songs[$correct[$question]]['Song']['artist']; ?></span>
				<img src="<?php echo $songs[$correct[$question]]['Song']['jacket_img']; ?>">
			</div>
			<?php if ($question < MAX_QUESTION): ?>
				<p class="next"><?php echo $this->Form->submit('次へ', array('div' => false, 'class' => 'btn_next')); ?></p>
			<?php else: ?>
				<p class="next"><?php echo $this->Form->submit('結果発表', array('div' => false, 'class' => 'btn_result')); ?></p>
			<?php endif; ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<script>
	$(function(){
		var audio, audio2 = new Audio("<?php echo $songs[$correct[$question]]['Song']['preview']; ?>");

		if (<?php echo $judge[$question] ? 'true' : 'false'; ?>) {
			audio = new Audio("/intro_don/files/right.mp3");
			audio.play();
            $("#wrap_answer").addClass("wrap_correct");
		}
		else {
			audio = new Audio("/intro_don/files/mistake.mp3");
			audio.play();
            $("#wrap_answer").addClass("wrap_wrong");
		}
		setTimeout(function(){audio2.play()}, 1000);
	});
</script>
