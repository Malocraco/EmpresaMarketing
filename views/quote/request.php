<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4><i class="bi bi-plus-circle"></i> Solicitar Cotización Detallada</h4>
                    <p class="mb-0 text-light">Completa este formulario para que podamos entender mejor tus necesidades y crear una propuesta personalizada.</p>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <!-- Selección de Servicio -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3"><i class="bi bi-star"></i> Servicio Solicitado</h5>
                                <div class="mb-3">
                                    <label for="servicio_id" class="form-label">Seleccionar Servicio *</label>
                                    <select class="form-select" id="servicio_id" name="servicio_id" required>
                                        <option value="">Selecciona un servicio...</option>
                                        <?php foreach ($services as $service): ?>
                                        <option value="<?= $service['id'] ?>" <?= $preselected_service == $service['id'] ? 'selected' : '' ?>>
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
                            </div>
                        </div>

                        <!-- Información de la Empresa -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3"><i class="bi bi-building"></i> Información de tu Empresa</h5>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nombre_empresa" class="form-label">Nombre de la Empresa *</label>
                                <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telefono_empresa" class="form-label">Teléfono de la Empresa *</label>
                                <input type="tel" class="form-control" id="telefono_empresa" name="telefono_empresa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email_empresa" class="form-label">Email de la Empresa *</label>
                                <input type="email" class="form-control" id="email_empresa" name="email_empresa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sitio_web" class="form-label">Sitio Web (opcional)</label>
                                <input type="url" class="form-control" id="sitio_web" name="sitio_web" placeholder="https://www.ejemplo.com">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="direccion" class="form-label">Dirección (opcional)</label>
                                <textarea class="form-control" id="direccion" name="direccion" rows="2"></textarea>
                            </div>
                        </div>

                        <!-- Información del Contacto -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3"><i class="bi bi-person"></i> Contacto Principal</h5>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nombre_contacto" class="form-label">Nombre Completo *</label>
                                <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cargo_contacto" class="form-label">Cargo/Posición (opcional)</label>
                                <input type="text" class="form-control" id="cargo_contacto" name="cargo_contacto">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telefono_contacto" class="form-label">Teléfono de Contacto *</label>
                                <input type="tel" class="form-control" id="telefono_contacto" name="telefono_contacto" required>
                            </div>
                        </div>

                        <!-- Detalles del Proyecto -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3"><i class="bi bi-clipboard-check"></i> Detalles del Proyecto</h5>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="objetivos" class="form-label">¿Cuáles son tus objetivos principales? *</label>
                                <textarea class="form-control" id="objetivos" name="objetivos" rows="3" 
                                          placeholder="Ej: Aumentar ventas, mejorar presencia en redes sociales, generar más leads..." required></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="publico_objetivo" class="form-label">¿Cuál es tu público objetivo? *</label>
                                <textarea class="form-control" id="publico_objetivo" name="publico_objetivo" rows="3" 
                                          placeholder="Ej: Mujeres de 25-40 años interesadas en moda, empresarios locales, jóvenes universitarios..." required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="presupuesto_estimado" class="form-label">Presupuesto Estimado (opcional)</label>
                                <input type="number" step="0.01" class="form-control" id="presupuesto_estimado" name="presupuesto_estimado" 
                                       placeholder="Ej: 500000">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fecha_inicio_deseada" class="form-label">Fecha de Inicio Deseada (opcional)</label>
                                <input type="date" class="form-control" id="fecha_inicio_deseada" name="fecha_inicio_deseada">
                            </div>
                        </div>

                        <!-- Información Adicional -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3"><i class="bi bi-info-circle"></i> Información Adicional</h5>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="redes_sociales_actuales" class="form-label">Redes Sociales Actuales (opcional)</label>
                                <textarea class="form-control" id="redes_sociales_actuales" name="redes_sociales_actuales" rows="2" 
                                          placeholder="Ej: Instagram @miempresa, Facebook: Mi Empresa, TikTok @miempresa..."></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="competencia" class="form-label">Principales Competidores (opcional)</label>
                                <textarea class="form-control" id="competencia" name="competencia" rows="2" 
                                          placeholder="Ej: Empresa A, Empresa B, @competidor_instagram..."></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="comentarios_adicionales" class="form-label">Comentarios Adicionales (opcional)</label>
                                <textarea class="form-control" id="comentarios_adicionales" name="comentarios_adicionales" rows="3" 
                                          placeholder="Cualquier información adicional que consideres importante..."></textarea>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <i class="bi bi-info-circle"></i> 
                                    <strong>Proceso:</strong> Una vez enviada tu solicitud, nuestro equipo la revisará y se pondrá en contacto contigo. 
                                    Trabajaremos en tu proyecto y cuando esté completado, podrás revisarlo y realizar el pago.
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="index.php?page=service&action=list" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Volver
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-send"></i> Enviar Solicitud
                                    </button>
                                </div>
                            </div>
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

// Validación de fecha mínima (hoy)
document.getElementById('fecha_inicio_deseada').min = new Date().toISOString().split('T')[0];
</script>

<?php require_once 'views/templates/footer.php'; ?>