<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geeek</title>
    <link rel="stylesheet" href="css/style-home.css">
</head>

<body>
    <?php 
        $existeId = false;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $existeId = true;
            include_once("../Controller/getAllData.php");
            echo "<script>var nome = '".$data['nome']."', sobrenome = '".$data['sobrenome']."', cpf = '".$data['cpf']."', email = '".$data['email']."', telefone = '".$data['telefone']."', cep = '".$data['cep']."';</script>";
        }
    ?>
    <div class="container">
        <nav>
            <h5 id="logo">Point Geeek</h5>
            <form action="/search" method="get">
                <input type="text" name="query" placeholder="O que procura?" id="form-pesquisar" required>
                <button type="submit" id="botao-pesquisar">Pesquisar</button>
            </form>
            <div class="campo-icone">
                <figure>
                    <img src="img/casa.png" alt="home">
                    <figcaption>Home</figcaption>
                </figure>
            </div>
            <div class="campo-icone">
                <img src="img/carrinho-de-compras.png" alt="carrinho">
                <figcaption>Carrinho</figcaption>
            </div>
            <div class="campo-icone">
                <figure>
                    <img src="img/comente.png" alt="chat">
                    <figcaption id="chat">Chat</figcaption>
                </figure>
            </div>
            <div class="campo-icone">
                <figure>
                    <img src="img/sino.png" alt="notificacao">
                    <figcaption id="notificacao">Notificação</figcaption>
                </figure>
            </div>
            <?php
                if ($existeId) {
                    echo "<label>".$data['nome']." ".$data["sobrenome"]."</label>";
                } else {
                    echo "<a href='login.html'><button id='entrar'>Logar</button></a>";
                }
            ?>
        </nav>
        <hr>
        <div class="template-home">
            <div class="campo-icone-localizacao">
                <figure id="simbolo-alinhado">
                    <img id="icone-localizacao" src="img/marcador.png" alt="localizacação">
                    <select name="selecao-estados" id="selecao-estados">
                        <option class="opcoes" value="opcoes"></option>
                        <option class="opcoes" value="opcoes">Pará</option>
                    </select>
                </figure>
                <div class="recursos-banner" id="decoracao">
                    <h5>Decoração</h5>
                </div>
                <div class="recursos-banner" id="camiseta">
                    <h5>Camiseta</h5>
                </div>
                <div class="recursos-banner" id="personalizados">
                    <h5>Personalizados</h5>
                </div>
                <div class="recursos-banner" id="promocoes">Promoções</div>
                <div class="recursos-banner" id="diversos">
                    <h5>Diversos</h5>
                </div>

            </div>
            <img id="bannerzao" src="img/bannerzao.webp" alt="">
            <h5 id="sub-title">Chama aleatória para os itens</h5>
        </div>
        
        <div class="parent-container">
            <div class="produto"></div>
            <div class="produto"></div>
            <div class="produto"></div>
            <div class="produto"></div>
            <div class="produto"></div>
        </div>

    </div>
</body>

</html>