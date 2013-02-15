CREATE TABLE `post` (
	`id` int(10) unsigned NOT NULL auto_increment,
	`created_on` int(11) unsigned NOT NULL,
	`title` varchar(255) NOT NULL,
	`content` text NOT NULL,
	PRIMARY KEY  (`id`)
);

CREATE TABLE `user` (
	`id` int(10) unsigned NOT NULL auto_increment,
	`username` varchar(200) NOT NULL,
	`password` char(40) NOT NULL,
	PRIMARY KEY  (`id`)
);
