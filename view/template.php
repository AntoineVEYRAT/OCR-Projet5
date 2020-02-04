<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>How I Fish - Application</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Load Fontawesome -->
		<script src="https://kit.fontawesome.com/fa7ae6c9e7.js" crossorigin="anonymous"></script>
		<!-- Load Style -->
		<link rel="stylesheet" href="../public/css/interface.css">
		<!-- Load JQUERY -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<?php 
				include('header.php');
				echo $content;
				include('footer.php'); 
			?>
		</div>
	</body>
</html>