<?php
require_once 'header.php';
require_once 'db.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['username'] ?? '';
    $new_password = $_POST['password'] ?? '';

    if (empty($new_username)) {
        $error = "El nombre de usuario es requerido";
    } else {
        try {
            $updates = [];
            $params = [];
            if (!empty($new_username) && $new_username !== $user['username']) {
                $updates[] = "username = ?";
                $params[] = $new_username;
            }
            if (!empty($new_password)) {
                $updates[] = "password = ?";
                $params[] = $new_password; // Plain text as per your request
            }
            if (!empty($updates)) {
                $params[] = $user_id;
                $stmt = $pdo->prepare("UPDATE users SET " . implode(", ", $updates) . " WHERE id = ?");
                $stmt->execute($params);
                $success = "Perfil actualizado exitosamente";
            } else {
                $error = "No se realizaron cambios";
            }
        } catch (PDOException $e) {
            $error = "Error al actualizar: " . $e->getMessage();
        }
    }
}

$stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <h1 class="h2">Editar Perfil</h1>
    <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    <?php if (isset($success)) echo "<p class='text-success'>$success</p>"; ?>
    <form method="POST" class="col-md-6">
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Nueva Contraseña (dejar en blanco para no cambiar)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
<?php include 'footer.php'; ?>