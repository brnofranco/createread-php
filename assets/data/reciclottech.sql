-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2022 às 01:36
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reciclottech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `locations`
--

CREATE TABLE `locations` (
  `name` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `cep` bigint(8) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `locations`
--

INSERT INTO `locations` (`name`, `category`, `address`, `cep`, `image_path`, `id`) VALUES
('Kalunga Jundiaí', 'Periféricos', 'Av. Jundiaí, 1465 – Jardim Ana Maria, Jundiaí – SP', 13208053, './public/locations/d2372fa4c4f4c96c0b87b58358d53485.jpg', 3),
('Casas Bahia Jundiaí', 'Eletrodomésticos', 'R. Barão de Jundiaí, 782 – Centro, Jundiaí – SP', 13201010, './public/locations/2f7193d8a595834c89e68f325f5ba119.png', 4),
('Pontofrio Jundiaí', 'Televisores', 'R. Barão de Jundiaí, 684 – Centro, Jundiaí - SP', 13201011, './public/locations/68463f742e9f1aad69c7d2e39880f09a.png', 5),
('Geresol', 'Eletrodomésticos', 'Av. Yamashita Yukio, 1268 - Distrito Industrial, Jundiaí - SP', 13213010, './public/locations/872cf9a44c89bdc1f192fb6d566a7d36.png', 6),
('Fatec Jundiaí', 'Placas de circuitos', 'Av. União dos Ferroviários, 1760 - Centro, Jundiaí - SP', 13201160, './public/locations/4d10ff1ececa02ecfdd2b056b7cce436.jpg', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `user` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`user`, `id`, `title`, `category`, `quantity`, `date`) VALUES
('bruno@gmail.com', 2, 'Televisão tubão', 'Televisores', 1, '2022-06-06'),
('bruno@gmail.com', 4, 'Rádio do meu vô', 'Rádios', 1, '2022-06-07'),
('bruno@gmail.com', 5, 'Geladeira amarela', 'Eletrodomésticos', 1, '2022-06-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `name` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cep` int(8) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`name`, `email`, `cep`, `password`, `id`) VALUES
('admin', 'admin@admin.com', 123123123, '123', 1),
('Bruno Fran', 'bruno@gmail.com', 12312312, '123', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
