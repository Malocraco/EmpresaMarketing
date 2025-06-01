<?php
require_once 'utils/db.php';

class QuoteModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function createQuote($usuario_id, $servicio_id) {
        $stmt = $this->db->prepare("INSERT INTO cotizaciones (usuario_id, servicio_id) VALUES (?, ?)");
        return $stmt->execute([$usuario_id, $servicio_id]);
    }

    public function getQuotesByUser($usuario_id) {
        $stmt = $this->db->prepare("
            SELECT c.*, s.nombre as servicio_nombre, s.precio, u.username 
            FROM cotizaciones c 
            JOIN services s ON c.servicio_id = s.id 
            JOIN users u ON c.usuario_id = u.id 
            WHERE c.usuario_id = ? 
            ORDER BY c.fecha_solicitud DESC
        ");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllQuotes() {
        $stmt = $this->db->prepare("
            SELECT c.*, s.nombre as servicio_nombre, s.precio, u.username 
            FROM cotizaciones c 
            JOIN services s ON c.servicio_id = s.id 
            JOIN users u ON c.usuario_id = u.id 
            ORDER BY c.fecha_solicitud DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getQuoteById($id) {
        $stmt = $this->db->prepare("
            SELECT c.*, s.nombre as servicio_nombre, s.precio, u.username 
            FROM cotizaciones c 
            JOIN services s ON c.servicio_id = s.id 
            JOIN users u ON c.usuario_id = u.id 
            WHERE c.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateQuoteStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE cotizaciones SET estado = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }
}
?>
