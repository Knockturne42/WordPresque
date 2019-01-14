<?php

include_once 'Controller/formulaire.php';
include_once 'Modele/requete.php';

$arrayInpName = array('generer');
$arrayInptype = array('submit');
$randomForm = new formulaire('#', 'get', 'random', $arrayInpName, $arrayInptype);
$randomForm->displayForm();

if(isset($_GET['generer'])) {
	$num = rand(1, 145000);
	$columnArray = array('orthMot');
	$valueArray = array('0');
	// $dbConnectionArray = array('localhost', 'wordpresque', 'test', 'test00');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'idMot LIKE "'.$num.'" ';

	$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', $condition, $orderby);

	$selectMot->selectDb();
	while(!($mot = $selectMot->queryDb->fetch()))
	{
			$num = rand(1, 145000);
			$columnArray = array('*');
			$valueArray = array('0');
			$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
			$condition = 'idMot LIKE "'.$num.'" ';

			$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', $condition, $orderby);

			$selectMot->selectDb();
	}
<<<<<<< HEAD
	var_dump($mot);

	
=======
	echo $mot['orthMot'];
>>>>>>> 63604f662037715cc4dbdf144d1001ad62b70b16
}

?>