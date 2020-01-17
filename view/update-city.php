<?php ob_start(); ?>
<div class="content">
	<section>
		<div class="session">
			<h3>CHANGEMENT DE VILLE</h3>
			<p>(<?php echo $_SESSION['city']; ?>)</p>
			<br>
			<form action="index.php?action=update&city&verify" method="post" class="update_city_form">
				<div class="session">
					<label for="update_city">Nouvelle ville</label>
					<input type="text" minlength="2" maxlength="60" name="update_city" id="update_city" required>
				</div>
				<br>
				<div class="session">
					<input type="submit" value="Changer">
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