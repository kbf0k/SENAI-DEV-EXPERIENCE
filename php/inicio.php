<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hoverable Sidebar Menu</title>
    <link rel="stylesheet" href="../style/inicio.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="../js/inicio.js" defer></script>
    <style>
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 70px;
            background-color: black;
            transition: width 0.4s ease;
            overflow: hidden;
        }
        .sidebar:hover {
            width: 250px;
        }

        /* Esconder/Mostrar logo */
        .logo.open {
            display: none;
        }
        .sidebar:hover .logo.closed {
            display: none;
        }
        .sidebar:hover .logo.open {
            display: block;
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <div class="logo_items flex">
            <span class="nav_image">
                <img id="logoSidebar" src="../img/logo_x.svg" alt="logo_fechada" class="logo closed" />
                <img id="logoSidebarOpen" src="../img/DEV EXPERIENCE V2 PRETO SVG.svg" alt="logo_aberta" class="logo open" />
            </span>          
        </div>
        <div class="menu_container">
            <ul class="menu_items">
                <li class="item"><a href="#" class="link flex"><i class="bx bx-home-alt"></i><span>Início</span></a></li>
                <li class="item"><a href="#" class="link flex"><i class="bx bx-grid-alt"></i><span>All Projects</span></a></li>
                <li class="item"><a href="#" class="link flex"><i class="bx bxs-magic-wand"></i><span>Magic Build</span></a></li>
                <li class="item"><a href="#" class="link flex"><i class="bx bx-folder"></i><span>Novo Projeto</span></a></li>
                <li class="item"><a href="#" class="link flex"><i class="bx bx-user-circle"></i><span>Perfil</span></a></li>
                <li class="item"><a href="#" class="link flex"><i class="bx bx-key"></i><span>Entrar</span></a></li>
                <li class="item"><a href="../php/login.php" class="link flex"><i class="bx bx-log-out"></i><span>Logout</span></a></li>
            </ul>
        </div>
    </nav>
</body>
</html>
