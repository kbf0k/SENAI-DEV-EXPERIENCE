<?php
include('conexao.php');
session_start();
?>
<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/apoiadores.css">
    <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
    <script src="../js/apoiadores.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Apoiadores</title>
</head>

<body>
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
    <main>
        <secion class="section_apoiadores">
            <img src="../img/BANNER_APOIADORES.png" id="BANNER_APOIADORES" alt="BANNER_APOIADORES">
            <div class="apoiadores_agradecimento">
                <h1>AGRADECIMENTO</h1>
                <p>Agradecemos imensamente o apoio de nossos patrocinadores, cuja contribuição foi essencial para a realização deste evento. Queremos expressar nossa profunda gratidão aos parceiros do Senai Dev Experience, que desempenharam um papel fundamental em proporcionar uma experiência enriquecedora e inspiradora para nossos alunos.</p>
            </div>
            <div class="cards_apoiadores_1">
                <a href="https://sp.senai.br/unidade/taubate/" target="_blank">
                    <div class="card">
                        <div class="wrapper">
                            <div class="cover-image"></div>
                        </div>
                        <img src="../img/LOGO_AAPM.svg" class="title" />
                        <p class="character">O QUE É AAPM?<br>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro dolore deleniti voluptate obcaecati facere labore facilis rem. Sapiente illo est, suscipit eius nesciunt corrupti, voluptatibus porro necessitatibus eum quam natus.</p>
                    </div>
                </a>

                <a href="https://deepesg.com/" target="_blank">
                    <div class="card">
                        <div class="wrapper">
                            <div class="cover-image"></div>
                        </div>
                        <img src="../img/LOGO_DEEPESG.svg" class="title" />
                        <p class="character">O QUE É DEEPESG?<br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt debitis accusantium in iure magnam fuga eos quibusdam rem necessitatibus accusamus possimus, quas alias dolore commodi repellendus esse, hic eaque non.</p>
                    </div>
                </a>
                <a href="https://maia.solutions/" target="_blank">
                    <div class="card">
                        <div class="wrapper">
                            <div class="cover-image"></div>
                        </div>
                        <img src="../img/LOGO_MA.IA.svg" class="title" />
                        <p class="character">O QUE É MA.IA?<br>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quod rerum cupiditate quasi officia dolores facere totam quos odio vitae. Voluptate facere ullam voluptates eius tempora eveniet a blanditiis ad.</p>
                    </div>
                </a>
                <a href="https://youtan.com.br/" target="_blank">
                    <div class="card">
                        <div class="wrapper">
                            <div class="cover-image"></div>
                        </div>
                        <img src="../img/LOGO_YOUTAN.svg" class="title" />
                        <p class="character">O QUE É YOUTAN?<br>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quod rerum cupiditate quasi officia dolores facere totam quos odio vitae. Voluptate facere ullam voluptates eius tempora eveniet a blanditiis ad.</p>
                    </div>
                </a>
            </div>
        </secion>
        <section class="patrocinadores">
            <h1>SEJA UM PATROCINADOR</h1>
            <div class="cards">
                <div class="card_patrocinadores">
                    <h1>Agradecimentos</h1>
                    <p>O SENAIDev Experience foi um evento incrível que só se tornou possível graças ao apoio essencial de cada um dos nossos parceiros e patrocinadores. Seu compromisso e dedicação foram fundamentais para a realização deste encontro, que impactou profundamente a comunidade de desenvolvedores, proporcionando aprendizado, networking e inovação.</p>
                </div>
                <div class="card_patrocinadores">
                    <h1>Reconhecimento</h1>
                    <p>Reconhecemos a importância de cada contribuição, desde o incentivo financeiro até a oferta de conhecimento e oportunidades para os participantes. Seu apoio gerou um impacto significativo, inspirando novas trajetórias profissionais e fortalecendo o ecossistema tecnológico.</p>
                </div>
                <div class="card_patrocinadores">
                    <h1>Impacto</h1>
                    <p>O impacto do SENAIDev Experience vai muito além do evento em si. Ele representa uma transformação na jornada de inúmeros desenvolvedores, proporcionando conhecimento, conexões valiosas e oportunidades para o futuro.</p>
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