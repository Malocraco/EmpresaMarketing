<?php
require_once 'utils/db.php';

class UserModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function register($username, $correo, $password) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users (username, correo, password) VALUES (?, ?, ?)");
            return $stmt->execute([$username, $correo, $password]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function login($correo, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE correo = ? AND password = ?");
        $stmt->execute([$correo, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUsername($userId, $newUsername) {
        $stmt = $this->db->prepare("UPDATE users SET username = ? WHERE id = ?");
        return $stmt->execute([$newUsername, $userId]);
    }

    public function changePassword($userId, $currentPassword, $newPassword) {
        // Verificar contraseña actual
        $stmt = $this->db->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && $user['password'] === $currentPassword) {
            $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE id = ?");
            return $stmt->execute([$newPassword, $userId]);
        }
        
        return false;
    }

    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT id, username, correo, role, created_at FROM users ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
