<?php
include('conexao.php');
session_start();
?>
<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/edicoes.css">
    <script src="../js/edicoes.js" defer></script>
    <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <title>Edições</title>
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
    </header>
    <main>
        <h1>Mainfafafafafaf</h1>
    </main>
    <footer>
        <ul>
            <li><a href="inicio.php">Início</a></li>
            <li><a href="sobre.php">Sobre</a></li>
            <li><a href="ranking.php">Ranking</a></li>
            <li><a href="edicoes.php">Edições</a></li>
            <li><a href="apoiadores.php">Apoiadores</a></li>
            <li><a href="galeria.php">Galeria</a></li>
        </ul>
        <hr style="border: none; margin-top: 10px; height: 1px; width: 1000px; background-color:rgb(0, 166, 255);">
        <h3>© SENAI DEV EXPERIENCE</h3>
        <h4>O conteúdo do site não pode ser editado, copiado ou distribuído sem expressa autorização do SENAI-SP. Escola e Faculdade SENAI Félix Guisard.</h4>
    </footer>
</body>

</html>