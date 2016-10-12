<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('アカウントを作成'); ?></legend>
	<?php
		echo $this->Form->input('username',array('label' => 'ユーザーネーム'));
		echo $this->Form->input('password',array('label' => 'パスワード'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('アカウントを作成')); ?>
</div>


