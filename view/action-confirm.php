<?php ob_start(); ?>
<div class="content">
	<div class="aConfirm" style="text-align:center;">
		<p>
			<?php
				echo $message;
			?>
		</p>
		<p>Vous allez être redirigé dans quelques secondes ...</p>
	</div>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>