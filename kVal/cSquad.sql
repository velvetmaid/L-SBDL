-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Des 2022 pada 11.17
-- Versi server: 8.0.31-0ubuntu0.22.04.1
-- Versi PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careCare`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cSquad`
--

CREATE TABLE `cSquad` (
  `characterName` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `ability` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `cSquad`
--

INSERT INTO `cSquad` (`characterName`, `species`, `position`, `ability`) VALUES
('EQUatioN Jerks', 'Greedy', 'Borderline', 'Equation Behaviour, Manipulative');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cSquad`
--
ALTER TABLE `cSquad`
  ADD PRIMARY KEY (`characterName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
