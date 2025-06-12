<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-list-ul"></i> Servicios</h2>
        <?php if (isAdmin()): ?>
        <a href="index.php?page=service&action=create" class="btn btn-primary">
            <i class="bi bi-plus"></i> Crear Servicio
        </a>
        <?php endif; ?>
    </div>

    <div class="row">
        <?php foreach ($services as $service): ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0"><?= htmlspecialchars($service['nombre']) ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= htmlspecialchars($service['descripcion']) ?></p>
                    
                    <div class="mb-3">
                        <?php if ($service['reels']): ?>
                        <span class="badge bg-info me-1">Reels: <?= $service['reels'] ?></span>
                        <?php endif; ?>
                        
                        <?php if ($service['post_feed']): ?>
                        <span class="badge bg-success me-1">Posts: <?= $service['post_feed'] ?></span>
                        <?php endif; ?>
                        
                        <?php if ($service['historias']): ?>
                        <span class="badge bg-warning me-1">Historias: <?= $service['historias'] ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($service['grabaciones']): ?>
                    <p><strong>Grabaciones:</strong> <?= htmlspecialchars($service['grabaciones']) ?></p>
                    <?php endif; ?>
                    
                    <?php if ($service['estrategia_publicitaria']): ?>
                    <p><strong>Estrategia:</strong> <?= htmlspecialchars($service['estrategia_publicitaria']) ?></p>
                    <?php endif; ?>
                    
                    <h4 class="text-primary">$<?= number_format($service['precio'], 2) ?></h4>
                </div>
                <div class="card-footer">
                    <?php if (isAdmin()): ?>
                    <div class="d-flex gap-2">
                        <a href="index.php?page=service&action=edit&id=<?= $service['id'] ?>" 
                           class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="index.php?page=service&action=delete&id=<?= $service['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('¿Estás seguro de eliminar este servicio?')">
                            <i class="bi bi-trash"></i> Eliminar
                        </a>
                    </div>
                    <?php else: ?>
                    <a href="index.php?page=quote&action=request" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle"></i> Solicitar Cotización
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once 'views/templates/footer.php'; ?>
