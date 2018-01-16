DROP DATABASE IF EXISTS NeigeSoleil;

CREATE DATABASE IF NOT EXISTS NeigeSoleil;
USE NeigeSoleil;
# -----------------------------------------------------------------------------
#       TABLE : REGION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS REGION
 (
   IDREGION INTEGER(6) NOT NULL AUTO_INCREMENT ,
   NOMR VARCHAR(50) NULL  
   , PRIMARY KEY (IDREGION) 
 ) 
 comment = "";
 #----les insertions---------------------
insert into region values(null,'Alpes');
insert into region values(null,'nouvelle-aquitaine');
insert into region values(null,'les pyrénées');
insert into region values(null,'les vosges');

# -----------------------------------------------------------------------------
#       TABLE : SAISON
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SAISON
 (
   IDSAISON INTEGER(6) NOT NULL AUTO_INCREMENT ,
   NOMS VARCHAR(50) NULL  ,
   PERIODES VARCHAR(50) NULL  ,
   REDUCTION DECIMAL(4,2) NULL  
   , PRIMARY KEY (IDSAISON) 
 ) 
 comment = "";
#----les insertion---------------------
 insert into saison values(null,'Basse','',2.0);
  insert into saison values(null,'Moyenne','',10.0);
   insert into saison values(null,'Haute','',20.0);
# -----------------------------------------------------------------------------
#       TABLE : MATERIEL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MATERIEL
 (
   IDMATERIEL INTEGER(6) NOT NULL AUTO_INCREMENT ,
   TYPEM VARCHAR(50) NULL  ,
   ETAT VARCHAR(30) NULL  
   , PRIMARY KEY (IDMATERIEL) 
 ) 
 comment = "";
 
 alter table MATERIEL ADD image varchar(50);
 ALTER TABLE MATERIEL ADD idProprietaire integer(6) not null;$
  ALTER TABLE MATERIEL ADD PRIX float(10,2) not null;
 
 
 insert into materiel values(null,'ski de piste Pack atris','excellent','atris',2,30.00);
 insert into materiel values(null,'Guardian mnc 13','bon','Guardianmnc13',2,60.00);
 insert into materiel values(null,'Baton de ski Kaloo jr','bon','BatondeskiKaloo',4,84.00);
 insert into materiel values(null,'chaussure de ski rossignol','très bon','rossignol',3,56.00);
insert into materiel values(null,'patinette de ski', 'bon','patinette',4,72.00);

# -----------------------------------------------------------------------------
#       TABLE : TIERS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TIERS
 (
   IDTIERS INTEGER(6) NOT NULL AUTO_INCREMENT 
   , PRIMARY KEY (IDTIERS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PROPRIETAIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PROPRIETAIRE
 (
   IDTIERS INTEGER(6) NOT NULL  ,
   CIVILITE VARCHAR(15) NULL  ,
   NOMP VARCHAR(50) NULL  ,
   PRENOMP VARCHAR(50) NULL  ,
   ADRESSEP VARCHAR(100) NULL  ,
   CODEPOSTAL CHAR(5) NULL  ,
   VILLE VARCHAR(50) NULL  ,
   TEL VARCHAR(20) NULL  ,
   RIB VARCHAR(50) NULL  ,
   EMAIL VARCHAR(128) NULL  ,
   MOT_PASSE VARCHAR(30) NULL  
   , PRIMARY KEY (IDTIERS) 
 ) 
 comment = "";
 
 
 #--les insertions---------------------
 insert into proprietaire values(2,'Monsieur','louguillau','jean-louis','2 rue maréchal joffre','64000','pau','0605347822','FR3330002005500000157841Z25','jl@gmail.com','jl2018');
 insert into proprietaire values(3,'Madame','benhammed','louise','14 rue François de Sourdis','33000','bordeau','07653476292','FR3330004005500000187841R45','louise@gmail.com','louise2018');
 insert into proprietaire values(4,'Monsieur','ly','antoine','40 quai Bons Enfants','88026','EPINAL','0756432895','FR4530004005500000188541T29','antoine@gmail.com','antoine2018');
  insert into proprietaire values(5,'Monsieur','Roux','Dominique','place Charles de Gaulle','65000','TARBES','0685987256','FR4530004005500000188541J89','dominique@gmail.com','dominique2018');

# -----------------------------------------------------------------------------
#       TABLE : INFO_VILLE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INFO_VILLE
 (
   IDVILLE INTEGER(6) NOT NULL AUTO_INCREMENT ,
   NOMV VARCHAR(50) NULL  ,
   REGIONV VARCHAR(128) NULL  ,
   CODEPOSTAL CHAR(5) NULL  ,
   TEL_AGENCE_TOURISME VARCHAR(20) NULL  ,
   TEL_COMISSARIAT VARCHAR(20) NULL  ,
   TEL_MAIRIE VARCHAR(20) NULL  ,
   TEL_MEDECIN INTEGER(20) NULL  ,
   TEL_PHARMACIE VARCHAR(20) NULL  
   , PRIMARY KEY (IDVILLE) 
 ) 
 comment = "";
 
 insert into info_ville values(null,'Vars','Alpes','05560','0123456867','0167543987','0165487645','0187654398','0187654098');
 insert into info_ville values(null,'Pau','Nouvelle-aquitaine','64000','0123457667','0167598987','0195487645','0187654048','0187650298');
 insert into info_ville values(null,'Saint-Lary-Soulan','Les pyrénées','65170','0413456867','0167983987','0166453645','0197654398','0187698798');
 insert into info_ville values(null,'Gérardmer','Les vosges','88400','0123498767','0198543987','0165456745','0198754398','0105694098');


# -----------------------------------------------------------------------------
#       TABLE : APPARTEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS APPARTEMENT
 (
   IDAPPARTEMENT INTEGER(6) NOT NULL AUTO_INCREMENT ,
   IDVILLE INTEGER(6) NOT NULL  ,
   IDREGION INTEGER(6) NOT NULL  ,
   NUM_IMMEUBLE VARCHAR(50) NULL  ,
   ADRESSEAPP VARCHAR(100) NULL  ,
   CODEPOSTAL CHAR(5) NULL  ,
   TYPEAPPART CHAR(5) NULL  ,
   SURFACE DECIMAL(6,2) NULL  ,
   EXPOSITION VARCHAR(20) NULL  ,
   CAPACITE_ACCUEIL INTEGER(4) NULL  ,
   DISTANCE_PISTE DECIMAL(10,2) NULL  ,
   PRIX_BASE DECIMAL(6,2) NULL  ,
   LIENPHOTO VARCHAR(128) NULL  
   , PRIMARY KEY (IDAPPARTEMENT) 
 ) 
 comment = "";
 
  insert into appartement values(null,1,1,null,'Cours Fontanarosa','05560','F3',50.3,'sud est',6,400,1200,'appartVar');
 insert into appartement values(null,2,2,null,'place royale','64000','F2',37.8,'nord ouest',2,400,850,'appartPau');
 insert into appartement values(null,3,3,null,'place de la mairie','65170','F4',60.4,'sud ouest',8,400,1500,'appartSaintLary');
 insert into appartement values(null,4,4,47,'Rue Charles de Gaulle','88400 ','F6',80.0,'sud est',12,400,1600,'appartGérardmer');

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE APPARTEMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_APPARTEMENT_INFO_VILLE
     ON APPARTEMENT (IDVILLE ASC);

CREATE  INDEX I_FK_APPARTEMENT_REGION
     ON APPARTEMENT (IDREGION ASC);

# -----------------------------------------------------------------------------
#       TABLE : RESERVATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RESERVATION
 (
   IDR INTEGER(6) NOT NULL AUTO_INCREMENT ,
   IDAPPARTEMENT INTEGER(6) NOT NULL  ,
   IDSAISON INTEGER(6) NOT NULL  ,
   IDMATERIEL INTEGER(6) NULL  ,
   IDAGENCE INTEGER(6) NOT NULL  ,
   IDTIERS INTEGER(6) NOT NULL  ,
   ETAT VARCHAR(20) NULL  ,
   DATERESERVATION DATE NULL  ,
   DATEDEBUT DATE NULL  ,
   DATEFIN DATE NULL  ,
   NBPERSONNES INTEGER(3) NULL  
   , PRIMARY KEY (IDR) 
 ) 
 comment = "";
 
 alter table reservation add type_reserv varchar(20);
 
  insert into reservation values(null,1,1,null,1,7,'confirmee','2017-10-24','2018-01-03','2018-01-10',6,'APPART');
  insert into reservation values(null,1,1,2,1,7,'confirmee','2017-10-24','2018-01-03','2018-01-10',6,'MATERIEL');
  

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RESERVATION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RESERVATION_APPARTEMENT
     ON RESERVATION (IDAPPARTEMENT ASC);

CREATE  INDEX I_FK_RESERVATION_SAISON
     ON RESERVATION (IDSAISON ASC);

CREATE  INDEX I_FK_RESERVATION_MATERIEL
     ON RESERVATION (IDMATERIEL ASC);

CREATE  INDEX I_FK_RESERVATION_LOCATAIRE
     ON RESERVATION (IDTIERS ASC);

CREATE  INDEX I_FK_RESERVATION_AGENCE
     ON RESERVATION (IDAGENCE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTRAT_GESTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTRAT_GESTION
 (
   IDC INTEGER(6) NOT NULL AUTO_INCREMENT ,
   IDAGENCE INTEGER(6) NOT NULL  ,
   IDAPPARTEMENT INTEGER(6) NOT NULL  ,
   IDTIERS INTEGER(6) NOT NULL  ,
   ETAT VARCHAR(20) NULL  ,
   DATESIGNATUREC DATE NULL  ,
   DATEDEBUT DATE NULL  ,
   DATEFIN DATE NULL  
   , PRIMARY KEY (IDC) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CONTRAT_GESTION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CONTRAT_GESTION_PROPRIETAIRE
     ON CONTRAT_GESTION (IDTIERS ASC);

CREATE  INDEX I_FK_CONTRAT_GESTION_AGENCE
     ON CONTRAT_GESTION (IDAGENCE ASC);

CREATE  INDEX I_FK_CONTRAT_GESTION_APPARTEMENT
     ON CONTRAT_GESTION (IDAPPARTEMENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : EQUIPEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EQUIPEMENT
 (
   IDEQUIPEMENT INTEGER(6) NOT NULL AUTO_INCREMENT ,
   IDAPPARTEMENT INTEGER(6) NOT NULL  ,
   NOME VARCHAR(50) NULL  ,
   NOMBREE INTEGER(3) NULL  
   , PRIMARY KEY (IDEQUIPEMENT) 
 ) 
 comment = "";
 
 insert into equipement values(null,1,'machine à laver',1);
 insert into equipement values(null,4,'télévision',2);
 insert into equipement values(null,2,'assiètes',10);
 insert into equipement values(null,3,'cuillières à soupe',15);

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EQUIPEMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EQUIPEMENT_APPARTEMENT
     ON EQUIPEMENT (IDAPPARTEMENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : AGENCE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AGENCE
 (
   IDAGENCE INTEGER(6) NOT NULL AUTO_INCREMENT ,
   IDREGION INTEGER(6) NOT NULL  ,
   NOMAGENCE VARCHAR(50) NULL  ,
   ADRESSEA VARCHAR(100) NULL  ,
   VILLEA VARCHAR(50) NULL  ,
   CODEPOSTAL CHAR(5) NULL  ,
   TEL VARCHAR(20) NULL  
   , PRIMARY KEY (IDAGENCE) 
 ) 
 comment = "";
 
 insert into agence values(null,1,'N&S Alpes', '12 Rue de la Poste','Annecy', 74000,'0450450456');
 insert into agence values(null,2,'N&S Nouvelle-aquitaine', ' Lotissement Gaussens,Centre Routier','Agen Le Passage', 47520 ,'0553963635');

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE AGENCE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_AGENCE_REGION
     ON AGENCE (IDREGION ASC);

# -----------------------------------------------------------------------------
#       TABLE : LOCATAIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LOCATAIRE
 (
   IDTIERS INTEGER(6) NOT NULL  ,
   CIVILITE VARCHAR(15) NULL  ,
   NOML VARCHAR(50) NULL  ,
   PRENOML VARCHAR(50) NULL  ,
   ADRESSEL VARCHAR(100) NULL  ,
   CODEPOSTAL CHAR(5) NULL  ,
   VILLE VARCHAR(50) NULL  ,
   TEL VARCHAR(20) NULL  ,
   EMAIL VARCHAR(128) NULL  ,
   MOT_PASSE VARCHAR(30) NULL  
   , PRIMARY KEY (IDTIERS) 
 ) 
 comment = "";
 
  insert into locataire values(6,'Monsieur','robert', 'martin','35 rue leon geffroy','94600','vitry sur seine','0786543823','martin76@outlook.fr','martin123');
 insert into locataire values(7,'Monsier','Richard', 'Dupond','25 rue des fleurs','33500','Libourne','0665487329','Dupond1@outlook.fr','Dupond123');
 insert into locataire values(8,'madame','Bernard', 'Rose','40 rue de l église','33380','Mios','0786549361','rose@outlook.fr','rose123');
 insert into locataire values(9,'madame','Dubois', 'Valery','35 rue de paris','75019','Paris','0645389724','valery6@outlook.fr','valery123');

# -----------------------------------------------------------------------------
#       TABLE : H_CONTRAT_GESTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS H_CONTRAT_GESTION
 (
   IDC INTEGER(6) NOT NULL  ,
   DATE_HISTO DATE NOT NULL  ,
   ETAT VARCHAR(20) NULL  ,
   DATESIGNATUREC DATE NULL  ,
   DATEDEBUT DATE NULL  ,
   DATEFIN DATE NULL  
   , PRIMARY KEY (IDC,DATE_HISTO) 
 ) 
 comment = "Table d'historisation des modifications de la table CONTRAT_GESTION";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE H_CONTRAT_GESTION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_H_CONTRAT_GESTION_CONTRAT_GESTION
     ON H_CONTRAT_GESTION (IDC ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE PROPRIETAIRE 
  ADD FOREIGN KEY FK_PROPRIETAIRE_TIERS (IDTIERS)
      REFERENCES TIERS (IDTIERS) ;


ALTER TABLE APPARTEMENT 
  ADD FOREIGN KEY FK_APPARTEMENT_INFO_VILLE (IDVILLE)
      REFERENCES INFO_VILLE (IDVILLE) ;


ALTER TABLE APPARTEMENT 
  ADD FOREIGN KEY FK_APPARTEMENT_REGION (IDREGION)
      REFERENCES REGION (IDREGION) ;


ALTER TABLE RESERVATION 
  ADD FOREIGN KEY FK_RESERVATION_APPARTEMENT (IDAPPARTEMENT)
      REFERENCES APPARTEMENT (IDAPPARTEMENT) ;


ALTER TABLE RESERVATION 
  ADD FOREIGN KEY FK_RESERVATION_SAISON (IDSAISON)
      REFERENCES SAISON (IDSAISON) ;


ALTER TABLE RESERVATION 
  ADD FOREIGN KEY FK_RESERVATION_MATERIEL (IDMATERIEL)
      REFERENCES MATERIEL (IDMATERIEL) ;


ALTER TABLE RESERVATION 
  ADD FOREIGN KEY FK_RESERVATION_LOCATAIRE (IDTIERS)
      REFERENCES LOCATAIRE (IDTIERS) ;


ALTER TABLE RESERVATION 
  ADD FOREIGN KEY FK_RESERVATION_AGENCE (IDAGENCE)
      REFERENCES AGENCE (IDAGENCE) ;


ALTER TABLE CONTRAT_GESTION 
  ADD FOREIGN KEY FK_CONTRAT_GESTION_PROPRIETAIRE (IDTIERS)
      REFERENCES PROPRIETAIRE (IDTIERS) ;
	  
ALTER TABLE MATERIEL 
  ADD FOREIGN KEY FK_MATERIEL_PROPRIETAIRE (idProprietaire)
      REFERENCES PROPRIETAIRE (IDTIERS) ;


ALTER TABLE CONTRAT_GESTION 
  ADD FOREIGN KEY FK_CONTRAT_GESTION_AGENCE (IDAGENCE)
      REFERENCES AGENCE (IDAGENCE) ;


ALTER TABLE CONTRAT_GESTION 
  ADD FOREIGN KEY FK_CONTRAT_GESTION_APPARTEMENT (IDAPPARTEMENT)
      REFERENCES APPARTEMENT (IDAPPARTEMENT) ;


ALTER TABLE EQUIPEMENT 
  ADD FOREIGN KEY FK_EQUIPEMENT_APPARTEMENT (IDAPPARTEMENT)
      REFERENCES APPARTEMENT (IDAPPARTEMENT) ;


ALTER TABLE AGENCE 
  ADD FOREIGN KEY FK_AGENCE_REGION (IDREGION)
      REFERENCES REGION (IDREGION) ;


ALTER TABLE LOCATAIRE 
  ADD FOREIGN KEY FK_LOCATAIRE_TIERS (IDTIERS)
      REFERENCES TIERS (IDTIERS) ;


ALTER TABLE H_CONTRAT_GESTION 
  ADD FOREIGN KEY FK_H_CONTRAT_GESTION_CONTRAT_GESTION (IDC)
      REFERENCES CONTRAT_GESTION (IDC) ;
	  
	  

Drop  trigger if exists insertProp;
delimiter //

CREATE trigger insertProp 
before insert on Proprietaire
for each row
 begin
	Declare nbP int;
	select count(*) into nbP from Tiers where idtiers = new.idtiers;
	if nbP = 0 then
		insert into tiers values (new.idtiers);
	end if;
end//
delimiter ;

Drop  trigger if exists insertLoc;
delimiter //

CREATE trigger insertLoc
before insert on Locataire
for each row
 begin
	Declare nbL int;
	select count(*) into nbL from Tiers where idtiers = new.idtiers;
	if nbL = 0 then
		insert into tiers values (new.idtiers);
	end if;
end//
delimiter ;  