-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Maio-2020 às 01:51
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `receita_despesa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `installment`
--

CREATE TABLE `installment` (
  `id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movement`
--

CREATE TABLE `movement` (
  `id` int(11) NOT NULL,
  `installment_id` int(11) DEFAULT 0,
  `name` varchar(180) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT 0,
  `desccount` float DEFAULT 0,
  `addition` float DEFAULT 0,
  `type` varchar(20) NOT NULL DEFAULT 'credit' COMMENT 'credit, debit',
  `due_date` date NOT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movement`
--

INSERT INTO `movement` (`id`, `installment_id`, `name`, `price`, `desccount`, `addition`, `type`, `due_date`, `payment_date`) VALUES
(9, 0, 'Aluguel', 350, 0, 0, 'debit', '2020-05-10', NULL),
(10, 0, 'Luz', 130, 0, 0, 'debit', '2020-05-07', '0000-00-00'),
(11, 0, 'Cliente', 500, 0, 0, 'credit', '2020-05-01', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '0',
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `script` text DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `site`
--

INSERT INTO `site` (`id`, `name`, `description`, `keywords`, `script`, `email`) VALUES
(1, 'Alenilson Souza', 'Minha descrição do site', 'atenção, exemplo', '', 'alenilsonsouza@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL DEFAULT '0',
  `email` varchar(150) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `token` varchar(80) DEFAULT '',
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - Desenvolvedor, 2 Admin, 3 Usuário'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `token`, `type`) VALUES
(3, 'Alenilson Souza', 'alenilsonsouza@gmail.com', '$2y$10$sZsGwR1XOIZE2jJ9cMqFVuzUAmROL0eqR8TTz9NhAxX3UdKe4N7PK', '2020-04-11', 'a2ada36e0cf8d13268a157065e0897fb', 1),
(8, 'Ciclano', 'ciclano@gmail.com', '$2y$10$99Rm7at.Ur3B1fiqTNotY.x6GFkM7rpzBkpPb/sQjJ03QvYZ9KRua', '2020-04-11', '1defae2a8211431b4e96bd5700052559', 3),
(9, 'Beltrano', 'beltrano@gmail.com', '$2y$10$bLgCW4Jiu0j1bWUQi8cjgePwhQmMhkQCnd6RAn7coR7jRh8MDP4t.', '2020-04-11', 'c5aadb2032ee8dcb7a49b4cd1c90791e', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `installment`
--
ALTER TABLE `installment`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movement`
--
ALTER TABLE `movement`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `site`
--
ALTER TABLE `site`
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
-- AUTO_INCREMENT de tabela `installment`
--
ALTER TABLE `installment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movement`
--
ALTER TABLE `movement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
