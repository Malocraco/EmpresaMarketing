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

        <div class="row">
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

    <!-- Footer -->
    <footer class="bg-light text-center text-muted py-4 mt-5" style="background: var(--pink-light) !important;">
        <div class="container">
            <p>&copy; 2024 Marketing Valentina. Todos los derechos reservados.</p>
            <p>
                <i class="bi bi-envelope"></i> contacto@marketingvalentina.com | 
                <i class="bi bi-telephone"></i> +1 234 567 8900
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
