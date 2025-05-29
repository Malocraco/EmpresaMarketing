<?php
session_start();

// Destroy session completely
session_unset();
session_destroy();

// Clear session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

// Set cache-control headers
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");

require_once 'db.php';
$stmt = $pdo->query("SELECT * FROM services");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing Valentina - Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #c47992;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php">Marketing Valentina</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white" href="login.php">Iniciar Sesión</a>
                <a class="nav-link text-white" href="register.php">Registrarse</a>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <h1 class="text-center mb-4">Nuestros Servicios</h1>
        <div class="row">
            <?php foreach ($services as $service): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <?php echo htmlspecialchars($service['nombre']); ?>
                        </div>
                        <div class="card-body">
                            <p><?php echo htmlspecialchars($service['descripcion']); ?></p>
                            <p><strong>Precio:</strong> $<?php echo number_format($service['precio'], 2); ?></p>
                            <a href="login.php" class="btn btn-primary">Iniciar Sesión para Cotizar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>