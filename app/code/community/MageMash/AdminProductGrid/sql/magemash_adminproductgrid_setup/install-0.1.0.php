<?php
$this->startSetup();
$this->run("
DROP TABLE IF EXISTS {$this->getTable('magemash_adminproductgrid_field')};
CREATE TABLE {$this->getTable('magemash_adminproductgrid_field')} (
    `entity_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `grid_id` INT(11) NOT NULL,
    `field` VARCHAR(255) NULL DEFAULT NULL,
    `header` VARCHAR(255) NULL DEFAULT NULL,
    `width` VARCHAR(255) NULL DEFAULT NULL,
    `type` VARCHAR(55) NULL DEFAULT NULL,
    `index` VARCHAR(55) NULL DEFAULT NULL,
    `options` VARCHAR(55) NULL DEFAULT NULL,
    `sortable` VARCHAR(55) NULL DEFAULT NULL,
    `sort_order` SMALLINT(6) UNSIGNED NOT NULL DEFAULT '0',
    `created_time` DATETIME NULL DEFAULT NULL,
    `update_time` DATETIME NULL DEFAULT NULL,
    PRIMARY KEY (`entity_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;
");

$this->run("
DROP TABLE IF EXISTS {$this->getTable('magemash_adminproductgrid_grid')};
CREATE TABLE {$this->getTable('magemash_adminproductgrid_grid')} (
    `entity_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `grid_name` VARCHAR(255) NULL DEFAULT NULL,
    `type` VARCHAR(255) NULL DEFAULT NULL,
    `title` VARCHAR(255) NULL DEFAULT NULL,
    `created_time` DATETIME NULL DEFAULT NULL,
    `update_time` DATETIME NULL DEFAULT NULL,
    PRIMARY KEY (`entity_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;
");

$this->endSetup();
