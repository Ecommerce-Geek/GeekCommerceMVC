<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEEK - ERRO</title>
</head>
<body>
    <?php
        if (isset($_GET['e'])) {
            $e = $_GET['e'];
        }
        if ($e == 1) {
    ?>
    <div id="erro">
        <h1>Usuario ou senha incorretos.</h1>
        <a href="home.php"><button>Voltar para HOME</button></a>
    </div>
    <?php } elseif ($e == 2) {?>
    <div id="erro">
        <h1>Usuario já existente.</h1>
        <a href="home.php"><button>Voltar para HOME</button></a>
    </div>
    <?php }?>
</body>
</html>