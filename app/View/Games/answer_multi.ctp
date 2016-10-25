<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<div id="wrap_answer">
		<?php echo $this->Form->create(array('url' => array('action' => $question < MAX_QUESTION ? 'questionMulti' : 'resultMulti'))); ?>
		<div class="correct_answer"><?php echo $correct['Song']['title']; ?>
			<span><?php echo $correct['Song']['artist']; ?></span>
			<img src="<?php echo $correct['Song']['jacket_img']; ?>">
		</div>

		<?php if ($question <= 9) {
			echo '<p class="next_q">次の問題まで<span id="countDown"></span>秒</p>';
		} else {
			echo '<p class="next_q">結果発表まで<span id="countDown"></span>秒</p>';
		}
		?>

		<?php echo $this->Form->end(); ?>
	</div>
</div>

<script>
	$(function(){
		var TIME_START1 = <?php echo TIME_START1; ?>;
		var TIME_START2 = <?php echo TIME_START2; ?>;
		var TIME_QUESTION1 = <?php echo TIME_QUESTION1; ?>;
		var TIME_QUESTION2 = <?php echo TIME_QUESTION2; ?>;
		var TIME_ANSWER = <?php echo TIME_ANSWER; ?>;
		var starttime = <?php echo $starttime; ?> + TIME_START1 + TIME_START2 + TIME_QUESTION1 + TIME_QUESTION2 + (TIME_QUESTION1 + TIME_QUESTION2 + TIME_ANSWER) * (<?php echo $question; ?> - 1);
		var dtime = -1;
		var audio, audio2 = new Audio("<?php echo $correct['Song']['preview']; ?>");

		if (<?php echo $judge ? 'true' : 'false'; ?>) {
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

		(function loop(){
			var now = Math.floor(Date.now() / 1000);
			var time = Math.max(starttime + TIME_ANSWER - now, 0);

			if (dtime != time) {
				$("#countDown").text(time);
				if (time == 0)
					location.href = "questionMulti";
				dtime = time;
			}
			setTimeout(loop, 100);
		})();
	});

</script>
