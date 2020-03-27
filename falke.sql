-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Mrz 2020 um 15:51
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `falke`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aufnahmen`
--

CREATE TABLE `aufnahmen` (
  `f60` varchar(20) NOT NULL,
  `f61` varchar(20) NOT NULL,
  `f62` varchar(20) NOT NULL,
  `f64` varchar(20) NOT NULL,
  `f100` text NOT NULL,
  `f104` text NOT NULL,
  `f108` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `aufnahmen`
--

INSERT INTO `aufnahmen` (`f60`, `f61`, `f62`, `f64`, `f100`, `f104`, `f108`) VALUES
('txt', 'n', 'nc', '', 'Descombes, Vincent', 'Schwartz, Stephan Adam', ''),
('txt', 'n', 'nc', '', 'Descombes, Vincent', 'Schwartz, Stephan Adam', ''),
('txt', 'n', 'nc', '', 'Baumeister, Bob', 'Berben, Iris', 'Gantert, Klaus');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
