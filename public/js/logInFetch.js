var formLogin = document.getElementById("formLogin");

formLogin.addEventListener("submit", function(e) {
    e.preventDefault();
    console.log("hiciste click");

    var dates = new FormData(formLogin)
    console.log(dates.dniCliente);
    console.log(dates.pwd);


    fetch('http://localhost/ruizHelena_Proyecto1/serviceCliente/clienteService.php')
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