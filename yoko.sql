-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Jul-2021 às 02:32
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoko`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbyocopayment`
--

CREATE TABLE `tbyocopayment` (
  `yid` int(11) NOT NULL,
  `status` text NOT NULL,
  `token` varchar(200) NOT NULL,
  `idpayment` text NOT NULL,
  `chargeId` text NOT NULL,
  `amountInCents` double NOT NULL,
  `resultado` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbyocopayment`
--

INSERT INTO `tbyocopayment` (`yid`, `status`, `token`, `idpayment`, `chargeId`, `amountInCents`, `resultado`, `data`) VALUES
(1, 'successful', 'tok_vmvDQuMR8QyZKqCNeKSEbUX54', 'ch_4aLdioqOAj3Y6F8MRimd8f2wM', 'ch_4aLdioqOAj3Y6F8MRimd8f2wM', 2000, 'charge', '2021-07-04 01:45:34'),
(4, 'successful', 'tok_L2b0LCyDrQvLXqSG0RFXRT0ng', 'ch_m4D2tL28ZbGQOILdXTzgDFOYV', 'ch_m4D2tL28ZbGQOILdXTzgDFOYV', 1500, 'charge', '2021-07-04 01:54:51'),
(6, 'successful', 'tok_dROD5U46ZWDy5zToQQIZNoCQV0', 'ch_Z1KJcWDQV9VjOSLGVFABztaG8', 'ch_Z1KJcWDQV9VjOSLGVFABztaG8', 2100, 'charge', '2021-07-04 02:01:00'),
(7, 'successful', 'tok_zOvkLsoqG6DV9WCM7Zt851HNZJ', 'ch_qVyDUE4aZxr60tGlkFmM3F5Lx', 'ch_qVyDUE4aZxr60tGlkFmM3F5Lx', 600, 'charge', '2021-07-04 02:02:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbyocopayment`
--
ALTER TABLE `tbyocopayment`
  ADD PRIMARY KEY (`yid`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbyocopayment`
--
ALTER TABLE `tbyocopayment`
  MODIFY `yid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
