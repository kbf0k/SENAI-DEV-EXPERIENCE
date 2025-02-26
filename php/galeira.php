<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/galeria.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="../js/galeria.js" defer></script>
    <title>Galeria</title>
</head>

<body>
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
                <li class="item"><a href="galeira.php" class="link flex"><i class="bx bx-photo-album"></i><span>Galeria</span></a></li>
                <li class="item"><a href="login.php" class="link flex"><i class="bx bx-key"></i><span>Entrar</span></a></li>
                <!-- <li class="item"><a href="../php/login.php" class="link flex"><i class="bx bx-log-out"></i><span>Logout</span></a></li> -->
            </ul>
        </div>
    </nav>
    <main></main>
    <footer></footer>
</body>

</html>