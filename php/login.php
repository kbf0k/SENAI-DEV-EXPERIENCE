<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <script src="../js/login.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <title>Login</title>
</head>

<body>
    <main>
        <video id="background_video" src="../videos/videoplayback.mp4" autoplay loop muted></video>
        <div id="container">
            <form action="POST" method="POST" id="form_login">
                <h1>Entrar</h1>
                <input type="email" id="email_login" placeholder="E-mail">

                <input type="password" id="senha_login" placeholder="Senha">

                <a href="" id="esqueci_senha">Esqueci senha</a>

                <button type="submit" id="entrar_login">Entrar</button>
            </form>
        </div>
    </main>
</body>

</html>