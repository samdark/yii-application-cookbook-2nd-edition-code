CREATE TABLE `post` (
	`id` int(11) NOT NULL auto_increment,
	`text` text,
	`title` varchar(255) default NULL,
	`is_deleted` tinyint(1) NOT NULL default '0',
	PRIMARY KEY  (`id`)
)
