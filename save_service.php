<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'utils.php';
require_once 'auth.php';
checkAuth('admin');
require_once 'db.php';

debug_log("Script started at " . date('Y-m-d H:i:s'));

echo "<pre>Script reached at " . date('Y-m-d H:i:s') . "</pre>"; // Temporary screen output

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    debug_log("Form submitted with POST method");
    debug_log("Full POST data: " . print_r($_POST, true));

    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $reels = isset($_POST['reels']) && $_POST['reels'] !== '' ? (int)$_POST['reels'] : null;
    $post_feed = isset($_POST['post_feed']) && $_POST['post_feed'] !== '' ? (int)$_POST['post_feed'] : null;
    $historias = isset($_POST['historias']) && $_POST['historias'] !== '' ? (int)$_POST['historias'] : null;
    $grabaciones = $_POST['grabaciones'] ?? null;
    $estrategia_publicitaria = $_POST['estrategia_publicitaria'] ?? null;
    $precio = isset($_POST['precio']) && $_POST['precio'] !== '' ? (float)$_POST['precio'] : 0;
    $debug_token = $_POST['debug_token'] ?? 'no_token';

    debug_log("Processed data: nombre=$nombre, descripcion=$descripcion, reels=" . ($reels ?? 'null') . ", post_feed=" . ($post_feed ?? 'null') . ", historias=" . ($historias ?? 'null') . ", grabaciones=$grabaciones, estrategia_publicitaria=$estrategia_publicitaria, precio=$precio, debug_token=$debug_token");

    if (empty($nombre) || empty($descripcion) || $precio <= 0) {
        debug_log("Validation failed: Required fields empty or invalid price");
        header('Location: register_service.php?error=Campos requeridos vacíos o precio inválido');
        exit();
    }

    try {
        debug_log("Attempting database insert with values: ($nombre, $descripcion, $reels, $post_feed, $historias, $grabaciones, $estrategia_publicitaria, $precio)");
        $stmt = $pdo->prepare("INSERT INTO services (nombre, descripcion, reels, post_feed, historias, grabaciones, estrategia_publicitaria, precio) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([$nombre, $descripcion, $reels, $post_feed, $historias, $grabaciones, $estrategia_publicitaria, $precio]);
        debug_log("Database query executed, result: " . ($result ? "success" : "failure") . ", rows affected: " . $pdo->lastInsertId());
        if ($result) {
            debug_log("Redirecting to register_service.php with success");
            header('Location: register_service.php?success=1');
        } else {
            debug_log("Insert failed, no rows affected");
            header('Location: register_service.php?error=Error al guardar el servicio');
        }
    } catch (PDOException $e) {
        debug_log("Database error: " . $e->getMessage());
        header('Location: register_service.php?error=' . urlencode($e->getMessage()));
    }
} else {
    debug_log("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
    header('Location: register_service.php?error=Método no permitido');
}
?>