var formLogin = document.getElementById("formLogin");

formLogin.addEventListener("submit", function(e) {
    e.preventDefault();


    var dates = new FormData(formLogin)


    fetch('http://localhost/ruizHelena_Proyecto1/serviceCliente/clienteService.php', {
            method: 'POST',
            body: dates
        })
        .then(res => res.json())
        .then(data => {
            if (data === 'confirmado') {
                alert('Has iniciado sesión');
                window.location.href = 'tu_pagina_de_inicio.html';
            } else {
                alert('Inicio de sesión fallido');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});