/* Mostra a sidebar */

btnMenu = document.getElementById("btn_menu");
nav = document.getElementById("nav");

btnMenu.addEventListener("click", ()=>{
    nav.classList.toggle('move_nav');
});

/* Fecha a sidebar */

btnClose = document.getElementById("btn_close");
link = document.getElementById("nav__li");

btnClose.addEventListener("click", ()=>{
    nav.classList.toggle('move_nav');
});

link.addEventListener("click", ()=>{
    nav.classList.remove('move_nav');
});

/* Fecha sidebar automático conforme a tela aumenta */

window.addEventListener("resize", function(){
    if (window.innerWidth > 760)  {
        nav.classList.remove('move_nav');
    }
});

/* Função que esconde a mensagem ao clicar no x */
function fecharMensagem(e) {
    var mensagem = e.closest('.msg-container');
    mensagem.classList.add('hidden');
}