<?php
    include_once("../Module/conexao.php");
    $c = new Conexao();

    $id = '';
    $nome = '';
    $sobrenome = '';
    $cep = '';
    $telefone = '';
    $email = '';
    $senha = '';
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["id"])) $id = $_POST["id"];
        if (isset($_POST["nome"])) $nome = $_POST["nome"];
        if (isset($_POST["sobrenome"])) $sobrenome = $_POST["sobrenome"];
        if (isset($_POST["cep"])) $cep = $_POST["cep"];
        if (isset($_POST["telefone"])) $telefone = $_POST["telefone"];
        if (isset($_POST["email"])) $email = $_POST["email"];
        if (isset($_POST["senha"])) $senha = $_POST["senha"];
        
        $c->alterDataUser($id, $nome, $sobrenome, $cep, $telefone, $email, $senha);

        header("Location: ../View/home.php?id=$id&tela=home");
    }