<?php
require_once 'models/ServiceModel.php';

class ServiceController {
    private $serviceModel;

    public function __construct() {
        $this->serviceModel = new ServiceModel();
    }

    public function index() {
        $this->list();
    }

    public function list() {
        requireLoginWithCache();
        $services = $this->serviceModel->getAllServices();
        require_once 'views/service/list.php';
    }

    public function create() {
        requireAdminWithCache();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => sanitize($_POST['nombre']),
                'descripcion' => sanitize($_POST['descripcion']),
                'reels' => !empty($_POST['reels']) ? (int)$_POST['reels'] : null,
                'post_feed' => !empty($_POST['post_feed']) ? (int)$_POST['post_feed'] : null,
                'historias' => !empty($_POST['historias']) ? (int)$_POST['historias'] : null,
                'grabaciones' => !empty($_POST['grabaciones']) ? sanitize($_POST['grabaciones']) : null,
                'estrategia_publicitaria' => !empty($_POST['estrategia_publicitaria']) ? sanitize($_POST['estrategia_publicitaria']) : null,
                'precio' => (float)$_POST['precio']
            ];

            if ($this->serviceModel->createService($data)) {
                setMessage('Servicio creado exitosamente');
                redirect('index.php?page=service&action=list');
            } else {
                setMessage('Error al crear el servicio', 'danger');
            }
        }
        
        require_once 'views/service/create.php';
    }

    public function edit() {
        requireAdminWithCache();
        
        $id = $_GET['id'] ?? null;
        if (!$id) {
            setMessage('ID de servicio no válido', 'danger');
            redirect('index.php?page=service&action=list');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => sanitize($_POST['nombre']),
                'descripcion' => sanitize($_POST['descripcion']),
                'reels' => !empty($_POST['reels']) ? (int)$_POST['reels'] : null,
                'post_feed' => !empty($_POST['post_feed']) ? (int)$_POST['post_feed'] : null,
                'historias' => !empty($_POST['historias']) ? (int)$_POST['historias'] : null,
                'grabaciones' => !empty($_POST['grabaciones']) ? sanitize($_POST['grabaciones']) : null,
                'estrategia_publicitaria' => !empty($_POST['estrategia_publicitaria']) ? sanitize($_POST['estrategia_publicitaria']) : null,
                'precio' => (float)$_POST['precio']
            ];

            if ($this->serviceModel->updateService($id, $data)) {
                setMessage('Servicio actualizado exitosamente');
                redirect('index.php?page=service&action=list');
            } else {
                setMessage('Error al actualizar el servicio', 'danger');
            }
        }
        
        $service = $this->serviceModel->getServiceById($id);
        if (!$service) {
            setMessage('Servicio no encontrado', 'danger');
            redirect('index.php?page=service&action=list');
        }
        
        require_once 'views/service/edit.php';
    }

    public function delete() {
        requireAdminWithCache();
        
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            if ($this->serviceModel->deleteService($id)) {
                setMessage('Servicio eliminado exitosamente');
            } else {
                setMessage('Error al eliminar el servicio', 'danger');
            }
        }
        
        redirect('index.php?page=service&action=list');
    }
}
?>
