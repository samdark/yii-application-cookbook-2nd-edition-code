CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `user`(`id`,`username`,`password`) VALUES ( '1','Alex','202cb962ac59075b964b07152d234b70');
INSERT INTO `user`(`id`,`username`,`password`) VALUES ( '2','Qiang','202cb962ac59075b964b07152d234b70');
