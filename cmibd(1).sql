-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 14 sep. 2020 à 17:17
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cmibd`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `id_service` int(11) NOT NULL,
  `matricule_personnel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`id_service`, `matricule_personnel`) VALUES
(2, 'MEDHRN001'),
(2, 'MEDHR5668'),
(4, 'MEDHRN001');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type_compte` int(11) NOT NULL,
  `matricule_personnel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`login`, `password`, `type_compte`, `matricule_personnel`) VALUES
('Eloundou', 'El1234', 0, 'MEDHRN001');

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `id_cons` int(11) NOT NULL AUTO_INCREMENT,
  `id_demande` int(11) NOT NULL,
  `diagnostic` varchar(300) DEFAULT NULL,
  `ordonnance` varchar(300) DEFAULT NULL,
  `examen` varchar(300) DEFAULT NULL,
  `date_cons` date NOT NULL,
  `date_rendezvous` date DEFAULT NULL,
  PRIMARY KEY (`id_cons`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demande_cons`
--

DROP TABLE IF EXISTS `demande_cons`;
CREATE TABLE IF NOT EXISTS `demande_cons` (
  `id_demande` int(11) NOT NULL AUTO_INCREMENT,
  `id_carnet` varchar(11) NOT NULL,
  `id_medecin` varchar(11) NOT NULL,
  `date_demande` date NOT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `contenu` varchar(300) NOT NULL,
  `debut_symp` varchar(50) DEFAULT NULL,
  `motif_demande` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_demande`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `nom_patient` varchar(50) NOT NULL,
  `prenom_patient` varchar(50) DEFAULT NULL,
  `sexe_patient` varchar(8) NOT NULL,
  `date_naissance_patient` date NOT NULL,
  `nationalite_patient` varchar(50) NOT NULL,
  `groupe_sanguin_patient` varchar(5) DEFAULT NULL,
  `photo_patient` varchar(250) DEFAULT NULL,
  `numtel_patient` varchar(50) NOT NULL,
  `email_patient` varchar(50) DEFAULT NULL,
  `domicile_patient` varchar(50) NOT NULL,
  `profession_patient` varchar(50) DEFAULT NULL,
  `nom_tuteur_patient` varchar(50) DEFAULT NULL,
  `num_tel_tuteur_patient` varchar(50) DEFAULT NULL,
  `num_cni_patient` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`num_cni_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`nom_patient`, `prenom_patient`, `sexe_patient`, `date_naissance_patient`, `nationalite_patient`, `groupe_sanguin_patient`, `photo_patient`, `numtel_patient`, `email_patient`, `domicile_patient`, `profession_patient`, `nom_tuteur_patient`, `num_tel_tuteur_patient`, `num_cni_patient`, `login`, `password`) VALUES
('MLKJnb', 'MLJNBM', 'Masculin', '0005-02-05', 'etatsUnis', 'B+', 'avatar.jpg', '132782', 'vazd@fedqs.fr', 'EDYRSE', 'YUTYF-RD(ES\'DF', '', '', '2424565334', '1234', '1234'),
('STONE', 'FIRE', 'Masculin', '1999-05-02', 'cameroun', 'B+', 'avatar.jpg', '654878525', 'zsd@gf.fr', 'YAOUNDE', 'ETUDIANT', 'AZE', '585', '505050', 'stone', '1234'),
('DJOYO', 'VALDO', 'Masculin', '1998-04-03', 'cameroun', 'O-', 'avatar.jpg', '657647329', 'djoyovaldo@gmail.fr', 'OLEMBE', 'DEVELOPPEUR@FR.FR', '', '', '5422551', 'azerty', 'azerty'),
('Eloundou', 'Fabrice', 'masculin', '2000-08-03', 'Camerounaise', 'O/+', '', '693236412', 'eloundou@gmail.com', 'Dang Dylane city', 'Etudiant', 'Tchappi', '656362341', 'CN0254D78FH', 'Fabrice', 'Fa1234');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `matricule_personnel` varchar(10) CHARACTER SET utf8 NOT NULL,
  `nom_personnel` varchar(50) CHARACTER SET utf32 NOT NULL,
  `prenom_personnel` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sexe_personnel` varchar(11) NOT NULL,
  `fonction_personnel` varchar(10) CHARACTER SET utf8 NOT NULL,
  `specialite` varchar(30) NOT NULL DEFAULT 'Generaliste',
  `telephone_personnel` varchar(50) CHARACTER SET utf32 NOT NULL,
  `email_personnel` varchar(50) CHARACTER SET utf8 NOT NULL,
  `photo_personnel` varchar(250) DEFAULT '../assets/image/avatar.jpg',
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`matricule_personnel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`matricule_personnel`, `nom_personnel`, `prenom_personnel`, `sexe_personnel`, `fonction_personnel`, `specialite`, `telephone_personnel`, `email_personnel`, `photo_personnel`, `login`, `password`) VALUES
('MEDHR1412', 'DJOYO', 'VALDO', 'Masculin', 'MEDECIN', 'Generaliste', '657647329', 'djoyovaldo@gmail.cm', '1560458335465.jpg', 'valdo', 'valdo'),
('MEDHR5668', 'SILATCHA TCHINDA', 'JORIS RUISSEL', 'Masculin', 'MEDECIN', 'Generaliste', '69888788', 'joris@si.fr', '1564420435568.jpg', 'joris', 'joris'),
('MEDHRN001', 'Eloundou', 'Fabrice', 'Masculin', 'Admin', 'Generaliste', '699665542', 'fabrice@gmail.cm', 'avatar.jpg', 'NULL', 'El1234');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `designation_service` varchar(50) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `designation_service`) VALUES
(2, 'Dentaire'),
(4, 'Urgence');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
