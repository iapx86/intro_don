<div class="songs form">
	<?php echo $this->Form->create('Song', array('url' => array('action' => 'addResult'))); ?>
	<fieldset>
		<legend><?php echo __('Search Result'); ?></legend>
		<table cellpadding="0" cellspacing="0">
			<thead>
			<tr>
				<th><input type="checkbox" onclick="check(this)"></th>
				<th><?php echo 'title'; ?></th>
				<th><?php echo 'artist'; ?></th>
				<th><?php echo 'preview'; ?></th>
			</tr>
			</thead>
			<tbody>
			<?php $i = 0; ?>
			<?php foreach ($songs as $song): ?>
				<tr>
					<td><?php echo $this->Form->input('Song.' . $i++ . '.valid', array('type' => 'checkbox', 'label' => false)); ?></td>
					<td><?php echo h($song['Song']['title']); ?>&nbsp;</td>
					<td><?php echo h($song['Song']['artist']); ?>&nbsp;</td>
					<td>
						<audio controls src="<?php echo $song['Song']['preview']; ?>">&nbsp;
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Songs'), array('action' => 'index')); ?></li>
	</ul>
</div>
<script>
	function check(obj) {
		var i, form = obj.form;
		for (i = 0; i < form.length; i++)
			form[i].checked = obj.checked;
	}
</script>
