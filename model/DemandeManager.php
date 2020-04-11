<?php

require_once('db_config.php');
require('demande.php');

class DemandeManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(Demande $demande)
	{
		$query = $this->_db->prepare('INSERT INTO demande(gid , uid) VALUES(:gid, :uid)');

        $query->bindValue(':gid', $demande->gid(), PDO::PARAM_INT);
        $query->bindValue(':uid', $demande->uid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}