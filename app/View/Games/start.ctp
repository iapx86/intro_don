<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main" class="page_start">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>
	<h2>こんにちは！<span>
	<?php
	if (isset($loginUser['username'])) {
		echo $loginUser['username'];
	}else{
		echo '名無し';
	}
	 ?>
</span>さん！</h2>

<?php if (!isset($loginUser['username'])): ?>
<!-- ログインしていないなら -->

<div id="wrap_login" class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <?php echo $this->Form->input('username',array('label' => 'ユーザーネーム'));
        echo $this->Form->input('password',array('label' => 'パスワード'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('ゲームSTART')); ?>
	<p id="caution">※新規の人は自動的にアカウントが作成されるよ！</p>


</div>
<?php else: ?>
<!-- ログインしてるなら -->

<div class="btn1 single"><?php echo $this->Form->postLink('ひとりで遊ぶ', array('action' => 'setting')); ?></div>
<div class="btn1 multi"><?php echo $this->Form->postLink('みんなで遊ぶ', array('action' => 'startMulti')); ?></div>
<div class="btn_logout"><?php echo $this->Html->link(__('ログアウト'), array('controller' => 'users' , 'action' => 'logout')); ?></div>


<?php endif ?>

	<div class="btn2">説明</div>
	<div id="text">
		遊ぶボタンをクリックするとゲームが始まるよ。<br>
		問題は全部で１０問あるよ。<br>
		再生ボタンをクリックすると曲が流れるよ。<br>
		表示されている選択肢の中から正解を選んでね。<br>
	</div>

<!-- 個人成績リスト作成（ログインユーザー） -->
<?php if (isset($loginUser['username'])): ?>
<div class="record">
	<div id="box_result">
		<div id="detail_song">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<th colspan="2"><?= $_SESSION['Auth']['User']['username'] ?>さんの記録</th>
				</tr>
				<tr>
					<td>参加したゲーム回数</td>
					<td><?= $record['gameSum'] ?>回</td>
				</tr>
				<tr>
					<td>応えた問題の数</td>
					<td><?= $record['questionSum'] ?>問</td>
				</tr>
				<tr>
					<td>正解した回数</td>
					<td><?= $record['correctSum'] ?>問</td>
				</tr>
				<tr>
					<td>正解率</td>
					<td><?= $record['rate'] * 100 ?>％</td>
				</tr>
				<tr>
					<td>総獲得スコア</td>
					<td><?= $record['scoreSum'] ?>点</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php endif ?>

</div>
<script>
	$(function(){
		$(".btn2").click(function(){
			$("#text").fadeToggle();
		});
	});
</script>

