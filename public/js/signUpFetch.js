var formRegister = document.getElementById("formRegistro");
var formHidden = document.getElementById("formHidden");

formRegister.addEventListener("submit", function(e) {
    e.preventDefault();
    console.log("hiciste click");

    var dates = new FormData(formRegister);
    var dniCliente = dates.get('dniCliente');
    var pwd = dates.get('pwd');
    console.log(dates);

    if (
        dates.get("dniCliente") == "" ||
        dates.get("nombre") == "" ||
        dates.get("direccion") == "" ||
        dates.get("email") == "" ||
        dates.get("pwd") == ""
    ) {
        alert("Introduce valores");
    } else {
        fetch("http://localhost/ruizHelena_Proyecto1/serviceCliente/clienteService.php", {
                method: "POST",
                body: dates,
            })
            .then((res) => res.json())
            .then((data) => {
                console.log(data);
                if (data == "noInsertado") {
                    alert("El usuario ya existe");
                } else {
                    alert("Usuario registrado correctamente");
                    document.getElementById("formHidden-dni").value = dniCliente;
                    document.getElementById("formHidden-name").value = dates.get('nombre');
                    formHidden.submit();
                    alert('Has iniciado sesión');
                }
            });
    }
});