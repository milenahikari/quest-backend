-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 03-Ago-2019 às 21:50
-- Versão do servidor: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uaufi_hotspot`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

-- CREATE TABLE `estados` (
--   `cod_estados` int(11) NOT NULL,
--   `sigla` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
--   `nome` varchar(72) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `states` (`id`, `federated_unit`, `name`) VALUES
(0, '00', 'VAZIO'),
(1, 'AC', 'ACRE'),
(2, 'AL', 'ALAGOAS'),
(3, 'AP', 'AMAPÁ'),
(4, 'AM', 'AMAZONAS'),
(5, 'BA', 'BAHIA'),
(6, 'CE', 'CEARÁ'),
(7, 'DF', 'DISTRITO FEDERAL'),
(8, 'ES', 'ESPÍRITO SANTO'),
(9, 'RR', 'RORAIMA'),
(10, 'GO', 'GOIÁS'),
(11, 'MA', 'MARANHÃO'),
(12, 'MT', 'MATO GROSSO'),
(13, 'MS', 'MATO GROSSO DO SUL'),
(14, 'MG', 'MINAS GERAIS'),
(15, 'PA', 'PARÁ'),
(16, 'PB', 'PARAÍBA'),
(17, 'PR', 'PARANÁ'),
(18, 'PE', 'PERNAMBUCO'),
(19, 'PI', 'PIAUÍ'),
(20, 'RJ', 'RIO DE JANEIRO'),
(21, 'RN', 'RIO GRANDE DO NORTE'),
(22, 'RS', 'RIO GRANDE DO SUL'),
(23, 'RO', 'RONDÔNIA'),
(24, 'TO', 'TOCANTINS'),
(25, 'SC', 'SANTA CATARINA'),
(26, 'SP', 'SÃO PAULO'),
(27, 'SE', 'SERGIPE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estados`
--
-- ALTER TABLE `states`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estados`
--
-- ALTER TABLE `states`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
