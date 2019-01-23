<?php

include_once '../Controller/formulaire.php';
include_once '../Modele/requete.php';
include_once '../Controller/tools.php';

if(isset($_GET['submitDef'])){
	//Insertion de la définition dans def
	$defValue = $_GET['defArea'];
	$motFinalDb = $_GET['motFinal'];
	$columnArray = array('defMot', 'nbPlusDef', 'nbMoinsDef');
	$valueArray = array($defValue, 1, 0);
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$defInsert = new requete($dbConnectionArray, $columnArray, $valueArray, 'def', '');
	$defInsert->insertDb();
	//Insertion de la ligne dans la table d'association definit
	//Récupération de l'ID ajouté dans la table Def
	$columnArray = array('idDef');
	$valueArray = array('0');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'defMot LIKE "'.$defValue.'" ';
	$selectIdDef = new requete($dbConnectionArray, $columnArray, $valueArray, 'def', '', $condition);
	$selectIdDef->selectDb();
	$idDef = $selectIdDef->queryDb->fetch();
	$idDef = $idDef['idDef'];
	//Récupération de l'idAssoc du mot dans la table association
	$columnArray = array('idAssoc');
	$valueArray = array('0');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'motAssoc LIKE "'.$motFinalDb.'" ';
	$selectIdAssoc = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', $condition);
	$selectIdAssoc->selectDb();
	$idAssoc = $selectIdAssoc->queryDb->fetch();
	$idAssoc = $idAssoc['idAssoc'];
	//Insertion dans la table definit
	$columnArray = array('idDef', 'idAssoc');
	$valueArray = array( $idDef, $idAssoc);
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$definitInsert = new requete($dbConnectionArray, $columnArray, $valueArray, 'definit', '');
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
if(isset($_GET['enregistrerRnd'])){
	$motFinalDb= $_GET['motFinalDb'];
	$columnArray = array('*');
	$valueArray = array('0');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$condition = 'motAssoc LIKE "'.$motFinalDb.'" ';
	$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', $condition);
	$selectMot->selectDb();

	if (!($dbMot = $selectMot->queryDb->fetch()))
	{
		$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
		$columnArray= array('motAssoc', 'mot1', 'mot2', 'nbPlus', 'nbMoins', 'timeAssoc');
		$valueArray= array($_GET['motFinalDb'], $_GET['motInit'], $_GET['monMot'], 1, 0, date("Y-m-d H:i:s"));
		$insertMots= new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '');
		$insertMots->insertDb();
		echo '<div class="card w-90 text-white bg-secondary text-center">';
		echo '<div class="card-header">';
		echo 'Ajouter une définition au mot: '.$motFinalDb.'</div>';
		echo '<div class="card-body">';
		$arrayInpName = array('defArea', 'motFinal', 'submitDef');
		$arrayInpValue = array('', $motFinalDb, 'Valider cette définition');
		$arrayInptype = array('text', 'hidden', 'submit');
		$arrayInpClass = array('" id="def', '" id="motDef', 'btn btn-success" id="subDef');
		echo arrayInputs($arrayInpName, $arrayInptype, $arrayInpValue, $arrayInpClass);
		echo '</div></div>';
	}
	else {
		echo "Mot déjà enregistré";
	}
}

if(isset($_GET['generer'])) {
	echo '<div class="card w-90 text-white bg-dark text-center">';
	echo '<div class="card-body">';
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
		$search = substr($motInit, -intval(($_GET['rangeGenerator'])));
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
			$motFinalDb = substr($motInit, 0, -intval(($_GET['rangeGenerator']))).$monMot;
			$motFinal = '<p class="jeuDeMot">'.substr($motInit, 0, -intval(($_GET['rangeGenerator']))).'<span>'.$monMot.'</span></p>';
			echo '<h3 class="card-title">';
			echo $motFinal;
			?>
			 <input onclick='responsiveVoice.speak("<?php echo $motInit, $monMot; ?>", "French Female");' type='button' value='🔊 Play' />
			<?
			echo '</h3>';
			$columnArray = array('*');
			$valueArray = array('0');
			$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
			$condition = 'motAssoc LIKE "'.$motFinalDb.'" ';

			$selectMot = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', $condition);
			$selectMot->selectDb();
			if (!($dbMot = $selectMot->queryDb->fetch()))
				validerMot($motFinalDb, $motInit, $monMot, 'random', 'enregistrerRnd');
			else
				echo "nom existant dans la db";
			return $motFinal;
			?>
			 <input onclick='responsiveVoice.speak("<?php echo $motFinal; ?>", "French Female");' type='button' value='🔊 Play' />
			<?
		}
	}
	$mot = null;
	while (!$mot)
	{
		$mot = generer();
	}

	echo '</div></div>';
	
}

?>