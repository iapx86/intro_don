<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<div id="wrap_answer">
		<?php echo $this->Form->create(array('url' => array('action' => $question < MAX_QUESTION ? 'question' : 'result'))); ?>
			<audio preload="auto" id="demo" autoplay>
				<source src="<?php echo $songs[$correct[$question]]['Song']['preview']; ?>" type="audio/mp4">
			</audio>
		<?php if ($judge[$question]): ?>
			<p class="judge_text correct"></p>
		<?php else: ?>
			<p class="judge_text wrong"></p>
		<?php endif; ?>
			<div class="correct_answer"><?php echo $songs[$correct[$question]]['Song']['title']; ?>
				<span><?php echo $songs[$correct[$question]]['Song']['artist']; ?></span>
				<img src="<?php echo $songs[$correct[$question]]['Song']['jacket_img']; ?>">
			</div>
			<p class="next"><?php echo $this->Form->submit($question < MAX_QUESTION ? '次へ' : '結果発表', array('div' => false)); ?></p>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<script>
	$(function(){
		if($('.correct').length){
			$("#wrap_answer").addClass("wrap_correct");
		} else{
			$("#wrap_answer").addClass("wrap_wrong");
		}
	});
</script>
