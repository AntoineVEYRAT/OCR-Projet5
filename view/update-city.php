<?php ob_start(); ?>
<div class="content">
	<section>
		<div class="session">
			<h2>CHANGEMENT DE VILLE</h2>
			<br>
			<label>Ville actuelle</label>
			<h3><?=  $_SESSION['city']; ?></h3>
			<br>
			<form action="index.php?action=update&city&verify" method="post" class="update_city_form" name="update_city">
				<div class="session">
					<label for="update_city">Nouvelle ville</label>
					<input type="text" minlength="2" maxlength="60" name="update_city" id="update_city" required>
					<span id="update_city_error"></span>
				</div>
				<div class="session">
					<label class="button-form">Modifier<input type="submit" value="Update" class="input-form" id="submit"></label>
				</div>
			</form>
			<br>
			<a href="index.php?action=open&app">Retour</a>
		</div>
	</section>
</div>
<script src="./public/js/validate.js"></script>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>