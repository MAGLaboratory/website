CREATE TABLE `jobs_board` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(500) NOT NULL ,
  `company` VARCHAR(255) NOT NULL ,
  `location` VARCHAR(255) NULL ,
  `pay` VARCHAR(255) NULL ,
  `description` TEXT NOT NULL ,
  `edit_code` VARCHAR(15) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `end_date` DATETIME NULL ,
  PRIMARY KEY  (`id`)
) ENGINE = InnoDB;
