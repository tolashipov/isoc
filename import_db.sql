-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2019 at 01:26 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `test_contacts`
--

DROP TABLE IF EXISTS `test_contacts`;
CREATE TABLE IF NOT EXISTS `test_contacts` (
  `customerid` int(11) NOT NULL DEFAULT '0',
  `customername` varchar(100) NOT NULL DEFAULT '',
  `phonenumber` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_contacts`
--

INSERT INTO `test_contacts` (`customerid`, `customername`, `phonenumber`, `email`) VALUES
(745457, 'Contact Ti 1', '+972 3 5555555', 'Contact@office.org.il'),
(745751, 'Contact S', '972-3-1111111', 'Contact@office.org.il'),
(746066, 'Contact Change Holder', '+972 3 1111111', 'Contact@office.org.il'),
(746315, 'Contact Name HOLDER', '+972 3 1111111', 'Contact@gmail.com'),
(746328, 'Contact Holder', '+972 3 1111111', 'Contact@office.org.il'),
(746658, 'Avi Cohen', '+972 3 1111111', 'Contact@gmail.com'),
(746659, 'Yosi levi', '', 'Contact@gmail.com'),
(746662, 'yael matan', '+972 3 1111111', 'Contact@gmail.com'),
(746663, 'company ltd.', '', 'Contact@gmail.com'),
(746664, 'Contact Name', '+972 3 1111111', 'Contact@gmail.com'),
(746665, 'Hi-Tec industries', '', 'Contact@gmail.com'),
(746672, 'Contact Name', '+972 3 1111111', 'Contact@gmail.com'),
(746673, 'library management', '', 'Contact@gmail.com'),
(746682, 'Contact Name', '+972 3 1111111', 'Contact@gmail.com'),
(746683, 'Testers', '', 'Contact@gmail.com'),
(746687, 'Contact Name', '+972 3 1111111', 'Contact@gmail.com'),
(746692, 'Contact Name', '+972 3 1111111', 'Contact@gmail.com'),
(746693, 'Contact Name', '', 'Contact@gmail.com'),
(746694, 'Contact Name', '+972 3 1111111', 'Contact@gmail.com'),
(746695, 'Contact Name', '', 'Contact@gmail.com'),
(746696, 'Contact Name', '+972 3 1111111', 'Contact@gmail.com'),
(746699, 'Contact Name', '+972 3 1111111', 'Contact@gmail.com'),
(746700, 'Contact Name', '', 'Contact@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `test_domainreplicas`
--

DROP TABLE IF EXISTS `test_domainreplicas`;
CREATE TABLE IF NOT EXISTS `test_domainreplicas` (
  `replicaid` int(11) NOT NULL AUTO_INCREMENT,
  `domainid` int(11) NOT NULL DEFAULT '0',
  `recordingdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` smallint(6) NOT NULL DEFAULT '0',
  `dr_regstatusid` smallint(6) DEFAULT NULL,
  `dr_paymentstatusid` smallint(6) DEFAULT NULL,
  `dr_dnsstatusid` smallint(6) DEFAULT NULL,
  `holder_customerid` int(11) NOT NULL DEFAULT '0',
  `admin_customerid` int(11) NOT NULL DEFAULT '0',
  `bill_customerid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`replicaid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_domainreplicas`
--

INSERT INTO `test_domainreplicas` (`replicaid`, `domainid`, `recordingdate`, `userid`, `dr_regstatusid`, `dr_paymentstatusid`, `dr_dnsstatusid`, `holder_customerid`, `admin_customerid`, `bill_customerid`) VALUES
(1, 281211, '2017-05-11 12:29:50', 61, 1000, 2000, 3000, 746658, 746659, 745751),
(2, 281213, '2017-05-11 15:07:07', 3, 1000, 2000, 3000, 746662, 746663, 745751),
(3, 281212, '2017-05-14 14:44:56', 3, 1000, 2000, 3000, 746664, 746665, 745751),
(4, 281215, '2017-05-21 12:39:44', 3, 1000, 2000, 3000, 746672, 746673, 745751),
(5, 281166, '2017-05-21 17:22:57', 5, 1500, 2000, 3000, 746315, 746328, 745751),
(6, 281216, '2017-05-21 17:26:29', 61, 1500, 2000, 3000, 746682, 746683, 745751),
(7, 281214, '2017-05-22 14:23:34', 61, 1000, 2000, 3000, 746687, 745457, 745751),
(8, 281219, '2017-05-22 15:43:36', 3, 1000, 2000, 3000, 746692, 746693, 745751),
(9, 281218, '2017-05-22 15:44:02', 3, 1000, 2000, 3000, 746694, 746695, 745751),
(10, 281217, '2017-05-22 15:47:47', 5, 1500, 2000, 3000, 746696, 746066, 745751),
(11, 281220, '2017-05-23 16:25:46', 61, 1000, 2000, 3000, 746699, 746700, 745751);

-- --------------------------------------------------------

--
-- Table structure for table `test_domains`
--

DROP TABLE IF EXISTS `test_domains`;
CREATE TABLE IF NOT EXISTS `test_domains` (
  `domainid` int(11) NOT NULL DEFAULT '0',
  `domainname` varchar(255) NOT NULL DEFAULT '',
  `charactersetid` smallint(6) NOT NULL DEFAULT '1',
  `domaintypeid` smallint(6) NOT NULL DEFAULT '0',
  `originalvalidfrom` datetime DEFAULT NULL,
  `originalvaliduntil` datetime DEFAULT NULL,
  PRIMARY KEY (`domainid`),
  KEY `charactersetid` (`charactersetid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_domains`
--

INSERT INTO `test_domains` (`domainid`, `domainname`, `charactersetid`, `domaintypeid`, `originalvalidfrom`, `originalvaliduntil`) VALUES
(281166, 'another.co.il', 1, 1, '2015-06-06 14:30:35', '2018-07-21 23:59:59'),
(281211, 'dnssec-manual.co.il', 1, 1, '2016-05-10 11:01:04', '2019-06-24 23:59:59'),
(281212, 'mydomain.co.il', 1, 1, '2016-05-11 14:27:19', '2018-06-25 23:59:59'),
(281213, 'dnssec.co.il', 1, 1, '2016-08-11 15:07:07', '2018-06-25 23:59:59'),
(281214, 'auto.co.il', 1, 1, '2017-01-21 11:40:33', '2018-07-05 23:59:59'),
(281215, 'test.org.il', 1, 3, '2017-03-21 12:39:44', '2018-07-05 23:59:59'),
(281216, 'home.co.il', 1, 1, '2017-05-21 14:03:42', '2018-07-05 23:59:59'),
(281217, 'bank.org.il', 1, 3, '2017-06-22 14:52:01', '2019-07-06 23:59:59'),
(281218, 'gifts.co.il', 1, 1, '2017-07-23 15:21:41', '2020-07-06 23:59:59'),
(281219, 'weather.co.il', 1, 1, '2017-08-22 15:43:36', '2018-07-06 23:59:59'),
(281220, 'isoc.org.il', 1, 1, '2017-10-23 15:38:51', '2018-07-07 23:59:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
