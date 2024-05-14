-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Abr-2024 às 02:34
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
  `Data_alerta` datetime DEFAULT NULL,
  PRIMARY KEY (`Alerta_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`Alimentacao_id`),
  KEY `Tanque_id` (`Tanque_id`),
  KEY `Produto_id` (`Produto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE IF NOT EXISTS `cadastro` (
  `Cadastro_id` int NOT NULL AUTO_INCREMENT,
  `Data_demissao` date DEFAULT NULL,
  `Expediente` varchar(255) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  `Cargo` varchar(255) DEFAULT NULL,
  `Endereco` varchar(255) DEFAULT NULL,
  `Data_contratacao` date DEFAULT NULL,
  PRIMARY KEY (`Cadastro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `Estoque_ID` int NOT NULL AUTO_INCREMENT,
  `Produto_id` int DEFAULT NULL,
  `Fornecedor_id` int DEFAULT NULL,
  `Localizacao_produto` varchar(255) DEFAULT NULL,
  `Data_validade` date DEFAULT NULL,
  `Quantidade` int DEFAULT NULL,
  `Data_entrada` date DEFAULT NULL,
  `Data_saida` date DEFAULT NULL,
  PRIMARY KEY (`Estoque_ID`),
  KEY `Produto_id` (`Produto_id`),
  KEY `Fornecedor_id` (`Fornecedor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `Fornecedor_id` int NOT NULL AUTO_INCREMENT,
  `CNPJ_fornecedor` varchar(20) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Fornecedor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `Funcionario_id` int NOT NULL AUTO_INCREMENT,
  `Cadastro_id` int DEFAULT NULL,
  `Data_entrada` date DEFAULT NULL,
  `Hora_entrada` time DEFAULT NULL,
  `Hora_saida` time DEFAULT NULL,
  PRIMARY KEY (`Funcionario_id`),
  KEY `Cadastro_id` (`Cadastro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitura_manual`
--

DROP TABLE IF EXISTS `leitura_manual`;
CREATE TABLE IF NOT EXISTS `leitura_manual` (
  `Leitura_id` int NOT NULL AUTO_INCREMENT,
  `Teste_id` int DEFAULT NULL,
  `Data_leitura` datetime DEFAULT NULL,
  `Tipo_teste_quimico` varchar(255) DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  PRIMARY KEY (`Leitura_id`),
  KEY `Teste_id` (`Teste_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitura_sensor`
--

DROP TABLE IF EXISTS `leitura_sensor`;
CREATE TABLE IF NOT EXISTS `leitura_sensor` (
  `Leitura_sensor_id` int NOT NULL AUTO_INCREMENT,
  `Sensor_id` int DEFAULT NULL,
  `Data_litura` datetime DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  PRIMARY KEY (`Leitura_sensor_id`),
  KEY `Sensor_id` (`Sensor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Login_id` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Last_login` datetime DEFAULT NULL,
  `Funcionario_id` int DEFAULT NULL,
  PRIMARY KEY (`Login_id`),
  KEY `Funcionario_id` (`Funcionario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

DROP TABLE IF EXISTS `notificacao`;
CREATE TABLE IF NOT EXISTS `notificacao` (
  `Notificacao_id` int NOT NULL AUTO_INCREMENT,
  `Mensagem` text,
  `Data_envio` datetime DEFAULT NULL,
  PRIMARY KEY (`Notificacao_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `piscicultura`
--

DROP TABLE IF EXISTS `piscicultura`;
CREATE TABLE IF NOT EXISTS `piscicultura` (
  `Piscicultura_id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Localizacao` varchar(255) DEFAULT NULL,
  `Area_total` float DEFAULT NULL,
  PRIMARY KEY (`Piscicultura_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `Produto_id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Fornecedor_id` int DEFAULT NULL,
  `Produto` varchar(255) DEFAULT NULL,
  `Tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Produto_id`),
  KEY `Fornecedor_id` (`Fornecedor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `qualificacao_peixe`
--

DROP TABLE IF EXISTS `qualificacao_peixe`;
CREATE TABLE IF NOT EXISTS `qualificacao_peixe` (
  `Lote_id` int NOT NULL AUTO_INCREMENT,
  `Peixe_id` int DEFAULT NULL,
  `Quantidade_peixe` int DEFAULT NULL,
  `Peso_lote` float DEFAULT NULL,
  `Peso_unitario` float DEFAULT NULL,
  `Data_entrada_lote` date DEFAULT NULL,
  `Data_saida_lote` date DEFAULT NULL,
  PRIMARY KEY (`Lote_id`),
  KEY `Peixe_id` (`Peixe_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `Leitura_id` int DEFAULT NULL,
  `Leitura_sensor_id` int DEFAULT NULL,
  `Valvula_id` int DEFAULT NULL,
  `Tanque_id` int DEFAULT NULL,
  PRIMARY KEY (`Relatorio_id`),
  KEY `Leitura_id` (`Leitura_id`),
  KEY `Leitura_sensor_id` (`Leitura_sensor_id`),
  KEY `Valvula_id` (`Valvula_id`),
  KEY `Tanque_id` (`Tanque_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tanque`
--

DROP TABLE IF EXISTS `tanque`;
CREATE TABLE IF NOT EXISTS `tanque` (
  `Tanque_id` int NOT NULL AUTO_INCREMENT,
  `Capacidade_volume` float DEFAULT NULL,
  `Piscicultura_id` int DEFAULT NULL,
  PRIMARY KEY (`Tanque_id`),
  KEY `Piscicultura_id` (`Piscicultura_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_quimico`
--

DROP TABLE IF EXISTS `teste_quimico`;
CREATE TABLE IF NOT EXISTS `teste_quimico` (
  `Teste_id` int NOT NULL AUTO_INCREMENT,
  `Tanque_id` int DEFAULT NULL,
  PRIMARY KEY (`Teste_id`),
  KEY `Tanque_id` (`Tanque_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_peixe`
--

DROP TABLE IF EXISTS `tipo_peixe`;
CREATE TABLE IF NOT EXISTS `tipo_peixe` (
  `Peixe_id` int NOT NULL AUTO_INCREMENT,
  `Tanque_id` int DEFAULT NULL,
  `Especie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Peixe_id`),
  KEY `Tanque_id` (`Tanque_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sensor`
--

DROP TABLE IF EXISTS `tipo_sensor`;
CREATE TABLE IF NOT EXISTS `tipo_sensor` (
  `Tipo_sensor_id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Caracteristica` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Tipo_sensor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `valvula`
--

DROP TABLE IF EXISTS `valvula`;
CREATE TABLE IF NOT EXISTS `valvula` (
  `Valvula_id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Tanque_id` int DEFAULT NULL,
  PRIMARY KEY (`Valvula_id`),
  KEY `Tanque_id` (`Tanque_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
