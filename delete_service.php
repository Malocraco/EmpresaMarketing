<?php
require_once 'auth.php';
checkAuth('admin');
require_once 'db.php';

$service_id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
$stmt->execute([$service_id]);
header('Location: view_services.php?success=Servicio eliminado');
?>