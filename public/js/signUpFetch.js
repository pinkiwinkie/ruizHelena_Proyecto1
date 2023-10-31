var formRegister = document.getElementById('formRegistro');

formRegister.addEventListener('submit', function(e) {
    e.preventDefault();
    console.log("hiciste click");

    var dates = new FormData(formRegister);
    //  console.log(dates);

    fetch('../../serviceCliente/clienteService.php', {
            method: 'POST',
            body: dates
        })
        .then(res => res.json())
        .then(data => {
            console.log(data);
        })
})