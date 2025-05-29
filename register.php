<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: ' . ($_SESSION['role'] === 'admin' ? 'dashboard_admin.php' : 'dashboard_user.php'));
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Registrarse</h1>
        <form action="register.php" method="POST" class="col-md-6 mx-auto">
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
            <p class="mt-3">¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></p>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'db.php';
            $username = $_POST['username'];
            $password = $_POST['password']; // Plain text as per your request
            try {
                $stmt = $pdo->prepare("INSERT INTO users (username, password, role, created_at) VALUES (?, ?, 'cliente', NOW())");
                $stmt->execute([$username, $password]);
                header('Location: login.php?success=Registro exitoso');
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
    <?php include 'footer.php'; ?>