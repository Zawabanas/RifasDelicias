<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rifas Delicias - Métodos de Pago</title>
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

        .card {
            height: 100%; /* Uniformar el tamaño de las tarjetas */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card img {
            max-height: 100px;
            margin-bottom: 15px;
        }

    </style>
    
</head>

<body class="payment-methods">

    <!-- Header -->
    <header >
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
                            <a href="/tickets" class="nav-link d-flex align-items-center">
                                <i class="fas fa-ticket-alt mr-2"></i>Boletos
                            </a>
                        </li>
    
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sección de Métodos de Pago -->
    <section id="payment-methods" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Métodos de Pago Disponibles</h2>
            <div class="row">
                @forelse($paymentMethods as $method)
                    <div class="col-md-4 mb-4">
                        <div class="card text-center shadow-sm">
                            <div class="card-body">
                                @if($method->logo)
                                    <img src="{{ asset('storage/' . $method->logo) }}" alt="{{ $method->banco }} logo" class="img-fluid">
                                @else
                                    <i class="fa-3x mb-3 {{ $method->nombre_metodo === 'transferencias bancarias' ? 'fas fa-university text-success' : ($method->nombre_metodo === 'depositos en tiendas de servicios' ? 'fas fa-store text-warning' : 'fas fa-money-bill-wave text-secondary') }}"></i>
                                @endif
                                <h5 class="card-title">{{ ucfirst($method->nombre_metodo) }}</h5>
                                <p class="card-text">
                                    <strong>{{ $method->nombre_metodo === 'transferencias bancarias' ? 'Banco:' : 'Tienda:' }}</strong>
                                    {{ $method->banco ?? 'No especificado' }}<br>
    
                                    @if($method->nombre_metodo === 'transferencias bancarias')
                                        <strong>Propietario:</strong> {{ $method->propietario_cuenta ?? 'No especificado' }}<br>
                                    @endif
    
                                    @if($method->numero_tarjeta)
                                        <strong>Número de Tarjeta:</strong> {{ $method->numero_tarjeta }}
                                        <i class="fas fa-copy text-gray ml-2" style="cursor: pointer; color: gray;" onclick="copyToClipboard('{{ $method->numero_tarjeta }}')"></i>
                                    @elseif($method->clabe)
                                        <strong>CLABE:</strong> {{ $method->clabe }}
                                        <i class="fas fa-copy text-gray ml-2" style="cursor: pointer; color: gray;" onclick="copyToClipboard('{{ $method->clabe }}')"></i>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center w-100">No hay métodos de pago disponibles en este momento.</p>
                @endforelse
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
</body>
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
    document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled'); // Agregar clase cuando se hace scroll
        } else {
            navbar.classList.remove('scrolled'); // Eliminar clase al regresar arriba
        }
    });
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.querySelector('.navbar');
        
        if (!navbar) {
            console.error('Navbar element not found!');
            return;
        }

        document.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    });
</script>


<script>
    function copyToClipboard(value) {
        navigator.clipboard.writeText(value).then(() => {
            alert('¡Texto copiado al portapapeles!');
        }).catch(err => {
            alert('No se pudo copiar el texto.');
        });
    }
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

</html>
