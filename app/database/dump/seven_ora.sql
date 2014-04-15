/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : seven_ora

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-04-15 20:04:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ch_pw
-- ----------------------------
DROP TABLE IF EXISTS `ch_pw`;
CREATE TABLE `ch_pw` (
  `account` varchar(50) DEFAULT NULL,
  `oldpass` varchar(50) DEFAULT NULL,
  `oldhash` varchar(50) DEFAULT NULL,
  `newpass` varchar(50) DEFAULT NULL,
  `newhash` varchar(50) DEFAULT NULL,
  `oldhost` varchar(50) DEFAULT NULL,
  `newhost` varchar(50) DEFAULT NULL,
  `regDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for donationlog
-- ----------------------------
DROP TABLE IF EXISTS `donationlog`;
CREATE TABLE `donationlog` (
  `txtAccount` varchar(30) DEFAULT NULL,
  `txtItemData` varchar(2000) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for donation_history
-- ----------------------------
DROP TABLE IF EXISTS `donation_history`;
CREATE TABLE `donation_history` (
  `aid` int(11) NOT NULL,
  `AccountName` varchar(60) DEFAULT NULL,
  `CharacterName` varchar(60) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `txtItemDeposited` varchar(150) DEFAULT NULL,
  `binItemDeposited` longblob,
  `dateReg` datetime DEFAULT NULL,
  `subAmount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for reboot_log
-- ----------------------------
DROP TABLE IF EXISTS `reboot_log`;
CREATE TABLE `reboot_log` (
  `AID` int(11) NOT NULL,
  `dateReg` datetime NOT NULL,
  `RemoteHost` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for restart_flag
-- ----------------------------
DROP TABLE IF EXISTS `restart_flag`;
CREATE TABLE `restart_flag` (
  `ARC_LS` int(11) DEFAULT NULL,
  `ARC_WS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for statistic
-- ----------------------------
DROP TABLE IF EXISTS `statistic`;
CREATE TABLE `statistic` (
  `txtChannel` varchar(50) NOT NULL,
  `intCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for statuschecker
-- ----------------------------
DROP TABLE IF EXISTS `statuschecker`;
CREATE TABLE `statuschecker` (
  `ProcessName` varchar(50) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tasklist
-- ----------------------------
DROP TABLE IF EXISTS `tasklist`;
CREATE TABLE `tasklist` (
  `ProcessList` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for testingtesting
-- ----------------------------
DROP TABLE IF EXISTS `testingtesting`;
CREATE TABLE `testingtesting` (
  `line` varchar(2000) DEFAULT NULL,
  `line2` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for topclans
-- ----------------------------
DROP TABLE IF EXISTS `topclans`;
CREATE TABLE `topclans` (
  `txtNAME` char(20) NOT NULL,
  `intPOINT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for topusers
-- ----------------------------
DROP TABLE IF EXISTS `topusers`;
CREATE TABLE `topusers` (
  `txtNAME` varchar(30) DEFAULT NULL,
  `btLEVEL` smallint(6) DEFAULT NULL,
  `intJOB` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for trylimits
-- ----------------------------
DROP TABLE IF EXISTS `trylimits`;
CREATE TABLE `trylimits` (
  `IP` varchar(50) DEFAULT NULL,
  `Tries` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for userinfo
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `Account` varchar(50) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `AID` int(11) DEFAULT NULL,
  `AllowBeta` int(11) DEFAULT NULL,
  `AscPassWord` varchar(50) DEFAULT NULL,
  `Birthday` datetime DEFAULT NULL,
  `BlockEnd` datetime DEFAULT NULL,
  `BlockEnd_Web` datetime DEFAULT NULL,
  `BlockStart` datetime DEFAULT NULL,
  `BlockStart_Web` datetime DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Gen` varchar(50) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Jumin` varchar(50) DEFAULT NULL,
  `LastConnect` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `MailIsConfirm` bit(1) DEFAULT NULL,
  `MailOpt` bit(1) DEFAULT NULL,
  `MD5PassWord` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `MortherLName` varchar(50) DEFAULT NULL,
  `Nation` varchar(50) DEFAULT NULL,
  `NickName` varchar(50) DEFAULT NULL,
  `RegDate` datetime DEFAULT NULL,
  `Right` int(11) DEFAULT NULL,
  `States` varchar(50) DEFAULT NULL,
  `Tel` varchar(50) DEFAULT NULL,
  `ZipCode` varchar(50) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `USER_CP` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `memberinfo` int(11) NOT NULL,
  `Mod` varchar(50) DEFAULT NULL,
  `hint` varchar(50) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `BlockReason` varchar(100) DEFAULT NULL,
  `birthyear` datetime DEFAULT NULL,
  `MotherLName` varchar(50) DEFAULT NULL,
  `BlockGM` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user_mail_check
-- ----------------------------
DROP TABLE IF EXISTS `user_mail_check`;
CREATE TABLE `user_mail_check` (
  `ch_aid` int(11) DEFAULT NULL,
  `ch_account` varchar(50) NOT NULL,
  `ch_pw` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ch_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
