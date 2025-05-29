<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso No Autorizado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container my-5 text-center">
        <h1>Acceso No Autorizado</h1>
        <p>No tienes permiso para acceder a esta página.</p>
        <a href="index.php" class="btn btn-primary">Volver al Inicio</a>
    </div>
    <?php include 'footer.php'; ?>