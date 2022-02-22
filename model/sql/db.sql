-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'Admin'
-- for Admin Dashboard
-- ---

DROP TABLE IF EXISTS `Admin`;
		
CREATE TABLE `Admin` (
  `Admin_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `Admin_Mail` VARCHAR(255) NULL DEFAULT NULL,
  `Admin_Login` VARCHAR(25) NULL DEFAULT NULL,
  `Admin_Password` VARCHAR(60) NULL DEFAULT NULL,
  `Admin_Name` VARCHAR(50) NULL DEFAULT NULL,
  `Admin_Firstname` VARCHAR(50) NULL DEFAULT NULL,
  `Admin_Role` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`Admin_ID`)
) COMMENT 'for Admin Dashboard';

-- ---
-- Table 'Picture'
-- 
-- ---

DROP TABLE IF EXISTS `Picture`;
		
CREATE TABLE `Picture` (
  `Picture_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `Picture_Name` VARCHAR(50) NULL DEFAULT NULL,
  `Picture_Description` VARCHAR(255) NULL DEFAULT NULL,
  `Picture_Statut` INTEGER NULL DEFAULT NULL COMMENT 'Bit => 1 = True (affiché) // 0 = False (Masqué)',
  `Picture_Tags` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`Picture_ID`)
);

-- ---
-- Table 'Article'
-- 
-- ---

DROP TABLE IF EXISTS `Article`;
		
CREATE TABLE `Article` (
  `Article_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `Article_Name` VARCHAR(50) NULL DEFAULT NULL,
  `Article_Description` VARCHAR(255) NULL DEFAULT NULL,
  `Article_Text` MEDIUMTEXT NULL DEFAULT NULL,
  `Article_Statut` INTEGER NULL DEFAULT NULL COMMENT 'Bit => 1 = True (affiché) // 0 = False (Masqué)',
  `Article_tags` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`Article_ID`)
);

-- ---
-- Table 'Activity'
-- 
-- ---

DROP TABLE IF EXISTS `Activity`;
		
CREATE TABLE `Activity` (
  `Activity_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `Activity_Name` VARCHAR(50) NULL DEFAULT NULL,
  `Activity_Description` VARCHAR(255) NULL DEFAULT NULL,
  `Activity_Statut` INTEGER NULL DEFAULT NULL COMMENT 'Bit => 1 = True (affiché) // 0 = False (Masqué)',
  `Activity_Content` MEDIUMTEXT NULL DEFAULT NULL,
  `Activity_Type` INTEGER NULL DEFAULT NULL,
  `Activity_Date` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`Activity_ID`)
);

-- ---
-- Table 'Newletter'
-- 
-- ---

DROP TABLE IF EXISTS `Newletter`;
		
CREATE TABLE `Newletter` (
  `Newsletter_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `Newsletter_Mail` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`Newsletter_ID`)
);

-- ---
-- Table 'User'
-- 
-- ---

DROP TABLE IF EXISTS `User`;
		
CREATE TABLE `User` (
  `User_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `User_Name` VARCHAR(50) NULL DEFAULT NULL,
  `User_Firstname` VARCHAR(50) NULL DEFAULT NULL,
  `User_login` VARCHAR(10) NULL DEFAULT NULL,
  `User_Password` VARCHAR(60) NULL DEFAULT NULL,
  `User_Mail` VARCHAR(255) NULL DEFAULT NULL,
  `User_Bank` VARCHAR(255) NULL DEFAULT NULL,
  `User_Activity` INTEGER NULL DEFAULT NULL,
  `User_Age` INTEGER NULL DEFAULT NULL,
  `User_Birthday` DATE NULL DEFAULT NULL,
  `User_Point` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`User_ID`)
);

-- ---
-- Table 'Tags'
-- 
-- ---

DROP TABLE IF EXISTS `Tags`;
		
CREATE TABLE `Tags` (
  `Tag_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `Tag_Name` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`Tag_ID`)
);

-- ---
-- Table 'Role'
-- 
-- ---

DROP TABLE IF EXISTS `Role`;
		
CREATE TABLE `Role` (
  `Role_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `Role_Name` VARCHAR(25) NULL DEFAULT NULL,
  PRIMARY KEY (`Role_ID`)
);

-- ---
-- Table 'Type'
-- 
-- ---

DROP TABLE IF EXISTS `Type`;
		
CREATE TABLE `Type` (
  `Type_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `Type_Name` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`Type_ID`)
);

-- ---
-- Table 'OldActivity'
-- 
-- ---

DROP TABLE IF EXISTS `OldActivity`;
		
CREATE TABLE `OldActivity` (
  `OldActivity_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `Old_User` INTEGER NULL DEFAULT NULL,
  `Old_Activity` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`OldActivity_ID`)
);

-- ---
-- Table 'Album'
-- 
-- ---

DROP TABLE IF EXISTS `Album`;
		
CREATE TABLE `Album` (
  `Album_ID` INTEGER NOT NULL AUTO_INCREMENT,
  `Album_Name` INTEGER NULL DEFAULT NULL,
  `Album_Picture` INTEGER NULL DEFAULT NULL,
  `Album_Atcivity` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`Album_ID`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `Admin` ADD FOREIGN KEY (Admin_Role) REFERENCES `Role` (`Role_ID`);
ALTER TABLE `Picture` ADD FOREIGN KEY (Picture_Tags) REFERENCES `Tags` (`Tag_ID`);
ALTER TABLE `Article` ADD FOREIGN KEY (Article_tags) REFERENCES `Tags` (`Tag_ID`);
ALTER TABLE `Activity` ADD FOREIGN KEY (Activity_Type) REFERENCES `Type` (`Type_ID`);
ALTER TABLE `User` ADD FOREIGN KEY (User_Activity) REFERENCES `Activity` (`Activity_ID`);
ALTER TABLE `OldActivity` ADD FOREIGN KEY (Old_User) REFERENCES `User` (`User_ID`);
ALTER TABLE `OldActivity` ADD FOREIGN KEY (Old_Activity) REFERENCES `Activity` (`Activity_ID`);
ALTER TABLE `Album` ADD FOREIGN KEY (Album_Picture) REFERENCES `Picture` (`Picture_ID`);
ALTER TABLE `Album` ADD FOREIGN KEY (Album_Atcivity) REFERENCES `Activity` (`Activity_ID`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `Admin` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Picture` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Article` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Activity` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Newletter` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `User` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Tags` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Role` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Type` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `OldActivity` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Album` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `Admin` (`Admin_ID`,`Admin_Mail`,`Admin_Login`,`Admin_Password`,`Admin_Name`,`Admin_Firstname`,`Admin_Role`) VALUES
-- ('','','','','','','');
-- INSERT INTO `Picture` (`Picture_ID`,`Picture_Name`,`Picture_Description`,`Picture_Statut`,`Picture_Tags`) VALUES
-- ('','','','','');
-- INSERT INTO `Article` (`Article_ID`,`Article_Name`,`Article_Description`,`Article_Text`,`Article_Statut`,`Article_tags`) VALUES
-- ('','','','','','');
-- INSERT INTO `Activity` (`Activity_ID`,`Activity_Name`,`Activity_Description`,`Activity_Statut`,`Activity_Content`,`Activity_Type`,`Activity_Date`) VALUES
-- ('','','','','','','');
-- INSERT INTO `Newletter` (`Newsletter_ID`,`Newsletter_Mail`) VALUES
-- ('','');
-- INSERT INTO `User` (`User_ID`,`User_Name`,`User_Firstname`,`User_login`,`User_Password`,`User_Mail`,`User_Bank`,`User_Activity`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `Tags` (`Tag_ID`,`Tag_Name`) VALUES
-- ('','');
-- INSERT INTO `Role` (`Role_ID`,`Role_Name`) VALUES
-- ('','');
-- INSERT INTO `Type` (`Type_ID`,`Type_Name`) VALUES
-- ('','');
-- INSERT INTO `OldActivity` (`OldActivity_ID`,`Old_User`,`Old_Activity`) VALUES
-- ('','','');
-- INSERT INTO `Album` (`Album_ID`,`Album_Name`,`Album_Picture`,`Album_Atcivity`) VALUES
-- ('','','','');