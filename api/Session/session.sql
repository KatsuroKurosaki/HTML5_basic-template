CREATE TABLE `session` (
  `id` char(26) COLLATE utf8_unicode_ci NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expires` (`expires`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
