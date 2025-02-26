<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/apoiadores.css">
    <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
    <script src="../js/apoiadores.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Apoaidores</title>
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
    <main>
        <secion class="section_apoiadores">
            <!-- <img src="../img/BANNER_APOIADORES.png" id="BANNER_APOIADORES" alt=""> -->
            <img id="fundo" src="../img/fundo_png_bom.png" alt="FUNDO_BACKGROUND">
            <h1>APOIADORES</h1>
            <p>Agradecemos imensamente o apoio de nossos patrocinadores, cuja contribuição foi essencial para a realização deste evento. Queremos expressar nossa profunda gratidão aos parceiros do Senai Dev Experience, que desempenharam um papel fundamental em proporcionar uma experiência enriquecedora e inspiradora para nossos alunos.</p>
            <div class="card" id="LOGO_YOUTAN">
                <div class="moldura">
                    <a href="https://youtan.com.br/" target="_blank"><img src="../img/LOGO_YOUTAN.svg" class="imagem_cover" alt="LOGO_YOUTAN"></a>
                </div>
            </div>
            <div class="card" id="LOGO_AAPM">
                <div class="moldura">
                    <a href="https://sp.senai.br/" target="_blank"><img src="../img/LOGO_AAPM.svg" class="imagem_cover" alt="LOGO_AAPM"></a>
                </div>
            </div>
            <div class="card" id="LOGO_DEEPESG">
                <div class="moldura">
                    <a href="https://deepesg.com/" target="_blank"><img src="../img/LOGO_DEEPESG.svg" class="imagem_cover" alt="LOGO_DEEPESG"></a>
                </div>
            </div>
            <div class="card" id="LOGO_MA-IA">
                <div class="moldura">
                    <a href="https://maia.solutions/" target="_blank"><img src="../img/LOGO_MA.IA.svg" class="imagem_cover" alt="LOGO_MA.IA"></a>
                </div>
            </div>
        </secion>
        <section class="patrocinadores">
            <h1>SEJA UM PATROCINADOR</h1>

            <div class="cards">
                <div class="card_patrocinadores">
                    <h1>Agradecimentos</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui dolore hic magni? Fuga, perferendis explicabo dolorem fugiat, vitae saepe corporis, nam ipsa repellat eum numquam delectus voluptates earum fugit.</p>
                </div>
                <div class="card_patrocinadores">
                    <h1>Reconhecimento</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui dolore hic magni? Fuga, perferendis explicabo dolorem fugiat, vitae saepe corporis, nam ipsa repellat eum numquam delectus voluptates earum fugit.</p>
                </div>
                <div class="card_patrocinadores">
                    <h1>Sla man</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui dolore hic magni? Fuga, perferendis explicabo dolorem fugiat, vitae saepe corporis, nam ipsa repellat eum numquam delectus voluptates earum fugit.</p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p id="titulo_senai">&copy; SENAI DEV EXPERIENCE</p>
        <p>O conteúdo do site não pode ser editado, copiado ou distribuído sem expressa autorização do SENAI-SP.</p>
        <p>Escola e Faculdade SENAI Félix Guisard.</p>
        <p>Desenvolvido por &copy; SOFTDEV</p>
    </footer>
</body>

</html>