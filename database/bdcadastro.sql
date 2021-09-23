-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Set-2021 às 08:25
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdcadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpessoa`
--

CREATE TABLE `tbpessoa` (
  `idPessoa` int(11) NOT NULL,
  `nomePessoa` varchar(100) NOT NULL,
  `dataNascimento` date NOT NULL,
  `contaminadoPessoa` varchar(50) NOT NULL,
  `vacinadoPessoa` varchar(50) NOT NULL,
  `perdaPessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbpessoa`
--

INSERT INTO `tbpessoa` (`idPessoa`, `nomePessoa`, `dataNascimento`, `contaminadoPessoa`, `vacinadoPessoa`, `perdaPessoa`) VALUES
(7, 'Gustavo Antonio', '2003-09-12', 'Sim', 'Apenas A Primeira Dose', 2),
(8, 'Carlos Almeida ', '1980-06-18', 'Sim', 'Apenas A Primeira Dose', 5),
(10, 'Marvin Gaye', '2001-07-08', 'Não', 'Não', 0),
(11, 'Lucy Da Silva', '1997-11-14', 'Sim', 'Apenas A Primeira Dose', 2),
(16, 'Allan', '1912-12-12', 'Não', 'As Duas Doses', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbpessoa`
--
ALTER TABLE `tbpessoa`
  ADD PRIMARY KEY (`idPessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbpessoa`
--
ALTER TABLE `tbpessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
