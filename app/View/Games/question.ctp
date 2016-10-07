<div class="games question">
<h2><?php echo __('Question '.$question); ?></h2>
	<table>
		<tr><td colspan="4"><?php echo __($songs[$correct[$question]]['Song']['artist'].' / '.$songs[$correct[$question]]['Song']['title']); ?></td></tr>
		<tr>
			<td><?php echo $this->Form->postLink(__($songs[$select[$question][1]]['Song']['artist'].' / '.$songs[$select[$question][1]]['Song']['title']), array('action' => 'answer', '1')); ?></td>
			<td><?php echo $this->Form->postLink(__($songs[$select[$question][2]]['Song']['artist'].' / '.$songs[$select[$question][2]]['Song']['title']), array('action' => 'answer', '2')); ?></td>
			<td><?php echo $this->Form->postLink(__($songs[$select[$question][3]]['Song']['artist'].' / '.$songs[$select[$question][3]]['Song']['title']), array('action' => 'answer', '3')); ?></td>
			<td><?php echo $this->Form->postLink(__($songs[$select[$question][4]]['Song']['artist'].' / '.$songs[$select[$question][4]]['Song']['title']), array('action' => 'answer', '4')); ?></td>
		</tr>
	</table>
</div>
