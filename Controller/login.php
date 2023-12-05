<?php
include_once("../Module/conexao.php");
$c = new Conexao();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupera os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido";
        exit;
    }

    $id = $c->getIdByEmailAndPassword($email, $senha);

    if ($id == 0) {
        header("Location: ../View/erro.php?e=1");
    } else {
        header("Location: ../View/home.php?id=$id&tela=home");
    }

} else {
    exit;
}