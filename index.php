<?php
require 'db.php'; // Conexión a la base de datos
include("header.php");
?>

<h2 class="text-center mb-4"><B>PLANES</B></h2>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    // Consultar todos los servicios registrados
    $stmt = $pdo->query("SELECT * FROM servicios ORDER BY id DESC");

    if ($stmt->rowCount() > 0) {
        while ($servicio = $stmt->fetch()) {
            ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($servicio['nombre']) ?></h5>
                        <p class="card-text"><?= nl2br(htmlspecialchars($servicio['descripcion'])) ?></p>
                        <p><strong>Precio:</strong> $<?= number_format($servicio['precio'], 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        // Si no hay servicios registrados
        echo "<div class='col'><p class='text-muted'>No hay servicios registrados aún.</p></div>";
    }
    ?>
</div>

<?php include("footer.php"); ?>
