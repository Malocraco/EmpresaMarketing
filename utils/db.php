<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'marketing_valentina';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct() {
        try {
            // Configuración mejorada para soportar UTF-8 completo (incluyendo emojis)
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
                ]
            );
            
            // Asegurar que la conexión use utf8mb4
            $this->pdo->exec("SET CHARACTER SET utf8mb4");
            $this->pdo->exec("SET COLLATION_CONNECTION = utf8mb4_unicode_ci");
            
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
