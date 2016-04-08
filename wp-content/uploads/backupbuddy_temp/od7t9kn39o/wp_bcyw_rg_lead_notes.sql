CREATE TABLE `wp_bcyw_rg_lead_notes` (  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,  `lead_id` int(10) unsigned NOT NULL,  `user_name` varchar(250) DEFAULT NULL,  `user_id` bigint(20) DEFAULT NULL,  `date_created` datetime NOT NULL,  `value` longtext,  `note_type` varchar(50) DEFAULT NULL,  PRIMARY KEY (`id`),  KEY `lead_id` (`lead_id`),  KEY `lead_user_key` (`lead_id`,`user_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `wp_bcyw_rg_lead_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_bcyw_rg_lead_notes` ENABLE KEYS */;
