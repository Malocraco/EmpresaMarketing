CREATE TABLE `usuarios` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_usuario` varchar(50) UNIQUE NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` enum(admin,usuario) NOT NULL DEFAULT 'usuario',
  `fecha_creacion` datetime DEFAULT (current_timestamp)
);

CREATE TABLE `servicios` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `precio` decimal(10,2) NOT NULL,
  `reels` int,
  `publicaciones` int,
  `historias` int,
  `grabaciones` int,
  `estrategia_pauta` boolean
);

CREATE TABLE `registro_servicios` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `servicio_id` int NOT NULL,
  `creado_por` int,
  `fecha_registro` datetime DEFAULT (current_timestamp)
);

CREATE TABLE `cotizaciones` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `fecha` datetime DEFAULT (current_timestamp),
  `estado` enum(pendiente,enviada,aceptada,rechazada) DEFAULT 'pendiente'
);

CREATE TABLE `detalle_cotizacion` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `cotizacion_id` int NOT NULL,
  `servicio_id` int NOT NULL,
  `cantidad` int DEFAULT 1
);

CREATE TABLE `reportes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `servicio_id` int NOT NULL,
  `fecha_reporte` datetime DEFAULT (current_timestamp),
  `observaciones` text
);

ALTER TABLE `registro_servicios` ADD FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`);

ALTER TABLE `registro_servicios` ADD FOREIGN KEY (`creado_por`) REFERENCES `usuarios` (`id`);

ALTER TABLE `cotizaciones` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

ALTER TABLE `detalle_cotizacion` ADD FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizaciones` (`id`);

ALTER TABLE `detalle_cotizacion` ADD FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`);

ALTER TABLE `reportes` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

ALTER TABLE `reportes` ADD FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`);

ALTER TABLE `detalle_cotizacion` ADD FOREIGN KEY (`servicio_id`) REFERENCES `detalle_cotizacion` (`id`);
