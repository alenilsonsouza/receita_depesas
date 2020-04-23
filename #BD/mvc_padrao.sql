-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Abr-2020 às 15:53
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mvc_bootstrap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Alenilson Souza', 'alenilsonsouza@gmail.com', 'Assunto Teste', 'Hoje estou com uma dúvida sobre', '2020-04-11'),
(2, 'Paulo', 'paulo@gmail.com', 'Assunto Teste2', 'Mensagem de Teste', '2020-04-11'),
(3, 'Andre', 'andre@gmail.com', 'Assunto teste', 'Mensagem de exemplo ', '2020-04-11');

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
(3, 'Alenilson Souza', 'alenilsonsouza@gmail.com', '$2y$10$sZsGwR1XOIZE2jJ9cMqFVuzUAmROL0eqR8TTz9NhAxX3UdKe4N7PK', '2020-04-11', '5669af207edc0391761328b0516b2a61', 1),
(8, 'Ciclano', 'ciclano@gmail.com', '$2y$10$99Rm7at.Ur3B1fiqTNotY.x6GFkM7rpzBkpPb/sQjJ03QvYZ9KRua', '2020-04-11', '1defae2a8211431b4e96bd5700052559', 3),
(9, 'Beltrano', 'beltrano@gmail.com', '$2y$10$bLgCW4Jiu0j1bWUQi8cjgePwhQmMhkQCnd6RAn7coR7jRh8MDP4t.', '2020-04-11', 'c5aadb2032ee8dcb7a49b4cd1c90791e', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contact`
--
ALTER TABLE `contact`
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
-- AUTO_INCREMENT de tabela `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
