CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(50) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum(admin,user) NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT (current_timestamp)
);

CREATE TABLE `services` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `reels` int,
  `posts` int,
  `stories` int,
  `recordings` int,
  `ad_strategy` boolean
);

CREATE TABLE `service_registry` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `created_by` int,
  `created_at` datetime DEFAULT (current_timestamp)
);

CREATE TABLE `quotations` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` datetime DEFAULT (current_timestamp),
  `status` enum(pending,sent,accepted,rejected) DEFAULT 'pending'
);

CREATE TABLE `quotation_details` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `quotation_id` int NOT NULL,
  `service_id` int NOT NULL,
  `quantity` int DEFAULT 1
);

CREATE TABLE `reports` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `service_id` int NOT NULL,
  `report_date` datetime DEFAULT (current_timestamp),
  `notes` text
);

ALTER TABLE `service_registry` ADD FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

ALTER TABLE `service_registry` ADD FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

ALTER TABLE `quotations` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `quotation_details` ADD FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`);

ALTER TABLE `quotation_details` ADD FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

ALTER TABLE `reports` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `reports` ADD FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
