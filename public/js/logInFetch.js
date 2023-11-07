var formLogin = document.getElementById("formLogin");

formLogin.addEventListener("submit", function(e) {
    e.preventDefault();
    console.log("hiciste click");

    var dates = new FormData(formLogin)
    var dniCliente = dates.get('dniCliente');
    var pwd = dates.get('pwd');
    console.log(dniCliente);
    console.log(pwd);


    fetch('http://localhost/ruizHelena_Proyecto1/serviceCliente/clienteService.php', {
            method: 'POST',
            body: dates
        })
        .then(res => res.json())
        .then(data => {
            if (data === 'confirmado') {
                alert('Has iniciado sesión');
            } else {
                alert('Inicio de sesión fallido');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});