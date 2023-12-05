<?php
include_once("../Module/conexao.php");
$c = new Conexao();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $produtoId = $_GET['produtoId'];
    $id = $_GET['id'];

    $c->deletProduto($produtoId);
}

header("Location: ../View/home.php?id=$id&tela=carrinho");