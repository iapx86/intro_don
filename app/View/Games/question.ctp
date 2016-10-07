<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<link href="css/set.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>

<div class="games question">
	<h2><?php echo __('問題'.$question); ?></h2>
	<div id="main">
		<h1>♪イントロドン♪<span>～曲を聴いて曲名を当てよう！～</span></h1>
		<div id="wrap_question">
			<p class="text_click">ボタンを押してね！</p>
			<audio preload="auto" id="demo" controls >
				<source src="http://audio.itunes.apple.com/apple-assets-us-std-000001/AudioPreview18/v4/b5/e4/e9/b5e4e99c-a228-8245-df8e-f98a5a2475a0/mzaf_2725412604837329319.plus.aac.p.m4a#t=0,0.3" type="audio/mp4">
			</audio>
			<table>
				<tr>
					<td colspan="<?php echo MAX_SELECT ?>"><?php echo __($songs[$correct[$question]]['Song']['artist'] . ' / ' . $songs[$correct[$question]]['Song']['title']); ?></td>
				</tr>
				<tr>
					<?php for ($i = 1; $i <= MAX_SELECT; $i++): ?>
						<td><?php echo $this->Form->postLink(__($songs[$select[$question][$i]]['Song']['artist'] . ' / ' . $songs[$select[$question][$i]]['Song']['title']), array('action' => 'answer', $i)); ?></td>
					<?php endfor; ?>
				</tr>
			</table>
		</div>
	</div>
</div>

</body>
</html>


<!--
			<ul id="song_list">
				<li><button type="submit" name="song1">波乗りジョニー<span>桑田佳祐</span></button></li>
				<li><button type="submit" name="song2">ボーイフレンド<span>aiko</span></button></li>
				<li><button type="submit" name="song3">Wait&See～リスク～<span>宇多田ヒカル</span></button></li>
				<li><button type="submit" name="song4">らいおんハート<span>SMAP</span></button></li>
			</ul>
-->
