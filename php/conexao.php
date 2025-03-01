<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "dev_experience";

$conexao = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conexao) {
    die('A conexão falhou' . mysqli_connect_errno());
}
