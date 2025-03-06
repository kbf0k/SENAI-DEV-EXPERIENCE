<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email_login_digitado']) && isset($_POST['senha_login_digitado'])) {
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
                $_SESSION['id_sessao'] = $usuario_logado['id_usuario'];
                $_SESSION['tipo_sessao'] = $usuario_logado['tipo_usuario'];
                $login_certo = true;
            } else {
                $login_errado = true;
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nome_cadastro_digitado']) && isset($_POST['sobrenome_cadastro_digitado']) && isset($_POST['email_cadastro_digitado']) && isset($_POST['criar_senha_cadastro_digitado']) && isset($_POST['repetir_senha_cadastro_digitado']) && isset($_POST['nascimento_cadastro_digitado']) && isset($_POST['tipo_cadastro_digitado'])) {
        $email_cadastro = $_POST['email_cadastro_digitado'];

        $stmt1 = $conexao->prepare('SELECT email_usuario FROM usuarios WHERE email_usuario = ?');
        $stmt1->bind_param('s', $email_cadastro);
        $stmt1->execute();
        $stmt1->store_result();

        if ($stmt1->num_rows > 0) {
            $email_errado = true;
        } else {
            if ($_POST['criar_senha_cadastro_digitado'] === $_POST['repetir_senha_cadastro_digitado']) {
                $nome_cadastro = $_POST['nome_cadastro_digitado'];
                $sobrenome_cadastro = $_POST['sobrenome_cadastro_digitado'];
                $criar_senha_cadastro = password_hash($_POST['criar_senha_cadastro_digitado'], PASSWORD_DEFAULT);
                $nascimento_cadastro = $_POST['nascimento_cadastro_digitado'];
                $tipo_cadastro = $_POST['tipo_cadastro_digitado'];

                $stmt2 = $conexao->prepare('INSERT INTO usuarios (nome_usuario, sobrenome_usuario, email_usuario, senha_usuario, nascimento_usuario, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?)');
                $stmt2->bind_param('ssssss', $nome_cadastro, $sobrenome_cadastro, $email_cadastro, $criar_senha_cadastro, $nascimento_cadastro, $tipo_cadastro);
                $stmt2->execute();
                $cadastro_certo = true;
            } else {
                $senha_erradas = true;
            }
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <!-- FORMULARIO DE LOGAR --><!-- FORMULARIO DE LOGAR --><!-- FORMULARIO DE LOGAR --><!-- FORMULARIO DE LOGAR -->
            <form method="POST" id="form_login">
                <h1>Entrar</h1>
                <div class="inputbox">
                    <input type="email" name="email_login_digitado" required>
                    <span>Email</span>
                </div>
                <div class="inputbox">
                    <input type="password" name="senha_login_digitado" required>
                    <span>Senha</span>
                </div>
                <div class="conta">
                    <a href="#" id="esqueci_senha">Esqueci senha</a>
                    <button type="button" id="criar_aluno">Cadastrar-se</a>
                </div>
                <button type="submit" id="entrar_button">Entrar</button>
            </form>
            <!-- FORMULARIO DE CADASTRAR --><!-- FORMULARIO DE CADASTRAR --><!-- FORMULARIO DE CADASTRAR -->
            <form method="POST" id="form_cadastrar">
                <button id="voltar_cadastrar" type="button">Voltar</button>
                <h1>Cadastrar</h1>
                <div class="inputbox">
                    <input type="text" name="nome_cadastro_digitado" required>
                    <span>Nome</span>
                </div>
                <div class="inputbox">
                    <input type="text" name="sobrenome_cadastro_digitado" required>
                    <span>Sobrenome</span>
                </div>
                <div class="inputbox">
                    <input type="date" name="nascimento_cadastro_digitado" required>
                    <span id="nascimento">Data de nascimento</span>
                </div>
                <div class="inputbox">
                    <input type="email" name="email_cadastro_digitado" required>
                    <span>Email</span>
                </div>
                <div class="inputbox">
                    <input type="password" name="criar_senha_cadastro_digitado" required>
                    <span>Criar senha</span>
                </div>
                <div class="inputbox">
                    <input type="password" name="repetir_senha_cadastro_digitado" required>
                    <span>Repetir senha</span>
                </div>
                <input style="display:none" type="text" name="tipo_cadastro_digitado" value="Aluno" required>
                <button type="submit" id="criar_aluno_button">Criar aluno</button>
            </form>
            <!-- FORMULARIOD DE ESQUECI SENHA --><!-- FORMULARIOD DE ESQUECI SENHA --><!-- FORMULARIOD DE ESQUECI SENHA -->
            <form action="enviar_email.php" method="POST" id="form_esqueci_senha">
                <button id="voltar_esqueci_senha" type="button">Voltar</button>
                <h1>Esqueceu senha?</h1>
                <p>Digite seu e-mail para receber um link de redefinição de senha.</p>
                <div class="inputbox">
                    <input type="email" name="esqueci_email" required>
                    <span>Email</span>
                </div>

                <button type="submit">Atualizar</button>
            </form>
        </div>
    </main>
    <?php if (isset($login_errado) && $login_errado): ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Credenciais inválidas",
                text: "Verifique email e senha digitados",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            });
        </script>
    <?php elseif (isset($login_certo) && $login_certo): ?>
        <script>
            Swal.fire({
                title: "Bom trabalho!",
                text: "Login realizado com sucesso!",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'inicio.php';
                }
            });
        </script>
    <?php elseif (isset($cadastro_certo) && $cadastro_certo): ?>
        <script>
            Swal.fire({
                title: "Bom trabalho!",
                text: "Cadastro realizado com sucesso!",
                icon: "success"
            })
        </script>

    <?php elseif (isset($email_errado) && $email_errado): ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Cadastro inválido",
                text: "Email já em uso",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            });
        </script>

    <?php elseif (isset($senha_erradas) && $senha_erradas): ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Credênciais inválidas",
                text: "Senhas não se coinsidem",
            })
        </script>
    <?php endif; ?>

</body>

</html>