<?php ob_start(); ?>
<div class="appli-content">
	<div id="tickets">
		<div class="ticket noteform">
			<h2>Rédigez une note</h2>
			<form method="POST" action="index.php?action=ticket&add">
				<label for="ticket">
					<textarea id="ticket" name="ticket" rows="5" cols="35" maxlength="100">J'écris une note...</textarea>
				</label>
				<br>
				<label for="submit-ticket">
					<i class="fas fa-save fa-2x submit"></i>
					<input type="submit" id="submit-ticket" />
				</label>
			</form>
		</div>
		<div class="ticket notepad">
			<?php 
				if($noTicket == false):
					while($ticket = $load->fetch()):
			?>
						<div class="ticket-write" >
							<p>
								<?= 
									$ticket['date'];
								?>
							</p>
							<p>
								<?= 
									$ticket['text'];
								?>
							</p>
							
								<a href="index.php?action=ticket&delete&id=<?= $ticket['id'] ?>">
									<div class="cross">
										<i class="fas fa-trash-alt"></i>
									</div>
								</a>
							<div class="arrow-down"></div>
						</div>
				<?php
					endwhile;
				else:
				?>
					<div class="ticket-write" >
						<p>Vous n'avez aucune note.</p>
						<div class="arrow-down"></div>
					</div>';
			<?php
				endif;
			?>
			<div class="pagin">
			<?php
				for($i=1; $i<=(ceil($nbTicket/3)); $i++):
					if($i == $currentPage):
						?>
							<div class="square square-current"><p><?= $i ?></p></div>
						<?php
					else:
						?>
							<a href="?action=open&app&page=<?= $i ?>"><div class="square square-hover"><?= $i ?></div></a>
						<?php
					endif;
				endfor;
			?>
			</div>
		</div>
	</div>
	<div id="app-zone">
		<div class="status-module modules">
			<br>
			<?php 
				if($_SESSION['status'] == 1):
			?>
					<img src="./public/img/check.png" alt="check" />
					<br>
					<p>Vous êtes un pêcheur <span class="yellow">Expert</span> !</p>
					<br>
					<p>Date de fin :</p>
					<p>
					<?php
						$date = DateTime::createFromFormat('Y-m-d', $_SESSION['expStop']);
						echo $date->format('d-m-Y');
					?>
					</p>
			<?php
				elseif($_SESSION['status'] == 2):
			?>
					<img src="./public/img/uncheck.png" alt="check" />
					<br>
					<p>Vous n'êtes plus pêcheur Expert !</p>
			<?php
				else:
			?>
					<img src="./public/img/uncheck.png" alt="check" />
					<br>
					<p>Vous êtes un pêcheur occasionnel.</p>
					<p><a href="index.php#offers-bar">Découvrez le mode Expert !</a></p>
			<?php
				endif;
			?>
		</div>
		<div class="note-module modules">
			<p>Aujourd'hui, l'indice de pêche est de :</p>
			<h3 id="resultWeather">Note</h3>
			<div>
				<p id="resultCityName"></p>
				<p id="resultCountryName"></p>
			</div>
		</div>
		<div class="expert-module modules">
			<?php 
				if($_SESSION['status'] == 1):
			?>	
				<div class="expert-stats">
					<h3 class="yellow">Les indices d'expert</h3>
					<ul>
						<li><span class="stat"><i class="fas fa-2x fa-cloud-sun"></i></span> <p id="weather"></p></li>
						<li><span class="stat"><i class="fas fa-2x fa-thermometer-three-quarters"></i></span> <p id="temp"></p></li>
						<li><span class="stat"><i class="fas fa-2x fa-wind"></i></span> <p id="wind"></p></li>
						<li><span class="stat"><i class="fas fa-2x fa-cloud-rain"></i></span> <p id="rain"></p></li>
						<li><span class="stat"><i class="fas fa-2x fa-eye"></i></span> <p id="visibility"></p></li>
					</ul>
				</div>
			<?php
				else:
					?>
						<p>Vous n'êtes pas pêcheur Expert !</p><p><a href="index.php#offers-bar">Devenir pêcheur Expert !</a></p>
					<?php
				endif;
			?>
		</div>
		<div class="profile-module modules">
			<h3>PROFILE</h3>
			<br>
			<div id="avatar">
				<img src="/storage/img/<?= $_SESSION['img'] ?>" alt="<?= $_SESSION['img'] ?>" />
				<div class="hover-hidden"><a href="index.php?action=upload">Changer</a></div>
			</div>
			<br>
			<div class="desc">
				<p>Identifiant : <?= $_SESSION['name'] ?></p>
				<p>Email : <?= $_SESSION['email'] ?></p>
				<p>Ville : <span id="city"><?= $_SESSION['city'] ?></span> (<a href="index.php?action=update&city">Changer</a>)</p>
				<span id="city_error"></span>
				<p>Mot de passe (<a href="index.php?action=update&pass">Changer</a>)</p>
			</div>
			<br>
			<a href="index.php?action=logout">Se déconnecter</a>
		</div>
	</div>
</div>
<script src="./public/js/AjaxGet.js"></script>
<script src="./public/js/Station.js"></script>
<script>
	const city = document.getElementById('city').innerHTML;
	let currentWeather = new Station(city);
	currentWeather.requetExist();
</script>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>