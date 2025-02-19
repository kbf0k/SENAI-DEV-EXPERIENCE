<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
    <script src="../js/login.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <title>Login</title>
</head>

<body>
    <main>
        <div id="background_container">
            <video id="background_video" autoplay loop muted>
                <source src="../videos/videoplayback.mp4" type="video/mp4">
            </video>
            <div id="video_overlay"></div>
        </div>
        <img id="logo_x" src="../img/logo_x.svg" alt="">
        <div id="container">
            <form action="POST" method="POST" id="form_login">
                <h1>Entrar</h1>

                <div class="inputbox">
                    <input type="email" required novalidate>
                    <span>Email</span>
                </div>

                <div class="inputbox">
                    <input type="password" required novalidate>
                    <span>Senha</span>
                </div>

                <a href="#" id="esqueci_senha">Esqueci senha</a>
                <button type="submit">Entrar</button>
            </form>

            <form action="POST" method="POST" id="form_esqueci_senha">
                <button id="voltar" type="button">Voltar</button>
                <h1>Esqueceu senha?</h1>
                <p>Digite seu email para realizar a troca de senha</p>
                <div class="inputbox">
                    <input type="email" required novalidate>
                    <span>Email</span>
                </div>

                <div class="inputbox">
                    <input type="password" required novalidate>
                    <span>Senha</span>
                </div>
                <button type="submit">Atualizar</button>
            </form>
        </div>
    </main>
</body>

</html>