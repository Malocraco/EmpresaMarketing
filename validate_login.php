<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password']; // SIN encriptar

    // Consultar usuario
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Comparar la contraseña directamente (porque no está encriptada)
    if ($user && $user['password'] === $password) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirigir según el rol
        if ($user['role'] === 'admin') {
            header('Location: dashboard_admin.php');
        } else {
            header('Location: dashboard_user.php');
        }
        exit();
    } else {
        $_SESSION['message'] = "Credenciales incorrectas.";
        header('Location: login.php');
        exit();
    }
}
?>
