<?php
session_start();

// Prevent caching with robust headers
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");

// Validate session
if (!isset($_SESSION['user_id'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Validate role if required
if (isset($requiredRole) && $_SESSION['role'] !== $requiredRole) {
    header("Location: unauthorized.php");
    exit();
}
?>