<?php

include_once 'tools.php';

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

$dbConnectionArray = array('localhost', 'giletjaune', 'test', 'test00');

?>