<?php

include_once 'Controller/formulaire.php';
include_once 'Modele/requete.php';

$arrayInpName = array('userValue', "generer a partir d'un mot");
$arrayInptype = array('text', "submit");
$userForm = new formulaire('#', 'get', 'userForm', $arrayInpName, $arrayInptype);
$userForm->displayForm();

if(isset($_GET['userValue'])) {
	$search = substr($_GET['userValue'], -3);
	$columnArray = array('idMot', 'orthMot');
	$valueArray = array('0', '1');
	// $dbConnectionArray = array('localhost', 'wordpresque', 'test', 'test00');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'orthMot LIKE "'.$search.'%" ';

	$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', $condition);
	$selectMot->selectDb();
	$arrayResult = array();
	while($mot = $selectMot->queryDb->fetch())
	{
		array_push($arrayResult, $mot);
	}
	$monMot = $arrayResult[rand(0, sizeof($arrayResult)-1)]['orthMot'];
	$motFinal = '<p class="jeuDeMot">'.substr($_GET['userValue'], 0, -3).'<span>'.$monMot.'</span></p>';
	echo $motFinal;
}

?>