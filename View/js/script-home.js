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

