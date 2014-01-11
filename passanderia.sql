-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 05-Jan-2014 às 19:01
-- Versão do servidor: 5.5.34
-- versão do PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `passanderia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `endereco`, `bairro`, `telefone`, `celular`, `created`, `modified`, `saldo`) VALUES
(1, 'ADRIANO/LUCIANA', 'rua', 'aep', '(00) 0000-0000', '', '2013-10-20', '2014-01-05', '-20.00'),
(2, 'CLAUDIA', 'Rua CARLOS BOTELHO 33', 'ABC', '(13) 0000-0000', '', '2013-10-20', '2014-01-05', '-50.00'),
(3, 'CRISTINA', 'rua', 'ABC', '(00) 0000-0000', '', '2013-10-20', '2013-11-03', '0.00'),
(4, 'ESTELA', 'R. JOSE BONIFACIO 1175 BL. D AP. 72', 'ALTANEIRA', '(14) 3432-4646', '(14) 9722-076', '2013-10-20', '2013-11-15', '76.00'),
(6, 'FATIMA', 'RUA VENANCIO DE SOUZA 498', 'AEROPORTO', '(14) 3433-5115', '(14) 8130-3489', '2013-10-20', '2013-11-06', '53.00'),
(7, 'JACIRA', 'Rua', 'ABC', '(99) 9999-9999', '', '2013-10-20', '2013-10-28', '0.00'),
(8, 'EDSON', 'Rua', 'ABC', '(00) 0000-0000', '', '2013-10-20', '2013-11-12', '-37.00'),
(9, 'DARTI', 'Rua', 'ABC', '(00) 0000-0000', '', '2013-10-20', '2013-10-23', '0.00'),
(10, 'ADRIANA (FARMACIA)', 'CHACARA', 'AEROPORTO', '(14) 3433-1214', '(14) 9962-6903', '2013-10-20', '2013-10-22', '0.00'),
(11, 'ANTONIA', 'R. FCO. JOSE CAPELINE', 'AEROPORTO', '(14) 3432-1105', '', '2013-10-20', '2013-10-20', '0.00'),
(12, 'BERENICE', 'RUA BANDEIRANTES - ED. JOÃO PAULO', 'CENTRO', '(14) 3433-2305', '', '2013-10-20', '2013-10-20', '0.00'),
(13, 'BETH', 'RUA GABRIEL LOPES GONÇALVES 295', 'MARIA ISABEL', '(14) 3413-4548', '', '2013-10-20', '2013-10-20', '0.00'),
(14, 'CRISTIANE', 'R GUILHERME MASTROFRANCISCO 75', 'ESMERALDA', '(14) 3414-1452', '(14) 9960-7278', '2013-10-20', '2013-10-20', '0.00'),
(15, 'DAYANE /EDUARDO', 'RUA JOSE COSTA OLIVEIRA 147', 'COLIBRI', '(14) 3453-1553', '', '2013-10-20', '2013-10-20', '0.00'),
(16, 'DEBORA / ORCISA', 'rua', 'AEROPORTO', '(14) 3413-5663', '', '2013-10-20', '2013-10-20', '0.00'),
(17, 'DEIA', 'RUA', 'AEROPORTO', '(14) 3413-4395', '(14) 98156-7533', '2013-10-20', '2013-10-20', '0.00'),
(18, 'EDILENE', 'RUA INES CINTRA', 'STA. GERTRUDES', '(14) 3432-1560', '(14) 03413-6185', '2013-10-20', '2013-10-20', '0.00'),
(19, 'FERNANDA', 'VILA FLORA', 'CASA 41', '(14) 3422-1610', '(14) 98129-8610', '2013-10-20', '2013-10-20', '0.00'),
(20, 'GEORGEA', 'R. JOSE FREIRE SOBRINHO 543', 'AEROPORTO', '(14) 3454-4785', '(14) 99735-9900', '2013-10-20', '2014-01-04', '-4.00'),
(21, 'HELOISA (PARQUINHO)', 'RUA', 'MARIA ISABEL', '(14) 3433-0925', '(14) 03454-9241', '2013-10-20', '2013-10-20', '0.00'),
(22, 'INES PAVAN', 'RUA', 'AEROPORTO', '(14) 3422-1894', '', '2013-10-20', '2013-10-20', '0.00'),
(23, 'JANDIRA', 'R. ANDRE MARTINS PARRA 91', 'COLIBRI', '(14) 3433-9107', '', '2013-10-20', '2013-10-20', '0.00'),
(24, 'JULIANO / RENATA', 'RUA', 'AEROPORTO', '(14) 3221-6469', '', '2013-10-20', '2013-10-20', '0.00'),
(25, 'MARA (Cond. Village)', 'CASA 52', 'AEROPORTO', '(14) 3433-9076', '', '2013-10-20', '2013-10-21', '0.00'),
(26, 'MARCELA (VIZINHA)', 'R. JOSE COSTA OLIVEIRA 11', 'COLIBRI', '(14) 8164-3281', '(14) 98164-3281', '2013-10-20', '2013-10-20', '0.00'),
(27, 'MARIA CLAUDIA ', 'R. GABRIEL MONTEIRO DA SILVA 153', 'FRAGATA', '(14) 3451-1851', '', '2013-10-20', '2013-11-10', '-20.00'),
(28, 'MARIA DULCE', 'COND. VIVER BOSQUE CASA 33', 'AEROPORTO', '(14) 3221-4250', '(14) 99148-4029', '2013-10-20', '2013-10-20', '0.00'),
(29, 'NEUSA', 'COND. GARDEN', 'CASA 78', '(14) 3414-1472', '(14) 99607-2786', '2013-10-20', '2013-10-20', '0.00'),
(30, 'OSMARINA', 'CHACARA', 'AEROPORTO', '(14) 3454-4538', '', '2013-10-20', '2013-10-20', '0.00'),
(31, 'PATRICIA', 'COND. COLIBRI CASA 9', 'COLIBRI', '(14) 3432-4626', '', '2013-10-20', '2013-10-20', '0.00'),
(32, 'RENATA (CARMELITA)', 'R. OLECIO DLVEDOVE', 'JDIM. LUCIANA', '(14) 3422-2287', '(14) 03413-4459', '2013-10-20', '2013-10-20', '0.00'),
(33, 'ROSA (V.FLORA)', 'COND. VILA FLORA CASA 139', 'COLIBRI', '(14) 3306-4871', '', '2013-10-20', '2013-10-20', '0.00'),
(34, 'ROSANA GIOLO', 'RUA TUPINAMBAS 207', 'AEROPORTO', '(14) 3413-5183', '', '2013-10-20', '2013-10-20', '0.00'),
(35, 'SILVANA / LUIS', 'RUA', 'AEROPORTO', '(14) 3422-5513', '', '2013-10-20', '2013-10-20', '0.00'),
(36, 'SONIA (7 SETEMBRO)', 'RUA SETE DE SETEMBRO', 'CENTRO', '(14) 3433-1165', '', '2013-10-20', '2013-11-06', '0.00'),
(37, 'VANESSA (CORRETA)', 'RUA FCO. JOSE CAPELINE', 'AEROPORTO', '(14) 3432-4000', '(14) 9960-3800', '2013-10-20', '2013-10-20', '0.00'),
(38, 'ZILDA Dra.', 'COND ESMERALDA', 'ESMERALDA', '(14) 3433-2040', '(14) 9978-4487', '2013-10-20', '2013-11-15', '0.00'),
(39, 'LENA CALANDRIN', 'RUA WADHI BUTARA', 'SÃO DOMINGOS', '(14) 0000-0000', '', '2013-10-22', '2013-10-22', '0.00'),
(40, 'ROSANA (V. FLORA)', 'V. FLORA', 'COLIBRI', '(14) 0000-0000', '', '2013-10-23', '2013-10-23', '0.00'),
(41, 'ROSANA (GARDEN)', 'CASA 175', 'GARDEN', '(00) 0000-0000', '', '2013-10-23', '2013-10-23', '0.00'),
(42, 'SANDRA (GARDEN)', 'CASA 174', 'GARDEN', '(00) 0000-0000', '', '2013-10-23', '2013-10-23', '0.00'),
(43, 'KEITH', 'RUA INES CINTRA 509', 'Sta. Gertrudes ', '(14) 3316-1526', '', '2013-10-28', '2013-10-28', '0.00'),
(44, 'RITA', 'RUA TUFIC BUTARA 639', 'S. Domingos', '(00) 0000-0000', '', '2013-10-29', '2013-10-29', '0.00'),
(45, 'SANDRO', 'RUA A', 'AEROPORTO', '(00) 0000-0000', '', '2013-10-29', '2013-11-04', '0.00'),
(46, 'MARCELO (Columbano)', 'Rua Columbano', 'COLIBRI', '(00) 0000-0000', '', '2013-10-30', '2013-10-30', '0.00'),
(47, 'ADILA', 'Rua A', 'Novo Horizonte', '(00) 0000-0000', '', '2013-10-30', '2014-01-05', '1.00'),
(48, 'GETULIO', 'Rua A', 'Bairro', '(00) 0000-0000', '', '2013-10-30', '2013-10-30', '0.00'),
(49, 'SIMONE', 'RUA', 'BAIRRO', '(00) 0000-0000', '', '2013-11-04', '2013-11-04', '0.00'),
(50, 'RAQUEL', 'R. Cap. Heraclides', 'COLIBRI', '(00) 0000-0000', '(00) 00000-0000', '2013-11-04', '2013-11-04', '0.00'),
(51, 'SUELI', 'R. Venancio de Souza', 'AEROPORTO', '(00) 0000-0000', '', '2013-11-05', '2013-11-05', '0.00'),
(52, 'MARCIO', 'R. Shinji Kuroki', 'COLIBRI', '(00) 0000-0000', '', '2013-11-05', '2013-11-05', '0.00'),
(53, 'GISELE', 'Rua Segipe 956', 'YARA', '(14) 3454-4140', '(14) 99761-7166', '2013-11-06', '2013-11-06', '0.00'),
(54, 'NINA (Renata)', 'Rua Amazonas', 'Centro', '(00) 0000-0000', '(00) 00000-0000', '2013-11-07', '2013-11-07', '0.00'),
(55, 'ALESSANDRA DAMASCENO', 'Rua Daher Audi 42', 'STA. GERTRUDES', '(00) 0000-0000', '', '2013-11-12', '2013-11-12', '0.00'),
(56, 'RODOLFO', 'R. JOSE FREIRE SOBRINHO 562', 'AEROPORTO', '(14) 3422-5699', '(14) 99784-5458', '2013-11-12', '2014-01-04', '-14.00'),
(57, 'CELIA', 'Rua Tapajos', 'AEROPORTO', '(00) 0000-0000', '', '2013-11-13', '2014-01-05', '20.00'),
(58, 'VERA LUCIA KATO', 'Rua A', 'AEROPORTO', '(00) 0000-0000', '', '2013-11-14', '2014-01-05', '-40.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE IF NOT EXISTS `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` decimal(10,2) NOT NULL,
  `comentarios` text,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL,
  `servico_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `servico_id` (`servico_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `valor`, `comentarios`, `created`, `modified`, `servico_id`) VALUES
(1, '20.00', NULL, '2013-11-14', NULL, 70),
(3, '100.00', '', '2014-01-04', '2014-01-04', 52),
(4, '0.11', '', '2014-01-04', '2014-01-04', 66),
(5, '0.11', '', '2014-01-04', '2014-01-04', 66),
(6, '40.00', '', '2014-01-04', '2014-01-04', 64),
(7, '40.00', '', '2014-01-04', '2014-01-04', 64),
(8, '30.00', '', '2014-01-04', '2014-01-04', 54),
(9, '30.00', '', '2014-01-04', '2014-01-04', 54),
(10, '50.00', '', '2014-01-04', '2014-01-04', 45),
(11, '50.00', '', '2014-01-05', '2014-01-05', 71),
(12, '10.00', '', '2014-01-05', '2014-01-05', 69),
(13, '20.00', '', '2014-01-05', '2014-01-05', 65),
(14, '60.00', '', '2014-01-05', '2014-01-05', 68);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_abertura` date NOT NULL,
  `data_fechamento` date DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `valor_pago` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cliente_id` int(11) NOT NULL,
  `comentarios` text,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `data_abertura`, `data_fechamento`, `valor`, `valor_pago`, `cliente_id`, `comentarios`) VALUES
(1, '2013-11-04', '2013-11-06', '30.00', '100.00', 6, ''),
(2, '2013-11-01', '2013-11-04', '18.00', '18.00', 34, ''),
(3, '2013-11-01', '2013-11-04', '77.00', '77.00', 4, ''),
(4, '2013-11-04', '2013-11-05', '50.00', '50.00', 35, ''),
(5, '2013-11-01', '2013-11-04', '20.00', '20.00', 28, ''),
(6, '2013-11-04', '2013-11-07', '27.00', '27.00', 49, ''),
(8, '2013-11-04', '2013-11-05', '60.00', '60.00', 36, ''),
(9, '2013-10-30', '2013-11-07', '20.00', '0.00', 1, 'Paga na proxima'),
(11, '2013-10-25', '2013-11-06', '24.00', '24.00', 45, ''),
(12, '2013-10-30', '2013-11-01', '87.00', '87.00', 40, ''),
(13, '2013-11-30', '2013-11-01', '28.00', '28.00', 29, ''),
(14, '2013-10-30', '2013-11-04', '10.00', '10.00', 42, ''),
(15, '2013-10-30', '2013-11-04', '22.00', '22.00', 41, ''),
(16, '2013-10-30', '2013-11-01', '53.00', '53.00', 46, ''),
(17, '2013-10-30', '2013-11-01', '35.00', '35.00', 30, ''),
(18, '2013-10-30', '2013-11-02', '27.00', '27.00', 26, ''),
(19, '2013-10-30', '2013-11-04', '36.00', '36.00', 50, ''),
(20, '2013-11-05', '2013-11-07', '84.00', '84.00', 16, ''),
(21, '2013-11-05', '2013-11-07', '35.00', '35.00', 18, ''),
(22, '2013-11-05', '2013-11-07', '55.00', '55.00', 14, ''),
(23, '2013-11-05', '2013-11-06', '25.00', '25.00', 51, ''),
(24, '2013-11-05', '2013-11-07', '40.00', '40.00', 21, ''),
(25, '2013-11-05', '2013-11-08', '10.00', '10.00', 52, ''),
(26, '2013-11-04', '2013-11-06', '28.00', '28.00', 39, ''),
(27, '2013-11-05', '2013-11-07', '73.00', '73.00', 13, ''),
(28, '2013-11-06', '2013-11-08', '20.00', '20.00', 29, ''),
(29, '2013-11-06', '2013-11-08', '10.00', '10.00', 42, ''),
(30, '2013-11-06', '2013-11-08', '20.00', '0.00', 27, ''),
(31, '2013-10-29', '2013-11-06', '27.00', '27.00', 2, ''),
(32, '2013-11-06', '2013-11-10', '20.00', '0.00', 2, ''),
(33, '2013-11-06', '2013-11-11', '95.00', '95.00', 24, ''),
(34, '2013-11-06', '2013-11-07', '21.00', '21.00', 11, ''),
(35, '2013-11-06', '2013-11-07', '35.00', '35.00', 53, ''),
(36, '2013-11-06', '2013-11-08', '70.00', '70.00', 40, ''),
(37, '2013-11-05', '2013-11-07', '45.00', '45.00', 54, ''),
(38, '2013-11-07', '2013-11-07', '40.00', '40.00', 1, ''),
(39, '2013-11-09', '2013-11-12', '22.00', '22.00', 50, ''),
(40, '2013-11-08', '2013-11-12', '42.00', '42.00', 9, ''),
(41, '2013-11-07', '2013-11-12', '40.00', '10.00', 47, ''),
(42, '2013-11-08', '2013-11-11', '37.00', '0.00', 8, ''),
(43, '2013-11-08', '2013-11-12', '47.00', '200.00', 4, ''),
(44, '2013-11-08', '2013-11-12', '20.00', '20.00', 28, ''),
(45, '2013-11-11', '2013-11-14', '54.00', '54.00', 20, ''),
(46, '2013-11-11', '2013-11-13', '55.00', '55.00', 33, ''),
(47, '2013-11-09', '2013-11-09', '26.00', '26.00', 26, ''),
(48, '2013-11-11', '2013-11-12', '35.00', '35.00', 37, ''),
(49, '2013-11-11', '2013-11-13', '35.00', '35.00', 23, ''),
(50, '2013-11-11', '2013-11-13', '60.00', '60.00', 10, ''),
(51, '2013-11-11', '2013-11-13', '20.00', '20.00', 55, ''),
(52, '2013-12-11', '2014-02-01', '100.00', '0.00', 6, ''),
(53, '2013-11-12', '2013-11-12', '55.00', '92.00', 38, ''),
(54, '2013-11-12', '2013-11-14', '37.00', '37.00', 56, ''),
(55, '2013-11-11', '2013-11-11', '27.00', '0.00', 4, ''),
(56, '2013-11-12', '2013-11-13', '18.00', '18.00', 17, ''),
(57, '2013-11-12', NULL, '0.00', '0.00', 28, ''),
(59, '2013-11-11', '2013-11-12', '55.00', '55.00', 35, ''),
(60, '2013-11-13', NULL, '0.00', '0.00', 25, ''),
(61, '2013-11-13', '2013-11-13', '30.00', '30.00', 29, ''),
(62, '2013-11-13', '2013-11-13', '12.00', '12.00', 42, ''),
(63, '2013-11-13', '2013-11-13', '20.00', '20.00', 34, ''),
(64, '2013-11-13', '2013-11-16', '45.00', '45.00', 21, ''),
(65, '2013-11-13', '2013-11-13', '25.00', '25.00', 57, ''),
(66, '2013-11-11', '2013-12-06', '1.11', '0.00', 45, ''),
(67, '2013-11-12', NULL, '0.00', '0.00', 27, ''),
(68, '2013-11-14', '2014-01-05', '59.00', '0.00', 47, ''),
(69, '2013-11-14', '2014-01-22', '50.00', '0.00', 58, ''),
(70, '2013-11-14', '2013-11-14', '20.00', '20.00', 2, ''),
(71, '0000-00-00', '2014-01-01', '100.00', '0.00', 2, ''),
(72, '0000-00-00', '2014-02-01', '50.00', '0.00', 1, ''),
(73, '2014-01-01', '2014-01-01', '0.00', '0.00', 47, '');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;