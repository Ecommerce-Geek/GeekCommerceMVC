<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geeek</title>
    <link rel="stylesheet" href="css/style-home.css">
    <link rel="stylesheet" href="css/style-config.css">
    <script defer src="js/script-home.js"></script>
</head>

<body>
    <script>
        var produtos, categorias;
    </script>
    <?php
    include_once("../Controller/getAllProdutos.php");
    echo "<script>produtos = " . json_encode($produtos) . ", categorias = " . json_encode($categorias) . ";</script>";
    $existeId = false;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $existeId = true;
        include_once("../Controller/getAllClientes.php");
        echo "<script>var nome = '" . $data['nome'] . "', sobrenome = '" . $data['sobrenome'] . "', cpf = '" . $data['cpf'] . "', email = '" . $data['email'] . "', telefone = '" . $data['telefone'] . "', cep = '" . $data['cep'] . "';</script>";
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
                <div class="campo-icone">
                    <div id="carrinho">
                        <span id="numero-compras">0</span>
                        <img src="img/simbulos-navegacao/carrinho-de-compras.png" alt="carrinho">
                    </div>
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
                <div id="slide-imagem1">
                    <a href="produtoexemplo.html">
                        <img class="image" id="hollow" src="img/Hollow Knight.jpg" alt="Hollow Knight">
                    </a>
                </div>
                <div id="slide-imagem2">
                    <a href="produtoexemplo.html">
                        <img class="image" id="sonic" src="img/sonic-bear-banner.jpg" alt="jogo Sonic Bear">
                    </a>
                </div>
                <div id="slide-imagem3">
                    <a href="produtoexemplo.html">
                        <img class="image" id="supersmash" id="supersmash" src="img/supersmashbros-banner.jpg" alt="jogo Super Smash Bros">
                    </a>
                </div>
                <div class="campo-icone">
                    <img class="setinha" id="direita" src="img/simbulos-dinamicos/angulo-direito.png" alt="">
                </div>
                <div class="campo-icone">
                    <img class="setinha" id="esquerda" src="img/simbulos-dinamicos/angulo-esquerdo.png" alt="">
                </div>

                <div class="campo-icone">
                    <div id="campo-bolinhas">
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
        <div id="finalizacao-compras">
            <h3>Mostra do carrinho</h3>

        </div>
        <div id="configuracoes">
            <h3>Configurações</h3>
            <form id="form-cadastro-config" action="../Controller/cadastro.php" method="POST">
                <div class="box-input-config" id="conteiner-cep">
                    <label for="cep">Alterar CEP: </label>
                    <input type="text" name="cep" id="cep-config" class="entrada" placeholder="Alterar CEP:" />
                </div>
                <div class="box-input-config" id="conteiner-telefone">
                    <label for="telefone">Alterar Telefone:</label>
                    <input type="number" name="telefone" id="telefone-config" class="entrada" placeholder="Alterar Telefone:" />
                </div>
                <input type="submit" value="Modificar" class="btn-submit-config" id="enviar" />
            </form>
        </div>
        <script>
            function chooseTodos() {
                let div = document.getElementById("produtos-id");
                let h = "";
                Object.keys(produtos).map(function(k) {
                    h += "<div class='produto'>";
                    h += "<img src='" + produtos[k]['path_img'] + "' alt='" + produtos[k]['nome'] + "'>";
                    h += "<hr class='linha'>";
                    h += "<p class='legenda'>" + produtos[k]['nome'] + "</p>";
                    h += "<p class='preco'>R$" + produtos[k]['custo_unitario'].split('.')[0] + "<span>" + (produtos[k]['custo_unitario'].split('.')[1] === undefined ? '00' : produtos[k]['custo_unitario'].split('.')[1]) + "</span></p>";
                    h += "<button>Comprar</button></div>";
                });
                div.innerHTML = h;
            }
            if (produtos !== undefined) {
                chooseTodos()
            }

            function typeChoose(tipo) {
                let div = document.getElementById("produtos-id");
                let h = "";
                Object.keys(categorias).map(function(i) {
                    if (categorias[i] === tipo) {
                        Object.keys(produtos).map(function(k) {
                            if (produtos[k]['categoria_id'] === i) {
                                h += "<div class='produto'>";
                                h += "<img src='" + produtos[k]['path_img'] + "' alt='" + produtos[k]['nome'] + "'>";
                                h += "<hr class='linha'>";
                                h += "<p class='legenda'>" + produtos[k]['nome'] + "</p>";
                                h += "<p class='preco'>R$" + produtos[k]['custo_unitario'].split('.')[0] + "<span>" + (produtos[k]['custo_unitario'].split('.')[1] === undefined ? '00' : produtos[k]['custo_unitario'].split('.')[1]) + "</span></p>";
                                h += "<button>Comprar</button></div>";
                            }
                        });
                    }
                });
                div.innerHTML = h;
            }

            function search() {
                let s = document.getElementById('form-pesquisar').value;
                if (s !== "") {
                    let div = document.getElementById('produtos-id');
                    let h = "";
                    Object.keys(produtos).map(function(k) {
                        if (produtos[k]['nome'].toLowerCase().indexOf(s.toLowerCase()) !== -1) {
                            h += "<div class='produto'>";
                            h += "<img src='" + produtos[k]['path_img'] + "' alt='" + produtos[k]['nome'] + "'>";
                            h += "<hr class='linha'>";
                            h += "<p class='legenda'>" + produtos[k]['nome'] + "</p>";
                            h += "<p class='preco'>R$" + produtos[k]['custo_unitario'].split('.')[0] + "<span>" + (produtos[k]['custo_unitario'].split('.')[1] === undefined ? '00' : produtos[k]['custo_unitario'].split('.')[1]) + "</span></p>";
                            h += "<button>Comprar</button></div>";
                        }
                    });
                    document.getElementById('form-pesquisar').value = "";
                    div.innerHTML = h !== "" ? h : "<h2>A pesquisa '" + s + "' não foi encontrado!</h2>";
                }
            }
        </script>

</body>

</html>