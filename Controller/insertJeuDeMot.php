<?php

include_once 'Controller/formulaire.php';
include_once 'Modele/requete.php';


function insertAssoc($motFinal, $mot1, $mot2)
{
	$columnArray = array('motAssoc', 'nbPlus', 'nbMoins', 'timeAssoc', 'mot1', 'mot2');
	$valueArray = array($motFinal, 1, 0, date("Y-m-d H:i:s"), $mot1, $mot2);
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');

	$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', '');

	$selectMot->insertDb();
}


?>