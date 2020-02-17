<?php
	require __DIR__ . '/vendor/autoload.php';
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
							open('login');
						}
					} else if (isset($_GET['expert'])){
						open('expert');
					} else if (isset($_GET['try'])) {
						open('tryIt');
					} else {
						throw new Exception('Error : La page recherchée n\'existe pas !');
					}	
				} else if ($_GET['action'] == 'login') {
					if (isset($_GET['verify'])) {
						if (!empty($_POST)) {
							$_POST['login_name'] = strtolower($_POST['login_name']);
							login(htmlspecialchars($_POST['login_name']), htmlspecialchars($_POST['login_pass']));
						} else {
							throw new Exception('Error : Aucunes données dans le formulaire !');
						}
					} else {
						open('login');
					}
				} else if ($_GET['action'] == 'subscribe') {
					if (isset($_GET['verify'])) {
						if (!empty($_POST)) {
							if (!empty($_POST['subscribe_name']) 
							AND !empty($_POST['subscribe_mail']) 
							AND !empty($_POST['subscribe_city'])
							AND !empty($_POST['subscribe_pass'])
							) {
								if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['subscribe_mail'])) {
									$_POST['subscribe_name'] = strtolower(htmlspecialchars($_POST['subscribe_name']));
									$_POST['subscribe_mail'] = htmlspecialchars($_POST['subscribe_mail']);
									$_POST['subscribe_city'] = htmlspecialchars($_POST['subscribe_city']);
									$_POST['subscribe_pass'] = htmlspecialchars($_POST['subscribe_pass']);
									subscribe($_POST['subscribe_name'], $_POST['subscribe_mail'], $_POST['subscribe_city'], $_POST['subscribe_pass']);
								} else {
									throw new Exception('Error : Email invalide !');
								}
							} else {
								throw new Exception('Error : Certaine(s) donnée(s) sont absentes !');
							}
						} else {
							throw new Exception('Error : Aucunes données dans le formulaire !');
						}
					} else if (isset($_GET['redir'])){
						redirWTime('Votre inscription a bien été prise en compte !', 4, 'index.php?action=open&app');
					} else {
						open('subscribe');
					}
				} else if ($_GET['action'] == 'ticket') {
					if (isset($_GET['add'])) {
						addTicket(htmlspecialchars($_POST['ticket']), $_SESSION['id']);
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
					} else if (isset($_GET['failed'])){
						redirWTime('Désolé, vous avez atteint le nombre maximal de note !', 3, 'index.php?action=open&app');
					} else {
						redirApp();
					}
						
				} else if ($_GET['action'] == 'logout') {
					if (isset($_GET['redir'])) {
						redirWTime('Vous avez bien été déconnecté !', 3, 'index.php');
					} else {
						logout();
					}

				} else if ($_GET['action'] == 'update') {
					if (isset($_GET['city'])) {
						if (isset($_GET['redir'])) {
							redirWTime('Votre ville a bien été modifié !', 3, 'index.php?action=open&app');
						} else if (isset($_GET['verify'])) {
							if (isset($_POST['update_city'])) {
								$_POST['update_city'] = htmlspecialchars($_POST['update_city']);
								updateCity($_POST['update_city']);
							} else {
								throw new Exception('Error : Le nom de ville n\'est pas correct !');
							}
						} else {
							open('updateCity');
						}
					} else if (isset($_GET['pass'])) {
						if (isset($_GET['redir'])) {
							redirWTime('Votre mot de passe a bien été modifié !', 3, 'index.php?action=open&app');
						}
						else if (isset($_GET['verify'])) {
							if (isset($_POST['old_pass']) && isset($_POST['update_pass']) && isset($_POST['update_passRep'])) {
								$_POST['old_pass'] = htmlspecialchars($_POST['old_pass']);
								$_POST['update_pass'] = htmlspecialchars($_POST['update_pass']);
								$_POST['update_passRep'] = htmlspecialchars($_POST['update_passRep']);
								updatePass($_POST['old_pass'], $_POST['update_pass'], $_POST['update_passRep']);
							} else {
								throw new Exception('Error : Le formulaire n\'est pas complet, ou les données ne sont pas identiques !');
							}
						} else {
							open('updatePass');
						}
					} else {
						redirApp();
					}	
				} else if ($_GET['action'] == 'upload') {
					if (isset($_GET['redir'])) {
							redirWTime('Votre avatar a bien été modifié !', 3, 'index.php?action=open&app');
					} else if (isset($_GET['verify'])) {
						if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
							upload();
						} else {
							throw new Exception('Erreur : Aucun fichier à uploader !');
						}
					} else {
						open('upload');
					}
				} else if ($_GET['action'] == 'expert') {
					if (isset($_GET['purchase'])) {
						if (isset($_SESSION['id'])) {
							tryExp($_SESSION['id']);
						} else {
							throw new Exception('Error : Vous devez être connecté !');
						}
					} else {
						home();
					}
				} else {
					throw new Exception('Erreur : L\'url recherchée n\'existe pas !');
				}
			} else {
				throw new Exception('Erreur : L\'url recherchée n\'existe pas !');
			}
		} else {
			home();
		}
	} catch(Exception $e) {
        $errorMessage = $e->getMessage();
        openErrorView($errorMessage);
    }
?>