<?php

require_once('db_config.php');
require('Choix.php');

class ChoixManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(choix $choix)
	{
		$query = $this->_db->prepare('INSERT INTO choix(nom , pid) VALUES(:nom, :pid)');

        $query->bindValue(':nom', $choix->nom(), PDO::PARAM_STR);
        $query->bindValue(':pid', $choix->pid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function getChoix()
	{
		$choixpublish=[];

		$query = $this->_db->query('SELECT * FROM choix');
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i=0; $i< count($data); $i++) 
		{ 
			$choix = new Choix($data[$i]);
			array_push($choixpublish, $choix); 
		} 

		return $choixpublish;
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}