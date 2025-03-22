<?php
include('conexao.php');

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
    <link rel="stylesheet" href="../style/inscrever.css">
    <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inscrever Equipes</title>
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
            <!-- FORMULARIO DE CADASTRAR --><!-- FORMULARIO DE CADASTRAR --><!-- FORMULARIO DE CADASTRAR -->
            <form method="POST" id="form_cadastrar">
                <a id="voltar" href="inicio.php">Voltar</a>
                <h1>Inscrever Equipe</h1>
                <div class="inputbox">
                    <input type="text" name="nome_equipe" required>
                    <span>Nome da equipe</span>
                </div>
                <div class="inputbox">
                    <input type="text" name="nome_integrante_1" required>
                    <span>Nome Integrante 1</span>
                </div>
                <div class="inputbox">
                    <input type="email" name="email_integrante_1" required>
                    <span>Email Integrante 1</span>
                </div>
                <div class="inputbox">
                    <input type="number" name="cpf_cadastro_1" required>
                    <span>CPF Integrante 1 (somente números)</span>
                </div>
                <div class="inputbox">
                    <input type="text" name="nome_integrante_2" required>
                    <span>Nome Integrante 2</span>
                </div>
                <div class="inputbox">
                    <input type="email" name="email_integrante_2" required>
                    <span>Email Integrante 2</span>
                </div>
                <div class="inputbox">
                    <input type="number" name="cpf_cadastro_2" required>
                    <span>CPF Integrante 2 (somente números)</span>
                </div>
                <div class="inputbox">
                    <input type="text" name="nome_integrante_3" required>
                    <span>Nome Integrante 3</span>
                </div>
                <div class="inputbox">
                    <input type="email" name="email_integrante_3" required>
                    <span>Email Integrante 3</span>
                </div>
                <div class="inputbox">
                    <input type="number" name="cpf_cadastro_3" required>
                    <span>CPF Integrante 3 (somente números)</span>
                </div>
                <div class="inputbox">
                    <select name="" id="">
                        <option value=""></option>
                        <option value="">Escola 2</option>
                    </select>
                    <span>Selecione a escola onde estuda</span>
                </div>
                <button type="submit" id="criar_equipe_button">Criar Equipe</button>
            </form>
        </div>
    </main>
    <?php if (isset($cadastro_certo) && $cadastro_certo): ?>
        <script>
            Swal.fire({
                title: "Bom trabalho!",
                text: "Cadastro realizado com sucesso!",
                icon: "success"
            })
        </script>
    <?php endif; ?>

</body>

</html>