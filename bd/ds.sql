-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 13/03/2015 às 01:29
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
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `login` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `nivel` varchar(1) COLLATE utf8_swedish_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `login`, `senha`, `nivel`, `status`) VALUES
(5, 'teste@testeando.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0', '1'),
(6, 'teste@testando.com', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '1', '1'),
(7, 'teste@testeando.com', 'admin3', '21232f297a57a5a743894a0e4a801fc3', '0', '0'),
(8, 'akdjs@akdhga.com', 'login', 'd56b699830e77ba53855679cb1d252da', '0', '0'),
(9, 'adkja@email.com', 'login''', 'd56b699830e77ba53855679cb1d252da', '0', '0');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
