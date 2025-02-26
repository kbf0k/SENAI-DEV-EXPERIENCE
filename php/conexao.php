<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "db_dev";

$conexao = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conexao) {
    die('A conexão falhou' . mysqli_connect_errno());
}
