<?php
class UnauthorizedController {
    public function index() {
        require_once 'views/templates/header.php';
        ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert alert-danger text-center">
                        <h4>Acceso No Autorizado</h4>
                        <p>No tienes permisos para acceder a esta página.</p>
                        <a href="index.php" class="btn btn-primary">Volver al Inicio</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once 'views/templates/footer.php';
    }
}
?>
