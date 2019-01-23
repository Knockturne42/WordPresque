<?php
include_once '../Controller/formulaire.php';
include_once '../Modele/requete.php';
include_once '../Controller/tools.php';
include_once '../Controller/billet.php';
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
<label for="tri">Trier par le plus:</label>
<select name="tri" id="orderBy">
  <option value="recent" selected>Récent</option>
  <option value="recent">Ancien</option>
  <option value="recent">Aimé</option>
  <option value="recent">Detesté</option>
  <option value="recent">Controversé</option>
</select>
<div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header">Dernier mot partagé</div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $lastWord; ?></h4>
    <input onclick='responsiveVoice.speak("<?php echo $lastWord; ?>", "French Female");' type='button' value='🔊 Play' />
  </div>
  <div class="card-footer text-muted d-flex justify-content-between">
    <button class="likes btn btn-secondary fas fa-thumbs-up"><button class="likes btn btn-danger fas fa-thumbs-down">
  </div>
</div>
<div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header">Dernier mot partagé avec sa définition</div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $wordDef; ?></h4>
    <p class="card-text"><?php echo $lastDef; ?></p>
  </div>
  <div class="card-footer text-muted d-flex justify-content-between">
    <button class="likes btn btn-secondary fas fa-thumbs-up"><button class="likes btn btn-danger fas fa-thumbs-down">
  </div>
</div>


