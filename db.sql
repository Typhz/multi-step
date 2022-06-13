-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2022 às 17:30
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `multi-step-form`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `marketing`
--

CREATE TABLE `marketing` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `marketing`
--

INSERT INTO `marketing` (`id`, `name`, `email`) VALUES
(102, 'Patrick de Araújo Bernardo dos Reis', 'patrickbernardr@gmail.com'),
(103, 'Patrick de Araújo Bernardo dos Reis', 'patrickbernardor@gmail.com'),
(104, 'Patrick de Araújo Bernardo dos Reis', 'patrickbernar2dor@gmail.com'),
(105, 'Patrick de Araújo Bernardo dos Reis', 'patrickbernador@gmail.com'),
(106, 'Patrick de Araújo Bernardo dos Reis', 'patrickberna2rdor@gmail.com'),
(107, 'Patrick de Araújo Bernardo dos Reis', 'patrickbern2ardor@gmail.com'),
(108, 'teste', 'test@gmail.com'),
(109, 'teste', 'test@gmail.coma'),
(110, 'Patrick de Araújo Bernardo dos Reis', 'patrickbernardo@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `nasc` date NOT NULL,
  `insc_stad` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `street_number` int(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `cel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `email`, `password`, `cpf`, `cnpj`, `nasc`, `insc_stad`, `cep`, `street`, `street_number`, `city`, `state`, `tel`, `cel`) VALUES
(41, 'Patrick de Araújo Bernardo dos Reis', 'Pk', 'patrickbernardor@gmail.com', '68b4c8a95a75969573ef0a1d81607cd0', '', '40071884000190', '0000-00-00', '123123123123', '21070780', 'Rua Virgílio Várzea', 88, 'Rio de Janeiro', 'RJ', '', '21988255634');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
