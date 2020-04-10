<?php

class User
{
	private $_uid;
	private $_titre;
	private $_prenom;
	private $_login;
	private $_mdp;
	private $_role;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) 
		{
			$method = 'set' . ucfirst($key);

			if (method_exists($this, $method)) 
			{
				$this->$method($value);
			}
		}
	}

	//Getters

	public function uid() { return $this->_uid; }
	public function titre() { return $this->_titre; }
	public function prenom() { return $this->_prenom; }
	public function login() { return $this->_login; }
	public function mdp() { return $this->_mdp; }
	public function role() { return $this->_role; }


	//Setters

	public function setUid($uid)
	{
		$uid = (int) $uid;

		if ($uid >0)
		{
			$this->_uid = $uid;
		}
	}

	public function setTitre($titre)
	{
		if(is_string($titre))
		{
			$this->_titre = $titre;
		}
	}

	public function setPrenom($prenom)
	{
		if(is_string($prenom))
		{
			$this->_prenom = $prenom;
		}
	}

	public function setLogin($login)
	{
		if(is_string($login))
		{
			$this->_login = $login;
		}
	}

	public function setMdp($mdp)
	{
        if(is_string($mdp))
		{
            $this->_mdp = $mdp;
        }
	}

	public function setRole($role)
	{
        if(is_string($role))
		{
            $this->_role = $role;
        }
	}
}