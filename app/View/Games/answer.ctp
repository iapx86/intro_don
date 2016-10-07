<div class="games answer">
<h2><?php echo __('回答'.$question); ?></h2>
	<dl>
		<dt><?php echo __('判定'); ?></dt>
		<dd><?php echo $judge ? '正解！' : '不正解！'; ?>	</dd>
		<dt><?php echo __('判定'); ?></dt>
		<dd><?php echo $judge ? '◎' : '×'; ?>	</dd>
	</dl>
	
	<dl>
		<dt><?php echo __('正解'); // 正解の曲名、歌手名、音源を取得 ?></dt>
		<dd><?php echo $correct; ?></dd>
		<!--
		<dt><?php ##echo __('選択肢1'); ?></dt>
		<dd><?php ##echo $select[1]; ?></dd>
		<dt><?php ##echo __('選択肢2'); ?></dt>
		<dd><?php ##echo $select[2]; ?></dd>
		<dt><?php ##echo __('選択肢3'); ?></dt>
		<dd><?php ##echo $select[3]; ?></dd>
		<dt><?php ##echo __('選択肢4'); ?></dt>
		<dd><?php ##echo $select[4]; ?></dd>
		<dt><?php ##echo __('回答'); ?></dt>
		<dd><?php ##echo $answer; ?></dd>
		-->
	</dl>

<?php
	if ($question < 10) {
		echo $this->Form->postLink(__('次へ'), array('action' => 'question'));
	}
	else {
		echo $this->Form->postLink(__('結果を見る'), array('action' => 'result'));
	}
?>

</div>

<!--
<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>イントロドン！</title>
	<link href="css/set.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>
<div id="main">
	<h1>♪イントロドン♪<span>～曲を聴いて曲名を当てよう！～</span></h1>
	<div id="wrap_answer">
		<form action="question.php" method="post">
			<p class="judge_text">正解！</p>
			<p class="judge_img correct">◎</p>
			<p class="judge_img wrong">×</p>
			<p><img src="http://is2.mzstatic.com/image/thumb/Music49/v4/6c/85/8b/6c858bfc-3f37-e49f-b945-0ec7e595e652/source/100x100bb.jpg"></p>
			<p class="correct_answer">ボーイフレンド<span>aiko</span></p>
			<p class="next"><input type="submit" value="次へ"></p>
		</form>
	</div>
</div>

</body>
</html>