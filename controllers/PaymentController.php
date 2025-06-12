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
        requireLoginWithCache();
        
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
            
            // NUEVA VALIDACIÓN: Solo se puede pagar si el trabajo está completado
            if ($quote['estado'] !== 'completada') {
                setMessage('Solo puedes pagar cuando el trabajo esté completado y aprobado', 'warning');
                redirect('index.php?page=quote&action=view&id=' . $cotizacion_id);
            }
            
            if ($this->paymentModel->processPayment($_SESSION['user_id'], $cotizacion_id, $monto, $metodo_pago)) {
                // Actualizar estado de la cotización a 'pagada'
                $this->quoteModel->updateQuoteStatus($cotizacion_id, 'pagada', 'Pago procesado exitosamente');
                setMessage('¡Pago procesado exitosamente! Gracias por confiar en Marketing Valentina.');
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
            
            // Verificar que el trabajo esté completado
            if ($quote['estado'] !== 'completada') {
                setMessage('El trabajo debe estar completado antes de poder realizar el pago', 'warning');
                redirect('index.php?page=quote&action=view&id=' . $quote_id);
            }
            
            require_once 'views/payment/process.php';
        } else {
            redirect('index.php?page=quote&action=list');
        }
    }

    public function list() {
        requireLoginWithCache();
        
        if ($_SESSION['role'] === 'admin') {
            $payments = $this->paymentModel->getAllPayments();
        } else {
            $payments = $this->paymentModel->getPaymentsByUser($_SESSION['user_id']);
        }
        
        require_once 'views/payment/list.php';
    }
}
?>