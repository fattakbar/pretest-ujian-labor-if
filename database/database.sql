-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 25, 2020 at 11:25 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_apotik_surya`
--

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kdobat` varchar(50) NOT NULL,
  `nmobat` varchar(50) NOT NULL,
  `jnsobat` varchar(50) NOT NULL,
  `hrgobat` double NOT NULL,
  `stokobat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kdobat`, `nmobat`, `jnsobat`, `hrgobat`, `stokobat`) VALUES
('OBT001', 'Irbesertan 150 mg', 'Obat Ringan', 2500, 100),
('OBT002', 'Bisoprolol 5 Mg', 'Obat Sedang', 3300, 100),
('OBT003', 'Azithromycin 500 Mg', 'Obat Keras', 12000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtrans` varchar(50) NOT NULL,
  `tgltrans` datetime NOT NULL,
  `kdobat` varchar(50) NOT NULL,
  `jmlbeli` int(11) NOT NULL,
  `total` double NOT NULL,
  `diskon` double NOT NULL,
  `totalbayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtrans`, `tgltrans`, `kdobat`, `jmlbeli`, `total`, `diskon`, `totalbayar`) VALUES
('T001', '2020-01-25 00:00:00', 'OBT002', 2, 6600, 990, 5610),
('T002', '2020-01-25 00:00:00', 'OBT003', 26, 312000, 62400, 249600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kdobat`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtrans`),
  ADD KEY `kdobat` (`kdobat`);
