// CONFIGURACIÓN GLOBAL
console.log("Inicializando script.js");

// Configuración Toastr
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2500",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

// FUNCIÓN PRINCIPAL CUANDO EL DOM ESTÁ LISTO
document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM completamente cargado");
    
    // 1. Inicializar modales de login/registro
    initModales();
    
    // 2. Inicializar filtro de precios
    initPriceFilter();
    
    // 3. Inicializar carrusel
    initSwiper();
    
    // 4. Inicializar sistema de reseñas
    initReseñas();
});

/**********************************************
 * FUNCIONES DE INICIALIZACIÓN
 **********************************************/

function initModales() {
    console.log("Inicializando modales...");
    const loginModal = document.getElementById("login-modal");
    const registerModal = document.getElementById("register-modal");
    const closeLogin = document.getElementById("close-login");
    const closeRegister = document.getElementById("close-register");
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const registerButton = document.getElementById("btn-registrar");
    const loginButton = document.getElementById("btn-iniciar");

    // Asegurar que los modales existen antes de manipularlos
    if (loginModal) loginModal.style.display = "none";
    if (registerModal) registerModal.style.display = "none";

    // Mostrar modal solo si no se ha visto antes
    if (loginModal && !localStorage.getItem("loginVisto")) {
        setTimeout(() => {
            loginModal.style.display = "flex";
            localStorage.setItem("loginVisto", "true");
        }, 4000);
    }

    // Eventos para abrir y cerrar modales
    if (loginButton) {
        loginButton.addEventListener("click", function(e) {
            e.preventDefault();
            if (loginModal) loginModal.style.display = "flex";
            if (registerModal) registerModal.style.display = "none";
        });
    }

    if (closeLogin) {
        closeLogin.addEventListener("click", function() {
            if (loginModal) loginModal.style.display = "none";
            localStorage.setItem("loginVisto", "true");
        });
    }

    if (registerButton) {
        registerButton.addEventListener("click", function(e) {
            e.preventDefault();
            if (loginModal) loginModal.style.display = "none";
            if (registerModal) registerModal.style.display = "flex";
        });
    }

    if (closeRegister) {
        closeRegister.addEventListener("click", function() {
            if (registerModal) registerModal.style.display = "none";
        });
    }

    // Validar y enviar login
    if (loginForm) {
        loginForm.addEventListener("submit", function(e) {
            e.preventDefault();
            const email = loginForm.querySelector("[name='email']").value.trim();
            const password = loginForm.querySelector("[name='password']").value.trim();

            if (!email || !password) {
                toastr.error("Todos los campos son obligatorios.");
                return;
            }

            const formData = new FormData(loginForm);

            fetch("login.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    toastr.success(data.message);
                    if (loginModal) loginModal.style.display = "none";
                    setTimeout(() => window.location.reload(), 2500);
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(error => {
                toastr.error("Hubo un problema con la solicitud.");
                console.error("Error:", error);
            });
        });
    }

    // Validar y enviar registro
    if (registerForm) {
        registerForm.addEventListener("submit", async function(e) {
            e.preventDefault();
            
            const submitBtn = registerForm.querySelector("[type='submit']");
            submitBtn.disabled = true;
            
            try {
                const formData = new FormData(registerForm);
                const nombre = formData.get('nombre').trim();
                const telefono = formData.get('telefono').trim();
                const email = formData.get('email').trim();
                const password = formData.get('password').trim();
                
                if (!nombre || !telefono || !email || !password) {
                    throw new Error("Todos los campos son obligatorios");
                }

                const response = await fetch("registro.php", {
                    method: "POST",
                    body: formData
                });

                const text = await response.text();
                let data;
                try {
                    data = JSON.parse(text);
                } catch {
                    throw new Error("Respuesta no válida del servidor");
                }

                if (data.status === "success") {
                    toastr.success(data.message, "", {
                        timeOut: 2500,
                        onHidden: function() {
                            window.location.href = "index.php";
                        }
                    });
                } else {
                    throw new Error(data.message || "Error en el registro");
                }
            } catch (error) {
                toastr.error(error.message);
                console.error("Error en registro:", error);
            } finally {
                submitBtn.disabled = false;
            }
        });
    }
}

function initPriceFilter() {
    console.log("Inicializando filtro de precios...");
    const priceSlider = document.getElementById("priceRange");
    const priceDisplay = document.getElementById("priceValue");
    
    if (!priceSlider || !priceDisplay) {
        console.error("Elementos del filtro no encontrados!");
        return;
    }

    const updateFilter = () => {
        const maxPrice = parseInt(priceSlider.value);
        console.log(`Filtrando por precio máximo: ${maxPrice} COP`);
        
        // Formatear el precio mostrado
        priceDisplay.textContent = new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            maximumFractionDigits: 0
        }).format(maxPrice);
        
        // Filtrar productos
        document.querySelectorAll(".product").forEach(product => {
            const priceElement = product.querySelector(".precio");
            if (!priceElement) {
                console.warn("Producto sin elemento .precio encontrado");
                return;
            }
            
            const priceText = priceElement.textContent.trim();
            const productPrice = parseInt(priceText.replace(/[^0-9]/g, '')) || 0;
            
            console.log(`Producto: ${product.querySelector("h3")?.textContent} | Precio: ${productPrice}`);
            
            product.style.display = productPrice <= maxPrice ? "block" : "none";
        });
    };

    // Configurar eventos
    priceSlider.addEventListener("input", updateFilter);
    priceSlider.addEventListener("change", updateFilter);
    
    // Ejecutar al cargar
    updateFilter();
}

function initSwiper() {
    console.log("Inicializando Swiper...");
    if (typeof Swiper !== 'undefined') {
        new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            centeredSlides: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    } else {
        console.error("Swiper no está cargado correctamente");
    }
}

function initReseñas() {
    console.log("Inicializando sistema de reseñas...");
    const formReseña = document.getElementById("formReseña");
    if (formReseña) {
        formReseña.addEventListener("submit", function(event) {
            event.preventDefault();
            let nombre = document.getElementById("nombre").value;
            let calificacion = document.getElementById("calificacion").value;
            let comentario = document.getElementById("comentario").value;

            let estrellas = "★".repeat(calificacion) + "☆".repeat(5 - calificacion);

            let nuevaReseña = document.createElement("div");
            nuevaReseña.classList.add("col-md-4");
            nuevaReseña.innerHTML = `
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">${nombre}</h5>
                        <p class="text-warning mb-1">${estrellas}</p>
                        <p class="card-text">${comentario}</p>
                    </div>
                </div>
            `;

            document.getElementById("listaReseñas").appendChild(nuevaReseña);
            document.getElementById("formReseña").reset();
        });
    }
}