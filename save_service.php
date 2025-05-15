<?php
session_start();
require 'db.php';

if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$stmt = $pdo->prepare("INSERT INTO services (name, description, price) VALUES (?, ?, ?)");
$stmt->execute([$name, $description, $price]);

header('Location: dashboard_admin.php');
exit();
