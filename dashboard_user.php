<?php
require_once 'header.php';
checkAuth('cliente');
require_once 'db.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT c.*, s.nombre, s.precio FROM cotizaciones c JOIN services s ON c.servicio_id = s.id WHERE c.usuario_id = ?");
$stmt->execute([$user_id]);
$quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <h1 class="h2">Dashboard Cliente</h1>
    <h3>Bienvenido, <?php echo htmlspecialchars($user['username']); ?></h3>
    <p>Rol: <?php echo htmlspecialchars($user['role']); ?></p>
    <h4>Historial de Cotizaciones</h4>
    <?php if (isset($_GET['error'])) echo "<p class='text-danger'>" . htmlspecialchars($_GET['error']) . "</p>"; ?>
    <?php if (isset($_GET['success'])) echo "<p class='text-success'>" . htmlspecialchars($_GET['success']) . "</p>"; ?>
    <table class="table">
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Fecha Solicitud</th>
                <th>Estado</th>
                <th>Monto</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quotes as $quote): ?>
                <tr>
                    <td><?php echo htmlspecialchars($quote['nombre']); ?></td>
                    <td><?php echo $quote['fecha_solicitud']; ?></td>
                    <td><?php echo htmlspecialchars($quote['estado']); ?></td>
                    <td>$<?php echo number_format($quote['precio'], 2); ?></td>
                    <td>
                        <?php if ($quote['estado'] === 'pendiente'): ?>
                            <form action="process_payment.php" method="POST" class="d-inline">
                                <input type="hidden" name="cotizacion_id" value="<?php echo $quote['id']; ?>">
                                <input type="hidden" name="monto" value="<?php echo $quote['precio']; ?>">
                                <select name="metodo_pago" required>
                                    <option value="">Selecciona método</option>
                                    <option value="tarjeta">Tarjeta</option>
                                    <option value="transferencia">Transferencia</option>
                                    <option value="efectivo">Efectivo</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Pagar</button>
                            </form>
                        <?php else: ?>
                            Pagado
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php include 'footer.php'; ?>