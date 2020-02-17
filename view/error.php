<?php ob_start(); ?>
<div class="content">
	<section>
		<div class="session">
			<h2>Oups, Une erreur s'est produite !</h2>
			<br>
			<h3>
				<?php
					if(($errorMessage === 'Erreur : Mauvais identifiant et/ou mot de passe !') || ($errorMessage ==='Erreur : Mot de passe erroné !')):
				?>
				<?= $errorMessage; ?>
				<br>
				<a href="index.php?action=login">Réessayer</a>
				<?php
					elseif(
						($errorMessage === 'Error : Email invalide !') || 
						($errorMessage === 'Error : Certaine(s) donnée(s) sont absentes !') || 
						($errorMessage === 'Error : Aucunes données dans le formulaire !')
					):
						echo $errorMessage; 
				?>
						</h3>
						<br>
						<a href="index.php?action=subscribe">Retour</a>
				<?php
					elseif($errorMessage === 'Error : Le nom de ville n\'est pas correct !'):
						echo $errorMessage; 
					?>
						</h3>
						<br>
						<a href="index.php?action=update&city">Réessayer</a>
				<?php
					else:
						echo $errorMessage;
					?>
						</h3>
						<br>
						<a href="index.php">Retourner à l'accueil</a>
				<?php
					endif;
				?>
		</div>
	</section>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>