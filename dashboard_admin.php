<?php
require_once 'header.php';
checkAuth('admin');
require_once 'db.php';

$users = $pdo->query("SELECT COUNT(*) as count FROM users")->fetch(PDO::FETCH_ASSOC)['count'];
$services = $pdo->query("SELECT COUNT(*) as count FROM services")->fetch(PDO::FETCH_ASSOC)['count'];
$quotes = $pdo->query("SELECT COUNT(*) as count FROM cotizaciones")->fetch(PDO::FETCH_ASSOC)['count'];
?>
    <h1 class="h2">Dashboard Administrador</h1>
    <div class="row my-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuarios Registrados</h5>
                    <p class="card-text"><?php echo $users; ?></p>
                    <a href="manage_users.php" class="btn btn-primary">Gestionar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Servicios</h5>
                    <p class="card-text"><?php echo $services; ?></p>
                    <a href="view_services.php" class="btn btn-primary">Ver Servicios</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cotizaciones</h5>
                    <p class="card-text"><?php echo $quotes; ?></p>
                    <a href="reportes.php" class="btn btn-primary">Ver Reportes</a>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>