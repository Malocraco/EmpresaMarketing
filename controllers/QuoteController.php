<?php
require_once 'models/QuoteModel.php';
require_once 'models/ServiceModel.php';

class QuoteController {
    private $quoteModel;
    private $serviceModel;

    public function __construct() {
        $this->quoteModel = new QuoteModel();
        $this->serviceModel = new ServiceModel();
    }

    public function index() {
        $this->list();
    }

    public function request() {
        requireLoginWithCache();
        
        if ($_SESSION['role'] === 'admin') {
            setMessage('Los administradores no pueden solicitar cotizaciones', 'warning');
            redirect('index.php?page=user&action=dashboard');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio_id = (int)$_POST['servicio_id'];
        
            if ($this->quoteModel->createQuote($_SESSION['user_id'], $servicio_id)) {
                setMessage('Cotización solicitada exitosamente');
                redirect('index.php?page=quote&action=list');
            } else {
                setMessage('Error al solicitar la cotización', 'danger');
            }
        }
        
        $services = $this->serviceModel->getAllServices();
        $preselected_service = $_GET['service_id'] ?? null;
        require_once 'views/quote/request.php';
    }

    public function list() {
        requireLoginWithCache();
        
        if ($_SESSION['role'] === 'admin') {
            $quotes = $this->quoteModel->getAllQuotes();
        } else {
            $quotes = $this->quoteModel->getQuotesByUser($_SESSION['user_id']);
        }
        
        require_once 'views/quote/list.php';
    }

    public function delete() {
        requireAdminWithCache();
        
        $id = $_GET['id'] ?? null;
        if (!$id) {
            setMessage('ID de cotización no válido', 'danger');
            redirect('index.php?page=quote&action=list');
        }
        
        if ($this->quoteModel->deleteQuote($id)) {
            setMessage('Cotización eliminada exitosamente');
        } else {
            setMessage('Error al eliminar la cotización', 'danger');
        }
        
        redirect('index.php?page=quote&action=list');
    }

    public function deleteOwn() {
        requireLoginWithCache();
        
        // Solo permitir a clientes (no admins)
        if ($_SESSION['role'] === 'admin') {
            setMessage('Los administradores no pueden usar esta función', 'warning');
            redirect('index.php?page=quote&action=list');
        }
        
        $id = $_GET['id'] ?? null;
        if (!$id) {
            setMessage('ID de cotización no válido', 'danger');
            redirect('index.php?page=quote&action=list');
        }
        
        // Verificar que la cotización pertenece al usuario actual
        $quote = $this->quoteModel->getQuoteById($id);
        if (!$quote || $quote['usuario_id'] != $_SESSION['user_id']) {
            setMessage('No tienes permisos para eliminar esta cotización', 'danger');
            redirect('index.php?page=quote&action=list');
        }
        
        // No permitir eliminar cotizaciones ya pagadas
        if ($quote['estado'] === 'pagada') {
            setMessage('No puedes eliminar una cotización que ya ha sido pagada', 'warning');
            redirect('index.php?page=quote&action=list');
        }
        
        if ($this->quoteModel->deleteQuote($id)) {
            setMessage('Cotización eliminada exitosamente');
        } else {
            setMessage('Error al eliminar la cotización', 'danger');
        }
        
        redirect('index.php?page=quote&action=list');
    }
}
?>
