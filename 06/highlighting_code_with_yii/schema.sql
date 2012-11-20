CREATE TABLE `snippet` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `html` text NOT NULL,
  `language` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
);
