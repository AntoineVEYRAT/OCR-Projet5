<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>How I Fish - Application</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Load Fontawesome -->
		<script src="https://kit.fontawesome.com/fa7ae6c9e7.js" crossorigin="anonymous"></script>
		<!-- Load Style -->
		<link rel="stylesheet" href="../public/css/interface.css">
	</head>
	<body>
		<div class="container">
			<?php 
				include('header.php');
				echo $content ;
				include('footer.php'); 
			?>
		</div>
	</body>
	<script type="text/javascript" src="./js/ajax.js"></script>
	<script type="text/javascript" src="./js/station.js"></script>
	<script type="text/javascript" src="./js/main.js"></script>
</html>