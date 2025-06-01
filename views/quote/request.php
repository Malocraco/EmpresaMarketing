<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="bi bi-plus-circle"></i> Solicitar Cotización</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="servicio_id" class="form-label">Seleccionar Servicio</label>
                            <select class="form-select" id="servicio_id" name="servicio_id" required>
                                <option value="">Selecciona un servicio...</option>
                                <?php foreach ($services as $service): ?>
                                <option value="<?= $service['id'] ?>">
                                    <?= htmlspecialchars($service['nombre']) ?> - $<?= number_format($service['precio'], 2) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div id="service-details" class="mb-3" style="display: none;">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6>Detalles del Servicio:</h6>
                                    <div id="service-info"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="index.php?page=service&action=list" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Solicitar Cotización</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Preseleccionar servicio si viene de la página principal
<?php if ($preselected_service): ?>
document.addEventListener('DOMContentLoaded', function() {
    const serviceSelect = document.getElementById('servicio_id');
    serviceSelect.value = '<?= $preselected_service ?>';
    serviceSelect.dispatchEvent(new Event('change'));
});
<?php endif; ?>

document.getElementById('servicio_id').addEventListener('change', function() {
    const serviceId = this.value;
    const serviceDetails = document.getElementById('service-details');
    const serviceInfo = document.getElementById('service-info');
    
    if (serviceId) {
        // Find service details
        const services = <?= json_encode($services) ?>;
        const selectedService = services.find(s => s.id == serviceId);
        
        if (selectedService) {
            let html = `
                <p><strong>Descripción:</strong> ${selectedService.descripcion}</p>
                <p><strong>Precio:</strong> $${parseFloat(selectedService.precio).toFixed(2)}</p>
            `;
            
            if (selectedService.reels) html += `<p><strong>Reels:</strong> ${selectedService.reels}</p>`;
            if (selectedService.post_feed) html += `<p><strong>Posts Feed:</strong> ${selectedService.post_feed}</p>`;
            if (selectedService.historias) html += `<p><strong>Historias:</strong> ${selectedService.historias}</p>`;
            if (selectedService.grabaciones) html += `<p><strong>Grabaciones:</strong> ${selectedService.grabaciones}</p>`;
            if (selectedService.estrategia_publicitaria) html += `<p><strong>Estrategia:</strong> ${selectedService.estrategia_publicitaria}</p>`;
            
            serviceInfo.innerHTML = html;
            serviceDetails.style.display = 'block';
        }
    } else {
        serviceDetails.style.display = 'none';
    }
});
</script>

<?php require_once 'views/templates/footer.php'; ?>
