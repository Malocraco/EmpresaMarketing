<?php
require_once 'header.php';
checkAuth('admin');
?>
    <h1 class="h2">Registrar Servicio</h1>
    <form action="save_service.php" method="POST" class="col-md-6">
        <input type="hidden" name="debug_token" value="web_submission_<?php echo time(); ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="mb-3">
            <label for="reels" class="form-label">Reels</label>
            <input type="number" class="form-control" id="reels" name="reels">
        </div>
        <div class="mb-3">
            <label for="post_feed" class="form-label">Post Feed</label>
            <input type="number" class="form-control" id="post_feed" name="post_feed">
        </div>
        <div class="mb-3">
            <label for="historias" class="form-label">Historias</label>
            <input type="number" class="form-control" id="historias" name="historias">
        </div>
        <div class="mb-3">
            <label for="grabaciones" class="form-label">Grabaciones</label>
            <input type="text" class="form-control" id="grabaciones" name="grabaciones">
        </div>
        <div class="mb-3">
            <label for="estrategia_publicitaria" class="form-label">Estrategia Publicitaria</label>
            <input type="text" class="form-control" id="estrategia_publicitaria" name="estrategia_publicitaria">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
    <?php if (isset($_GET['error'])) echo "<p class='text-danger'>Error: " . htmlspecialchars($_GET['error']) . "</p>"; ?>
    <?php if (isset($_GET['success'])) echo "<p class='text-success'>Servicio registrado</p>"; ?>
<?php include 'footer.php'; ?>