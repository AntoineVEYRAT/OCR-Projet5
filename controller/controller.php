<?php
	// Chargement des classes
	require_once('model/Manager.php');
	require_once('model/Session.php');
	require_once('model/Ticket.php');

	// LOGIN
	function login($name, $pass) {
		$session = new \VeyratAntoine\HowIFish\Model\Session();
		$result = $session->login($name, $pass);
		if ($result === false) {
	    	throw new Exception('Erreur : Impossible d\'accéder à vos données !');
	    } else {
		    $rId = $result['id'];
		    $rName = $result['name'];
		    $rPass = $result['password'];
		    $rMail = $result['email'];
		    $rStatus = $result['status'];
		    $rLat = $result['latitute'];
		    $rLong = $result['longitude'];
		    $rExpertStop = $result['expert_stop'];
		    // Comparaison du mot de passe
			$isPasswordCorrect = password_verify($pass, $rPass);
			// Vérification du name
			if ($name != $rName) {
				throw new \Exception('Erreur : Identifiant non reconnu !');
			// Vérification du password
			} else {
				if ($isPasswordCorrect) {
					session_start();
					$_SESSION['id'] = $rId;
					$_SESSION['name'] = $rName;
					$_SESSION['email'] = $rMail;
					$_SESSION['status'] = $rStatus;
					$_SESSION['lat'] = $rLat;
		    		$_SESSION['long'] = $rLong;
		    		$_SESSION['expStop'] = $rExpertStop;

					header('Location: index.php?action=open&app');
				}else {
					throw new \Exception('Erreur : Mot de passe erroné !');
				}
			}
		}
	}

	// SUBSCRIBE
	function subscribe($name, $mail, $pass) {
		$session = new \VeyratAntoine\HowIFish\Model\Session();
		$result = $session->subscribe($name, $mail, $pass);
		if ($result != 0) {
			throw new \Exception('Erreur : Cet identifiant est déjà pris, veuillez en choisir un nouveau !');
		} else {
			$insert = $session->subscribeInsert($name, $mail, $pass);
			if ($insert === false) {
				throw new \Exception('Erreur SQL: Impossible d\'enregistrer vos données !');
			} else {
				header('Location: index.php');
			}
		}
	}

	// LOGOUT
	function logout() {
		$_SESSION = array();
		session_destroy();
		header('Location: index.php');
	}

	// ADD TICKET
	function addTicket($text, $member) {
		$ticket = new \VeyratAntoine\HowIFish\Model\Ticket();
		$result = $ticket->addTicket($text, $member);

		if ($result == false) {
			throw new \Exception('Erreur SQL : Ajout de la note impossible !');
		} else {
			header('Location: index.php?action=open&app');
		}
	}

	// OPEN INTERFACE
	function openInterface($member) {
		$ticket = new \VeyratAntoine\HowIFish\Model\Ticket();

		$nbTicket = $ticket->nbTicket($member);
		if ($nbTicket == 0) {
			$noTicket = true;
			require('view/front-app.php');
		} else {
			$maxPerPage = 3;
			$nbPage = ceil($nbTicket/$maxPerPage);
			if (isset($_GET['page']) && !empty($_GET['page']) && ctype_digit($_GET['page']) == 1) {
				if ($_GET['page'] > $nbPage || $_GET['page'] <= 0) {
					$currentPage = 1;
					$firstPage = ($currentPage-1)*$maxPerPage;
					$load = $ticket->loadTicket($firstPage, $maxPerPage);
					if ($load == false) {
						throw new \Exception('Erreur SQL : Impossible de récuperer les notes ! ');
					} else {
						$noTicket = false;
						require('view/front-app.php');
					}
				} else {
					$currentPage = $_GET['page'];
					$firstPage = ($currentPage-1)*$maxPerPage;
					$load = $ticket->loadTicket($firstPage, $maxPerPage);
					if ($load == false) {
						throw new \Exception('Erreur SQL : Impossible de récuperer les notes !');
					} else {
						$noTicket = false;
						require('view/front-app.php');
					}
				}
			} else {
				$currentPage = 1;
				$firstPage = ($currentPage-1)*$maxPerPage;
				$load = $ticket->loadTicket($firstPage, $maxPerPage);
				if ($load == false) {
					throw new \Exception('Erreur SQL : Impossible de récuperer les notes !');
				} else {
					$noTicket = false;
					require('view/front-app.php');
				}
			}
		}
	}
