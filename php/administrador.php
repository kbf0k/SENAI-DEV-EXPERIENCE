<?php
include('conexao.php');
session_start();

if (!isset($_SESSION['id_sessao'])) {
  header('Location:login.php');
  exit();
}

$id_usuario = $_SESSION['id_sessao'];

$sql_buscar = $conexao->prepare("SELECT nome_equipe_inscrito, 
nome_inscrito1, nome_inscrito2, 
nome_inscrito3,escola_nome FROM inscricoes 
JOIN escola ON escola_inscrito = escola_id ORDER BY nome_equipe_inscrito ASC");
$sql_buscar->execute();
$result_buscar = $sql_buscar->get_result();

$sql_participantes = $conexao->prepare("SELECT 
        (SELECT COUNT(*) FROM inscricoes WHERE nome_inscrito1 IS NOT NULL AND nome_inscrito1 != '') +
        (SELECT COUNT(*) FROM inscricoes WHERE nome_inscrito2 IS NOT NULL AND nome_inscrito2 != '') +
        (SELECT COUNT(*) FROM inscricoes WHERE nome_inscrito3 IS NOT NULL AND nome_inscrito3 != '') AS total_participantes");
$sql_participantes->execute();
$result_participantes = $sql_participantes->get_result();
$total_participantes = $result_participantes->fetch_assoc()['total_participantes'];

$sql_incricoes = $conexao->prepare("SELECT COUNT(nome_equipe_inscrito) AS total_equipes FROM inscricoes");
$sql_incricoes->execute();
$result_inscricoes = $sql_incricoes->get_result();
$total_equipes = $result_inscricoes->fetch_assoc()['total_equipes'];

$sql_escolas = $conexao->prepare("SELECT COUNT(escola_nome) AS total_escolas FROM escola");
$sql_escolas->execute();
$result_escolas = $sql_escolas->get_result();
$total_escolas = $result_escolas->fetch_assoc()['total_escolas'];

$sql = " SELECT e.escola_nome, 
           SUM(CASE WHEN i.nome_inscrito1 IS NOT NULL AND i.nome_inscrito1 != '' THEN 1 ELSE 0 END +
               CASE WHEN i.nome_inscrito2 IS NOT NULL AND i.nome_inscrito2 != '' THEN 1 ELSE 0 END +
               CASE WHEN i.nome_inscrito3 IS NOT NULL AND i.nome_inscrito3 != '' THEN 1 ELSE 0 END) as total_alunos
    FROM inscricoes i
    JOIN escola e ON i.escola_inscrito = e.escola_id
    GROUP BY e.escola_nome";
$result = $conexao->query($sql);

$data = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="Pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style/administrador.css" />
  <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../js/administrador.js" defer></script>
  <title>Administrador</title>
  <style>


  </style>
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
    <nav>
      <ul>
        <li><a id="dashboard" href="#dashboard"><i class="bx bx-grid-alt"></i><span>Dashboard</span></a></li>
        <li><a id="inscricoes" href="#inscricoes"><i class="bx bx-user-plus"></i><span>Inscrições</span></a></li>
        <li><a id="adicionar_notas" href="#adicionar_notas"><i class="bx bx-edit"></i><span>Adicionar Notas</span></a></li>
        <li><a id="adicionar_imagens" href="#adicionar_imagens"><i class="bx bx-image-add"></i><span>Adicionar Imagens</span></a></li>
        <li><a id="ranking" href="#ranking"><i class="bx bx-medal"></i><span>Ranking</span></a></li>

      </ul>
    </nav>
    <div class="container">
      <div id="info-1">
        <div class="dashboard">
          <div class="grafico">
            <h1>QUANTIDADE DE ALUNOS POR ESCOLA</h1>
            <canvas id="myChart"></canvas>
          </div>
          <div class="cards">
            <div class="card">
              <div class="numeros">
                <?php
                echo "<h1>" . $total_participantes  . "</h1>";
                ?>
                <h1>PARTICIPANTES</h1>
              </div>
              <div class="icone">
                <i class="bx bx-id-card"></i>
              </div>
            </div>
            <div class="card">
              <div class="numeros">
                <?php
                echo "<h1>" . $total_equipes  . "</h1>";
                ?>
                <h1>EQUIPES</h1>
              </div>
              <div class="icone">
                <i class="bx bx-group"></i>
              </div>
            </div>
            <div class="card">
              <div class="numeros">
                <?php
                echo "<h1>" . $total_escolas . "</h1>";
                ?>
                <h1>ESCOLAS</h1>
              </div>
              <div class="icone">
                <i class="bx bx-buildings"></i>
              </div>
            </div>
            <div class="card_lista_equipes" id="lista_equipes">
              <div class="numeros">
                <h1>LISTA DE EQUIPES</h1>
              </div>
              <div class="icone">
                <i class="bx bx-list-ul"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="info-2">
        <div class="pesquisa">
          <h1 id="titulo_incricoes">INSCRIÇÕES</h1>
          <input type="search" id="search" list="equipes" placeholder="🔍 Digite o nome da equipe para pesquisar">
          <div id="resultado"></div>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script>
            $(document).ready(function() {
              $("#search").on("input", function() {
                var query = $(this).val();
                if (query.length > 0) {
                  $.ajax({
                    url: "buscar_equipes.php",
                    method: "POST",
                    data: {
                      search: query
                    },
                    success: function(data) {
                      $("#resultado").html(data).show();
                    }
                  });
                } else {
                  $("#resultado").hide();
                }
              });
            });
          </script>
          <div class="cards-info-2">
            <?php if ($result_buscar->num_rows > 0) {
              while ($usuario = $result_buscar->fetch_assoc()) {
                echo '<div class="equipes">';
                echo "<h1>" . $usuario['nome_equipe_inscrito'] . "</h1>";
                echo "<p class='competidor'>Competidor 1: <span class='nome_escrito'>" . $usuario['nome_inscrito1'] . "</span></p>";
                echo "<p class='competidor'>Competidor 2: <span class='nome_escrito'>" . $usuario['nome_inscrito2'] . "</span></p>";
                if (!empty($usuario['nome_inscrito3'])) {
                  echo "<p class='competidor'>Competidor 3: <span class='nome_escrito'>" . $usuario['nome_inscrito3'] . "</span></p>";
                }
                echo "<p class='competidor'>Escola: <span class='escola_nome'>" . $usuario['escola_nome'] . "</span></p>";
                echo '</div>';
              }
            } ?>
          </div>
          <button id="baixar_excel">Baixar relatório Excel</button>
        </div>
      </div>
      <div id="info-3">
        <div class="adicionar_notas">
          <h1>INSERIR NOTAS DAS EQUIPES</h1>
          <div class="notas">
            <span>Selecione a equipe:
              <select name="" id="">
                <option value="">EQUIPE1</option>
                <option value="">EQUIPE2</option>
                <option value="">EQUIPE3</option>
              </select></span>
            <span>Nota do módulo A: <input type="number" min="0" max="200" maxlength="3"></span>
            <span>Nota do módulo B:<input type="number" min="0" max="200" maxlength="3"></span>
            <span>Nota do módulo C: <input type="number" min="0" max="200" maxlength="3"></span>
            <button>Inserir</button>
          </div>
        </div>
      </div>
      <div id="info-4">
        <div class="adicionar_imagens">
          <h1>INSERIR IMAGENS DAS EQUIPES</h1>
          <div class="notas">
          <div class="options-botton">
  <div>
    <span>Selecione o tipo:</span>
    <select>
      <option value="">PREMIAÇÕES</option>
      <option value="">SELETIVAS</option>
      <option value="">FINAIS</option>
    </select>
  </div>
  <div>
    <span>Selecione o Ano:</span>
    <select>
      <option value="">2022</option>
      <option value="">2023</option>
      <option value="">2024</option>
      <option value="">2025</option>
    </select>
  </div>
</div>

            <label for="botao_escolher_imagens" id="dropzone_escolher_imagens">Escolher Imagens
              <div id="imagens_escolhidas"></div>
            </label>
            <input type="file" id="botao_escolher_imagens" multiple accept="image/">
            <button id="inserir_botao">Inserir</button>
          </div>
        </div>
      </div>
      <div id="info-5">
        <div class="ranking">
          <div class="ranking-final">
            <h1>RANKING DAS EQUIPES FINALISTAS</h1>
            <table>
              <tr>
                <th>Posição</th>
                <th>Equipe</th>
                <th>Módulo A</th>
                <th>Módulo B</th>
                <th>Módulo C</th>
                <th>Total</th>
              </tr>
              <tr>
                <td>1</td>
                <td>TESTE</td>
                <td>129</td>
                <td>213</td>
                <td>1123</td>
                <td>131231</td>
              </tr>
            </table>
          </div>
          <div class="ranking-geral">
            <h1>RANKING GERAL</h1>
            <table>
              <tr>
                <th>Posição</th>
                <th>Equipe</th>
                <th>Módulo A</th>
                <th>Módulo B</th>
                <th>Módulo C</th>
                <th>Total</th>
              </tr>
              <tr>
                <td>1</td>
                <td>TESTE</td>
                <td>129</td>
                <td>213</td>
                <td>1123</td>
                <td>131231</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    function getResponsiveFontSize(baseSize) {
      const screenWidth = window.innerWidth;
      if (screenWidth <= 480) {
        return baseSize * 1; // Reduz para 70% do tamanho base
      } else if (screenWidth <= 768) {
        return baseSize * 1; // Reduz para 85% do tamanho base
      } else {
        return baseSize; // Tamanho base para telas maiores
      }
    }

    function shouldShowLegend() {
      return window.innerWidth > 768; // Mostrar legenda apenas se a largura da tela for maior que 768px
    }

    // Calcula a porcentagem de alunos por escola
    const data = <?php echo json_encode($data); ?>;

    // Cria o gráfico doughnut
    const labels = data.map(item => item.escola_nome);
    const values = data.map(item => item.total_alunos);

    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: labels,
        datasets: [{
          data: values,
          backgroundColor: [
            'rgba(70, 104, 255, 0.68)',
            'rgba(54, 162, 235, 0.7)',
          ],
          borderColor: [
            'rgba(70, 104, 255, 0.68)',
            'rgba(54, 162, 235, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
            display: shouldShowLegend(),
            labels: {
              color: 'white', // Altere para a cor desejada
              font: {
                family: 'Poppins',
                size: getResponsiveFontSize(18) // Altere para o tamanho desejado
              }
            }
          },
        }
      }
    });
  </script>
</body>

</html>