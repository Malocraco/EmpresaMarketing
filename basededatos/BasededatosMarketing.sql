-- Drop existing tables if they exist
DROP TABLE IF EXISTS pagos;
DROP TABLE IF EXISTS reportes;
DROP TABLE IF EXISTS cotizaciones;
DROP TABLE IF EXISTS services;
DROP TABLE IF EXISTS users;

-- Create users table with role as 'cliente' by default
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    role ENUM('cliente', 'admin') DEFAULT 'cliente' NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create services table
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
);

-- Create cotizaciones table
CREATE TABLE cotizaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    servicio_id INT NOT NULL,
    fecha_solicitud DATETIME DEFAULT CURRENT_TIMESTAMP,
    estado VARCHAR(50) DEFAULT 'pendiente',
    FOREIGN KEY (usuario_id) REFERENCES users(id),
    FOREIGN KEY (servicio_id) REFERENCES services(id)
);

-- Create pagos table
CREATE TABLE pagos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    cotizacion_id INT,
    monto DECIMAL(10, 2) NOT NULL,
    metodo_pago VARCHAR(50),
    fecha_pago DATE,
    FOREIGN KEY (usuario_id) REFERENCES users(id),
    FOREIGN KEY (cotizacion_id) REFERENCES cotizaciones(id)
);

-- Create reportes table
CREATE TABLE reportes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    admin_id INT,
    titulo VARCHAR(100),
    descripcion TEXT,
    fecha_creacion DATETIME,
    FOREIGN KEY (admin_id) REFERENCES users(id)
);

-- Optional: Migrate existing 'user' roles to 'cliente' (if you have data)
UPDATE users SET role = 'cliente' WHERE role = 'user';