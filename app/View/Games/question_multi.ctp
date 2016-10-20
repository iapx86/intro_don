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
				<button name="1"><?php echo $select[1]['Song']['title'] . $select[1]['Song']['artist'] ?></button>
				<button name="2"><?php echo $select[2]['Song']['title'] . $select[2]['Song']['artist'] ?></button>
				<button name="3"><?php echo $select[3]['Song']['title'] . $select[3]['Song']['artist'] ?></button>
				<button name="4"><?php echo $select[4]['Song']['title'] . $select[4]['Song']['artist'] ?></button>
			</div>

			<!-- 見えないボタン -->
			<ul id="song_list" style="margin: 0 auto; float: none; display:none;">
				<?php for ($i = 1; $i <= MAX_SELECT; $i++): ?>
					<li><?php echo $this->Form->button($select[$i]['Song']['title'].'<span>'.$select[$i]['Song']['artist'].'</span>',
							array('type' => 'submit', 'name' => (string)$i)); ?></li>
				<?php endfor; ?>
				<li style="display: none;"><?php echo $this->Form->button($select[1]['Song']['title'].'<span>'.$select[1]['Song']['artist'].'</span>',
						array('type' => 'submit', 'name' => '0')); ?></li>
			</ul>
			<?php echo $this->Form->end(); ?>

		</div>

	</div>
</div>

<script type="text/javascript">

	var lastbutton = 0;

	$(document).ready(function(){

		//押されたボタンを記憶
		$('#view_button button').click(function () {
			lastbutton = ($(this).attr('name'));
			return false;
		});

		//曲が流れる（3秒）-----------------------------------
		setTimeout( function () {
			var audio = new Audio("<?php echo $correct['Song']['preview']; ?>#t=0,3");
			audio.play();
		} , 5000 );

		//正解画面へ遷移（10秒）-----------------------------------
		setTimeout( function () {
			$('button[name="'+lastbutton+'"]').click();
		} , 14000 );


		//変数の設定-----------------------------------
		var setSecond = 5; //タイマーの秒数
		var time = setSecond;   //残り秒数を保存する変数　初期値はsetSecondと同じ数値
		var timerID;    //setInterval用の変数

		var setSecond2 = 10; //タイマーの秒数
		var time2 = setSecond2;   //残り秒数を保存する変数　初期値はsetSecond2と同じ数値

		//関数の設定-----------------------------------

		//残り秒数を表示させる関数
		function textDisplay(){
			$("#countDown").text(time);
		}
		function textDisplay2(){
			$("#countDown2").text(time2);
		}

		//カウントを1減らす関数（setIntervalで毎秒実行される関数）
		function countDown(){
			time--;  //残り秒数を1減らす
			textDisplay();    //1減った残り秒数を表示
		}
		function countDown2(){
			time2--;  //残り秒数を1減らす
			textDisplay2();    //1減った残り秒数を表示
		}

		//タイマースタートの関数
		function timerStart(){
			timerID = setInterval(function(){
				if(time <= 1) {
					$("#countDown").text("0");
					$("#box_question").fadeIn();
					$("#countDownWrap").hide();
					if(time2 <= 1) {
						$("#countDown2").text("0");
					} else {
						countDown2();
					}
				} else {
					countDown();
				}
			}, 1000);
		}

		//実行処理-----------------------------------
		textDisplay();
		timerStart();

	});

</script>
