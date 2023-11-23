const enviarBtn = document.querySelector("#enviar");
const cpfInput = document.querySelector("#cpf");
const nomeInput = document.querySelector("#nome");
const sobrenomeInput = document.querySelector("#sobrenome");
const emailInput = document.querySelector("#email");
const telefoneInput = document.querySelector("#telefone");
const cepInput = document.querySelector("#cep");
const senhaInput = document.querySelector("#senha");


enviarBtn.addEventListener("click", async (event) => {
    // event.preventDefault();

    const cpfValidado = cpfInput.value.replace(/\D/g, '');
    const cepValidado = cepInput.value.replace(/\D/g, '');


    if (!validCPF(cpfValidado)) {
        alert("CPF inválido");
        return;
    }


    if (!validCEP(cepValidado)) {
        alert("CEP invalido")
        return;
    }
    // Consulta o endereço e obtém a resposta
    const enderecoResponse = await consultaEndereco(cepValidado);

    // Se o CEP não for válido, interrompe a execução
    if (!enderecoResponse || enderecoResponse.erro) {
        mensagemNaoEncontrado();
        alert("CEP inexistente")
        event.preventDefault();
        return;
    }

    const formularioData = {
        cpf: cpfValidado,
        nome: nomeInput.value,
        sobrenome: sobrenomeInput.value,
        email: emailInput.value,
        telefone: telefoneInput.value,
        cep: enderecoResponse,
        senha: senhaInput.value
    };

    const formularioJSON = JSON.stringify(formularioData);

    console.log(formularioJSON);

});

cpfInput.addEventListener("input", () => {
    let value = cpfInput.value.replace(/\D/g, '');

    if (value.length > 3 && value.length <= 6) {
        value = value.replace(/(\d{3})(\d{1,3})/, '$1.$2');
    } else if (value.length > 6 && value.length <= 9) {
        value = value.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
    } else if (value.length > 9 && value.length <= 11) {
        value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    } else if (value.length > 11) {
        value = value.substring(0, 11);
    }
    cpfInput.value = value;
});

function validCPF(cpf) {
    return /^\d{11}$/.test(cpf);
}


cepInput.addEventListener("input", () => {
    let cep = cepInput.value.replace(/\D/g, '');

    if (cep.length >= 5 && cep.length <= 8) {
        cep = cep.replace(/^(\d{5})(\d{0,3})/, "$1-$2");
    } else if (cep.length > 8) {
        cep = cep.substring(0, 8);
    }

    cepInput.value = cep;

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

function limparDados() {
    nomeInput.value = "";
    sobrenomeInput.value = "";
    emailInput.value = "";
    telefoneInput.value = "";
    cepInput.value = "";
    senhaInput.value = "";
}