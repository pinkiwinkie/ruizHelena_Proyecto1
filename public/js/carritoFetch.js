document.getElementById('carritoLink').addEventListener('click', function(event) {
    event.preventDefault(); // Evita que el enlace redireccione

    fetch('http://localhost/ruizHelena_Proyecto1/controller/verCarrito.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error en la respuesta del servidor: ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);

            imprimirCarrito(data);
        })
        .catch(error => {
            console.error('Error al llamar al servicio del carrito:', error);
        });
});

function imprimirCarrito(data) {
    const cartContainer = document.getElementById('cart-container');
    const cartBottom = document.getElementById('cart-bottom');

    cartContainer.innerHTML = '';
    cartBottom.innerHTML = '';

    if (data.length === 0) {
        const mensajeVacio = document.createElement('p');
        mensajeVacio.textContent = 'No hay productos en el carrito.';
        cartContainer.appendChild(mensajeVacio);
    } else {
        const table = document.createElement('table');
        table.width = '100%';
        table.innerHTML = `
            <thead>
                <tr>
                    <td>Eliminar</td>
                    <td>Imagen</td>
                    <td>Producto</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        `;

        const tbody = table.querySelector('tbody');

        data.forEach(product => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><a href="#"><i class="bi bi-trash3-fill"></i></a></td>
                <td><img src="../img/${product['nombre']}.png" alt=""></td>
                <td>
                    <h5>${product['nombreProducto']}</h5>
                </td>
                <td>
                    <h5>${product['precio']}€</h5>
                </td>
                <td><input class="w-25 pl-1" value="${product['cantidad']}" min="1" type="number"></td>
                <td>
                    <h5>${(parseFloat(product['precio']) * parseInt(product['cantidad'])).toFixed(2)}€</h5>
                </td>
            `;
            tbody.appendChild(tr);
        });

        cartContainer.appendChild(table);

        const totalContainer = document.createElement('div');
        totalContainer.classList.add('total', 'col-lg-6', 'col-md-6', 'col-12', 'mb-4');
        totalContainer.innerHTML = `
            <div>
                <h5>Total del carrito</h5>
                <div class="d-flex justify-content-between">
                    <h6>Subtotal</h6>
                    <p>${calcularSubtotal(data)}€</p>
                </div>
                <div class="d-flex justify-content-between">
                    <h6>Envío</h6>
                    <p>0€</p>
                </div>
                <hr class="hr">
                <div class="d-flex justify-content-between">
                    <h6>Total</h6>
                    <p>${calcularSubtotal(data)}€</p>
                </div>
                <div class="container_buttons">
                    <button class="m-2 btn btn-card">Actualizar carrito</button>
                    <button class="m-2 btn btn-card">Pagar</button>
                </div>                            
            </div>
        `;

        cartBottom.appendChild(totalContainer);
    }
}

function calcularSubtotal(data) {
    return data.reduce((subtotal, product) => {
        return subtotal + parseFloat(product['precio']) * parseInt(product['cantidad']);
    }, 0).toFixed(2);
}