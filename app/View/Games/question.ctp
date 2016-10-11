<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main">
	<h1>♪イントロドン♪<span>～曲を聴いて曲名を当てよう！～</span></h1>
	<div id="wrap_question">
		<p class="text_click">ボタンを押してね！</p>
		<?php echo $this->Form->create(array('url' => array('action' => 'answer'))); ?>
			<audio preload="auto" id="demo" controls >
				<source src="<?php echo $songs[$correct[$question]]['Song']['preview']; ?>#t=0,0.3" type="audio/mp4">
			</audio>
			<ul id="song_list">
			<?php for ($i = 1; $i <= MAX_SELECT; $i++): ?>
				<li><?php echo $this->Form->button($songs[$select[$question][$i]]['Song']['title'].'<span>'.$songs[$select[$question][$i]]['Song']['artist'].'</span>',
						array('type' => 'submit', 'name' => (string)$i)); ?></li>
			<?php endfor; ?>
			</ul>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
