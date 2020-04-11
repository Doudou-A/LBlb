<?php

require_once('db_config.php');
require('Association.php');

class AssociationManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(Association $associations)
	{
		$query = $this->_db->prepare('INSERT INTO association(gid , uid) VALUES(:gid, :uid)');

        $query->bindValue(':gid', $associations->gid(), PDO::PARAM_INT);
        $query->bindValue(':uid', $associations->uid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}