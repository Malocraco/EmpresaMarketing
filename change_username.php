<?php
require_once 'header.php';
require_once 'db.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['username'] ?? '';
    if (empty($new_username)) {
        $error = "El nombre de usuario es requerido";
    } else {
        try {
            $stmt = $pdo->prepare("UPDATE users SET username = ? WHERE id = ?");
            $stmt->execute([$new_username, $user_id]);
            $success = "Nombre de usuario actualizado exitosamente";
        } catch (PDOException $e) {
            $error = "Error al actualizar: " . $e->getMessage();
        }
    }
}

$stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <h1 class="h2">Cambiar Nombre</h1>
    <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    <?php if (isset($success)) echo "<p class='text-success'>$success</p>"; ?>
    <form method="POST" class="col-md-6">
        <div class="mb-3">
            <label for="username" class="form-label">Nuevo Nombre de Usuario</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
<?php include 'footer.php'; ?>