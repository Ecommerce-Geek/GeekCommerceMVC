<?php
    include_once("../Module/conexao.php");
    $c = new Conexao();

    $data = $c->getAllDataById($id);
?>
