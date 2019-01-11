<?php

include 'Controller/formulaire.php';
include 'Modele/requete.php';

$arrayInpName = array('generer');
$arrayInptype = array('submit');
$randomForm = new formulaire('#', 'get', 'random', $arrayInpName, $arrayInptype);
$randomForm->displayForm();

if(isset($_GET['generer'])) {
	$num = rand(1, 145000);
	$columnArray = array('*');
	$valueArray = array('0');
	$dbConnectionArray = array('localhost', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'idMot LIKE "'.$num.'" ';

	$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', $condition);

	$selectMot->selectDb();
	while(!($mot = $selectMot->queryDb->fetch()))
	{
			$num = rand(1, 145000);
			$columnArray = array('*');
			$valueArray = array('0');
			$dbConnectionArray = array('localhost', 'wordpresque', 'dcl.nanarchie', 'thixitin');
			$condition = 'idMot LIKE "'.$num.'" ';

			$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', $condition);

			$selectMot->selectDb();
	}
	var_dump($mot);
}

?>