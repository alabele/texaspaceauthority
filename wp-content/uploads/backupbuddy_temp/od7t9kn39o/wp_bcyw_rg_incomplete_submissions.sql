CREATE TABLE `wp_bcyw_rg_incomplete_submissions` (  `uuid` char(32) NOT NULL,  `email` varchar(255) DEFAULT NULL,  `form_id` mediumint(8) unsigned NOT NULL,  `date_created` datetime NOT NULL,  `ip` varchar(39) NOT NULL,  `source_url` longtext NOT NULL,  `submission` longtext NOT NULL,  PRIMARY KEY (`uuid`),  KEY `form_id` (`form_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `wp_bcyw_rg_incomplete_submissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_bcyw_rg_incomplete_submissions` ENABLE KEYS */;
