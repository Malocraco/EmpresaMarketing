<?php
require_once 'auth.php';
checkAuth('cliente');
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cotizacion_id = $_POST['cotizacion_id'] ?? 0;
    $monto = $_POST['monto'] ?? 0;
    $metodo_pago = $_POST['metodo_pago'] ?? '';
    $user_id = $_SESSION['user_id'];

    if ($cotizacion_id <= 0 || $monto <= 0 || empty($metodo_pago)) {
        header('Location: dashboard_user.php?error=Datos de pago inválidos');
        exit();
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO pagos (usuario_id, cotizacion_id, monto, metodo_pago, fecha_pago) VALUES (?, ?, ?, ?, CURDATE())");
        $stmt->execute([$user_id, $cotizacion_id, $monto, $metodo_pago]);
        $stmt = $pdo->prepare("UPDATE cotizaciones SET estado = 'pagada' WHERE id = ?");
        $stmt->execute([$cotizacion_id]);
        header('Location: dashboard_user.php?success=Pago registrado');
    } catch (PDOException $e) {
        header('Location: dashboard_user.php?error=Error al procesar pago: ' . urlencode($e->getMessage()));
    }
} else {
    header('Location: dashboard_user.php?error=Método no permitido');
}
?>