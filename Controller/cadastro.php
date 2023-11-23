<?php
    include_once("../Module/conexao.php");
    $c = new Conexao();
    
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Recupera os dados do formulário
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $cep = $_POST["cep"];
        $senha = $_POST["senha"];


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email inválido";
            exit;
        }

        $id = $c->setAllDataAndReturnId($nome, $sobrenome, $cpf, $email, $telefone, $cep, $senha);

        if ($id == 0) {
            header("Location: ../View/erro.php?e=2");
        } else {
            header("Location: ../View/home.php?id=$id");
        }
        
    } else {
        exit;
    }