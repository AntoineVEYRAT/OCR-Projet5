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
    public function loadTicket($firstPage, $maxPerPage) {
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('
			SELECT * 
			FROM tickets 
			WHERE id_member = :member 
			ORDER BY id DESC
			LIMIT :firstPage, :maxPerPage'
		);
		$req->bindValue(':member', $_SESSION['id'], \PDO::PARAM_INT);
		$req->bindValue(':firstPage', $firstPage, \PDO::PARAM_INT);
		$req->bindValue(':maxPerPage', $maxPerPage, \PDO::PARAM_INT);
		$req->execute(); 

		return $req;
	}

	// Récuperer le nb de notes
	public function nbTicket($member) {
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT COUNT(id) AS nb FROM tickets WHERE id_member = :member');
		$req->execute(array('member' => $member));
		$result = $req->fetch();
		$nbTicket = $result['nb'];

		return $nbTicket;
	}
}