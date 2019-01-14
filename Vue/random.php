<?php

include_once 'Controller/formulaire.php';
include_once 'Modele/requete.php';

$arrayInpName = array('generer');
$arrayInptype = array('submit');
$randomForm = new formulaire('#', 'get', 'random', $arrayInpName, $arrayInptype);
$randomForm->displayForm();


if(isset($_GET['generer'])) {
	function generer() {
		$num = rand(1, 145000);
		$columnArray = array('orthMot');
		$valueArray = array('0');
		// $dbConnectionArray = array('localhost', 'wordpresque', 'test', 'test00');
		$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
		$condition = 'idMot LIKE "'.$num.'" ';

		$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', $condition);

		$selectMot->selectDb();
		while(!($mot = $selectMot->queryDb->fetch()))
		{
				$num = rand(1, 145000);
				$columnArray = array('*');
				$valueArray = array('0');
				$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
				$condition = 'idMot LIKE "'.$num.'" ';

				$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', $condition);

				$selectMot->selectDb();
		}
		$motInit = $mot['orthMot'];
		$search = substr($motInit, -2);
		$columnArray = array('idMot', 'orthMot');
		$valueArray = array('0', '1');
		$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
		$condition = 'orthMot LIKE "'.$search.'%" ';

		$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'mots', '', $condition);
		$selectMot->selectDb();
		$arrayResult = array();
		while($mot = $selectMot->queryDb->fetch())
		{
			array_push($arrayResult, $mot);
		}
		if (!$arrayResult)
			return 0;
		else
		{
			$monMot = $arrayResult[rand(0, sizeof($arrayResult)-1)]['orthMot'];
			$motFinal = '<p class="jeuDeMot">'.substr($motInit, 0, -2).'<span>'.$monMot.'</span></p>';
			return $motFinal;
		}
	}
	$mot = null;
	while (!$mot)
	{
		$mot = generer();
	}
	echo $mot;
}

?>