<?php
    include_once("../Module/conexao.php");
    $c = new Conexao();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $produtoId = $_POST['produto_id'];
        $id = $_POST['id'];
        $frete = $_POST['frete'];
        $quantidade = $_POST["quantidade"];
        //$c->setCarrinho($id, $produtoId, $frete, $quantidade);
    }
    //header("Location: ../View/home.php?id=$id");