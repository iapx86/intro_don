<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
<div id="main" style="width: 570px;">
	<h1>
		<?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
	</h1>

	<div id="wrap_setting">

		<?php echo $this->Form->create('#'); ?>
		<fieldset>
			<?php
			echo $this->Form->input(' ', array(
				'options' => array(
					"サザンオールスターズ",
					"福山雅治",
					"宇多田ヒカル",
					"浜崎あゆみ",
					"絢香",
					"プッチモニ",
					"宇多田ヒカル",
					"浜崎あゆみ",
					"桑田佳祐",
					"モーニング娘。",
					"コブクロ",
					"三木道三",
					"ポルノグラフィティ",
					"スキマスイッチ",
					"宇多田ヒカル",
					"森山直太朗",
					"RUI",
					"IWiSH",
					"DREAMSCOMETRUE",
					"ゆず",
					"福山雅治",
					"秦基博",
					"AI",
					"MYLITTLELOVER",
					"桑田佳祐",
					"岡本真夜",
					"スピッツ",
					"B'z",
					"秦基博",
					"globe"),
				'empty' => 'アーティストを選んでね'
			));
			?>
		</fieldset>
		<?php echo $this->Form->end(__('絞ってSTART')); ?>

		<!-- 「ひとりで遊ぶ」から遷移してきた場合 -->
		<!-- <div class="btn1"><?php echo $this->Form->postLink('ランダムでSTART', array('action' => 'start')); ?></div> -->

		<!-- 「みんなで遊ぶ」から遷移してきた場合 -->
		<div class="btn1"><?php echo $this->Form->postLink('ランダムでSTART', array('action' => 'startMulti')); ?></div>
	</div>
</div>


