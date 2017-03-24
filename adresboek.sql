-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 mrt 2017 om 15:45
-- Serverversie: 10.1.19-MariaDB
-- PHP-versie: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adresboek`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `adresboek`
--

CREATE TABLE `adresboek` (
  `ID` int(11) NOT NULL,
  `Voornaam` varchar(20) NOT NULL,
  `Tussenvoegsel` varchar(15) NOT NULL,
  `Achternaam` varchar(25) NOT NULL,
  `Woonplaats` varchar(50) NOT NULL,
  `Straatnaam` varchar(50) NOT NULL,
  `Huisnummer` int(11) NOT NULL,
  `HSN_Toevoeging` varchar(10) NOT NULL,
  `Postcode` varchar(7) NOT NULL,
  `Telefoonnummer` varchar(20) NOT NULL,
  `Telefoonnummer_opt.` varchar(15) NOT NULL,
  `E-mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `adresboek`
--
ALTER TABLE `adresboek`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `adresboek`
--
ALTER TABLE `adresboek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
