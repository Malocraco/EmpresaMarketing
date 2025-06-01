<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">
                <i class="bi bi-speedometer2"></i> Dashboard
                <small class="text-muted">- Bienvenido, <?= htmlspecialchars($_SESSION['username']) ?></small>
            </h1>
        </div>
    </div>

    <?php if (isAdmin()): ?>
    <!-- Admin Dashboard -->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5>Servicios</h5>
                            <p class="card-text">Gestionar servicios</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-list-ul fs-1"></i>
                        </div>
                    </div>
                    <a href="index.php?page=service&action=list" class="btn btn-light btn-sm">Ver Servicios</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5>Usuarios</h5>
                            <p class="card-text">Gestionar usuarios</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-people fs-1"></i>
                        </div>
                    </div>
                    <a href="index.php?page=user&action=list" class="btn btn-light btn-sm">Ver Usuarios</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5>Cotizaciones</h5>
                            <p class="card-text">Ver todas las cotizaciones</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-file-text fs-1"></i>
                        </div>
                    </div>
                    <a href="index.php?page=quote&action=list" class="btn btn-light btn-sm">Ver Cotizaciones</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5>Reportes</h5>
                            <p class="card-text">Crear y ver reportes</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-graph-up fs-1"></i>
                        </div>
                    </div>
                    <a href="index.php?page=report&action=list" class="btn btn-light btn-sm">Ver Reportes</a>
                </div>
            </div>
        </div>
    </div>
    
    <?php else: ?>
    <!-- Client Dashboard -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5>Servicios</h5>
                            <p class="card-text">Ver servicios disponibles</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-list-ul fs-1"></i>
                        </div>
                    </div>
                    <a href="index.php?page=service&action=list" class="btn btn-light btn-sm">Ver Servicios</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5>Solicitar Cotización</h5>
                            <p class="card-text">Solicita una nueva cotización</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-plus-circle fs-1"></i>
                        </div>
                    </div>
                    <a href="index.php?page=quote&action=request" class="btn btn-light btn-sm">Solicitar</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5>Mis Cotizaciones</h5>
                            <p class="card-text">Ver mis cotizaciones</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-file-text fs-1"></i>
                        </div>
                    </div>
                    <a href="index.php?page=quote&action=list" class="btn btn-light btn-sm">Ver Cotizaciones</a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php require_once 'views/templates/footer.php'; ?>
