

//Validando alteracao cep obs: ainda n testado - dependendo na confirmção do banco
const alterarCEP = document.querySelector("#cep-config")
const btnModificar = document.querySelector("#enviar")

enviarBtn.addEventListener("click", async (event) => {
    event.preventDefault()
    const cepValidado = cepInput.value.replace(/\D/g, '');

    
    if (!validCEP(cepValidado)) {
        alert("CEP invalido")
        return;
    }
    // Consulta o endereço e obtém a resposta
    const enderecoResponse = await consultaEndereco(cepValidado);

    // Se o CEP não for válido, interrompe a execução
    if (!enderecoResponse || enderecoResponse.erro) {
        alert("CEP inexistente")
        mensagemNaoEncontrado();
        return;
    }

    return btnModificar.submit();

});

async function consultaEndereco(cep) {
    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
    const data = await response.json();

    // Retorna a resposta da consulta do endereço
    return data;
}

function mensagemNaoEncontrado() {
    const avisoCEP = document.createElement("span");
    avisoCEP.setAttribute("id", "aviso-cep")
    avisoCEP.textContent = "CEP inexistente";
    const boxInputCep = document.querySelector(".box-input-cep")
    boxInputCep.appendChild(avisoCEP)

}

function validCEP(cep) {
    return /^\d{8}$/.test(cep);
}



window.addEventListener("beforeunload", () => {

    limparDados();
});


// logica das telas dinamicas
const btnSetinhaDireita = document.querySelector("#direita")
const btnSetinhaEsquerda = document.querySelector("#esquerda")

const bolinhaDefault = document.querySelector(".bolinha")


const bannerHollow = document.querySelector("#hollow")
const bannerSonic = document.querySelector("#sonic")
const bannerSuperSmash = document.querySelector("#supersmash")

const bolinhaBranca = document.getElementById("bolinha-branca")
const bolinhaPreta = document.getElementById("bolinha-preta")

const banners = [bannerHollow, bannerSonic, bannerSuperSmash]
const bolinhas = [bolinhaPreta, bolinhaBranca, bolinhaBranca]


const slidesImagem1 = document.querySelector("#slide-imagem1")
const slidesImagem2 = document.querySelector("#slide-imagem2")
const slidesImagem3 = document.querySelector("#slide-imagem3")

const slideBolinha1 = document.querySelector(".slide-bolinha1")
const slideBolinha2 = document.querySelector(".slide-bolinha2")
const slideBolinha3 = document.querySelector(".slide-bolinha3")

const produtosDinamicos = document.querySelector("#produtos-dinamicos")

function moveRight() {
    if (bolinhaPreta.parentNode === slideBolinha1) {
        slideBolinha1.removeChild(bolinhaPreta);
        slideBolinha2.appendChild(bolinhaPreta);
        bannerHollow.style.display = "none";
        bannerSonic.style.display = "block";
        bannerSuperSmash.style.display = "none";
    } else if (bolinhaPreta.parentNode === slideBolinha2) {
        slideBolinha2.removeChild(bolinhaPreta);
        slideBolinha3.appendChild(bolinhaPreta);
        bannerHollow.style.display = "none";
        bannerSonic.style.display = "none";
        bannerSuperSmash.style.display = "block";
    } else if (bolinhaPreta.parentNode === slideBolinha3) {
        slideBolinha3.removeChild(bolinhaPreta);
        slideBolinha1.appendChild(bolinhaPreta);
        bannerHollow.style.display = "block";
        bannerSonic.style.display = "none";
        bannerSuperSmash.style.display = "none";
    }
}

function moveLeft() {
    if (bolinhaPreta.parentNode === slideBolinha1) {
        slideBolinha1.removeChild(bolinhaPreta);
        slideBolinha3.appendChild(bolinhaPreta);
        bannerHollow.style.display = "none";
        bannerSonic.style.display = "none";
        bannerSuperSmash.style.display = "block";
    } else if (bolinhaPreta.parentNode === slideBolinha2) {
        slideBolinha2.removeChild(bolinhaPreta);
        slideBolinha1.appendChild(bolinhaPreta);
        bannerHollow.style.display = "block";
        bannerSonic.style.display = "none";
        bannerSuperSmash.style.display = "none";
    } else if (bolinhaPreta.parentNode === slideBolinha3) {
        slideBolinha3.removeChild(bolinhaPreta);
        slideBolinha2.appendChild(bolinhaPreta);
        bannerHollow.style.display = "none";
        bannerSonic.style.display = "block";
        bannerSuperSmash.style.display = "none";
    }
}

btnSetinhaDireita.addEventListener("click", (event) => {
    event.preventDefault()
    moveRight();
});

btnSetinhaEsquerda.addEventListener("click", (event) => {
    event.preventDefault()
    moveLeft();
});



//Area da Navegação

document.getElementById("finalizacao-compras").style.display = "none";

document.getElementById("carrinho").addEventListener("click", (event) => {
    document.getElementById("home").style.display = "none";
    document.getElementById("finalizacao-compras").style.display = "block";
    document.getElementById("configuracoes").style.display = "none"
    event.preventDefault();
});

document.getElementById("icon-home").addEventListener("click", (event) => {
    document.getElementById("home").style.display = "block";
    document.getElementById("finalizacao-compras").style.display = "none";
    document.getElementById("configuracoes").style.display = "none"
    event.preventDefault();
});

//Area da configuração
document.getElementById("configuracoes").style.display = "none"
document.getElementById("icon-config").addEventListener("click", (event) => {
    document.getElementById("home").style.display = "none"
    document.getElementById("finalizacao-compras").style.display = "none"
    document.getElementById("configuracoes").style.display = "block"
    event.preventDefault()
})



