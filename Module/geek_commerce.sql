-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3200
-- Tempo de geração: 06/12/2023 às 14:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `geek_commerce`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `custo_unitario` float NOT NULL,
  `frete` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `path_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'decoracao'),
(2, 'camiseta'),
(3, 'jogo'),
(4, 'diversos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `sobrenome`, `cpf`, `email`, `telefone`, `cep`, `senha`) VALUES
(1, 'Gennyson', 'JR', '000.000.000-00', 'exemplo@gmail.com', '00099987', '66085-314', '1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `custo_unitario` float NOT NULL,
  `estoque` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `path_img` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `custo_unitario`, `estoque`, `categoria_id`, `path_img`, `descricao`) VALUES
(1, 'Jogo Hollow Knight - Nitendo Switch', 249.99, 200, 3, 'img/selecaoProdutos/Hollow Knight 125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(2, 'Jogo Super SmashBros - Nitendo Wii', 189.99, 200, 3, 'img/selecaoProdutos/smash_bros_brawl_box-produto 125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(3, 'Jogo Sonic Unleashed - Xbox 360', 59.99, 200, 3, 'img/selecaoProdutos/Sonic Unleashed125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(4, 'Jogo Homem Aranha - PS4', 149.99, 200, 3, 'img/selecaoProdutos/Homem Aranha125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(5, 'Action Figure Cavaleiro da Lua - Marvel Legend', 149.99, 200, 1, 'img/selecaoProdutos/Action Figure Cavaleiro DA Lua125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(6, 'Action Figure Cavaleiro da Lua - Marvel Legend', 189.99, 200, 1, 'img/selecaoProdutos/Action Venom125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(7, 'PlayStation 5 Fat Edition', 3999.99, 200, 3, 'img/selecaoProdutos/ps5125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(8, 'Livro : Batman - Morte Em Familia Jim Starlin', 99.99, 200, 4, 'img/selecaoProdutos/Livro  Batman  Morte Em Familia  Jim Starlin125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(9, 'Lego Dc Batman 76183 - Batcaverna O Confronto Com O Riddler', 199.99, 200, 4, 'img/selecaoProdutos/Lego Dc Batman 76183  Batcaverna O Confronto Com O Riddler125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(10, 'Conjunto Kit De Acessorios Do Naruto', 59, 200, 4, 'img/selecaoProdutos/Kit De Acessorios Do Naruto125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(11, 'Camisa clássica de Goku', 49.99, 200, 2, 'img/selecaoProdutos/camisa do goku 125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(12, 'Camisa da Akatsuke', 49.99, 200, 2, 'img/selecaoProdutos/Camisa Akatsuki125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(13, 'Livro : Demolidor O Rei da Cozinha do Inferno', 129.99, 200, 4, 'img/selecaoProdutos/Demolidor  O Rei da Cozinha do Inferno125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(14, 'Boné Superman - Edição Smallville', 29.99, 200, 4, 'img/selecaoProdutos/Boné Superman125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(15, 'FUNKO-POP-RIDES-NARUTO-SHIPPUDEN', 289.99, 200, 1, 'img/selecaoProdutos/FUNKO-POP-RIDES-NARUTO-SHIPPUDEN-EXCLUSIVE JIRAIYA-ON-TOAD125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(16, 'Caneca Jujutsu - Arco do Festival Cursed', 19.99, 200, 4, 'img/selecaoProdutos/Caneca Jujutso Kaisen125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(17, 'Lego Ninjago 71766 - Lloyd Legendary Dragon & Snake Toy', 299.99, 200, 4, 'img/selecaoProdutos/Lego Ninjago Lloyd Legendary Dragon & Snake Toy 71766 125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep'),
(18, 'Jogo Resident Evil 2 - Xbox', 129.99, 200, 3, 'img/selecaoProdutos/Resident Evil 2 - jogo 125x125.jpg', 'prem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consecut Duis aute irure dolor in rep');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
