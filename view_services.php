<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "<p>No autorizado.</p>";
    exit();
}

// Obtener todos los servicios
$stmt = $pdo->query("SELECT * FROM servicios ORDER BY id DESC");
$servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si se envió el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) {
    $idEditar = $_POST['editar'];
    $stmt = $pdo->prepare("SELECT * FROM servicios WHERE id = ?");
    $stmt->execute([$idEditar]);
    $servicioEditar = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h3>Servicios Registrados</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($servicios as $servicio): ?>
            <tr>
                <td><?= htmlspecialchars($servicio['nombre']) ?></td>
                <td><?= htmlspecialchars($servicio['descripcion']) ?></td>
                <td>$<?= number_format($servicio['precio'], 2) ?></td>
                <td>
                    <!-- Botón de Editar -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="editar" value="<?= $servicio['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-warning">Editar</button>
                    </form>

                    <!-- Botón de Eliminar -->
                    <form action="delete_service.php" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este servicio?');">
                        <input type="hidden" name="id" value="<?= $servicio['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if (isset($servicioEditar)): ?>
    <hr>
    <h4>Editar Servicio</h4>
    <form action="edit_service.php?id=<?= $servicioEditar['id'] ?>" method="POST">
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($servicioEditar['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control" rows="3" required><?= htmlspecialchars($servicioEditar['descripcion']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="<?= htmlspecialchars($servicioEditar['precio']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
<?php endif; ?>
