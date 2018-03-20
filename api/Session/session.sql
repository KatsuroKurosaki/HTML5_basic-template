CREATE TABLE `session` (
  `id` char(32) NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expires` (`expires`)
);
