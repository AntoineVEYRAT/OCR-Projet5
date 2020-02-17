<?php ob_start(); ?>
<div class="content">
	<section>
		<div class="session">
			<h2>INSCRIPTION</h2>
			<br>
			<form action="index.php?action=subscribe&verify" method="post" class="subscribe-form" name="subscribe">
				<div class="session">
					<label for="subscribe_name">Identifiant</label>
					<input type="text" name="subscribe_name" id="subscribe_name" required>
					<span id="subscribe_name_error"></span>
				</div>
				<div class="session">
					<label for="subscribe_email">Email</label>
					<input type="text" minlength="8" name="subscribe_mail" id="subscribe_email" required>
					<span id="subscribe_email_error"></span>
				</div>
				<div class="session">
					<label for="subscribe_city">Ville</label>
					<input type="text" minlength="2" maxlength="60" name="subscribe_city" id="subscribe_city" required>
					<span id="subscribe_city_error"></span>
				</div>
				<div class="session">
					<label for="subscribe_pass">Password</label>
					<input type="password" minlength="6" name="subscribe_pass" id="subscribe_pass" required>
					<span id="subscribe_pass_error"></span>
				</div>
				<div class="session">
					<label class="button-form">S'enregistrer<input type="submit" value="SignIn" class="input-form" id="submit"></label>
				</div>
			</form>
			<br>
			<a href="index.php?action=login">Je possède déjà un compte !</a>
		</div>
	</section>
</div>
<script src="./public/js/validate.js"></script>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>