CREATE TABLE `wp_bcyw_term_relationships` (  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',  `term_order` int(11) NOT NULL DEFAULT '0',  PRIMARY KEY (`object_id`,`term_taxonomy_id`),  KEY `term_taxonomy_id` (`term_taxonomy_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40000 ALTER TABLE `wp_bcyw_term_relationships` DISABLE KEYS */;
INSERT INTO `wp_bcyw_term_relationships` VALUES('129', '2', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('26', '2', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('25', '2', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('24', '2', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('23', '2', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('61', '5', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('61', '4', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('78', '5', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('383', '11', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('336', '9', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('365', '8', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('366', '8', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('344', '5', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('417', '1', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('383', '5', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('476', '2', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('497', '1', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('541', '12', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('594', '1', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('601', '5', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('657', '13', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('685', '1', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('776', '1', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('844', '2', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('860', '1', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('867', '1', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('918', '1', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('924', '14', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('924', '15', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('924', '16', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('924', '17', '0');
INSERT INTO `wp_bcyw_term_relationships` VALUES('930', '1', '0');
/*!40000 ALTER TABLE `wp_bcyw_term_relationships` ENABLE KEYS */;