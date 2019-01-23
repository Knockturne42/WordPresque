<?php
include_once '../Controller/formulaire.php';
include_once '../Modele/requete.php';
include_once '../Controller/tools.php';
//Requête dernier mot
$columnArray = array('motAssoc');
$valueArray = array('0');
$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
$endSql = ' ORDER BY idAssoc DESC LIMIT 10';
$selectLastWord = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', $endSql);
$selectLastWord->selectDb();
While ($lastWord = $selectLastWord->queryDb->fetch())
{
	$lastWord = $lastWord['motAssoc'];

	var_dump($lastWord);
}
// //Requête dernière def
// $columnArray = array('defMot');
// $valueArray = array('0');
// $dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
// $condition = 'idDef = (SELECT MAX(idDef) FROM def)';
// $selectLastDef = new requete($dbConnectionArray, $columnArray, $valueArray, 'def', '', $condition);
// $selectLastDef->selectDb();
// $lastDef = $selectLastDef->queryDb->fetch();
// $lastDef = $lastDef['defMot'];
// //Requête dernier mot correspondant à dernière def
// $columnArray = array('motAssoc');
// $valueArray = array('0');
// $dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
// $condition = 'idAssoc = (SELECT idAssoc FROM definit WHERE idDef=(SELECT MAX(idDef) FROM def))';
// $selectWord = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', $condition);
// $selectWord->selectDb();
// $wordDef = $selectWord->queryDb->fetch();
// $wordDef = $wordDef['motAssoc'];

?>