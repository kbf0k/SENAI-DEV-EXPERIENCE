<?php
include('conexao.php');
session_start();

if (!isset($_SESSION['id_sessao'])) {
  header('Location:login.php');
  exit();
}

$id_usuario = $_SESSION['id_sessao'];

$stmt = $conexao->prepare("SELECT nome_usuario, sobrenome_usuario,email_usuario,senha_usuario,nascimento_usuario FROM usuarios WHERE id_usuario=?");
$stmt->bind_param('i', $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

$colocar_senha = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['senha_atual'])) {
    $senha_atual = $_POST['senha_atual'];

    $stmt3 = $conexao->prepare("SELECT senha_usuario FROM usuarios WHERE id_usuario = ?");
    $stmt3->bind_param('i', $id_usuario);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    $usuario3 = $result3->fetch_assoc();

    if (password_verify($senha_atual, $usuario3['senha_usuario'])) {

      $nome_perfil_editar = $_POST['nome_perfil_digitado'];
      $sobrenome_perfil_editar = $_POST['sobrenome_perfil_digitado'];
      $email_perfil_editar = $_POST['email_perfil_digitado'];
      $nascimento_perfil_editar = $_POST['nascimento_perfil_digitado'];

      $stmt2 = $conexao->prepare("UPDATE usuarios SET nome_usuario=?, sobrenome_usuario=?, email_usuario=?, nascimento_usuario=? WHERE id_usuario=?");
      $stmt2->bind_param('ssssi', $nome_perfil_editar, $sobrenome_perfil_editar, $email_perfil_editar, $nascimento_perfil_editar, $id_usuario);
      $stmt2->execute();
      $edicao_sucesso = true;


      if (!empty($_POST['nova_senha']) && !empty($_POST['confirmar_senha'])) {
        $nova_senha = $_POST['nova_senha'];
        $confirmar_senha = $_POST['confirmar_senha'];

        if ($nova_senha === $confirmar_senha) {
          $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
          $stmt4 = $conexao->prepare("UPDATE usuarios SET senha_usuario=? WHERE id_usuario=?");
          $stmt4->bind_param('si', $nova_senha_hash, $id_usuario);
          $stmt4->execute();
          $senha_sucesso = true;
        } else {
          $senha_errado = true;
        }
      }
    } else {
      $senha_atual_incorreta = true;
    }
  } else {
    $colocar_senha = true;
  }
}

?>

<!DOCTYPE html>
<html lang="Pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style/perfil.css" />
  <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/perfil.js" defer></script>
  <title>Meu Perfil</title>
  <style>


  </style>
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
        <li class="item"><a href="galeria.php" class="link flex"><i class="bx bx-photo-album"></i><span>Galeria</span></a></li>
        <?php if (isset($_SESSION['id_sessao'])): ?>
          <li class="item"><a href="perfil.php" class="link flex"><i class="bx bx-user"></i><span>Meu Perfil</span></a></li>
          <?php if (isset($_SESSION['id_sessao']) && $_SESSION['tipo_sessao'] === 'Administrador'): ?>
            <li class="item"><a href="administrador.php" class="link flex"><i class="bx bx-shield"></i><span>Administrador</span></a></li>
          <?php endif; ?>
          <li class="item"><a href="#" id="logout" class="link flex"><i class="bx bx-exit"></i><span>Sair</span></a></li>
        <?php else: ?>
          <li class="item"><a href="login.php" class="link flex"><i class="bx bx-key"></i><span>Entrar</span></a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <main>
    <div class="container">
      <h1>Editar Perfil</h1>
      <div class="foto">
        <img id="imagem_perfil" src="../img/user.png" alt="Foto de perfil">
        <button id="trocar_foto_perfil">Trocar</button>
        <input type="file" id="upload_foto" accept="image/*" style="display: none;">
      </div>
      <form method="POST">
        <div class="inputbox">
          <span>Editar Nome</span>
          <input type="text" name="nome_perfil_digitado" value="<?php echo htmlspecialchars($usuario['nome_usuario']) ?>">
        </div>
        <div class="inputbox">
          <span>Editar Sobrenome</span>
          <input type="text" name="sobrenome_perfil_digitado" value="<?php echo htmlspecialchars($usuario['sobrenome_usuario']) ?>">
        </div>
        <div class="inputbox">
          <span id="nascimento">Editar Data de nascimento</span>
          <input type="date" name="nascimento_perfil_digitado" value="<?php echo htmlspecialchars($usuario['nascimento_usuario']) ?>">
        </div>
        <div class="inputbox">
          <span>Editar Email</span>
          <input type="email" name="email_perfil_digitado" value="<?php echo htmlspecialchars($usuario['email_usuario']) ?>">
        </div>
        <div class="inputbox">
          <span>Senha Atual</span>
          <input type="password" name="senha_atual" placeholder="Digite sua senha atual">
        </div>
        <div class="inputbox">
          <span>Nova Senha</span>
          <input type="password" name="nova_senha" placeholder="Digite uma nova senha">
        </div>
        <div class="inputbox">
          <span>Confirmar Nova Senha</span>
          <input type="password" name="confirmar_senha" placeholder="Confirme sua nova senha">
        </div>
        <div class="inputbox">
          <button id="salvar_perfil">Salvar</button>
        </div>
      </form>
    </div>
  </main>
  <?php if (isset($senha_sucesso) && $senha_sucesso): ?>
    <script>
      Swal.fire({
        title: "Bom trabalho!",
        text: "Senha alterada com sucesso!",
        icon: "success"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'perfil.php';
        }
      });
    </script>
  <?php elseif (isset($senha_errado) && $senha_errado): ?>
    <script>
      Swal.fire({
        icon: "error",
        title: "Credenciais inválidas",
        text: "As senhas novas não coincidem!",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'perfil.php';
        }
      });
    </script>
  <?php elseif (isset($senha_atual_incorreta) && $senha_atual_incorreta): ?>
    <script>
      Swal.fire({
        icon: "error",
        title: "Senha Atual incorreta",
        html: "Esqueceu sua senha? <a href='redefinir_senha.php' style='color: #007bff; text-decoration: underline;'>Clique Aqui</a>",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'perfil.php';
        }
      });
    </script>

  <?php elseif (isset($edicao_sucesso) && $edicao_sucesso): ?>
    <script>
      Swal.fire({
        title: "Bom trabalho!",
        text: "Informações alteradas com sucesso!",
        icon: "success"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'perfil.php';
        }
      });
    </script>

  <?php elseif (isset($colocar_senha) &&  $colocar_senha): ?>
    <script>
      Swal.fire({
        icon: "error",
        title: "Confirme sua identidade",
        text: "Insira a senha para editar as informações",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'perfil.php';
        }
      });
    </script>

    $colocar_senha = true;

  <?php endif; ?>
</body>

</html>