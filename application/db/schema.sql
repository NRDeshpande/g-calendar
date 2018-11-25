-- SQL SCHAME --
-- Author: Nikhil Deshpande --
-- Date: 2018-11-24 --

-- Create Database --
DROP DATABASE IF EXISTS `g_calender`;
CREATE DATABASE `g_calender`;

USE `g_calender`;

-- Mysql Table(s) --

--
-- Table structure for table `users_events`
--
CREATE TABLE IF NOT EXISTS `users_events` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_id` VARCHAR(255) NOT NULL COMMENT 'User Email Id',
  `resource_id` VARCHAR(255) NOT NULL COMMENT 'Google Watch Resource ID',
  `full_name` VARCHAR(100) NOT NULL COMMENT 'User Full Name',
  `event` TEXT DEFAULT NULL COMMENT 'Event Details',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT='User Event Details' AUTO_INCREMENT=1;