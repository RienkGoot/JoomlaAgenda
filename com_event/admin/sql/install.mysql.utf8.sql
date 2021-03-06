DROP TABLE IF EXISTS `#__events`;

CREATE TABLE `#__events` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(50) NOT NULL,
	`description` VARCHAR(255) NOT NULL,
	`start_date` DATE NOT NULL,
	`end_date` DATE NOT NULL,
	`start_time` TIME NOT NULL,
	`end_time` TIME NOT NULL,
	`location` VARCHAR(50) NOT NULL,
	`event_type` VARCHAR(50) NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;