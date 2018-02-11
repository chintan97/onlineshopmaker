-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2018 at 08:10 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2594801_onlineshopmaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` longtext NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Id`, `Name`, `Email`, `Message`) VALUES
(1, 'Nandish Patel', '1418beit30031@gmail.com', 'hi great website'),
(2, 'Nandish Patel', '1418beit30031@gmail.com', 'hello'),
(8, 'Chintan', 'chintan97patel@gmail.com', 'Excellent!!!'),
(9, 'chintan', 'chintan97patel@gmail.com', 'skjdn');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(1000) NOT NULL,
  `User_name` varchar(1000) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone_no` varchar(20) NOT NULL,
  `Active` int(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `User_name`, `Password`, `Email`, `Phone_no`, `Active`) VALUES
(10, 'Nandish Patel', 'nandish_admin', 'Nn!123456', '1418beit30031@gmail.com', '+91 9427606780', 1),
(14, 'Chintan Patel', 'chintan_admin', '@Passw0rd', 'chintan97patel@gmail.com', '+91 9408640023', 1);
