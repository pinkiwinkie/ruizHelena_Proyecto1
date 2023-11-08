var formRegister = document.getElementById("formRegistro");

formRegister.addEventListener("submit", function(e) {
    e.preventDefault();
    // console.log("hiciste click");

    var dates = new FormData(formRegister);
    // console.log(dates);

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
                }
            });
    }
});