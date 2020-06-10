-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2020 às 19:21
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblapartamento`
--

CREATE TABLE `tblapartamento` (
  `idApartamento` int(11) NOT NULL,
  `apt` varchar(5) NOT NULL,
  `valorSingle` float(12,2) NOT NULL,
  `valorDouble` float(12,2) NOT NULL,
  `valorTriple` float(12,2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblapartamento`
--

INSERT INTO `tblapartamento` (`idApartamento`, `apt`, `valorSingle`, `valorDouble`, `valorTriple`, `status`) VALUES
(9, '101', 10.00, 20.00, 30.00, 2),
(10, '102', 10.00, 20.00, 30.00, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcliente`
--

CREATE TABLE `tblcliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` char(11) NOT NULL,
  `telefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblcliente`
--

INSERT INTO `tblcliente` (`id`, `nome`, `cpf`, `telefone`) VALUES
(17, 'cliente', '123', '123'),
(18, 'teste', '741741', '741741'),
(19, 'mara', '963963', '963963'),
(20, 'mara', '852', '+5516991040138');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblperfilusuario`
--

CREATE TABLE `tblperfilusuario` (
  `idPerfilUsuario` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblproduto`
--

CREATE TABLE `tblproduto` (
  `idProduto` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `valor` float(12,2) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblproduto`
--

INSERT INTO `tblproduto` (`idProduto`, `descricao`, `valor`, `status`) VALUES
(6, 'toalha', 10.00, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblreserva`
--

CREATE TABLE `tblreserva` (
  `idReserva` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
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

--
-- Extraindo dados da tabela `tblreserva`
--

INSERT INTO `tblreserva` (`idReserva`, `idCliente`, `idApartamento`, `qtdHospedes`, `dataReserva`, `dataCheckin`, `dataCheckout`, `checkin`, `checkout`, `valorTotalReserva`, `valorPago`) VALUES
(83, 17, 9, 2, '2020-06-08 00:00:00', '2020-06-08 00:00:00', '2020-06-09 00:00:00', 1, 0, 40.00, 0.00),
(85, 20, 9, 1, '2020-06-08 00:00:00', '2020-06-11 00:00:00', '2020-06-14 00:00:00', 0, 0, 40.00, 0.00),
(86, 20, 10, 1, '2020-06-08 00:00:00', '2020-06-08 00:00:00', '2020-06-10 00:00:00', 0, 0, 30.00, 0.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblreservaproduto`
--

CREATE TABLE `tblreservaproduto` (
  `idReserva` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` float(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblreservaproduto`
--

INSERT INTO `tblreservaproduto` (`idReserva`, `idProduto`, `qtd`, `valor`) VALUES
(78, 6, 2, 10.00),
(78, 6, 2, 10.00),
(82, 6, 2, 10.00),
(77, 6, 1, 10.00),
(81, 6, 2, 10.00),
(85, 6, 2, 10.00),
(85, 6, 1, 10.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblreservaservico`
--

CREATE TABLE `tblreservaservico` (
  `idReserva` int(11) NOT NULL,
  `idServico` int(11) NOT NULL,
  `realizado` tinyint(1) NOT NULL,
  `valor` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblreservaservico`
--

INSERT INTO `tblreservaservico` (`idReserva`, `idServico`, `realizado`, `valor`) VALUES
(78, 3, 0, '1'),
(78, 3, 0, '1'),
(79, 3, 0, '1'),
(85, 3, 0, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblservico`
--

CREATE TABLE `tblservico` (
  `idServico` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` float(12,2) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblservico`
--

INSERT INTO `tblservico` (`idServico`, `descricao`, `valor`, `status`) VALUES
(3, 'massagem', 10.00, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblusuario`
--

CREATE TABLE `tblusuario` (
  `idUsuario` int(11) NOT NULL,
  `idPerfilUsuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblusuario`
--

INSERT INTO `tblusuario` (`idUsuario`, `idPerfilUsuario`, `nome`, `cpf`, `email`, `senha`, `endereco`, `numero`, `telefone`, `status`) VALUES
(28, 3, 'Gerente', '789', 'teste@teste.com', '789', 'teste', '789', '789', 'A'),
(29, 1, 'atendente', '456', 'teste@teste.com', '456', 'teste', '456', '456', 'A'),
(30, 2, 'cliente', '123', 'teste@teste.com', '123', 'teste', '123', '123', 'A'),
(31, 2, 'teste', '741741', 'aaaa@aaa.com', '741741', 'teste', '293', '741741', 'A'),
(32, 2, 'mara', '963963', 'mara@mara.com', '963963', 'teste', '293', '963963', 'A'),
(33, 2, 'mara', '852', 'admin@adas.com', '852', 'teste', '3305', '+55169910401', 'A');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tblapartamento`
--
ALTER TABLE `tblapartamento`
  ADD PRIMARY KEY (`idApartamento`);

--
-- Índices para tabela `tblcliente`
--
ALTER TABLE `tblcliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `tblperfilusuario`
--
ALTER TABLE `tblperfilusuario`
  ADD PRIMARY KEY (`idPerfilUsuario`);

--
-- Índices para tabela `tblproduto`
--
ALTER TABLE `tblproduto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices para tabela `tblreserva`
--
ALTER TABLE `tblreserva`
  ADD PRIMARY KEY (`idReserva`);

--
-- Índices para tabela `tblservico`
--
ALTER TABLE `tblservico`
  ADD PRIMARY KEY (`idServico`);

--
-- Índices para tabela `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblapartamento`
--
ALTER TABLE `tblapartamento`
  MODIFY `idApartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tblcliente`
--
ALTER TABLE `tblcliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tblperfilusuario`
--
ALTER TABLE `tblperfilusuario`
  MODIFY `idPerfilUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tblproduto`
--
ALTER TABLE `tblproduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tblreserva`
--
ALTER TABLE `tblreserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de tabela `tblservico`
--
ALTER TABLE `tblservico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
