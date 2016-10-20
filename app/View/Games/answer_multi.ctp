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
			echo '次の問題まで<span id="countDown"></span>秒';
		} else {
			echo '結果発表まで<span id="countDown"></span>秒';
		}
		?>

		<?php echo $this->Form->end(); ?>
	</div>
</div>

<script>
	$(function(){
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

		//次の問題へ遷移（5秒後）-----------------------------------
		setTimeout( function () {
			location.href = "/intro_don/games/questionMulti";
		} , 5000 );

		//変数の設定-----------------------------------
		var setSecond = 5; //タイマーの秒数
		var time = setSecond;   //残り秒数を保存する変数　初期値はsetSecondと同じ数値
		var timerID;    //setInterval用の変数

		//関数の設定-----------------------------------

		//残り秒数を表示させる関数
		function textDisplay(){
			$("#countDown").text(time);
		}

		//カウントを1減らす関数（setIntervalで毎秒実行される関数）
		function countDown(){
			time--;  //残り秒数を1減らす
			textDisplay();    //1減った残り秒数を表示
		}

		//タイマースタートの関数
		function timerStart(){
			timerID = setInterval(function(){
				if(time <= 1) {
					$("#countDown").text("0");
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
