<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>イントロドン！</title>
	<?php echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js'); ?>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('game');

		echo $this->Html->meta(null, null, array(
		'name' => 'viewport',
		'content' => 'width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no',
		'inline' => false
	));


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<script>
		$(function (){
			setTimeout(function(){
				$('#flashMessage').fadeOut("slow");
			}, 800);
		});
	</script>
</body>
</html>
