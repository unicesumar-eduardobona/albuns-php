-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 07/04/2021 às 00:55
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
(1, 'Jorge Aragão', 4, 'Ao Vivo Convida', 'https://img.discogs.com/slIb4YhjLbyIlqTyz3gQhUwKXds=/fit-in/600x599/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-11120821-1510235036-7058.jpeg.jpg'),
(2, 'Adoniran Barbosa', 4, 'Especial', 'https://livreopiniaoportal.files.wordpress.com/2014/04/adoniranbarbosa.jpg'),
(3, 'Belo', 2, 'Ao Vivo (2001)', 'https://www.vagalume.com.br/belo/discografia/belo-ao-vivo.jpg'),
(4, 'Titãs', 1, 'Ao Vivo MTV', 'https://upload.wikimedia.org/wikipedia/pt/1/1d/Acustico_tit%C3%A3s.jpg'),
(5, 'Renato Russo', 1, 'Presente', 'http://renatorusso.com.br/wp-content/uploads/2016/03/presente.jpg');

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
(1, 'Rock'),
(2, 'Pagode'),
(3, 'MPB'),
(4, 'Samba');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estrela`
--

CREATE TABLE `estrela` (
  `cod_usuario` int(11) NOT NULL,
  `cod_musica` int(11) NOT NULL,
  `voto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `estrela`
--

INSERT INTO `estrela` (`cod_usuario`, `cod_musica`, `voto`) VALUES
(2, 1, 1),
(2, 2, 4),
(2, 6, 3),
(2, 7, 4),
(2, 9, 3),
(2, 10, 4),
(2, 11, 2),
(2, 12, 2),
(2, 13, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `musica`
--

CREATE TABLE `musica` (
  `cod_musica` int(11) NOT NULL,
  `cod_album` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `musica`
--

INSERT INTO `musica` (`cod_musica`, `cod_album`, `titulo`) VALUES
(1, 2, 'Saudosa Maloca'),
(2, 2, 'Samba do Ernesto'),
(3, 2, 'Trem das Onze'),
(4, 2, 'Tiro ao Álvaro'),
(5, 1, 'Moleque Atrevido'),
(6, 1, 'Malandro'),
(7, 1, 'Falsa Consideração'),
(8, 1, 'Coisinha tão bonitinha'),
(9, 3, 'Ser Feliz De Novo'),
(10, 3, 'Resumo de Facilidade'),
(11, 3, 'Um dia, Um Adeus'),
(12, 3, 'Antes de Dizer Adeus / Farol das Estrelas'),
(13, 3, 'Desafio'),
(14, 5, 'Mais uma Vez'),
(15, 5, 'A cruz e a espada');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `email`, `senha`, `ativo`) VALUES
(1, 'turma.si@unicesumar.edu.br', '4e30f09dcde57beb4aa37c04a9e3ef51da66e431', 1),
(2, 'eduardobona@eduardobona.com.br', '4e30f09dcde57beb4aa37c04a9e3ef51da66e431', 1);

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
-- Índices de tabela `estrela`
--
ALTER TABLE `estrela`
  ADD PRIMARY KEY (`cod_usuario`,`cod_musica`),
  ADD KEY `fk_estrela_musica` (`cod_musica`);

--
-- Índices de tabela `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`cod_musica`),
  ADD KEY `fk_album` (`cod_album`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `cod_estilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `musica`
--
ALTER TABLE `musica`
  MODIFY `cod_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_estilo` FOREIGN KEY (`cod_estilo`) REFERENCES `estilo` (`cod_estilo`);

--
-- Restrições para tabelas `estrela`
--
ALTER TABLE `estrela`
  ADD CONSTRAINT `fk_estrela_musica` FOREIGN KEY (`cod_musica`) REFERENCES `musica` (`cod_musica`),
  ADD CONSTRAINT `fk_estrela_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);

--
-- Restrições para tabelas `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `fk_album` FOREIGN KEY (`cod_album`) REFERENCES `album` (`cod_album`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
