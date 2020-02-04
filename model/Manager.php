<?php
namespace model;

class Manager {
    // Connexion à la BDD
	protected function dbConnect() {
		$bdd = new \PDO('mysql:host=localhost; dbname="howifish"; charset=utf8', 'root', '');
		
		return $bdd;
    }
}