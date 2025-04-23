document.addEventListener("DOMContentLoaded", async function() {
    const modal = document.getElementById("product-modal");
    modal.style.display = "none";
    const modalImg = document.getElementById("modal-product-img");
    const modalTitle = document.getElementById("modal-product-title");
    const modalDescription = document.getElementById("modal-product-description");
    const modalPrice = document.getElementById("modal-product-price");
    const modalTitleSize = document.getElementById("modal-product-titlesizes");
    const modalSizes = document.getElementById("modal-product-sizes");
    const agregarCarritoBtn = document.getElementById("modal-agregar-carrito");
    const closeModal = document.getElementById("close-product-modal");

    let productoActual = null;
    let productos = [];

    try {
        const response = await fetch('productos.json');
        if (!response.ok) throw new Error('Error al cargar productos');
        productos = await response.json();
    } catch (error) {
        console.error("Error cargando productos:", error);
        toastr.error("No se pudieron cargar los productos");
    }

    document.querySelectorAll(".ver-producto").forEach(button => {
        button.addEventListener("click", function(e) {
            e.preventDefault();
            const productId = parseInt(this.getAttribute("data-id"));
            productoActual = productos.find(p => p.id === productId);

            if (productoActual) {
                modalImg.src = productoActual.imagen;
                modalTitle.textContent = productoActual.nombre;
                modalDescription.textContent = productoActual.descripcion;
                modalPrice.textContent = `$${productoActual.precio.toLocaleString()}`;
                modalTitleSize.textContent = "Tallas disponibles";
                modalSizes.innerHTML = productoActual.tallas.map(t => `<button class="size-btn" data-talla="${t}">${t}</button>`).join('');
                modal.style.display = "flex";
            } else {
                toastr.error("Producto no encontrado");
            }
        });
    });

    agregarCarritoBtn.addEventListener("click", async function() {
        if (productoActual) {
            try {
                await window.agregarAlCarrito(productoActual.id);
                toastr.success("¡Producto añadido al carrito!");
                modal.style.display = "none";
                
                const event = new Event('carritoActualizado');
                document.dispatchEvent(event);
            } catch (error) {
                console.error('Error al agregar:', error);
                toastr.error(error || "Error al agregar al carrito");
            }
        }
    });

    if (closeModal) {
        closeModal.addEventListener("click", () => {
            modal.style.display = "none";
        });
    }

    window.addEventListener("click", (e) => {
        if (e.target === modal) modal.style.display = "none";
    });
});