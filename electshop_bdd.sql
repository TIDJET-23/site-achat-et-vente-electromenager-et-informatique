-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 mai 2022 à 20:57
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- // TIDJET @ KHIREDDINE 2022


--
-- Base de données : `electshop_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `table_cat`
--

CREATE TABLE `table_cat` (
  `id_categorie` int(11) NOT NULL,
  `cat_nom` varchar(255) NOT NULL,
  `aff_ach` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_cat`
--

INSERT INTO `table_cat` (`id_categorie`, `cat_nom`, `aff_ach`) VALUES
(2, 'TVs', 0),
(3, 'chaufage', 1),
(4, 'climatiseur', 1),
(5, 'lave-vaisselle', 1),
(6, 'micro ondes', 0),
(7, 'appareils photos', 1);

-- --------------------------------------------------------

--
-- Structure de la table `table_client`
--

CREATE TABLE `table_client` (
  `id_c` int(11) NOT NULL,
  `nom_c` varchar(100) NOT NULL,
  `prenom_c` varchar(100) NOT NULL,
  `email_c` varchar(100) NOT NULL,
  `tel_c` varchar(50) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `add_c` text NOT NULL,
  `willaya_c` varchar(100) NOT NULL,
  `ville_c` varchar(100) NOT NULL,
  `code_postal_c` varchar(30) NOT NULL,
  `pass_c` varchar(100) NOT NULL,
  `dateins_c` varchar(100) NOT NULL,
  `post` varchar(20) NOT NULL,
  `num_cni_pc` int(20) NOT NULL,
  `num_reg` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_client`
--

INSERT INTO `table_client` (`id_c`, `nom_c`, `prenom_c`, `email_c`, `tel_c`, `id_pays`, `add_c`, `willaya_c`, `ville_c`, `code_postal_c`, `pass_c`, `dateins_c`, `post`, `num_cni_pc`, `num_reg`) VALUES
(2, 'fournisseur', 'electromenager TTZD', 'boutique@gmail.com', '0000000000', 3, '15 ABBAN REMTANE', 'bejaia', 'akbou', '06000', '886a9f9edb12bdd4ac1d58f0283b6855', '2022-04-21 01:06:38', 'boutique', 107217850, 2147483647),
(3, 'client ', 'client', 'client@gmail.com', '078990777', 3, 'elhad', 'bejaia', 'timezrit', '06019', '62608e08adc29a8d6dbc9754e659f125', '2022-04-21 01:17:06', 'client', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `table_panier`
--

CREATE TABLE `table_panier` (
  `id` int(4) NOT NULL,
  `idper` int(4) NOT NULL,
  `idproduit` int(4) NOT NULL,
  `quant` int(6) NOT NULL,
  `idboutique` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_panier`
--

INSERT INTO `table_panier` (`id`, `idper`, `idproduit`, `quant`, `idboutique`) VALUES
(33, 3, 2, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `table_pays`
--

CREATE TABLE `table_pays` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `table_pays`
--

INSERT INTO `table_pays` (`country_id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Croatia (Hrvatska)'),
(53, 'Cuba'),
(54, 'Cyprus'),
(55, 'Czech Republic'),
(56, 'Denmark'),
(57, 'Djibouti'),
(58, 'Dominica'),
(59, 'Dominican Republic'),
(60, 'East Timor'),
(61, 'Ecuador'),
(62, 'Egypt'),
(63, 'El Salvador'),
(64, 'Equatorial Guinea'),
(65, 'Eritrea'),
(66, 'Estonia'),
(67, 'Ethiopia'),
(68, 'Falkland Islands (Malvinas)'),
(69, 'Faroe Islands'),
(70, 'Fiji'),
(71, 'Finland'),
(72, 'France'),
(73, 'France, Metropolitan'),
(74, 'French Guiana'),
(75, 'French Polynesia'),
(76, 'French Southern Territories'),
(77, 'Gabon'),
(78, 'Gambia'),
(79, 'Georgia'),
(80, 'Germany'),
(81, 'Ghana'),
(82, 'Gibraltar'),
(83, 'Guernsey'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-Bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Isle of Man'),
(101, 'Indonesia'),
(102, 'Iran (Islamic Republic of)'),
(103, 'Iraq'),
(104, 'Ireland'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Ivory Coast'),
(108, 'Jersey'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jordan'),
(112, 'Kazakhstan'),
(113, 'Kenya'),
(114, 'Kiribati'),
(115, 'Korea, Democratic People\'s Republic of'),
(116, 'Korea, Republic of'),
(117, 'Kosovo'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People\'s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macau'),
(130, 'Macedonia'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestine'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Kitts and Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Vincent and the Grenadines'),
(187, 'Samoa'),
(188, 'San Marino'),
(189, 'Sao Tome and Principe'),
(190, 'Saudi Arabia'),
(191, 'Senegal'),
(192, 'Serbia'),
(193, 'Seychelles'),
(194, 'Sierra Leone'),
(195, 'Singapore'),
(196, 'Slovakia'),
(197, 'Slovenia'),
(198, 'Solomon Islands'),
(199, 'Somalia'),
(200, 'South Africa'),
(201, 'South Georgia South Sandwich Islands'),
(202, 'Spain'),
(203, 'Sri Lanka'),
(204, 'St. Helena'),
(205, 'St. Pierre and Miquelon'),
(206, 'Sudan'),
(207, 'Suriname'),
(208, 'Svalbard and Jan Mayen Islands'),
(209, 'Swaziland'),
(210, 'Sweden'),
(211, 'Switzerland'),
(212, 'Syrian Arab Republic'),
(213, 'Taiwan'),
(214, 'Tajikistan'),
(215, 'Tanzania, United Republic of'),
(216, 'Thailand'),
(217, 'Togo'),
(218, 'Tokelau'),
(219, 'Tonga'),
(220, 'Trinidad and Tobago'),
(221, 'Tunisia'),
(222, 'Turkey'),
(223, 'Turkmenistan'),
(224, 'Turks and Caicos Islands'),
(225, 'Tuvalu'),
(226, 'Uganda'),
(227, 'Ukraine'),
(228, 'United Arab Emirates'),
(229, 'United Kingdom'),
(230, 'United States'),
(231, 'United States minor outlying islands'),
(232, 'Uruguay'),
(233, 'Uzbekistan'),
(234, 'Vanuatu'),
(235, 'Vatican City State'),
(236, 'Venezuela'),
(237, 'Vietnam'),
(238, 'Virgin Islands (British)'),
(239, 'Virgin Islands (U.S.)'),
(240, 'Wallis and Futuna Islands'),
(241, 'Western Sahara'),
(242, 'Yemen'),
(243, 'Zaire'),
(244, 'Zambia'),
(245, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `table_produit`
--

CREATE TABLE `table_produit` (
  `p_id` int(11) NOT NULL,
  `p_nom` varchar(255) NOT NULL,
  `p_prixanc` varchar(10) NOT NULL,
  `p_prix` varchar(10) NOT NULL,
  `p_quantite` int(10) NOT NULL,
  `p_photo` varchar(255) NOT NULL,
  `p_info` text NOT NULL,
  `p_desc` text NOT NULL,
  `p_vue` int(11) NOT NULL,
  `p_boutique` varchar(5) NOT NULL,
  `p_active` int(1) NOT NULL,
  `id_souscat` int(11) NOT NULL,
  `cat_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_produit`
--

INSERT INTO `table_produit` (`p_id`, `p_nom`, `p_prixanc`, `p_prix`, `p_quantite`, `p_photo`, `p_info`, `p_desc`, `p_vue`, `p_boutique`, `p_active`, `id_souscat`, `cat_id`) VALUES
(1, 'lg cctv dome camera', '5600', '5300', 5, 'produit-1.jpg', '<p>camera de survaillane</p><p><b>marque LG&nbsp;</b></p><p><b>couleur</b> blanc</p>', '<p>camera de survaillane utiliser pour la securite de votre maison et votre suppertte ou entreprise<br></p>', 5, '0', 1, 1, 7),
(2, 'lave vaisselle condor', '', '48000', 3, 'produit-2.jpg', '<p><span style=\"background-color: rgb(255, 255, 0);\">marque condor</span></p><p>12 couvert</p><p><b>couleur</b> noir, gri</p>', '', 6, '0', 1, 0, 5),
(4, 'micro ondes solo', '40000', '36000', 15, 'produit-4.jpg', '<p>micro ondes solo</p><p><span style=\"background-color: rgb(255, 255, 0);\">marque samsung</span></p><p>couleur noir</p>', '', 5, '2', 1, 0, 6),
(5, 'climatiseur condor crown ', '', '60000', 0, 'produit-5.jpg', '<p>marque condor</p><p>couleur blanc</p><p>18000 BTU</p>', '', 2, '2', 1, 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `table_souhaite`
--

CREATE TABLE `table_souhaite` (
  `id` int(4) NOT NULL,
  `idper` int(11) NOT NULL,
  `idproduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_souhaite`
--

INSERT INTO `table_souhaite` (`id`, `idper`, `idproduit`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `table_souscat`
--

CREATE TABLE `table_souscat` (
  `id_souscat` int(11) NOT NULL,
  `nom_souscat` varchar(255) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_souscat`
--

INSERT INTO `table_souscat` (`id_souscat`, `nom_souscat`, `id_cat`) VALUES
(1, 'camera de securite et de survaillance', 7);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_demmande`
--

CREATE TABLE `tbl_demmande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `idboutique` int(5) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `date_dem` varchar(50) NOT NULL,
  `quantite` int(3) NOT NULL,
  `id_produit` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_demmande`
--

INSERT INTO `tbl_demmande` (`id`, `id_client`, `idboutique`, `nom_client`, `email_client`, `date_dem`, `quantite`, `id_produit`) VALUES
(2, 3, 0, 'client ', 'client@gmail.com', '2022-05-06 08:37:23', 1, 2),
(3, 3, 2, 'client ', 'client@gmail.com', '2022-05-06 08:52:57', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_p_photo`
--

CREATE TABLE `tbl_p_photo` (
  `pp_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_p_photo`
--

INSERT INTO `tbl_p_photo` (`pp_id`, `photo`, `p_id`) VALUES
(1, '1.jpg', 1),
(2, '2.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `nom_u` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel_u` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nom_u`, `email`, `tel_u`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '000000000', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_vente`
--

CREATE TABLE `tbl_vente` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `idboutique` int(5) NOT NULL,
  `date_vente` varchar(50) NOT NULL,
  `quantite` int(3) NOT NULL,
  `id_produit` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_vente`
--

INSERT INTO `tbl_vente` (`id`, `id_client`, `idboutique`, `date_vente`, `quantite`, `id_produit`) VALUES
(13, 3, 2, '2022-05-06 08:53:47', 3, 5),
(12, 3, 0, '2022-05-06 08:36:46', 2, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `table_cat`
--
ALTER TABLE `table_cat`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `table_client`
--
ALTER TABLE `table_client`
  ADD PRIMARY KEY (`id_c`);

--
-- Index pour la table `table_panier`
--
ALTER TABLE `table_panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `table_pays`
--
ALTER TABLE `table_pays`
  ADD PRIMARY KEY (`country_id`);

--
-- Index pour la table `table_produit`
--
ALTER TABLE `table_produit`
  ADD PRIMARY KEY (`p_id`);

--
-- Index pour la table `table_souhaite`
--
ALTER TABLE `table_souhaite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `table_souscat`
--
ALTER TABLE `table_souscat`
  ADD PRIMARY KEY (`id_souscat`);

--
-- Index pour la table `tbl_demmande`
--
ALTER TABLE `tbl_demmande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_p_photo`
--
ALTER TABLE `tbl_p_photo`
  ADD PRIMARY KEY (`pp_id`);

--
-- Index pour la table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_vente`
--
ALTER TABLE `tbl_vente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `table_cat`
--
ALTER TABLE `table_cat`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `table_client`
--
ALTER TABLE `table_client`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `table_panier`
--
ALTER TABLE `table_panier`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `table_pays`
--
ALTER TABLE `table_pays`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT pour la table `table_produit`
--
ALTER TABLE `table_produit`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `table_souhaite`
--
ALTER TABLE `table_souhaite`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `table_souscat`
--
ALTER TABLE `table_souscat`
  MODIFY `id_souscat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbl_demmande`
--
ALTER TABLE `tbl_demmande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_p_photo`
--
ALTER TABLE `tbl_p_photo`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_vente`
--
ALTER TABLE `tbl_vente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
