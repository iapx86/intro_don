<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<div id="wrap_question">
		<p class="question_number">第<span><?= $question; ?></span>問</p>
		<div id="countDownWrap">
			<div id="viewCount">曲が流れるまで、あと<br><span id="countDown"></span>秒</div>
		</div>

		<div id="box_question" style="display: none;">
			<p id="viewTextNext">正解発表まで<span id="countDown2"></span>秒</p>
			<?php echo $this->Form->create(array('url' => array('action' => 'answerMulti'))); ?>
			<div id="wrap_audio" style="display: none;">
				<p id="btn_play"><?php echo $this->Html->image('btn_play.png');?></p>
				<p class="text_click">ボタンを押してね！</p>
			</div>
			<!-- 見えるボタン -->
			<div id="view_button">
				<?php for ($i = 1; $i <= MAX_SELECT; $i++): ?>
				<button name="<?php echo $i ?>"><?php echo $select[$i]['Song']['title'] . $select[$i]['Song']['artist'] ?></button>
				<?php endfor; ?>
			</div>

			<!-- 見えないボタン -->
			<ul id="song_list" style="display: none;">
				<?php for ($i = 0; $i <= MAX_SELECT; $i++): ?>
				<li><button name="<?php echo $i ?>"></button></li>
				<?php endfor; ?>
			</ul>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		var TIME_START1 = <?php echo TIME_START1; ?>;
		var TIME_START2 = <?php echo TIME_START2; ?>;
		var TIME_QUESTION1 = <?php echo TIME_QUESTION1; ?>;
		var TIME_QUESTION2 = <?php echo TIME_QUESTION2; ?>;
		var TIME_ANSWER = <?php echo TIME_ANSWER; ?>;
		var starttime = <?php echo $starttime; ?> + TIME_START1 + TIME_START2 + (TIME_QUESTION1 + TIME_QUESTION2 + TIME_ANSWER) * (<?php echo $question; ?> - 1);
		var dtime = -1;
		var dtime2 = -1;
		var lastbutton = 0;

		//押されたボタンのnameをlastbuttonに代入
		$('#view_button button').click(function () {
			lastbutton = ($(this).attr('name'));
			return false;
		});

		(function loop(){
			var audio;
			var now = Math.floor(Date.now() / 1000);
			var time = Math.max(starttime + TIME_QUESTION1 - now, 0);
			var time2 = Math.max(starttime + TIME_QUESTION1 + TIME_QUESTION2 - now, 0);

			if (dtime != time) {
				$("#countDown").text(time);
				if (time == 0) {
					$("#box_question").fadeIn();
					$("#countDownWrap").hide();
					audio = new Audio("<?php echo $correct['Song']['preview']; ?>#t=0,3");
					audio.play();
				}
				dtime = time;
			}
			if (time == 0 && dtime2 != time2) {
				$("#countDown2").text(time2);
				if (time2 == 0)
					$('button[name="'+ lastbutton +'"]').click();
				dtime2 = time2;
			}
			setTimeout(loop, 100);
		})();

		//ボタンclickデザイン
		$("#view_button button").click(function(){
			$(this).addClass("active");
			$(this).siblings().removeClass("active");
		});
	});

</script>
