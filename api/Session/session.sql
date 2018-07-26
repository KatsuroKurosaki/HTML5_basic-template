CREATE TABLE `session` (
  `id` char(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ip_address` int(10) unsigned NOT NULL DEFAULT '0',
  `user_agent` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expires` (`expires`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci