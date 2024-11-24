<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rifas Delicias - Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent">
            <div class="container">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Rifas Delicias" style="height: 50px; margin-right: 10px;">
                    <span class="font-weight-bold">Rifas Delicias</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="#Inicio" class="nav-link d-flex align-items-center">
                                <i class="fas fa-home mr-2"></i>Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#about-us" class="nav-link d-flex align-items-center">
                                <i class="fas fa-info-circle mr-2"></i>Cómo Participar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/payment_methods" class="nav-link d-flex align-items-center">
                                <i class="fas fa-credit-card mr-2"> </i>Metodos de pago
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/tickets" class="nav-link d-flex align-items-center">
                                <i class="fas fa-ticket-alt mr-2"></i>Boletos
                            </a>
                        </li>
    
                    </ul>
                    
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Hero Section -->
    <section id="Inicio" class="parallax"
        style="background-image: url('{{ $rifaActiva && $rifaActiva->imagenes->where('pivot.tipo', 'header')->first() ? asset('storage/' . $rifaActiva->imagenes->where('pivot.tipo', 'header')->first()->ruta) : 'https://via.placeholder.com/1200x600' }}');">
        <div>
            <h1>{{ $rifaActiva ? $rifaActiva->nombre : 'Bienvenido a Rifas Delicias' }}</h1>
            <p>¡Participa y gana premios increíbles! Cada boleto es una oportunidad.</p>
            <a href="tickets" class="btn btn-custom">Comprar Boletos</a>

        </div>
    </section>

    <!-- Información sobre el funcionamiento -->
    <section id="about-us" class="how-it-works">
        <div class="container text-center">
            <h2 class="mb-5">¿Cómo Funciona?</h2>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <!-- Paso 1 -->
                <div class="how-step text-center mx-md-4">
                    <i class="fas fa-user-plus" style="font-size: 4rem; color: #007bff;"></i>
                    <h5 class="mt-3">Regístrate</h5>
                    <p>Crea tu cuenta para comenzar a participar en nuestras rifas. Es sencillo y rápido.</p>
                </div>
                <!-- Flecha -->
                <i class="fas fa-arrow-right d-none d-md-inline-block" style="font-size: 2rem; color: #6c757d;"></i>
                <!-- Paso 2 -->
                <div class="how-step text-center mx-md-4">
                    <i class="fas fa-ticket-alt" style="font-size: 4rem; color: #ff9800;"></i>
                    <h5 class="mt-3">Compra Boletos</h5>
                    <p>Selecciona tus números preferidos y realiza la compra desde la plataforma.</p>
                </div>
                <!-- Flecha -->
                <i class="fas fa-arrow-right d-none d-md-inline-block" style="font-size: 2rem; color: #6c757d;"></i>
                <!-- Paso 3 -->
                <div class="how-step text-center mx-md-4">
                    <i class="fas fa-trophy" style="font-size: 4rem; color: #28a745;"></i>
                    <h5 class="mt-3">Gana Premios</h5>
                    <p>Participa en el sorteo y cruza los dedos. ¡Tu premio podría ser el próximo!</p>
                </div>
            </div>
        </div>
    </section>
    
 <!-- Información sobre el funcionamiento -->
 <section  class="info-section">
    <div class="container">
        <h2 class="text-center mb-4">Conoce más sobre Rifas Delicias</h2>
        <div class="row">
            <!-- Cards -->
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <i class="fas fa-lock" style="font-size: 2rem; color: #007bff;"></i>
                    <h5>Rifas Seguras</h5>
                    <p>Participa con confianza en nuestras rifas. ¡Todo es justo y transparente!</p>
                    <i class="fas fa-chevron-down"></i>
                    <div class="card-details">
                        <p>Todas las rifas son gestionadas con total transparencia y basadas en sorteos oficiales. Puedes consultar los resultados y procesos en nuestras plataformas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <i class="fas fa-trophy" style="font-size: 2rem; color: #ff9800;"></i>
                    <h5>Premios Increíbles</h5>
                    <p>Gana desde productos electrónicos hasta grandes sorpresas.</p>
                    <i class="fas fa-chevron-down"></i>
                    <div class="card-details">
                        <p>Desde dispositivos electrónicos hasta experiencias inolvidables, nuestros premios están diseñados para brindarte emociones únicas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <i class="fas fa-headset" style="font-size: 2rem; color: #28a745;"></i>
                    <h5>Soporte al Cliente</h5>
                    <p>¿Tienes dudas? Estamos para ayudarte en todo momento.</p>
                    <i class="fas fa-chevron-down"></i>
                    <div class="card-details">
                        <p>Nuestro equipo de soporte está disponible a través de WhatsApp, correo y redes sociales para resolver todas tus dudas rápidamente.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <i class="fas fa-mouse" style="font-size: 2rem; color: #6c63ff;"></i>
                    <h5>Fácil Participación</h5>
                    <p>Adquirir boletos nunca fue tan sencillo.</p>
                    <i class="fas fa-chevron-down"></i>
                    <div class="card-details">
                        <p>Con nuestro sistema en línea, puedes elegir y comprar boletos desde la comodidad de tu hogar, de manera fácil y segura.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <i class="fas fa-check" style="font-size: 2rem; color: #4caf50;"></i>
                    <h5>Transparencia Total</h5>
                    <p>Resultados claros y públicos.</p>
                    <i class="fas fa-chevron-down"></i>
                    <div class="card-details">
                        <p>Los resultados de las rifas se basan en sorteos oficiales, y los ganadores son anunciados públicamente en nuestras redes sociales.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <i class="fas fa-gift" style="font-size: 2rem; color: #e91e63;"></i>
                    <h5>Entrega Garantizada</h5>
                    <p>Tu premio, asegurado.</p>
                    <i class="fas fa-chevron-down"></i>
                    <div class="card-details">
                        <p>Nos aseguramos de que todos los premios sean entregados directamente a los ganadores en tiempo y forma.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="footer">
        <div class="group-1 container">
            <!-- Logo -->
            <div class="box text-center">
                <figure>
                    <a href="/">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Rifas Delicias" style="height: 80px; object-fit: contain;">
                    </a>
                </figure>
            </div>
    
            <!-- Contacto -->
            <div class="box text-center">
                <h2>Contáctanos</h2>
                <a href="https://wa.me/{{ str_replace('+', '', $contactInfo['phone']) }}" target="_blank" class="fab fa-whatsapp text-success"
                   style="font-size: 1.5rem; text-decoration: none;">
                    {{ $contactInfo['name'] }} - {{ $contactInfo['phone'] }}
                </a>
            </div>
    
            <!-- Redes Sociales -->
            <div class="box text-center">
                <h2>Síguenos</h2>
                <div class="social-networks d-flex justify-content-center gap-3">
                    <a href="https://facebook.com" target="_blank" class="fab fa-facebook text-primary"
                       style="font-size: 1.5rem; text-decoration: none;"></a>
                    <a href="https://instagram.com" target="_blank" class="fab fa-instagram text-danger"
                       style="font-size: 1.5rem; text-decoration: none;"></a>
                    <a href="https://tiktok.com" target="_blank" class="fab fa-tiktok text-dark"
                       style="font-size: 1.5rem; text-decoration: none;"></a>
                </div>
            </div>
        </div>
    
        <!-- Derechos Reservados -->
        <div class="group-2">
            <small>© Copyright 2024 <b>Rifas Delicias</b> - Derechos reservados</small>

            <a href="https://www.facebook.com/DSTUDIOVISUAL" target="_blank" class="d-inline-flex align-items-center">
                <img src="{{ asset('images/developer-logo.jpg') }}" alt="DSTUDIOVISUAL">
                Desarrollado por DSTUDIOVISUAL
            </a>
        </div>
        
    </footer>
    
    
    

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script>
        document.querySelectorAll('.info-card').forEach(card => {
            card.addEventListener('click', () => {
                card.classList.toggle('active');
            });
        });
    </script>
    
    <script>
        document.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled'); // Agregar clase cuando se hace scroll
            } else {
                navbar.classList.remove('scrolled'); // Eliminar clase al regresar arriba
            }
        });
    </script>


    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                const offset = -50; // Ajusta el desplazamiento si el header cubre parte de la sección
                const position = target.offsetTop + offset;

                window.scrollTo({
                    top: position,
                    behavior: 'smooth'
                });
            });
        });
    </script>


    
</body>

</html>
