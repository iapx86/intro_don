<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main" style="width: 570px;">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>

	<div id="wrap_setting">

		<?php echo $this->Form->create(array('url' => array('action' => 'startMulti'))); ?>
		<fieldset>
			<?php
			echo $this->Form->input('select', array(
				'options' => $artists,
				'empty' => 'アーティストを選んでね',
				'label' => false,
			));
			?>
		</fieldset>
		<?php echo $this->Form->end(__('絞ってSTART')); ?>

		<div class="btn1"><?php echo $this->Form->postLink('ランダムでSTART', array('action' => 'startMulti')); ?></div>
	</div>
</div>


