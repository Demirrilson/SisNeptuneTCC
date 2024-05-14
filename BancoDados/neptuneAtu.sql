-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Maio-2024 às 02:53
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `neptune`
--
CREATE DATABASE IF NOT EXISTS `neptune` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `neptune`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alerta`
--

DROP TABLE IF EXISTS `alerta`;
CREATE TABLE IF NOT EXISTS `alerta` (
  `Alerta_id` int NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(255) DEFAULT NULL,
  `Mensagem` text,
  `Data_alerta` date DEFAULT NULL,
  PRIMARY KEY (`Alerta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `alerta`
--

INSERT INTO `alerta` (`Alerta_id`, `Tipo`, `Mensagem`, `Data_alerta`) VALUES
(1, 'dw', 'fefw', '2024-04-04'),
(2, '232', '32332', '2024-04-03'),
(3, 'sa', 'sa', '2024-04-02'),
(4, 'isa', 'isa', '1111-11-11'),
(5, 'breno', 'breno', '1111-11-11'),
(6, 'breno', 'breno', '1111-11-11'),
(7, 'sad,as', 'dwdoqedqop', '2020-04-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimentacao`
--

DROP TABLE IF EXISTS `alimentacao`;
CREATE TABLE IF NOT EXISTS `alimentacao` (
  `Alimentacao_id` int NOT NULL AUTO_INCREMENT,
  `Tanque_id` int DEFAULT NULL,
  `Produto_id` int DEFAULT NULL,
  `Data_alimentacao` date DEFAULT NULL,
  `Hora_alimentacao` time DEFAULT NULL,
  `Tipo_alimento` varchar(255) DEFAULT NULL,
  `Quantidade_alimento` int DEFAULT NULL,
  PRIMARY KEY (`Alimentacao_id`),
  KEY `Tanque_id` (`Tanque_id`),
  KEY `Produto_id` (`Produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `alimentacao`
--

INSERT INTO `alimentacao` (`Alimentacao_id`, `Tanque_id`, `Produto_id`, `Data_alimentacao`, `Hora_alimentacao`, `Tipo_alimento`, `Quantidade_alimento`) VALUES
(1, NULL, NULL, '2024-04-03', NULL, 'tipo', 2),
(2, 10, 7, '2024-04-03', '16:50:00', 'Racao', 4),
(3, 10, 7, '2024-04-03', '16:50:00', 'Racao', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE IF NOT EXISTS `cadastro` (
  `Cadastro_id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  `Cargo` varchar(100) DEFAULT NULL,
  `Salario` double DEFAULT NULL,
  `CEP` int NOT NULL,
  `Rua` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Bairro` varchar(100) NOT NULL,
  `Numero` int NOT NULL,
  `Complemento` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Data_contratacao` date DEFAULT NULL,
  `Data_demissao` date DEFAULT NULL,
  `Expediente` varchar(255) DEFAULT NULL,
  `Senha` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`Cadastro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`Cadastro_id`, `Nome`, `Email`, `Telefone`, `Cargo`, `Salario`, `CEP`, `Rua`, `Bairro`, `Numero`, `Complemento`, `Data_contratacao`, `Data_demissao`, `Expediente`, `Senha`) VALUES
(11, 'Breno', 'breno@gmail.com', '11987654893', 'Pedreiro', 2, 0, '', '0', 0, '', '2024-04-03', '0000-00-00', 'Noturno', ''),
(12, 'Demirrilson', 'dimi@gmail.com', '11876907654', 'Pai de familia', 7, 0, '', '0', 0, '', '2024-04-02', '0000-00-00', '13h às 15h', ''),
(13, 'Bruno', 'donofrio@gmail.com', '11897652435', 'dar no frio', 3, 0, '', '0', 0, '', '2024-04-01', '0000-00-00', '13h ás 00h', ''),
(14, 'João', 'joaoliveira@gmail.com', '11256637849', 'Pintor', 2, 0, '', '0', 0, '', '2024-04-01', '0000-00-00', '13h ás 13h30', ''),
(20, 'Isabella', 'isa@gmail.com', '118564789', 'cadastro', 8, 0, '', '0', 0, '', '2024-05-10', '0000-00-00', 'vespertino', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `Estoque_id` int NOT NULL AUTO_INCREMENT,
  `Produto_id` int DEFAULT NULL,
  `Fornecedor_id` int DEFAULT NULL,
  `Localizacao_produto` varchar(255) DEFAULT NULL,
  `Data_validade` date DEFAULT NULL,
  `Quantidade` int DEFAULT NULL,
  `Data_entrada` date DEFAULT NULL,
  `Data_saida` date DEFAULT NULL,
  PRIMARY KEY (`Estoque_id`),
  KEY `Produto_id` (`Produto_id`),
  KEY `Fornecedor_id` (`Fornecedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`Estoque_id`, `Produto_id`, `Fornecedor_id`, `Localizacao_produto`, `Data_validade`, `Quantidade`, `Data_entrada`, `Data_saida`) VALUES
(10, 8, 9, NULL, '2024-04-04', 5, '2024-04-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `Fornecedor_id` int NOT NULL AUTO_INCREMENT,
  `CNPJ_Fornecedor` varchar(18) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Fornecedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`Fornecedor_id`, `CNPJ_Fornecedor`, `Nome`, `Email`, `Telefone`) VALUES
(7, '02002351', 'AquaFeed Solutions', 'aquafeed@gmail.com', '11998847263'),
(8, '1452328', 'NutriFish Premium Feeds', 'nutrifish@gmail.com', '11987263454'),
(9, '1785085', 'BlueWave Aquatics', 'blueWave@gmail.com', '11902283647'),
(10, '1400210', 'Henrique', 'henrique@gmail.com', '11987723456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `Funcionario_id` int NOT NULL AUTO_INCREMENT,
  `Cadastro_id` int DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Cargo` varchar(100) DEFAULT NULL,
  `Hora_entrada` time DEFAULT NULL,
  `Hora_saida` time DEFAULT NULL,
  `Data_entrada` date DEFAULT NULL,
  PRIMARY KEY (`Funcionario_id`),
  KEY `Cadastro_id` (`Cadastro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`Funcionario_id`, `Cadastro_id`, `Nome`, `Cargo`, `Hora_entrada`, `Hora_saida`, `Data_entrada`) VALUES
(1, NULL, 'a', 'a', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitura_manual`
--

DROP TABLE IF EXISTS `leitura_manual`;
CREATE TABLE IF NOT EXISTS `leitura_manual` (
  `Leitura_id` int NOT NULL AUTO_INCREMENT,
  `Valor` decimal(10,2) DEFAULT NULL,
  `Data_leitura` date DEFAULT NULL,
  `PH` decimal(5,2) DEFAULT NULL,
  `Nivel_oxigenio` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`Leitura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `leitura_manual`
--

INSERT INTO `leitura_manual` (`Leitura_id`, `Valor`, `Data_leitura`, `PH`, `Nivel_oxigenio`) VALUES
(1, '2.00', '2024-04-02', '2.00', '2.00'),
(2, '7.00', '7777-07-07', '7.00', '7.00'),
(3, '1.00', '1111-11-11', '1.00', '1.00'),
(4, '1.00', '1111-11-11', '1.00', '1.00'),
(5, '10.00', '2065-05-25', '20.00', '10.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitura_sensor`
--

DROP TABLE IF EXISTS `leitura_sensor`;
CREATE TABLE IF NOT EXISTS `leitura_sensor` (
  `Leitura_sensor_id` int NOT NULL AUTO_INCREMENT,
  `Sensor_id` int DEFAULT NULL,
  `Valor` decimal(10,2) DEFAULT NULL,
  `Data_leitura` datetime DEFAULT NULL,
  PRIMARY KEY (`Leitura_sensor_id`),
  KEY `Sensor_id` (`Sensor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `leitura_sensor`
--

INSERT INTO `leitura_sensor` (`Leitura_sensor_id`, `Sensor_id`, `Valor`, `Data_leitura`) VALUES
(21, NULL, '28.62', '2024-05-13 00:00:00'),
(22, NULL, '28.62', '2024-05-13 00:00:00'),
(23, NULL, '28.56', '2024-05-13 00:00:00'),
(24, NULL, '28.62', '2024-05-13 00:00:00'),
(25, NULL, '28.62', '2024-05-13 00:00:00'),
(26, NULL, '28.62', '2024-05-13 00:00:00'),
(27, NULL, '28.62', '2024-05-13 00:00:00'),
(28, NULL, '28.62', '2024-05-13 00:00:00'),
(29, NULL, '28.56', '2024-05-13 00:00:00'),
(30, NULL, '28.62', '2024-05-13 00:00:00'),
(31, NULL, '28.62', '2024-05-13 00:00:00'),
(32, NULL, '28.69', '2024-05-13 00:00:00'),
(33, NULL, '28.62', '2024-05-13 00:00:00'),
(34, NULL, '28.62', '2024-05-13 23:52:36'),
(35, NULL, '28.69', '2024-05-13 23:52:47'),
(36, NULL, '28.62', '2024-05-13 23:52:57'),
(37, NULL, '28.69', '2024-05-13 23:53:08'),
(38, NULL, '28.62', '2024-05-13 23:53:19'),
(39, NULL, '28.62', '2024-05-13 23:53:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Login_id` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Last_login` timestamp NULL DEFAULT NULL,
  `Funcionario_id` int DEFAULT NULL,
  PRIMARY KEY (`Login_id`),
  KEY `Funcionario_id` (`Funcionario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`Login_id`, `Username`, `Password`, `Last_login`, `Funcionario_id`) VALUES
(1, 'A', 'A', '2024-04-02 17:04:49', NULL),
(2, 'sa', 'sa', '0000-00-00 00:00:00', 11),
(3, 'Breno', 'breno', '0000-00-00 00:00:00', 11),
(4, 'Breno', 'breno', '0000-00-00 00:00:00', 11),
(5, 'ee', 'ee', '0000-00-00 00:00:00', 11),
(6, 'ee', 'ee', '0000-00-00 00:00:00', 11),
(7, 'sa', 'sa', '2024-04-03 03:00:00', 11),
(8, 'isa', 'isa', '0000-00-00 00:00:00', 12),
(9, 'bruno', 'bruno', '0000-00-00 00:00:00', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

DROP TABLE IF EXISTS `notificacao`;
CREATE TABLE IF NOT EXISTS `notificacao` (
  `Notificacao_id` int NOT NULL AUTO_INCREMENT,
  `Mensagem` text,
  `Data_envio` date DEFAULT NULL,
  PRIMARY KEY (`Notificacao_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`Notificacao_id`, `Mensagem`, `Data_envio`) VALUES
(1, 'a', '2024-04-02'),
(2, 'as', '4444-04-04'),
(3, 'sa', '1111-11-11'),
(4, 'sa', '1111-11-11'),
(5, 'ola', '2024-04-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `piscicultura`
--

DROP TABLE IF EXISTS `piscicultura`;
CREATE TABLE IF NOT EXISTS `piscicultura` (
  `Piscicultura_id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Localizacao` varchar(255) DEFAULT NULL,
  `Area_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Piscicultura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `piscicultura`
--

INSERT INTO `piscicultura` (`Piscicultura_id`, `Nome`, `Localizacao`, `Area_total`) VALUES
(5, 'Piscicultura1', 'São Paulo', '20.00'),
(6, 'Piscicultura2', 'Bauru', '40.00'),
(7, 'Piscicultura3', 'São roque', '50.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `Produto_id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Data_validade` date DEFAULT NULL,
  `Fornecedor_id` int DEFAULT NULL,
  `Preco` decimal(10,2) DEFAULT NULL,
  `Tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Produto_id`),
  KEY `Fornecedor_id` (`Fornecedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`Produto_id`, `Nome`, `Data_validade`, `Fornecedor_id`, `Preco`, `Tipo`) VALUES
(7, 'Rações Pelletizadas', '2071-08-31', 8, '63.00', 'Ração'),
(8, 'Alimentos Vivos', '2078-09-25', 7, '25.00', 'Ração'),
(9, 'Alimentos Vegetais', '2024-04-01', 9, '58.00', 'Ração');

-- --------------------------------------------------------

--
-- Estrutura da tabela `qualificacao_peixe`
--

DROP TABLE IF EXISTS `qualificacao_peixe`;
CREATE TABLE IF NOT EXISTS `qualificacao_peixe` (
  `Peixe_id` int DEFAULT NULL,
  `Quantidade_peixe` int DEFAULT NULL,
  `Peso_unitario` decimal(10,2) DEFAULT NULL,
  `Peso_lote` decimal(10,2) DEFAULT NULL,
  `Data_entrada_lote` date DEFAULT NULL,
  `Data_saida_lote` date DEFAULT NULL,
  KEY `Peixe_id` (`Peixe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `qualificacao_peixe`
--

INSERT INTO `qualificacao_peixe` (`Peixe_id`, `Quantidade_peixe`, `Peso_unitario`, `Peso_lote`, `Data_entrada_lote`, `Data_saida_lote`) VALUES
(NULL, 2, '2.00', '2.00', '2024-04-03', NULL),
(12, 3, '3.00', '3.00', '0000-00-00', '0000-00-00'),
(12, 3, '3.00', '3.00', '2024-04-03', '0000-00-00'),
(12, 4, '3.00', '3.00', '2024-04-03', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_alimentacao`
--

DROP TABLE IF EXISTS `registro_alimentacao`;
CREATE TABLE IF NOT EXISTS `registro_alimentacao` (
  `Registro_alimentacao_id` int NOT NULL AUTO_INCREMENT,
  `Alimentacao_id` int DEFAULT NULL,
  `Funcionario_id` int DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Quantidade` int DEFAULT NULL,
  PRIMARY KEY (`Registro_alimentacao_id`),
  KEY `Alimentacao_id` (`Alimentacao_id`),
  KEY `Funcionario_id` (`Funcionario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

DROP TABLE IF EXISTS `relatorio`;
CREATE TABLE IF NOT EXISTS `relatorio` (
  `Relatorio_id` int NOT NULL AUTO_INCREMENT,
  `Data_relatorio` date DEFAULT NULL,
  `Conteudo` text,
  `Teste_id` int DEFAULT NULL,
  PRIMARY KEY (`Relatorio_id`),
  KEY `Teste_id` (`Teste_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`Relatorio_id`, `Data_relatorio`, `Conteudo`, `Teste_id`) VALUES
(1, '2024-04-03', 'a', NULL),
(2, '2024-04-03', 'aaaa', 0),
(3, '2024-04-03', 'aaaa', 0),
(4, '2024-04-04', 'sasas', 1),
(5, '2024-04-18', 'breno', 1),
(6, '2024-04-18', 'breno', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sensor`
--

DROP TABLE IF EXISTS `sensor`;
CREATE TABLE IF NOT EXISTS `sensor` (
  `Sensor_id` int NOT NULL AUTO_INCREMENT,
  `Tipo_sensor_id` int DEFAULT NULL,
  PRIMARY KEY (`Sensor_id`),
  KEY `Tipo_sensor_id` (`Tipo_sensor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `sensor`
--

INSERT INTO `sensor` (`Sensor_id`, `Tipo_sensor_id`) VALUES
(1, NULL),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tanque`
--

DROP TABLE IF EXISTS `tanque`;
CREATE TABLE IF NOT EXISTS `tanque` (
  `Tanque_id` int NOT NULL AUTO_INCREMENT,
  `Capacidade_volume` decimal(10,2) DEFAULT NULL,
  `Piscicultura_id` int DEFAULT NULL,
  PRIMARY KEY (`Tanque_id`),
  KEY `Piscicultura_id` (`Piscicultura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tanque`
--

INSERT INTO `tanque` (`Tanque_id`, `Capacidade_volume`, `Piscicultura_id`) VALUES
(9, '20.00', 5),
(10, '50.00', 6),
(11, '80.00', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_quimico`
--

DROP TABLE IF EXISTS `teste_quimico`;
CREATE TABLE IF NOT EXISTS `teste_quimico` (
  `Teste_id` int NOT NULL AUTO_INCREMENT,
  `Tanque_id` int DEFAULT NULL,
  `PH` decimal(5,2) DEFAULT NULL,
  `Nivel_oxigenio` decimal(5,2) DEFAULT NULL,
  `Data_leitura` date DEFAULT NULL,
  PRIMARY KEY (`Teste_id`),
  KEY `Tanque_id` (`Tanque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `teste_quimico`
--

INSERT INTO `teste_quimico` (`Teste_id`, `Tanque_id`, `PH`, `Nivel_oxigenio`, `Data_leitura`) VALUES
(1, NULL, '2.00', '2.00', '2024-04-03'),
(2, 9, '10.00', '20.00', '2024-04-03'),
(3, 9, '10.00', '20.00', '2024-04-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_peixe`
--

DROP TABLE IF EXISTS `tipo_peixe`;
CREATE TABLE IF NOT EXISTS `tipo_peixe` (
  `Peixe_id` int NOT NULL AUTO_INCREMENT,
  `Especie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Peixe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tipo_peixe`
--

INSERT INTO `tipo_peixe` (`Peixe_id`, `Especie`) VALUES
(10, 'Tílapia\r\n'),
(11, 'Carpa\r\n'),
(12, 'Salmão\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sensor`
--

DROP TABLE IF EXISTS `tipo_sensor`;
CREATE TABLE IF NOT EXISTS `tipo_sensor` (
  `Tipo_sensor_id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Caracteristica` text,
  PRIMARY KEY (`Tipo_sensor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tipo_sensor`
--

INSERT INTO `tipo_sensor` (`Tipo_sensor_id`, `Nome`, `Caracteristica`) VALUES
(1, 'a', 'a'),
(2, 'sa1', 'sa1'),
(3, 'de', 'de'),
(4, 'de', 'de'),
(5, 'Esc32', 'isso ai bb, ta certa!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `valvula`
--

DROP TABLE IF EXISTS `valvula`;
CREATE TABLE IF NOT EXISTS `valvula` (
  `Valvula_id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `Tanque_id` int DEFAULT NULL,
  PRIMARY KEY (`Valvula_id`),
  KEY `Tanque_id` (`Tanque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alimentacao`
--
ALTER TABLE `alimentacao`
  ADD CONSTRAINT `alimentacao_ibfk_1` FOREIGN KEY (`Tanque_id`) REFERENCES `tanque` (`Tanque_id`),
  ADD CONSTRAINT `alimentacao_ibfk_2` FOREIGN KEY (`Produto_id`) REFERENCES `produtos` (`Produto_id`);

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`Produto_id`) REFERENCES `produtos` (`Produto_id`),
  ADD CONSTRAINT `estoque_ibfk_2` FOREIGN KEY (`Fornecedor_id`) REFERENCES `fornecedor` (`Fornecedor_id`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`Cadastro_id`) REFERENCES `cadastro` (`Cadastro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
