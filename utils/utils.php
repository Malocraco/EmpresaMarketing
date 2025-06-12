<?php
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: index.php?page=user&action=login');
        exit();
    }
}

function requireAdmin() {
    if (!isAdmin()) {
        header('Location: unauthorized.php');
        exit();
    }
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function setMessage($message, $type = 'success') {
    $_SESSION['message'] = $message;
    $_SESSION['message_type'] = $type;
}

function getMessage() {
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        $type = $_SESSION['message_type'] ?? 'success';
        unset($_SESSION['message'], $_SESSION['message_type']);
        return ['message' => $message, 'type' => $type];
    }
    return null;
}

function preventCaching() {
    // Prevenir caché del navegador para páginas protegidas
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
}

function requireLoginWithCache() {
    preventCaching();
    if (!isLoggedIn()) {
        header('Location: index.php?page=user&action=login');
        exit();
    }
}

function requireAdminWithCache() {
    preventCaching();
    if (!isAdmin()) {
        header('Location: unauthorized.php');
        exit();
    }
}
?>