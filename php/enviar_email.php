<?php
include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = $_POST['esqueci_email'];

    $token = bin2hex(random_bytes(50));

    $stmt = $conexo->prepare("UPDATE usuarios SET token_recuperacao = ? WHERE email_usuario = ?");
    $stmt->bind_param('ss', $token, $to);
    $stmt->execte();

    $subject = "Solicitação de redefinição de senha em SENAI DEV EXPERINCE";
    $message = "Olá,
    Recebemos uma solicitação para redefinir a senha da sua conta associada a este e-mail:" . $_GET['esqueci_email'] . " ;
    
    Se você não fez essa solicitação, pode ignorar este e-mail com segurança – nenhuma alteração será feita em sua conta.
    
    Para redefinir sua senha, clique no link abaixo:
    
    🔗 <a href='redefinir_senha.php'>Redefinir Senha</a>
    
    Atenciosamente,
    SENAI DEV EXPERINCE";

    $headers = 'From: senaidevexperience@senai.org.br';
    $mail($to, $subject, $message, $headers);
}
