// Asumiendo que tienes una función que obtiene la información del usuario logueado
// Puedes ajustar esto según tu implementación real
const idUnico = obtenerIdUnico();

// Verificar si el usuario está logueado antes de realizar la llamada al servicio del carrito
if (idUnico) {
    fetch('http://localhost/ruizHelena_Proyecto1/serviceCart/cartService.php')
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
} else {
    mostrarMensajeVacio();
}

function mostrarMensajeVacio() {
    let cartContainer = document.getElementById('cart-container');
    cartContainer.innerHTML = '<p>No hay productos en tu carrito.</p>';
}

function eliminarProducto(idCarrito) {
    fetch(`http://localhost/ruizHelena_Proyecto1/serviceCart/cartService.php?idCarrito=${idCarrito}`, {
            method: 'DELETE',
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error en la respuesta del servidor: ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            if (data && data.message === "Eliminación exitosa") {
                return fetch('http://localhost/ruizHelena_Proyecto1/serviceCart/cartService.php');
            } else {
                throw new Error('Error al eliminar el producto: Respuesta inesperada del servidor');
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error en la respuesta del servidor al obtener datos actualizados del carrito: ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            imprimirCarrito(data);
            alert('Producto eliminado exitosamente.');
        })
        .catch(error => {
            console.error('Error al eliminar el producto:', error);
        });
}

function imprimirCarrito(data) {
    let cartContainer = document.getElementById('cart-container');
    let cartBottom = document.getElementById('cart-bottom');

    cartContainer.innerHTML = '';
    cartBottom.innerHTML = '';

    if (data.length === 0) {
        mostrarMensajeVacio();
    } else {
        let table = document.createElement('table');
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

        let tbody = table.querySelector('tbody');

        data.forEach(product => {
            let tr = document.createElement('tr');
            tr.innerHTML = `
                <td class="delete-btn"><a href="#"><i class="bi bi-trash3-fill"></i></a></td>
                <td><img src="${product['foto']}" alt=""></td>
                <td>
                    <h5>${product['nombre']}</h5>
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
            let deleteBtn = tr.querySelector('.delete-btn');
            deleteBtn.addEventListener('click', function() {
                // Llama a la función para eliminar
                eliminarProducto(product['idCarrito']);
            });
        });

        cartContainer.appendChild(table);

        let { subtotal, costoEnvio, total } = calcularSubtotal(data);

        let totalContainer = document.createElement('div');
        totalContainer.classList.add('total', 'col-lg-6', 'col-md-6', 'col-12', 'mb-4');
        totalContainer.innerHTML = `
            <div>
                <h5>Total del carrito</h5>
                <div class="d-flex justify-content-between">
                    <h6>Subtotal</h6>
                    <p>${subtotal}€</p>
                </div>
                <div class="d-flex justify-content-between">
                    <h6>Envío</h6>
                    <p>${costoEnvio}</p>
                </div>
                <hr class="hr">
                <div class="d-flex justify-content-between">
                    <h6>Total</h6>
                    <p>${total}€</p>
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
    let subtotal = data.reduce((subtotal, product) => {
        return subtotal + parseFloat(product['precio']) * parseInt(product['cantidad']);
    }, 0);

    let costoEnvio = 2.50;
    let total = subtotal + costoEnvio;

    return {
        subtotal: subtotal.toFixed(2),
        costoEnvio: costoEnvio.toFixed(2),
        total: total.toFixed(2)
    };
}