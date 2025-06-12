<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - Marketing Valentina</title>
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
            display: flex;
            flex-direction: column;
        }
        
        .register-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }
        
        .card {
            border: none;
            box-shadow: 0 15px 35px rgba(233, 30, 99, 0.2);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            width: 100%;
            max-width: 450px;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
            color: white;
            border: none;
            padding: 25px;
            text-align: center;
        }
        
        .card-header h4 {
            margin: 0;
            font-weight: 600;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .card-footer {
            padding: 20px 30px;
            background: rgba(248, 187, 217, 0.1);
            border: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
            border: none;
            transition: all 0.3s ease;
            padding: 12px;
            font-weight: 600;
            border-radius: 12px;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--pink-darker), #ad1457);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(233, 30, 99, 0.4);
        }
        
        .form-control {
            border-radius: 12px;
            border: 2px solid #e0e0e0;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--pink-medium);
            box-shadow: 0 0 0 0.2rem rgba(233, 30, 99, 0.25);
        }
        
        .input-group-text {
            background: var(--pink-light);
            border: 2px solid #e0e0e0;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: var(--pink-dark);
        }
        
        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            padding: 15px 20px;
        }
        
        .alert-success {
            background-color: #e8f5e8;
            color: #2e7d32;
        }
        
        .alert-info {
            background-color: var(--pink-light);
            color: var(--pink-darker);
        }
        
        .alert-danger {
            background-color: #ffebee;
            color: #c62828;
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
        .lottie-megaphone-register {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
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
            
            .register-container {
                padding: 15px;
            }
            
            .card {
                max-width: 100%;
            }
            
            .card-body {
                padding: 25px;
            }
            
            .card-footer {
                padding: 15px 25px;
            }

            .lottie-megaphone-register dotlottie-player {
                width: 25px !important;
                height: 25px !important;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Mostrar mensajes -->
                    <?php
                    $message = getMessage();
                    if ($message): ?>
                        <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show mb-4" role="alert">
                            <?= htmlspecialchars($message['message']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card mx-auto">
                        <div class="card-header">
                            <h4>
                                <span class="lottie-megaphone-register">
                                    <dotlottie-player src="https://lottie.host/93a0a4ee-0c2e-4def-a6b3-5769e41c3725/VIDQ79SSTB.lottie" 
                                                      background="transparent" 
                                                      speed="1" 
                                                      style="width: 30px; height: 30px" 
                                                      loop 
                                                      autoplay>
                                    </dotlottie-player>
                                </span>
                                Crear Cuenta
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nombre de Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo Electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" class="form-control" id="correo" name="correo" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                    </div>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="bi bi-person-plus me-2"></i>Crear Cuenta
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <p class="mb-2">¿Ya tienes cuenta? 
                                <a href="index.php?page=user&action=login" class="text-decoration-none fw-bold" style="color: var(--pink-dark);">
                                    Inicia sesión aquí
                                </a>
                            </p>
                            <p class="mb-0">
                                <a href="index.php" class="text-decoration-none" style="color: var(--pink-darker);">
                                    <i class="bi bi-arrow-left me-1"></i>Volver al Inicio
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón flotante de WhatsApp -->
    <a href="https://wa.me/573043157669?text=Hola,%20me%20interesa%20conocer%20más%20sobre%20sus%20servicios%20de%20marketing%20digital" 
       class="whatsapp-float pulse" 
       target="_blank" 
       title="Chatea con nosotros en WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Footer -->
    <?php require_once 'views/templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
