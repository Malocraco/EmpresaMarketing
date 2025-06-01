<?php
require_once 'models/PaymentModel.php';
require_once 'models/QuoteModel.php';

class PaymentController {
    private $paymentModel;
    private $quoteModel;

    public function __construct() {
        $this->paymentModel = new PaymentModel();
        $this->quoteModel = new QuoteModel();
    }

    public function index() {
        $this->list();
    }

    public function process() {
        requireLogin();
        
        if ($_SESSION['role'] === 'admin') {
            setMessage('Los administradores no pueden procesar pagos', 'warning');
            redirect('index.php?page=user&action=dashboard');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cotizacion_id = (int)$_POST['cotizacion_id'];
            $monto = (float)$_POST['monto'];
            $metodo_pago = sanitize($_POST['metodo_pago']);
            
            // Verificar que la cotización pertenece al usuario
            $quote = $this->quoteModel->getQuoteById($cotizacion_id);
            if (!$quote || $quote['usuario_id'] != $_SESSION['user_id']) {
                setMessage('Cotización no válida', 'danger');
                redirect('index.php?page=quote&action=list');
            }
            
            if ($this->paymentModel->processPayment($_SESSION['user_id'], $cotizacion_id, $monto, $metodo_pago)) {
                // Actualizar estado de la cotización
                $this->quoteModel->updateQuoteStatus($cotizacion_id, 'pagada');
                setMessage('Pago procesado exitosamente');
                redirect('index.php?page=quote&action=list');
            } else {
                setMessage('Error al procesar el pago', 'danger');
            }
        }
        
        // Obtener cotización para mostrar detalles
        if (isset($_GET['quote_id'])) {
            $quote_id = (int)$_GET['quote_id'];
            $quote = $this->quoteModel->getQuoteById($quote_id);
            
            if (!$quote || $quote['usuario_id'] != $_SESSION['user_id']) {
                setMessage('Cotización no válida', 'danger');
                redirect('index.php?page=quote&action=list');
            }
            
            require_once 'views/payment/process.php';
        } else {
            redirect('index.php?page=quote&action=list');
        }
    }

    public function list() {
        requireLogin();
        
        if ($_SESSION['role'] === 'admin') {
            $payments = $this->paymentModel->getAllPayments();
        } else {
            $payments = $this->paymentModel->getPaymentsByUser($_SESSION['user_id']);
        }
        
        require_once 'views/payment/list.php';
    }
}
?>
