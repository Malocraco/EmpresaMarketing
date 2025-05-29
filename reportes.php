<?php
require_once 'header.php';
checkAuth('admin');
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $admin_id = $_SESSION['user_id'];

    if (empty($titulo) || empty($descripcion)) {
        $error = "Título y descripción son requeridos";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO reportes (admin_id, titulo, descripcion, fecha_creacion) VALUES (?, ?, ?, NOW())");
            $stmt->execute([$admin_id, $titulo, $descripcion]);
            $success = "Reporte creado exitosamente";
        } catch (PDOException $e) {
            $error = "Error al crear reporte: " . $e->getMessage();
        }
    }
}

$stmt = $pdo->query("SELECT r.*, u.username FROM reportes r JOIN users u ON r.admin_id = u.id ORDER BY r.fecha_creacion DESC");
$reportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <h1 class="h2">Reportes</h1>
    <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    <?php if (isset($success)) echo "<p class='text-success'>$success</p>"; ?>
    <form method="POST" class="col-md-6 mb-4">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Reporte</button>
    </form>
    <h3>Reportes Existentes</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Creado por</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reportes as $reporte): ?>
                <tr>
                    <td><?php echo htmlspecialchars($reporte['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($reporte['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($reporte['username']); ?></td>
                    <td><?php echo $reporte['fecha_creacion']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php include 'footer.php'; ?>