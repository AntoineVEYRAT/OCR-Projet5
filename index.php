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
							$_POST['login_name'] = strtolower($_POST['login_name']);
							login(htmlspecialchars($_POST['login_name']), htmlspecialchars($_POST['login_pass']));
						} else {
							throw new Exception('Error : Aucunes données dans le formulaire !');
						}
					} else {
						require ('view/login.php');
					}
				} else if ($_GET['action'] == 'subscribe') {
					if (isset($_GET['verify'])) {
						if (!empty($_POST)) {
							if (isset($_POST['subscribe_name']) 
							&& isset($_POST['subscribe_mail']) 
							&& isset($_POST['subscribe_city'])
							&& isset($_POST['subscribe_pass'])
							) {
								if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['subscribe_mail'])) {
									$_POST['subscribe_name'] = strtolower($_POST['subscribe_name']);
									subscribe(
										htmlspecialchars($_POST['subscribe_name']), 
										htmlspecialchars($_POST['subscribe_mail']), 
										htmlspecialchars($_POST['subscribe_city']),
										htmlspecialchars($_POST['subscribe_pass'])
									);
								} else {
									throw new Exception('Error : Email invalide !');
								}
							} else {
								throw new Exception('Error : Certaine(s) donnée(s) sont absentes !');
							}
						} else {
							throw new Exception('Error : Aucunes données dans le formulaire !');
						}
					} else {
						require ('view/subscribe.php');
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
					} else {
						header ('Location: index.php?action=open&app');
					}
						
				} else if ($_GET['action'] == 'logout') {
					logout();

				} else if ($_GET['action'] == 'update') {
					if (isset($_GET['city'])) {
						if (isset($_GET['redir'])) {
							echo 'Votre ville a bien été modifié !';
							header('refresh:5;url=index.php?action=open&app');
						} else if (isset($_GET['verify'])) {
							if (isset($_POST['update_city'])) {
								$_POST['update_city'] = htmlspecialchars($_POST['update_city']);
								updateCity($_POST['update_city']);
							} else {
								throw new Exception('Error : Le nom de ville n\'est pas correct !');
							}
						} else {
							require ('view/update-city.php');
						}
					} else if (isset($_GET['pass'])) {
						if (isset($_GET['redir'])) {
							echo 'Votre mot de passe a bien été modifié !';
							header('refresh:5;url=index.php?action=open&app');
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
							require ('view/update-password.php');
						}
					} else {
						header ('Location: index.php?action=open&app');
					}	
				}

			} else {
				throw new Exception('Erreur : L\'url recherchée n\'existe pas !');
			}
		} else {
			home();
		}
	} catch(Exception $e) {
        $errorMessage = $e->getMessage();
        require('view/error.php');
    }
?>