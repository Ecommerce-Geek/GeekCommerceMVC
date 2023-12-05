<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geeek</title>
    <link rel="stylesheet" href="css/style-home.css">
    <link rel="stylesheet" href="css/style-config.css">
    <script src="js/script-home.js" defer></script>
    <link rel="stylesheet" href="css/style-produtos.css" />
    <script defer src="js/script-produtos.js" defer></script>
</head>

<body onload="chooseTodos()">
    <script>
        var produtos, categorias, user;
    </script>
    <?php
    include_once("../Controller/getAllProdutos.php");
    echo "<script>produtos = " . json_encode($produtos) . ", categorias = " . json_encode($categorias) . ";</script>";
    $existeId = false;
    $tela = "";
    $data = null;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_GET['tela'])) {
            $tela = $_GET['tela'];
        }
        $existeId = true;
        include_once("../Controller/getAllClientes.php");
        echo "<script>user = '" . $id . "';var nome = '" . $data['nome'] . "', sobrenome = '" . $data['sobrenome'] . "', cpf = '" . $data['cpf'] . "', email = '" . $data['email'] . "', telefone = '" . $data['telefone'] . "', cep = '" . $data['cep'] . "';</script>";
    }
    ?>
    <div class="container">
        <nav>
            <div class="campo-icone">
                <div id="alinhamento-logo">
                    <figure>
                        <img id="p" src="img/simbulos-home/P.png" alt="home">
                        <img id="oint" src="img/simbulos-home/OINT.png" alt="home">
                        <img id="geek" src="img/simbulos-home/GEEK.png" alt="home">
                        <img id="eclipse" src="img/simbulos-home/Ellipse 2.png" alt="">
                    </figure>
                </div>
            </div>
            <div id="campo-pesquisa">
                <input type="text" name="query" placeholder="O que você procura?" id="form-pesquisar" required>
                <button type="submit" id="botao-pesquisar" onclick="search()">Pesquisar</button>
                <div id="resultadosDiv">

                </div>
            </div>
            <?php
            if ($existeId) {
            ?>
                <div class="campo-icone" id="icon-home">
                    <img src="img/simbulos-navegacao/casa.png" alt="home">
                </div>
                <div class="campo-icone" id="carrinho">
                    <span id="numero-compras">0</span>
                    <img src="img/simbulos-navegacao/carrinho-de-compras.png" alt="carrinho">
                </div>
                <div class="campo-icone" id="icon-config">
                    <img src="img/simbulos-navegacao/definicoes.png" alt="configuracao">
                </div>
            <?php
                echo "<label id='nome-label'>" . $data['nome'] . " " . $data["sobrenome"] . "</label>";
            } else {
                echo "<a href='login.html'><button id='entrar'>Logar</button></a>";
            }
            ?>
        </nav>
        <hr>
        <div class="template-home" id="home">
            <div class="campo-icone-localizacao">
                <div class="recursos-banner" id="todos" onclick="chooseTodos()">
                    <h5>Todos</h5>
                </div>
                <div class="recursos-banner" id="decoracao" onclick="typeChoose('decoracao')">
                    <h5>Decoração</h5>
                </div>
                <div class="recursos-banner" id="camiseta" onclick="typeChoose('camiseta')">
                    <h5>Camiseta</h5>
                </div>
                <div class="recursos-banner" id="jogo" onclick="typeChoose('jogo')">
                    <h5>Jogo</h5>
                </div>
                <div class="recursos-banner" id="diversos" onclick="typeChoose('diversos')">
                    <h5>Diversos</h5>
                </div>
            </div>
            <img id="bannerzao" src="img/banner-miranha.jpg" alt="">

            <div id="produtos-dinamicos">

                <h2 id="titulo-importante">Edição Limitada: Produtos Incríveis</h2>
                <div class="carrinho" id="slide-imagem1">
                    <a href="produtoexemplo.html">
                        <img class="image" id="hollow" src="img/Hollow Knight.jpg" alt="Hollow Knight">
                    </a>
                </div>
                <div class="carrinho" id="slide-imagem2">
                    <a href="produtoexemplo.html">
                        <img class="image" id="sonic" src="img/sonic-bear-banner.jpg" alt="jogo Sonic Bear">
                    </a>
                </div>
                <div class="carrinho" id="slide-imagem3">
                    <a href="produtoexemplo.html">
                        <img class="image" id="supersmash" id="supersmash" src="img/supersmashbros-banner.jpg" alt="jogo Super Smash Bros">
                    </a>
                </div>
                <div class="carrinho" class="campo-icone">
                    <img class="setinha" id="direita" src="img/simbulos-dinamicos/angulo-direito.png" alt="">
                </div>
                <div class="carrinho" class="campo-icone">
                    <img class="setinha" id="esquerda" src="img/simbulos-dinamicos/angulo-esquerdo.png" alt="">
                </div>

                <div class="campo-icone">
                    <div class="carrinho" id="campo-bolinhas">
                        <div class="slide-bolinha1">
                            <img class="bolinha" id="bolinha-preta" src="img/simbulos-dinamicos/circulo-preto.png">
                        </div>
                        <div class="slide-bolinha2">
                            <img class="bolinha" id="bolinha-branca" src="img/simbulos-dinamicos/circulo-branco.png">
                        </div>
                        <div class="slide-bolinha3">
                            <img class="bolinha" id="bolinha-branca" src="img/simbulos-dinamicos/circulo-branco.png">
                        </div>
                    </div>
                </div>
                <div class="sub-recursos">
                    <h2 id="sub-title">Venha Conferir os Nossos Produtos!</h2>
                    <a id="ver-todos" href="produtosGeral.html">Ver Todos</a>
                </div>
            </div>
            <div class="parent-container">
                <div id="produtos-id" class="parent-container"></div>
                <footer>
                    <div class="footer-content">
                        <div class="footer-section about">
                            <h2>Sobre Nós</h2>
                            <p>Seu e-commerce oferece os melhores produtos para você.</p>
                        </div>

                        <div class="footer-section links">
                            <h2>Links Rápidos</h2>
                            <ul>
                                <li><a href="#">Trabalhe Conosco</a></li>
                                <li><a href="#">Produtos</a></li>
                                <li><a href="#">Contato</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>

                        <div class="footer-section contact">
                            <h2>Entre em Contato</h2>
                            <p>Email: contato@pointgeek.com</p>
                            <p>Telefone: (xx) xxxxx-xxxx</p>
                        </div>
                    </div>

                    <div class="footer-bottom">
                        &copy; 2023 Seu PointGeek | Desenvolvido por Você
                    </div>
                </footer>
            </div>
        </div>
        <div id="div-produto"></div>
        <div id="finalizacao-compras">
            <h3>Carrinho</h3>
            <div id="div-carrinho">
                <div class="area-carrinho">
                    <img class="imagens-carrinho" src="img/produtosindividuais/Homem Aranha200.jpg" alt="ps5">
                    <span class="produto-quantidade">1</span>
                    <div class="organizar-vertical">
                        <p class="produto-carrinho"><span class="nome-carrinho">Jogo Homem Aranha </span>R$<span class="preco-carrinho">150.00</span> x<span class="quantidade-carrinho"> 1</span></p>
                        <p class="area-frete">Valor do frete: R$<span class="frete-carrinho">40.00</span></p>
                        <div class="campo-icone" id="posicionamento-icone">
                            <img src="img/simbulos-dinamicos/cruz.png" alt="tirar do carrinho">
                        </div>
                    </div>
                </div>
                <div class="finalizar-compra">
                    <p class="total">Total: R$<span class="total-span">190.00</span></p>
                    <button class="btn-finalizar">Finalizar Compra</button>
                </div>
            </div>

        </div>
        <div id="configuracoes" class="div-conf">
            <h3>Configurações</h3>
            <form id="form-cadastro-config" action="../Controller/alterUser.php" method="POST">
                <div class="box-input-config" id="conteiner-nome">
                    <label for="emai">Alterar Nome:</label>
                    <input type="text" name="nome" id="nome-config" class="entrada" placeholder=<?php echo $data !== null ? '"' . $data['nome'] . '"' : "" ?> />
                </div>
                <div class="box-input-config" id="conteiner-sobrenome">
                    <label for="emai">Alterar Sobrenome:</label>
                    <input type="text" name="sobrenome" id="sobrenome-config" class="entrada" placeholder=<?php echo $data !== null ? '"' . $data['sobrenome'] . '"' : "" ?> />
                </div>
                <div class="box-input-config" id="conteiner-cep">
                    <label for="cep">Alterar CEP: </label>
                    <input type="text" name="cep" id="cep-config" class="entrada" placeholder=<?php echo $data !== null ? '"' . $data['cep'] . '"' : "" ?> />
                </div>
                <div class="box-input-config" id="conteiner-telefone">
                    <label for="telefone">Alterar Telefone:</label>
                    <input type="number" name="telefone" id="telefone-config" class="entrada" placeholder=<?php echo $data !== null ? '"' . $data['telefone'] . '"' : "" ?> />
                </div>
                <div class="box-input-config" id="conteiner-email">
                    <label for="emai">Alterar E-mail:</label>
                    <input type="text" name="email" id="email-config" class="entrada" placeholder=<?php echo $data !== null ? '"' . $data['email'] . '"' : "" ?> />
                </div>
                <div class="box-input-config" id="conteiner-senha">
                    <label for="senha">Alterar Senha:</label>
                    <input type="password" name="senha" id="senha-config" class="entrada" />
                </div>
                <input style='display: none;' type="text" name="id" value=<?php echo "$id" ?>>
                <input type="submit" value="Modificar" class="btn-submit-config" id="enviar" />
            </form>
            <input type="submit" value="Deslogar" class="btn-submit-config" id="deslogar" />
        </div>
        <?php
        if ($tela === "home") {
        ?>
            <script>
                document.getElementById("home").style.display = "block";
                document.getElementById("finalizacao-compras").style.display = "none";
                document.getElementById("configuracoes").style.display = "none";
                document.getElementById("div-produto").style.display = "none";
            </script>
        <?php } elseif ($tela === "carrinho") { ?>
            <script>
                document.getElementById("home").style.display = "none";
                document.getElementById("finalizacao-compras").style.display = "block";
                document.getElementById("configuracoes").style.display = "none";
                document.getElementById("div-produto").style.display = "none";
            </script>
        <?php } elseif ($tela === "conf") { ?>
            <script>
                document.getElementById("home").style.display = "none";
                document.getElementById("finalizacao-compras").style.display = "none";
                document.getElementById("configuracoes").style.display = "block";
                document.getElementById("div-produto").style.display = "none";
            </script>
        <?php } ?>
</body>

</html>