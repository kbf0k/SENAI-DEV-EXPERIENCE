document.getElementById('esqueci_senha').addEventListener('click', () => {
    setTimeout(() => {
        document.getElementById('form_esqueci_senha').style.top = "-360px";
        document.getElementById('form_login').style.left = "-450px";
        document.getElementById('logo_x').style.animation = 'moverERodar 1s ease-in-out forwards';
    }, 10);
});

document.getElementById('voltar').addEventListener('click', () => {
    setTimeout(() => {
        document.getElementById('form_esqueci_senha').style.top = "360px";
        document.getElementById('form_login').style.left = "0";
        document.getElementById('logo_x').style.animation = 'voltar 1s ease-in-out forwards';
    }, 10);
});