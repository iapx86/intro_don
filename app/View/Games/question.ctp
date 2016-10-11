<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div class="games question">
	<h2><?php echo __('問題'.$question); ?></h2>
	<div id="main">
		<h1>♪イントロドン♪<span>～曲を聴いて曲名を当てよう！～</span></h1>
		<div id="wrap_question">
			<p class="text_click">ボタンを押してね！</p>
			<audio preload="auto" id="demo" controls >
				<source src="<?php echo $songs[$correct[$question]]['Song']['preview']; ?>#t=0,0.3" type="audio/mp4">
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
