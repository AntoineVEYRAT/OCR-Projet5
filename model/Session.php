<?php
namespace VeyratAntoine\HowIFish\Model;

class Session extends Manager {

	// Connexion
    public function login($name, $pass) {
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT * FROM members WHERE name = :name');
		$req->execute(array('name' => $name));
		$resultat = $req->fetch();

		return $resultat;	
	}

	// Inscription
	public function subscribe($name, $mail, $pass) {
		$bdd = $this->dbConnect();
		$verify = $bdd->prepare('SELECT COUNT(id) FROM members WHERE name = :name');
        $verify->execute(array('name' => $name)); 
        $result = $verify->fetchColumn();

        return $result;
	}

	public function subscribeInsert($name, $mail, $city, $pass) {
		$bdd = $this->dbConnect();
		// Hachage
		$pass_hache = password_hash($pass, PASSWORD_DEFAULT);
		// Insertion
		$req = $bdd->prepare('INSERT INTO members(name, email, city, password) VALUES(:name, :mail, :city, :pass)');
		$req->execute(array(
			'name' => $_POST['subscribe_name'],
			'mail' => $mail,
			'city' => $city,
			'pass' => $pass_hache
		));
			
		return $req;
	}

	// Inscription
	public function switchStatus($name, $nb) {
		$bdd = $this->dbConnect();
		$switch = $bdd->prepare('UPDATE members SET status= :status WHERE name = :name');
        $switch->execute(array(
        	'status' => $nb,
        	'name' => $name
        )); 

        return $switch;
	}

	// Verification abonnement
	public function verifStatus($name) {
		$bdd = $this->dbConnect();
		$select = $bdd->prepare('SELECT * FROM members WHERE name = :name');
        $select->execute(array('name' => $name)); 
        $result = $select->fetch();

        return $result;
	}
}