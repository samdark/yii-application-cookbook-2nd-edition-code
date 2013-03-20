CREATE TABLE `post` (
	`id` int(11) NOT NULL auto_increment,
	`text` text,
	`title` varchar(255) default NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `comment` (
	`id` int(11) NOT NULL auto_increment,
	`text` text,
	PRIMARY KEY (`id`)
);
