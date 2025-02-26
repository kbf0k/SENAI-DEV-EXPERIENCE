<?php
// include_once('conexao.php');
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $nova_senha = $_POST['criar_senha'];
//     $confirmar_senha = $_POST['repetir_senha'];

//     if ($nova_senha !== $confirmar_senha) {
//         die("As senhas não coinsidem");
//     }

//     $stmt = $conexao->prepare("SELECT email_usuario FROM usuarios WHERE token_recuperacao = ?");
//     $stmt->bind_param('s', $token);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         $usuario = $resukt->fetch_assoc();
//         $email_usuario = $usuario['email_usuario'];

//         $senha_criptografada = password_hash($nova_senha, PASSWORD_DEFAULT);
//         $stmt = $conexao->prepare("UPDATE usuarios SET senha_usuario = ?, token_recuperacao = NULL WHERE email_usuario = ?");
//         $stmt->bind_param('ss', $senha_criptografada, $email_usuario);
//         $stmt->execute();
//         echo 'Senha redefinica com sucesso';
//     } else {
//         echo 'Token Inválido';
//     }
// }


// action="redefinir_senha.php?token=<?php echo $_GET['token']; 
?>


<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/redefinir_senha.css">
    <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <title>Redefinir Senha</title>
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

            <form id="form_redefinir_senha" method="POST">
                <h1>Redefinir Senha</h1>
                <p>Preencha os campos abaixo.</p>

                <div class="inputbox">
                    <input type="password" id="criar_senha" name="criar_senha" required novalidate>
                    <span>Criar Senha</span>
                </div>
                <div class="inputbox">
                    <input type="password" id="repetir_senha" name="repetir_senha" required novalidate>
                    <span>Repetir Senha</span>
                </div>

                <button type="submit">Atualizar</button>
            </form>
        </div>
    </main>
</body>

</html>