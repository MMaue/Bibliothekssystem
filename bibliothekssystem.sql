-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 21. November 2021 um 21:31
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

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
(33, 'Willi WÃ¶rstenfeld');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Daten für Tabelle `buch`
--

INSERT INTO `buch` (`ID`, `titel`, `VNR`, `jahr`, `ort`, `isbn`) VALUES
(1, 'Taschenbuch Mathematischer Formeln', 1, 1990, 'Leipzig', '3-87144-774-9'),
(2, 'Romeo & Juliet', 2, 2008, 'Printed in China', '978-0-19-832166-8'),
(3, 'Woyzeck', 3, 2013, 'Ditzingen', '978-3-15-016101-2'),
(4, 'Entwicklung von außergewöhnlich aktiven, kooperativen Aluminium?Fluorid-basierten Lewis-Säure/Oniumsalz-Katalysatoren für die asymmetrische Carboxycyanierung von Aldehyden und Untersuchungen zu ihrer Anwendbarkeit in verwandten enantioselektiven Transformationen', 4, 2018, 'ortsnamehiereinfügen', '978-3843938433'),
(5, 'Das große Tafelwerk interaktiv 2.0\r\nFormelsammlung für die Sekundarstufen I und II', 5, 2019, 'Wemding', '978-3-06-001611-2'),
(6, 'Harry Potter and the Philosopher''s Stone', 6, 2005, NULL, '978-3551354013'),
(14, 'Macbeth', 8, 1606, 'England', '978-0-521-68098-1'),
(17, 'Das groÃŸe Tafelwerk interaktiv 2.0 Formelsammlung fÃ¼r die Sekundarstufen I und II', 5, 2019, 'Wemding', '978-3-06-001611-2');

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
(33, 17);

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
(8, 17);

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
(6, 2, '2021-10-22', '2021-11-26');

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
  `mahnungen` int(2) DEFAULT NULL,
  `pwhash` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Daten für Tabelle `leser`
--

INSERT INTO `leser` (`id`, `vorname`, `name`, `geburtsdatum`, `mail`, `mahnungen`, `pwhash`) VALUES
(1, 'admin', 'admin', '0000-00-00', 'admin@bibliothek.onmicrosoft.com', NULL, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(2, 'Hello', 'World', '1970-01-01', 'helloworld@bibliothek.onmicrosoft.com', NULL, 'a591a6d40bf420404a011733cfb7b190d62c65bf0bcda32b57b277d9ad9f146e'),
(3, 'Miguel', 'Mauer', '2003-06-14', 'mauemigu03@hildagymnasiumorg.onmicrosoft.com', NULL, '46ea99571befbe414536542a2a819736a6200f16641ed0b97182f7deb0f42e2c'),
(4, 'Andi', 'Macht', '1998-04-22', 'andimacht98@hildagymnasiumorg.onmicrosoft.com', NULL, 'ab02a1a0407a916b369672ffb08a741e9085ade554660aef823b7ad75e6e6697'),
(5, 'Farin', 'Urlaub', '2021-10-26', 'farinurlaub21@bibliothek.com', NULL, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(6, 'Klaus', 'Uhr', '2021-11-16', 'klausur@in.info.hildagymnasiumorg.onmicrosoft.com', NULL, '74bfc103a45633e7452f8e780e6d08795a5b8dd9a8ea011baa5a19bce1056c87'),
(7, 'André', 'Richtung', '2022-03-14', 'andreeerichtung@bibliothek.com', NULL, 'b3cddf7a103bb3a88721cb2c7d2b7cb8833b7a95d0a5dc00f3e28e02a99be5b7'),
(13, 'Third', 'Test', '2021-11-09', 'test@mail.com', NULL, 'd04b98f48e8f8bcc15c6ae5ac050801cd6dcfd428fb5f9e65c4e16e7807340fa'),
(14, 'Peter', 'Fischer', '1968-04-13', 'peterfischer@gmx.de', NULL, '026ad9b14a7453b7488daa0c6acbc258b1506f52c441c7c465474c1a564394ff'),
(15, 'Volker', 'Ackermann', '1968-12-02', 'volkerackermann@freenet.de', NULL, '6c035e5fd6cff34d541f92ad823ce32e86472ed2876f3f28e769d061709a6ab3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sachgebiet`
--

CREATE TABLE IF NOT EXISTS `sachgebiet` (
  `SNR` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(45) NOT NULL,
  PRIMARY KEY (`SNR`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(9, 'Fantasy Romane');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verlag`
--

CREATE TABLE IF NOT EXISTS `verlag` (
  `VNR` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(45) NOT NULL,
  PRIMARY KEY (`VNR`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
(8, 'Cambridge University Press');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
