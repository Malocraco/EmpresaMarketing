<?php
require_once 'utils/db.php';

class ServiceModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function createService($data) {
        $stmt = $this->db->prepare("
            INSERT INTO services (nombre, descripcion, reels, post_feed, historias, grabaciones, estrategia_publicitaria, precio) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        
        return $stmt->execute([
            $data['nombre'],
            $data['descripcion'],
            $data['reels'],
            $data['post_feed'],
            $data['historias'],
            $data['grabaciones'],
            $data['estrategia_publicitaria'],
            $data['precio']
        ]);
    }

    public function getAllServices() {
        $stmt = $this->db->prepare("SELECT * FROM services ORDER BY nombre");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getServiceById($id) {
        $stmt = $this->db->prepare("SELECT * FROM services WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteService($id) {
        $stmt = $this->db->prepare("DELETE FROM services WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
