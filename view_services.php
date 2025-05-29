<?php
require_once 'header.php';
checkAuth('admin');
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM services");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $reels = $_POST['reels'] ?? null;
    $post_feed = $_POST['post_feed'] ?? null;
    $historias = $_POST['historias'] ?? null;
    $grabaciones = $_POST['grabaciones'] ?? null;
    $estrategia_publicitaria = $_POST['estrategia_publicitaria'] ?? null;
    $precio = $_POST['precio'];

    $stmt = $pdo->prepare("UPDATE services SET nombre = ?, descripcion = ?, reels = ?, post_feed = ?, historias = ?, grabaciones = ?, estrategia_publicitaria = ?, precio = ? WHERE id = ?");
    $stmt->execute([$nombre, $descripcion, $reels, $post_feed, $historias, $grabaciones, $estrategia_publicitaria, $precio, $id]);
    header('Location: view_services.php?success=Servicio actualizado');
}
?>
    <h1 class="h2">Servicios Registrados</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <form action="view_services.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $service['id']; ?>">
                        <td><input type="text" name="nombre" value="<?php echo htmlspecialchars($service['nombre']); ?>" class="form-control"></td>
                        <td><textarea name="descripcion" class="form-control"><?php echo htmlspecialchars($service['descripcion']); ?></textarea></td>
                        <td><input type="number" step="0.01" name="precio" value="<?php echo $service['precio']; ?>" class="form-control"></td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                            <a href="delete_service.php?id=<?php echo $service['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este servicio?')">Eliminar</a>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php include 'footer.php'; ?>