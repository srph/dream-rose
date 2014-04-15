/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : sho

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-04-15 20:04:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for inventorysweep
-- ----------------------------
DROP TABLE IF EXISTS `inventorysweep`;
CREATE TABLE `inventorysweep` (
  `CharName` varchar(60) NOT NULL,
  `ItemID` varchar(7) NOT NULL,
  `ItemStats` varchar(50) DEFAULT NULL,
  `ItemCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblgs_avatar
-- ----------------------------
DROP TABLE IF EXISTS `tblgs_avatar`;
CREATE TABLE `tblgs_avatar` (
  `intCharID` int(11) NOT NULL,
  `txtACCOUNT` varchar(20) NOT NULL,
  `txtNAME` varchar(30) NOT NULL,
  `btLEVEL` smallint(6) DEFAULT NULL,
  `intMoney` bigint(20) DEFAULT NULL,
  `dwRIGHT` int(11) DEFAULT NULL,
  `binBasicE` longblob NOT NULL,
  `binBasicI` longblob NOT NULL,
  `binBasicA` longblob NOT NULL,
  `binGrowA` longblob NOT NULL,
  `binSkillA` longblob NOT NULL,
  `blobQUEST` longblob,
  `blobINV` longblob NOT NULL,
  `binHotICON` longblob,
  `dwDelTIME` int(11) DEFAULT NULL,
  `binWishLIST` longblob,
  `dwOPTION` int(11) DEFAULT NULL,
  `intJOB` smallint(6) NOT NULL,
  `dwRegTIME` int(11) NOT NULL,
  `dwPartyIDX` int(11) DEFAULT NULL,
  `dwItemSN` int(11) DEFAULT NULL,
  `intDataVER` smallint(6) NOT NULL,
  `txtCharName` varchar(30) DEFAULT NULL,
  `binSkillB` longblob,
  PRIMARY KEY (`txtNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblgs_bank
-- ----------------------------
DROP TABLE IF EXISTS `tblgs_bank`;
CREATE TABLE `tblgs_bank` (
  `txtACCOUNT` varchar(20) NOT NULL,
  `blobITEMS` longblob,
  `intREWARD` decimal(19,4) DEFAULT NULL,
  `txtPASSWORD` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`txtACCOUNT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblws_clan
-- ----------------------------
DROP TABLE IF EXISTS `tblws_clan`;
CREATE TABLE `tblws_clan` (
  `intID` int(11) NOT NULL,
  `txtNAME` char(20) NOT NULL,
  `txtDESC` char(255) DEFAULT NULL,
  `intMarkIDX1` smallint(6) NOT NULL,
  `intMarkIDX2` smallint(6) DEFAULT NULL,
  `intLEVEL` smallint(6) DEFAULT NULL,
  `intPOINT` int(11) DEFAULT NULL,
  `intAlliedID` int(11) DEFAULT NULL,
  `intRATE` smallint(6) DEFAULT NULL,
  `intMoney` bigint(20) DEFAULT NULL,
  `binDATA` longblob,
  `txtMSG` text,
  `intMarkCRC` smallint(6) DEFAULT NULL,
  `intMarkLEN` smallint(6) DEFAULT NULL,
  `binMark` longblob,
  `dateMarkREG` datetime DEFAULT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblws_clanchar
-- ----------------------------
DROP TABLE IF EXISTS `tblws_clanchar`;
CREATE TABLE `tblws_clanchar` (
  `txtCharNAME` char(30) NOT NULL,
  `intClanID` int(11) NOT NULL,
  `intPOINT` int(11) DEFAULT NULL,
  `intPOS` int(11) DEFAULT NULL,
  PRIMARY KEY (`txtCharNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblws_friend
-- ----------------------------
DROP TABLE IF EXISTS `tblws_friend`;
CREATE TABLE `tblws_friend` (
  `intCharID` int(11) NOT NULL,
  `intFriendCNT` smallint(6) NOT NULL,
  `blobFRIENDS` longblob,
  PRIMARY KEY (`intCharID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblws_memo
-- ----------------------------
DROP TABLE IF EXISTS `tblws_memo`;
CREATE TABLE `tblws_memo` (
  `intSN` bigint(20) NOT NULL,
  `dwDATE` int(11) NOT NULL,
  `txtNAME` varchar(30) NOT NULL,
  `txtFROM` varchar(30) NOT NULL,
  `txtMEMO` varchar(255) NOT NULL,
  PRIMARY KEY (`intSN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tblws_var
-- ----------------------------
DROP TABLE IF EXISTS `tblws_var`;
CREATE TABLE `tblws_var` (
  `txtNAME` varchar(70) NOT NULL,
  `dateUPDATE` datetime NOT NULL,
  `binDATA` longblob NOT NULL,
  PRIMARY KEY (`txtNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for usp
-- ----------------------------
DROP TABLE IF EXISTS `usp`;
CREATE TABLE `usp` (
  `li` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for warehousesweep
-- ----------------------------
DROP TABLE IF EXISTS `warehousesweep`;
CREATE TABLE `warehousesweep` (
  `AccountName` varchar(100) DEFAULT NULL,
  `ItemID` varchar(7) DEFAULT NULL,
  `ItemStats` varchar(50) DEFAULT NULL,
  `ItemCount` int(11) DEFAULT NULL
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
  `CheatCode` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
