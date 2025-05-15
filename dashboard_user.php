<?php
session_start();

// Evitar caché
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");

// Validar sesión y rol
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
</head>
<body>
    <h2>Bienvenido Usuario, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
