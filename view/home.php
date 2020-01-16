<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>How I Fish</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../public/css/style.css">
		<!-- Load Fontawesome -->
		<script src="https://kit.fontawesome.com/fa7ae6c9e7.js" crossorigin="anonymous"></script>
		<!-- Load Bootsrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<!-- Load JQUERY -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</head>
	<body>
		<div class="arrow"><a href="#"><i class="fas fa-chevron-up fa-2x"></i></a></div>
		<div class="container-fluid">
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
						<p>Profitez des fonctionnalitées du pêcheur Expert gratuitement pendant <span class="yellow">15 jours</span> !</p>
					</div>
					<div class="promo-bar-img">
						<img src="./public/img/purple-button.png" />
						<a href="test.php">J'en profite !</a>
					</div>
				</div>
				<div id="offers-bar">
					<div class="offers-bar-text">
						<h3>How I Fish vous propose <img src="./public/img/2.png" width="75px"/> options</h3>
					</div>
					<div class="offers-bar-block">
						<div class="offers-block"><img src="./public/img/offers-cadre-white.png" /><h4>Occasionnel</h4></h3><p>Test</p></div>
						<div class="offers-block"><img src="./public/img/offers-cadre-yellow.png" /><h4>Expert</h4><p>Test</p></div>
					</div>
				</div>
				<div id="stats-bar">
					<h4><img src="./public/img/fishing-ico.png" width="40px" /> 33 pêcheurs utilisent déjà l'application</h4>
				</div>
			<?php include('footer.php'); ?>
		</div>
	</body>
	<script type="text/javascript" src="./js/animate.js"></script>
</html>

