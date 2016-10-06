<div class="games question">
<h2><?php echo __('Question '.$question); ?></h2>
	<table>
		<tr><td colspan="4"><?php echo __('correct = '.$correct); ?></td></tr>
		<tr>
			<td><?php echo $this->Form->postLink(__('id = '.$select[1]), array('action' => 'answer', '1')); ?></td>
			<td><?php echo $this->Form->postLink(__('id = '.$select[2]), array('action' => 'answer', '2')); ?></td>
			<td><?php echo $this->Form->postLink(__('id = '.$select[3]), array('action' => 'answer', '3')); ?></td>
			<td><?php echo $this->Form->postLink(__('id = '.$select[4]), array('action' => 'answer', '4')); ?></td>
		</tr>
	</table>
</div>
