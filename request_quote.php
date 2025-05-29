<?php
require_once 'header.php';
checkAuth('cliente');
require_once 'db.php';

if (isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];
    $user_id = $_SESSION['user_id'];

    try {
        $stmt = $pdo->prepare("INSERT INTO cotizaciones (usuario_id, servicio_id, fecha_solicitud, estado) VALUES (?, ?, NOW(), 'pendiente')");
        $stmt->execute([$user_id, $service_id]);
        header('Location: dashboard_user.php?success=Cotización solicitada');
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
} else {
    header('Location: index.php?error=Servicio no especificado');
}
?>