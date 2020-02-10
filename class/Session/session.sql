CREATE TABLE `php_session` (
	`id` char(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
	`expires` int(10) unsigned NOT NULL,
	`ip_address` int(10) unsigned NOT NULL,
	`user_agent` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
	`session_data` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
	PRIMARY KEY (`id`),
	KEY `expires` (`expires`),
	KEY `ip_address` (`ip_address`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_520_ci