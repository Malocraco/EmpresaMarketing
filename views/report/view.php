<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><?= htmlspecialchars($report['titulo']) ?></h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        <small>
                            <i class="bi bi-person"></i> <?= htmlspecialchars($report['admin_name']) ?> | 
                            <i class="bi bi-calendar"></i> <?= date('d/m/Y H:i', strtotime($report['fecha_creacion'])) ?>
                        </small>
                    </p>
                    <hr>
                    <div>
                        <?= nl2br(htmlspecialchars($report['descripcion'])) ?>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="index.php?page=report&action=list" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver a la Lista
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/templates/footer.php'; ?>