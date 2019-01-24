<?php
include_once '../Controller/formulaire.php';
include_once '../Modele/requete.php';
include_once '../Controller/tools.php';
include_once '../Controller/billet.php';

function selectBy($endSql)
{
	//Requête dernier mot
	$columnArray = array('*');
	$valueArray = array('0');
	$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
	$selectWord = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', $endSql);
	$selectWord->selectDb();
	$i = 1;
	While ($word = $selectWord->queryDb->fetch())
	{
		$columnArray = array('defMot');
		$valueArray = array('0');
		$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
		$left = ' LEFT JOIN def ON def.idDef = definit.idDef';
		$condition = 'definit.idAssoc = '.$word['idAssoc'].' ';
		$selectDef = new requete($dbConnectionArray, $columnArray, $valueArray, 'definit', $left, '', $condition);
		$selectDef->selectDb();
		$def = $selectDef->queryDb->fetch();
		$def = $def['defMot'];

		$billet = new billet('Mot n°'.$i, $word['motAssoc'], $word['mot1'], $word['mot2'], $def);
		$i++;
	}
}

if($_GET['orderBy'] == 'last')
	selectBy(' ORDER BY timeAssoc DESC LIMIT 10');
elseif ($_GET['orderBy'] == 'old')
	selectBy(' ORDER BY timeAssoc LIMIT 10');
elseif ($_GET['orderBy'] == 'like')
	selectBy(' ORDER BY nbPlus DESC LIMIT 10');
elseif ($_GET['orderBy'] == 'dislike')
	selectBy(' ORDER BY nbMoins DESC LIMIT 10');
elseif ($_GET['orderBy'] == 'likeDis')
	selectBy(' ORDER BY nbPlus+nbMoins DESC LIMIT 10');
else{}