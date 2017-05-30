-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2015 às 22:55
-- Versão do servidor: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rotaonibus_1_n`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `Id` int(50) NOT NULL,
  `Nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `endereco_numero` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `endereco_rua` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `empregado_CPF` varchar(11) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`Id`, `Nome`, `endereco_numero`, `endereco_rua`, `empregado_CPF`) VALUES
(105, 'Recursos Humanos', '26', 'Rua Navegantes', '06213355498'),
(109, 'Segurança', '26', 'Rua dos Frades', '02368989768'),
(108, 'Marketing', '26', 'Rua das Moças', '06213355498'),
(107, 'Comunicação', '435', 'Rua da Aurora', '04859021344'),
(106, 'Diretoria', '44', 'Rua 21 de Abril', '02315785334');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empregado`
--

CREATE TABLE `empregado` (
  `CPF` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `Nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Cargo` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `empregado`
--

INSERT INTO `empregado` (`CPF`, `Nome`, `Cargo`) VALUES
('06213355498', 'Gilberto Silva', 'gerente'),
('02315785334', 'Marcelo Ramos', 'gerente'),
('04859021344', 'Anderson Berg', 'gerente'),
('0621335597', 'Rafael Oliveira', 'gerente'),
('02368989768', 'Higor Neto', 'gerente'),
('02315785934', 'Verônica Barros', 'técnico'),
('04856021348', 'Jéssica Portela', 'técnico'),
('06113555798', 'Aline Santos', 'técnico'),
('12364986767', 'José de Araújo', 'rodoviario'),
('42168389668', 'Adilson Danilo', 'secretário'),
('12064989912', 'Rosivaldo Santos', 'rodoviario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_endereco_numero` (`endereco_numero`),
  ADD KEY `fk_endereco_rua` (`endereco_rua`),
  ADD KEY `fk_gerente` (`empregado_CPF`);

--
-- Indexes for table `empregado`
--
ALTER TABLE `empregado`
  ADD PRIMARY KEY (`CPF`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
