<?php

class Choix
{
    private $_gid;
    private $_nom;
	private $_pid;

	public function __construct(array $data)
    {
        $this->hydrate($data);
    }
 
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
 
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

	//Getters

    public function gid() { return $this->_gid; }
    public function nom() { return $this->_nom; }
	public function pid()	{ return $this->_pid;	}

	//Setters

	public function setGid($gid)
	{
		$gid = (int) $gid;

		if ($gid >0)
		{
			$this->_gid = $gid;
		}
    }
    
    public function setNom($nom)
	{
		if (is_string($nom))
		{
			$this->_nom = $nom;
		}
	}

	public function setPid($pid)
	{
			$this->_pid = $pid;
	}
}