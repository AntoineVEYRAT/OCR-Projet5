<?php
	require('controller/controller.php');
	session_start();
	try {
		if (!empty($_GET)) {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'login') {
					require ('view/login.php');
				} else if ($_GET['action'] == 'subscribe') {
					require ('view/subscribe.php');
				}
			} else {
				throw new Exception('Erreur : L\'url recherchée n\'existe pas!');
			}
		} else {
			require ('view/home.php');
		}
	} catch(Exception $e) {
        $errorMessage = $e->getMessage();
        require('view/error.php');
    }
	
?>