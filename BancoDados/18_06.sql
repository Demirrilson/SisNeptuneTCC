-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Jun-2024 às 17:53
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

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
  `Horario` time(4) NOT NULL,
  `Tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Quantidade` double NOT NULL,
  `Anotacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Data_alerta` date DEFAULT NULL,
  `Tanque` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Produto` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Alerta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `alerta`
--

INSERT INTO `alerta` (`Alerta_id`, `Horario`, `Tipo`, `Quantidade`, `Anotacao`, `Data_alerta`, `Tanque`, `Produto`) VALUES
(11, '10:20:00.0000', 'alimentacao', 2, 'a', '2024-05-24', '10', ''),
(12, '00:00:08.0000', 'alimentacao', 2, 'a', '2024-05-23', 'Tanque 3', ''),
(13, '15:01:00.0000', 'çç', 2, '', '2024-06-14', 'Tanque 1', 'Alimentos Vivos'),
(14, '14:27:00.0000', 'Alimentação', 30, '', '2024-06-18', 'Tanque 1', 'Alimentos Vivos'),
(15, '14:27:00.0000', 'Alimentação', 30, '', '2024-06-19', 'Tanque 1', 'Alimentos Vivos');

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
(2, 16, 7, '2024-04-03', '16:50:00', 'Racao', 4),
(3, 16, 7, '2024-04-03', '16:50:00', 'Racao', 4);

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
  `Rua` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Bairro` varchar(100) NOT NULL,
  `Numero` int NOT NULL,
  `Complemento` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Data_contratacao` date DEFAULT NULL,
  `Data_demissao` date DEFAULT NULL,
  `Expediente` varchar(255) DEFAULT NULL,
  `Senha` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Cadastro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`Cadastro_id`, `Nome`, `Email`, `Telefone`, `Cargo`, `Salario`, `CEP`, `Rua`, `Bairro`, `Numero`, `Complemento`, `Data_contratacao`, `Data_demissao`, `Expediente`, `Senha`) VALUES
(11, 'Breno', 'breno@gmail', '119786533', 'Pedreiro', 2, 8253000, 'rua virginia ferni', 'itaquera', 8, 'ruinha ne vidas', '2024-05-01', '2024-04-02', 'Tarde', ''),
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`Estoque_id`, `Produto_id`, `Fornecedor_id`, `Localizacao_produto`, `Data_validade`, `Quantidade`, `Data_entrada`, `Data_saida`) VALUES
(13, 7, 7, NULL, '2024-06-11', 2, '2024-06-11', '0000-00-00'),
(16, 7, 8, NULL, '2024-06-03', 2, '2024-06-12', '0000-00-00'),
(18, 7, 7, NULL, '2024-06-14', 2, '2024-06-14', '0000-00-00');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`Fornecedor_id`, `CNPJ_Fornecedor`, `Nome`, `Email`, `Telefone`) VALUES
(7, '02002351', 'AquaFeed Solutions', 'aquafeed@gmail.com', '11998847263'),
(8, '1452328', 'NutriFish Premium Feeds', 'nutrifish@gmail.com', '11987263454'),
(9, '1785085', 'BlueWave Aquatics', 'blueWave@gmail.com', '11902283647');

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
  `Tanque_id` int DEFAULT NULL,
  PRIMARY KEY (`Leitura_id`),
  KEY `fk_leitura_manual_tanque` (`Tanque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `leitura_manual`
--

INSERT INTO `leitura_manual` (`Leitura_id`, `Valor`, `Data_leitura`, `PH`, `Nivel_oxigenio`, `Tanque_id`) VALUES
(1, '2.00', '2024-04-02', '2.00', '2.00', 16),
(2, '7.00', '7777-07-07', '7.00', '7.00', 17),
(3, '1.00', '1111-11-11', '1.00', '1.00', 16),
(4, '1.00', '1111-11-11', '1.00', '1.00', 17),
(5, '10.00', '2065-05-25', '20.00', '10.00', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitura_sensor`
--

DROP TABLE IF EXISTS `leitura_sensor`;
CREATE TABLE IF NOT EXISTS `leitura_sensor` (
  `Leitura_sensor_id` int NOT NULL AUTO_INCREMENT,
  `Valor` decimal(10,2) DEFAULT NULL,
  `Data_leitura` datetime DEFAULT NULL,
  `Tipo_sensor_id` int NOT NULL,
  `Tanque_id` int DEFAULT NULL,
  PRIMARY KEY (`Leitura_sensor_id`),
  KEY `fk_leitura_sensor_tipo_sensor` (`Tipo_sensor_id`),
  KEY `fk_leitura_sensor_tanque` (`Tanque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `leitura_sensor`
--

INSERT INTO `leitura_sensor` (`Leitura_sensor_id`, `Valor`, `Data_leitura`, `Tipo_sensor_id`, `Tanque_id`) VALUES
(21, '28.50', '2024-05-13 00:00:00', 1, 16),
(22, '28.62', '2024-05-13 00:00:00', 2, 16),
(23, '28.56', '2024-05-13 00:00:00', 1, 17),
(24, '28.62', '2024-05-13 00:00:00', 3, 17);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Estrutura da tabela `tanque`
--

DROP TABLE IF EXISTS `tanque`;
CREATE TABLE IF NOT EXISTS `tanque` (
  `Tanque_id` int NOT NULL AUTO_INCREMENT,
  `Piscicultura_id` int DEFAULT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Tipo` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Largura` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Altura` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Quantidade_peixe` int NOT NULL,
  `capacidade_volume` double NOT NULL,
  PRIMARY KEY (`Tanque_id`),
  KEY `Piscicultura_id` (`Piscicultura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tanque`
--

INSERT INTO `tanque` (`Tanque_id`, `Piscicultura_id`, `Nome`, `Tipo`, `Largura`, `Altura`, `Quantidade_peixe`, `capacidade_volume`) VALUES
(16, 5, 'Tanque 1', '-', '3m', '5m', 30, 0),
(17, 6, 'Tanque 2', '-', '3m', '5m', 30, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_quimico`
--

DROP TABLE IF EXISTS `teste_quimico`;
CREATE TABLE IF NOT EXISTS `teste_quimico` (
  `Teste_id` int NOT NULL AUTO_INCREMENT,
  `Tanque_id` int DEFAULT NULL,
  `Tipo_teste` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Horario` time NOT NULL,
  `Data_leitura` date DEFAULT NULL,
  `Resultado` double NOT NULL,
  PRIMARY KEY (`Teste_id`),
  KEY `Tanque_id` (`Tanque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `teste_quimico`
--

INSERT INTO `teste_quimico` (`Teste_id`, `Tanque_id`, `Tipo_teste`, `Horario`, `Data_leitura`, `Resultado`) VALUES
(8, 16, 'Amônia', '17:00:00', '2024-05-19', 2),
(14, 17, 'PH', '00:00:20', '2024-06-11', 7);

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
(1, 'Sensor de Temperatura', 'DS18B20'),
(2, 'Sensor de Turbidez', 'DTS'),
(3, 'Sensor Ultrasônico', 'HC-SR04');

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

--
-- Limitadores para a tabela `leitura_manual`
--
ALTER TABLE `leitura_manual`
  ADD CONSTRAINT `fk_leitura_manual_tanque` FOREIGN KEY (`Tanque_id`) REFERENCES `tanque` (`Tanque_id`),
  ADD CONSTRAINT `fk_tanque` FOREIGN KEY (`Tanque_id`) REFERENCES `tanque` (`Tanque_id`);

--
-- Limitadores para a tabela `leitura_sensor`
--
ALTER TABLE `leitura_sensor`
  ADD CONSTRAINT `fk_leitura_sensor_tanque` FOREIGN KEY (`Tanque_id`) REFERENCES `tanque` (`Tanque_id`),
  ADD CONSTRAINT `fk_leitura_sensor_tipo_sensor` FOREIGN KEY (`Tipo_sensor_id`) REFERENCES `tipo_sensor` (`Tipo_sensor_id`);

--
-- Limitadores para a tabela `teste_quimico`
--
ALTER TABLE `teste_quimico`
  ADD CONSTRAINT `fk2_tanque` FOREIGN KEY (`Tanque_id`) REFERENCES `tanque` (`Tanque_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
