CREATE TABLE `wp_bcyw_rg_form` (  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `title` varchar(150) NOT NULL,  `date_created` datetime NOT NULL,  `is_active` tinyint(1) NOT NULL DEFAULT '1',  `is_trash` tinyint(1) NOT NULL DEFAULT '0',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `wp_bcyw_rg_form` DISABLE KEYS */;
INSERT INTO `wp_bcyw_rg_form` VALUES('1', 'Eligibility Check', '2015-03-07 22:28:05', '1', '0');
INSERT INTO `wp_bcyw_rg_form` VALUES('2', 'PACE Project Submission Of Interest', '2015-03-13 01:45:58', '1', '0');
INSERT INTO `wp_bcyw_rg_form` VALUES('3', 'Give us your feedback!', '2015-03-19 23:49:51', '1', '0');
INSERT INTO `wp_bcyw_rg_form` VALUES('4', 'Application Step 1: Eligibility Check', '2015-07-24 15:53:44', '1', '0');
INSERT INTO `wp_bcyw_rg_form` VALUES('5', 'Application Step 1: Check Eligibility', '2015-07-24 15:54:02', '1', '1');
/*!40000 ALTER TABLE `wp_bcyw_rg_form` ENABLE KEYS */;
