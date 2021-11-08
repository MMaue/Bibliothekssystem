-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 08. November 2021 um 22:48
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
  `ANR` char(3) NOT NULL,
  `name` char(50) NOT NULL,
  `geburtsdatum` date DEFAULT NULL,
  PRIMARY KEY (`ANR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `autor`
--

INSERT INTO `autor` (`ANR`, `name`, `geburtsdatum`) VALUES
('BAV', 'Ben Aaronovitch', NULL),
('ATA', 'Atia Abawi', NULL),
('HAS', 'Hamed Abdel-Samad', NULL),
('SUA', 'Susanne Abel', NULL),
('EMA', 'Emmy Abrahamson', NULL),
('SAA', 'Sasha Abramsky', NULL),
('NIA', 'Nico Abrell', NULL),
('IHA', 'Ihsan Acar', NULL),
('ADA', 'André Aciman', NULL),
('RTF', 'R. T. (F.M.Reifenberg, Ch.Tielmann) Acron', NULL),
('DAA', 'David Adam', NULL),
('MAA', 'Marilee Adams', NULL),
('ARA', 'Aravind Adiga', NULL),
('KLA', 'Karoline Adler', NULL),
('WOA', 'Wolfgang Adler', NULL),
('JAO', 'Jussi Adler-Olsen', NULL),
('JAA', 'Janine Adomeit', NULL),
('JOA', 'Johanna Adorján', NULL),
('SEA', 'Sevgi Agcagül', NULL),
('MIA', 'Milena Agus', NULL),
('DIH', 'Dr.-Ing. Hans-Jochen Bartsch', NULL),
('SHA', 'Shakespeare', NULL),
('GEB', 'Georg Büchner', NULL),
('DAB', 'Daniel Brodbeck', NULL),
('JKR', 'Joanne Kathleen Rowling', '1965-07-31');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buch`
--

CREATE TABLE IF NOT EXISTS `buch` (
  `ID` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `ANR` char(3) DEFAULT NULL,
  `titel` text,
  `VNR` char(3) DEFAULT NULL,
  `jahr` int(4) DEFAULT NULL,
  `ort` char(30) DEFAULT NULL,
  `isbn` char(17) DEFAULT NULL,
  `sachgebiet` char(25) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `buch`
--

INSERT INTO `buch` (`ID`, `ANR`, `titel`, `VNR`, `jahr`, `ort`, `isbn`, `sachgebiet`) VALUES
(1, 'DIH', 'Taschenbuch Mathematischer Formeln', 'HDT', 1990, 'Leipzig', '3-87144-774-9', 'Mathe'),
(2, 'SHA', 'Romeo & Juliet', 'OXF', 2008, 'Printed in China', '978-0-19-832166-8', 'Englisch'),
(3, 'GEB', 'Woyzeck', 'REC', 2013, 'Ditzingen', '978-3-15-016101-2', 'Deutsch'),
(4, 'DAB', 'Entwicklung von außergewöhnlich aktiven, kooperativen Aluminium?Fluorid-basierten Lewis-Säure/Oniumsalz-Katalysatoren für die asymmetrische Carboxycyanierung von Aldehyden und Untersuchungen zu ihrer Anwendbarkeit in verwandten enantioselektiven Transformationen', 'DHV', 2018, 'ortsnamehiereinfügen', '978-3843938433', 'Wissenschaft'),
(5, NULL, 'Das große Tafelwerk interaktiv 2.0\r\nFormelsammlung für die Sekundarstufen I und II', 'COR', 2019, 'Wemding', '978-3-06-001611-2', 'Intersachgebietal'),
(6, 'JKR', 'Harry Potter and the Philosopher''s Stone', 'CAR', 2005, NULL, '978-3551354013', 'Fantasy-Romane');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buchleser`
--

CREATE TABLE IF NOT EXISTS `buchleser` (
  `idbuch` int(16) unsigned NOT NULL,
  `idleser` int(16) unsigned NOT NULL,
  `von` date NOT NULL,
  `bis` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `buchleser`
--

INSERT INTO `buchleser` (`idbuch`, `idleser`, `von`, `bis`) VALUES
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
  `pwhash` char(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
(8, 'miguelmmm', 'name', '2003-06-14', 'mail@gmail.com', 0, 'mypass'),
(9, 'mmm', 'name', '2003-06-14', 'mail@gmail.com', 0, 'mmm'),
(10, 'signupp', 'name', '2003-06-14', 'mail@gmail.com', 0, 'wswd'),
(11, 'signupp', 'name', '2003-06-14', 'mail@gmail.com', 0, 'rpp');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verlag`
--

CREATE TABLE IF NOT EXISTS `verlag` (
  `VNR` char(3) NOT NULL,
  `name` char(45) NOT NULL,
  PRIMARY KEY (`VNR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `verlag`
--

INSERT INTO `verlag` (`VNR`, `name`) VALUES
('HDT', 'Harri Deutsch Thun und Frankfurt/Main'),
('OXF', 'Oxford'),
('REC', 'Reclam'),
('DHV', 'Dr. Hut Verlag'),
('COR', 'Cornelsen'),
('CAR', 'Carlsen');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
