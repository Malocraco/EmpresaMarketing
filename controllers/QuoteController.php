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
        requireLogin();
        
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
        requireLogin();
        
        if ($_SESSION['role'] === 'admin') {
            $quotes = $this->quoteModel->getAllQuotes();
        } else {
            $quotes = $this->quoteModel->getQuotesByUser($_SESSION['user_id']);
        }
        
        require_once 'views/quote/list.php';
    }
}
?>
