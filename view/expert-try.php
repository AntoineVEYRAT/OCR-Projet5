<?php ob_start(); ?>
<div class="content">
	<div class="session expert">
		<i class="fas fa-3x fa-comments-dollar"></i>
		<h2>
			<?php
				if(isset($_SESSION['id'])):
					if($_SESSION['expStop'] == '0000-00-00'):
						?>
							<ul>
								<li>Accès à l'interface</li>
								<li>Changement de villes illimité</li>
								<li>Indice de pêchabilité (note sur 10)</li>
								<li>Accès aux indices d'experts</li>
								<li>Nombre de notes illimité</li>
							</ul>
							<center><a href="index.php?action=expert&purchase"><i class="fas fa-arrow-right"></i> J'essaye, c'est gratuit !</a></center>
						<?php
					else:
						?>
							<p>Nous sommes désolé, mais vous avez déjà profité de cette offre.</p>
						<?php
					endif;
				else:
					?>
						<p>Vous devez être connecté pour profiter de l'offre !</p>
					<?php
				endif;
			?>
		</h2>
		<br>
		<a href="index.php">Retour à l'accueil</a>
	</div>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>