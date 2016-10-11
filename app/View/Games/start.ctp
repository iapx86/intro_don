<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main" class="page_start">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
		<span>～曲を聴いて曲名を当てよう！～</span>
	</h1>
	<h2>こんにちは！<span>○○○</span>さん！</h2>
	<div class="btn1"><?php echo $this->Form->postLink('遊ぶ', array('action' => 'start')); ?></div>
	<div class="btn2">説明</div>
	<div id="text">
		遊ぶボタンをクリックするとゲームが始まるよ。<br>
		問題は全部で１０問あるよ。<br>
		再生ボタンをクリックすると曲が流れるよ。<br>
		表示されている選択肢の中から正解を選んでね。<br>
	</div>
</div>
<script>
	$(function(){
		$(".btn2").click(function(){
			$("#text").fadeToggle();
		});
	});
</script>
</body>
</html>

