<?php
$message = getMessage();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing Valentina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <style>
        :root {
            --pink-light: #fce4ec;
            --pink-medium: #f8bbd9;
            --pink-dark: #e91e63;
            --pink-darker: #c2185b;
            --blue-gradient-start: #6a75ca;
            --blue-gradient-end: #4e54c8;
            --green-gradient-start: #20c997;
            --green-gradient-end: #0bb197;
        }

        body {
            background: linear-gradient(135deg, var(--pink-light) 0%, #fff 100%);
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker)) !important;
            box-shadow: 0 2px 10px rgba(233, 30, 99, 0.3);
        }

        .card {
            border: none;
            box-shadow: 0 8px 25px rgba(233, 30, 99, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(233, 30, 99, 0.2);
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

        .btn-success {
            background: linear-gradient(135deg, #4caf50, #388e3c);
            border: none;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #388e3c, #2e7d32);
        }

        .badge {
            background: var(--pink-medium) !important;
            color: var(--pink-darker) !important;
        }

        .text-primary {
            color: var(--pink-dark) !important;
        }

        .alert-success {
            background-color: #e8f5e8;
            border-color: #4caf50;
            color: #2e7d32;
        }

        .alert-info {
            background-color: var(--pink-light);
            border-color: var(--pink-medium);
            color: var(--pink-darker);
        }

        .alert-danger {
            background-color: #ffebee;
            border-color: #f44336;
            color: #c62828;
        }

        .alert-warning {
            background-color: #fff8e1;
            border-color: #ff9800;
            color: #ef6c00;
        }

        .table-striped>tbody>tr:nth-of-type(odd)>td {
            background-color: var(--pink-light);
        }

        .dropdown-menu {
            box-shadow: 0 5px 15px rgba(233, 30, 99, 0.2);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ff9800, #f57c00);
            border: none;
            color: white;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #f57c00, #ef6c00);
            color: white;
        }

        .d-flex.gap-2 {
            gap: 0.5rem !important;
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

        /* Botón flotante de WhatsApp */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .whatsapp-float:hover {
            background-color: #128c7e;
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(37, 211, 102, 0.6);
            color: white;
        }

        .whatsapp-float i {
            margin-top: 2px;
        }

        /* Animación de pulso para llamar la atención */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        .whatsapp-float.pulse {
            animation: pulse 2s infinite;
        }

        /* Estilos para las animaciones Lottie */
        .lottie-megaphone-navbar {
            display: inline-block;
            vertical-align: middle;
            margin-right: 8px;
        }

        /* Responsive para móviles */
        @media (max-width: 768px) {
            .whatsapp-float {
                width: 55px;
                height: 55px;
                bottom: 15px;
                right: 15px;
                font-size: 26px;
            }

            .lottie-megaphone-navbar dotlottie-player {
                width: 25px !important;
                height: 25px !important;
            }
        }
    </style>
    <?php if (isLoggedIn()): ?>
        <?php include 'views/templates/session_check.php'; ?>
    <?php endif; ?>
</head>

<body>
    <?php if (isLoggedIn()): ?>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php?page=user&action=dashboard">
                    <span class="lottie-megaphone-navbar">
                        <dotlottie-player src="https://lottie.host/93a0a4ee-0c2e-4def-a6b3-5769e41c3725/VIDQ79SSTB.lottie"
                            background="transparent"
                            speed="1"
                            style="width: 30px; height: 30px"
                            loop
                            autoplay>
                        </dotlottie-player>
                    </span>
                    Marketing Valentina
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=user&action=dashboard">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['username']) ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=user&action=changeUsername">
                                        <i class="bi bi-pencil"></i> Cambiar Nombre
                                    </a></li>
                                <li><a class="dropdown-item" href="index.php?page=user&action=changePassword">
                                        <i class="bi bi-key"></i> Cambiar Contraseña
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">
                                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <?php if ($message): ?>
        <div class="container mt-3">
            <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($message['message']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Botón flotante de WhatsApp -->
    <a href="https://wa.me/573043157669?text=Hola,%20me%20interesa%20conocer%20más%20sobre%20sus%20servicios%20de%20marketing%20digital"
        class="whatsapp-float pulse"
        target="_blank"
        title="Chatea con nosotros en WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>
    