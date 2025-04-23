fetch("navbar.php")  
    .then(response => response.text())
    .then(data => {
        document.body.insertAdjacentHTML("afterbegin", data);

        setTimeout(() => {
            const loginButton = document.getElementById("iniciar");
            const registerButton = document.getElementById("registrar");
            const loginModal = document.getElementById("login-modal");
            const registerModal = document.getElementById("register-modal");
            const closeLogin = document.getElementById("close-login");
            const closeRegister = document.getElementById("close-register");
            const logoutButton = document.querySelector('[href="logout.php"]');

            // Verificar si hay sesión activa
            const isLoggedIn = document.querySelector('.user-section span');

            // Solo asignar eventos si no está logueado
            if (!isLoggedIn) {
                if (loginButton) {
                    loginButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        if (loginModal) loginModal.style.display = "flex";
                        if (registerModal) registerModal.style.display ="none";
                    });
                }

                if (registerButton) {
                    registerButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        if (registerModal) registerModal.style.display = "flex";
                        if (loginModal) loginModal.style.display = "none";
                    });
                }
            }

            // Eventos para cerrar modales
            if (closeLogin) {
                closeLogin.addEventListener("click", function() {
                    if (loginModal) loginModal.style.display = "none";
                });
            }

            if (closeRegister) {
                closeRegister.addEventListener("click", function() {
                    if (registerModal) registerModal.style.display = "none";
                });
            }

            // Manejar logout
            if (logoutButton) {
                logoutButton.addEventListener("click", function(e) {
                    e.preventDefault();
                    fetch("logout.php")
                        .then(() => window.location.reload());
                });
            }
        }, 100);
    })
    .catch(error => console.error("Error cargando el navbar:", error));
    