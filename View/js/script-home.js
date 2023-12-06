

//Validando alteracao cep obs: ainda n testado - dependendo na confirmção do banco
const alterarCEP = document.querySelector("#cep-config")
const btnModificar = document.querySelector("#enviar")
/*
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
*/
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
document.getElementById("carrinho").addEventListener("click", () => document.location.href = "home.php?id="+user+"&tela=carrinho");
document.getElementById("icon-home").addEventListener("click", () => document.location.href = "home.php?id="+user+"&tela=home");
document.getElementById("icon-config").addEventListener("click", () => document.location.href = "home.php?id="+user+"&tela=conf")
document.getElementById("deslogar").addEventListener('click', () => window.location.href = "home.php?tela=home");

// renderiza tela home
function chooseTodos() {
    let div = document.getElementById("produtos-id");
    let h = "";
    Object.keys(produtos).map(function(k) {
        h += "<div class='produto'>";
        h += "<img src='" + produtos[k]['path_img'] + "' alt='" + produtos[k]['nome'] + "'>";
        h += "<hr class='linha'>";
        h += "<p class='legenda'>" + produtos[k]['nome'] + "</p>";
        h += "<p class='preco'>R$" + produtos[k]['custo_unitario'].split('.')[0] + "<span>" + (produtos[k]['custo_unitario'].split('.')[1] === undefined ? '00' : produtos[k]['custo_unitario'].split('.')[1]) + "</span></p>";
        h += "<button onclick='btn_click("+k+")'>Comprar</button></div>";
    });
    div.innerHTML = h;
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
                    h += "<button onclick='btn_click("+k+")'>Comprar</button></div>";
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
                h += "<button onclick='btn_click("+k+")'>Comprar</button></div>";
            }
        });
        document.getElementById('form-pesquisar').value = "";
        div.innerHTML = h !== "" ? h : "<h2>A pesquisa '" + s + "' não foi encontrado!</h2>";
    }
}