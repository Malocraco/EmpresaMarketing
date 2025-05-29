<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id && is_numeric($id)) {
        $stmt = $pdo->prepare("DELETE FROM servicios WHERE id = ?");
        $stmt->execute([$id]);

        $_SESSION['message'] = "Servicio eliminado correctamente.";
    } else {
        $_SESSION['message'] = "ID de servicio no válido.";
    }

    // Redirigir de vuelta al dashboard
    header("Location: dashboard_admin.php");
    exit();
}
?>
