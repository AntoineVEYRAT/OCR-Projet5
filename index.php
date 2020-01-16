<?php
	require('controller/controller.php');
	session_start();
	try {
		if (!empty($_GET)) {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'open') {
					if (isset($_GET['app'])) {
						if (isset($_SESSION['id'])) {
							openInterface($_SESSION['id']);
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
								$_POST['subscribe_city'],
								$_POST['subscribe_pass']
							);
						} else {
							throw new Exception('Error : Aucunes données dans le formulaire !');
						}
					} else {
						require ('view/subscribe.php');
					}
				} else if ($_GET['action'] == 'ticket') {
					if (isset($_GET['add'])) {
						addTicket($_POST['ticket'], $_SESSION['id']);
					} else if (isset($_GET['delete'])) {
						if (isset($_GET['id'])) {
							if (isset($_GET['confirm'])) {
									deleteTicket($_GET['id']);
								} else {
									confirm($_GET['id']);
								}
						} else {
							throw new Exception('Error : Désolé, ce ticket n\'existe pas !');
						}
					} else {
						header ('Location: index.php?action=open&app');
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