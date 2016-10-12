<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<div id="wrap_question">
		<p class="text_click">ボタンを押してね！</p>
		<p class="question_number">第<?= $question; ?>問</p>


		<?php echo $this->Form->create(array('url' => array('action' => 'answer'))); ?>
		<div id="wrap_audio">
			<audio preload="auto" controls >
				<source src="<?php echo $songs[$correct[$question]]['Song']['preview']; ?>#t=0,0.3" type="audio/mp4">
			</audio>
		</div>
		<ul id="song_list">
			<?php for ($i = 1; $i <= MAX_SELECT; $i++): ?>
				<li><?php echo $this->Form->button($songs[$select[$question][$i]]['Song']['title'].'<span>'.$songs[$select[$question][$i]]['Song']['artist'].'</span>',
						array('type' => 'submit', 'name' => (string)$i)); ?></li>
			<?php endfor; ?>
		</ul>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
