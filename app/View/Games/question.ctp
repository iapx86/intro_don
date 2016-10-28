<div id="main">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<div id="wrap_question">
		<p class="question_number"><span><?= $question; ?></span>/ 10</p>
		<p id="name">
			<span>
			<?php
			if (isset($loginUser['username'])) {
				echo $loginUser['username'];
			}else{
				echo '名無し';
			}
			?>
				</span>
			さん、

			<?php
			if($question <= 2){
				echo "がんばって！";
			} else if($question <= 6){
				echo "まだまだ！";
			} else if($question <= 8){
				echo "ラストスパート！";
			} else if($question == 9){
				echo "次で最後だよ！";
			} else if($question == 10){
				echo "最後の曲だよ♪";
			}
			?>
		</p>
		<?php echo $this->Form->create(array('url' => array('action' => 'answer'))); ?>
		<div id="wrap_audio">
			<p id="btn_play"><?php echo $this->Html->image('btn_play.png');?></p>
			<p class="text_click">ボタンを押してね！</p>
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

<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_play").click(function(){
			var audio = new Audio("<?php echo $songs[$correct[$question]]['Song']['preview']; ?>#t=0,0.3");
			audio.play();
			this.blur();
		});
	},false);

	$( '#wrap_question button' )
		.bind( 'touchstart', function(){
			$( this ).addClass( 'hover' );
		}).bind( 'touchend', function(){
		$( this ).addClass( 'hover' );
	});
</script>