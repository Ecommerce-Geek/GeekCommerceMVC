<?php
    // Verifica se o formulário foi enviado
    include_once("../Module/conexao.php");
    $c = new Conexao();

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

        echo "Nome: $nome<br>";
        echo "Sobrenome: $sobrenome<br>";
        echo "CPF: $cpf<br>";
        echo "Email: $email<br>";
        echo "Telefone: $telefone<br>";
        echo "CEP: $cep<br>";
        echo "ID: $id";

    } else {
        header("Location: erro.html");
        exit;
    }