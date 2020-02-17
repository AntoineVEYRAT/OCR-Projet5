<?php ob_start(); ?>
<div class="content">
	<section>
		<div class="session">
			<h2>CONNEXION</h2>
			<br>
			<form action="index.php?action=login&amp;verify" method="post" class="login-form" name="login">
				<div class="session">
					<label for="login_name">Identifiant</label>
					<input type="text" name="login_name" id="login_name" required>
					<span id="login_name_error"></span>
				</div>
				<div class="session">
					<label for="login_pass">Mot de passe</label>
					<input type="password" name="login_pass" id="login_pass" required>
					<span id="login_pass_error"></span>
				</div>
				<div class="session">
					<label class="button-form">Connexion<input type="submit" value="Login" class="input-form" id="submit"></label>
				</div>
			</form>
			<br>
			<a href="index.php?action=subscribe">Je n'ai pas encore de compte</a>
		</div>
	</section>
</div>
<script src="./public/js/validate.js"></script>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>