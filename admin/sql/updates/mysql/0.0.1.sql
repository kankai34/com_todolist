DROP TABLE IF EXISTS `#__todolist`;

CREATE TABLE `#__todolist` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NULL DEFAULT NULL,
	`catid` INT(11) NULL DEFAULT NULL,
	`date` DATE NOT NULL DEFAULT '0000-00-00',
	`status` TINYINT(1) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
AUTO_INCREMENT=0
DEFAULT CHARSET=utf8;