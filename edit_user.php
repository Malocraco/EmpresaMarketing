<?php
session_start();
require 'db.php';

// Verifica que solo el administrador pueda acceder
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Verifica que se haya pasado un ID de usuario para editar
if (!isset($_GET['id'])) {
    echo "ID de usuario no proporcionado.";
    exit();
}

$id = $_GET['id'];

// Si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newUsername = htmlspecialchars($_POST['username']);
    $newRole = $_POST['role'];

    $stmt = $pdo->prepare("UPDATE users SET username = ?, role = ? WHERE id = ?");
    $stmt->execute([$newUsername, $newRole, $id]);

    header('Location: dashboard_admin.php');
    exit();
}

// Obtener los datos del usuario actual
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    echo "Usuario no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="mb-4">Editar Usuario</h3>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nombre de Usuario</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Rol</label>
            <select name="role" class="form-select" required>
                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>Usuario</option>
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="dashboard_admin.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
