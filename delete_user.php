<?php
session_start();
require 'db.php';

// Verifica que el usuario esté autenticado y sea administrador
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Verifica que se haya enviado el ID del usuario a eliminar
if (!isset($_GET['id'])) {
    echo "ID de usuario no proporcionado.";
    exit();
}

$id = $_GET['id'];

// Prevenir que el admin se elimine a sí mismo
if ($id == $_SESSION['user_id']) {
    echo "⚠️ No puedes eliminar tu propia cuenta de administrador.";
    exit();
}

// Ejecutar eliminación
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

// Redirigir de vuelta al panel
header('Location: dashboard_admin.php');
exit();
?>
