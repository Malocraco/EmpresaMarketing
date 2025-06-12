<?php
require_once 'utils/db.php';

class QuoteModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function createDetailedQuote($data) {
        $stmt = $this->db->prepare("
            INSERT INTO cotizaciones (
                usuario_id, servicio_id, nombre_empresa, telefono_empresa, email_empresa, 
                sitio_web, direccion, nombre_contacto, cargo_contacto, telefono_contacto,
                objetivos, publico_objetivo, presupuesto_estimado, fecha_inicio_deseada,
                redes_sociales_actuales, competencia, comentarios_adicionales
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        
        return $stmt->execute([
            $data['usuario_id'], $data['servicio_id'], $data['nombre_empresa'], 
            $data['telefono_empresa'], $data['email_empresa'], $data['sitio_web'],
            $data['direccion'], $data['nombre_contacto'], $data['cargo_contacto'],
            $data['telefono_contacto'], $data['objetivos'], $data['publico_objetivo'],
            $data['presupuesto_estimado'], $data['fecha_inicio_deseada'],
            $data['redes_sociales_actuales'], $data['competencia'], $data['comentarios_adicionales']
        ]);
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
            SELECT c.*, s.nombre as servicio_nombre, s.precio, s.descripcion as servicio_descripcion,
                   s.reels, s.post_feed, s.historias, s.grabaciones, s.estrategia_publicitaria,
                   u.username, u.correo as usuario_correo
            FROM cotizaciones c 
            JOIN services s ON c.servicio_id = s.id 
            JOIN users u ON c.usuario_id = u.id 
            WHERE c.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateQuoteStatus($id, $status, $notas_admin = null) {
        $stmt = $this->db->prepare("
            UPDATE cotizaciones 
            SET estado = ?, notas_admin = ?, fecha_estado_actualizado = NOW() 
            WHERE id = ?
        ");
        return $stmt->execute([$status, $notas_admin, $id]);
    }

    public function deleteQuote($id) {
        try {
            $this->db->beginTransaction();
        
            // Primero eliminar los pagos relacionados con esta cotización
            $stmt = $this->db->prepare("DELETE FROM pagos WHERE cotizacion_id = ?");
            $stmt->execute([$id]);
        
            // Luego eliminar la cotización
            $stmt = $this->db->prepare("DELETE FROM cotizaciones WHERE id = ?");
            $result = $stmt->execute([$id]);
        
            $this->db->commit();
            return $result;
        } catch (PDOException $e) {
            $this->db->rollback();
            return false;
        }
    }

    public function getQuotesCount() {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM cotizaciones");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getQuotesByStatus($status) {
        $stmt = $this->db->prepare("
            SELECT c.*, s.nombre as servicio_nombre, s.precio, u.username 
            FROM cotizaciones c 
            JOIN services s ON c.servicio_id = s.id 
            JOIN users u ON c.usuario_id = u.id 
            WHERE c.estado = ?
            ORDER BY c.fecha_solicitud DESC
        ");
        $stmt->execute([$status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>