<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-credit-card"></i> 
            <?= isAdmin() ? 'Todos los Pagos' : 'Mis Pagos' ?>
        </h2>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <?php if (isAdmin()): ?>
                            <th>Cliente</th>
                            <?php endif; ?>
                            <th>Cotización</th>
                            <th>Servicio</th>
                            <th>Monto</th>
                            <th>Método de Pago</th>
                            <th>Fecha de Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $payment): ?>
                        <tr>
                            <td><?= $payment['id'] ?></td>
                            <?php if (isAdmin()): ?>
                            <td><?= htmlspecialchars($payment['username']) ?></td>
                            <?php endif; ?>
                            <td><?= $payment['cotizacion_id'] ?></td>
                            <td><?= htmlspecialchars($payment['servicio_nombre']) ?></td>
                            <td>$<?= number_format($payment['monto'], 2) ?></td>
                            <td><?= htmlspecialchars($payment['metodo_pago']) ?></td>
                            <td><?= date('d/m/Y', strtotime($payment['fecha_pago'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
