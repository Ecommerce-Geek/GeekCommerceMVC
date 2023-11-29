//const btnComprar = document.querySelector(".comprar");
var quantidade = 1 // Inicializa a quantidade
function calcular(id) {
    const painelPreco = document.querySelector(".preco-produto");
    const btnIncrementar = document.querySelector(".logo-mais");
    const btnDecrementar = document.querySelector(".logo-menos");
    const painelQuantidade = document.querySelector(".painel-quantidade");

    // Adicione o preço por unidade do produto
    const precoPorUnidade = parseFloat(produtos[id]['custo_unitario']);

    btnIncrementar.addEventListener("click", (event) => {
        console.log("Botão Incrementar clicado");
        incrementarQuantidade();
        event.preventDefault();
    });

    btnDecrementar.addEventListener("click", (event) => {
        console.log("Botão Decrementar clicado");
        decrementarQuantidade();
        event.preventDefault();
    });
    function incrementarQuantidade() {
        quantidade += 1;
        atualizarPainel();
    }

    function decrementarQuantidade() {
        if (quantidade > 1 ) {
            quantidade -= 1;
            atualizarPainel();
        }
    }

    function atualizarPainel() {
        painelQuantidade.textContent = quantidade;

        // Atualizar o painel de preço multiplicando a quantidade pelo preço por unidade
        const precoTotal = quantidade * (precoPorUnidade+0.01);
        painelPreco.textContent = `Preço Total: R$ ${precoTotal.toFixed(2)}`;

    }

    // Chame a função inicialmente para exibir o preço inicial
    atualizarPainel();
}

const div_produto = document.getElementById("div-produto");

div_produto.style.display = "none";
function btn_click(id) {
    quantidade = 1;
    let h = "";
    h += "<div class='template-home' id='home'>";
    h += "<div class='template-fundo'>";
    h += "<header class='cabecalhodo-produto'>";
    h += "<img class='produto-individul' src='"+produtos[id]['path_img']+"'>";
    h += "</header>";
    h += "<main>";
    h += "<section>";
    h += "<h2 class='titulo-produto'>"+produtos[id]['nome']+"</h2>";
    h += "<p class='preco-produto' id='produto-venom'>R$ "+produtos[id]['custo_unitario']+"</p>";
    h += "<p class='descricao'>"+produtos[id]['descricao']+"</p>";
    h += "<button class='comprar' onclick='add_carrinho("+id+")'>COMPRAR</button>";
    h += "<div class='campo-quantidade'>";
    h += "<div class='campo-icone-produtos'>";
    h += "<div class='logo-mais'>";
    h += "<img id='mais' src='img/simbulos-dinamicos/sinal-de-mais.png'>";
    h += "</div>";
    h += "<p class='painel-quantidade'>1</p>";
    h += "<div class='logo-menos'>";
    h += "<img id='menos' src='img/simbulos-dinamicos/sinal-de-menos.png'>";
    h += "</div>";
    h += "</div>";
    h += "</div>";
    h += "</section>";
    h += "</main>";
    h += "<footer class='rodape-produto'>";
    h += "<p>&copy; 2022 E-commerce PointGeek. Todos os direitos reservados.</p>";
    h += "</footer>";
    h += "</div>";
    h += "</div>";
    div_produto.innerHTML = h;
    calcular(id);

    document.getElementById("home").style.display = "none";
    document.getElementById("finalizacao-compras").style.display = "none";
    document.getElementById("configuracoes").style.display = "none";
    div_produto.style.display = "block";
}

function add_carrinho(id) {
    
    fetch("https://viacep.com.br/ws/"+cep+"/json/").then(r => r.json()).then(j => {
        let frete, uf;
        uf = j['uf'];
        if (uf === "PA") {
            frete = 10;
        } else if (uf === "AM" || uf === "MT" || uf === "TO" || uf === "MA" || uf === "AP" || uf === "RO") {
            frete = 30;
        } else frete = 50;
    
        window.location.href = "../../Controller/setCarrinho.php?produto_id="+id+"&id="+user+"&quantidade="+quantidade+"&frete="+frete;
    });
}