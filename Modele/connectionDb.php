<?php

include_once '../Controller/tools.php';


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
		/* Récupération du contenu du fichier .json */
		$contenu_fichier_json = file_get_contents('../Modele/infos.json');
		/* Les données sont récupérées sous forme de tableau (true) */
		$dbInfos = json_decode($contenu_fichier_json, true);
		try{
			$db = new PDO('mysql:host=' . $dbInfos['hostname'] . ';dbname=' . $dbInfos['dbname'], $dbInfos['dbuser'], $dbInfos['dbpassword']);
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

?>