<?php
session_start();
require 'db.php';

// Asegurarse de que solo los administradores puedan acceder
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Verifica que el formulario fue enviado por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura y sanitiza datos
    $nombre = htmlspecialchars($_POST['nombre']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $precio = floatval($_POST['precio']);

    try {
        $stmt = $pdo->prepare("INSERT INTO servicios (nombre, descripcion, precio) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $descripcion, $precio]);
        $_SESSION['message'] = "✅ Servicio registrado exitosamente.";
    } catch (PDOException $e) {
        $_SESSION['message'] = "❌ Error al registrar el servicio: " . $e->getMessage();
    }

    header("Location: dashboard_admin.php");
    exit();
} else {
    $_SESSION['message'] = "⚠️ Acceso inválido.";
    header("Location: dashboard_admin.php");
    exit();
}
