<?php
include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_login = $_POST['email_login_digitado'];
    $senha_login = $_POST['senha_login_digitado'];

    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email_usuario = ?");
    $stmt->bind_param('s', $email_login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario_logado = $result->fetch_assoc();
        if (password_verify($senha_login, $usuario_logado['senha_usuario'])) {
            session_start();
            $_SESSION['id_sessao'] = $usuario_logado['id_aluno'];
            $_SESSION['nome_sessao'] = $usuario_logado['nome_aluno'];
            header('Location: inicio.php');
            exit();
        }
    }
}

?>

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
        <img id="logo_x" src="../img/LOGO_X.svg" alt="LOGO_X">
        <div id="container">
            <form action="POST" method="POST" id="form_login">
                <h1>Entrar</h1>

                <div class="inputbox">
                    <input type="email" name="email_login_digitado" required novalidate>
                    <span>Email</span>
                </div>

                <div class="inputbox">
                    <input type="password" name="senha_login_digitado" required novalidate>
                    <span>Senha</span>
                </div>

                <a href="#" id="esqueci_senha">Esqueci senha</a>
                <button type="submit">Entrar</button>
            </form>

            <form action="enviar_email.php" method="POST" id="form_esqueci_senha">
                <button id="voltar" type="button">Voltar</button>
                <h1>Esqueceu senha?</h1>
                <p>Digite seu e-mail para receber um link de redefinição de senha.</p>
                <div class="inputbox">
                    <input type="email" name="esqueci_email" required novalidate>
                    <span>Email</span>
                </div>

                <button type="submit">Atualizar</button>
            </form>
        </div>
    </main>
</body>

</html>