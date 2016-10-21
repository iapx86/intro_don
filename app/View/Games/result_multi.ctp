<div id="main">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<div id="box_result">
		<h2>結果発表</h2>
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th>曲目</th>
				<th>曲名</th>
				<th>アーティスト</th>
				<th>正誤</th>
			</tr>

			<?php for ($count = 0, $i = 1; $i <= MAX_QUESTION; $i++): ?>
				<tr>
					<td><?php echo $i; ?><span class="list">曲目</span></td>
					<td><p class="song_name"><?php echo $songs[$i]['Song']['title']; ?></p></td>
					<td><?php echo $songs[$i]['Song']['artist']; ?></td>

					<?php for ($j=0; $j <= 4; $j++): ?>
						<?php if (isset($ranker[$j]) && $ranker[$j]['id'] === $auth['id']): ?>

							<?php if ($ranker[$j]['correct'][$i - 1]): ?>
								<td class="cell_result true">○</td>
								<?php $count++; ?>
							<?php else: ?>
								<td class="cell_result false">×</td>
							<?php endif; ?>
						<?php endif; ?>
					<?php endfor; ?>

				</tr>
			<?php endfor; ?>
		</table>

		<p id="text"><?php echo MAX_QUESTION; ?>問中<span><?php echo $count; ?></span>問正解！</p>
		
		<p id="btn_more"><?php echo $this->Html->link(__('もう一度遊ぶ'), array('action' => 'start')); ?></p>
		<p id="btn_leave"><?php echo $this->Html->link(__('やめる'), array('controller' => 'users', 'action' => 'logout')); ?></p>

		<div id="ranking">
		<h2>ランキング</h2>
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th>順位</th>
				<th>ユーザー名</th>
				<th>正解数</th>
				<th>スコア</th>
			</tr>
			<?php for ($i = 0; $i <= 4; $i++): ?>
				<tr>
					<td><?php 
					if($i === 0){
						$ranknum = 1;
						echo $ranknum;
					}elseif($ranker[$i -1]['countCorrect'] === $ranker[$i]['countCorrect']){
						echo $ranknum; 
					}else{
						$ranknum ++;
						echo $ranknum;
					}
					?>番</td>

					<td><?php echo $ranker[$i]['username']; ?></td>

					<td><?php echo $ranker[$i]['countCorrect']; ?></td>

					<td><?php echo $ranker[$i]['sumScore']; ?></td>

				</tr>
			<?php endfor; ?>
		</table>
	</div>


	</div>






</div>
