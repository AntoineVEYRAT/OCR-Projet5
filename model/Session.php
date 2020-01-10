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

	public function subscribeInsert($name, $mail, $pass) {
		$bdd = $this->dbConnect();
		// Hachage
		$pass_hache = password_hash($pass, PASSWORD_DEFAULT);
		// Insertion
		$req = $bdd->prepare('INSERT INTO members(name, email, password) VALUES(:name, :mail, :pass)');
		$req->execute(array(
			'name' => $_POST['subscribe_name'],
			'mail' => $mail,
			'pass' => $pass_hache
		));
			
		return $req;
	}
}