-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/03/2025 às 01:19
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
-- Banco de dados: `dev_experience`
--
CREATE DATABASE IF NOT EXISTS dev_experience;
USE dev_experience;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `nome_equipe_avaliacao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nota_modulo_a_avaliacao` float NOT NULL,
  `nota_modulo_b_avaliacao` float NOT NULL,
  `nota_modulo_c_avaliacao` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_avaliacao`, `nome_equipe_avaliacao`, `nota_modulo_a_avaliacao`, `nota_modulo_b_avaliacao`, `nota_modulo_c_avaliacao`) VALUES
(1, 'Byte Brothers', 50, 175, 65),
(2, 'Cod3rs', 80, 50, 79),
(3, 'Code Busters', 132, 131.25, 60),
(4, 'Cognitronix', 55, 0, 28),
(5, 'Comando Dev', 0, 0, 0),
(6, 'dev.log', 141.25, 175, 100),
(7, 'DuoStudyingCodes', 132, 200, 53),
(8, 'FLLCode', 90, 0, 54),
(9, 'IPV4', 0, 0, 0),
(10, 'KLK', 15, 0, 0),
(11, 'M&X Legends', 0, 0, 0),
(12, 'Sauces', 0, 0, 0),
(13, 'Team M&D', 0, 0, 0),
(14, 'Mosaic Wave', 191, 0, 95),
(15, 'MPM Devs', 90, 0, 53),
(16, 'MYL', 30, 0, 55),
(17, 'Petronas', 0, 0, 0),
(18, 'PHPHaters', 271.25, 100, 61),
(19, 'Tri-Logica', 0, 0, 0),
(20, 'Sistema Pifou', 183, 0, 0),
(21, 'TechTrio', 72, 0, 34),
(22, 'Tecnoway', 150, 200, 124),
(24, 'TriMatrix', 90, 0, 52),
(25, 'Triple X', 90, 0, 0),
(26, 'Tribo dos Rom?nticos', 128, 0, 58),
(28, 'ALT F4', 68, 200, 116),
(29, 'ByteCode', 148, 131.25, 115),
(30, 'Code Wizards ', 63, 175, 52),
(31, 'CodeTriad', 90, 175, 39),
(32, 'DPM', 8, 87.5, 0),
(33, 'Dynamic Duo', 33, 0, 0),
(34, 'Fogo F?tuo', 30, 0, 0),
(35, 'Garcia', 38, 0, 0),
(36, 'Gavi?es da Experience', 16, 0, 0),
(37, 'invictas', 90, 0, 40),
(38, 'Master Of Codes', 75.5, 131.25, 115),
(39, 'NexusPower', 115, 0, 45),
(40, 'RGS', 38, 0, 45),
(41, 'Squad LJR', 80, 87.5, 73),
(42, 'Team LR', 130.5, 0, 28),
(43, 'Tech Titans', 62.5, 0, 10),
(44, 'Tech Whiz', 114.5, 87.5, 71),
(45, 'Tesouro Bin?rio', 115, 87.5, 106),
(46, 'PinschersDev', 55, 0, 78),
(48, 'The Debug TRIOS', 123, 0, 68),
(49, 'TechDinasty', 211.25, 175, 89),
(50, 'TechDynasty', 98, 0, 48);

-- --------------------------------------------------------

--
-- Estrutura para tabela `escola`
--

CREATE TABLE `escola` (
  `escola_id` int(11) NOT NULL,
  `escola_nome` varchar(255) NOT NULL,
  `escola_cfp` varchar(100) NOT NULL,
  `escola_cidade` varchar(255) NOT NULL,
  `escola_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `escola`
--

INSERT INTO `escola` (`escola_id`, `escola_nome`, `escola_cfp`, `escola_cidade`, `escola_status`) VALUES
(1, 'Escola e Faculdade F?lix Guisard', 'CFP 3.01', 'Taubat?', 1),
(2, 'Escola Senai Santos Dumont', 'CFP 3.02', 'S?o Jos? dos Campos', 0),
(3, 'Escola Sesi Ca?apava', 'CE 207', 'Ca?apava', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscricoes`
--

CREATE TABLE `inscricoes` (
  `id_inscricao` int(11) NOT NULL,
  `nome_equipe_inscrito` varchar(255) NOT NULL,
  `nome_inscrito1` varchar(250) NOT NULL,
  `email_inscrito1` varchar(100) NOT NULL,
  `cpf_inscrito1` varchar(64) NOT NULL,
  `nome_inscrito2` varchar(250) NOT NULL,
  `email_inscrito2` varchar(100) NOT NULL,
  `cpf_inscrito2` varchar(64) NOT NULL,
  `nome_inscrito3` varchar(250) DEFAULT NULL,
  `email_inscrito3` varchar(100) DEFAULT NULL,
  `cpf_inscrito3` varchar(64) DEFAULT NULL,
  `escola_inscrito` int(11) NOT NULL,
  `termos_inscrito` enum('aceito') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `inscricoes`
--

INSERT INTO `inscricoes` (`id_inscricao`, `nome_equipe_inscrito`, `nome_inscrito1`, `email_inscrito1`, `cpf_inscrito1`, `nome_inscrito2`, `email_inscrito2`, `cpf_inscrito2`, `nome_inscrito3`, `email_inscrito3`, `cpf_inscrito3`, `escola_inscrito`, `termos_inscrito`) VALUES
(30, 'TechTrio', 'Rafael Gustavo Leal dos Santos', 'rleal3105@gmail.com', '47849423860', 'Gustavo Henrique de Almeida Martins', 'gutiloloeju@gmail.com', '42750886899', 'Murilo Ferreira Faria Santana', 'murilo.bil7@gmail.com', '48439471807', 3, 'aceito'),
(31, 'The Debug TRIOS', 'Murilo Henrique de Souza SIlva', 'murilohdss2906@gmail.com', '48006933812', 'Andrey Montibeller de Toledo', 'andreymontibeller02@gmail.com', '47849046897', 'Samuel Boaz de Morais Gon?alves', 'samuelboaz6@gmail.com', '47828548893', 3, 'aceito'),
(32, 'MPM Devs', 'Matheus Arantes Villar', 'matheusvillarcpv@gmail.com', '47799891831', 'Miguel Borges da Silva', 'miguelborgess2016@gmail.com', '48226643848', 'Pedro Henrique de Petta Zocatelli', 'pedrohenriquezocatelli@gmail.com', '44907134878', 3, 'aceito'),
(33, 'Triple X', 'Miguel Francisco da Silva Sales', 'miguelfranciscodasilvasalessal@gmail.com', '44162836876', 'Victor Luiz Koba Batista', 'victorkoba08@gmail.com', '47801268865', 'Kau? de Albuquerque Almeida', 'albuquerquealmeidakaua@gmail.com', '00000000000', 3, 'aceito'),
(34, 'Code Busters', 'Joao Gustavo Mota Ramos', 'joaogustavo2202@gmail.com', '41351408828', 'Jo?o Pedro da Cunha Machado', 'jotapepe.machado@gmail.com', '47847633841', 'Gabriel Moreira Gon?alves', 'gabrielmgseg@gmail.com', '43316745840', 3, 'aceito'),
(35, 'DuoStudyingCodes', 'Nicole de Oliveira Cafalloni', 'nicolecafalloni9@gmail.com', '47400376888', 'Jacquys da Silva Barbosa', 'jacquys0801@gmail.com', '46739623899', '', '', '', 3, 'aceito'),
(38, 'Cod3rs', 'Kaique Bernardes Ferreira', 'kaique1245br@gmail.com', '47572623883', 'Yago Roberto Gomes Moraes', 'yago.roberto2008@gmail.com', '47853445806', 'Isadora Gomes da Silva', 'isasilvacpv@gmail.com', '47800369846', 3, 'aceito'),
(39, 'Byte Brothers', 'J?lia da Silva Conconi', 'conconijulia@gmail.com', '44217239831', 'Rian Eduardo de Brito Prado', 'rianedupz@gmail.com', '44283529800', '', '', '', 3, 'aceito'),
(40, 'FLLCode', 'Lucas Randal Abreu Balderrama', 'abreulucas3715@gmail.com', '47831777830', 'Flavia Glenda Guimar?es Carvalho', 'flaviaglenda15@gmail.com', '43437431870', 'Lanna Kamilly Fres Mota', 'lannakamillyfresmota@gmail.com', '47849328876', 3, 'aceito'),
(41, 'TriMatrix', 'J?lia Fortunato dos Santos', 'juliafortunat24@gmail.com', '47538479856', 'Luiz Gustavo da Silva Santana', 'luizinhogucpv@gmail.com', '47829498806', 'Cibely Cristiny dos Santos', 'cibelycristiny0810@gmail.com', '47850674898', 3, 'aceito'),
(42, 'dev.log', 'Ana L?via dos Santos Lopes', 'ana.livia.santos.lopes@gmail.com', '47827116892', 'Guilherme Ricardo de Paiva', 'guilhermepaiva2007@gmail.com', '54374276890', 'Gabriel Reis de Brito', 'gabrito343@gmail.com', '45434040848', 3, 'aceito'),
(43, 'PHPHaters', 'Pedro Gabriel Moreira dos Santos ', 'pedrogabrielxx268@gmail.com', '41047055864', 'Matheus Arcangelo Pestana', 'matheus90pestana@gmail.com', '54420719869', 'Jo?o Victor Santos Ruas', 'ruasjoaovictorsantos@gmail.com', '49122337814', 3, 'aceito'),
(44, 'Comando Dev', 'Rafael Henrique Braga de Morais', 'celiodomingospereira@gmail.com', '47371972899', 'Cadmiel Torres de Lima', 'cadmiel.torres.lima1@gmail.com', '47407469806', '', '', '', 3, 'aceito'),
(45, 'KLK', 'Kau? Brito Ribeiro', 'kauebrito654@gmail.com', '47630997876', 'Kau? Roberto Silva', 'kaua.rsrsnc@gmail.com', '40275193888', 'Leonardo Lopes Do Nascimento', 'leo.cppv@gmail.com', '47344265893', 3, 'aceito'),
(46, 'Petronas', 'Emilly Vilela  de Souza', 'emillyyvilela@gmail.com', '48521347820', 'Bruna Cec?lia Vit?rio dos Santos ', 'brunavitoriosantos3@gmail.com', '48543599865', 'Vit?ria Karoline de Carvalho Bernardo ', 'vitoriabernardodev@gmail.com', '47163921802', 3, 'aceito'),
(47, 'Sistema Pifou', 'Mariana Ferreira Morgado', 'mariffmorgado@gmail.com', '53847950851', 'Kathleen Corr?a Santos Souza', 'katycorreass@gmail.com', '48547287876', 'Luana Aparecida Tavares', 'tavaresluanace207@gmail.com', '47511620809', 3, 'aceito'),
(58, 'Tri-Logica', 'Carine Geovana ', 'carinegnmotta@gmail.com', '47476776828', 'Geovanna Clara Galhote Gois Silva', 'geovannagalhote9@gmail.com', '44606207825', 'Thiago Felipe de Oliveira Ribeiro', 'thiagoribeiro.bb@gmail.com', '47450766817', 3, 'aceito'),
(59, 'Tecnoway', 'Vitor Antonio Vieira da Silva', 'vitoravs008@gmail.com', '47389666854', 'Gabriel Camargo de Souza Borges', 'borgesgs369@gmail.com', '47401977826', 'Alice de Lima Assis', 'alice.assis004@gmai.com', '48498722802', 3, 'aceito'),
(60, 'MYL', 'Yasmin Siqueira Lobo', 'yasminsiqueiralobo@gmail.com', '47365492899', 'Lana Barbosa Camelo de Ara?jo', 'lana.academico2@gmail.com', '14716030407', 'Mariane Let?cia de Souza Moreira', 'souzamoreiramarianeleticia@gmail.com', '54535512833', 3, 'aceito'),
(61, 'IPV4', 'Igor Daniel dos Santos Dias', 'igor.danielesu@gmail.com', '48544954804', 'Pedro Henrique Ferreira Silva', 'peedroferreira2306@gmail.com', '46301182847', '', '', '', 3, 'aceito'),
(62, 'Mosaic Wave', 'Tain? Moreira Vieira Menegatti', 'taiixz47@gmail.com', '42734867842', 'Pedro Lucas Ferreira Farias', 'pedrolffarias19@gmail.com', '44030524877', '', '', '', 3, 'aceito'),
(63, 'Cognitronix', 'Jo?o Paulo Leite Geraldo ', 'joaopaulo69931@gmail.com', '50444698825', 'Kau? de Souza Santos ', 'skaue3222@gmail.com', '45024878809', '', '', '', 3, 'aceito'),
(64, 'Code Wizards ', 'Cau? Gaia Leite', 'cauagaia78@gmail.com', '47797623830', 'Vinicius de Campos Ferreira', 'vinicampos2008@gmail.com', '47820452803', 'Pedro de Lima Cavalcanti', 'pedrolimaservice2@gmail.com', '47800075850', 1, 'aceito'),
(65, 'Tech Whiz', 'Ana Carolina Gon?alves', 'goncalves.anacaroll5@gmail.com', '49958124823', 'Bryan Camara da Silva', 'camarabryan08@gmail.com', '49338879852', 'Ana Clara Marinho Miranda', 'anamarinho2107@gmail.com', '47800820807', 1, 'aceito'),
(66, 'Team LR', 'Leonardo Vinicius do Prado', 'leonardo.pradosenai@gmail.com', '45668366812', 'Renan Ramos Capeleti', 'renan.capeletisenai@gmail.com', '44284466836', '', '', '', 1, 'aceito'),
(67, 'ALT F4', 'Jo?o Vitor dos Santos de Souza', 'joaovitorss120903@gmail.com', '53072996806', 'Lucca Castilho Costa', 'luccacastilho13@gmail.com', '52340323886', 'Vinicius Andrade Dias', 'viniad2611@gmail.com', '46305217807', 1, 'aceito'),
(68, 'Garcia', 'Kauan Alejandro Da Rosa', 'kauan.alejandrosenai@gmail.com', '46142052839', 'Davi Garcia Roncon', 'dadovivo66@gmail.com', '46872355816', '', '', '', 1, 'aceito'),
(69, 'Squad LJR', 'Lucas Souza da Silva', 'lucas.ssouzasenai@gmail.com', '46935582814', 'Jo?o Gabriel Floriano Ol?mpio', 'joao.florianosenai@gmail.com', '47232261845', 'Raissa Verardi Brito Concei??o', 'raverardi13@gmail.com', '42421031826', 1, 'aceito'),
(70, 'Tech Titans', 'Anami Miranda Takaoka', 'anamitakaoka@gmail.com', '42785990803', 'Maria J?lia Almeida', 'maju.almeida.senai@gmail.com', '47993751802', 'Larissa Giulia Vasconcellos', 'larissa.vasconcellossenai@gmail.com', '48426716881', 1, 'aceito'),
(71, 'Sauces', 'Vin?cius Roberto Sousa dos Santos', 'senaivinicius1@gmail.com', '46400783822', 'Ana Clara Medeiros Silva', 'anaclarasenai007@gmail.com', '53198426863', 'Ronaldo Cesar S?vio Vilela', 'ronaldosaviovilela2007@gmail.com', '42501927842', 1, 'aceito'),
(72, 'ByteCode', 'Ana Julia Nogaroto', 'najungt07@gmail.com', '46167381810', 'Cau? Sotero Moreira de Souza', 'soterocaue2@gmail.com', '46883882847', 'Guilherme Yan de Almeida Leite ', 'guiyan.leite@gmail.com', '51372752803', 1, 'aceito'),
(73, 'CodeTriad', 'P?mela da Silva Santos', 'pamela.07.ssilva@gmail.com', '46897477842', 'Vit?ria Gabriely Camargo de Freitas', 'vitoria.2013gabrielyy@gmail.com', '50289901820', 'Lav?nia Cristina M?lo da Luz', 'lavinia.luz620@gmail.com', '46282405823', 1, 'aceito'),
(74, 'TechDinasty', 'Raiane Yasmin Santos Tozeto', 'ray.tozeto@gmail.com', '46880683878', 'Guilherme dos Santos Luz', 'sguilhermeluz@gmail.com', '46859878886', 'Marcus Vin?cius Candido de Oliveira', 'mvcoliveira1612@gmail.com', '43501651856', 1, 'aceito'),
(75, 'NexusPower', 'Bento Gabriel Ferreira Marcondes', 'bentoferreiramarcondes@gmail.com', '41750172836', 'Pedro Henrique Braga dos Santos Silva', 'spedrohenrique487@gmail.com', '46304795890', 'Wendell Gomes Alves Ribeiro', 'gwendell921@gmail.com', '46854084890', 1, 'aceito'),
(76, 'Fogo F?tuo', 'Lucca Pontes Homero', 'homero.lucca1@gmail.com', '46082799801', 'Eduardo Walace daSilva', 'eduardowalace2@gmail.com', '47473501879', '', '', '', 1, 'aceito'),
(77, 'RGS', 'Rayanne Mayza Moreira De Oliveira', 'rayannemayza2@gmail.com', '51841820806', 'Gabriel Scalambra Dos Santos ', 'gabrielscalambr@gmail.com', '46377079869', '', '', '', 1, 'aceito'),
(79, 'invictas', 'Isabelle Cristine Charleaux de Almeida', 'isabellecharleaux4@gmail.com', '46277850890', 'Tamires Alvissus Fernandes', 'talvissus@gmail.com', '47155824810', '', '', '', 1, 'aceito'),
(82, 'Master Of Codes', 'Lu?s Gustavo Cesar Consoli de Almeida', 'Luis.consoli14@gmail.com', '23693705801', 'Cau? Figueiredo Fialho Rodrigues', 'cauaffrodrigues@gmail.com', '40783556845', 'Leonardo Bastos Roa', 'lroa7094@gmail.com', '47801757807', 1, 'aceito'),
(83, 'PinschersDev', 'Cibeli Aparecida Mathias Garcia', 'cibeli.garcia7@gmail.com', '46673791896', 'Luis Augusto dos Santos Silva', 'luis.agsilva22@gmail.com', '47344009897', '', '', '', 3, 'aceito'),
(84, 'M&X Legends', 'Geovane Affonso Lazarini Neves', 'geovaneneves068@gmail.com', '46296314884', 'Jo?o Vitor Mendes de Oliveira dos Santos', 'joao.mendes3682@gmail.com', '43759283870', '', '', '', 1, 'aceito'),
(85, 'Team M&D', 'Maria Clara Mendes', 'mendesmariiaa18@gmail.com', '46883809848', 'Daniel Jos? Albino', 'neideciribeiro@gmail.com', '46311413876', '', '', '', 1, 'aceito'),
(86, 'TechDynasty', 'Adriana Savio Arruda', 'adrianasavioa@gmail.com', '43629037801', 'Gustavo Rocha Borges', 'gustavotchor567@gmail.com', '46873679844', '', '', '', 1, 'aceito'),
(87, 'DPM', 'Aluno1', 'aluno1@teste.com', '1234565432345', 'Aluno1', 'aluno1@teste.com', '2345654321234', NULL, NULL, NULL, 1, 'aceito'),
(88, 'Gavi?es da Experience', 'Aluno1', 'aluno1@teste.com', '234565432345', 'ALuno1', 'Aluno1@teste.com', '34321234567e', NULL, NULL, NULL, 1, 'aceito'),
(90, 'Tesouro Bin?rio', 'Aluno1', 'aluno1@teste.com', '65456789876543', 'ALuno1', 'aluno1@teste.com', '456349320334', NULL, NULL, NULL, 1, 'aceito'),
(91, 'Dynamic Duo', 'Aluno1', 'aluno1@teste.com', '43562734637', 'Aluno1', 'aluno1@teste.com', '65434567876543', NULL, NULL, NULL, 1, 'aceito'),
(97, 'Tribo dos Rom?nticos', 'Caio', 'caio@teste.com', '65445678982', 'Jo?o Pedro', 'joaop@teste.com', '76543456785', NULL, NULL, NULL, 3, 'aceito');

--
-- Acionadores `inscricoes`
--
DELIMITER $$
CREATE TRIGGER `criar_usuarios_para_equipe` AFTER INSERT ON `inscricoes` FOR EACH ROW BEGIN
    -- Insere o primeiro usu?rio, que sempre deve estar presente
    INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario)
    VALUES (NEW.nome_inscrito1, NEW.email_inscrito1, PASSWORD('12345'));

    -- Verifica se h? um segundo inscrito e o insere se estiver presente
    IF NEW.nome_inscrito2 IS NOT NULL AND NEW.nome_inscrito2 != '' THEN
        INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario)
        VALUES (NEW.nome_inscrito2, NEW.email_inscrito2, PASSWORD('12345'));
    END IF;

    -- Verifica se h? um terceiro inscrito e o insere se estiver presente
    IF NEW.nome_inscrito3 IS NOT NULL AND NEW.nome_inscrito3 != '' THEN
        INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario)
        VALUES (NEW.nome_inscrito3, NEW.email_inscrito3, PASSWORD('12345'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reset_tokens`
--

CREATE TABLE `reset_tokens` (
  `id` int(11) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `criado_em` datetime DEFAULT current_timestamp(),
  `expirado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(250) NOT NULL,
  `sobrenome_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `nascimento_usuario` date DEFAULT NULL,
  `tipo_usuario` enum('Administrador','Aluno') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `nascimento_usuario`, `tipo_usuario`) VALUES
(1, 'Kaique', 'Ferreira', 'kaique1245br@gmail.com', '$2y$10$0DYFAMVAb2MljOQCQNzXJOd20dpcRKuT4djXJJwF87az/XvdVJvQO', '2007-12-08', 'Aluno');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`);

--
-- Índices de tabela `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`escola_id`);

--
-- Índices de tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD PRIMARY KEY (`id_inscricao`),
  ADD KEY `escola_inscrito` (`escola_inscrito`);

--
-- Índices de tabela `reset_tokens`
--
ALTER TABLE `reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `escola`
--
ALTER TABLE `escola`
  MODIFY `escola_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  MODIFY `id_inscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de tabela `reset_tokens`
--
ALTER TABLE `reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD CONSTRAINT `inscricoes_ibfk_1` FOREIGN KEY (`escola_inscrito`) REFERENCES `escola` (`escola_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
