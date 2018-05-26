-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Janvier 2018 à 04:32
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `neigesoleil`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `IDAGENCE` int(6) NOT NULL,
  `IDREGION` int(6) NOT NULL,
  `NOMAGENCE` varchar(50) DEFAULT NULL,
  `ADRESSEA` varchar(100) DEFAULT NULL,
  `VILLEA` varchar(50) DEFAULT NULL,
  `CODEPOSTAL` char(5) DEFAULT NULL,
  `TEL` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

CREATE TABLE `appartement` (
  `IDAPPARTEMENT` int(6) NOT NULL,
  `IDVILLE` int(6) NOT NULL,
  `IDREGION` int(6) NOT NULL,
  `NUM_IMMEUBLE` varchar(50) DEFAULT NULL,
  `ADRESSEAPP` varchar(100) DEFAULT NULL,
  `CODEPOSTAL` char(5) DEFAULT NULL,
  `TYPEAPPART` char(5) DEFAULT NULL,
  `SURFACE` decimal(6,2) DEFAULT NULL,
  `EXPOSITION` varchar(20) DEFAULT NULL,
  `CAPACITE_ACCUEIL` int(4) DEFAULT NULL,
  `DISTANCE_PISTE` decimal(10,2) DEFAULT NULL,
  `PRIX_BASE` decimal(6,2) DEFAULT NULL,
  `LIENPHOTO` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `appartement`
--

INSERT INTO `appartement` (`IDAPPARTEMENT`, `IDVILLE`, `IDREGION`, `NUM_IMMEUBLE`, `ADRESSEAPP`, `CODEPOSTAL`, `TYPEAPPART`, `SURFACE`, `EXPOSITION`, `CAPACITE_ACCUEIL`, `DISTANCE_PISTE`, `PRIX_BASE`, `LIENPHOTO`) VALUES
(1, 1, 1, NULL, 'Cours Fontanarosa', '05560', 'F3', '50.30', 'sud est', 6, '400.00', '1200.00', 'apparVars'),
(2, 2, 2, NULL, 'place royale', '64000', 'F2', '37.80', 'nord ouest', 2, '400.00', '850.00', 'appartPau'),
(3, 3, 3, NULL, 'place de la mairie', '65170', 'F4', '60.40', 'sud ouest', 8, '400.00', '1500.00', 'appartSaintLary'),
(4, 4, 4, '47', 'Rue Charles de Gaulle', '88400', 'F6', '80.00', 'sud est', 12, '400.00', '1600.00', 'appartGérardmer');

-- --------------------------------------------------------

--
-- Structure de la table `contrat_gestion`
--

CREATE TABLE `contrat_gestion` (
  `IDC` int(6) NOT NULL,
  `IDAGENCE` int(6) NOT NULL,
  `IDAPPARTEMENT` int(6) NOT NULL,
  `IDTIERS` int(6) NOT NULL,
  `ETAT` varchar(20) DEFAULT NULL,
  `DATESIGNATUREC` date DEFAULT NULL,
  `DATEDEBUT` date DEFAULT NULL,
  `DATEFIN` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `IDEQUIPEMENT` int(6) NOT NULL,
  `IDAPPARTEMENT` int(6) NOT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `NOMBREE` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `equipement`
--

INSERT INTO `equipement` (`IDEQUIPEMENT`, `IDAPPARTEMENT`, `NOME`, `NOMBREE`) VALUES
(1, 1, 'machine à laver', 1),
(2, 4, 'télévision', 2),
(3, 2, 'assiètes', 10),
(4, 3, 'cuillières à soupe', 15);

-- --------------------------------------------------------

--
-- Structure de la table `h_contrat_gestion`
--

CREATE TABLE `h_contrat_gestion` (
  `IDC` int(6) NOT NULL,
  `DATE_HISTO` date NOT NULL,
  `ETAT` varchar(20) DEFAULT NULL,
  `DATESIGNATUREC` date DEFAULT NULL,
  `DATEDEBUT` date DEFAULT NULL,
  `DATEFIN` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table d''historisation des modifications de la table CONTRAT_GESTION';

-- --------------------------------------------------------

--
-- Structure de la table `info_ville`
--

CREATE TABLE `info_ville` (
  `IDVILLE` int(6) NOT NULL,
  `NOMV` varchar(50) DEFAULT NULL,
  `REGIONV` varchar(128) DEFAULT NULL,
  `CODEPOSTAL` char(5) DEFAULT NULL,
  `TEL_AGENCE_TOURISME` varchar(20) DEFAULT NULL,
  `TEL_COMISSARIAT` varchar(20) DEFAULT NULL,
  `TEL_MAIRIE` varchar(20) DEFAULT NULL,
  `TEL_MEDECIN` int(20) DEFAULT NULL,
  `TEL_PHARMACIE` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `info_ville`
--

INSERT INTO `info_ville` (`IDVILLE`, `NOMV`, `REGIONV`, `CODEPOSTAL`, `TEL_AGENCE_TOURISME`, `TEL_COMISSARIAT`, `TEL_MAIRIE`, `TEL_MEDECIN`, `TEL_PHARMACIE`) VALUES
(1, 'Vars', 'Alpes', '05560', '0123456867', '0167543987', '0165487645', 187654398, '0187654098'),
(2, 'Pau', 'Nouvelle-aquitaine', '64000', '0123457667', '0167598987', '0195487645', 187654048, '0187650298'),
(3, 'Saint-Lary-Soulan', 'Les pyrénées', '65170', '0413456867', '0167983987', '0166453645', 197654398, '0187698798'),
(4, 'Gérardmer', 'Les vosges', '88400', '0123498767', '0198543987', '0165456745', 198754398, '0105694098');

-- --------------------------------------------------------

--
-- Structure de la table `locataire`
--

CREATE TABLE `locataire` (
  `IDTIERS` int(6) NOT NULL,
  `CIVILITE` varchar(15) DEFAULT NULL,
  `NOML` varchar(50) DEFAULT NULL,
  `PRENOML` varchar(50) DEFAULT NULL,
  `ADRESSEL` varchar(100) DEFAULT NULL,
  `CODEPOSTAL` char(5) DEFAULT NULL,
  `VILLE` varchar(50) DEFAULT NULL,
  `TEL` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(128) DEFAULT NULL,
  `MOT_PASSE` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `locataire`
--

INSERT INTO `locataire` (`IDTIERS`, `CIVILITE`, `NOML`, `PRENOML`, `ADRESSEL`, `CODEPOSTAL`, `VILLE`, `TEL`, `EMAIL`, `MOT_PASSE`) VALUES
(6, 'Monsieur', 'robert', 'martin', '35 rue leon geffroy', '94600', 'vitry sur seine', '0786543823', 'martin76@outlook.fr', 'martin123'),
(7, 'Monsier', 'Richard', 'Dupond', '25 rue des fleurs', '33500', 'Libourne', '0665487329', 'Dupond1@outlook.fr', 'Dupond123'),
(8, 'madame', 'Bernard', 'Rose', '40 rue de l église', '33380', 'Mios', '0786549361', 'rose@outlook.fr', 'rose123'),
(9, 'madame', 'Dubois', 'Valery', '35 rue de paris', '75019', 'Paris', '0645389724', 'valery6@outlook.fr', 'valery123');

--
-- Déclencheurs `locataire`
--
DELIMITER $$
CREATE TRIGGER `insertLoc` BEFORE INSERT ON `locataire` FOR EACH ROW begin
Declare nbL int;
select count(*) into nbL from Tiers where idtiers = new.idtiers;
if nbL = 0 then
insert into tiers values (new.idtiers);
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `IDMATERIEL` int(6) NOT NULL,
  `TYPEM` varchar(50) DEFAULT NULL,
  `ETAT` varchar(30) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `idProprietaire` int(6) NOT NULL,
  `PRIX` float(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `materiel`
--

INSERT INTO `materiel` (`IDMATERIEL`, `TYPEM`, `ETAT`, `image`, `idProprietaire`, `PRIX`) VALUES
(1, 'ski de piste Pack atris', 'excellent', 'atris', 2, 30.00),
(2, 'Guardian mnc 13', 'bon', 'Guardianmnc13', 2, 60.00),
(3, 'Baton de ski Kaloo jr', 'bon', 'BatondeskiKaloo', 4, 84.00),
(4, 'chaussure de ski rossignol', 'très bon', 'rossignol', 3, 56.00),
(5, 'patinette de ski', 'bon', 'patinette', 4, 72.00);

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `IDTIERS` int(6) NOT NULL,
  `CIVILITE` varchar(15) DEFAULT NULL,
  `NOMP` varchar(50) DEFAULT NULL,
  `PRENOMP` varchar(50) DEFAULT NULL,
  `ADRESSEP` varchar(100) DEFAULT NULL,
  `CODEPOSTAL` char(5) DEFAULT NULL,
  `VILLE` varchar(50) DEFAULT NULL,
  `TEL` varchar(20) DEFAULT NULL,
  `RIB` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(128) DEFAULT NULL,
  `MOT_PASSE` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `proprietaire`
--

INSERT INTO `proprietaire` (`IDTIERS`, `CIVILITE`, `NOMP`, `PRENOMP`, `ADRESSEP`, `CODEPOSTAL`, `VILLE`, `TEL`, `RIB`, `EMAIL`, `MOT_PASSE`) VALUES
(2, 'Monsieur', 'louguillau', 'jean-louis', '2 rue maréchal joffre', '64000', 'pau', '0605347822', 'FR3330002005500000157841Z25', 'jl@gmail.com', 'jl2018'),
(3, 'Madame', 'benhammed', 'louise', '14 rue François de Sourdis', '33000', 'bordeau', '07653476292', 'FR3330004005500000187841R45', 'louise@gmail.com', 'louise2018'),
(4, 'Monsieur', 'ly', 'antoine', '40 quai Bons Enfants', '88026', 'EPINAL', '0756432895', 'FR4530004005500000188541T29', 'antoine@gmail.com', 'antoine2018'),
(5, 'Monsieur', 'Roux', 'Dominique', 'place Charles de Gaulle', '65000', 'TARBES', '0685987256', 'FR4530004005500000188541J89', 'dominique@gmail.com', 'dominique2018');

--
-- Déclencheurs `proprietaire`
--
DELIMITER $$
CREATE TRIGGER `insertProp` BEFORE INSERT ON `proprietaire` FOR EACH ROW begin
Declare nbP int;
select count(*) into nbP from Tiers where idtiers = new.idtiers;
if nbP = 0 then
insert into tiers values (new.idtiers);
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `IDREGION` int(6) NOT NULL,
  `NOMR` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `region`
--

INSERT INTO `region` (`IDREGION`, `NOMR`) VALUES
(1, 'Alpes'),
(2, 'nouvelle-aquitaine'),
(3, 'les pyrénées'),
(4, 'les vosges');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `IDR` int(6) NOT NULL,
  `IDAPPARTEMENT` int(6) NOT NULL,
  `IDSAISON` int(6) NOT NULL,
  `IDMATERIEL` int(6) DEFAULT NULL,
  `IDAGENCE` int(6) NOT NULL,
  `IDTIERS` int(6) NOT NULL,
  `ETAT` varchar(20) DEFAULT NULL,
  `DATERESERVATION` date DEFAULT NULL,
  `DATEDEBUT` date DEFAULT NULL,
  `DATEFIN` date DEFAULT NULL,
  `NBPERSONNES` int(3) DEFAULT NULL,
  `type_reserv` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`IDR`, `IDAPPARTEMENT`, `IDSAISON`, `IDMATERIEL`, `IDAGENCE`, `IDTIERS`, `ETAT`, `DATERESERVATION`, `DATEDEBUT`, `DATEFIN`, `NBPERSONNES`, `type_reserv`) VALUES
(1, 1, 1, NULL, 1, 7, 'confirmee', '2017-10-24', '2018-01-03', '2018-01-10', 6, 'APPART'),
(2, 1, 1, 2, 1, 7, 'confirmee', '2017-10-24', '2018-01-03', '2018-01-10', 6, 'MATERIEL');

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE `saison` (
  `IDSAISON` int(6) NOT NULL,
  `NOMS` varchar(50) DEFAULT NULL,
  `PERIODES` varchar(50) DEFAULT NULL,
  `REDUCTION` decimal(4,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `saison`
--

INSERT INTO `saison` (`IDSAISON`, `NOMS`, `PERIODES`, `REDUCTION`) VALUES
(1, 'Basse', '', '2.00'),
(2, 'Moyenne', '', '10.00'),
(3, 'Haute', '', '20.00');

-- --------------------------------------------------------

--
-- Structure de la table `tiers`
--

CREATE TABLE `tiers` (
  `IDTIERS` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tiers`
--

INSERT INTO `tiers` (`IDTIERS`) VALUES
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`IDAGENCE`),
  ADD KEY `I_FK_AGENCE_REGION` (`IDREGION`);

--
-- Index pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD PRIMARY KEY (`IDAPPARTEMENT`),
  ADD KEY `I_FK_APPARTEMENT_INFO_VILLE` (`IDVILLE`),
  ADD KEY `I_FK_APPARTEMENT_REGION` (`IDREGION`);

--
-- Index pour la table `contrat_gestion`
--
ALTER TABLE `contrat_gestion`
  ADD PRIMARY KEY (`IDC`),
  ADD KEY `I_FK_CONTRAT_GESTION_PROPRIETAIRE` (`IDTIERS`),
  ADD KEY `I_FK_CONTRAT_GESTION_AGENCE` (`IDAGENCE`),
  ADD KEY `I_FK_CONTRAT_GESTION_APPARTEMENT` (`IDAPPARTEMENT`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`IDEQUIPEMENT`),
  ADD KEY `I_FK_EQUIPEMENT_APPARTEMENT` (`IDAPPARTEMENT`);

--
-- Index pour la table `h_contrat_gestion`
--
ALTER TABLE `h_contrat_gestion`
  ADD PRIMARY KEY (`IDC`,`DATE_HISTO`),
  ADD KEY `I_FK_H_CONTRAT_GESTION_CONTRAT_GESTION` (`IDC`);

--
-- Index pour la table `info_ville`
--
ALTER TABLE `info_ville`
  ADD PRIMARY KEY (`IDVILLE`);

--
-- Index pour la table `locataire`
--
ALTER TABLE `locataire`
  ADD PRIMARY KEY (`IDTIERS`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`IDMATERIEL`),
  ADD KEY `FK_MATERIEL_PROPRIETAIRE` (`idProprietaire`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`IDTIERS`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`IDREGION`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`IDR`),
  ADD KEY `I_FK_RESERVATION_APPARTEMENT` (`IDAPPARTEMENT`),
  ADD KEY `I_FK_RESERVATION_SAISON` (`IDSAISON`),
  ADD KEY `I_FK_RESERVATION_MATERIEL` (`IDMATERIEL`),
  ADD KEY `I_FK_RESERVATION_LOCATAIRE` (`IDTIERS`),
  ADD KEY `I_FK_RESERVATION_AGENCE` (`IDAGENCE`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`IDSAISON`);

--
-- Index pour la table `tiers`
--
ALTER TABLE `tiers`
  ADD PRIMARY KEY (`IDTIERS`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `IDAGENCE` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `appartement`
--
ALTER TABLE `appartement`
  MODIFY `IDAPPARTEMENT` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `contrat_gestion`
--
ALTER TABLE `contrat_gestion`
  MODIFY `IDC` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `IDEQUIPEMENT` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `info_ville`
--
ALTER TABLE `info_ville`
  MODIFY `IDVILLE` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `IDMATERIEL` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `IDREGION` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `IDR` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `saison`
--
ALTER TABLE `saison`
  MODIFY `IDSAISON` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `tiers`
--
ALTER TABLE `tiers`
  MODIFY `IDTIERS` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
