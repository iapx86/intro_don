<div class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('サインイン'); ?>
        </legend>
        <?php echo $this->Form->input('username',array('label' => 'ユーザーネーム'));
        echo $this->Form->input('password',array('label' => 'パスワード'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('サインイン')); ?>

<?php echo $this->Html->link(__('アカウントを作成'), array('action' => 'add')); ?>


</div>