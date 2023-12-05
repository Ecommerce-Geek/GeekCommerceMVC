var btn_carrinho = document.getElementById("carrinho");
var div_carrinho = document.getElementById("div-carrinho");
function load_carrinho() {
    let h = "", total = 0.0;
    meuCarrinho.map(i => {
        h += "<div class='area-carrinho'>";
        h += "<img class='imagens-carrinho' src='"+i['path_img']+"'>";
        h += "<span class='produto-quantidade'>"+i['id']+"</span>";
        h += "<div class='organizar-vertical'>";
        h += "<p class='produto-carrinho'><span class='nome-carrinho'>"+i['nome']+" </span>R$<span class='preco-carrinho'>"+i['custo_unitario']+"</span> x<span class='quantidade-carrinho'> "+i['quantidade']+"</span></p>";
        h += "<p class='area-frete'>Valor do frete: R$<span class='frete-carrinho'>"+ parseFloat(i['frete']).toFixed(2)+"</span></p>";
        h += "<div class='campo-icone' id='posicionamento-icone'>";
        h += "<img src='img/simbulos-dinamicos/cruz.png' alt='tirar do carrinho' onclick='deletProd("+i['id']+")'>";
        h += "</div>";
        h += "</div>";
        h += "</div>";
        total += (parseFloat(i['custo_unitario']) * parseFloat(i['quantidade']) + parseFloat(i['frete'])).toFixed(2);
    });
    h += "<div class='finalizar-compra'>";
    h += "<p class='total'>Total: R$<span class='total-span'>"+parseFloat(total).toFixed(2)+"</span></p><br>";
    h += "<button class='btn-finalizar'>Finalizar Compra</button>";
    h += "</div>";
    div_carrinho.innerHTML = h;
}

btn_carrinho.addEventListener('click', () => {
    load_carrinho();
});

function deletProd(id) {
    window.location.href = "../../Controller/deletProdutoInCarrinho.php?produtoId="+id+"&id="+user;
}