<?php
require_once 'auth.php';
checkAuth('admin');
require_once 'db.php';

$user_id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$user_id]);
header('Location: manage_users.php?success=Usuario eliminado');
?>