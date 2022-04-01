-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 20 jan. 2022 à 16:22
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tontine`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `idAdherent` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `login` varchar(30) NOT NULL,
  `motDePasse` varchar(30) NOT NULL,
  `profil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Cotiser`
--

CREATE TABLE `Cotiser` (
  `idEcheance` int(11) NOT NULL,
  `idAdherent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Echeance`
--

CREATE TABLE `Echeance` (
  `idEcheance` int(11) NOT NULL,
  `date` date NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Participer`
--

CREATE TABLE `Participer` (
  `idTontine` int(11) NOT NULL,
  `idAdherent` int(11) NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tontine`
--

CREATE TABLE `tontine` (
  `idTontine` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `periodicite` int(11) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `idAdherent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`idAdherent`);

--
-- Index pour la table `Cotiser`
--
ALTER TABLE `Cotiser`
  ADD KEY `fk_adherent_cotiser` (`idAdherent`),
  ADD KEY `fk_echeance_cotiser` (`idEcheance`);

--
-- Index pour la table `Echeance`
--
ALTER TABLE `Echeance`
  ADD PRIMARY KEY (`idEcheance`);

--
-- Index pour la table `Participer`
--
ALTER TABLE `Participer`
  ADD KEY `fk_tontine_participer` (`idTontine`),
  ADD KEY `fk_adherent_participer` (`idAdherent`);

--
-- Index pour la table `tontine`
--
ALTER TABLE `tontine`
  ADD PRIMARY KEY (`idTontine`),
  ADD KEY `fk_adherent_tontine` (`idAdherent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `idAdherent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Echeance`
--
ALTER TABLE `Echeance`
  MODIFY `idEcheance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tontine`
--
ALTER TABLE `tontine`
  MODIFY `idTontine` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Cotiser`
--
ALTER TABLE `Cotiser`
  ADD CONSTRAINT `fk_adherent_cotiser` FOREIGN KEY (`idAdherent`) REFERENCES `adherent` (`idAdherent`),
  ADD CONSTRAINT `fk_echeance_cotiser` FOREIGN KEY (`idEcheance`) REFERENCES `Echeance` (`idEcheance`);

--
-- Contraintes pour la table `Participer`
--
ALTER TABLE `Participer`
  ADD CONSTRAINT `fk_adherent_participer` FOREIGN KEY (`idAdherent`) REFERENCES `adherent` (`idAdherent`),
  ADD CONSTRAINT `fk_tontine_participer` FOREIGN KEY (`idTontine`) REFERENCES `tontine` (`idTontine`);

--
-- Contraintes pour la table `tontine`
--
ALTER TABLE `tontine`
  ADD CONSTRAINT `fk_adherent_tontine` FOREIGN KEY (`idAdherent`) REFERENCES `adherent` (`idAdherent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
