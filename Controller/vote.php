<?php

include_once '../Controller/formulaire.php';
include_once '../Modele/requete.php';
include_once '../Controller/tools.php';
include_once '../Controller/billet.php';

function selectLike($likeDis, $word)
{
	$columnArray = array($likeDis);
	$valueArray = array('0');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'motAssoc LIKE "'.$word.'" ';
	$selectDef = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', '', $condition);
	$selectDef->selectDb();
	$nbLike = $selectDef->queryDb->fetch();
	$columnArray = array($likeDis);
	$likeDis == 'nbPlus' ? $valueArray = array(($nbLike['nbPlus']+1)) : $valueArray = array(($nbLike['nbMoins']+1));
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'motAssoc LIKE "'.$word.'" ';
	$selectDef = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', '', $condition);
	$selectDef->updateDb();
}

selectLike($_GET['like'], $_GET['mot']);

?>