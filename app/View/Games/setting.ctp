<div id="main" style="width: 570px;">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>

	<div id="wrap_setting">

		<?php echo $this->Form->create(array('url' => array('action' => 'start'))); ?>
		<fieldset>
			<?php
			echo $this->Form->input('select', array(
				'options' => $artists,
				'multiple' => true,
				'label' => false,
			));
			?>
		</fieldset>
		<?php echo $this->Form->end(__('絞ってSTART')); ?>

		<div class="btn1"><?php echo $this->Form->postLink('ランダムでSTART', array('action' => 'start')); ?></div>
	</div>
</div>


