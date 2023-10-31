var container_login_signup = document.querySelector(".container__login-signup");
var box_background_login = document.querySelector(".bg__box-login");
var box_background_signup = document.querySelector(".bg__box-signup");
var form_login = document.querySelector(".form__login");
var form_signup = document.querySelector(".form__signup");

function pageWidth() {
    if (window.innerHeight > 700) {
        box_background_login.style.display = "block";
        box_background_signup.style.display = "block";
    } else {
        box_background_signup.style.display = "block";
        box_background_signup.style.opacity = "1";
        box_background_login.style.display = "none";
        form_login.style.display = "block";
        form_signup.style.display = "none";
        container_login_signup.style.left = "0px";
    }
}

function signup() {
    if (window.innerWidth > 700) {
        form_signup.style.display = "block";
        container_login_signup.style.left = "310px"; //para mantener espaciado a la derecha con la otra caja.
        form_login.style.display = "none";
        box_background_signup.style.opacity = "0";
        box_background_login.style.opacity = "1";
    } else {
        form_signup.style.display = "block";
        container_login_signup.style.left = "0px";
        form_login.style.display = "none";
        box_background_signup.style.display = "none";
        box_background_login.style.display = "block";
        box_background_login.style.opacity = "1";
    }
}

function login() {
    if (window.innerWidth > 700) {
        form_signup.style.display = "none";
        container_login_signup.style.left = "10px";
        form_login.style.display = "block";
        box_background_signup.style.opacity = "1";
        box_background_login.style.opacity = "0";
    } else {
        form_signup.style.display = "none";
        container_login_signup.style.left = "0px";
        form_login.style.display = "block";
        box_background_signup.style.display = "block";
        box_background_login.style.display = "none";
    }
}

document.getElementById("btn__signup").addEventListener("click", signup);
document.getElementById("btn__login").addEventListener("click", login);
window.addEventListener("resize", pageWidth);