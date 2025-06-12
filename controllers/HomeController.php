<?php
require_once 'models/ServiceModel.php';

class HomeController {
    private $serviceModel;

    public function __construct() {
        $this->serviceModel = new ServiceModel();
    }

    public function index() {
        $services = $this->serviceModel->getAllServices();
        require_once 'views/home/index.php';
    }

    public function requestQuote() {
        if (!isLoggedIn()) {
            // Si no está logueado, redirigir a registro con el servicio seleccionado
            $service_id = $_GET['service_id'] ?? null;
            if ($service_id) {
                $_SESSION['intended_service'] = $service_id;
                setMessage('Para solicitar una cotización, primero debes registrarte o iniciar sesión', 'info');
                redirect('index.php?page=user&action=register');
            } else {
                redirect('index.php?page=user&action=register');
            }
        } else {
            // Si está logueado, redirigir a solicitar cotización
            $service_id = $_GET['service_id'] ?? null;
            if ($service_id) {
                redirect('index.php?page=quote&action=request&service_id=' . $service_id);
            } else {
                redirect('index.php?page=quote&action=request');
            }
        }
    }
}
?>