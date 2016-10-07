
<div class="games start">
<?php echo $this->Form->create('Game'); ?>
	<fieldset>
		<legend><?php echo __('♫イントロドン！♫'); ?></legend>
		<h5><?php echo __('～曲を聴いて曲名を当てよう！～'); ?></h5>
	</fieldset>
<?php echo $this->Form->end(__('遊ぶ')); ?>
</div>

<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<link href="css/set.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>
<div id="main" class="page_start">
	<p class="btn2">説明</p>
	<div id="text">
		遊ぶボタンをクリックするとゲームが始まるよ。<br>
		問題は全部で１０問あるよ。<br>
		再生ボタンをクリックすると曲が流れるよ。<br>
		表示されている選択肢の中から正解を選んでね。<br>
	</div>
</div>

<script>
	$(".btn2").click(function(){
		$("#text").fadeToggle();
	});
</script>

</body>
</html>


