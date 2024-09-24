DROP DATABASE IF EXISTS `Applications`;
CREATE DATABASE `Applications`;
USE `Applications`;

CREATE TABLE `Jobs`(
    `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `Title` VARCHAR(255) NOT NULL,
    `Description` VARCHAR(255) NOT NULL,
    `Salary` INT NOT NULL,
    `Location` VARCHAR(255) NOT NULL,
    `Posted_Date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Applications`(
    `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `Job_Id` INT NOT NULL,
    `Applicant_Name` VARCHAR(255) NOT NULL,
    `Email`VARCHAR(255) NOT NULL,
    `Phone_Number` INT NOT NULL,
    `Resume_Link` VARCHAR(255) NOT NULL,
    FOREIGN KEY (`Job_Id`) REFERENCES `Jobs`(`Id`)
);