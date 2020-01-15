<?php ob_start(); ?>
<div class="content">
	<section>
		<div class="session">
			<h3>INSCRIPTION</h3>
			<br>
			<form action="index.php?action=subscribe&verify" method="post" class="subscribe-form">
				<div class="session">
					<label for="subscribe_name">Identifiant</label>
					<input type="text" name="subscribe_name" id="subscribe_name" required>
				</div>
				<div class="session">
					<label for="subscribe_mail">Email</label>
					<input type="email" name="subscribe_mail" id="subscribe_email" required>
				</div>
				<div class="session">
					<label for="subscribe_pass">Password</label>
					<input type="password" name="subscribe_pass" id="subscribe_pass" required>
				</div>
				<br>
				<div class="session">
					<input type="submit" value="S'enregistrer">
				</div>
			</form>
			<br>
			<a href="index.php?action=login">Je possède déjà un compte !</a>
		</div>
	</section>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>