
const painelPreco = document.querySelector(".preco-produto");
const btnComprar = document.querySelector(".comprar");

document.addEventListener("DOMContentLoaded", function () {
    const btnIncrementar = document.querySelector(".logo-mais");
    const btnDecrementar = document.querySelector(".logo-menos");
    const painelQuantidade = document.querySelector(".painel-quantidade");

    // Adicione o preço por unidade do produto
    const precoPorUnidade = 189.99;

    let quantidade = 1; // Inicializa a quantidade

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
});






