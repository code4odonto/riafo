let inputUser = document.getElementById("username")
let inputEmail = document.getElementById("email")
let password = document.getElementById("password")
let logBtn = document.getElementById("logBtn");
let btnCont = document.getElementById("btnCont");


function log() {
    
    if ((inputUser.value !== '' && password.value !== '')) {
        logBtn.style.backgroundColor= "rgba(0, 0, 0, .4)";
        btnCont.style.opacity= "1";
        btnCont.style.left= "65px";
    } else {
        logBtn.style.backgroundColor= "transparent";
        btnCont.style.opacity= "0";
        btnCont.style.left= "-10px";
    }
}