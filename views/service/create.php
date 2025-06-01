<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="bi bi-plus"></i> Crear Nuevo Servicio</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombre del Servicio</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="reels" class="form-label">Cantidad de Reels</label>
                                <input type="number" class="form-control" id="reels" name="reels">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="post_feed" class="form-label">Posts para Feed</label>
                                <input type="number" class="form-control" id="post_feed" name="post_feed">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="historias" class="form-label">Historias</label>
                                <input type="number" class="form-control" id="historias" name="historias">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="grabaciones" class="form-label">Grabaciones</label>
                                <input type="text" class="form-control" id="grabaciones" name="grabaciones">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="estrategia_publicitaria" class="form-label">Estrategia Publicitaria</label>
                                <input type="text" class="form-control" id="estrategia_publicitaria" name="estrategia_publicitaria">
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="index.php?page=service&action=list" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Crear Servicio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
