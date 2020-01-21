<?php ob_start(); ?>
<div class="content">
	<div class="session">
		<h3>
			<i class="fas fa-2x fa-tools"></i> 
			La boutique est actuellement en maintenance ! Merci de réessayer ultérieurement.
		</h3>
		<br>
		<a href="index.php">Retour à l'accueil</a>
	</div>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>