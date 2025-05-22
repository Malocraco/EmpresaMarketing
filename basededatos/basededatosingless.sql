CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(50) UNIQUE NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created_at` datetime
);

CREATE TABLE `services` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `reels` int,
  `post_feed` int,
  `historias` int,
  `grabaciones` varchar(20),
  `estrategia_publicitaria` varchar(255),
  `precio` decimal(10,2) NOT NULL
);

CREATE TABLE `cotizaciones` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` int,
  `servicio_id` int,
  `fecha_solicitud` date,
  `estado` varchar(20)
);

CREATE TABLE `pagos` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` int,
  `cotizacion_id` int,
  `monto` decimal(10,2) NOT NULL,
  `metodo_pago` varchar(50),
  `fecha_pago` date
);

CREATE TABLE `reportes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `admin_id` int,
  `titulo` varchar(100),
  `descripcion` text,
  `fecha_creacion` datetime
);

ALTER TABLE `cotizaciones` ADD FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

ALTER TABLE `cotizaciones` ADD FOREIGN KEY (`servicio_id`) REFERENCES `services` (`id`);

ALTER TABLE `pagos` ADD FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

ALTER TABLE `pagos` ADD FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizaciones` (`id`);

ALTER TABLE `reportes` ADD FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);
