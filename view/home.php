<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>How I Fish</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Load Fontawesome -->
		<script src="https://kit.fontawesome.com/fa7ae6c9e7.js" crossorigin="anonymous"></script>
		<!-- Load STYLE -->
		<link rel="stylesheet" href="../public/css/style.css">
		<!-- Load JQUERY -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</head>
	<body>
		<div class="arrow">
			<a href="#" class="js-scrollTop">
				<i class="fas fa-chevron-up fa-2x"></i>
			</a>
		</div>
		<div class="container">
			<header>
				<div id="menu-bar">
					<div class="logo">
						<h1>How I Fish</h1>
					</div>
					<div class="menu">
						<a href="index.php?action=open&app">Application</a>
						<a href="index.php">Accueil</a>
					</div>
				</div>
				<div class="welcom-box">
					<a href="#conditions-bar" class="js-scrollTo">
						<img src="./public/img/welcom-box.png" alt="welcom" />
					</a>
				</div>
			</header>
			<div id="conditions-bar">
				<div class="condition">
					<img src="./public/img/weather.png" alt="welcom" />
					<p>Météo</p>
				</div>
				<div class="condition">
					<img src="./public/img/hydrometrie.png" alt="welcom" />
					<p>Précipitations</p>
				</div>
				<div class="condition">
					<img src="./public/img/water-quality.png" alt="welcom" />
					<p>Vent</p>
				</div>
				<div class="condition">
					<img src="./public/img/temperature.png" alt="welcom" />
					<p>Température</p>
				</div>
				<div class="condition">
					<img src="./public/img/fish.png" alt="welcom" />
					<p>Visibilité</p>
				</div>
			</div>
			<section>
				<div id="about-us-bar">
					<div class="about-us-img">
						<img src="./public/img/about-us.png" alt="about-us" />
					</div>
					<div class="about-us-text">
						<h2>ABOUT US</h2>
						<p>Hae duae provinciae bello quondam piratico catervis mixtae praedonum a Servilio pro consule missae sub iugum factae sunt vectigales. et hae quidem regiones velut in prominenti terrarum lingua positae ob orbe eoo monte Amano disparantur.Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.</p>
						<p>Hae duae provinciae bello quondam piratico catervis mixtae praedonum a Servilio pro consule missae sub iugum factae sunt vectigales. et hae quidem regiones velut in prominenti terrarum lingua positae ob orbe eoo monte Amano disparantur.</p>
					</div>
				</div>
			</section>
				<div id="promo-bar">
					<div class="promo-bar-text">
						<p>Profitez des fonctionnalités du pêcheur Expert gratuitement pendant <span class="yellow">15 jours</span> !</p>
					</div>
					<div class="promo-bar-img">
						<img src="./public/img/purple-button.png" alt="button-try-it"/>
						<a href="index.php?action=open&try">J'en profite !</a>
					</div>
				</div>
				<div id="offers-bar">
					<div class="offers-bar-text">
						<h3>How I Fish vous propose </h3>
						<img src="./public/img/2.png" alt="2" />
						<h3> options</h3>
					</div>
					<div class="offers-bar-block">
						<div class="offers-block">
							<img src="./public/img/offers-cadre-white.png" alt="white-offer" />
							<h4>Occasionnel</h4>
							<ul>
								<li>Accès à l'interface</li>
								<li>Changement de villes en illimité</li>
								<li>Indice de pêchabilité</li>
								<li>Nombre de notes limité</li>
							</ul>
							<p><a href="index.php?action=open&app">Découvrir</a></p>
						</div>
						<div class="offers-block">
							<img src="./public/img/offers-cadre-yellow.png" alt="yellow-offer" />
							<h4>Expert</h4>
							<ul>
								<li>Accès à l'interface</li>
								<li>Changement de villes en illimité</li>
								<li>Indice de pêchabilité</li>
								<li>Accès aux indices d'experts</li>
								<li>Nombre de notes illimité</li>
							</ul>
							<p><a href="index.php?action=open&expert">Découvrir</a></p>
						</div>
					</div>
				</div>
				<div id="stats-bar">
					<div class="stats-bar">
						<img src="./public/img/fishing-ico.png" alt="icon-fisher" />
						<h4>  
							<?php 
								echo $result; 
							?> 
							pêcheurs utilisent déjà l'application
						</h4>
					</div>
				</div>
			<?php include('footer.php'); ?>
		</div>
		<script src="./public/js/animate.js"></script>
	</body>
</html>

