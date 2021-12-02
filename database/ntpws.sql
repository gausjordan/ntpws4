-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 06:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntpws`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `summary` varchar(1023) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci DEFAULT NULL,
  `full_text` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `published` date NOT NULL DEFAULT current_timestamp(),
  `source` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT NULL,
  `image3` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT NULL,
  `approved` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `summary`, `full_text`, `author_id`, `published`, `source`, `image1`, `image2`, `image3`, `approved`) VALUES
(69, 'Latest blue label picks on sale', 'Hide your children! ...\'Cuz pick market\'s gonna go down big', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed est urna, suscipit sit amet diam id, hendrerit rutrum purus. Proin sed sem iaculis, aliquet neque nec, aliquet magna. Nullam laoreet odio ut leo iaculis consequat ut quis sem. Proin pharetra blandit mattis. In nec iaculis massa. Praesent non quam vitae arcu dictum dictum quis ultricies felis. Duis ornare volutpat nisl vitae porttitor. Etiam metus nibh, rutrum ac quam quis, pharetra ullamcorper nulla. Nullam a finibus lacus. Nam accumsan cursus tellus eu facilisis. Phasellus vulputate dignissim eros vitae consectetur. Praesent viverra lorem nibh, sit amet ullamcorper ex luctus vitae. Curabitur convallis, dolor in laoreet rhoncus, arcu mi rutrum quam, vel blandit erat nulla nec metus.</p>\r\n\r\n<p>Proin auctor lacinia convallis. Mauris sapien est, rutrum sit amet tortor in, dignissim porttitor mi. Nullam ullamcorper pretium posuere. In vestibulum lectus eu erat egestas vulputate. Ut diam tellus, ultrices fermentum neque vitae, fringilla luctus nisi. Fusce mattis urna quis massa pellentesque hendrerit. Suspendisse vestibulum bibendum varius. Curabitur eu imperdiet urna, eu eleifend metus. Fusce at molestie nisi. Fusce venenatis purus sit amet leo sollicitudin ultricies.</p>\r\n\r\n<p>Duis molestie vehicula efficitur. Sed imperdiet dolor eu mollis porta. Proin nunc nunc, lacinia consectetur ipsum in, aliquet mollis ante. Nulla lorem arcu, egestas interdum ipsum ac, faucibus vulputate augue. Vestibulum pellentesque, felis eget vehicula aliquet, erat ex consequat magna, vel condimentum libero lectus lacinia mauris. Maecenas leo felis, rutrum ac bibendum vel, condimentum at orci. Nulla a auctor turpis. Mauris quis venenatis arcu, a tincidunt arcu. In imperdiet arcu iaculis urna aliquet, et aliquet nisl iaculis. Suspendisse pellentesque blandit augue in suscipit. </p>', 7, '2021-11-30', 'toothpickbonanza.de', 'plava_kutijica.jpg', 'plava-kutija-kartonska.jpg', '', 'Y'),
(71, 'Women love toothpicks more than words', 'A recent study conducted by Ywao Q\'Piong school of arts and crafts confirms what we\'ve all been worried about.', '<p>Proin auctor lacinia convallis. Mauris sapien est, rutrum sit amet tortor in, dignissim porttitor mi. Nullam ullamcorper pretium posuere. In vestibulum lectus eu erat egestas vulputate. Ut diam tellus, ultrices fermentum neque vitae, fringilla luctus nisi. Fusce mattis urna quis massa pellentesque hendrerit. Suspendisse vestibulum bibendum varius. Curabitur eu imperdiet urna, eu eleifend metus. Fusce at molestie nisi. Fusce venenatis purus sit amet leo sollicitudin ultricies.</p>\r\n\r\n<p>Duis molestie vehicula efficitur. Sed imperdiet dolor eu mollis porta. Proin nunc nunc, lacinia consectetur ipsum in, aliquet mollis ante. Nulla lorem arcu, egestas interdum ipsum ac, faucibus vulputate augue. Vestibulum pellentesque, felis eget vehicula aliquet, erat ex consequat magna, vel condimentum libero lectus lacinia mauris. Maecenas leo felis, rutrum ac bibendum vel, condimentum at orci. Nulla a auctor turpis. Mauris quis venenatis arcu, a tincidunt arcu. In imperdiet arcu iaculis urna aliquet, et aliquet nisl iaculis. Suspendisse pellentesque blandit augue in suscipit. </p>\r\n\r\n<p>Duis molestie vehicula efficitur. Sed imperdiet dolor eu mollis porta. Proin nunc nunc, lacinia consectetur ipsum in, aliquet mollis ante. Nulla lorem arcu, egestas interdum ipsum ac, faucibus vulputate augue. Vestibulum pellentesque, felis eget vehicula aliquet, erat ex consequat magna, vel condimentum libero lectus lacinia mauris. Maecenas leo felis, rutrum ac bibendum vel, condimentum at orci. Nulla a auctor turpis. Mauris quis venenatis arcu, a tincidunt arcu. In imperdiet arcu iaculis urna aliquet, et aliquet nisl iaculis. Suspendisse pellentesque blandit augue in suscipit. </p>', 7, '2021-11-30', 'funkpicks.rs', 'zena-s-cackalicom.jpg', 'kaos.jpg', '', 'Y'),
(72, 'Highschool chemistry - toothpics to the rescue', 'Bohr model appears to be a undying educational phenomena. And our premium toothpicks are here to lend a hand.', '<p>Duis molestie vehicula efficitur. Sed imperdiet dolor eu mollis porta. Proin nunc nunc, lacinia consectetur ipsum in, aliquet mollis ante. Nulla lorem arcu, egestas interdum ipsum ac, faucibus vulputate augue. Vestibulum pellentesque, felis eget vehicula aliquet, erat ex consequat magna, vel condimentum libero lectus lacinia mauris. Maecenas leo felis, rutrum ac bibendum vel, condimentum at orci. Nulla a auctor turpis. Mauris quis venenatis arcu, a tincidunt arcu. In imperdiet arcu iaculis urna aliquet, et aliquet nisl iaculis. Suspendisse pellentesque blandit augue in suscipit. </p>\r\n\r\n<p>Duis molestie vehicula efficitur. Sed imperdiet dolor eu mollis porta. Proin nunc nunc, lacinia consectetur ipsum in, aliquet mollis ante. Nulla lorem arcu, egestas interdum ipsum ac, faucibus vulputate augue. Vestibulum pellentesque, felis eget vehicula aliquet, erat ex consequat magna, vel condimentum libero lectus lacinia mauris. Maecenas leo felis, rutrum ac bibendum vel, condimentum at orci. Nulla a auctor turpis. Mauris quis venenatis arcu, a tincidunt arcu. In imperdiet arcu iaculis urna aliquet, et aliquet nisl iaculis. Suspendisse pellentesque blandit augue in suscipit. </p>\r\n\r\n<p>Sed auctor efficitur mi. Ut nulla purus, lacinia nec diam ac, ultricies porttitor enim. Pellentesque sollicitudin id libero eu molestie. Phasellus orci justo, feugiat sed pellentesque et, finibus non eros. Pellentesque ut turpis ut tellus aliquam gravida at ut odio. In vestibulum mi eget purus lacinia aliquet. Nunc congue ut magna eu finibus. Phasellus viverra finibus nisl ut faucibus. Proin in diam posuere, suscipit diam et, porta dui. Sed sollicitudin cursus eleifend. Mauris id lorem massa. Nulla facilisi. Duis diam mauris, sodales sed ullamcorper sed, egestas et justo. Duis sed suscipit felis. Suspendisse et est augue. Integer ut ex consectetur, lobortis turpis eget, feugiat dui. Phasellus in ipsum eu nulla viverra suscipit. Vestibulum eu nisl tempus, pharetra est in, venenatis enim. Cras egestas et ipsum a bibendum.</p>', 7, '2021-11-30', 'www.toothpick.edu/~krichards', 's-kuglicama.jpg', 'bizarne.jpg', 'piramida.jpg', 'Y'),
(74, 'Unpublished article', 'It\'s all about reusable toothpicks again, by now.one shouldn\'t find that surprising', '<p>Vestibulum nec ullamcorper orci. Quisque vel pulvinar mauris. Duis mattis ullamcorper lorem id ultrices. Aliquam eu dolor cursus, volutpat elit et, pretium justo. Nulla viverra diam et libero mattis, sed tempus velit vulputate. Curabitur enim mauris, finibus sed mi ut, dictum tempus velit. Quisque et pretium leo, non varius nunc. Nunc dignissim mi enim, sed vestibulum elit porttitor ac. Phasellus tincidunt, nisi non imperdiet laoreet, elit sem rutrum libero, sit amet maximus nunc diam et magna.</p>\r\n\r\n<p>Quisque eleifend volutpat arcu id elementum. Pellentesque bibendum justo a venenatis sollicitudin. Nullam malesuada porta dapibus. Aliquam pretium fringilla enim, quis malesuada nisl placerat dignissim. Vestibulum fringilla maximus urna, nec placerat lacus malesuada vitae. Vivamus aliquet iaculis turpis sit amet pellentesque. Pellentesque et felis rhoncus metus facilisis imperdiet. Donec tincidunt tellus et lacus vestibulum sollicitudin. Suspendisse potenti. Donec molestie urna quis faucibus tristique. Aenean eu tellus quis magna porta porttitor.</p>\r\n\r\n<p>Mauris nisi nunc, mollis et tellus nec, laoreet mattis arcu. Donec volutpat, turpis vitae volutpat elementum, nunc orci rhoncus mi, in gravida metus tortor quis massa. Fusce consequat ipsum vel urna cursus dapibus. Donec eget semper sapien, nec porttitor arcu. Cras finibus vestibulum ex, mollis iaculis ex laoreet eu. Curabitur scelerisque nisi nisi, quis scelerisque tellus aliquet ac. Pellentesque at odio ut justo efficitur ultricies. Mauris auctor et magna ut condimentum. Curabitur semper rhoncus libero eget semper. Mauris nec luctus mi, sit amet eleifend urna. Curabitur pharetra feugiat rhoncus. Aliquam erat volutpat. Fusce id nibh vitae eros fermentum sagittis. Nunc in orci sed ex fringilla aliquet venenatis sit amet odio.</p>', 7, '2021-11-30', 'www.bug.hr', 'zuta-kutija.jpg', '', '', 'N'),
(75, 'Another unpublished article', 'Only Editors and Admins can see this', '<p>Duis turpis ex, vulputate eu metus eget, viverra hendrerit eros. Duis egestas pulvinar velit, nec congue lectus porttitor vitae. Nulla elit magna, imperdiet in tristique ac, sodales eget urna. Integer a consequat quam. Nunc tristique laoreet neque eu euismod. Duis sagittis molestie eleifend. Sed sagittis elit eget condimentum pellentesque. Vivamus feugiat ligula sem. Nunc in volutpat ex, vel fermentum diam. Aenean consequat eleifend felis, quis porttitor ex euismod lobortis. In at cursus magna, eget facilisis nisl. Quisque accumsan, urna eget interdum lobortis, nunc nulla eleifend diam, sed aliquet lacus arcu sit amet tellus. Quisque odio odio, ultrices et ultricies sit amet, eleifend nec lorem. Nunc egestas felis dui, nec accumsan mauris gravida quis. Cras ac felis vel lectus pharetra cursus. Donec luctus ornare quam, gravida rhoncus nulla aliquet in.</p>\r\n\r\n<p>Donec volutpat ex at sem mollis, at pulvinar dolor hendrerit. Vestibulum laoreet quam ultricies, finibus neque et, laoreet arcu. Aliquam pharetra accumsan lacus. Suspendisse potenti. Suspendisse rhoncus feugiat arcu, vitae volutpat sapien aliquet et. Nulla tempor eget nisl non mollis. Maecenas efficitur, lacus luctus fermentum ultricies, elit urna varius tellus, nec tincidunt enim justo vel magna. Etiam vitae consectetur erat. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis venenatis auctor scelerisque. Integer ultrices urna at tincidunt ornare. Maecenas sem sem, condimentum non arcu ac, tincidunt semper turpis.</p>', 7, '2021-11-30', 'Blagonga™ Anime Forum', 'crveni-cilindar.jpg', '', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateofbirth` date NOT NULL,
  `country` char(2) NOT NULL,
  `addrstreet` varchar(127) NOT NULL,
  `addrnumber` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `role` tinyint(1) UNSIGNED NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `dateofbirth`, `country`, `addrstreet`, `addrnumber`, `date`, `archive`, `role`) VALUES
(5, 'Adalbert', 'Marković', 'user1@test.dong', 'user', '$2y$12$pJSNfavjhlNJAIC8lNNdfefmmp7NNZBfMgJi5sI6aU/mCrugfk0vi', '2012-12-12', 'HR', 'Ulica', 3, '2021-12-02 02:11:46', 'N', 3),
(6, 'Alfi', 'Kabiljo', 'alfi@kabiljo.ru', 'editor', '$2y$12$Csmp1JBp/FQuTkWKmrAqVO9X7CtQJD.yz0dX6DWUDLlSqNiP78e.O', '1942-12-12', 'FI', 'Cesta', 42, '2021-11-25 01:37:48', 'N', 2),
(7, 'Blagoje', 'Bersa', 'blago.je@bersa.hr', 'admin', '$2y$12$hMBqJWmDzM1KQv3wG6nBt.g99wIQpYN9L.19Yfb.HEYxUau0AtKVG', '2012-12-12', 'GA', 'Magistrala', 4, '2021-12-02 02:15:33', 'N', 1),
(8, 'Dora', 'Pejačević', 'novi@neaktivirani.user', 'novi', '$2y$12$vkC9PEV1et/m28fTgyR7EeY7piTKgQCRptLtQ47IS8q3nG8mSMZae', '2012-12-12', 'LA', 'Autobahn', 6, '2021-11-25 02:45:57', 'Y', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
