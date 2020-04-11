<?php

require_once('db_config.php');
require('affectation.php');

class AffectationManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(Affectation $affectation)
	{
		$query = $this->_db->prepare('INSERT INTO affectation(gid , cid) VALUES(:gid, :cid)');

        $query->bindValue(':gid', $affectation->gid(), PDO::PARAM_INT);
        $query->bindValue(':cid', $affectation->cid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}