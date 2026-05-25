CREATE DATABASE lst;
USE lst;

CREATE TABLE Copropriete(
   idCopropriete INT NOT NULL auto_increment,
   nomImmeuble VARCHAR(50) NOT NULL,
   rue VARCHAR(50) NOT NULL,
   cp CHAR(5) NOT NULL,
   ville VARCHAR(40) NOT NULL,
   PRIMARY KEY(idCopropriete)
);

CREATE TABLE Coproprietaire(
   idCoproprietaire INT NOT NULL auto_increment,
   civilite BOOLEAN,
   nom VARCHAR(35) NOT NULL,
   prenom VARCHAR(35) NOT NULL,
   rue VARCHAR(50) NOT NULL,
   cp CHAR(5) NOT NULL,
   ville VARCHAR(35) NOT NULL,
   telephone VARCHAR(10) NOT NULL,
   login VARCHAR(30) NOT NULL,
   mdp VARCHAR(100) NOT NULL, 
   PRIMARY KEY(idCoproprietaire)
);

CREATE TABLE Lot(
   idLot INT NOT NULL auto_increment,
   localisation VARCHAR(50),
   tantieme SMALLINT NOT NULL,
   idCopropriete INT NOT NULL,
   idCoproprietaire INT NOT NULL,
   PRIMARY KEY(idLot),
   FOREIGN KEY(idCopropriete) REFERENCES Copropriete(idCopropriete),
   FOREIGN KEY(idCoproprietaire) REFERENCES Coproprietaire(idCoproprietaire)
);

CREATE TABLE Prestataire(
   idPrestataire INT NOT NULL auto_increment,
   nom VARCHAR(50) NOT NULL,
   adresse VARCHAR(50) NOT NULL,
   ville VARCHAR(50) NOT NULL,
   cp CHAR(5) NOT NULL,
   PRIMARY KEY(idPrestataire)
);

CREATE TABLE Travaux(
   idTravaux INT NOT NULL auto_increment,
   libelleTravaux VARCHAR(50) NOT NULL,
   idPrestataire INT NOT NULL,
   PRIMARY KEY(idTravaux),
   FOREIGN KEY(idPrestataire) REFERENCES Prestataire(idPrestataire)
);

CREATE TABLE Devis(
   idDevis INT NOT NULL auto_increment,
   dateDev DATE NOT NULL,
   prestataire VARCHAR(50) NOT NULL,
   MontantTTC INT NOT NULL,
   vote BOOLEAN,
   idCopropriete INT NOT NULL,
   idTravaux INT NOT NULL,
   PRIMARY KEY(idDevis),
   FOREIGN KEY(idCopropriete) REFERENCES Copropriete(idCopropriete),
   FOREIGN KEY(idTravaux) REFERENCES Travaux(idTravaux)
);

INSERT INTO Copropriete(nomImmeuble, rue, cp, ville) VALUES
("Résidence des Pins", "18, av de la Pins", "44000", "Nantes"),
("Résidence des Balsamiers", "5, Pl de la résidence", "44000", "Nantes");

INSERT INTO Coproprietaire(civilite, nom, prenom, rue, cp, ville, telephone, login, mdp) VALUES
(0, "MULLER", "Jean-Marie", "18, av des Pins", "44000", "Nantes", "0952561926", "muller2025", "$2y$10$cEGUrdr5bkDG6wrrSMPVJOXazsabFNPY0A5QqJR0IlsYOm9K5ZLya"), /* MDP nomannée */
(0, "VIVIAN", "Christian", "18, av des Pins", "44000", "Nantes", "0952324920", "vivian2025", "$2y$10$FADqiawGyK1AWnFHQtLS3.F.U5ZnRq19N.v8fRnpHNrdz2/ahO.aO"),
(0, "SAIDJ", "Simon", "49, rue des chateaux", "49000", "Angers", "0952375642", "saidj2025", "$2y$10$NpcWG39EW9sHweqJlDAS4eGiXUj/zmy6RpRBAAdf0kdZR0eO3GK/y"),
(1, "BEIRUT", "Virginie", "18, av des Pins", "44000", "Nantes", "0952528960", "beirut2025", "$2y$10$wrZ1GXAbfPUbO1WN9RjPbu.Maqw07xSU5SLLuOAG2E/.6a5K.mUQS"),
(0, "HAFID", "Karim", "18, av des Pins", "44000", "Nantes", "0952554645", "hafid2025", "$2y$10$VGiXRSvgsxTRBBWLgdOKw.LQWTlVhsGc6fbKNuSAf5LnQiow5eQu2");

INSERT INTO Lot(localisation, tantieme, idCopropriete, idCoproprietaire) VALUES
("RDC coté AV des", 2097, 1, 1),
("REZ DE JARDIN", 1422, 1, 2),
("ETAGE AV DE LA", 1659, 1, 3),
("ETAGE JARDIN", 2222, 1, 4),
("COMBLE", 1400, 1, 2),
("ETAGE JARDIN", 1200, 2, 5);

INSERT INTO Prestataire(nom, adresse, ville, cp) VALUES
("Perthuis", "23 rue de la patate", "Mulhouse", "68130"),
("SMBTP", "12 avenue Marchal", "Obernai", "67150"),
("ARDEN BTP", "13 rue du vins", "Colmar", "68025"),
("Heiss SARL", "18 quartier blanc", "Paris", "75140"),
("MURANO SA", "182 avenue Marchal", "Obernai", "67150"),
("Renov Façade", "32 rue de l'acacia", "Andlau", "67140");

INSERT INTO Travaux(libelleTravaux, idPrestataire) VALUES
("Rénovation parking", 1),
("Réfection toiture", 3),
("Ravalement façade", 4);

INSERT INTO Devis(dateDev, prestataire, MontantTTC, vote, idCopropriete, idTravaux) VALUES
("2021-05-30", "Perthuis", 14500, 1, 1, 1),
("2021-05-15", "SMBTP", 15000, 0, 1, 1),
("2021-05-31", "ARDEN BTP", 17000, 0, 1, 1),
("2021-06-15", "Heiss SARL", 246000, 1, 2, 2),
("2021-06-30", "MURANO SA", 271000, 0, 2, 2),
("2021-06-10", "ARDEN BTP",223000, 0, 2, 2),
("2021-10-12", "Renov Façade", 25000, 1, 1, 3),
("2020-10-15", "SMBTP", 27000, 0, 1, 3),
("2021-10-28", "ARDEN BTP", 22000, 0, 1, 3);