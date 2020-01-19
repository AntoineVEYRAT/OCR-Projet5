<?php ob_start(); ?>
<div class="content">
	<section>
		<div class="session">
			<h3>CHANGEMENT DE MOT DE PASSE</h3>
			<p>Votre identifiant : <?php echo $_SESSION['name']; ?></p>
			<br>
			<form action="index.php?action=update&pass&verify" method="post" class="update_pass_form">
				<div class="session">
					<label for="old_pass">Ancien mot de passe</label>
					<input type="password" minlength="2" maxlength="60" name="old_pass" id="old_pass" required>
				</div>
				<br>
				<div class="session">
					<label for="update_pass">Nouveau mot de passe</label>
					<input type="password" minlength="2" maxlength="60" name="update_pass" id="update_pass" required>
				</div>
				<br>
				<div class="session">
					<label for="update_passRep">Nouveau mot de passe (2)</label>
					<input type="password" minlength="2" maxlength="60" name="update_passRep" id="update_passRep" required>
				</div>
				<br>
				<div class="session">
					<input type="submit" value="Modifier">
				</div>
			</form>
			<br>
			<a href="index.php?action=open&app">Retour</a>
		</div>
	</section>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>