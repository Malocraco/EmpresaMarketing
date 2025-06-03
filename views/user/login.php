<?php 
// Prevenir caché en la página de login también
preventCaching();
require_once 'views/templates/header.php'; 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3><i class="bi bi-megaphone"></i> Marketing Valentina</h3>
                    <p class="mb-0">Iniciar Sesión</p>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">¿No tienes cuenta? 
                        <a href="index.php?page=user&action=register">Regístrate aquí</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Limpiar el historial del navegador después del login exitoso
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

<?php require_once 'views/templates/footer.php'; ?>
