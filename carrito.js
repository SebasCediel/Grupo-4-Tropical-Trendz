let articulosCarrito = JSON.parse(localStorage.getItem('carrito')) || [];

function sincronizarStorage() {
    localStorage.setItem("carrito", JSON.stringify(articulosCarrito));
}

function insertarCarritoHTML() {
    const lista = document.querySelector("#lista-carrito");
    const totalPagar = document.getElementById("total-pagar");
    
    if (!lista) {
        console.error("No se encontró #lista-carrito en el DOM");
        return;
    }
    
    lista.innerHTML = articulosCarrito.length === 0 
        ? '<tr><td colspan="5" class="text-center">No hay productos en el carrito</td></tr>'
        : articulosCarrito.map(producto => `
            <tr>
                <td><img src="${producto.imagen}" width="50"></td>
                <td>${producto.titulo}</td>
                <td>$${producto.precio.toLocaleString()}</td>
                <td>${producto.cantidad}</td>
                <td><a href="#" class="borrar" data-id="${producto.id}">X</a></td>
            </tr>
        `).join('');
    
    if (totalPagar) {
        const total = articulosCarrito.reduce((acc, prod) => acc + (prod.precio * prod.cantidad), 0);
        totalPagar.textContent = `Total a pagar: $${total.toLocaleString()}`;
    }
}

window.agregarAlCarrito = function(id) {
    return new Promise((resolve, reject) => {
        const productoExistente = articulosCarrito.find(p => p.id === id);
        
        if (productoExistente) {
            productoExistente.cantidad++;
            sincronizarStorage();
            insertarCarritoHTML();
            resolve();
            return;
        }

        fetch('productos.json')
            .then(response => {
                if (!response.ok) throw new Error('Error al cargar productos');
                return response.json();
            })
            .then(productos => {
                const producto = productos.find(p => p.id === id);
                if (!producto) throw new Error('Producto no encontrado');
                
                articulosCarrito.push({
                    id: producto.id,
                    imagen: producto.imagen,
                    titulo: producto.nombre,
                    precio: producto.precio,
                    cantidad: 1
                });
                
                sincronizarStorage();
                insertarCarritoHTML();
                resolve();
            })
            .catch(error => {
                console.error('Error:', error);
                reject(error.message);
            });
    });
};

document.addEventListener("DOMContentLoaded", function() {
    function cargarEventListeners() {
        const botonesAgregar = document.querySelectorAll(".agregar-carrito");
        const listaCarrito = document.querySelector("#lista-carrito");
        const vaciarCarritoBtn = document.getElementById("vaciar-carrito");

        if (botonesAgregar.length > 0) {
            botonesAgregar.forEach(boton => {
                boton.addEventListener("click", function(e) {
                    e.preventDefault();
                    const producto = e.target.closest(".product");
                    if (producto) leerDatosElemento(producto);
                });
            });
        }

        if (listaCarrito) listaCarrito.addEventListener("click", eliminarElemento);
        if (vaciarCarritoBtn) vaciarCarritoBtn.addEventListener("click", vaciarCarrito);
        
        insertarCarritoHTML();
    }

    function leerDatosElemento(elemento) {
        const InfoElemento = {
            imagen: elemento.querySelector("img").src,
            titulo: elemento.querySelector("h3").textContent,
            precio: parseFloat(elemento.querySelector(".precio").textContent.replace("$", "").replace(".", "")),
            id: elemento.querySelector("a").getAttribute("data-id"),
            cantidad: 1
        };

        const existe = articulosCarrito.find(prod => prod.id === InfoElemento.id);
        if (existe) {
            existe.cantidad++;
        } else {
            articulosCarrito.push(InfoElemento);
        }

        sincronizarStorage();
        insertarCarritoHTML();
    }

    function eliminarElemento(e) {
        e.preventDefault();
        if (e.target.classList.contains("borrar")) {
            const elementoId = parseInt(e.target.getAttribute("data-id"));
            const producto = articulosCarrito.find(prod => prod.id === elementoId);
            
            if (producto && producto.cantidad > 1) {
                producto.cantidad--;
            } else {
                articulosCarrito = articulosCarrito.filter(prod => prod.id !== elementoId);
            }
            
            sincronizarStorage();
            insertarCarritoHTML();
        }
    }

    function vaciarCarrito() {
        articulosCarrito = [];
        sincronizarStorage();
        insertarCarritoHTML();
    }

    setTimeout(cargarEventListeners, 200);
    
    function setupPagarButton() {
        const pagarBtn = document.getElementById('pagar');
        if (pagarBtn) {
            pagarBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (articulosCarrito.length === 0) {
                    toastr.error('Agrega productos al carrito primero', 'Carrito vacío', {
                        timeOut: 3000,
                        positionClass: 'toast-top-right'
                    });
                    return;
                }
                window.location.href = 'pagar.html';
            });
        } else {
            setTimeout(setupPagarButton, 500);
        }
    }
    
    setTimeout(setupPagarButton, 1000);
});