<?php
require_once 'utils.php';

function checkAuth($required_role = null) {
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
        debug_log("No session or role, redirecting to login");
        header('Location: login.php');
        exit();
    }
    if ($required_role && $_SESSION['role'] !== $required_role) {
        debug_log("Role mismatch, redirecting to unauthorized: required=$required_role, actual=" . $_SESSION['role']);
        header('Location: unauthorized.php');
        exit();
    }
    debug_log("Auth check passed for role: " . $_SESSION['role']);
}
?>