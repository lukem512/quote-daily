-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2011 at 01:38 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `quotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE IF NOT EXISTS `dates` (
  `DISPLAY_DATE` date NOT NULL,
  `QID` int(11) NOT NULL,
  PRIMARY KEY (`DISPLAY_DATE`),
  KEY `QID` (`QID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `EID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` text NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`EID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `QID` int(11) NOT NULL AUTO_INCREMENT,
  `QUOTE` text NOT NULL,
  `AUTHOR` varchar(30) NOT NULL DEFAULT 'Author not defined',
  `COMMENTS` text,
  PRIMARY KEY (`QID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dates`
--
ALTER TABLE `dates`
  ADD CONSTRAINT `QID` FOREIGN KEY (`QID`) REFERENCES `quotes` (`QID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
