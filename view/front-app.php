<?php ob_start(); ?>
<div class="appli-content">
	<div id="tickets">
		<div class="ticket noteform">
			<h5>Rédigez une note</h5>
			<form method="POST" action="index.php?action=ticket&add">
				<textarea id="ticket" name="ticket" rows="5" cols="35" maxlength="100">
				</textarea><br>
				<label><i class="fas fa-save fa-2x submit"></i><input type="submit" /></label>
			</form>
		</div>
		<div class="ticket notepad">
			<?php 
				if ($noTicket == false) {
					while ($ticket = $load->fetch()) {
						echo '<div class="ticket-write" ><p>' . $ticket['date'] . '</p><p>' . $ticket['text'] . '</p><div class="arrow-down"></div></div>';
					}
				} else {
					echo '<div class="ticket-write" ><p>Vous n\'avez aucune note.</p><div class="arrow-down"></div></div>';
				}
				?><div class="pagin"><?php
					for ($i=1; $i<=(ceil($nbTicket/3)); $i++) {
						if($i == $currentPage) {
							echo '<div class="square square-current"><p>' . $i . '</p></div>';
						} else {
							echo '<a href="?action=open&app&page=' . $i . '"><div class="square square-hover">' . $i . '</div></a> ';
						}
					}
				?></div>
		</div>
	</div>
	<div id="app-zone">
		<div class="status-module modules">
			<img src="./public/img/check.png" alt="check" />
			<br>
			<?php 
				if ($_SESSION['status'] == 1) {
					echo '<p>Vous êtes un pêcheur <span class="yellow">Expert</span> !</p><br>';
					echo '<p>Date de fin :</p><p>01-02-2020</p>';
				} else {
					echo '<p>Vous êtes un pêcheur occasionnel !</p>';
				}
			?>
		</div>
		<div class="note-module modules">
			<p>Aujourd'hui, la note est de :</p>
		</div>
		<div class="help-module modules">
			<?php 
				if ($_SESSION['status'] == 1) {
					echo '<p>Actualisez pour voir les conseils !</p><br>';
				} else {
					echo '<p>Vous n\'êtes pas pêcheur Expert !</p>';
				}
			?>
		</div>
		<div class="profile-module modules">
			<h3>PROFILE</h3>
			<br>
			<?php 
				echo '<p>Identifiant : ' . $_SESSION['name'] . '</p>';
				echo '<p>Mot de passe : (<a>Changer</a>)</p>';
				echo '<p>Email : ' . $_SESSION['email'] . '</p>';
			?>
			<a href="index.php?action=logout">Se déconnecter</a>
		</div>
	</div>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>