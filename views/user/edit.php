<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4><i class="bi bi-pencil"></i> Editar Usuario</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?= htmlspecialchars($user['username']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo"
                                value="<?= htmlspecialchars($user['correo']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rol</label>
                            <input type="text" class="form-control"
                                value="<?= ucfirst($user['role']) ?>" readonly>
                            <small class="form-text text-muted">El rol no se puede modificar desde aquí.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha de Registro</label>
                            <input type="text" class="form-control"
                                value="<?= date('d/m/Y H:i', strtotime($user['created_at'])) ?>" readonly>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="index.php?page=user&action=list" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/templates/footer.php'; ?>