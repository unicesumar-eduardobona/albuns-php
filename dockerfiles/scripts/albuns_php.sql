-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Versão do servidor: 10.4.12-MariaDB-1:10.4.12+maria~bionic
-- Versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `albuns_php`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `estilo`
--

CREATE TABLE `estilo` (
  `cod_estilo` int(11) NOT NULL,
  `estilo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `estilo`
--

INSERT INTO `estilo` (`cod_estilo`, `estilo`) VALUES
(0, 'Samba'),
(1, 'Rock'),
(2, 'Pagode');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `estilo`
--
ALTER TABLE `estilo`
  ADD PRIMARY KEY (`cod_estilo`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `estilo`
--
ALTER TABLE `estilo`
  MODIFY `cod_estilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
