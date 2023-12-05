<?php
    include_once("../Module/conexao.php");
    $c = new Conexao();

    $carrinho = $c->getCarrinho($id);