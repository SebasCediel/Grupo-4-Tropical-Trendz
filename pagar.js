document.addEventListener("DOMContentLoaded", function() {
    // Usar la misma estructura de datos que en carrito.js
    const articulosCarrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const productosContainer = document.getElementById('productos-compra');
    const resumenTotal = document.getElementById('resumen-total');
    
    function mostrarProductos() {
        productosContainer.innerHTML = '';
        
        if (articulosCarrito.length === 0) {
            productosContainer.innerHTML = '<tr><td colspan="5" class="text-center">No hay productos en el carrito</td></tr>';
            return;
        }
        
        articulosCarrito.forEach(producto => {
            const subtotal = producto.precio * producto.cantidad;
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><img src="${producto.imagen}" width="50"></td>
                <td>${producto.titulo}</td>
                <td>$${producto.precio.toLocaleString()}</td>
                <td>${producto.cantidad}</td>
                <td>$${subtotal.toLocaleString()}</td>
            `;
            productosContainer.appendChild(row);
        });
        
        const total = articulosCarrito.reduce((sum, producto) => sum + (producto.precio * producto.cantidad), 0);
        resumenTotal.innerHTML = `
            <h5>Total: $${total.toLocaleString()}</h5>
        `;
    }
    
    document.getElementById('form-pago').addEventListener('submit', function(e) {
        e.preventDefault();
        const direccion = document.getElementById('direccion').value;
        
        // Aquí deberías agregar la lógica para procesar el pago
        
        // Limpiar carrito
        localStorage.removeItem('carrito');
        // Redirigir a página de confirmación
        window.location.href = 'confirmacion.html';
    });

    const cancelarBtn = document.getElementById('cancelar-compra');
    if (cancelarBtn) {
        cancelarBtn.addEventListener('click', function(e) {
            e.preventDefault();
            toastr.info('Compra cancelada', 'Los productos se mantuvieron en tu carrito', {
                timeOut: 2000,
                positionClass: 'toast-top-center'
            });
            
            setTimeout(() => {
                window.location.href = "index.php";
            }, 2000);
        });
    }
    
    mostrarProductos();
});