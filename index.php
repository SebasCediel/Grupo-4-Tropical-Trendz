<?php
session_start()
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropical Trendz</title>

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <!--Link del css-->
    <link rel="stylesheet" href="style11.css">

    <!--link style modal(ver productos)-->
    <link rel="stylesheet" href="verproducto.css">
</head>

<body>

        <div class="style-banner">
            <video autoplay muted loop playsinline class="banner-video">
                <source src="Imagenes/video_baner.mp4" type="video/mp4">
            </video>
            
            <div class="banner-content">
                <h1 class="brand-name">TROPICAL TRENDZ</h1>
                <p class="collection-subtitle">COLECCIÓN VERANO 2025</p>
                <a href="#" class="cta-button">COMPRAR AHORA</a>
            </div>
        </div>

        <!--Seccion del carrusel-->

        <div class="carrusel">
        <h1>COLECCIÓN DE VERANO</h1>
        <img src="Imagenes/piscina.png" alt="" class="img-acuarela">
    </div>
     <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="product-card">
                    <img src="Imagenes/Verano/h1.png" alt="">
                    <h3>Banana Splash</h3>
                    <p>Short con estampado tropical de bananas, atrevido y cómodo</p>
                    <div class="card-buttons">
                        <a href="#" class="agregar-verano" data-id="103">Agregar al carrito</a>
                        <a href="#" class="ver-verano"data-img="Imagenes/Mujer/fm3.png"
                        data-title="Sky Breeze"
                        data-description="(descripcion mas detallada)"
                        data-price="70.000"
                        data-titlesizes="Tallas disponibles"
                        data-sizes="S, M">Ver producto</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="product-card">
                  <img src="Imagenes/Verano/h1.png" alt="">
                  <h3> Orange Sunset</h3>
                  <p>Short degradado en tonos cálidos, fresco y relajado</p>
                  <div class="card-buttons">
                    <a href="#" class="agregar-verano">Agregar al carrito</a>
                    <a href="#" class="ver-verano"data-img="Imagenes/Mujer/fm3.png"
                    data-title="Sky Breeze"
                    data-description="(descripcion mas detallada)"
                    data-price="70.000"
                    data-titlesizes="Tallas disponibles"
                    data-sizes="S, M">Ver producto</a>
                  </div>
                </div>
              </div>
          
              <div class="swiper-slide">
                <div class="product-card">
                  <img src="Imagenes/Verano/m1.png" alt="">
                  <h3>Sunshine Bloom</h3>
                  <p>Bikini amarillo tejido, radiante y favorecedor</p>
                  <div class="card-buttons">
                    <a href="#" class="agregar-verano">Agregar al carrito</a>
                    <a href="#" class="ver-verano"data-img="Imagenes/Mujer/fm3.png"
                    data-title="Sky Breeze"
                    data-description="(descripcion mas detallada)"
                    data-price="70.000"
                    data-titlesizes="Tallas disponibles"
                    data-sizes="S, M">Ver producto</a>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="product-card">
                  <img src="Imagenes/Verano/m2.png" alt="">
                  <h3>Tangerine Dream</h3>
                  <p>Bikini coral crochet, vibrante y coqueto</p>
                  <div class="card-buttons">
                    <a href="#" class="agregar-verano">Agregar al carrito</a>
                    <a href="#" class="ver-verano"data-img="Imagenes/Mujer/fm3.png"
                        data-title="Sky Breeze"
                        data-description="(descripcion mas detallada)"
                        data-price="70.000"
                        data-titlesizes="Tallas disponibles"
                        data-sizes="S, M">Ver producto</a>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="product-card">
                  <img src="Imagenes/Verano/m3.png" alt="">
                  <h3>Sol Tropical</h3>
                  <p>Bikini amarillo con corte moderno, radiante y cómodo para brillar en la playa.</p>
                  <div class="card-buttons">
                    <a href="#" class="agregar-verano">Agregar al carrito</a>
                    <a href="#" class="ver-verano"data-img="Imagenes/Mujer/fm3.png"
                        data-title="Sky Breeze"
                        data-description="(descripcion mas detallada)"
                        data-price="70.000"
                        data-titlesizes="Tallas disponibles"
                        data-sizes="S, M">Ver producto</a>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="product-card">
                  <img src="Imagenes/Verano/nña1.png" alt="">
                  <h3>Campo de Girasoles</h3>
                  <p>Conjunto floral para niña, alegre y con aire campestre que roba sonrisas.</p>
                  <div class="card-buttons">
                    <a href="#" class="agregar-verano">Agregar al carrito</a>
                    <a href="#" class="ver-verano"data-img="Imagenes/Mujer/fm3.png"
                        data-title="Sky Breeze"
                        data-description="(descripcion mas detallada)"
                        data-price="70.000"
                        data-titlesizes="Tallas disponibles"
                        data-sizes="S, M">Ver producto</a>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="product-card">
                  <img src="Imagenes/Verano/nña2.png" alt="">
                  <h3>Banana Boom</h3>
                  <p>Bikini retro con estampado divertido, ideal para un look fresco y original.</p>
                  <div class="card-buttons">
                    <a href="#" class="agregar-verano">Agregar al carrito</a>
                    <a href="#" class="ver-verano"data-img="Imagenes/Mujer/fm3.png"
                        data-title="Sky Breeze"
                        data-description="(descripcion mas detallada)"
                        data-price="70.000"
                        data-titlesizes="Tallas disponibles"
                        data-sizes="S, M">Ver producto</a>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="product-card">
                  <img src="Imagenes/Verano/nño1.png" alt="">
                  <h3>Cactus Safari</h3>
                  <p>Short amarillo con cactus, cómodo y con espíritu aventurero para los peques.</p>
                  <div class="card-buttons">
                    <a href="#" class="agregar-verano">Agregar al carrito</a>
                    <a href="#" class="ver-verano"data-img="Imagenes/Mujer/fm3.png"
                        data-title="Sky Breeze"
                        data-description="(descripcion mas detallada)"
                        data-price="70.000"
                        data-titlesizes="Tallas disponibles"
                        data-sizes="S, M">Ver producto</a>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="product-card">
                  <img src="Imagenes/Verano/nño2.png" alt="">
                  <h3>Sunset Vibes</h3>
                  <p>Conjunto veraniego con estampado de atardecer, perfecto para mini exploradores.</p>
                  <div class="card-buttons">
                    <a href="#" class="agregar-verano">Agregar al carrito</a>
                    <a href="#" class="ver-verano"data-img="Imagenes/Mujer/fm3.png"
                        data-title="Sky Breeze"
                        data-description="(descripcion mas detallada)"
                        data-price="70.000"
                        data-titlesizes="Tallas disponibles"
                        data-sizes="S, M">Ver producto</a>
                  </div>
                </div>
              </div>
        </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
      </div>
        
    
<!--Sección de productos-->
    <main class="products container" id="lista-1">
        <h2>Productos</h2>

        <div class="product-content">

            <div class="product">
                <img src="Imagenes/Mujer/fm1.png" alt="">
                <div class="product-txt">
                    <h3>Aloha Garden</h3>
                    <p>Traje de baño entero con escote en V - Resalta tu figura con elegancia</p><br>
                    <p class="precio">$60.000</p>
                    <a href="#" class="ver-producto" data-id="101">Ver producto</a>
                </div>
            </div>

            <div class="product">
                <img src="Imagenes/Mujer/fm2.png" alt="">
                <div class="product-txt">
                    <h3>Wild Waves</h3>
                    <p>Traje de baño deportivo de manga larga - Protección y estilo para tu aventura acuática</p>
                    <p class="precio">$70.000</p>
                    <a href="#" class="ver-producto" data-id="102">Ver producto</a>
                </div>

            </div>

            <div class="product">
                <img src="Imagenes/Mujer/fm3.png" alt="">
                <div class="product-txt">
                    <h3>Sky Breeze</h3>
                    <p>Bikini de talle alto con detalles trenzados - Frescura y estilo para días de sol</p>
                    <p class="precio">$70.000</p>
                    <a href="#" class="ver-producto" data-id="103">Ver producto</a>
                </div>

            </div>

            <div class="product">
                <img src="Imagenes/Hombre/fh1.png" alt="">
                <div class="product-txt">
                    <h3>Shadow Palms</h3>
                    <p>Short de baño con diseño degradado en tonos oscuros y estampado de palmeras.</p>
                    <p class="precio">$60.000</p>
                    <a href="#" class="ver-producto" data-id="104">Ver producto</a>
                </div>
            </div>
    
            <div class="product">
                <img src="Imagenes/Hombre/fh2.png" alt="">
                <div class="product-txt">
                    <h3>Tropical Vibes</h3>
                    <p>Bañador con estampado de palmeras en blanco y negro.</p><br>
                    <p class="precio">$70.000</p>
                    <a href="#" class="ver-producto" data-id="105">Ver producto</a>
                </div>
            </div>
    
            <div class="product">
                <img src="Imagenes/Hombre/fh3.jpg" alt="">
                <div class="product-txt">
                    <h3>Midnight Waves</h3>
                    <p>Short de baño con patrón floral en tonos oscuros</p><br>
                    <p class="precio">$70.000</p>
                    <a href="#" class="ver-producto" data-id="106">Ver producto</a>
                </div>
            </div>
    </main>

   <!-- Modal de producto -->
   <div id="product-modal" class="modal-fade">
    <div class="product-modal-content">
        <span id="close-product-modal" class="close-modal">&times;</span>
        <div class="modal-body">
            <img id="modal-product-img" src="" alt="Producto">
            <div class="modal-text">
                <h2 id="modal-product-title"></h2>
                <p id="modal-product-description"></p>
                <p id="modal-product-price" class="modal-price"></p>
                <p id="modal-product-titlesizes" class="modal-titlesizes"></p>
                <div id="modal-product-sizes" class="modal-sizes"></div>
                <div class="modal-actions">
                    <button id="modal-agregar-carrito" class="btn-agregar-modal">Agregar al carrito</button>
                </div>
            </div>
        </div>
    </div>
</div>
    


    <!--Seccion de íconos-->
    <section class="icons container">
        <div class="icon-1">
            <div class="icon-img">
                <img src="Imagenes/i1.svg" alt="">
            </div>
            <div class="icon-txt">
                <h3>Confort y estilo</h3>
                <p>
                    Prendas diseñadas para lucir bien y sentirse aún mejor
                </p>
            </div>
        </div>

        <div class="icon-1">
            <div class="icon-img">
                <img src="Imagenes/i2.svg" alt="">
            </div>
            <div class="icon-txt">
                <h3>Cuidado fácil</h3>
                <p>
                    Lavado sencillo sin perder la forma ni el color  
                </p>
            </div>
        </div>

        <div class="icon-1">
            <div class="icon-img">
                <img src="Imagenes/i3.svg" alt="">
            </div>
            <div class="icon-txt">
                <h3>Resistencia y flexibilidad</h3>
                <p>
                    Telas que se adaptan al cuerpo, brindando lubertad de movimiento y mayor durabilidad
                </p>
            </div>
        </div>
    </section>

   

    <!--Sección de reseñas-->
    <section class="container my-5">
        <h2 class="opinion-title text-center mb-4">Reseñas de Nuestros Clientes</h2>
    

        <!-- Sección donde aparecerán las reseñas -->
        <div class="row" id="listaReseñas">
            <!-- Aquí se añadirán dinámicamente las reseñas -->
        </div>
    
        <!-- Formulario para dejar una reseña -->
        <div class="mt-5">
            <h3 class="opinion-title text-center mb-3">Déjanos tu opinión</h3>
            <form id="formReseña">
                <div class="mb-3">
                <div class="mb-3">
                    <label for="calificacion" class="form-label">Calificación</label>
                    <select class="form-select" id="calificacion" required>
                        <option value="5">★★★★★ - Excelente</option>
                        <option value="4">★★★★☆ - Muy bueno</option>
                        <option value="3">★★★☆☆ - Bueno</option>
                        <option value="2">★★☆☆☆ - Regular</option>
                        <option value="1">★☆☆☆☆ - Malo</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="comentario" class="form-label">Tu Opinión</label>
                    <textarea class="form-control" id="comentario" rows="3" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-reseña">Enviar Reseña</button>
                </div>
            </form>
        </div>
    </section>


    <div class="mt-5">
        <h3 class="opinion-title text-center mb-3" >Opiniones de los clientes</h3>
        <div class="row" id="listaReseñas">
        </div>
    </div>
</section>
<div class="container">
<div class="row" id="listaReseñas ">
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow ">
            <div class="card-body ">
                <h5 class="card-title">Juanix</h5>
                <p class="stars mb-1">★★★★★</p>
                <p class="card-text">¡Me encantó el producto! La calidad es excelente y llegó muy rápido. Definitivamente volveré a comprar.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow ">
            <div class="card-body ">
                <h5 class="card-title">Sebastian Cediel</h5>
                <p class="stars mb-1">★★★★☆</p>
                <p class="card-text">Muy buen servicio y los materiales son de alta calidad. Los mejores, re top, bofffff, durisimoooo</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 md-3">
        <div class="card border-0 shadow">
            <div class="card-body">
                <h5 class="card-title">Luis</h5>
                <p class="stars mb-1">★★★★★</p>
                <p class="card-text">Increíble atención al cliente, me ayudaron con todas mis dudas antes de hacer la compra. ¡100% recomendado!</p>
            </div>
        </div>
    </div>
</div>
</div>
    
<footer class="foot text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="text-foot">Comprar</h5>
                    <ul class="list-unstyled">
                        <li><a href="mujer.html" class="text-light text-decoration-none">Mujer</a></li>
                        <li><a href="hombre.html" class="text-light text-decoration-none">Hombre</a></li>
                        <li><a href="niños.html" class="text-light text-decoration-none">Niños</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-foot">Informacion</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">FAQ</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Envios y devoluciones</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Politica de tienda</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Metodos de pago</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-foot">Explorar</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Acerca de</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Contacto</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Distribuidores</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-foot">Servicio al cliente</h5>
                    <p>Teléfono: +57 312 575 2981</p>
                    <p>Email: <a href="tropitrendz@gmail.com" class="text-light">tropitrendz@gmail.com</a></p>
                    <div>
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    

            

    <!--Formulario de inicio de sesión-->
 <div class="modal-fade" id="login-modal">
        <div class="formulario">
            <div class="form-container">
                
                <div class="form.image"> 
                    <img src="Imagenes/fondo-login.png" alt="">
                </div>
                
                <div class="form-content">
                     <h1>Inicio de sesión</h1>
                     <p class="form-subtitle">Accede a tu cuenta y vive el verano todo el año</p>
                     <form id="login-form" action="login.php" method="post">
                <div class="username">
                    <input type="email" name="email" required>
                    <label>Correo</label>
                </div>
                <div class="username">
                    <input type="password" name="password" required>
                    <label>Contraseña</label>
                </div>
                <div class="recordar">
                    <a href="#">¿Mala memoria?</a>
                </div>
                <button type="submit" class="btn-ingresar">Ingresar</button>
                <div class="registrarse">
                    <a href="javascript:void(0);" id="btn-registrar" type="button">¿No tienes cuenta? Regístrate</a>
                </div>

                  <!-- Botón de Google -->
                  <div class="google-login">
                    <img src="Imagenes/google.svg" alt="Google">
                </div>
                <button class="close-modal" id="close-login">&times;</button>
            </form>
            
             </div>
         </div>
     </div>
 </div>

     <!--Formulario de registro-->
<div class="modal-fade" id="register-modal">
    <div class="formulario">
        <div class="form-container">
           
            <div class="form-content">
                <h2>Registro</h2>
                <form id="register-form" action="registro.php" method="post">
                    <div class="username">
                        <input type="text" name="nombre" required>
                        <label>Nombre</label>
                    </div>
                    <div class="username">
                        <input type="tel" name="telefono" required>
                        <label>Teléfono</label>
                    </div>
                    <div class="username">
                        <input type="email" name="email" required>
                        <label>Correo electrónico</label>
                    </div>
                    <div class="username">
                        <input type="password" name="password" required>
                        <label>Contraseña</label>
                    </div>

                        <button type="submit" class="btn-registrarse">Registrarse</button>

                    <div class="Iniciar">
                     <a href="javascript:void(0);" id="btn-iniciar" type="button">¿Ya tienes cuenta? Inicia sesión</a>
                    </div>

                    <!-- Botón de Google -->
                    <div class="google-login">
                        <img src="Imagenes/google.svg" alt="Google">
                    </div>

                    <button class="close-modal" id="close-register">&times;</button>
                </form>
            </div>
                 <div class="form.image"> 
                    <img src="Imagenes/Fondo-login2.png" alt="">
                </div>   
        </div>
    </div>
</div>


<!-- jQuery (debe ir primero) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Archivos personalizados -->
<script src="navbar.js"></script>
<script src="carrito.js"></script>
<script src="script.js"></script>
<script src="verproducto.js"></script>

</body>
</html>

 