<?php

require_once('Config.php');
require('Groupe.php');

class GroupeManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(Groupe $groupes)
	{
		$query = $this->_db->prepare('INSERT INTO groupes(pid) VALUES(:pid)');

		$query->bindValue(':pid', $groupes->pid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}