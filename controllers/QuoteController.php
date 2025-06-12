<?php
require_once 'models/QuoteModel.php';
require_once 'models/ServiceModel.php';

class QuoteController
{
    private $quoteModel;
    private $serviceModel;

    public function __construct()
    {
        $this->quoteModel = new QuoteModel();
        $this->serviceModel = new ServiceModel();
    }

    public function index()
    {
        $this->list();
    }

    public function request()
    {
        requireLoginWithCache();

        if ($_SESSION['role'] === 'admin') {
            setMessage('Los administradores no pueden solicitar cotizaciones', 'warning');
            redirect('index.php?page=user&action=dashboard');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'usuario_id' => $_SESSION['user_id'],
                'servicio_id' => (int)$_POST['servicio_id'],
                'nombre_empresa' => sanitize($_POST['nombre_empresa']),
                'telefono_empresa' => sanitize($_POST['telefono_empresa']),
                'email_empresa' => sanitize($_POST['email_empresa']),
                'sitio_web' => !empty($_POST['sitio_web']) ? sanitize($_POST['sitio_web']) : null,
                'direccion' => !empty($_POST['direccion']) ? sanitize($_POST['direccion']) : null,
                'nombre_contacto' => sanitize($_POST['nombre_contacto']),
                'cargo_contacto' => !empty($_POST['cargo_contacto']) ? sanitize($_POST['cargo_contacto']) : null,
                'telefono_contacto' => sanitize($_POST['telefono_contacto']),
                'objetivos' => sanitize($_POST['objetivos']),
                'publico_objetivo' => sanitize($_POST['publico_objetivo']),
                'presupuesto_estimado' => !empty($_POST['presupuesto_estimado']) ? (float)$_POST['presupuesto_estimado'] : null,
                'fecha_inicio_deseada' => !empty($_POST['fecha_inicio_deseada']) ? $_POST['fecha_inicio_deseada'] : null,
                'redes_sociales_actuales' => !empty($_POST['redes_sociales_actuales']) ? sanitize($_POST['redes_sociales_actuales']) : null,
                'competencia' => !empty($_POST['competencia']) ? sanitize($_POST['competencia']) : null,
                'comentarios_adicionales' => !empty($_POST['comentarios_adicionales']) ? sanitize($_POST['comentarios_adicionales']) : null
            ];

            if ($this->quoteModel->createDetailedQuote($data)) {
                setMessage('Cotización enviada exitosamente. Nos pondremos en contacto contigo pronto para revisar tu proyecto.');
                redirect('index.php?page=quote&action=list');
            } else {
                setMessage('Error al enviar la cotización', 'danger');
            }
        }

        $services = $this->serviceModel->getAllServices();
        $preselected_service = $_GET['service_id'] ?? null;
        require_once 'views/quote/request.php';
    }

    public function list()
    {
        requireLoginWithCache();

        if ($_SESSION['role'] === 'admin') {
            $quotes = $this->quoteModel->getAllQuotes();
        } else {
            $quotes = $this->quoteModel->getQuotesByUser($_SESSION['user_id']);
        }

        require_once 'views/quote/list.php';
    }

    public function view()
    {
        requireLoginWithCache();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            setMessage('ID de cotización no válido', 'danger');
            redirect('index.php?page=quote&action=list');
        }

        $quote = $this->quoteModel->getQuoteById($id);
        if (!$quote) {
            setMessage('Cotización no encontrada', 'danger');
            redirect('index.php?page=quote&action=list');
        }

        // Verificar permisos
        if ($_SESSION['role'] !== 'admin' && $quote['usuario_id'] != $_SESSION['user_id']) {
            setMessage('No tienes permisos para ver esta cotización', 'danger');
            redirect('index.php?page=quote&action=list');
        }

        require_once 'views/quote/view.php';
    }

    public function updateStatus()
    {
        requireAdminWithCache();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_POST['cotizacion_id'];
            $nuevo_estado = sanitize($_POST['nuevo_estado']);
            $notas_admin = sanitize($_POST['notas_admin']);

            if ($this->quoteModel->updateQuoteStatus($id, $nuevo_estado, $notas_admin)) {
                setMessage('Estado de cotización actualizado exitosamente');
            } else {
                setMessage('Error al actualizar el estado', 'danger');
            }
        }

        redirect('index.php?page=quote&action=list');
    }

    public function delete()
    {
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

    public function deleteOwn()
    {
        requireLoginWithCache();

        if ($_SESSION['role'] === 'admin') {
            setMessage('Los administradores no pueden usar esta función', 'warning');
            redirect('index.php?page=quote&action=list');
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            setMessage('ID de cotización no válido', 'danger');
            redirect('index.php?page=quote&action=list');
        }

        $quote = $this->quoteModel->getQuoteById($id);
        if (!$quote || $quote['usuario_id'] != $_SESSION['user_id']) {
            setMessage('No tienes permisos para eliminar esta cotización', 'danger');
            redirect('index.php?page=quote&action=list');
        }

        // No permitir eliminar cotizaciones en proceso o pagadas
        if (in_array($quote['estado'], ['en_proceso', 'completada', 'pagada'])) {
            setMessage('No puedes eliminar una cotización que está en proceso o ha sido completada', 'warning');
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
