<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rifas Delicias - Boletos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        body {
            padding-top: 100px; /* Espacio para evitar solapamiento con el header */
        }

        <style>
        .carousel-item img {
            width: 100%; /* Asegura que las imágenes ocupen todo el ancho */
            max-height: 100px; /* Reduce la altura máxima para que las imágenes sean más pequeñas */
            object-fit: contain; /* Asegura que toda la imagen se ajuste dentro del contenedor */
        }

        .carousel-inner {
            display: flex; /* Para centrar verticalmente las imágenes */
            align-items: center;
        }
        /* Estilos para la vista de tickets */
            body.tickets-page .navbar.bg-transparent .nav-link,
            body.tickets-page .navbar.bg-transparent .navbar-brand {
                color: black !important; /* Texto negro cuando no está scrolleado */
            }

            body.tickets-page .navbar.fixed-top.scrolled .nav-link,
            body.tickets-page .navbar.fixed-top.scrolled .navbar-brand {
                color: white !important; /* Texto blanco cuando está scrolleado */
            }

            body.tickets-page .navbar.fixed-top.scrolled {
                background-color: rgb(184, 48, 48) !important; /* Fondo oscuro con scroll */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); /* Sombra elegante */
                transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Animación suave */
            }

            body.tickets-page .navbar {
                transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Transición para smooth scroll */
            }

            /* Ajuste adicional para el espacio superior */
            body.tickets-page {
                padding-top: 80px; /* Espacio adicional para evitar que el header se solape con el contenido */
            }


            body.payment-methods .navbar-toggler {
                border-color: rgba(0, 0, 0, 0.8); /* Borde oscuro para visibilidad */
}

body.tickets-page .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0, 0, 0, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

/* Cambiar color al scrollear */
body.tickets-page .navbar.fixed-top.scrolled .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

body.tickets-page .navbar.fixed-top.scrolled .navbar-toggler {
    border-color: rgba(255, 255, 255, 0.8); /* Borde blanco al hacer scroll */
}

#promociones {
    background-color: #f8f9fa;
}

#promociones h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #333;
}
  /* Contenedor de boletos */
  .boleto-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    gap: 15px;
    margin: 20px 0;
  }

  .boleto {
    width: 100px;
    height: 100px;
    border: 2px solid #ddd;
    border-radius: 10px;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 1.2em;
    font-weight: bold;
    line-height: 100px;
    cursor: pointer;
    transition: transform 0.2s, background-color 0.3s;
  }

  .boleto.disponible {
    background-color: #e6ffe6;
    color: #2a7f2a;
  }

  .boleto.reservado {
    background-color: #ffebcc;
    color: #b37400;
  }

  .boleto.vendido {
    background-color: #ffe6e6;
    color: #a80000;
    cursor: not-allowed;
  }

  .boleto:hover:not(.vendido) {
    transform: scale(1.1);
  }

  /* Leyenda */
  .leyenda {
    font-family: 'Poppins', sans-serif;
    margin: 20px 0;
    font-size: 1em;
  }

  .leyenda .estado {
    display: inline-block;
    width: 15px;
    height: 15px;
    border-radius: 3px;
    margin-right: 5px;
  }

  .disponible-legend {
    background-color: #e6ffe6;
    border: 1px solid #2a7f2a;
  }

  .reservado-legend {
    background-color: #ffebcc;
    border: 1px solid #b37400;
  }

  .vendido-legend {
    background-color: #ffe6e6;
    border: 1px solid #a80000;
  }

  /* Texto motivacional */
  .motivacional {
    font-family: 'Poppins', sans-serif;
    font-size: 1.2em;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: #555;
  }
        </style>

    </style>
</head>

<body class="tickets-page">

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
                            <a href="/" class="nav-link d-flex align-items-center">
                                <i class="fas fa-home mr-2"></i>Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/payment_methods" class="nav-link d-flex align-items-center">
                                <i class="fas fa-credit-card mr-2"></i>Métodos de Pago
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/tickets" class="nav-link d-flex align-items-center active">
                                <i class="fas fa-ticket-alt mr-2"></i>Boletos
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Carrusel de Imágenes -->
    <section id="carousel" class="mb-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @forelse ($imagenes as $index => $imagen)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $imagen->ruta) }}" class="d-block w-100" alt="Imagen de la rifa">
                    </div>
                @empty
                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/1200x600" class="d-block w-100" alt="Sin imágenes disponibles">
                    </div>
                @endforelse
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </section>
    
    <!-- Sección de Promociones -->
<section id="promociones" class="py-5">
    <div class="container text-center">
        <h2 class="mb-4">Promociones Especiales</h2>
        <p class="lead">
            {{ $mensajePromocion ?? 'Próximamente tendremos promociones increíbles. ¡Mantente al tanto!' }}
        </p>
    </div>
</section>

<div class="motivacional">
    ¡Asegura tu lugar en la rifa! <br> Compra tus boletos antes de que se agoten.
  </div>
  
  <div class="leyenda">
    <p>
      <span class="estado disponible-legend"></span> Disponible
      <span class="estado reservado-legend" style="margin-left: 10px;"></span> Reservado
      <span class="estado vendido-legend" style="margin-left: 10px;"></span> Vendido
    </p>
  </div>
  

    <!-- Boletos -->
    <section id="boletos" class="container mb-5">
        <h3 class="text-center">Selecciona tus boletos</h3>
        <div class="boleto-container">
            @foreach ($boletos as $boleto)
                <div class="boleto {{ $boleto->estado }}" onclick="seleccionarBoleto({{ $boleto->id }})">
                    {{ $boleto->numero }}
                </div>
            @endforeach
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
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
</body>

</html>
