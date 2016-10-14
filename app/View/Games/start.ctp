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

<div class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('サインインor新規作成'); ?>
        </legend>
        <?php echo $this->Form->input('username',array('label' => 'ユーザーネーム'));
        echo $this->Form->input('password',array('label' => 'パスワード'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('サインインor新規作成')); ?>


</div>
<?php else: ?>
<!-- ログインしてるなら -->

<div class="btn1">
	<?php echo $this->Form->postLink('遊ぶ', array('action' => 'start')); ?>
	<br>
	<?php echo $this->Html->link(__('ログアウト'), array('controller' => 'users' , 'action' => 'logout')); ?>
</div>

<?php endif ?>

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

