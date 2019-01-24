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

	$columnArray = array($likeDis);
	$valueArray = array((intval($likeDis)+1));
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'motAssoc LIKE "'.$word.'" ';
	$selectDef = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', '', $condition);
	$selectDef->updateDb();
}

selectLike($_GET['like'], $_GET['mot']);

?>