<?php

include_once 'Controller/tools.php';

abstract class connectionDb
{
	public $db;
	private $hostname;
	private $dbname;
	private $dbuser;
	private $dbpassword;

	public function __construct($dbHost, $dbName, $dbUser, $dbPass){
		$this->db = NULL;
		$this->hostname = $dbHost;
		$this->dbname = $dbName;
		$this->dbuser = $dbUser;
		$this->dbpassword = $dbPass;
		$this->connectDb();
		return $this->db;
	}

	public function connectDb()
	{
		try{
			$db = new PDO('mysql:host=' . $this->hostname . ';dbname=' . $this->dbname, $this->dbuser, $this->dbpassword);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$db->exec("SET NAMES utf8");
			if (!empty($db))
			{
				$this->db = $db;
			}
		}
		catch (Exception $e) {
			die ('Erreur : ' . $e->getMessage());
		}
		return $this->db;
	}
}

// $dbConnectionArray = array('192.168.1.20:8080', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');

?>