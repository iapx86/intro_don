<div id="main">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<div id="box_result">
		<h2>結果発表</h2>
		<div id="detail_song">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<th>曲目</th>
					<th>曲名 / アーティスト</th>
					<th>正誤</th>
				</tr>
				<?php for ($count = 0, $i = 1; $i <= MAX_QUESTION; $i++): ?>
					<tr>
						<td><?php echo $i; ?><span class="list"></span></td>
						<td><p class="song_name"><?php echo $songs[$correct[$i]]['Song']['title']; ?></p>
							<?php echo $songs[$correct[$i]]['Song']['artist']; ?></td>
						<?php if ($judge[$i]): ?>
							<td class="cell_result true">○</td>
							<?php $count++; ?>
						<?php else: ?>
							<td class="cell_result false">×</td>
						<?php endif; ?>
					</tr>
				<?php endfor; ?>
			</table>
		</div>

		<p id="text"><?php echo MAX_QUESTION; ?>問中<span><?php echo $count; ?></span>問正解！</p>

		<p id="btn_more"><?php echo $this->Html->link(__('もう一度遊ぶ'), array('action' => 'start')); ?></p>
		<p id="btn_leave"><?php echo $this->Html->link(__('やめる'), array('controller' => 'users', 'action' => 'logout')); ?></p>

	</div>
</div>
