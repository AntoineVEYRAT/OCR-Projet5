<?php ob_start(); ?>
		<div class="test">
			<h3>TEST</h3>
		</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>