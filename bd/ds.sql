-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 01/05/2015 às 02:29
-- Versão do servidor: 5.6.21
-- Versão do PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `ds`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
`id_produto` int(11) NOT NULL,
  `nome_1` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `nome_2` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `modelo` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao_1` varchar(150) COLLATE utf8_swedish_ci NOT NULL,
  `descricao_2` text COLLATE utf8_swedish_ci NOT NULL,
  `valor` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Fazendo dump de dados para tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_1`, `nome_2`, `modelo`, `categoria`, `quantidade`, `descricao_1`, `descricao_2`, `valor`) VALUES
(1, 'celular', 'Samsung Galaxy S4', 'Samsung', 'celular', 20, 'Um otimo celular', 'todas as especificações', 'R$ 1200,00'),
(2, 'notebook', 'notebook Lenovo slim', 'g400s', 'notebook', 30, 'um otimo computador, fino, leve, rapido e bastante bonito.', 'Muitas caracteristicas...', 'R$ 1900,00'),
(3, 'Fiat', 'Fiat uno mile', 'uno 2009', 'carro', 10, 'Um carro para ser usado onde e quando quiser', 'çalsdjfaçlsdfjaçsldkfjaçsldkfjaçsdlkfjaçdslkfjaçdkljaçsldkfjaçslkasnçlkvnaçovinaeorieanvçenvçlkbaeb oieav oia ejvoafvlkamçvjaeori vjaov oaijfoivaelkaner b epbe', 'R$ 20000,00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `login` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `nivel` varchar(1) COLLATE utf8_swedish_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `login`, `senha`, `nivel`, `status`) VALUES
(12, 'teste@testeando.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0', '1'),
(13, 'teste2@testando.com', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '1', '1'),
(14, 'teste@testeando.com', 'admin3', '21232f297a57a5a743894a0e4a801fc3', '0', '1'),
(15, 'joaoeymard@hotmail.com', 'admin5', '21232f297a57a5a743894a0e4a801fc3', '0', '1');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
 ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
