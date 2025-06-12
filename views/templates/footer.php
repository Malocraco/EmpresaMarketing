<footer class="modern-footer mt-5">
    <div class="footer-content">
        <div class="container">
            <div class="row g-4">
                <!-- Información de la empresa -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
                        <h5 class="footer-title">
                            <span class="lottie-megaphone-footer me-2">
                                <dotlottie-player src="https://lottie.host/93a0a4ee-0c2e-4def-a6b3-5769e41c3725/VIDQ79SSTB.lottie"
                                    background="transparent"
                                    speed="1"
                                    style="width: 25px; height: 25px"
                                    loop
                                    autoplay>
                                </dotlottie-player>
                            </span>
                            Marketing Valentina
                        </h5>
                        <p class="footer-description">
                            Transformamos tu presencia digital con estrategias de marketing innovadoras y personalizadas para hacer crecer tu negocio.
                        </p>
                        <div class="footer-stats">
                            <div class="stat-item">
                                <span class="stat-number">50+</span>
                                <span class="stat-label">Clientes</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">3+</span>
                                <span class="stat-label">Años</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">100%</span>
                                <span class="stat-label">Compromiso</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enlaces rápidos -->
                <div class="col-lg-2 col-md-6">
                    <div class="footer-section">
                        <h6 class="footer-subtitle">Enlaces Rápidos</h6>
                        <ul class="footer-links">
                            <li><a href="index.php"><i class="bi bi-house me-2"></i>Inicio</a></li>
                            <li><a href="index.php#servicios"><i class="bi bi-star me-2"></i>Servicios</a></li>
                            <li><a href="index.php#quienes-somos"><i class="bi bi-people me-2"></i>Quiénes Somos</a></li>
                            <?php if (isLoggedIn()): ?>
                                <li><a href="index.php?page=user&action=dashboard"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                            <?php else: ?>
                                <li><a href="index.php?page=user&action=login"><i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <!-- Servicios -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-section">
                        <h6 class="footer-subtitle">Nuestros Servicios</h6>
                        <ul class="footer-links">
                            <li><a href="#"><i class="bi bi-instagram me-2"></i>Marketing en Redes</a></li>
                            <li><a href="#"><i class="bi bi-camera-reels me-2"></i>Creación de Contenido</a></li>
                            <li><a href="#"><i class="bi bi-graph-up me-2"></i>Estrategias Digitales</a></li>
                            <li><a href="#"><i class="bi bi-bullseye me-2"></i>Publicidad Online</a></li>
                            <li><a href="#"><i class="bi bi-camera-video me-2"></i>Producción Audiovisual</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contacto -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-section">
                        <h6 class="footer-subtitle">Contacto</h6>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="bi bi-envelope-fill"></i>
                                <div>
                                    <span class="contact-label">Email</span>
                                    <a href="mailto:MarketingValentina@gmail.com">MarketingValentina@gmail.com</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="bi bi-telephone-fill"></i>
                                <div>
                                    <span class="contact-label">Teléfono</span>
                                    <a href="tel:+573043157669">+57 304 3157669</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="bi bi-whatsapp"></i>
                                <div>
                                    <span class="contact-label">WhatsApp</span>
                                    <a href="https://wa.me/573043157669" target="_blank">Chatea con nosotros</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Redes sociales y copyright -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="social-section">
                        <span class="social-title">Síguenos:</span>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/valentina.ramirez.395017" target="_blank" title="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/valen_rl15?fbclid=IwY2xjawKp31tleHRuA2FlbQIxMABicmlkETFsa1k5bG8zc1l2RzFQNGd0AR4YNZ-n4LV4P7eUyltrDp1H3VUD92O8Rpf3oxlb-CJE5fgvmjrj6wQ10dV6HA_aem_6wX5-EbOo8r-qL1ErsbO9g" target="_blank" title="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://wa.me/573043157669" target="_blank" title="WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="tel:+573043157669" title="Llamar">
                                <i class="bi bi-telephone"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="copyright">
                        <p>&copy; 2025 <strong>Marketing Valentina</strong>. Todos los derechos reservados.</p>
                        <p class="made-with">Hecho con <i class="bi bi-heart-fill text-danger"></i> para tu éxito digital</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .modern-footer {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
        color: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .modern-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--pink-dark), var(--pink-medium), var(--pink-dark));
    }

    .footer-content {
        padding: 50px 0 30px;
        position: relative;
    }

    .footer-section {
        height: 100%;
    }

    .footer-title {
        color: var(--pink-medium);
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .footer-subtitle {
        color: var(--pink-light);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 10px;
    }

    .footer-subtitle::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 2px;
        background: var(--pink-dark);
    }

    .footer-description {
        color: #cccccc;
        line-height: 1.6;
        margin-bottom: 25px;
    }

    .footer-stats {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
        min-width: 60px;
    }

    .stat-number {
        display: block;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--pink-medium);
    }

    .stat-label {
        display: block;
        font-size: 0.8rem;
        color: #999;
        margin-top: 2px;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
    }

    .footer-links a {
        color: #cccccc;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        font-size: 0.95rem;
    }

    .footer-links a:hover {
        color: var(--pink-medium);
        transform: translateX(5px);
    }

    .footer-links a i {
        color: var(--pink-dark);
        font-size: 0.9rem;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .contact-item i {
        color: var(--pink-medium);
        font-size: 1.1rem;
        margin-top: 2px;
        min-width: 20px;
    }

    .contact-item div {
        flex: 1;
    }

    .contact-label {
        display: block;
        font-size: 0.8rem;
        color: #999;
        margin-bottom: 2px;
    }

    .contact-item a {
        color: #cccccc;
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }

    .contact-item a:hover {
        color: var(--pink-medium);
    }

    .footer-bottom {
        background: rgba(0, 0, 0, 0.3);
        padding: 25px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .social-section {
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .social-title {
        color: #cccccc;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .social-icons {
        display: flex;
        gap: 10px;
    }

    .social-icons a {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #cccccc;
        text-decoration: none;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .social-icons a:hover {
        background: var(--pink-dark);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(233, 30, 99, 0.4);
    }

    .copyright {
        text-align: right;
    }

    .copyright p {
        margin: 0;
        color: #cccccc;
        font-size: 0.9rem;
    }

    .copyright p:first-child {
        margin-bottom: 5px;
    }

    .made-with {
        font-size: 0.8rem !important;
        color: #999 !important;
    }

    .made-with i {
        animation: heartbeat 1.5s ease-in-out infinite;
    }

    @keyframes heartbeat {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    /* Estilos para las animaciones Lottie en el footer */
    .lottie-megaphone-footer {
        display: inline-block;
        vertical-align: middle;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .footer-content {
            padding: 40px 0 20px;
        }

        .footer-stats {
            justify-content: center;
        }

        .social-section {
            justify-content: center;
            margin-bottom: 20px;
        }

        .copyright {
            text-align: center !important;
        }

        .footer-title {
            font-size: 1.3rem;
            justify-content: center;
        }

        .footer-subtitle {
            text-align: center;
        }

        .footer-subtitle::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .lottie-megaphone-footer dotlottie-player {
            width: 20px !important;
            height: 20px !important;
        }
    }
</style>

<script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>