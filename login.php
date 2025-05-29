<?php
session_start();

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: dashboard_admin.php");
        exit();
    } elseif ($_SESSION['role'] === 'user') {
        header("Location: dashboard_user.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fef5f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: linear-gradient(145deg, #fce4ec, #f8bbd0);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }
        .btn-custom {
            background: linear-gradient(135deg, #d39ed1, #f7c4e7);
            color: white;
        }
        .btn-custom:hover {
            background: linear-gradient(135deg, #f7c4e7, #d39ed1);
        }
    </style>
</head>
<body>

<div class="login-container text-center">
    <h2 class="mb-4">Iniciar Sesión</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-danger">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>

    <form action="validate_login.php" method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Usuario" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-custom w-100 mb-3">Ingresar</button>
    </form>

    <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
