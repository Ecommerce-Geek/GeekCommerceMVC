<?php
    include_once("../Module/conexao.php");
    $c = new Conexao();

    $produtos = $c->getAllProdutos();
    $categorias = $c->getAllCategorias();