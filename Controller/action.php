<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Formulário</title>
</head>

<body>
    <h1>Resultado do Formulário</h1>

    <?php
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

        echo "Nome: $nome<br>";
        echo "Sobrenome: $sobrenome<br>";
        echo "CPF: $cpf<br>";
        echo "Email: $email<br>";
        echo "Telefone: $telefone<br>";
        echo "CEP: $cep<br>";


    } else {

        header("Location: erro.html");
        exit;
    }
    ?>


</body>

</html>