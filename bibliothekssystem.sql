-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 13. Dezember 2021 um 22:42
-- Server Version: 5.1.41
-- PHP-Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `bibliothekssystem`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `ANR` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  PRIMARY KEY (`ANR`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Daten für Tabelle `autor`
--

INSERT INTO `autor` (`ANR`, `name`) VALUES
(1, 'Ben Aaronovitch'),
(2, 'Atia Abawi'),
(3, 'Hamed Abdel-Samad'),
(4, 'Susanne Abel'),
(5, 'Emmy Abrahamson'),
(6, 'Sasha Abramsky'),
(7, 'Nico Abrell'),
(8, 'Ihsan Acar'),
(9, 'André Aciman'),
(10, 'R. T. (F.M.Reifenberg, Ch.Tielmann) Acron'),
(11, 'David Adam'),
(12, 'Marilee Adams'),
(13, 'Aravind Adiga'),
(14, 'Karoline Adler'),
(15, 'Wolfgang Adler'),
(16, 'Jussi Adler-Olsen'),
(17, 'Janine Adomeit'),
(18, 'Johanna Adorján'),
(19, 'Sevgi Agcagül'),
(20, 'Milena Agus'),
(21, 'Dr.-Ing. Hans-Jochen Bartsch'),
(22, 'Shakespeare'),
(23, 'Georg Büchner'),
(24, 'Daniel Brodbeck'),
(25, 'Joanne Kathleen Rowling'),
(26, 'Andreas Gramm'),
(37, 'Lothar Meyer'),
(36, 'Karlheinz Martin'),
(35, 'Hubert KÃ¶nig'),
(34, 'Wolfgang Kricke'),
(31, 'Wolfgang Pfeil'),
(32, 'Rolf Winter'),
(33, 'Willi WÃ¶rstenfeld'),
(38, 'Bardo Diehl'),
(39, 'Roger Erb'),
(40, 'Klaus Lindner'),
(41, 'Claus Schmalhofer'),
(42, 'Lutz-Helmut SchÃ¶n'),
(43, 'Peter Tillmanns'),
(44, 'Grehn Grehn'),
(45, 'Joachim Gom'),
(46, 'Joachim Krauseoletz'),
(47, ''),
(48, 'Wilfried Kuhn'),
(49, 'Josef Breitsameter'),
(50, 'Herbert Brosch'),
(51, 'Karola Niehoff'),
(52, 'Hans Holz'),
(53, 'Hans Bonnet'),
(54, 'Richard Herbert Wilkinson'),
(55, 'Stephan Lessenich'),
(56, 'Sebastian Fitzek');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buch`
--

CREATE TABLE IF NOT EXISTS `buch` (
  `ID` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `titel` text,
  `VNR` int(16) unsigned DEFAULT NULL,
  `jahr` int(4) DEFAULT NULL,
  `ort` char(30) DEFAULT NULL,
  `isbn` char(17) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Daten für Tabelle `buch`
--

INSERT INTO `buch` (`ID`, `titel`, `VNR`, `jahr`, `ort`, `isbn`) VALUES
(1, 'Taschenbuch Mathematischer Formeln', 1, 1990, 'Leipzig', '3-87144-774-9'),
(2, 'Romeo & Juliet', 2, 2008, 'Printed in China', '978-0-19-832166-8'),
(3, 'Woyzeck', 3, 2013, 'Ditzingen', '978-3-15-016101-2'),
(4, 'Entwicklung von außergewöhnlich aktiven, kooperativen Aluminium?Fluorid-basierten Lewis-Säure/Oniumsalz-Katalysatoren für die asymmetrische Carboxycyanierung von Aldehyden und Untersuchungen zu ihrer Anwendbarkeit in verwandten enantioselektiven Transformationen', 4, 2018, 'ortsnamehiereinfügen', '978-3843938433'),
(5, 'Das groÃŸe Tafelwerk interaktiv 2.0 Formelsammlung fÃ¼r die Sekundarstufen I und II', 5, 2019, 'Wemding', '978-3-06-001611-2'),
(6, 'Harry Potter und der Stein der Weisen', 6, 2005, 'England', '978-3551354013'),
(14, 'Macbeth', 8, 1606, 'England', '978-0-521-68098-1'),
(18, 'Physik Oberstufe', 5, 2008, 'Berlin', '978-3-06-013006-1'),
(19, 'Metzler Physik', 9, 2007, 'Braunschweig', '978-3-507-10710-6'),
(17, 'Das groÃŸe Tafelwerk interaktiv 2.0 Formelsammlung fÃ¼r die Sekundarstufen I und II', 5, 2019, 'Wemding', '978-3-06-001611-2'),
(20, 'Handbuch der experimentellen Physik. Sekundarstufe II. Ausbildung', 10, 1995, 'KÃ¶ln', ''),
(21, 'Lexikon der Ã¤gyptischen Religionsgeschichte', 11, 2000, 'Hamburg', '3-937872-08-6'),
(22, 'Die Welt der GÃ¶tter im Alten Ã„gypten: Glaube, Macht, Mythologie', 12, 2003, 'Stuttgart', '3-8062-1819-6'),
(23, 'Neben uns die Sintflut', 13, 2018, 'MÃ¼nchen', '9783492312691'),
(24, 'Das groÃŸe Tafelwerk interaktiv 2.0 Formelsammlung fÃ¼r die Sekundarstufen I und II', 14, 2012, 'Wemding', '978-3-507-10552-9'),
(25, 'Macbeth', 14, 1606, 'England', '3-944472-08-6'),
(26, 'Neben uns die Sintflut', 14, 2018, 'Hamburg', '3-937222-08-6'),
(27, 'Der Insasse', 15, 2018, '', '978-3-426-28153-6'),
(28, 'Flugangst 7A', 15, 2017, '', '978-3-426-19921-3'),
(29, ' Das Joshua-Profil', 16, 2016, '', '978-3-404-17501-7'),
(30, 'AchtNacht', 17, 2017, '', '978-3-426-52108-3'),
(31, 'Der Insasse', 18, 2020, '', '9783426281536'),
(32, 'Der Insasse', 19, 2020, '', '978-3-426-51944-8');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buchautor`
--

CREATE TABLE IF NOT EXISTS `buchautor` (
  `ANR` int(16) unsigned NOT NULL,
  `IDBUCH` int(16) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `buchautor`
--

INSERT INTO `buchautor` (`ANR`, `IDBUCH`) VALUES
(21, 1),
(22, 2),
(23, 3),
(24, 4),
(26, 5),
(25, 6),
(22, 14),
(26, 17),
(34, 17),
(35, 17),
(36, 17),
(37, 17),
(31, 17),
(32, 17),
(33, 17),
(38, 18),
(39, 18),
(40, 18),
(41, 18),
(42, 18),
(43, 18),
(32, 18),
(44, 19),
(45, 19),
(46, 19),
(47, 19),
(48, 20),
(49, 20),
(50, 20),
(51, 20),
(52, 20),
(53, 21),
(54, 22),
(55, 23),
(26, 24),
(34, 24),
(35, 24),
(36, 24),
(37, 24),
(31, 24),
(32, 24),
(33, 24),
(22, 25),
(55, 26),
(56, 27),
(56, 28),
(56, 29),
(56, 30),
(56, 31),
(56, 32);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buchgebiet`
--

CREATE TABLE IF NOT EXISTS `buchgebiet` (
  `SNR` int(16) unsigned NOT NULL,
  `IDBUCH` int(16) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `buchgebiet`
--

INSERT INTO `buchgebiet` (`SNR`, `IDBUCH`) VALUES
(1, 1),
(2, 1),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(3, 2),
(3, 14),
(9, 6),
(2, 5),
(1, 5),
(4, 3),
(3, 6),
(5, 4),
(1, 17),
(6, 17),
(7, 17),
(2, 17),
(5, 17),
(8, 17),
(2, 18),
(2, 19),
(2, 20),
(10, 21),
(11, 21),
(12, 21),
(13, 21),
(10, 22),
(11, 22),
(12, 22),
(13, 22),
(14, 22),
(15, 22),
(16, 23),
(1, 24),
(6, 24),
(7, 24),
(2, 24),
(5, 24),
(8, 24),
(3, 25),
(16, 26),
(17, 27),
(17, 28),
(18, 29),
(18, 30),
(17, 31),
(17, 32);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buchleser`
--

CREATE TABLE IF NOT EXISTS `buchleser` (
  `IDBUCH` int(16) unsigned NOT NULL,
  `IDLESER` int(16) unsigned NOT NULL,
  `von` date NOT NULL,
  `bis` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `buchleser`
--

INSERT INTO `buchleser` (`IDBUCH`, `IDLESER`, `von`, `bis`) VALUES
(4, 4, '2021-10-03', '2021-10-10'),
(2, 2, '2021-10-05', '2021-10-12'),
(3, 3, '2021-10-08', NULL),
(5, 5, '2021-10-09', '2021-10-16'),
(6, 6, '2021-10-11', '2021-10-17'),
(3, 7, '2021-06-14', '2021-08-11'),
(4, 5, '2021-10-25', '2021-10-31'),
(1, 3, '2019-08-07', NULL),
(6, 2, '2021-10-22', '2021-11-26'),
(2, 5, '2021-12-04', '2021-12-05'),
(19, 4, '2021-12-04', '2021-12-24');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `leser`
--

CREATE TABLE IF NOT EXISTS `leser` (
  `id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `vorname` char(25) NOT NULL,
  `name` char(25) NOT NULL,
  `geburtsdatum` date NOT NULL,
  `mail` char(100) DEFAULT NULL,
  `pwhash` char(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `mail_2` (`mail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Daten für Tabelle `leser`
--

INSERT INTO `leser` (`id`, `vorname`, `name`, `geburtsdatum`, `mail`, `pwhash`) VALUES
(1, 'admin', 'admin', '0000-00-00', 'admin@bibliothek.onmicrosoft.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(2, 'Hello', 'World', '1970-01-01', 'helloworld@bibliothek.onmicrosoft.com', 'a591a6d40bf420404a011733cfb7b190d62c65bf0bcda32b57b277d9ad9f146e'),
(3, 'Miguel', 'Mauer', '2003-06-14', 'mauemigu03@hildagymnasiumorg.onmicrosoft.com', '46ea99571befbe414536542a2a819736a6200f16641ed0b97182f7deb0f42e2c'),
(4, 'Andi', 'Macht', '1998-04-22', 'andimacht98@hildagymnasiumorg.onmicrosoft.com', 'ab02a1a0407a916b369672ffb08a741e9085ade554660aef823b7ad75e6e6697'),
(5, 'Farin', 'Urlaub', '2021-10-26', 'farinurlaub21@bibliothek.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(6, 'Klaus', 'Uhr', '2021-11-16', 'klausur@in.info.hildagymnasiumorg.onmicrosoft.com', '74bfc103a45633e7452f8e780e6d08795a5b8dd9a8ea011baa5a19bce1056c87'),
(7, 'André', 'Richtung', '2022-03-14', 'andreeerichtung@bibliothek.com', 'b3cddf7a103bb3a88721cb2c7d2b7cb8833b7a95d0a5dc00f3e28e02a99be5b7'),
(13, 'Third', 'Test', '2021-11-09', 'test@mail.com', 'd04b98f48e8f8bcc15c6ae5ac050801cd6dcfd428fb5f9e65c4e16e7807340fa'),
(14, 'Peter', 'Fischer', '1968-04-13', 'peterfischer@gmx.de', '026ad9b14a7453b7488daa0c6acbc258b1506f52c441c7c465474c1a564394ff'),
(15, 'Volker', 'Ackermann', '1968-12-02', 'volkerackermann@freenet.de', '6c035e5fd6cff34d541f92ad823ce32e86472ed2876f3f28e769d061709a6ab3'),
(16, 'Geb', 'Urtsdatum', '2021-05-29', 'neuertest@gmail.com', '32e5983d40117146b2c94707115b611195e54bcddcccbe8391b70b7848271104'),
(17, 'Alice', 'im Wunderland', '2003-01-01', 'im-wunderland@gmail.com', '2ae014213a683f5010767723279e66315d5fb350b50362327e8ddd24d011197f'),
(18, 'Niklas', 'Klein', '2003-04-24', 'nikkle@gmail.com', '078b64bca96426ae487f033e7a5b78925061971389ac660c1148479c4c73d790');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sachgebiet`
--

CREATE TABLE IF NOT EXISTS `sachgebiet` (
  `SNR` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(45) NOT NULL,
  PRIMARY KEY (`SNR`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Daten für Tabelle `sachgebiet`
--

INSERT INTO `sachgebiet` (`SNR`, `name`) VALUES
(1, 'Mathe'),
(2, 'Physik'),
(3, 'Englisch'),
(4, 'Deutsch'),
(5, 'Chemie'),
(6, 'Informatik'),
(7, 'Astronomie'),
(8, 'Biologie'),
(9, 'Fantasy Romane'),
(10, 'Ã„gypten'),
(11, 'Geschichte'),
(12, 'Religion'),
(13, 'Mythologie'),
(14, 'Glaube'),
(15, 'Macht'),
(16, 'Ã–konomie'),
(17, 'Psychothriller'),
(18, 'Thriller');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verlag`
--

CREATE TABLE IF NOT EXISTS `verlag` (
  `VNR` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(45) NOT NULL,
  PRIMARY KEY (`VNR`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Daten für Tabelle `verlag`
--

INSERT INTO `verlag` (`VNR`, `name`) VALUES
(1, 'Harri Deutsch Thun und Frankfurt/Main'),
(2, 'Oxford'),
(3, 'Reclam'),
(4, 'Dr. Hut Verlag'),
(5, 'Cornelsen'),
(6, 'Carlsen'),
(8, 'Cambridge University Press'),
(9, 'Bildungshaus'),
(10, 'Aulis Verlag in Friedrich Verlag'),
(11, 'Nikol'),
(12, 'Theiss'),
(13, 'Piper'),
(14, 'Anders Verlag'),
(15, 'Droemer Knaur Verlag'),
(16, 'LÃ¼bbe'),
(17, 'Knaur'),
(18, 'Droemer HC'),
(19, 'Knaur Taschenbuch');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
