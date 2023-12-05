<?php
    include_once("../Module/conexao.php");
    $c = new Conexao();

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $produtoId = $_GET['produto_id'];
        $id = $_GET['id'];
        $frete = $_GET['frete'];
        $quantidade = $_GET["quantidade"];
        $c->setCarrinho($id, $produtoId, $frete, $quantidade);
    }
    header("Location: ../View/home.php?id=$id&tela=carrinho");