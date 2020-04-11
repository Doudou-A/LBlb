<?php

require_once('db_config.php');
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

	public function getGroupes()
	{
		$groupespublish=[];
		$projet = new ProjetManager;

		$query = $this->_db->query('SELECT * FROM groupes');
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i=0; $i< count($data); $i++) 
		{ 
			$groupe = new Groupe($data[$i]);
			$groupe->setPid($projet->get($data[$i]["pid"]));
			array_push($groupespublish, $groupe); 
		} 

		return $groupespublish;
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}