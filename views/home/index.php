<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing Valentina - Servicios de Marketing Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --pink-light: #fce4ec;
            --pink-medium: #f8bbd9;
            --pink-dark: #e91e63;
            --pink-darker: #c2185b;
        }

        body {
            background: linear-gradient(135deg, var(--pink-light) 0%, #fff 100%);
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker)) !important;
            box-shadow: 0 2px 10px rgba(233, 30, 99, 0.3);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--pink-medium), var(--pink-light));
            padding: 80px 0;
            margin-bottom: 50px;
        }

        .card {
            border: none;
            box-shadow: 0 8px 25px rgba(233, 30, 99, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(233, 30, 99, 0.25);
        }

        .card-header {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
            color: white;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--pink-darker), #ad1457);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(233, 30, 99, 0.4);
        }

        .badge {
            background: var(--pink-medium) !important;
            color: var(--pink-darker) !important;
        }

        .text-primary {
            color: var(--pink-dark) !important;
        }

        .alert-info {
            background-color: var(--pink-light);
            border-color: var(--pink-medium);
            color: var(--pink-darker);
        }

        /* Estilos para los iconos sociales */
        .social-icons .btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            margin: 0 5px;
        }

        .social-icons .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: var(--pink-dark);
            color: white;
            border-color: var(--pink-dark);
        }

        .social-icons .bi {
            font-size: 1.2rem;
        }

        /* Estilos para la sección Quiénes Somos */
        .about-section {
            padding: 80px 0;
            background: rgba(255, 255, 255, 0.8);
        }

        .about-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(233, 30, 99, 0.1);
            position: relative;
            border: 2px solid #f0f0f0;
            height: 100%;
            min-height: 400px;
        }

        .about-card::before {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            width: 30px;
            height: 30px;
            background: var(--pink-dark);
            border-radius: 0 18px 0 18px;
        }

        .about-card::after {
            content: '';
            position: absolute;
            top: 8px;
            right: 8px;
            width: 15px;
            height: 15px;
            background: white;
            border-radius: 50%;
        }

        .about-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .about-image {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            transform: scale(1.0.5);
        }

        .about-image img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        /* Scroll suave y offset para navbar fija */
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
            /* Ajusta según la altura de tu navbar */
        }

        /* Alternativa: offset para las secciones específicas */
        #servicios {
            scroll-margin-top: 80px;
        }

        #quienes-somos {
            scroll-margin-top: 0.0px;
            /* Más espacio para que se vea mejor centrado */
        }

        /* Mejorar la transición del scroll */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        /* Ajuste específico para dispositivos móviles */
        @media (max-width: 768px) {
            html {
                scroll-padding-top: 70px;
            }

            #servicios {
                scroll-margin-top: 70px;
            }

            #quienes-somos {
                scroll-margin-top: 100px;
                /* Más espacio en móviles también */
            }
        }

        /* Centrado mejorado para servicios */
        .services-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card-wrapper {
            flex: 0 0 auto;
            width: 100%;
            max-width: 350px;
        }

        @media (min-width: 768px) {
            .service-card-wrapper {
                width: calc(50% - 15px);
            }
        }

        @media (min-width: 992px) {
            .service-card-wrapper {
                width: calc(33.333% - 20px);
            }
        }

        /* Mejorar el espaciado cuando hay pocos elementos */
        .row.justify-content-center .col-md-6.col-lg-4 {
            display: flex;
            justify-content: center;
        }

        .row.justify-content-center .col-md-6.col-lg-4 .card {
            width: 100%;
            max-width: 350px;
        }

        /* Centrado perfecto para 1, 2 o 3 elementos */
        .row.justify-content-center {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .row.justify-content-center>.col-md-6.col-lg-4 {
            flex: 0 0 auto;
            width: 100%;
            max-width: 350px;
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            .row.justify-content-center>.col-md-6.col-lg-4 {
                width: calc(50% - 10px);
                max-width: 350px;
            }
        }

        @media (min-width: 992px) {
            .row.justify-content-center>.col-md-6.col-lg-4 {
                width: calc(33.333% - 14px);
                max-width: 350px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-megaphone"></i> Marketing Valentina
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quienes-somos">Quiénes Somos</a>
                    </li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=user&action=dashboard">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['username']) ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="logout.php">
                                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                    </a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=user&action=login">
                                <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=user&action=register">
                                <i class="bi bi-person-plus"></i> Registrarse
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mostrar mensajes -->
    <?php
    $message = getMessage();
    if ($message): ?>
        <div class="container mt-3">
            <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($message['message']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold text-dark mb-4">
                <i class="bi bi-megaphone text-primary"></i> Marketing Valentina
            </h1>
            <p class="lead text-dark mb-4">
                Potencia tu presencia digital con nuestros servicios especializados de marketing
            </p>
            <a href="#servicios" class="btn btn-primary btn-lg">
                <i class="bi bi-arrow-down"></i> Ver Servicios
            </a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="container mb-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary">Nuestros Servicios</h2>
            <p class="lead text-muted">Descubre cómo podemos ayudarte a crecer en el mundo digital</p>
        </div>

        <div class="row justify-content-center">
            <?php foreach ($services as $service): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-star"></i> <?= htmlspecialchars($service['nombre']) ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= htmlspecialchars($service['descripcion']) ?></p>

                            <div class="mb-3">
                                <?php if ($service['reels']): ?>
                                    <span class="badge me-1">
                                        <i class="bi bi-camera-reels"></i> Reels: <?= $service['reels'] ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ($service['post_feed']): ?>
                                    <span class="badge me-1">
                                        <i class="bi bi-grid-3x3"></i> Posts: <?= $service['post_feed'] ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ($service['historias']): ?>
                                    <span class="badge me-1">
                                        <i class="bi bi-circle"></i> Historias: <?= $service['historias'] ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <?php if ($service['grabaciones']): ?>
                                <p><strong><i class="bi bi-camera-video"></i> Grabaciones:</strong> <?= htmlspecialchars($service['grabaciones']) ?></p>
                            <?php endif; ?>

                            <?php if ($service['estrategia_publicitaria']): ?>
                                <p><strong><i class="bi bi-bullseye"></i> Estrategia:</strong> <?= htmlspecialchars($service['estrategia_publicitaria']) ?></p>
                            <?php endif; ?>

                            <h4 class="text-primary">
                                <i class="bi bi-currency-dollar"></i><?= number_format($service['precio'], 2) ?>
                            </h4>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="index.php?page=home&action=requestQuote&service_id=<?= $service['id'] ?>"
                                class="btn btn-primary w-100">
                                <i class="bi bi-cart-plus"></i> Solicitar Cotización
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="quienes-somos" class="about-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary">Quiénes Somos</h2>
                <p class="lead text-muted">Conoce más sobre Marketing Valentina</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="about-card">
                        <div class="about-text">
                            <h3 class="text-primary mb-4">
                                <i class="bi bi-heart-fill"></i> Nuestra Historia
                            </h3>
                            <p class="lead mb-4">
                                En <strong>Marketing Valentina</strong>, somos una agencia especializada en transformar la presencia digital de tu negocio.
                            </p>
                            <p class="mb-4">
                                Con años de experiencia en el mundo del marketing digital, nos dedicamos a crear estrategias personalizadas que conecten tu marca con tu audiencia ideal. Nuestro equipo de expertos combina creatividad, tecnología y análisis de datos para impulsar el crecimiento de tu empresa.
                            </p>
                            <div class="row text-center">
                                <div class="col-4">
                                    <h4 class="text-primary">50+</h4>
                                    <small class="text-muted">Clientes Satisfechos</small>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-primary">3+</h4>
                                    <small class="text-muted">Años de Experiencia</small>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-primary">100%</h4>
                                    <small class="text-muted">Compromiso</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-card">
                        <div class="about-image">
                            <img src="img/r.jpg"
                                alt="Equipo de Marketing Valentina trabajando en estrategias digitales"
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-4 text-center mb-4">
                    <div class="p-4">
                        <i class="bi bi-lightbulb text-primary" style="font-size: 3rem;"></i>
                        <h4 class="mt-3 text-primary">Innovación</h4>
                        <p class="text-muted">Utilizamos las últimas tendencias y tecnologías del marketing digital para mantener tu marca a la vanguardia.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="p-4">
                        <i class="bi bi-people text-primary" style="font-size: 3rem;"></i>
                        <h4 class="mt-3 text-primary">Equipo Experto</h4>
                        <p class="text-muted">Nuestro equipo multidisciplinario está formado por profesionales apasionados por el marketing digital.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="p-4">
                        <i class="bi bi-graph-up text-primary" style="font-size: 3rem;"></i>
                        <h4 class="mt-3 text-primary">Resultados</h4>
                        <p class="text-muted">Nos enfocamos en generar resultados medibles que impulsen el crecimiento real de tu negocio.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-muted py-4 mt-5" style="background: var(--pink-light) !important;">
        <div class="container">
            <div class="social-icons mb-4">
                <a href="https://www.facebook.com/valentina.ramirez.395017" class="btn btn-outline-dark mx-1" target="_blank" title="Facebook">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="https://www.instagram.com/valen_rl15?fbclid=IwY2xjawKp31tleHRuA2FlbQIxMABicmlkETFsa1k5bG8zc1l2RzFQNGd0AR4YNZ-n4LV4P7eUyltrDp1H3VUD92O8Rpf3oxlb-CJE5fgvmjrj6wQ10dV6HA_aem_6wX5-EbOo8r-qL1ErsbO9g" class="btn btn-outline-dark mx-1" target="_blank" title="Instagram">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="tel:+57 304 3157669" class="btn btn-outline-dark mx-1" title="Llamar">
                    <i class="bi bi-telephone"></i>
                </a>
            </div>
            <p>&copy; 2025 Marketing Valentina. Todos los derechos reservados.</p>
            <p>
                <i class="bi bi-envelope"></i> MarketingValentina@gmail.com |
                <i class="bi bi-telephone"></i> +57 304 3157669
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>