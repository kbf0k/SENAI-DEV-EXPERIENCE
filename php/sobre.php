<?php
include('conexao.php');
session_start();
?>
<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/sobre.css">
    <script src="../js/sobre.js" defer></script>
    <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Sobre</title>
</head>

<body>
    <header>
        <nav class="sidebar">
            <div class="logo_items flex">
                <span class="nav_image">
                    <img id="logoSidebar" src="../img/logo_x.svg" alt="logo_fechada" class="logo closed" />
                </span>
            </div>
            <div class="menu_container">
                <ul class="menu_items">
                    <?php if (!isset($_SESSION['id_sessao'])): ?>
                        <li class="item"><a href="inicio.php" class="link flex"><i class="bx bx-home-alt"></i><span>Início</span></a></li>
                        <li class="item" style='margin-top:25px'><a href="sobre.php" class="link flex"><i class="bx bx-info-circle"></i><span>Sobre</span></a></li>
                        <li class="item" style='margin-top:25px'><a href="ranking.php" class="link flex"><i class="bx bx-trophy"></i><span>Ranking</span></a></li>
                        <li class="item" style='margin-top:25px'><a href="edicoes.php" class="link flex"><i class="bx bx-calendar"></i><span>Edições</span></a></li>
                        <li class="item" style='margin-top:25px'><a href="apoiadores.php" class="link flex"><i class="bx bx-group"></i><span>Apoiadores</span></a></li>
                        <li class="item" style='margin-top:25px'><a href="galeria.php" class="link flex"><i class="bx bx-photo-album"></i><span>Galeria</span></a></li>
                    <?php else: ?>
                        <li class="item"><a href="inicio.php" class="link flex"><i class="bx bx-home-alt"></i><span>Início</span></a></li>
                        <li class="item"><a href="sobre.php" class="link flex"><i class="bx bx-info-circle"></i><span>Sobre</span></a></li>
                        <li class="item"><a href="ranking.php" class="link flex"><i class="bx bx-trophy"></i><span>Ranking</span></a></li>
                        <li class="item"><a href="edicoes.php" class="link flex"><i class="bx bx-calendar"></i><span>Edições</span></a></li>
                        <li class="item"><a href="apoiadores.php" class="link flex"><i class="bx bx-group"></i><span>Apoiadores</span></a></li>
                        <li class="item"><a href="galeria.php" class="link flex"><i class="bx bx-photo-album"></i><span>Galeria</span></a></li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['id_sessao'])): ?>
                        <li class="item"><a href="perfil.php" class="link flex"><i class="bx bx-user"></i><span>Meu Perfil</span></a></li>
                        <?php if (isset($_SESSION['id_sessao']) && $_SESSION['tipo_sessao'] === 'Administrador'): ?>
                            <li class="item"><a href="administrador.php" class="link flex"><i class="bx bx-shield"></i><span>Administrador</span></a></li>
                        <?php endif; ?>
                        <li class="item"><a href="#" id="logout" class="link flex"><i class="bx bx-exit"></i><span>Sair</span></a></li>
                    <?php else: ?>
                        <li class="item" style='margin-top:25px'><a href="login.php" class="link flex"><i class="bx bx-key"></i><span>Entrar</span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <!-- <div class="banner">
            <img src="../img/image-removebg-preview (18).png" alt="">
            <h1>Sobre</h1>
        </div> -->
    </header>
    <main>
        <section class="sobre">
            <h1>O que é o SENAI Dev Experience?</h1>
            <p>
                O <strong>SENAI Dev Experience</strong> é uma maratona tecnológica que reúne estudantes do ensino técnico da
                Escola e Faculdade SENAI Felix Guisard. O evento incentiva os estudantes a aplicarem seus conhecimentos em desafios de programação,
                Internet das Coisas (IoT) e inovação tecnológica. Durante a competição, equipes enfrentam desafios práticos e desenvolvem soluções criativas para problemas reais, promovendo aprendizado, networking e crescimento profissional.
            </p>
        </section>
        <section id="sobre-evento">
            <h1>Sobre a Competição</h1>
            <div class="article-container">
                <article>
                    <div class="article-wrapper">
                        <figure>
                            <img src="../img/obj-prog.png" alt="Objetivos Compeitção" />
                        </figure>
                        <div class="article-body">
                            <h2>Objetivo</h2>
                            <p>Nosso objetivo é estimular o desenvolvimento de habilidades técnicas e criativas, incentivando a colaboração entre os participantes. A competição proporciona uma experiência imersiva no universo da tecnologia, preparando os estudantes para os desafios do mercado de trabalho.
                            </p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="article-wrapper">
                        <figure>
                            <img src="../img/dinamica-comp.png" alt="Dinâmica" />
                        </figure>
                        <div class="article-body">
                            <h2>Dinâmica da Competição</h2>
                            <p>Os participantes competem em equipes e enfrentam desafios em diferentes módulos. Cada equipe deve desenvolver soluções inovadoras dentro de um prazo determinado. As ideias são avaliadas por especialistas e premiadas de acordo com critérios como criatividade, funcionalidade e impacto.</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="article-wrapper">
                        <figure>
                            <img src="../img/part-comp.png" alt="Participação" />
                        </figure>
                        <div class="article-body">
                            <h2>Quem pode Participar?</h2>
                            <p>O SENAI Dev Experience é uma experiência exclusiva para os estudantes da Escola e Faculdade SENAI Felix Guisard. Como um de nossos alunos, essa é a oportunidade de você e sua equipe testarem suas habilidades, aprender na prática e se conectar com outros apaixonados pela programação.</p>
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <section class="competicao">
            <h1>Competição - Módulos e Fases</h1>
            <div class="competicao-container">
                <!-- Módulos -->
                <div class="modulos">
                    <h3>Módulos da Competição</h3>
                    <div class="modulo-container">
                        <div class="modulo">
                            <strong>Módulo A: Desenvolvimento de aplicações web inovadoras</strong>
                            <p>Foco no desenvolvimento Web, criando soluções digitais criativas e funcionais utilizando tecnologias como PHP, CSS, JavaScript e MySQL.</p>
                        </div>
                        <div class="modulo">
                            <strong>Módulo B: Soluções de IoT para a Indústria 4.0</strong>
                            <p>Foco na criação de projetos interativos e automatizados utilizando programação em linguagens aprendidas nas aulas, explorando o potencial da tecnologia para soluções práticas no cotidiano.</p>
                        </div>
                        <div class="modulo">
                            <strong>Módulo C: Criação de projetos com foco em inovação tecnológica</strong>
                            <p>Desenvolvimento de projetos que combinam inovação tecnológica e criatividade, com foco na redação e apresentação de soluções inovadoras para problemas gerais.</p>
                        </div>
                    </div>
                </div>

                <!-- Fases -->
                <div class="fases">
                    <h3>Fases da Competição</h3>
                    <div class="fase">
                        <h4>Seletiva</h4>
                        <p>A fase seletiva é a primeira etapa, onde as equipes competem dentro de sua própria escola, sob a observação de seus orientadores. Os estudantes devem apresentar suas ideias e protótipos dentro de um período determinado de tempo. Por fim, apenas as 10 melhores equipes em pontuação somadas entre os 3 Módulos avançam para a fase final.</p>
                    </div>
                    <div class="fase">
                        <h4>Finais</h4>
                        <p>Na fase final, as equipes selecionadas terão a oportunidade de apresentar seus projetos de novos desafios propostos, competindo pelo prêmio de vencedor da competição. Que será avaliado por diferentes profissionais, sendo resultado também da soma da nota dos 3 módulos.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="regulamento">
            <h1>Baixe o Regulamento da Prova</h1>
            <p>Para mais detalhes sobre as regras e orientações da competição, faça o download do regulamento completo abaixo.</p>
            <a href="../pdf/SENAI-Dev-Experience-2024-v4.pdf" class="btn-download" download>Baixar Regulamento</a>
        </section>
    </main>
    <footer></footer>
</body>

</html>