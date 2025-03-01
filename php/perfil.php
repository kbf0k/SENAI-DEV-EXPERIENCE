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
        <li class="item"><a href="ranking.php" class="link  flex"><i class="bx bx-trophy"></i><span>Ranking</span></a></li>
        <li class="item"><a href="edicoes.php" class="link flex"><i class="bx bx-calendar"></i><span>Edições</span></a></li>
        <li class="item"><a href="apoiadores.php" class="link flex"><i class="bx bx-group"></i><span>Apoiadores</span></a></li>
        <li class="item"><a href="galeira.php" class="link flex"><i class="bx bx-photo-album"></i><span>Galeria</span></a></li>
        <?php if (isset($_SESSION['id_sessao'])): ?>
          <li class="item"><a href="perfil.php" class="link flex"><i class="bx bx-user"></i><span>Meu Perfil</span></a></li>
          <li class="item"><a id="logout" class="link flex"><i class="bx bx-exit"></i><span>Sair</span></a></li>
        <?php else: ?>
          <li class="item"><a href="login.php" class="link flex"><i class="bx bx-key"></i><span>Entrar</span></a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <main>
    <div class="container">
      <h1>Editar Perfil</h1>
      <div class="teste">
        <div class="foto">
          <img src="../img/user.png" alt="">
          <button id="trocar_foto_perfil">Trocar</button>
        </div>
        <div class="inputteste">
          <div class="inputbox">
            <span>Editar Nome</span>
            <input type="text" value="<?php htmlspecialchars($usuario['nome_usuario']) ?>">
          </div>
          <div class="inputbox">
            <span>Editar Sobrenome</span>
            <input type="text" value="<?php htmlspecialchars($usuario['sobrenome_usuario']) ?>">
          </div>
          <div class="inputbox">
            <span id="nascimento">Editar Data de nascimento</span>
            <input type="date" value="<?php htmlspecialchars($usuario['nascimento_usuario']) ?>">
          </div>
          <div class="inputbox">
            <span>Editar Email</span>
            <input type="email" value="<?php htmlspecialchars($usuario['email_usuario']) ?>">
          </div>
          <div class="inputbox">
            <span>Editar Senha</span>
            <input type="password" value="<?php htmlspecialchars($usuario['senha_usuario']) ?>">
          </div>
          <div class="inputbox">
            <button id="salvar_perfil">Salvar</button>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>