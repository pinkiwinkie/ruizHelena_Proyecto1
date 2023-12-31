var formLogin = document.getElementById("formLogin");
var formHidden = document.getElementById("formHidden");

formLogin.addEventListener("submit", function(e) {
    e.preventDefault();
    console.log("hiciste click");

    var dates = new FormData(formLogin)
    var dniCliente = dates.get('dniCliente');
    var pwd = dates.get('pwd');
    console.log(dniCliente);
    console.log(pwd);

    //llamada al servicio cliente , pasandole los datos de inicio de sesion
    fetch(`http://localhost/ruizHelena_Proyecto1/serviceCliente/clienteService.php?dniCliente=${dniCliente}&pwd=${pwd}`)
        .then(res => res.json())
        .then(data => {
            console.log(data);
            if (data.dniCliente != "" & data.nombre != "") {
                document.getElementById("formHidden-dni").value = dniCliente;
                document.getElementById("formHidden-name").value = data.nombre;
                formHidden.submit();
                alert('Has iniciado sesión');
            } else {
                alert('Inicio de sesión fallido');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});