<?php
require_once 'models/ReportModel.php';

class ReportController {
    private $reportModel;

    public function __construct() {
        $this->reportModel = new ReportModel();
    }

    public function index() {
        $this->list();
    }

    public function create() {
        requireAdminWithCache();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = sanitize($_POST['titulo']);
            $descripcion = sanitize($_POST['descripcion']);
            
            if ($this->reportModel->createReport($_SESSION['user_id'], $titulo, $descripcion)) {
                setMessage('Reporte creado exitosamente');
                redirect('index.php?page=report&action=list');
            } else {
                setMessage('Error al crear el reporte', 'danger');
            }
        }
        
        require_once 'views/report/create.php';
    }

    public function list() {
        requireAdminWithCache();
        $reports = $this->reportModel->getAllReports();
        require_once 'views/report/list.php';
    }
}
?>
