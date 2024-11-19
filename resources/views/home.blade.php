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

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .navbar {
            height: 80px;
            padding: 0;
        }

        .navbar-brand img {
            height: 50px;
        }

        .parallax {
            background-size: cover;
            background-position: center;
            height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
            text-align: center;
        }

        .parallax h1 {
            z-index: 2;
            font-size: 4rem;
            text-align: center;
        }

        .parallax p {
            margin-top: 20px;
            font-size: 1.2rem;
        }

        .info-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .info-section .info-card {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s;
        }

        .info-card:hover {
            transform: scale(1.05);
        }

        .info-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
        }

        .footer {
        width: 100%;
        background-color: #0a141d !important;
    }

    .footer .group-1 {
        width: 100%;
        max-width: 1200px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 50px;
        padding: 45px 0px;
    }

    .footer .group-1 .box {
        text-align: center;
    }

    .footer .group-1 .box figure {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .footer .group-1 .box figure img {
        width: 250px;
    }

    .footer .group-1 .box h2 {
        color: #fff;
        margin-bottom: 25px;
        font-size: 20px;
    }

    .footer .group-1 .box p {
        color: #fff;
        margin-bottom: 25px;
        font-size: 15px;
    }

    .footer .group-1 .social-networks {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .footer .group-1 .social-networks a {
        display: inline-block;
        text-decoration: none;
        width: 45px;
        height: 45px;
        line-height: 45px;
        color: #fff;
        margin-right: 10px;
        background-color: #0d2033;
        text-align: center;
        border-radius: 50%;
        font-size: 20px;
    }

    .footer .group-1 .social-networks a:hover {
        color: rgb(255, 255, 255);
    }

    .footer .group-2 {
        background-color: #0a1a2a;
        padding: 15px 10px;
        text-align: center;
        color: #fff;
    }

    .footer .group-2 small {
        font-size: 15px;
    }

        .card-details {
            display: none;
            text-align: left;
            margin-top: 20px;
        }

        .info-card.active .card-details {
            display: block;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Rifas Delicias" style="height: 10px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="#Inicio" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="#about-us" class="nav-link">Cómo Participar</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contacto</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="parallax"
        style="background-image: url('{{ $rifaActiva && $rifaActiva->imagenes->where('pivot.tipo', 'header')->first() ? asset('storage/' . $rifaActiva->imagenes->where('pivot.tipo', 'header')->first()->ruta) : 'https://via.placeholder.com/1200x600' }}');">
        <div>
            <h1>{{ $rifaActiva ? $rifaActiva->nombre : 'Bienvenido a Rifas Delicias' }}</h1>
            <p>¡Participa y gana premios increíbles! Cada boleto es una oportunidad.</p>
            <a href="tickets" class="btn btn-primary btn-lg mt-4">Comprar Boletos</a>
        </div>
    </section>

    <!-- Información sobre el funcionamiento -->
 <!-- Información sobre el funcionamiento -->
 <section id="about-us" class="info-section">
    <div class="container">
        <h2 class="text-center mb-4">Conoce más sobre Rifas Delicias</h2>
        <div class="row">
            <!-- Cards -->
            @foreach (['Rifas Seguras', 'Premios Increíbles', 'Soporte al Cliente', 'Fácil Participación', 'Transparencia Total', 'Entrega Garantizada'] as $title)
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <img src="{{ asset('images/raffle-icon.png') }}" alt="{{ $title }}">
                    <h5>{{ $title }}</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <i class="fas fa-chevron-down"></i>
                    <div class="card-details">
                        <p>Detalles adicionales sobre {{ $title }}.</p>
                    </div>
                </div>
            </div>
            @endforeach
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
        <div class="group-2 text-center py-3" style="background-color: #2c2f33; color: #fff;">
            <small>© Copyright 2024 <b>Rifas Delicias</b> - Derechos reservados</small>
            <br>
            <a href="https://www.facebook.com/DSTUDIOVISUAL" target="_blank" class="d-inline-flex align-items-center mt-2">
                <img src="{{ asset('images/developer-logo.jpg') }}" alt="DSTUDIOVISUAL" style="height: 40px; border-radius: 50%; object-fit: cover;">
                <span class="ml-2">Desarrollado por DSTUDIOVISUAL</span>
            </a>
        </div>
    </footer>
    
    
    

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.querySelectorAll('.info-card').forEach(card => {
            card.addEventListener('click', () => {
                card.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
