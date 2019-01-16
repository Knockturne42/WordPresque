DROP TABLE IF EXISTS association; 
CREATE TABLE association (idAssoc INT AUTO_INCREMENT NOT NULL, 
motAssoc VARCHAR(50), 
mot1 VARCHAR(50), 
mot2 VARCHAR(50),
nbPlus INT, 
nbMoins INT, 
timeAssoc DATETIME, 
PRIMARY KEY (idAssoc)) ENGINE=InnoDB;

DROP TABLE IF EXISTS vientde; 

DROP TABLE IF EXISTS Def; 
CREATE TABLE def (idDef INT AUTO_INCREMENT NOT NULL, 
defMot TEXT, 
nbPlusDef INT, 
nbMoinsDef INT, 
PRIMARY KEY (idDef)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Definit; 
CREATE TABLE definit (idDefinit INT AUTO_INCREMENT NOT NULL, 
idDef INT NOT NULL, 
idAssoc INT NOT NULL, 
PRIMARY KEY (idDefinit)) ENGINE=InnoDB; 

ALTER TABLE definit ADD CONSTRAINT FK_definit_idDef FOREIGN KEY (idDef) REFERENCES def (idDef);
ALTER TABLE definit ADD CONSTRAINT FK_definit_idAssoc FOREIGN KEY (idAssoc) REFERENCES association (idAssoc);