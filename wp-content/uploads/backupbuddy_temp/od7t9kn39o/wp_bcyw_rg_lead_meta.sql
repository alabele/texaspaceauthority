CREATE TABLE `wp_bcyw_rg_lead_meta` (  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,  `form_id` mediumint(8) unsigned NOT NULL DEFAULT '0',  `lead_id` bigint(20) unsigned NOT NULL,  `meta_key` varchar(255) DEFAULT NULL,  `meta_value` longtext,  PRIMARY KEY (`id`),  KEY `lead_id` (`lead_id`),  KEY `meta_key` (`meta_key`(191)),  KEY `form_id_meta_key` (`form_id`,`meta_key`(191))) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `wp_bcyw_rg_lead_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_bcyw_rg_lead_meta` ENABLE KEYS */;
