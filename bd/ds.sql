-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 23/05/2015 às 02:30
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
-- Estrutura para tabela `exercicio`
--

CREATE TABLE IF NOT EXISTS `exercicio` (
`id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `semana` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `exercicio` varchar(30) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Fazendo dump de dados para tabela `exercicio`
--

INSERT INTO `exercicio` (`id`, `id_usuario`, `semana`, `exercicio`) VALUES
(7, 13, 'Segunda-feira', 'agachamento'),
(8, 15, 'Dom', 'texte 1'),
(9, 15, 'Dom', 'teste 2'),
(10, 15, 'dom', 'test 1'),
(11, 15, 'seg', 'test 2'),
(12, 15, 'ter', 'test 3'),
(13, 15, 'qua', 'test 5'),
(14, 15, 'qui', 'test 6'),
(15, 15, 'sex', 'test 7'),
(16, 15, 'sab', 'test 8'),
(17, 15, 'ter', 'test 9'),
(18, 15, 'qui', 'test 10'),
(19, 15, 'sab', 'feira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
`id_produto` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `modelo` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` text COLLATE utf8_swedish_ci NOT NULL,
  `valor` float(11,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Fazendo dump de dados para tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `modelo`, `categoria`, `quantidade`, `descricao`, `valor`) VALUES
(4, 'Celular S4 mini, branco - 16gb', 'Galaxy', 'Celular', 18, 'Mesmo em miniatura ele é uma ótimo celular e consegue atender vários requisitos. \r\nTeste de caracteres: !@#$%*()ºª', 500.00),
(5, 'Novo produto otimizado', 'produto', 'novo', 5, 'Refazendo totalmente a descrição', 120.00),
(8, 'Um produto qualquer responsável pelo limite do máximo do nome do produto. Que é por volta de 150 car', 'asçdfjasdçlk', 'pocajçsldkfjp', 7, 'Nova descrição....', 50.00),
(9, 'Notebook Lenovo', 'Notebook', 'computador', 3, 'Um ótimo dispositivo...', 200.00),
(10, 'Fonte 19v para notebook', 'fonte', 'carregador', 10, 'Uma fonte universal.', 119.99),
(11, 'Placa mãe', 'Placa mãe', 'componentes internos de computador', 2, 'Uma placa mãe que aceita o mais avançado processador.', 530.00);

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
  `saldo` float(11,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `login`, `senha`, `nivel`, `saldo`) VALUES
(12, 'teste@testeando.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 50.00),
(13, 'teste2@testando.com', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '1', 1000.00),
(14, 'teste@testeando.com', 'admin3', '21232f297a57a5a743894a0e4a801fc3', '0', 1800.00),
(15, 'joaoeymard@hotmail.com', 'admin5', '21232f297a57a5a743894a0e4a801fc3', '0', 2600.00);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `exercicio`
--
ALTER TABLE `exercicio`
 ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `exercicio`
--
ALTER TABLE `exercicio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
