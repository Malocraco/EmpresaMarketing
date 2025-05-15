<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = [];
session_unset();
session_destroy();

// Evitar uso del botón atrás
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");

// Redirigir al login
header("Location: login.php");
exit();

?>
