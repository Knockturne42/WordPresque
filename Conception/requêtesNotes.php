
<?php 
//Requête pour trouver les derniers mots partagés
'SELECT motAssoc FROM association WHERE idAssoc=(SELECT MAX(idAssoc)FROM association)';
//Requête pour trouver la dernière définition ajoutée
'SELECT defMot FROM def WHERE idDef=(SELECT MAX(idDef)FROM def)';
//Requête pour trouver le mot correspondant à la dernière définition ajoutée 
'SELECT motAssoc FROM association WHERE idAssoc=(SELECT idAssoc FROM definit WHERE idDef=(SELECT MAX(idDef) FROM def))';

?>
