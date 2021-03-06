<?php
		// Chargement des classes
	require __DIR__ . '/../vendor/autoload.php';
	use model\Manager;
	use model\Session;
	use model\Ticket;

		// LOGIN
	function home() {
		$session = new Session();
		$result = $session->nbOnline();

		if ($result === false) {
	    	throw new Exception('Erreur SQL: Impossible d\'accéder aux données !');
	    } else {
	    	require ('view/home.php');
	    }
	}

		// LOGIN
	function login($name, $pass) {
		$session = new Session();
		$result = $session->checkSession($name);
		if ($result === false) {
	    	throw new Exception('Erreur : Impossible d\'accéder à vos données !');
	    } else {
		    $rId = $result['id'];
		    $rName = $result['name'];
		    $rPass = $result['password'];
		    $rMail = $result['email'];
		    $rCity = $result['city'];
		    $rImg = $result['img'];
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
					$_SESSION['city'] = $rCity;
					$_SESSION['img'] = $rImg;
					$_SESSION['expStop'] = $rExpertStop;

					header('Location: index.php?action=open&app');
				} else {
					throw new \Exception('Erreur : Mot de passe erroné !');
				}
				
			}
		}
	}

		// SUBSCRIBE
	function subscribe($name, $mail, $city, $pass) {
		$session = new Session();
		$resultName = $session->subscribeVerifyName($name);
		if ($resultName != 0) {
			throw new \Exception('Erreur SQL: Cet identifiant est déjà pris, veuillez en choisir un nouveau !');
		} else {
			$resultMail = $session->subscribeVerifyMail($mail);
			if ($resultMail != 0) {
				throw new \Exception('Erreur SQL: L\'adresse mail est déjà répertoriée dans notre base de donnée !');
			} else {
				if ($pass == $name) {
					throw new \Exception('Erreur SQL: Vous ne devez pas utiliser un mot de passe similaire à votre identifiant !');
				} else {
					$insert = $session->subscribeInsert($name, $mail, $city, $pass);
					if ($insert === false) {
						throw new \Exception('Erreur SQL: Impossible d\'enregistrer vos données !');
					} else {
						header('Location: index.php?action=subscribe&redir');
					}
				}
			}
		}
	}

		// LOGOUT
	function logout() {
		$_SESSION = array();
		session_destroy();
		header('Location: index.php?action=logout&redir');
	}

		// ADD TICKET
	function addTicket($text, $member) {
		$ticket = new Ticket();
		
		if ($_SESSION['status'] == 1) {
			$result = $ticket->addTicket($text, $member);
			if ($result == false) {
				throw new \Exception('Erreur SQL : Ajout de la note impossible !');
			} else {
				header('Location: index.php?action=open&app');
			}
		} else {
			$nbTicket = $ticket->nbTicket($member);
			if ($nbTicket == 0) {
				$result = $ticket->addTicket($text, $member);
				if ($result == false) {
					throw new \Exception('Erreur SQL : Ajout de la note impossible !');
				} else {
					header('Location: index.php?action=open&app');
				}
			} else {
				header('Location: index.php?action=ticket&failed');
			}
		}
		
	}

		// DELETE TICKET
	function deleteTicket($id) {
		$ticket = new Ticket();
		$delete = $ticket->deleteTicket($id);

		if ($delete == false) {
			throw new \Exception('Erreur SQL : Impossible de supprimer ce ticket !');
		} else {
			header('Location: index.php?action=open&app');
		}
	}

		// UPDATE CITY
	function updateCity($city) {
		$session = new Session();

		$session->updateCity($_SESSION['name'], $city);

		if ($session === false) {
			throw new \Exception('Erreur SQL : Impossible de changer votre nom de ville !');
		} else {
			$_SESSION['city'] = $city;
			header('Location: index.php?action=update&city&redir');
		}
	}

		// UPDATE PASSWORD
	function updatePass($pass, $newPass, $newPassRep) {
		$session = new Session();

		$resultCheck = $session->checkSession($_SESSION['name']);
		if ($resultCheck === false) {
			throw new \Exception('Erreur SQL: Impossible d\'accéder à vos données !');
		} else {
			$oldPass = $resultCheck['password'];
			$isOldPasswordCorrect = password_verify($pass, $oldPass);

			if ($newPassRep != $newPass) {
				throw new \Exception('Les deux mot de passe ne sont pas identiques  !');
			} else {
				if ($isOldPasswordCorrect) {
					$passHache = password_hash($newPassRep, PASSWORD_DEFAULT);
					$update = $session->updatePass($passHache);
					if ($update === false) {
						throw new \Exception('Erreur SQL: Impossible de modifier votre mot de passe !');
					} else {
						header('Location: index.php?action=update&pass&redir');
					}
				} else {
					throw new \Exception('Erreur SQL: votre ancien mot de passe n\'est pas correct !');
				}
			}
		}
	}

		// UPLOAD IMG
	function upload() {
		$session = new Session();
		$sizeMax = 2097152;
   		$ext = array('jpg', 'jpeg', 'png');

   		if ($_FILES['avatar']['size'] <= $sizeMax) {
   			$extUp = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
   			if (in_array($extUp, $ext)) {
   				$imgStorage = "./storage/img/".$_SESSION['id'].".".$extUp;
   				if (file_exists('./storage/img/'. $_SESSION['img'])) {
   					unlink($_SESSION['img']);
   					$result = move_uploaded_file($_FILES['avatar']['tmp_name'], $imgStorage);
	   				if ($result) {
	   					$upload = $session->uploadImg($extUp, $_SESSION['id']);
	   					if ($upload === false) {
	   						throw new \Exception('Erreur SQL: Impossible d\'importer votre fichier !');
	   					} else {
	   						$_SESSION['img'] = $_SESSION['id'].".".$extUp;
	   						header('Location: index.php?action=upload&redir');
	   					}
	   				} else {
	   					throw new \Exception('Erreur : Impossible d\'importer votre fichier !');
	   				}
   				} else {
   					$result = move_uploaded_file($_FILES['avatar']['tmp_name'], $imgStorage);
	   				if ($result) {
	   					$upload = $session->uploadImg($extUp, $_SESSION['id']);
	   					if ($upload === false) {
	   						throw new \Exception('Erreur SQL: Impossible d\'importer votre fichier !');
	   					} else {
	   						$_SESSION['img'] = $_SESSION['id'].".".$extUp;
	   						header('Location: index.php?action=upload&redir');
	   					}
	   				} else {
	   					throw new \Exception('Erreur : Impossible d\'importer votre fichier !');
	   				}
   				}
   			} else {
   				throw new \Exception('Erreur : L\'extension de votre fichier n\'est pas valide !');
   			}
   		} else {
   			throw new \Exception('Erreur : Votre fichier est trop volumineux !');
   		}
	}

		// OPEN INTERFACE
	function openInterface($member) {
		$ticket = new Ticket();
		$session = new Session();

		if (isset($_SESSION['id'])) {
			$result = $session->verifStatus($_SESSION['name']);
			if ($result === false) {
				throw new \Exception('Erreur SQL: Impossible d\'accéder à vos données !');
			} else {
				if ($result['expert_stop'] == '0000-00-00') {
					$switchStatus = $session->switchStatus($_SESSION['name'], 0);
					if ($switchStatus === false) {
						throw new \Exception('Erreur SQL: Impossible d\'accéder à vos données !');
					} else {
						$_SESSION['status'] = 0;
					}
				} else if(date("Y-m-d") > $result['expert_stop']) {
					$switchStatus = $session->switchStatus($_SESSION['name'], 0);
					if ($switchStatus === false) {
						throw new \Exception('Erreur SQL: Impossible d\'accéder à vos données !');
					} else {
						$_SESSION['status'] = 2;
					}
				} else {
					$switchStatus = $session->switchStatus($_SESSION['name'], 1);
					if ($switchStatus === false) {
						throw new \Exception('Erreur SQL: Impossible d\'accéder à vos données !');
					} else {
						$_SESSION['status'] = 1;
					}
				}
			}
		} else {
			throw new \Exception('Erreur SQL: Vous devez être connecté !');
		}

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
						throw new \Exception('Erreur SQL : Impossible de récuperer les tickets ! ');
					} else {
						$noTicket = false;
						require('view/front-app.php');
					}
				} else {
					$currentPage = $_GET['page'];
					$firstPage = ($currentPage-1)*$maxPerPage;
					$load = $ticket->loadTicket($firstPage, $maxPerPage);
					if ($load == false) {
						throw new \Exception('Erreur SQL : Impossible de récuperer les tickets !');
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
					throw new \Exception('Erreur SQL : Impossible de récuperer les tickets !');
				} else {
					$noTicket = false;
					require('view/front-app.php');
				}
			}
		}
	}

		// TRY EXPERT
	function tryExp($id) {
		$session = new Session();

		$updateDates = $session->addExp($id, 14);
		$switchStatus = $session->switchStatus($_SESSION['name'], 1);

		if (($updateDates === false) && ($switchStatus === false)) {
			throw new \Exception('Erreur SQL: Impossible de modifier vos données !');
		} else {
			$_SESSION['status'] = 1;
			$_SESSION['expStop'] = date('Y-m-d', strtotime("+14 day"));
			redirWTime('Vous avez rejoin le groupe des pêcheurs experts pendant 15jours !', 5, 'index.php?action=open&app');
		}
	}

		// VERIFY
	function confirm($id) {
		$idTicket = $id;
		require('view/confirm.php');
	}

		// REQUIRES
	function open($view) {
		if ($view == 'subscribe') {
			require('view/subscribe.php');
		} else if ($view == 'login') {
			require('view/login.php');
		} else if ($view == 'updateCity') {
			require('view/update-city.php');
		} else if ($view == 'updatePass') {
			require('view/update-password.php');
		} else if ($view == 'upload') {
			require('view/upload.php');
		} else if ($view == 'expert') {
			require('view/expert.php');
		} else if ($view == 'tryIt') {
			require('view/expert-try.php');
		} else {
			throw new \Exception('Erreur : La page recherchée n\'existe pas !');
		}
	}

		// REDIRECTION
	function redirApp() {
		header ('Location: index.php?action=open&app');
	}

		// ACTION CONFIRM
	function redirWTime($text, $time, $url) {
		header ('refresh:'. $time .';url='. $url .'');
		$message = $text;
		require ('view/action-confirm.php');
	}

		// REDIRECTION ERROR VIEW
	function openErrorView($error) {
		$errorMessage = $error;
		require('view/error.php');
	}
