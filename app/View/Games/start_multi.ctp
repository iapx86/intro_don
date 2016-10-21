<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<div id="wrap_join">
		<p id="text_limit">締め切りまであと<span id="countDown">●●</span>秒</p>
		<p id="text_join">参加者募集中</p>
		<p id="text_join_finish">募集締め切り</p>
		<div id="list_member">
			<ul style="display:none">
				<li><span>一郎</span>が参加しました。</li>
				<li><span>次郎</span>が参加しました。</li>
				<li><span>三郎</span>が参加しました。</li>
				<li><span>四朗</span>が参加しました。</li>
				<li><span>五郎丸</span>が参加しました。</li>
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		//変数の設定-----------------------------------
		var setSecond = <?php echo $time; ?>; //タイマーの秒数
		var time = setSecond;   //残り秒数を保存する変数　初期値はsetSecondと同じ数値
		var timerID;    //setInterval用の変数

		var setSecond2 = 3; //タイマーの秒数
		var time2 = setSecond2;   //残り秒数を保存する変数　初期値はsetSecond2と同じ数値

		//関数の設定-----------------------------------

		//残り秒数を表示させる関数
		function textDisplay(){
			$("#countDown").text(time);
			update();
		}

		//カウントを1減らす関数（setIntervalで毎秒実行される関数）
		function countDown(){
			time--;  //残り秒数を1減らす
			textDisplay();    //1減った残り秒数を表示
		}
		function countDown2(){
			time2--;  //残り秒数を1減らす
		}

		//タイマースタートの関数
		function timerStart(){
			timerID = setInterval(function(){
				if(time <= 1) {
					$("#countDown").text("0");
					$("#text_join_finish").fadeIn();
					$("#text_join").hide();
					if(time2 <= 1) {
						clearInterval(time2);
						location.href = "/intro_don/games/questionMulti";
					} else {
						countDown2();
					}
				} else {
					countDown();
				}
			}, 1000);
		}

		function update(){
			$.getJSON('get', function(game){
				var html = '<ul>', i, j, id;
				for (i = 1; i < 5 && (id = game.game.Game['entry_user' + i]) !== null; i++)
					for (j = 0; j < game['users'].length; j++)
						if (game['users'][j]['User']['id'] === id) {
							html += '<li><span>' + game['users'][j]['User']['username'] + '</span>が参加しました。</li>';
							break;
						}
				$('#list_member').html(html += '</ul>');
			});
		}

		//実行処理-----------------------------------
		textDisplay();
		timerStart();
	});

</script>