<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-file-text"></i> Cotización #<?= $quote['id'] ?></h2>
                <div>
                    <a href="index.php?page=quote&action=list" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <?php if ($quote['estado'] === 'completada' && $_SESSION['role'] !== 'admin'): ?>
                        <a href="index.php?page=payment&action=process&quote_id=<?= $quote['id'] ?>" class="btn btn-success">
                            <i class="bi bi-credit-card"></i> Proceder al Pago
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Estado y Información General -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-info-circle"></i> Estado del Proyecto</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Estado Actual:</label>
                        <div>
                            <?php
                            $estados = [
                                'solicitada' => ['badge' => 'secondary', 'icon' => 'clock', 'text' => 'Solicitada'],
                                'en_revision' => ['badge' => 'info', 'icon' => 'eye', 'text' => 'En Revisión'],
                                'en_proceso' => ['badge' => 'warning', 'icon' => 'gear', 'text' => 'En Proceso'],
                                'completada' => ['badge' => 'success', 'icon' => 'check-circle', 'text' => 'Completada'],
                                'pagada' => ['badge' => 'primary', 'icon' => 'credit-card', 'text' => 'Pagada'],
                                'cancelada' => ['badge' => 'danger', 'icon' => 'x-circle', 'text' => 'Cancelada']
                            ];
                            $estado_info = $estados[$quote['estado']];
                            ?>
                            <span class="badge bg-<?= $estado_info['badge'] ?> fs-6">
                                <i class="bi bi-<?= $estado_info['icon'] ?>"></i> <?= $estado_info['text'] ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Servicio:</label>
                        <p class="mb-0"><?= htmlspecialchars($quote['servicio_nombre']) ?></p>
                        <small class="text-muted">$<?= number_format($quote['precio'], 2) ?></small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Fecha de Solicitud:</label>
                        <p class="mb-0"><?= date('d/m/Y H:i', strtotime($quote['fecha_solicitud'])) ?></p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Última Actualización:</label>
                        <p class="mb-0"><?= date('d/m/Y H:i', strtotime($quote['fecha_estado_actualizado'])) ?></p>
                    </div>

                    <?php if ($quote['notas_admin']): ?>
                    <div class="mb-3">
                        <label class="form-label">Notas del Equipo:</label>
                        <div class="alert alert-info">
                            <?= nl2br(htmlspecialchars($quote['notas_admin'])) ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($_SESSION['role'] === 'admin'): ?>
                    <hr>
                    <form method="POST" action="index.php?page=quote&action=updateStatus">
                        <input type="hidden" name="cotizacion_id" value="<?= $quote['id'] ?>">
                        <div class="mb-3">
                            <label for="nuevo_estado" class="form-label">Cambiar Estado:</label>
                            <select class="form-select" name="nuevo_estado" required>
                                <option value="solicitada" <?= $quote['estado'] === 'solicitada' ? 'selected' : '' ?>>Solicitada</option>
                                <option value="en_revision" <?= $quote['estado'] === 'en_revision' ? 'selected' : '' ?>>En Revisión</option>
                                <option value="en_proceso" <?= $quote['estado'] === 'en_proceso' ? 'selected' : '' ?>>En Proceso</option>
                                <option value="completada" <?= $quote['estado'] === 'completada' ? 'selected' : '' ?>>Completada</option>
                                <option value="cancelada" <?= $quote['estado'] === 'cancelada' ? 'selected' : '' ?>>Cancelada</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="notas_admin" class="form-label">Notas:</label>
                            <textarea class="form-control" name="notas_admin" rows="3"><?= htmlspecialchars($quote['notas_admin']) ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="bi bi-save"></i> Actualizar
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Información de la Empresa -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="bi bi-building"></i> Información de la Empresa</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Empresa:</label>
                            <p class="mb-0"><?= htmlspecialchars($quote['nombre_empresa']) ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono:</label>
                            <p class="mb-0"><?= htmlspecialchars($quote['telefono_empresa']) ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email:</label>
                            <p class="mb-0"><?= htmlspecialchars($quote['email_empresa']) ?></p>
                        </div>
                        <?php if ($quote['sitio_web']): ?>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sitio Web:</label>
                            <p class="mb-0"><a href="<?= htmlspecialchars($quote['sitio_web']) ?>" target="_blank"><?= htmlspecialchars($quote['sitio_web']) ?></a></p>
                        </div>
                        <?php endif; ?>
                        <?php if ($quote['direccion']): ?>
                        <div class="col-12 mb-3">
                            <label class="form-label">Dirección:</label>
                            <p class="mb-0"><?= htmlspecialchars($quote['direccion']) ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Información del Contacto -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="bi bi-person"></i> Contacto Principal</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre:</label>
                            <p class="mb-0"><?= htmlspecialchars($quote['nombre_contacto']) ?></p>
                        </div>
                        <?php if ($quote['cargo_contacto']): ?>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cargo:</label>
                            <p class="mb-0"><?= htmlspecialchars($quote['cargo_contacto']) ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono:</label>
                            <p class="mb-0"><?= htmlspecialchars($quote['telefono_contacto']) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detalles del Proyecto -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="bi bi-clipboard-check"></i> Detalles del Proyecto</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Objetivos:</label>
                        <p><?= nl2br(htmlspecialchars($quote['objetivos'])) ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Público Objetivo:</label>
                        <p><?= nl2br(htmlspecialchars($quote['publico_objetivo'])) ?></p>
                    </div>
                    <div class="row">
                        <?php if ($quote['presupuesto_estimado']): ?>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Presupuesto Estimado:</label>
                            <p class="mb-0">$<?= number_format($quote['presupuesto_estimado'], 2) ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if ($quote['fecha_inicio_deseada']): ?>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de Inicio Deseada:</label>
                            <p class="mb-0"><?= date('d/m/Y', strtotime($quote['fecha_inicio_deseada'])) ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($quote['redes_sociales_actuales']): ?>
                    <div class="mb-3">
                        <label class="form-label">Redes Sociales Actuales:</label>
                        <p><?= nl2br(htmlspecialchars($quote['redes_sociales_actuales'])) ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($quote['competencia']): ?>
                    <div class="mb-3">
                        <label class="form-label">Competencia:</label>
                        <p><?= nl2br(htmlspecialchars($quote['competencia'])) ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($quote['comentarios_adicionales']): ?>
                    <div class="mb-3">
                        <label class="form-label">Comentarios Adicionales:</label>
                        <p><?= nl2br(htmlspecialchars($quote['comentarios_adicionales'])) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Información del Servicio -->
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-star"></i> Servicio Contratado</h5>
                </div>
                <div class="card-body">
                    <h6><?= htmlspecialchars($quote['servicio_nombre']) ?></h6>
                    <p><?= htmlspecialchars($quote['servicio_descripcion']) ?></p>
                    
                    <div class="row">
                        <?php if ($quote['reels']): ?>
                        <div class="col-md-3 mb-2">
                            <span class="badge bg-info">Reels: <?= $quote['reels'] ?></span>
                        </div>
                        <?php endif; ?>
                        <?php if ($quote['post_feed']): ?>
                        <div class="col-md-3 mb-2">
                            <span class="badge bg-success">Posts: <?= $quote['post_feed'] ?></span>
                        </div>
                        <?php endif; ?>
                        <?php if ($quote['historias']): ?>
                        <div class="col-md-3 mb-2">
                            <span class="badge bg-warning">Historias: <?= $quote['historias'] ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($quote['grabaciones']): ?>
                    <p><strong>Grabaciones:</strong> <?= htmlspecialchars($quote['grabaciones']) ?></p>
                    <?php endif; ?>
                    
                    <?php if ($quote['estrategia_publicitaria']): ?>
                    <p><strong>Estrategia:</strong> <?= htmlspecialchars($quote['estrategia_publicitaria']) ?></p>
                    <?php endif; ?>
                    
                    <h5 class="text-primary">Precio: $<?= number_format($quote['precio'], 2) ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
