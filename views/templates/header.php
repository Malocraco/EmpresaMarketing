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
        
        .table-striped > tbody > tr:nth-of-type(odd) > td {
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
                <i class="bi bi-megaphone"></i> Marketing Valentina
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
                    
                    <?php if (isAdmin()): ?>
                    <!-- Eliminar todos estos enlaces de navegación para admin -->
                    <!-- 
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=service&action=list">
                            <i class="bi bi-list-ul"></i> Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=user&action=list">
                            <i class="bi bi-people"></i> Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quote&action=list">
                            <i class="bi bi-file-text"></i> Cotizaciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=payment&action=list">
                            <i class="bi bi-credit-card"></i> Pagos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=report&action=list">
                            <i class="bi bi-graph-up"></i> Reportes
                        </a>
                    </li>
                    -->
                    <?php else: ?>
                    <!-- Eliminar todos estos enlaces de navegación para clientes -->
                    <!-- 
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quote&action=request">
                            <i class="bi bi-plus-circle"></i> Solicitar Cotización
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quote&action=list">
                            <i class="bi bi-file-text"></i> Mis Cotizaciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=payment&action=list">
                            <i class="bi bi-credit-card"></i> Mis Pagos
                        </a>
                    </li>
                    -->
                    <?php endif; ?>
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
                            <li><hr class="dropdown-divider"></li>
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
