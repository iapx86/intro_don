<div id="main">
	<h1>♪イントロドン♪<span>～曲を聴いて曲名を当てよう！～</span></h1>
	<div id="wrap_answer">
		<?php echo $this->Form->create(array('url' => array('action' => $question < MAX_QUESTION ? 'question' : 'result'))); ?>
		<?php if ($judge[$question]): ?>
			<p class="judge_text">正解！</p>
			<p class="judge_img correct">◎</p>
		<?php else: ?>
			<p class="judge_text">不正解！</p>
			<p class="judge_img wrong">×</p>
		<?php endif; ?>
			<p><img src="<?php echo $songs[$correct[$question]]['Song']['jacket_img']; ?>"></p>
			<p class="correct_answer"><?php echo $songs[$correct[$question]]['Song']['title']; ?><span><?php echo $songs[$correct[$question]]['Song']['artist']; ?></span></p>
			<p class="next"><?php echo $this->Form->submit($question < MAX_QUESTION ? '次へ' : '結果発表', array('div' => false)); ?></p>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
