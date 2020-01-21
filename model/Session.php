<?php
namespace VeyratAntoine\HowIFish\Model;

class Session extends Manager {

	// Connexion
    public function checkSession($name) {
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT * FROM members WHERE name = :name');
		$req->execute(array('name' => $name));
		$resultat = $req->fetch();

		return $resultat;	
	}

	// Inscription
	public function subscribeVerifyName($name) {
		$bdd = $this->dbConnect();
		$verify = $bdd->prepare('SELECT COUNT(id) FROM members WHERE name = :name');
        $verify->execute(array('name' => $name)); 
        $result = $verify->fetchColumn();

        return $result;
	}

	public function subscribeVerifyMail($mail) {
		$bdd = $this->dbConnect();
		$verify = $bdd->prepare('SELECT COUNT(id) FROM members WHERE mail = :mail');
        $verify->execute(array('mail' => $mail)); 
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
			'name' => $name,
			'mail' => $mail,
			'city' => $city,
			'pass' => $pass_hache
		));
			
		return $req;
	}

	// Changement de status
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

	// Update city
	public function updateCity($name, $city) {
		$bdd = $this->dbConnect();
		$update = $bdd->prepare('UPDATE members SET city= :city WHERE name = :name');
        $update->execute(array(
        	'city' => $city,
        	'name' => $name
        )); 
        $result = $update->fetch();

        return $result;
	}

	// nbOnline
	public function nbOnline() {
		$bdd = $this->dbConnect();
		$verify = $bdd->query('SELECT COUNT(id) FROM members'); 
        $result = $verify->fetchColumn();

        return $result;
	}

	// Update PASSWORD
	public function updatePass($pass) {
		$bdd = $this->dbConnect();
		$update = $bdd->prepare('UPDATE members SET password = :pass WHERE name = :name');
        $result = $update->execute(array(
        	'pass' => $pass,
        	'name' => $_SESSION['name']
        )); 

        return $result;	
	}

	// Upload img profile
	public function uploadImg($ext, $id) {
		$bdd = $this->dbConnect();
		$upload = $bdd->prepare('UPDATE members SET img = :img WHERE id = :id');
        $result = $upload->execute(array(
        	'img' => $_SESSION['id'].".".$ext,
        	'id' => $_SESSION['id']
        )); 

        return $result;	
	}

	// Try EXPERT
	public function addExp($id, $time) {
		$bdd = $this->dbConnect();
		$dateNow = date('Y-m-d');
		$dateExp = date('Y-m-d', strtotime("+$time day"));
		$upload = $bdd->prepare('UPDATE members SET expert_stop = :expDate, subscribe = :subDate WHERE id = :id');
        $result = $upload->execute(array(
        	'expDate' => $dateExp,
        	'subDate' => $dateNow,
        	'id' => $id
        )); 

        return $result;	
	}
}