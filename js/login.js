document.getElementById('esqueci_senha').addEventListener('click', () => {
    setTimeout(() => {
        document.getElementById('form_esqueci_senha').style.top = "-360px";
        document.getElementById('form_login').style.left = "-450px";
        document.getElementById('logo_x').style.animation = 'moverERodar 1s ease-in-out forwards';
    }, 10);
});

document.getElementById('voltar_esqueci_senha').addEventListener('click', () => {
    setTimeout(() => {
        document.getElementById('form_esqueci_senha').style.top = "360px";
        document.getElementById('form_login').style.left = "0";
        document.getElementById('logo_x').style.animation = 'voltar 1s ease-in-out forwards';
    }, 10);
});


document.getElementById('criar_aluno').addEventListener('click', () => {
    setTimeout(() => {
        document.getElementById('form_login').style.display = "none"
        document.getElementById('form_cadastrar').style.display = "contents"
        document.getElementById('container').style.height = "650px";
        document.getElementById('container').style.width = "800px";
        document.getElementById('logo_x').style.animation = 'moverERodar_cadastro 0.5s ease-in-out forwards';
    }, 10);
});

document.getElementById('voltar_cadastrar').addEventListener('click', () => {
    document.getElementById('form_login').style.display = "flex"
    document.getElementById('form_cadastrar').style.display = "none"
    document.getElementById('container').style.height = "440px";
    document.getElementById('container').style.width = "400px";
    document.getElementById('logo_x').style.animation = 'voltar_cadastro 0.5s ease-in-out forwards';
})