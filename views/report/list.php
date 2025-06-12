<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-graph-up"></i> Reportes</h2>
        <a href="index.php?page=report&action=create" class="btn btn-primary">
            <i class="bi bi-plus"></i> Crear Reporte
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Administrador</th>
                            <th>Fecha de Creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reports as $report): ?>
                        <tr>
                            <td><?= $report['id'] ?></td>
                            <td><?= htmlspecialchars($report['titulo']) ?></td>
                            <td><?= htmlspecialchars($report['admin_name']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($report['fecha_creacion'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/templates/footer.php'; ?>