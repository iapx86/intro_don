<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<div id="wrap_join">
		<p id="text_limit">締め切りまであと<span id="countDown">●●</span>秒</p>
		<p id="text_join" class="ex-1">参加者募集中</p>
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
		var TIME_START1 = <?php echo TIME_START1; ?>;
		var TIME_START2 = <?php echo TIME_START2; ?>;
		var starttime = <?php echo $starttime; ?>;
		var dtime = -1;
		var jump = false;

		function update(){
			$.getJSON('get', function(game){
				var html = '<ul>', i, j, id;
				for (i = 1; i < 5 && (id = game['game']['Game']['entry_user' + i]) !== null; i++)
					for (j = 0; j < game['users'].length; j++)
						if (game['users'][j]['User']['id'] === id) {
							html += '<li><span>' + game['users'][j]['User']['username'] + '</span>が参加しました。</li>';
							break;
						}
				$('#list_member').html(html += '</ul>');
			});
		}

		(function loop(){
			var now = Math.floor(Date.now() / 1000);
			var time = Math.max(starttime + TIME_START1 - now, 0);

			if (dtime != time) {
				$("#countDown").text(time);
				update();
				if (time == 0) {
					$("#text_join_finish").fadeIn();
					$("#text_join").hide();
					$("#wrap_join #list_member").hide();
				}
				dtime = time;
			}
			if (!jump && now >= starttime + TIME_START1 + TIME_START2) {
				jump = true;
				location.href = "questionMulti";
			}
			setTimeout(loop, 100);
		})();
	});

</script>