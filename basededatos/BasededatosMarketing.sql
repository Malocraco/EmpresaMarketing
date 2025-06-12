-- Drop existing tables if they exist
DROP TABLE IF EXISTS pagos;
DROP TABLE IF EXISTS reportes;
DROP TABLE IF EXISTS cotizaciones;
DROP TABLE IF EXISTS services;
DROP TABLE IF EXISTS users;

-- Create users table with utf8mb4 collation
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    role ENUM('cliente', 'admin') DEFAULT 'cliente' NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create services table with utf8mb4 collation
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    reels INT DEFAULT NULL,
    post_feed INT DEFAULT NULL,
    historias INT DEFAULT NULL,
    grabaciones VARCHAR(100) DEFAULT NULL,
    estrategia_publicitaria VARCHAR(100) DEFAULT NULL,
    precio DECIMAL(10, 2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create cotizaciones table with utf8mb4 collation
CREATE TABLE cotizaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    servicio_id INT NOT NULL,
    
    -- Información de la empresa del cliente
    nombre_empresa VARCHAR(150) NOT NULL,
    telefono_empresa VARCHAR(20) NOT NULL,
    email_empresa VARCHAR(100) NOT NULL,
    sitio_web VARCHAR(200) DEFAULT NULL,
    direccion TEXT DEFAULT NULL,
    
    -- Información del contacto principal
    nombre_contacto VARCHAR(100) NOT NULL,
    cargo_contacto VARCHAR(100) DEFAULT NULL,
    telefono_contacto VARCHAR(20) NOT NULL,
    
    -- Detalles del proyecto
    objetivos TEXT NOT NULL,
    publico_objetivo TEXT NOT NULL,
    presupuesto_estimado DECIMAL(10, 2) DEFAULT NULL,
    fecha_inicio_deseada DATE DEFAULT NULL,
    redes_sociales_actuales TEXT DEFAULT NULL,
    competencia TEXT DEFAULT NULL,
    comentarios_adicionales TEXT DEFAULT NULL,
    
    -- Control del proceso
    fecha_solicitud DATETIME DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('solicitada', 'en_revision', 'en_proceso', 'completada', 'pagada', 'cancelada') DEFAULT 'solicitada' NOT NULL,
    fecha_estado_actualizado DATETIME DEFAULT CURRENT_TIMESTAMP,
    notas_admin TEXT DEFAULT NULL,
    
    FOREIGN KEY (usuario_id) REFERENCES users(id),
    FOREIGN KEY (servicio_id) REFERENCES services(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create pagos table with utf8mb4 collation
CREATE TABLE pagos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    cotizacion_id INT,
    monto DECIMAL(10, 2) NOT NULL,
    metodo_pago VARCHAR(50),
    fecha_pago DATE,
    FOREIGN KEY (usuario_id) REFERENCES users(id),
    FOREIGN KEY (cotizacion_id) REFERENCES cotizaciones(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create reportes table with utf8mb4 collation
CREATE TABLE reportes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    admin_id INT,
    titulo VARCHAR(100),
    descripcion TEXT,
    fecha_creacion DATETIME,
    FOREIGN KEY (admin_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Trigger para actualizar fecha_estado_actualizado cuando cambia el estado
DELIMITER //
CREATE TRIGGER update_estado_timestamp 
    BEFORE UPDATE ON cotizaciones
    FOR EACH ROW
BEGIN
    IF NEW.estado != OLD.estado THEN
        SET NEW.fecha_estado_actualizado = NOW();
    END IF;
END//
DELIMITER ;

-- Insertar usuario admin por defecto (opcional)
INSERT INTO users (username, correo, password, role) VALUES 
('admin', 'admin@marketingvalentina.com', 'admin123', 'admin');

-- Insertar algunos servicios de ejemplo (opcional)
INSERT INTO services (nombre, descripcion, reels, post_feed, historias, grabaciones, estrategia_publicitaria, precio) VALUES 
('Paquete Básico 📱', 'Perfecto para emprendedores que inician su presencia digital 🚀', 4, 8, 15, 'Básicas', 'Inicial', 150000.00),
('Paquete Premium 💎', 'Para empresas que buscan destacar en redes sociales ✨', 8, 16, 30, 'Profesionales', 'Avanzada', 300000.00),
('Paquete Empresarial 🏢', 'Solución completa para grandes empresas 💼', 12, 24, 45, 'Corporativas', 'Integral', 500000.00);