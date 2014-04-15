/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : sho_log

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-04-15 20:04:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gs_changeability
-- ----------------------------
DROP TABLE IF EXISTS `gs_changeability`;
CREATE TABLE `gs_changeability` (
  `index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `Account` varchar(20) NOT NULL,
  `CharID` int(11) NOT NULL,
  `CharName` varchar(30) NOT NULL,
  `AbilityType` smallint(6) DEFAULT NULL,
  `UsedPoint` smallint(6) DEFAULT NULL,
  `BonusPoint` smallint(6) DEFAULT NULL,
  `IP` char(15) DEFAULT NULL,
  `Location` varchar(24) DEFAULT NULL,
  `LocX` int(11) DEFAULT NULL,
  `LocY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_characterlog
-- ----------------------------
DROP TABLE IF EXISTS `gs_characterlog`;
CREATE TABLE `gs_characterlog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `AccountName` varchar(20) DEFAULT NULL,
  `CharName` varchar(30) DEFAULT NULL,
  `DelAdd` tinyint(3) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_createlog
-- ----------------------------
DROP TABLE IF EXISTS `gs_createlog`;
CREATE TABLE `gs_createlog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `CharID` int(11) NOT NULL,
  `CharName` varchar(30) NOT NULL,
  `ItemID` varchar(10) DEFAULT NULL,
  `ItemName` varchar(50) DEFAULT NULL,
  `Stuff1` varchar(30) DEFAULT NULL,
  `Stuff2` varchar(30) DEFAULT NULL,
  `Stuff3` varchar(30) DEFAULT NULL,
  `Stuff4` varchar(30) DEFAULT NULL,
  `Making` tinyint(3) unsigned DEFAULT NULL,
  `Success` tinyint(3) unsigned DEFAULT NULL,
  `Location` varchar(24) DEFAULT NULL,
  `LocX` int(11) DEFAULT NULL,
  `LocY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_dielog
-- ----------------------------
DROP TABLE IF EXISTS `gs_dielog`;
CREATE TABLE `gs_dielog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `CharName` varchar(32) NOT NULL,
  `Money` bigint(20) DEFAULT NULL,
  `CharLevel` smallint(6) DEFAULT NULL,
  `Exp` int(11) DEFAULT NULL,
  `KillPos` varchar(24) DEFAULT NULL,
  `PosX` int(11) DEFAULT NULL,
  `PosY` int(11) DEFAULT NULL,
  `ObjectName` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_gemminglog
-- ----------------------------
DROP TABLE IF EXISTS `gs_gemminglog`;
CREATE TABLE `gs_gemminglog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `CharID` int(11) NOT NULL,
  `CharName` varchar(30) NOT NULL,
  `ItemID` varchar(10) DEFAULT NULL,
  `ItemName` varchar(50) DEFAULT NULL,
  `JewelID` varchar(10) DEFAULT NULL,
  `JewelName` varchar(24) DEFAULT NULL,
  `Gemming` tinyint(3) unsigned DEFAULT NULL,
  `Success` tinyint(3) unsigned DEFAULT NULL,
  `Location` varchar(24) DEFAULT NULL,
  `LocX` int(11) DEFAULT NULL,
  `LocY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_itemlog
-- ----------------------------
DROP TABLE IF EXISTS `gs_itemlog`;
CREATE TABLE `gs_itemlog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `Action` int(11) NOT NULL,
  `SbjAccount` varchar(20) NOT NULL,
  `SbjCharID` int(11) NOT NULL,
  `SbjCharName` varchar(30) NOT NULL,
  `ItemID` varchar(10) DEFAULT NULL,
  `ItemName` varchar(50) DEFAULT NULL,
  `ItemCount` smallint(6) DEFAULT NULL,
  `ItemSN` bigint(20) DEFAULT NULL,
  `ItemOpt` smallint(6) DEFAULT NULL,
  `Money` bigint(20) DEFAULT NULL,
  `Location` varchar(24) DEFAULT NULL,
  `LocX` int(11) DEFAULT NULL,
  `LocY` int(11) DEFAULT NULL,
  `ObjAccount` varchar(20) DEFAULT NULL,
  `ObjCharID` int(11) DEFAULT NULL,
  `ObjCharName` varchar(30) DEFAULT NULL,
  `SbjIP` varchar(15) NOT NULL,
  `ObjIP` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_leveluplog
-- ----------------------------
DROP TABLE IF EXISTS `gs_leveluplog`;
CREATE TABLE `gs_leveluplog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `CharID` int(11) NOT NULL,
  `CharName` varchar(30) NOT NULL,
  `toLevel` smallint(6) DEFAULT NULL,
  `BPoint` smallint(6) DEFAULT NULL,
  `SPoint` smallint(6) DEFAULT NULL,
  `Location` varchar(24) DEFAULT NULL,
  `LocX` int(11) DEFAULT NULL,
  `LocY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_periodiccharlog
-- ----------------------------
DROP TABLE IF EXISTS `gs_periodiccharlog`;
CREATE TABLE `gs_periodiccharlog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `CharName` varchar(32) NOT NULL,
  `Channel` tinyint(3) unsigned DEFAULT NULL,
  `CharLevel` smallint(6) DEFAULT NULL,
  `Money` bigint(20) DEFAULT NULL,
  `Exp` int(11) DEFAULT NULL,
  `BPoint` smallint(6) DEFAULT NULL,
  `SPoint` smallint(6) DEFAULT NULL,
  `Location` varchar(24) DEFAULT NULL,
  `LocX` int(11) DEFAULT NULL,
  `LocY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_questlog
-- ----------------------------
DROP TABLE IF EXISTS `gs_questlog`;
CREATE TABLE `gs_questlog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `CharID` int(11) NOT NULL,
  `CharName` varchar(30) NOT NULL,
  `QuestID` int(11) DEFAULT NULL,
  `QuestDo` tinyint(3) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_skilllog
-- ----------------------------
DROP TABLE IF EXISTS `gs_skilllog`;
CREATE TABLE `gs_skilllog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `CharID` int(11) NOT NULL,
  `CharName` varchar(30) NOT NULL,
  `SkillID` int(11) DEFAULT NULL,
  `SkillName` varchar(24) DEFAULT NULL,
  `SkillLevel` smallint(6) DEFAULT NULL,
  `SPoint` smallint(6) DEFAULT NULL,
  `Location` varchar(24) DEFAULT NULL,
  `LocX` int(11) DEFAULT NULL,
  `LocY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_unionlog
-- ----------------------------
DROP TABLE IF EXISTS `gs_unionlog`;
CREATE TABLE `gs_unionlog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `iCharID` int(11) NOT NULL,
  `szCharName` varchar(30) NOT NULL,
  `nAction` smallint(6) NOT NULL,
  `nCurUnion` smallint(6) NOT NULL,
  `iCurPoint` int(11) NOT NULL,
  `nAfterUnion` smallint(6) NOT NULL,
  `iAfterPoint` int(11) NOT NULL,
  `szLocation` varchar(50) DEFAULT NULL,
  `iLocX` int(11) DEFAULT NULL,
  `iLocY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gs_upgradelog
-- ----------------------------
DROP TABLE IF EXISTS `gs_upgradelog`;
CREATE TABLE `gs_upgradelog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `CharID` int(11) NOT NULL,
  `CharName` varchar(30) NOT NULL,
  `ItemID` varchar(10) DEFAULT NULL,
  `ItemName` varchar(50) DEFAULT NULL,
  `UpLevel` smallint(6) DEFAULT NULL,
  `Success` tinyint(3) unsigned DEFAULT NULL,
  `Location` varchar(24) DEFAULT NULL,
  `LocX` int(11) DEFAULT NULL,
  `LocY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblgs_error
-- ----------------------------
DROP TABLE IF EXISTS `tblgs_error`;
CREATE TABLE `tblgs_error` (
  `Index` int(11) DEFAULT NULL,
  `dateREG` datetime DEFAULT NULL,
  `txtIP` varchar(15) DEFAULT NULL,
  `txtACCOUNT` varchar(20) DEFAULT NULL,
  `txtCHAR` varchar(32) DEFAULT NULL,
  `txtFILE` char(255) DEFAULT NULL,
  `intLINE` int(11) DEFAULT NULL,
  `txtDESC` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblgs_login
-- ----------------------------
DROP TABLE IF EXISTS `tblgs_login`;
CREATE TABLE `tblgs_login` (
  `dateREG` datetime NOT NULL,
  `txtACCOUNT` char(30) NOT NULL,
  `txtServerIP` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for updatepoint_log
-- ----------------------------
DROP TABLE IF EXISTS `updatepoint_log`;
CREATE TABLE `updatepoint_log` (
  `updatepoint_log_no` bigint(20) NOT NULL,
  `Account_No` int(11) DEFAULT NULL,
  `Save_Point` int(11) DEFAULT NULL,
  `Cdt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ws_cheatlog
-- ----------------------------
DROP TABLE IF EXISTS `ws_cheatlog`;
CREATE TABLE `ws_cheatlog` (
  `Index` int(11) DEFAULT NULL,
  `dateREG` datetime DEFAULT NULL,
  `Account` varchar(20) DEFAULT NULL,
  `CharName` varchar(30) DEFAULT NULL,
  `ChannelNo` char(1) DEFAULT NULL,
  `CheatCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ws_clanlog
-- ----------------------------
DROP TABLE IF EXISTS `ws_clanlog`;
CREATE TABLE `ws_clanlog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `CharName` varchar(32) DEFAULT NULL,
  `ClanName` varchar(20) DEFAULT NULL,
  `ClanLevel` smallint(6) DEFAULT NULL,
  `Point` int(11) DEFAULT NULL,
  `Success` tinyint(3) unsigned DEFAULT NULL,
  `Location` varchar(24) DEFAULT NULL,
  `LocX` int(11) DEFAULT NULL,
  `LocY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ws_loginlog
-- ----------------------------
DROP TABLE IF EXISTS `ws_loginlog`;
CREATE TABLE `ws_loginlog` (
  `Index` int(11) NOT NULL,
  `dateREG` datetime DEFAULT NULL,
  `Login` tinyint(3) unsigned DEFAULT NULL,
  `CharName` varchar(30) DEFAULT NULL,
  `Channel` tinyint(3) unsigned DEFAULT NULL,
  `CharLevel` smallint(6) DEFAULT NULL,
  `Money` bigint(20) DEFAULT NULL,
  `Location` varchar(24) DEFAULT NULL,
  `LocX` int(11) DEFAULT NULL,
  `LocY` int(11) DEFAULT NULL,
  `LoginIP` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
