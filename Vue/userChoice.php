<?php

include_once 'Controller/formulaire.php';
include_once 'Modele/requete.php';

$arrayInpName = array('userValue', "generer a partir d'un mot");
$arrayInptype = array('text', "submit");
$arrayInpClass = array('', 'btn btn-primary');
$userForm = new formulaire('#', 'get', 'userForm', $arrayInpName, $arrayInptype, $arrayInpClass);
$userForm->displayForm();

if(isset($_GET['userValue'])) {
	$search = substr($_GET['userValue'], -2);
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
		$tmpArray = array($mot, 1);
		array_push($arrayResult, $tmpArray);
	}
	$search = substr($_GET['userValue'], 0, 3);
	$condition = 'orthMot LIKE "%'.$search.'" ';
	$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', $condition);
	$selectMot->selectDb();
	while($mot = $selectMot->queryDb->fetch())
	{
		$tmpArray = array($mot, 2);
		array_push($arrayResult, $tmpArray);
	}
	if (!$arrayResult)
		echo "pas de correspondance trouve";
	else
	{
		$monMot = $arrayResult[rand(0, sizeof($arrayResult)-1)];
		echo $monMot[0]['orthMot'];
		if ($monMot[1] == 1)
			$motFinal = '<p class="jeuDeMot">'.substr($_GET['userValue'], 0, -2).'<span>'.$monMot[0]['orthMot'].'</span></p>';
		else
			$motFinal = '<p class="jeuDeMot"><span>'.substr($monMot[0]['orthMot'], 0, -2).'</span>'.$_GET['userValue'].'</p>';
		echo $motFinal;
	}
}
	
?>