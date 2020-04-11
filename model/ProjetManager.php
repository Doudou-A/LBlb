<?php

require_once('Config.php');
require('Projet.php');

class ProjetManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(Projet $projets)
	{
		$query = $this->_db->prepare('INSERT INTO projets(titre, description, tailleGroupe, dateDebut, dateFin) VALUES(:titre, :description, :tailleGroupe, :dateDebut, :dateFin)');

		$query->bindValue(':titre', $projets->titre(), PDO::PARAM_STR);
		$query->bindValue(':description', $projets->description(), PDO::PARAM_STR);
		$query->bindValue(':tailleGroupe', $projets->tailleGroupe(), PDO::PARAM_INT);
		$query->bindValue(':dateDebut',$projets->dateDebut());
        $query->bindValue(':dateFin', $projets->dateFin());

		$query->execute();
	}

	//Connecter un Utilisateur
	public function connect($login)
	{
		$login = (string) $login;

		$query = $this->_db->prepare('SELECT * FROM projets WHERE login = :login');
		$query->execute(array(':login' => $login));
		$data = $query->fetch();

		return new User($data);

	}

	public function delete(User $projets)
	{
		$query = $this->_db->prepare('DELETE FROM User WHERE idUser = :idUser');
		$query->bindvalue(':idUser', $user->idUser(), PDO::PARAM_INT);
		$query->execute();
	}

	//Vérifier l'existance d'un login
	public function loginExist($login)
	{
		$login = (string) $login;

		$query = $this->_db->prepare('SELECT uid FROM projets WHERE login = :login');
		$query->execute(array(':login' => $login));
		$data = $query->fetch(PDO::FETCH_ASSOC);

		return $data;
	}

	public function getLogin($login)
	{
		$login = (string) $login;

		$query = $this->_db->prepare('SELECT * FROM projets WHERE login = :login');
		$query->execute(array(':login' => $login));
		$data = $query->fetch();

		return $data;

	}

	public function get($id)
	{
		$id = (int) $id;

		$query = $this->_db->prepare('SELECT * FROM User WHERE idUser = :id');
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);

		return new User($data);
	}

	public function getProjets()
	{
		$projetspublish=[];

		$query = $this->_db->query('SELECT * FROM User');
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i=0; $i< count($data); $i++) 
		{ 
			$userpublish = new User($data[$i]);
			array_push($projetspublish, $userpublish); 
		} 

		return $projetspublish;
	}

	//Modifier un utilisateur avec un mot de passe différent
	public function update(User $user)
	{
		$query = $this->_db->prepare('UPDATE User SET login = :login, nom = :nom, prenom = :prenom, mdp = :mdp, role = :role WHERE idUser = :idUser');

		$pass_hash = mdp_hash($user->mdp(), mdp_DEFAULT);

		$query->bindValue(':idUser', $user->idUser(), PDO::PARAM_STR);
		$query->bindValue(':login', $user->login(), PDO::PARAM_STR);
		$query->bindValue(':nom', $user->nom(), PDO::PARAM_STR);
		$query->bindValue(':prenom', $user->prenom(), PDO::PARAM_STR);
		$query->bindValue(':mdp', $pass_hash, PDO::PARAM_STR);
		$query->bindValue(':role', $user->role);

		$query->execute();
	}


	//Modifier un utilisateur avec le même mot de passe
	public function updateNomdp(User $user)
	{
		$query = $this->_db->prepare('UPDATE User SET login = :login, nom = :nom, prenom = :prenom WHERE idUser = :idUser');

		$query->bindValue(':idUser', $user->idUser(), PDO::PARAM_STR);
		$query->bindValue(':login', $user->login(), PDO::PARAM_STR);
		$query->bindValue(':nom', $user->nom(), PDO::PARAM_STR);
		$query->bindValue(':prenom', $user->prenom(), PDO::PARAM_STR);

		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}