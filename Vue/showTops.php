<?php
include_once '../Controller/formulaire.php';
include_once '../Modele/requete.php';
include_once '../Controller/tools.php';
?>

<?php
//Requête dernier mot
$columnArray = array('motAssoc');
$valueArray = array('0');
$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
$condition = 'idAssoc = (SELECT MAX(idAssoc) FROM association)';
$selectLastWord = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', $condition);
$selectLastWord->selectDb();
$lastWord = $selectLastWord->queryDb->fetch();
$lastWord = $lastWord['motAssoc'];
//Requête dernière def
$columnArray = array('defMot');
$valueArray = array('0');
$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
$condition = 'idDef = (SELECT MAX(idDef) FROM def)';
$selectLastDef = new requete($dbConnectionArray, $columnArray, $valueArray, 'def', '', $condition);
$selectLastDef->selectDb();
$lastDef = $selectLastDef->queryDb->fetch();
$lastDef = $lastDef['defMot'];
//Requête dernier mot correspondant à dernière def
$columnArray = array('motAssoc');
$valueArray = array('0');
$dbConnectionArray = array('192.168.1.20', 'dcl.nanarchie', 'dcl.nanarchie', 'thixitin');
$condition = 'idAssoc = (SELECT idAssoc FROM definit WHERE idDef=(SELECT MAX(idDef) FROM def))';
$selectWord = new requete($dbConnectionArray, $columnArray, $valueArray, 'association', '', $condition);
$selectWord->selectDb();
$wordDef = $selectWord->queryDb->fetch();
$wordDef = $wordDef['motAssoc'];
?>

<div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header">Dernier mot partagé</div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $lastWord; ?></h4>
  </div>
</div>
<div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header">Dernier mot partagé avec sa définition</div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $wordDef; ?></h4>
    <p class="card-text"><?php echo $lastDef; ?></p>
  </div>
</div>