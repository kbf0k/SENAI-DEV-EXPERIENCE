<?php
include('conexao.php');

if (isset($_POST['search'])) {
    $search = "%" . $_POST["search"] . "%";
    $sql = $conexao->prepare("SELECT nome_equipe_inscrito,
    nome_inscrito1, nome_inscrito2, nome_inscrito3,
    escola_nome 
    FROM inscricoes 
    JOIN escola ON 
    escola_inscrito = escola_id 
    WHERE nome_equipe_inscrito 
    LIKE ? 
    OR nome_inscrito1 LIKE ? 
    OR nome_inscrito2 LIKE ? 
    OR nome_inscrito3 LIKE ? 
    ORDER BY nome_equipe_inscrito ASC");

    $sql->bind_param('ssss', $search, $search, $search, $search);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        echo '<div class="cards-info-2">';

        while ($usuario = $result->fetch_assoc()) {
            echo '<div class="equipes">';
            echo "<h1>" . htmlspecialchars($usuario['nome_equipe_inscrito']) . "</h1>";
            echo "<p class='competidor'>Competidor 1: <span class='nome_escrito'>" . htmlspecialchars($usuario['nome_inscrito1']) . "</span></p>";
            echo "<p class='competidor'>Competidor 2: <span class='nome_escrito'>" . htmlspecialchars($usuario['nome_inscrito2']) . "</span></p>";
            if (!empty($usuario['nome_inscrito3'])) {
                echo "<p class='competidor'>Competidor 3: <span class='nome_escrito'>" . htmlspecialchars($usuario['nome_inscrito3']) . "</span></p>";
            }
            echo "<p class='competidor'>Escola: <span class='escola_nome'>" . htmlspecialchars($usuario['escola_nome']) . "</span></p>";
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo '<p class="no-results">Nenhuma equipe encontrada.</p>';
    }
}
