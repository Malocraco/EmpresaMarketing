<?php
require_once 'utils/db.php';

class PaymentModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function processPayment($usuario_id, $cotizacion_id, $monto, $metodo_pago) {
        $stmt = $this->db->prepare("
            INSERT INTO pagos (usuario_id, cotizacion_id, monto, metodo_pago, fecha_pago) 
            VALUES (?, ?, ?, ?, CURDATE())
        ");
        return $stmt->execute([$usuario_id, $cotizacion_id, $monto, $metodo_pago]);
    }

    public function getPaymentsByUser($usuario_id) {
        $stmt = $this->db->prepare("
            SELECT p.*, c.id as cotizacion_id, s.nombre as servicio_nombre, u.username 
            FROM pagos p 
            JOIN cotizaciones c ON p.cotizacion_id = c.id 
            JOIN services s ON c.servicio_id = s.id 
            JOIN users u ON p.usuario_id = u.id 
            WHERE p.usuario_id = ? 
            ORDER BY p.fecha_pago DESC
        ");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPayments() {
        $stmt = $this->db->prepare("
            SELECT p.*, c.id as cotizacion_id, s.nombre as servicio_nombre, u.username 
            FROM pagos p 
            JOIN cotizaciones c ON p.cotizacion_id = c.id 
            JOIN services s ON c.servicio_id = s.id 
            JOIN users u ON p.usuario_id = u.id 
            ORDER BY p.fecha_pago DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
