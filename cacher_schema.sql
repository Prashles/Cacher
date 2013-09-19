CREATE TABLE `cacher_cache` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `value` varchar(2000) NOT NULL DEFAULT '',
  `expiry` datetime DEFAULT NULL,
  `permanent` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
