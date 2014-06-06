DROP DATABASE IF EXISTS `rental`;

CREATE DATABASE IF NOT EXISTS `rental`;

USE `rental`;

CREATE TABLE IF NOT EXISTS `dvd` 
(
  `dvd_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `production_year` INT(4) UNSIGNED,
  PRIMARY KEY (`dvd_id`)
);

CREATE TABLE IF NOT EXISTS `customer` 
(
  `customer_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255),
  `last_name` VARCHAR(255),
  `passport_code` INT(10) UNSIGNED,
  `regitration_date` DATE,
  PRIMARY KEY (`customer_id`)
);

CREATE TABLE IF NOT EXISTS `offer` 
(
  `offer_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dvd_id` INT(11),
  `customer_id` INT(11),
  `offer_date` DATE,
  `return_date` DATE,
  PRIMARY KEY (`offer_id`)
);


