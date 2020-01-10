<?php ob_start(); ?>
			<div class="error" style="text-align:center;">
				<h3>Oups, Une erreur s'est produite !</h3>
				<br>
				<h4>
				<?php
					if (($errorMessage === 'Erreur : Mauvais identifiant et/ou mot de passe !') || ($errorMessage ==='Erreur : Mot de passe erroné !')) {
						echo $errorMessage;
						echo '</h4><br><a href="index.php?action=login">Réessayer</a>';
					} else {
						echo $errorMessage;
						echo '</h4><br><a href="index.php"> Retourner à l\'accueil</a>';
					}
				?>
			</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>