-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 01/09/2020 às 23:35
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
-- Estrutura para tabela `album`
--

CREATE TABLE `album` (
  `cod_album` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `cod_estilo` int(11) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `url_capa` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `album`
--

INSERT INTO `album` (`cod_album`, `titulo`, `cod_estilo`, `subtitulo`, `url_capa`) VALUES
(1, 'Jorge Aragão', 0, 'Ao Vivo Convida', 'https://img.discogs.com/slIb4YhjLbyIlqTyz3gQhUwKXds=/fit-in/600x599/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-11120821-1510235036-7058.jpeg.jpg'),
(2, 'Adoniran Barbosa', 0, 'Especial', 'https://livreopiniaoportal.files.wordpress.com/2014/04/adoniranbarbosa.jpg'),
(3, 'Belo', 2, 'Ao Vivo (2001)', 'https://www.vagalume.com.br/belo/discografia/belo-ao-vivo.jpg'),
(4, 'Titãs', 1, 'Ao Vivo MTV', 'https://upload.wikimedia.org/wikipedia/pt/1/1d/Acustico_tit%C3%A3s.jpg');

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
(2, 'Pagode'),
(3, 'MPB');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`cod_album`),
  ADD UNIQUE KEY `unique_titulo_subtitulo` (`titulo`,`subtitulo`),
  ADD KEY `fk_estilo` (`cod_estilo`);

--
-- Índices de tabela `estilo`
--
ALTER TABLE `estilo`
  ADD PRIMARY KEY (`cod_estilo`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `album`
--
ALTER TABLE `album`
  MODIFY `cod_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `estilo`
--
ALTER TABLE `estilo`
  MODIFY `cod_estilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_estilo` FOREIGN KEY (`cod_estilo`) REFERENCES `estilo` (`cod_estilo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
