<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-file-text"></i>
            <?= isAdmin() ? 'Todas las Cotizaciones' : 'Mis Cotizaciones' ?>
        </h2>
        <?php if (!isAdmin()): ?>
            <a href="index.php?page=quote&action=request" class="btn btn-primary">
                <i class="bi bi-plus"></i> Nueva Cotización
            </a>
        <?php endif; ?>
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
                                <th>Empresa</th>
                            <?php endif; ?>
                            <th>Servicio</th>
                            <th>Precio</th>
                            <th>Fecha Solicitud</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($quotes as $quote): ?>
                            <tr>
                                <td><?= $quote['id'] ?></td>
                                <?php if (isAdmin()): ?>
                                    <td><?= htmlspecialchars($quote['username']) ?></td>
                                    <td><?= htmlspecialchars($quote['nombre_empresa']) ?></td>
                                <?php endif; ?>
                                <td><?= htmlspecialchars($quote['servicio_nombre']) ?></td>
                                <td>$<?= number_format($quote['precio'], 2) ?></td>
                                <td><?= date('d/m/Y', strtotime($quote['fecha_solicitud'])) ?></td>
                                <td>
                                    <?php
                                    $estados = [
                                        'solicitada' => ['badge' => 'secondary', 'text' => 'Solicitada'],
                                        'en_revision' => ['badge' => 'info', 'text' => 'En Revisión'],
                                        'en_proceso' => ['badge' => 'warning', 'text' => 'En Proceso'],
                                        'completada' => ['badge' => 'success', 'text' => 'Completada'],
                                        'pagada' => ['badge' => 'primary', 'text' => 'Pagada'],
                                        'cancelada' => ['badge' => 'danger', 'text' => 'Cancelada']
                                    ];
                                    $estado_info = $estados[$quote['estado']];
                                    ?>
                                    <span class="badge bg-<?= $estado_info['badge'] ?>">
                                        <?= $estado_info['text'] ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="index.php?page=quote&action=view&id=<?= $quote['id'] ?>"
                                            class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>

                                        <?php if (!isAdmin() && $quote['estado'] === 'completada'): ?>
                                            <a href="index.php?page=payment&action=process&quote_id=<?= $quote['id'] ?>"
                                                class="btn btn-success btn-sm">
                                                <i class="bi bi-credit-card"></i> Pagar
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!isAdmin() && in_array($quote['estado'], ['solicitada', 'en_revision'])): ?>
                                            <a href="index.php?page=quote&action=deleteOwn&id=<?= $quote['id'] ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Estás seguro de eliminar esta cotización?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (isAdmin()): ?>
                                            <a href="index.php?page=quote&action=delete&id=<?= $quote['id'] ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Estás seguro de eliminar esta cotización? Esta acción también eliminará los pagos relacionados.')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
