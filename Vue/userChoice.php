<?php

include_once '../Controller/formulaire.php';
include_once '../Modele/requete.php';
include_once '../Controller/tools.php';
if(isset($_GET['submitDefChoice'])){
	//Insertion de la définition dans def
	$defValue = $_GET['defArea'];
	$motFinalDb = $_GET['motFinal'];
	$columnArray = array('defMot', 'nbPlusDef', 'nbMoinsDef');
	$valueArray = array($defValue, 1, 0);
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$defInsert = new requete($dbConnectionArray, $columnArray, $valueArray, 'def', '', '');
	$defInsert->insertDb();
	//Insertion de la ligne dans la table d'association definit
	//Récupération de l'ID ajouté dans la table Def
	$columnArray = array('idDef');
	$valueArray = array('0');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'defMot LIKE "'.$defValue.'" ';
	$selectIdDef = new requete($dbConnectionArray, $columnArray, $valueArray, 'def', '', '', $condition);
	$selectIdDef->selectDb();
	$idDef = $selectIdDef->queryDb->fetch();
	$idDef = $idDef['idDef'];
	//Récupération de l'idAssoc du mot dans la table association
	$columnArray = array('idAssoc');
	$valueArray = array('0');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'motAssoc LIKE "'.$motFinalDb.'" ';
	$selectIdAssoc = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', '', $condition);
	$selectIdAssoc->selectDb();
	$idAssoc = $selectIdAssoc->queryDb->fetch();
	$idAssoc = $idAssoc['idAssoc'];
	//Insertion dans la table definit
	$columnArray = array('idDef', 'idAssoc');
	$valueArray = array( $idDef, $idAssoc);
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$definitInsert = new requete($dbConnectionArray, $columnArray, $valueArray, 'definit', '', '');
	$definitInsert->insertDb();
	echo '<div class="card w-90 text-white bg-dark text-center">';
	echo '<div class="card-body">';
	echo 'Le mot et sa définition ont bien été partagés';
	// $arrayInpName = array('generer');
	// $arrayInpValue = array('Générer un nouveau jeu de mot aléatoire');
	// $arrayInptype = array('submit');
	// $arrayInpClass = array('btn btn-success" id="newJeu');
	// echo arrayInputs($arrayInpName, $arrayInptype, $arrayInpValue, $arrayInpClass);
	echo '</div></div>';
}
if(isset($_GET['enregistrerInp'])){
	$motFinalDb = $_GET['motFinalDb'];
	$columnArray = array('*');
	$valueArray = array('0');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'motAssoc LIKE "'.$motFinalDb.'" ';
	$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', '', $condition);
	$selectMot->selectDb();

	if (!($dbMot = $selectMot->queryDb->fetch()))
	{
		$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
		$columnArray= array('motAssoc', 'mot1', 'mot2', 'nbPlus', 'nbMoins', 'timeAssoc');
		$valueArray= array($_GET['motFinalDb'], $_GET['motInit'], $_GET['monMot'], 1, 0, date("Y-m-d H:i:s"));
		$insertMots= new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', '');
		$insertMots->insertDb();
		echo '<div class="card w-90 text-white bg-secondary text-center">';
		echo '<div class="card-header">';
		echo 'Ajouter une définition au mot: '.$motFinalDb.'</div>';
		echo '<div class="card-body">';
		$arrayInpName = array('defArea', 'motFinal', 'submitDefChoice');
		$arrayInpValue = array('', $motFinalDb, 'Valider cette définition');
		$arrayInptype = array('text', 'hidden', 'submit');
		$arrayInpClass = array('" id="def', '" id="motDef', 'btn btn-success" id="subDefChoice');
		echo arrayInputs($arrayInpName, $arrayInptype, $arrayInpValue, $arrayInpClass);
		echo '</div></div>';
	}
	else {
		echo "mot deja enregistrer";
	}
}


if(isset($_GET['userValue']) && strlen($_GET['userValue']) >= intval(($_GET['rangeGenerator']))) {
	echo '<div class="card w-90 text-white bg-dark text-center">';
	echo '<div class="card-body">';
	$search = substr($_GET['userValue'], -intval(($_GET['rangeGenerator'])));
	$columnArray = array('idMot', 'orthMot');
	$valueArray = array('0', '1');
	// $dbConnectionArray = array('localhost', 'wordpresque', 'test', 'test00');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'orthMot LIKE "'.$search.'%" ';

	$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', '', $condition);
	$selectMot->selectDb();
	$arrayResult = array();
	while($mot = $selectMot->queryDb->fetch())
	{
		$tmpArray = array($mot, 1);
		array_push($arrayResult, $tmpArray);
	}
	$search = substr($_GET['userValue'], 0, intval(($_GET['rangeGenerator'])));
	$condition = 'orthMot LIKE "%'.$search.'" ';
	$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', '', $condition);
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
			$motFinalDb = substr($_GET['userValue'], 0, -intval(($_GET['rangeGenerator']))).$monMot[0]['orthMot'];
			$motFinal = '<p class="jeuDeMot">'.substr($_GET['userValue'], 0, -intval(($_GET['rangeGenerator']))).'<span>'.$monMot[0]['orthMot'].'</span></p>';
		}
		else
		{
			$motFinalDb = substr($monMot[0]['orthMot'], 0, -intval(($_GET['rangeGenerator']))).$_GET['userValue'];
			$motFinal = '<p class="jeuDeMot"><span>'.substr($monMot[0]['orthMot'], 0, -intval(($_GET['rangeGenerator']))).'</span>'.$_GET['userValue'].'</p>';
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