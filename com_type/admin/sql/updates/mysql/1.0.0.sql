DROP TABLE IF EXISTS `#__events_types`;

CREATE TABLE `#__events_types` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`event_type` VARCHAR(50) NOT NULL,
	`event_type_color` VARCHAR(50) NOT NULL,
	`event_type_font` VARCHAR(50) NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;