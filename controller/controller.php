<?php
	// Chargement des classes
	require_once('model/Manager.php');
	require_once('model/Session.php');

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

					header('Location: index.php');
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