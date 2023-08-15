-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 14 juin 2020 à 06:30
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `autoecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `LOGIN` char(50) NOT NULL,
  `NOM` char(50) NOT NULL,
  `PRENOM` char(50) NOT NULL,
  `MOTDEPASSE` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`LOGIN`, `NOM`, `PRENOM`, `MOTDEPASSE`) VALUES
('admin', 'RIAH', 'Ilyas', '123');

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `CINCANDIDAT` char(10) NOT NULL,
  `IDEXAMEN` int(11) NOT NULL,
  `RESULTATEXAMEN` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`CINCANDIDAT`, `IDEXAMEN`, `RESULTATEXAMEN`) VALUES
('A111111', 1, 0),
('A111111', 2, 0),
('A111112', 1, 0),
('A111112', 2, 0),
('A111113', 3, 0),
('A111113', 4, 0),
('A111114', 3, 0),
('A111114', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `CINCANDIDAT` char(10) NOT NULL,
  `NOM` char(50) NOT NULL,
  `PRENOM` char(50) NOT NULL,
  `DATENAISSANCE` date NOT NULL,
  `EMAIL` char(50) NOT NULL,
  `TELEPHONE` char(10) NOT NULL,
  `CLASS` varchar(10) NOT NULL,
  `MOTDEPASSE` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`CINCANDIDAT`, `NOM`, `PRENOM`, `DATENAISSANCE`, `EMAIL`, `TELEPHONE`, `CLASS`, `MOTDEPASSE`) VALUES
('A111111', 'RIAH', 'Ilyas', '2000-06-10', 'ilyasriah2000@gmail.com', '0601020304', 'A1', '123'),
('A111112', 'ARRHIOUI', 'Anass', '2000-01-01', 'ARRHIOUI@Anass', '0601020304', 'A1', '123'),
('A111113', 'RAHHAOUI', 'Mouad', '2000-06-23', 'RAHHAOUI@Mouad', '0601020304', 'A2', '123'),
('A111114', 'BRAHIMI', 'Ismail', '2000-04-08', 'BRAHIMI@Ismail', '0601020304', 'A2', '123'),
('A111115', 'AJLI', 'Zakaria', '2000-05-05', 'AJLI@Zakaria', '0601020304', 'A3', '123');

-- --------------------------------------------------------

--
-- Structure de la table `codeae`
--

CREATE TABLE `codeae` (
  `id` int(10) NOT NULL,
  `CIN_AE` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `codeae`
--

INSERT INTO `codeae` (`id`, `CIN_AE`) VALUES
(1, 'A111111'),
(2, 'A111112'),
(3, 'A111113'),
(4, 'A111114'),
(5, 'A111115'),
(6, 'A111116');

-- --------------------------------------------------------

--
-- Structure de la table `etudier`
--

CREATE TABLE `etudier` (
  `CINCANDIDAT` char(10) NOT NULL,
  `IDSEANCE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudier`
--

INSERT INTO `etudier` (`CINCANDIDAT`, `IDSEANCE`) VALUES
('A111111', 1),
('A111111', 2),
('A111111', 3),
('A111111', 4),
('A111111', 5),
('A111112', 1),
('A111112', 2),
('A111112', 3),
('A111112', 4),
('A111112', 5),
('A111113', 6),
('A111113', 7),
('A111113', 8),
('A111113', 9),
('A111113', 10),
('A111114', 6),
('A111114', 7),
('A111114', 8),
('A111114', 9),
('A111114', 10);

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `IDEXAMEN` int(11) NOT NULL,
  `DATEEXAMEN` date NOT NULL,
  `TYPEEXAMEN` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`IDEXAMEN`, `DATEEXAMEN`, `TYPEEXAMEN`) VALUES
(1, '2020-07-15', 'Théorique'),
(2, '2020-07-16', 'Pratique'),
(3, '2020-07-29', 'Théorique'),
(4, '2020-07-28', 'Pratique');

-- --------------------------------------------------------

--
-- Structure de la table `moniteur`
--

CREATE TABLE `moniteur` (
  `CINMONITEUR` char(10) NOT NULL,
  `NOM` char(50) NOT NULL,
  `PRENOM` char(50) NOT NULL,
  `EMAIL` char(50) NOT NULL,
  `TELEPHONE` char(10) NOT NULL,
  `MOTDEPASSE` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `moniteur`
--

INSERT INTO `moniteur` (`CINMONITEUR`, `NOM`, `PRENOM`, `EMAIL`, `TELEPHONE`, `MOTDEPASSE`) VALUES
('B111111', 'ZROURI', 'hafida', 'zrouri_gl@yahoo.fr', '0601020305', '123'),
('B111112', 'KORIKACH', 'Reda', 'reda@korikach', '0601020304', '123');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `IDSEANCE` int(11) NOT NULL,
  `MATRICULE` char(15) DEFAULT NULL,
  `CINMONITEUR` char(10) NOT NULL,
  `CLASS` varchar(10) NOT NULL,
  `DATESEANCE` varchar(10) NOT NULL,
  `HORAIRE` varchar(20) NOT NULL,
  `TYPEFORMATION` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`IDSEANCE`, `MATRICULE`, `CINMONITEUR`, `CLASS`, `DATESEANCE`, `HORAIRE`, `TYPEFORMATION`) VALUES
(1, '1|A|9998', 'B111112', 'A1', 'Lundi', 'soir', 'Pratique'),
(2, NULL, 'B111111', 'A1', 'Mardi', 'matin', 'Théorique'),
(3, '1|A|9999', 'B111112', 'A1', 'Mercredi', 'matin', 'Pratique'),
(4, '1|A|9998', 'B111112', 'A1', 'Jeudi', 'matin', 'Pratique'),
(5, NULL, 'B111111', 'A1', 'Vendredi', 'matin', 'Théorique'),
(6, NULL, 'B111111', 'A2', 'Lundi', 'soir', 'Théorique'),
(7, '1|A|9998', 'B111112', 'A2', 'Mardi', 'matin', 'Pratique'),
(8, NULL, 'B111111', 'A2', 'Mercredi', 'matin', 'Théorique'),
(9, NULL, 'B111111', 'A2', 'Jeudi', 'matin', 'Théorique'),
(10, '1|A|9999', 'B111112', 'A2', 'Vendredi', 'matin', 'Pratique'),
(11, NULL, 'B111111', 'A3', 'Jeudi', 'soir', 'Théorique'),
(12, '1|A|9999', 'B111112', 'A3', 'Mercredi', 'soir', 'Pratique'),
(13, NULL, 'B111111', 'A3', 'Mardi', 'soir', 'Théorique'),
(14, '1|A|9999', 'B111112', 'A3', 'Lundi', 'matin', 'Pratique');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `idVehicule` int(10) NOT NULL,
  `MATRICULE` char(15) NOT NULL,
  `MARQUE` char(25) NOT NULL,
  `TYPE` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`idVehicule`, `MATRICULE`, `MARQUE`, `TYPE`) VALUES
(1, '1|A|9998', 'Volkswagen', 'Golf'),
(2, '1|A|9999', 'Renault', 'Clio');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`LOGIN`);

--
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`CINCANDIDAT`,`IDEXAMEN`),
  ADD KEY `CLASS` (`CINCANDIDAT`),
  ADD KEY `IDEXAMEN` (`IDEXAMEN`);

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`CINCANDIDAT`);

--
-- Index pour la table `codeae`
--
ALTER TABLE `codeae`
  ADD PRIMARY KEY (`CIN_AE`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Index pour la table `etudier`
--
ALTER TABLE `etudier`
  ADD PRIMARY KEY (`CINCANDIDAT`,`IDSEANCE`),
  ADD KEY `IDSEANCE` (`IDSEANCE`),
  ADD KEY `IDSEANCE_2` (`IDSEANCE`),
  ADD KEY `IDSEANC` (`IDSEANCE`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`IDEXAMEN`);

--
-- Index pour la table `moniteur`
--
ALTER TABLE `moniteur`
  ADD PRIMARY KEY (`CINMONITEUR`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`IDSEANCE`),
  ADD KEY `FK_ENSEIGNER` (`CINMONITEUR`),
  ADD KEY `FK_UTILISER` (`MATRICULE`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`MATRICULE`),
  ADD KEY `idVehicule` (`idVehicule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avoir`
--
ALTER TABLE `avoir`
  MODIFY `IDEXAMEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `codeae`
--
ALTER TABLE `codeae`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `etudier`
--
ALTER TABLE `etudier`
  MODIFY `IDSEANCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `examen`
--
ALTER TABLE `examen`
  MODIFY `IDEXAMEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `IDSEANCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `idVehicule` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `IDEXAMEN` FOREIGN KEY (`IDEXAMEN`) REFERENCES `examen` (`IDEXAMEN`);

--
-- Contraintes pour la table `etudier`
--
ALTER TABLE `etudier`
  ADD CONSTRAINT `FK_ETUDIER1` FOREIGN KEY (`IDSEANCE`) REFERENCES `seance` (`IDSEANCE`),
  ADD CONSTRAINT `FK_ETUDIER2` FOREIGN KEY (`CINCANDIDAT`) REFERENCES `candidat` (`CINCANDIDAT`);

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `FK_ENSEIGNER` FOREIGN KEY (`CINMONITEUR`) REFERENCES `moniteur` (`CINMONITEUR`),
  ADD CONSTRAINT `FK_UTILISER` FOREIGN KEY (`MATRICULE`) REFERENCES `vehicule` (`MATRICULE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
