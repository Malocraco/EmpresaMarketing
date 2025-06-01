<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="bi bi-credit-card"></i> Procesar Pago</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Detalles de la Cotización</h5>
                            <div class="card bg-light">
                                <div class="card-body">
                                    <p><strong>Servicio:</strong> <?= htmlspecialchars($quote['servicio_nombre']) ?></p>
                                    <p><strong>Precio:</strong> $<?= number_format($quote['precio'], 2) ?></p>
                                    <p><strong>Fecha Solicitud:</strong> <?= date('d/m/Y', strtotime($quote['fecha_solicitud'])) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Información de Pago</h5>
                            <form method="POST">
                                <input type="hidden" name="cotizacion_id" value="<?= $quote['id'] ?>">
                                <input type="hidden" name="monto" value="<?= $quote['precio'] ?>">
                                
                                <div class="mb-3">
                                    <label for="metodo_pago" class="form-label">Método de Pago</label>
                                    <select class="form-select" id="metodo_pago" name="metodo_pago" required>
                                        <option value="">Seleccione un método...</option>
                                        <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                                        <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                                        <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                                        <option value="PayPal">PayPal</option>
                                    </select>
                                </div>
                                
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-check-circle"></i> Confirmar Pago
                                    </button>
                                    <a href="index.php?page=quote&action=list" class="btn btn-secondary">
                                        <i class="bi bi-x-circle"></i> Cancelar
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
