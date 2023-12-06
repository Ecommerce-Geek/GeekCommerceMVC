var frete = '???', verif;
function load_frete() {
    fetch("https://viacep.com.br/ws/"+cep+"/json/").then(r => r.json()).then(j => {
        let uf;
        uf = j['uf'];
        if (uf === "PA") {
            frete = 10;
        } else if (uf === "AM" || uf === "MT" || uf === "TO" || uf === "MA" || uf === "AP" || uf === "RO") {
            frete = 30;
        } else frete = 50;
    });
}
function verifica_frete_load() {
    if (frete === '???') {verif = window.requestAnimationFrame(verifica_frete_load)}
    else window.cancelAnimationFrame(verif);
}
if (user !== undefined) {
    load_frete();
    verifica_frete_load();
}