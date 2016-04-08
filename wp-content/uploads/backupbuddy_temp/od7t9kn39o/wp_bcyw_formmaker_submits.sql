CREATE TABLE `wp_bcyw_formmaker_submits` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `form_id` int(11) NOT NULL,  `element_label` varchar(128) NOT NULL,  `element_value` varchar(600) NOT NULL,  `group_id` int(11) NOT NULL,  `date` datetime NOT NULL,  `ip` varchar(128) NOT NULL,  `user_id_wd` int(11) NOT NULL,  PRIMARY KEY (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `wp_bcyw_formmaker_submits` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_bcyw_formmaker_submits` ENABLE KEYS */;
