<?php
namespace VeyratAntoine\HowIFish\Model;

class Ticket extends Manager {

	// Ajout note
    public function addTicket($text, $member) {
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('INSERT INTO tickets(text, id_member) VALUES(:text, :member)');
		$req->execute(array(
			'text' => $text,
			'member' => $member
		));

		return $req;	
	}

		// Récuperer les notes
    public function loadTicket($member) {
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT * FROM tickets WHERE id_member = :member LIMIT 3');
		$req->execute(array('member' => $member));

		return $req;	
	}

}