<?php ob_start(); ?>
<div class="content">
	<section>
		<div class="session">
			<h3>CONNEXION</h3>
			<br>
			<form action="index.php?action=login&amp;verify" method="post" class="login-form">
				<div class="session">
					<label for="login_name">Identifiant</label>
					<input type="text" name="login_name" id="login_name" required>
				</div>
				<div class="session">
					<label for="login_pass">Password</label>
					<input type="password" name="login_pass" id="login_pass" required>
				</div>
				<br>
				<div class="session">
					<input type="submit" value="Se connecter">
				</div>
			</form>
			<br>
			<a href="index.php?action=subscribe">Je n'ai pas encore de compte</a>
		</div>
	</section>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>