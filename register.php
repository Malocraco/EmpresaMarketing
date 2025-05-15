<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password']; // INSEGURO, solo para pruebas

    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'user')");


    try {
        $stmt->execute([$username, $password]);
        $_SESSION['message'] = "Registro exitoso. Ahora puedes iniciar sesión.";
        header('Location: login.php');
        exit();
    } catch (PDOException $e) {
        $_SESSION['message'] = "Error: El usuario ya existe.";
        header('Location: register.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fef5f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
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

<div class="register-container text-center">
    <h2 class="mb-4">Registro</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-info">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>

    <form action="register.php" method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Usuario" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-custom w-100 mb-3">Registrarse</button>
    </form>

    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
