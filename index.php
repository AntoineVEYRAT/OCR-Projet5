<?php
	require('controller/controller.php');
	session_start();
	try {
		if (!empty($_GET)) {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'open') {
					if (isset($_GET['app'])) {
						if (isset($_SESSION['id'])) {
							require ('view/front-app.php');
						} else {
							require ('view/login.php');
						}
					} else {
						// AUTRE QUE APP
					}
					
				}
				else if ($_GET['action'] == 'login') {
					if (isset($_GET['verify'])) {
						if (!empty($_POST)) {
							login($_POST['login_name'], $_POST['login_pass']);
						} else {
							throw new Exception('Error : Aucunes données dans le formulaire !');
						}
					} else {
						require ('view/login.php');
					}
				} else if ($_GET['action'] == 'subscribe') {
					if (isset($_GET['verify'])) {
						if (!empty($_POST)) {
							subscribe(
								$_POST['subscribe_name'], 
								$_POST['subscribe_mail'], 
								$_POST['subscribe_pass']
							);
						} else {
							throw new Exception('Error : Aucunes données dans le formulaire !');
						}
					} else {
						require ('view/subscribe.php');
					}
				} else if ($_GET['action'] == 'logout') {
					logout();
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