<?php ob_start(); ?>
<div class="content">
	<div class="aConfirm" style="text-align:center;">
		<p>
		<?php
				echo $message;
		?>
		</p>
		<p>
		<?php
				echo 'Vous allez être redirigé dans 5 secondes ...';
		?>
		</p>
	</div>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>