<?php
include('conexao.php');
session_start();

// Verificar conexão
if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

$sql = "SELECT nome_equipe_avaliacao, 
               nota_modulo_a_avaliacao, 
               nota_modulo_b_avaliacao, 
               nota_modulo_c_avaliacao, 
               (nota_modulo_a_avaliacao + nota_modulo_b_avaliacao + nota_modulo_c_avaliacao) AS Total
        FROM avaliacao
        ORDER BY Total DESC LIMIT 10";

$result = $conexao->query($sql);
if (!$result) {
    die("Erro na consulta SQL: " . $conn->error);
}

$sqlGeral = "SELECT nome_equipe_avaliacao, 
               nota_modulo_a_avaliacao, 
               nota_modulo_b_avaliacao, 
               nota_modulo_c_avaliacao, 
               (nota_modulo_a_avaliacao + nota_modulo_b_avaliacao + nota_modulo_c_avaliacao) AS Total
        FROM avaliacao
        ORDER BY Total DESC";

$resultGeral = $conexao->query($sqlGeral);
if (!$resultGeral) {
    die("Erro na consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/ranking.css" />
    <link rel="shortcut icon" href="../img/logo_x.svg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="../js/ranking.js" defer></script>
    <title>Ranking</title>
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
    <img class="banner" src="../img/banner-rank.png" alt="">
    <div class="container">
        <section class="intro">
            <p>Confira aqui a classificação final do Dev Experience – Edição 2024.</p>
            <p>Veja o desempenho dos participantes e os destaques desta edição!</p>
        </section>
        <section class="ranking-table">
            <table>
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Equipe</th>
                        <th>Módulo A</th>
                        <th>Módulo B</th>
                        <th>Módulo C</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1º</td>
                        <td>PHP HATERS</td>
                        <td>462.28</td>
                        <td>335</td>
                        <td>125</td>
                        <td>922.28</td>
                    </tr>
                    <tr>
                        <td>2º</td>
                        <td>TECHDINASTY</td>
                        <td>423.86</td>
                        <td>165</td>
                        <td>134</td>
                        <td>722.86</td>
                    </tr>
                    <tr>
                        <td>3º</td>
                        <td>TECNOWAY</td>
                        <td>280</td>
                        <td>310</td>
                        <td>130</td>
                        <td>720</td>
                    </tr>
                    <tr>
                        <td>4º</td>
                        <td>DEV.LOG</td>
                        <td>281.86</td>
                        <td>335</td>
                        <td>83</td>
                        <td>699.86</td>
                    </tr>
                    <tr>
                        <td>5º</td>
                        <td>BYTECODE</td>
                        <td>339.24</td>
                        <td>220</td>
                        <td>105</td>
                        <td>664.24</td>
                    </tr>
                    <tr>
                        <td>6º</td>
                        <td>DUOSTUDYINGCODES</td>
                        <td>148</td>
                        <td>235</td>
                        <td>85</td>
                        <td>468</td>
                    </tr>
                    <tr>
                        <td>7º</td>
                        <td>ALT F4</td>
                        <td>138</td>
                        <td>215</td>
                        <td>60</td>
                        <td>413</td>
                    </tr>
                    <tr>
                        <td>8º</td>
                        <td>CODE BUSTERS</td>
                        <td>122.62</td>
                        <td>175</td>
                        <td>80</td>
                        <td>377.62</td>
                    </tr>
                    <tr>
                        <td>9º</td>
                        <td>TESOURO BINÁRIO</td>
                        <td>125</td>
                        <td>160</td>
                        <td>25</td>
                        <td>310</td>
                    </tr>
                    <tr>
                        <td>10º</td>
                        <td>MASTER OF CODES</td>
                        <td>132.48</td>
                        <td>125</td>
                        <td>27</td>
                        <td>284.48</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    <h1 id="ranking-geral">RANKING GERAL</h1>
    <br>
    <br>
    <section id="tabela-geral">
<table border="1">
    <tr>
        <th>Posição</th>
        <th>Equipe</th>
    </tr>

    <?php
    if (isset($resultGeral) && $resultGeral->num_rows > 0) {
        $posicaoGeral = 1;

        while ($rowGeral = $resultGeral->fetch_assoc()) {
            echo "<tr>
            <td>{$posicaoGeral}º</td>
            <td>{$rowGeral['nome_equipe_avaliacao']}</td>
          </tr>";

            $posicaoGeral++;
        }
    } else {
        echo "<tr><td colspan='2'>Nenhuma equipe encontrada</td></tr>";
    }
    ?>
</table>
</section>
</body>
</html>