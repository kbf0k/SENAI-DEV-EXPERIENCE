<?php
include('conexao.php');
session_start();
?>

<!DOCTYPE html>
<html lang="Pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style/inicio.css" />
  <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/inicio.js" defer></script>
  <title>Início</title>
</head>

<nav class="sidebar">
  <div class="logo_items flex">
    <span class="nav_image">
      <img id="logoSidebar" src="../img/logo_x.svg" alt="logo_fechada" class="logo closed" />
      <img id="logoSidebarOpen" src="../img/logo_nova_certa.png" alt="logo_aberta" class="logo open" />
    </span>
  </div>
  <div class="menu_container">
    <ul class="menu_items">
      <li class="item"><a href="inicio.php" class="link flex"><i class="bx bx-home-alt"></i><span>Início</span></a></li>
      <li class="item"><a href="sobre.php" class="link flex"><i class="bx bx-info-circle"></i><span>Sobre</span></a></li>
      <li class="item"><a href="ranking.php" class="link flex"><i class="bx bx-trophy"></i><span>Ranking</span></a></li>
      <li class="item"><a href="edicoes.php" class="link flex"><i class="bx bx-calendar"></i><span>Edições</span></a></li>
      <li class="item"><a href="apoiadores.php" class="link flex"><i class="bx bx-group"></i><span>Apoiadores</span></a></li>
      <li class="item"><a href="galeria.php" class="link flex"><i class="bx bx-photo-album"></i><span>Galeria</span></a></li>
      <?php if (isset($_SESSION['id_sessao'])): ?>
        <li class="item"><a href="perfil.php" class="link flex"><i class="bx bx-user"></i><span>Meu Perfil</span></a></li>
      <?php if (isset($_SESSION['id_sessao']) && $_SESSION['tipo_sessao'] === 'Administrador'): ?>
        <li class="item"><a href="administrador.php" class="link flex"><i class="bx bx-shield"></i><span>Administrador</span></a></li>
        <?php endif; ?>
        <li class="item"><a href="#" id="logout" class="link flex"><i class="bx bx-exit"></i><span>Sair</span></a></li>
        <?php else: ?>
            <li class="item"><a href="login.php" class="link flex"><i class="bx bx-key"></i><span>Entrar</span></a></li>
          <?php endif; ?>
      </ul>
    </div>
</nav>
<body>
  <div id="frase">
    <h1 id="destaque-texto"></h1>
  </div>

  <!-- Contagem Regressiva -->
  <section id="contagem">
    <h2>Faltam poucos dias para a competição!</h2>
    <div id="timer">
        <div class="timer-box">
            <span id="dias">00</span>
            <span>Dias</span>
        </div>
        <div class="timer-box">
            <span id="horas">00</span>
            <span>Horas</span>
        </div>
        <div class="timer-box">
            <span id="minutos">00</span>
            <span>Minutos</span>
        </div>
        <div class="timer-box">
            <span id="segundos">00</span>
            <span>Segundos</span>
        </div>
    </div>
  </section>
  
  <!-- Resumo da Competição -->
  <section id="participe">
    <div id="container-participe">
      <h2>O grande evento de programação do SENAI está chegando!</h2>
      <p>Uma experiência única para os alunos do curso de Desenvolvimento de Sistemas.</p>
      <p>Teste suas habilidades, trabalhe em equipe e resolva desafios reais da programação.</p>
      <p>Faça já sua participação e venha fazer parte do Senai DEV Experience!</p>
      <a href="edicoes.php" class="btn">Inscreva-se</a>
    </div>
  </section>
  
  <section id="saiba-mais">
    <h2>Descubra mais sobre nossa competição</h2>
    <div class="container-saiba-mais">
        <div class="card">
          <img src="../img/icon-trofeu.png" alt="Imagem Troféu" class="img-icon">
          <h3>Ranking</h3>
          <p>Confira quem está no topo!</p>
          <a href="ranking.php">Ver ranking</a>
        </div>
        <div class="card">
          <img src="../img/icon-agenda.png" alt="Imagem Edições" class="img-icon">
          <h3>Edições Anteriores</h3>
          <p>Veja o que rolou nas ultimas edições!</p>
          <a href="edicoes.php">Ver edições</a>
        </div>
        <div class="card">
          <img src="../img/icon-apoiadores.png" alt="Imagem Apoio" class="img-icon">
          <h3>Apoiadores</h3>
          <p>Confira nossos apoiadores!</p>
          <a href="apoiadores.php">Conheça</a>
        </div>
        <div class="card">
          <img src="../img/icon-galeria.png" alt="Imagem Galeria" class="img-icon">
          <h3>Galeria</h3>
          <p>Fotos da nossa competição!</p>
          <a href="galeria.php">Ver fotos</a>
        </div>
    </div>
  </section>
  <section id="habilidades">
    <h2>Aprenda, pratique e evolua suas habilidades</h2>
    <div id="habilidades_container">
        <div class="card-habilidades">
        <img src="../img/icon-programacao.png" alt="Programação Web" class="img-icon">
            <h3>Programação Web</h3>
            <p>Pratique suas habilidades em HTML, CSS e JavaScript, criando soluções web para desafios reais.</p>
        </div>
        <div class="card-habilidades">
            <img src="../img/icon-equipe.png" alt="Trabalho em Equipe" class="img-icon">
            <h3>Trabalho em Equipe</h3>
            <p>Aprenda a trabalhar com outros programadores, compartilhar ideias e desenvolver soluções em conjunto.</p>
        </div>
        <div class="card-habilidades">
            <img src="../img/icon-code.png" alt="Lógica de Programação" class="img-icon">
            <h3>Lógica de Programação</h3>
            <p>Resolva desafios utilizando raciocínio lógico e desenvolva sua capacidade de pensar como um programador.</p>
        </div>
        <div class="card-habilidades">
            <img src="../img/icon-alerta.png" alt="Resolução de Problemas" class="img-icon">
            <h3>Resolução de Problemas</h3>
            <p>Enfrente desafios reais, aprimore sua criatividade e encontre as melhores soluções para problemas.</p>
        </div>
        <div class="card-habilidades">
            <img src="../img/icon-iot.png" alt="Soluções IoT" class="img-icon">
            <h3>Soluções IoT</h3>
            <p>Explore o mundo da Internet das Coisas, desenvolva sistemas inteligentes e soluções inovadoras!</p>
        </div>
        <div class="card-habilidades">
            <img src="../img/icon-inovacao.png" alt="Inovação Tecnológica" class="img-icon">
            <h3>Inovação Tecnológica</h3>
            <p>Aprenda sobre as tecnologias emergentes e como aplicá-las para criar produtos e serviços inovadores.</p>
        </div>
    </div>
</section>

</body>

</html>