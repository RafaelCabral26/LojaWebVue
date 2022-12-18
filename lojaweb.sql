-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2022 at 03:40 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `endereço` (
  `cep` varchar(10) NOT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `bairro` varchar(120) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `endereço` (`cep`, `logradouro`, `bairro`, `cidade`, `uf`) VALUES
('23111-111', 'Rua alto alegre', 'Pechincha', 'Rio de janeiro', 'RJ'),
('235444-123', 'Rua dos candango', 'Cidade veia', 'Rio de janeiro', 'RJ'),
('235444-345', 'Rua dos candango', 'Cidade veia', 'Rio de janeiro', 'RJ');

-- --------------------------------------------------------

--
-- Table structure for table `Funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `quant` int(11) DEFAULT NULL,
  `data_alteracao` date DEFAULT NULL,
  `valor` double(19,2) DEFAULT NULL,
  `largura` int(11) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `comprimento` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `fotos` varchar(150) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`nome`, `descricao`, `quant`, `data_alteracao`, `valor`, `largura`, `altura`, `comprimento`, `peso`, `fotos`, `ativo`) VALUES
('Rafael', 'descricao do produto', 4, '2020-03-19', 25.55, 20, 10, 15, 40, 'url', 1),
('Celulaire', 'descricao do produto', 4, '2020-03-19', 25.55, 20, 10, 15, 40, 'url', 1),
('televisao', 'televisao 40 polegadas', 4, '2024-03-19', 22.00, 20, 10, 15, 40, 'url', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) PRIMARY KEY NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `senha` varchar(100) NOT NULL,
  `telefone` varchar(40) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `data_nasc`, `cpf`, `senha`, `telefone`, `active`) VALUES
(1256, 'usuer', 'user@email.com', '2022-12-13', '345634563456', '$5$rounds=5000$GOELK43650gr$FZwoaAbfbD42Wo6TOOMTVQHmg.h1.ekKi1O349TUDC0', '243643563456', 1),
(1257, 'usuario2', 'user2@email.com', '2022-12-12', '45645645645', '$5$rounds=5000$GOELK43650gr$SaY1rKSPkYt3fBO6EHJ5iNBikC9fCrf1faUm/d9kEt5', '123456456456', 1),
(1258, 'usuario3', 'user3@email.com', '2022-12-20', '456745674576', '$5$rounds=5000$GOELK43650gr$F6OXYs6omBGXY6fDg2LejrNI0dnwovAdIizRoQM3/Y3', '45674567457', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endereço`
--
ALTER TABLE `endereço`
  ADD PRIMARY KEY (`cep`);

--
-- Indexes for table `Funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `Funcionario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;
