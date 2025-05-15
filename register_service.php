<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Registrar Nuevo Servicio</h3>
    <form action="save_service.php" method="POST">
        <div class="mb-3">
            <label>Nombre del Servicio</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <button class="btn btn-primary">Guardar Servicio</button>
    </form>
</div>
</body>
</html>
