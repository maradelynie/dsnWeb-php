-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Tempo de geração: 16/05/2020 às 17:05
-- Versão do servidor: 5.5.42
-- Versão do PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de dados: `hotelads42`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblApartamento`
--

CREATE TABLE `tblApartamento` (
  `idApartamento` int(11) NOT NULL,
  `apt` varchar(5) NOT NULL,
  `valorSingle` float(12,2) NOT NULL,
  `valorDouble` float(12,2) NOT NULL,
  `valorTriple` float(12,2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblPerfilUsuario`
--

CREATE TABLE `tblPerfilUsuario` (
  `idPerfilUsuario` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblProduto`
--

CREATE TABLE `tblProduto` (
  `idProduto` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `valor` float(12,2) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblReserva`
--

CREATE TABLE `tblReserva` (
  `idReserva` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idApartamento` int(11) NOT NULL,
  `qtdHospedes` int(11) NOT NULL,
  `dataReserva` datetime NOT NULL,
  `dataCheckin` datetime NOT NULL,
  `dataCheckout` datetime NOT NULL,
  `checkin` tinyint(1) NOT NULL,
  `checkout` tinyint(1) NOT NULL,
  `valorTotalReserva` float(12,2) NOT NULL,
  `valorPago` float(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblReservaProduto`
--

CREATE TABLE `tblReservaProduto` (
  `idReserva` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` float(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblReservaServico`
--

CREATE TABLE `tblReservaServico` (
  `idReserva` int(11) NOT NULL,
  `idServico` int(11) NOT NULL,
  `realizado` tinyint(1) NOT NULL,
  `valor` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblServico`
--

CREATE TABLE `tblServico` (
  `idServico` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` float(12,2) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblUsuario`
--

CREATE TABLE `tblUsuario` (
  `idUsuario` int(11) NOT NULL,
  `idPerfilUsuario` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tblApartamento`
--
ALTER TABLE `tblApartamento`
  ADD PRIMARY KEY (`idApartamento`);

--
-- Índices de tabela `tblPerfilUsuario`
--
ALTER TABLE `tblPerfilUsuario`
  ADD PRIMARY KEY (`idPerfilUsuario`);

--
-- Índices de tabela `tblProduto`
--
ALTER TABLE `tblProduto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices de tabela `tblReserva`
--
ALTER TABLE `tblReserva`
  ADD PRIMARY KEY (`idReserva`);

--
-- Índices de tabela `tblServico`
--
ALTER TABLE `tblServico`
  ADD PRIMARY KEY (`idServico`);

--
-- Índices de tabela `tblUsuario`
--
ALTER TABLE `tblUsuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tblApartamento`
--
ALTER TABLE `tblApartamento`
  MODIFY `idApartamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tblPerfilUsuario`
--
ALTER TABLE `tblPerfilUsuario`
  MODIFY `idPerfilUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tblProduto`
--
ALTER TABLE `tblProduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tblReserva`
--
ALTER TABLE `tblReserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tblServico`
--
ALTER TABLE `tblServico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tblUsuario`
--
ALTER TABLE `tblUsuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;