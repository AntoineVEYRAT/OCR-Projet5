<?php ob_start(); ?>
<div class="content">
	<div class="session expert">
		<i class="fas fa-2x fa-tools"></i> 
		<h2>
			La boutique est actuellement en maintenance ! Merci de réessayer ultérieurement.
		</h2>
		<br>
		<a href="index.php">Retour à l'accueil</a>
	</div>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>