<?php
require_once 'utils/db.php';

class ReportModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function createReport($admin_id, $titulo, $descripcion) {
        $stmt = $this->db->prepare("
            INSERT INTO reportes (admin_id, titulo, descripcion, fecha_creacion) 
            VALUES (?, ?, ?, NOW())
        ");
        return $stmt->execute([$admin_id, $titulo, $descripcion]);
    }

    public function getAllReports() {
        $stmt = $this->db->prepare("
            SELECT r.*, u.username as admin_name 
            FROM reportes r 
            JOIN users u ON r.admin_id = u.id 
            ORDER BY r.fecha_creacion DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReportById($id) {
        $stmt = $this->db->prepare("
            SELECT r.*, u.username as admin_name 
            FROM reportes r 
            JOIN users u ON r.admin_id = u.id 
            WHERE r.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
