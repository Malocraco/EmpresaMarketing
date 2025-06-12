<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing Valentina - Servicios de Marketing Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
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
            padding: 15px 0;
            backdrop-filter: blur(10px);
        }

        /* Añadir estos estilos para el efecto hover de botón */
        .navbar-nav .nav-link {
            padding: 8px 15px !important;
            margin: 0 3px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            color: white !important;
        }

        .navbar-nav {
            align-items: center;
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            font-size: 1rem;
            padding: 10px 20px !important;
            margin: 0 5px;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-nav .nav-link:hover {
            color: white !important;
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .navbar-nav .nav-link.btn-style {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white !important;
            font-weight: 600;
            padding: 8px 20px !important;
            border-radius: 30px;
            backdrop-filter: blur(10px);
        }

        .navbar-nav .nav-link.btn-style:hover {
            background: white;
            color: var(--pink-dark) !important;
            border-color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
        }

        .navbar-nav .nav-link.btn-primary-style {
            background: linear-gradient(135deg, #fff, #f8f9fa);
            color: var(--pink-dark) !important;
            border: none;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        .navbar-nav .nav-link.btn-primary-style:hover {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: var(--pink-darker) !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.4);
        }

        .dropdown-menu {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(233, 30, 99, 0.2);
            margin-top: 10px;
        }

        .dropdown-item {
            color: var(--pink-dark);
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 10px;
            margin: 5px;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: var(--pink-light);
            color: var(--pink-darker);
            transform: translateX(5px);
        }

        .navbar-toggler {
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            padding: 8px 12px;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .navbar-nav {
                background: rgba(255, 255, 255, 0.1);
                border-radius: 15px;
                padding: 20px;
                margin-top: 15px;
                backdrop-filter: blur(10px);
            }

            .navbar-nav .nav-link {
                margin: 5px 0;
                text-align: center;
            }

            .navbar-nav .nav-link.btn-style,
            .navbar-nav .nav-link.btn-primary-style {
                margin: 10px 0;
            }
        }

        /* Icon styling */
        .nav-link i {
            font-size: 1.1rem;
            margin-right: 5px;
        }

        .hero-section {
            background:
                linear-gradient(135deg, rgba(248, 187, 217, 0.85), rgba(252, 228, 236, 0.85)),
                url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 80px 0;
            margin-bottom: 50px;
            position: relative;
        }

        /* Efecto adicional para mejorar la legibilidad */
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(233, 30, 99, 0.1), rgba(252, 228, 236, 0.2));
            pointer-events: none;
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }

        /* Mejorar el contraste del texto */
        .hero-section h1 {
            text-shadow: 0 2px 4px rgba(255, 255, 255, 0.8);
            color: #2d2d2d !important;
        }

        .hero-section .lead {
            text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
            color: #444 !important;
        }

        /* Responsive para móviles */
        @media (max-width: 768px) {
            .hero-section {
                background-attachment: scroll;
                padding: 60px 0;
            }

            .hero-section h1 {
                font-size: 2.5rem;
            }
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
            transform: scale(1.05);
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
        }

        #servicios {
            scroll-margin-top: 80px;
        }

        #quienes-somos {
            scroll-margin-top: 100px;
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
            }
        }

        /* Centrado mejorado para servicios */
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

        /* Servicios preview - Mismo estilo del dashboard */
        .services-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .services-title {
            color: var(--pink-dark);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .services-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .service-preview-card {
            background: linear-gradient(135deg, var(--pink-light), rgba(255, 255, 255, 0.9));
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(233, 30, 99, 0.1);
            min-height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .service-preview-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(233, 30, 99, 0.15);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 1.5rem;
        }

        .service-preview-card h5 {
            color: var(--pink-dark);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .service-preview-card p {
            color: #666;
            margin-bottom: 15px;
        }

        .service-details {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            margin-bottom: 15px;
        }

        .service-feature {
            background: rgba(233, 30, 99, 0.1);
            color: var(--pink-dark);
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .service-feature i {
            font-size: 0.7rem;
        }

        .service-price {
            color: var(--pink-dark);
            font-weight: 700;
            font-size: 1.2rem;
        }

        .service-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: auto;
        }

        .btn-service-quote {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .btn-service-quote:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(233, 30, 99, 0.3);
            color: white;
        }

        .btn-service-details {
            background: transparent;
            color: var(--pink-dark);
            border: 2px solid var(--pink-dark);
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .btn-service-details:hover {
            background: var(--pink-dark);
            color: white;
            transform: translateY(-2px);
        }

        .no-services {
            padding: 60px 20px;
        }

        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: 1fr;
            }

            .service-actions {
                flex-direction: column;
            }

            .btn-service-quote,
            .btn-service-details {
                font-size: 0.8rem;
                padding: 10px 15px;
            }
        }

        .service-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .service-modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .service-modal-close {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #999;
            transition: color 0.3s ease;
        }

        .service-modal-close:hover {
            color: var(--pink-dark);
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
        .lottie-megaphone-hero {
            display: inline-block;
            vertical-align: middle;
            margin-right: 15px;
            transform: scale(1.5);
        }

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

            .lottie-megaphone-hero dotlottie-player {
                width: 40px !important;
                height: 40px !important;
            }

            .lottie-megaphone-navbar dotlottie-player {
                width: 25px !important;
                height: 25px !important;
            }
        }

        /* Estilos para la sección del equipo */
        .team-section {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), var(--pink-light));
        }

        .team-card {
            background: white;
            border-radius: 25px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(233, 30, 99, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .team-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--pink-dark), var(--pink-medium));
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(233, 30, 99, 0.2);
        }

        .team-image {
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            transform: scale(1.15);
        }

        .team-name {
            color: var(--pink-dark);
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 1.4rem;
        }

        .team-role {
            color: var(--pink-darker);
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .team-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
            font-size: 0.95rem;
        }

        .team-social {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .team-social a {
            width: 40px;
            height: 40px;
            background: var(--pink-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--pink-dark);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .team-social a:hover {
            background: var(--pink-dark);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(233, 30, 99, 0.3);
        }

        /* Estilos para la sección de clientes */
        .clients-section {
            padding: 80px 0;
            background: white;
        }

        .clients-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .client-card {
            background: linear-gradient(135deg, var(--pink-light), rgba(255, 255, 255, 0.9));
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(233, 30, 99, 0.1);
            position: relative;
            overflow: hidden;
        }

        .client-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(233, 30, 99, 0.1), transparent);
            border-radius: 50%;
        }

        .client-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(233, 30, 99, 0.15);
        }

        .client-logo {
            margin-bottom: 20px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .client-logo img {
            max-height: 90px;
            max-width: 180px;
            object-fit: contain;
            border-radius: 80%;
        }

        .client-card:hover .client-logo img {
            filter: grayscale(0%);
            transform: scale(1.05);
        }

        .client-info h5 {
            color: var(--pink-dark);
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 1.3rem;
        }

        .client-info p {
            color: #666;
            margin-bottom: 15px;
            font-style: italic;
        }

        .client-results {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
        }

        .result-badge {
            background: var(--pink-dark);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            white-space: nowrap;
        }

        /* Responsive */
        @media (max-width: 768px) {

            .team-section,
            .clients-section {
                padding: 60px 0;
            }

            .team-card {
                padding: 30px 20px;
            }

            .clients-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .client-results {
                flex-direction: column;
                align-items: center;
            }

            .result-badge {
                font-size: 0.75rem;
                gap: 20px;
            }

            .client-results {
                flex-direction: column;
                align-items: center;
            }

            .result-badge {
                font-size: 0.75rem;
            }
        }

        /* Sistema de notificaciones de marketing */
        .marketing-notification {
            position: fixed;
            bottom: 100px;
            right: 20px;
            background: linear-gradient(10deg, var(--pink-dark), var(--pink-darker));
            color: white;
            padding: 15px 20px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(233, 30, 99, 0.4);
            max-width: 320px;
            z-index: 999;
            transform: translateX(400px);
            opacity: 0;
            transition: all 0.5s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .marketing-notification.show {
            transform: translateX(0);
            opacity: 1;
        }

        .marketing-notification.hide {
            transform: translateX(400px);
            opacity: 0;
        }

        .notification-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .notification-icon {
            width: 30px;
            height: 30px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            margin-right: 10px;
        }

        .notification-title {
            font-weight: 600;
            font-size: 0.9rem;
            flex: 1;
        }

        .notification-close {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.3s ease;
        }

        .notification-close:hover {
            color: white;
        }

        .notification-content {
            font-size: 0.85rem;
            line-height: 1.4;
            opacity: 0.95;
        }

        .notification-cta {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .notification-cta a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }

        .notification-cta a:hover {
            color: var(--pink-light);
            transform: translateX(3px);
        }

        /* Responsive para móviles */
        @media (max-width: 768px) {
            .marketing-notification {
                bottom: 90px;
                right: 15px;
                left: 15px;
                max-width: none;
                transform: translateY(400px);
            }

            .marketing-notification.show {
                transform: translateY(0);
            }

            .marketing-notification.hide {
                transform: translateY(400px);
            }
        }

        /* Animación de entrada suave */
        @keyframes slideInRight {
            from {
                transform: translateX(400px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }

        .marketing-notification.animate-in {
            animation: slideInRight 0.5s ease forwards;
        }

        .marketing-notification.animate-out {
            animation: slideOutRight 0.5s ease forwards;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
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
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quienes-somos">Quiénes Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nuestro-equipo">Nuestro Equipo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nuestros-clientes">Nuestros Clientes</a>
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
                <span class="lottie-megaphone-hero">
                    <dotlottie-player src="https://lottie.host/93a0a4ee-0c2e-4def-a6b3-5769e41c3725/VIDQ79SSTB.lottie"
                        background="transparent"
                        speed="1"
                        style="width: 60px; height: 60px"
                        loop
                        autoplay>
                    </dotlottie-player>
                </span>
                Marketing Valentina
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
        <div class="services-header">
            <h2 class="services-title">
                <i class="bi bi-star me-2"></i>
                Servicios Disponibles
            </h2>
            <p class="services-subtitle">Descubre nuestros planes diseñados para hacer crecer tu negocio</p>
        </div>
        <div class="services-grid">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $index => $service): ?>
                    <div class="service-preview-card" data-service-id="<?= $service['id'] ?>">
                        <div class="service-icon">
                            <?php
                            $icons = ['bi-instagram', 'bi-graph-up', 'bi-trophy', 'bi-rocket', 'bi-star-fill', 'bi-heart-fill'];
                            $icon = $icons[$index % count($icons)];
                            ?>
                            <i class="<?= $icon ?>"></i>
                        </div>
                        <h5><?= htmlspecialchars($service['nombre']) ?></h5>
                        <p><?= htmlspecialchars(substr($service['descripcion'], 0, 50)) ?>...</p>

                        <div class="service-details mb-3">
                            <?php if ($service['reels']): ?>
                                <span class="service-feature">
                                    <i class="bi bi-camera-reels"></i> <?= $service['reels'] ?> Reels
                                </span>
                            <?php endif; ?>

                            <?php if ($service['post_feed']): ?>
                                <span class="service-feature">
                                    <i class="bi bi-grid-3x3"></i> <?= $service['post_feed'] ?> Posts
                                </span>
                            <?php endif; ?>

                            <?php if ($service['historias']): ?>
                                <span class="service-feature">
                                    <i class="bi bi-circle"></i> <?= $service['historias'] ?> Historias
                                </span>
                            <?php endif; ?>
                        </div>

                        <span class="service-price">$<?= number_format($service['precio'], 0) ?></span>

                        <div class="service-actions mt-3">
                            <a href="index.php?page=home&action=requestQuote&service_id=<?= $service['id'] ?>" class="btn btn-service-quote">
                                <i class="bi bi-plus-circle me-2"></i>
                                Solicitar Cotización
                            </a>
                            <button class="btn btn-service-details" onclick="showServiceDetails(<?= $service['id'] ?>)">
                                <i class="bi bi-info-circle me-2"></i>
                                Ver Detalles
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <div class="no-services">
                        <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                        <h4 class="text-muted">No hay servicios disponibles</h4>
                        <p class="text-muted">Los servicios se mostrarán aquí cuando estén disponibles.</p>
                    </div>
                </div>
            <?php endif; ?>
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
                            <dotlottie-player src="https://lottie.host/5f28a1c6-a4b9-4494-b389-b378dbf46171/IvppmwwjAQ.lottie"
                                background="transparent"
                                speed="1"
                                style="width: 300px; height: 300px"
                                loop
                                autoplay>
                            </dotlottie-player>
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

    <!-- Team Section -->
    <section id="nuestro-equipo" class="team-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary">Nuestro Equipo</h2>
                <p class="lead text-muted">Conoce a los profesionales que hacen posible tu éxito digital</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="img/r.jpg" alt="Valentina Ramírez" style="width: 170px; height: 170px; border-radius: 50%;">
                        </div>
                        <div class="team-content">
                            <h4 class="team-name">Valentina Ramírez</h4>
                            <p class="team-role">CEO & Fundadora</p>
                            <p class="team-description">
                                Especialista en marketing digital con más de 5 años de experiencia.
                                Apasionada por crear estrategias que conecten marcas con sus audiencias.
                            </p>
                            <div class="team-social">
                                <a href="https://www.instagram.com/valen_rl15" target="_blank" title="Instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="https://www.facebook.com/valentina.ramirez.395017" target="_blank" title="Facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://wa.me/573043157669" target="_blank" title="WhatsApp">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-image">
                            <dotlottie-player src="https://lottie.host/7c6d6d6f-5c6a-5d6e-9f6a-8b6c6d6e6f6a/TeamMember2.lottie"
                                background="transparent"
                                speed="1"
                                style="width: 150px; height: 150px"
                                loop
                                autoplay>
                            </dotlottie-player>
                        </div>
                        <div class="team-content">
                            <h4 class="team-name">Carlos Mendoza</h4>
                            <p class="team-role">Director Creativo</p>
                            <p class="team-description">
                                Experto en diseño gráfico y producción audiovisual.
                                Responsable de crear contenido visual impactante para nuestros clientes.
                            </p>
                            <div class="team-social">
                                <a href="#" title="Instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="#" title="LinkedIn">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-image">
                            <dotlottie-player src="https://lottie.host/9d7e7e7a-6d7b-6e7f-8a7b-9c7d7e7f7a7b/TeamMember3.lottie"
                                background="transparent"
                                speed="1"
                                style="width: 150px; height: 150px"
                                loop
                                autoplay>
                            </dotlottie-player>
                        </div>
                        <div class="team-content">
                            <h4 class="team-name">Ana García</h4>
                            <p class="team-role">Especialista en Redes Sociales</p>
                            <p class="team-description">
                                Community manager certificada con expertise en Instagram, Facebook y TikTok.
                                Gestiona las estrategias de contenido y engagement.
                            </p>
                            <div class="team-social">
                                <a href="#" title="Instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="#" title="Twitter">
                                    <i class="bi bi-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section id="nuestros-clientes" class="clients-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary">Nuestros Clientes</h2>
                <p class="lead text-muted">Empresas que confían en nosotros para su crecimiento digital</p>
            </div>

            <div class="clients-grid">
                <div class="client-card">
                    <div class="client-logo">
                        <img src="img/JardinDeRosas.jpg" alt="Jardín de Rosas" class="img-fluid">
                    </div>
                    <div class="client-info">
                        <h5>Jardín de Rosas</h5>
                        <p>Floristería y eventos</p>
                        <div class="client-results">
                            <span class="result-badge">+150% seguidores</span>
                            <span class="result-badge">+80% ventas</span>
                        </div>
                    </div>
                </div>

                <div class="client-card">
                    <div class="client-logo">
                        <img src="img/LaPerfumeria.jpg" alt="La Perfumería" class="img-fluid">
                    </div>
                    <div class="client-info">
                        <h5>La Perfumería</h5>
                        <p>Tienda de fragancias</p>
                        <div class="client-results">
                            <span class="result-badge">+200% alcance</span>
                            <span class="result-badge">+120% engagement</span>
                        </div>
                    </div>
                </div>

                <div class="client-card">
                    <div class="client-logo">
                        <img src="img/Metaltec.jpg" alt="Metaltec" class="img-fluid">
                    </div>
                    <div class="client-info">
                        <h5>Metaltec</h5>
                        <p>Empresa metalúrgica</p>
                        <div class="client-results">
                            <span class="result-badge">+90% leads</span>
                            <span class="result-badge">+60% conversión</span>
                        </div>
                    </div>
                </div>

                <div class="client-card">
                    <div class="client-logo">
                        <img src="img/OpticaNewVision.jpg" alt="Óptica New Vision" class="img-fluid">
                    </div>
                    <div class="client-info">
                        <h5>Óptica New Vision</h5>
                        <p>Centro óptico</p>
                        <div class="client-results">
                            <span class="result-badge">+180% visitas</span>
                            <span class="result-badge">+95% citas</span>
                        </div>
                    </div>
                </div>

                <div class="client-card">
                    <div class="client-logo">
                        <img src="img/odontologia.jpg" alt="OdontoArte" class="img-fluid">
                    </div>
                    <div class="client-info">
                        <h5>OdontoArte</h5>
                        <p>Servicios odontológicos</p>
                        <div class="client-results">
                            <span class="result-badge">+250% pacientes</span>
                            <span class="result-badge">+140% consultas</span>
                        </div>
                    </div>
                </div>

                <div class="client-card">
                    <div class="client-logo">
                        <img src="img/litzy.jpg" alt="Restaurante Litzy" class="img-fluid">
                    </div>
                    <div class="client-info">
                        <h5>Restaurante Litzy</h5>
                        <p>Gastronomía local</p>
                        <div class="client-results">
                            <span class="result-badge">+300% reservas</span>
                            <span class="result-badge">+160% delivery</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <p class="lead text-muted mb-4">¿Quieres ser nuestro próximo caso de éxito?</p>
                <a href="index.php?page=quote&action=request" class="btn btn-primary btn-lg">
                    <i class="bi bi-rocket-takeoff me-2"></i>
                    Solicita tu Cotización
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php require_once 'views/templates/footer.php'; ?>

    <!-- Botón flotante de WhatsApp -->
    <a href="https://wa.me/573043157669?text=Hola,%20me%20interesa%20conocer%20más%20sobre%20sus%20servicios%20de%20marketing%20digital"
        class="whatsapp-float pulse"
        target="_blank"
        title="Chatea con nosotros en WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Función para mostrar detalles del servicio
        function showServiceDetails(serviceId) {
            const services = <?= json_encode($services) ?>;
            const service = services.find(s => s.id == serviceId);

            if (service) {
                let modalHtml = `
                <div class="service-modal" id="serviceModal">
                    <div class="service-modal-content">
                        <span class="service-modal-close" onclick="closeServiceModal()">&times;</span>
                        <div class="text-center mb-4">
                            <h3 class="text-primary">${service.nombre}</h3>
                            <h4 class="text-success">$${parseFloat(service.precio).toLocaleString()}</h4>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Descripción:</h5>
                                <p>${service.descripcion}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Incluye:</h5>
                                <ul class="list-unstyled">
                                    ${service.reels ? `<li><i class="bi bi-check text-success me-2"></i>${service.reels} Reels</li>` : ''}
                                    ${service.post_feed ? `<li><i class="bi bi-check text-success me-2"></i>${service.post_feed} Posts para Feed</li>` : ''}
                                    ${service.historias ? `<li><i class="bi bi-check text-success me-2"></i>${service.historias} Historias</li>` : ''}
                                    ${service.grabaciones ? `<li><i class="bi bi-check text-success me-2"></i>Grabaciones: ${service.grabaciones}</li>` : ''}
                                    ${service.estrategia_publicitaria ? `<li><i class="bi bi-check text-success me-2"></i>Estrategia: ${service.estrategia_publicitaria}</li>` : ''}
                                </ul>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="index.php?page=home&action=requestQuote&service_id=${service.id}" class="btn btn-primary me-3">
                                <i class="bi bi-plus-circle me-2"></i>Solicitar Cotización
                            </a>
                            <button class="btn btn-secondary" onclick="closeServiceModal()">
                                Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            `;

                document.body.insertAdjacentHTML('beforeend', modalHtml);
                document.getElementById('serviceModal').style.display = 'block';
            }
        }

        function closeServiceModal() {
            const modal = document.getElementById('serviceModal');
            if (modal) {
                modal.style.display = 'none';
                modal.remove();
            }
        }

        window.onclick = function(event) {
            const modal = document.getElementById('serviceModal');
            if (event.target == modal) {
                closeServiceModal();
            }
        }

        // Sistema de notificaciones de marketing
        const marketingMessages = [{
                icon: 'bi-graph-up-arrow',
                title: '¡Aumenta tus ventas!',
                content: 'El 73% de las empresas que usan marketing digital ven un aumento en sus ventas.',
                cta: 'Solicita tu cotización',
                link: 'index.php?page=quote&action=request'
            },
            {
                icon: 'bi-instagram',
                title: 'Redes Sociales',
                content: 'Instagram tiene más de 2 mil millones de usuarios activos. ¿Tu marca está ahí?',
                cta: 'Conoce nuestros servicios',
                link: '#servicios'
            },
            {
                icon: 'bi-lightning-charge',
                title: 'Marketing Digital',
                content: 'Las empresas que invierten en marketing digital crecen 2.8 veces más rápido.',
                cta: 'Empieza ahora',
                link: 'index.php?page=quote&action=request'
            },
            {
                icon: 'bi-people-fill',
                title: 'Engagement',
                content: 'El contenido visual genera 94% más visualizaciones que el texto plano.',
                cta: 'Ver nuestro trabajo',
                link: '#nuestros-clientes'
            },
            {
                icon: 'bi-trophy',
                title: '¡Casos de Éxito!',
                content: 'Nuestros clientes han aumentado sus ventas hasta un 300%. ¡Tú puedes ser el siguiente!',
                cta: 'Ver casos de éxito',
                link: '#nuestros-clientes'
            },
            {
                icon: 'bi-rocket-takeoff',
                title: 'Estrategia Digital',
                content: 'Una buena estrategia de marketing puede aumentar el ROI hasta un 400%.',
                cta: 'Solicita tu estrategia',
                link: 'index.php?page=quote&action=request'
            },
            {
                icon: 'bi-heart-fill',
                title: 'Fidelización',
                content: 'Retener un cliente cuesta 5 veces menos que conseguir uno nuevo.',
                cta: 'Conoce cómo',
                link: '#quienes-somos'
            },
            {
                icon: 'bi-star-fill',
                title: 'Calidad Premium',
                content: 'Más de 50 clientes confían en nosotros para su crecimiento digital.',
                cta: 'Únete a ellos',
                link: 'index.php?page=quote&action=request'
            }
        ];

        let currentMessageIndex = 0;
        let notificationTimeout;
        let isNotificationVisible = false;

        function createNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'marketing-notification';
            notification.innerHTML = `
        <div class="notification-header">
            <div class="notification-icon">
                <i class="bi ${message.icon}"></i>
            </div>
            <div class="notification-title">${message.title}</div>
            <button class="notification-close" onclick="hideNotification()">
                <i class="bi bi-x"></i>
            </button>
        </div>
        <div class="notification-content">${message.content}</div>
        <div class="notification-cta">
            <a href="${message.link}">
                ${message.cta} <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    `;

            return notification;
        }

        function showNotification() {
            if (isNotificationVisible) return;

            const message = marketingMessages[currentMessageIndex];
            const notification = createNotification(message);

            document.body.appendChild(notification);

            // Mostrar con animación
            setTimeout(() => {
                notification.classList.add('show');
                isNotificationVisible = true;
            }, 100);

            // Ocultar automáticamente después de 6 segundos
            notificationTimeout = setTimeout(() => {
                hideNotification();
            }, 6000);

            // Avanzar al siguiente mensaje
            currentMessageIndex = (currentMessageIndex + 1) % marketingMessages.length;
        }

        function hideNotification() {
            const notification = document.querySelector('.marketing-notification');
            if (notification) {
                notification.classList.remove('show');
                notification.classList.add('hide');

                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                    isNotificationVisible = false;
                }, 500);

                if (notificationTimeout) {
                    clearTimeout(notificationTimeout);
                }
            }
        }

        // Iniciar el sistema de notificaciones después de 10 segundos
        setTimeout(() => {
            showNotification();

            // Mostrar una nueva notificación cada 25 segundos
            setInterval(() => {
                if (!isNotificationVisible) {
                    showNotification();
                }
            }, 25000);
        }, 10000);

        // Pausar notificaciones cuando el usuario está interactuando
        let userInteractionTimer;
        document.addEventListener('click', () => {
            clearTimeout(userInteractionTimer);
            userInteractionTimer = setTimeout(() => {
                // Reanudar después de 30 segundos de inactividad
            }, 30000);
        });

        // Pausar notificaciones cuando la pestaña no está visible
        document.addEventListener('visibilitychange', () => {
            if (document.hidden && isNotificationVisible) {
                hideNotification();
            }
        });
    </script>
</body>

</html>