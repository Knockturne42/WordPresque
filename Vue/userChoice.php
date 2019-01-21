<?php

include_once 'Controller/formulaire.php';
include_once 'Modele/requete.php';

if(isset($_GET['enregistrerInp'])){
	var_dump($_GET);

	$columnArray = array('*');
	$valueArray = array('0');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'motAssoc LIKE "'.$_GET['motFinalDb'].'" ';
	$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', $condition);
	$selectMot->selectDb();

	if (!($dbMot = $selectMot->queryDb->fetch()))
	{
		$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
		$columnArray= array('motAssoc', 'mot1', 'mot2', 'nbPlus', 'nbMoins', 'timeAssoc');
		$valueArray= array($_GET['motFinalDb'], $_GET['motInit'], $_GET['monMot'], 1, 0, date("Y-m-d H:i:s"));
		$insertMots= new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '');
		$insertMots->insertDb();
	}
	else {
		echo "mot deja enregistrer";
	}
}


if(isset($_GET['userValue'])) {
	echo '<div class="card w-50 text-white bg-dark text-center">';
	echo '<div class="card-body">';
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
	$search = substr($_GET['userValue'], 0, 2);
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
		if ($monMot[1] == 1)
		{
			$motFinalDb = substr($_GET['userValue'], 0, -2).$monMot[0]['orthMot'];
			$motFinal = '<p class="jeuDeMot">'.substr($_GET['userValue'], 0, -2).'<span>'.$monMot[0]['orthMot'].'</span></p>';
		}
		else
		{
			$motFinalDb = substr($monMot[0]['orthMot'], 0, -2).$_GET['userValue'];
			$motFinal = '<p class="jeuDeMot"><span>'.substr($monMot[0]['orthMot'], 0, -2).'</span>'.$_GET['userValue'].'</p>';
		}
		echo '<h3 class="card-title">';
		echo $motFinal;
		echo '</h3>';
		if (!($dbMot = $selectMot->queryDb->fetch()))
				validerMot($motFinalDb, $_GET['userValue'], $monMot[0]['orthMot'], 'valideInput', 'enregistrerInp');
		else
			echo "nom existant dans la db";
	}
	echo '</div></div>';
}
	
?>