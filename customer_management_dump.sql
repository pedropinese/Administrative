-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `customer_management`
--
CREATE DATABASE IF NOT EXISTS `customer_management` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `customer_management`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `address`
--

CREATE TABLE `address` (
  `ID` int(11) NOT NULL,
  `STREET` varchar(60) NOT NULL,
  `NUMBER` int(11) NOT NULL,
  `POSTAL_CODE` varchar(30) NOT NULL,
  `DISTRICT` varchar(30) NOT NULL,
  `CITY` varchar(30) NOT NULL,
  `STATE` varchar(30) NOT NULL,
  `COUNTRY` varchar(30) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `address`
--

INSERT INTO `address` (`ID`, `STREET`, `NUMBER`, `POSTAL_CODE`, `DISTRICT`, `CITY`, `STATE`, `COUNTRY`, `CUSTOMER_ID`) VALUES
(20, 'Rua João Tedesco', 676, '13425-120', 'Primeiro de Maio', 'Piracicaba', 'São Paulo', 'Brasil', 85),
(21, 'Rua Governador Pedro de Toledo', 630, '13420-100', 'Centro', 'Piracicaba', 'São Paulo', 'Brasil', 86),
(22, 'Rua Sete de Setembro', 565, '13452-320', 'Jupiá', 'Piracicaba', 'São Paulo', 'Brasil', 86),
(23, 'Avenida Independência', 505, '13420-125', 'Alto', 'Piracicaba', 'São Paulo', 'Brasil', 87),
(24, 'Rua Hidelma Brito', 12, '14526-899', 'Paulista', 'Sorocaba', 'São Paulo', 'Brasil', 87),
(25, 'Rua Fernando Nunes', 36, '13484-015', 'Vila da Glória', 'Curiiba', 'Paraná', 'Brasil', 87);

-- --------------------------------------------------------

--
-- Estrutura da tabela `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PHONE` varchar(25) NOT NULL,
  `BIRTHDAY` date NOT NULL,
  `CPF` varchar(25) NOT NULL,
  `RG` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `customer`
--

INSERT INTO `customer` (`ID`, `NAME`, `PHONE`, `BIRTHDAY`, `CPF`, `RG`) VALUES
(85, 'Pedro Pinese', '(19) 997486823', '1997-09-07', '123.456.789-99', '12.345.678-9'),
(86, 'Amanda Toledo', '(19) 998584712', '1978-07-22', '147.852.369-87', '36.985.214-7'),
(87, 'Rodrigo Justino', '(12) 991552368', '1991-06-15', '258.147.147-85', '23.568.974-1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`ID`, `USER_NAME`, `PASSWORD`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ADDRESS_X_CUSTOMER` (`CUSTOMER_ID`);

--
-- Índices para tabela `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `address`
--
ALTER TABLE `address`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


--
-- Limitadores para a tabela `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_ADDRESS_X_CUSTOMER` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
