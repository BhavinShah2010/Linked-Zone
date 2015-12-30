-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2014 at 09:13 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linkedzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_tb`
--

CREATE TABLE IF NOT EXISTS `admin_login_tb` (
  `pattern_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `login_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`pattern_id`),
  KEY `pattern_id` (`pattern_id`),
  KEY `pattern_id_2` (`pattern_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `admin_login_tb`
--

INSERT INTO `admin_login_tb` (`pattern_id`, `user_id`, `password`, `first_name`, `last_name`, `login_status`) VALUES
(111, 'harsh_1110', 'soniharsh', 'Harsh', 'Soni', 0),
(112, 'bhavin_2010', 'bhavinshah', 'Bhavin', 'Shah', 0),
(113, 'adit_124', 'aditfadia', 'Adit', 'Fadia', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_msg_tb`
--

CREATE TABLE IF NOT EXISTS `admin_msg_tb` (
  `msg_id` int(2) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `msg_content` mediumtext NOT NULL,
  `image_path` varchar(50) NOT NULL,
  `time_of_msg` date NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_post_det_tb`
--

CREATE TABLE IF NOT EXISTS `admin_post_det_tb` (
  `post_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `post_type` int(1) NOT NULL,
  `post_text_content` longtext NOT NULL,
  `post_doc_name` varchar(200) NOT NULL,
  `time_of_post` datetime NOT NULL,
  `post_like_counter` int(5) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_id` (`post_id`),
  KEY `post_id_2` (`post_id`),
  KEY `post_id_3` (`post_id`),
  KEY `post_id_4` (`post_id`),
  KEY `post_id_5` (`post_id`),
  KEY `post_id_6` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `admin_post_det_tb`
--

INSERT INTO `admin_post_det_tb` (`post_id`, `post_type`, `post_text_content`, `post_doc_name`, `time_of_post`, `post_like_counter`) VALUES
(55, 2, '', '1000817_672376042776490_382319775_n.jpeg', '2014-05-01 22:49:38', 0),
(56, 2, '', '1000817_672376042776490_382319775_n.jpeg', '2014-05-01 22:50:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_post_tb`
--

CREATE TABLE IF NOT EXISTS `admin_post_tb` (
  `pattern_id` smallint(5) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  KEY `pattern_id` (`pattern_id`),
  KEY `post_id` (`post_id`),
  KEY `post_id_2` (`post_id`),
  KEY `post_id_3` (`post_id`),
  KEY `post_id_4` (`post_id`),
  KEY `pattern_id_2` (`pattern_id`),
  KEY `post_id_5` (`post_id`),
  KEY `pattern_id_3` (`pattern_id`),
  KEY `pattern_id_4` (`pattern_id`),
  KEY `post_id_6` (`post_id`),
  KEY `pattern_id_5` (`pattern_id`),
  KEY `post_id_7` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_post_tb`
--

INSERT INTO `admin_post_tb` (`pattern_id`, `post_id`) VALUES
(111, 55),
(111, 56);

-- --------------------------------------------------------

--
-- Table structure for table `admin_report_tb`
--

CREATE TABLE IF NOT EXISTS `admin_report_tb` (
  `reporter_id` smallint(5) unsigned NOT NULL,
  `report_id` int(5) unsigned NOT NULL,
  KEY `reporter_id` (`reporter_id`),
  KEY `report_id` (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_report_tb`
--

INSERT INTO `admin_report_tb` (`reporter_id`, `report_id`) VALUES
(111, 140),
(111, 147),
(112, 148),
(112, 149),
(112, 150);

-- --------------------------------------------------------

--
-- Table structure for table `comment_tb`
--

CREATE TABLE IF NOT EXISTS `comment_tb` (
  `comment_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `comment_content` text NOT NULL,
  `time_of_comment` datetime NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_id` (`comment_id`),
  KEY `comment_id_2` (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `comment_tb`
--

INSERT INTO `comment_tb` (`comment_id`, `comment_content`, `time_of_comment`) VALUES
(46, 'thank u..', '2014-04-25 09:46:01'),
(47, 'hi..', '2014-04-25 12:06:33'),
(48, 'fine yar..u say... :)', '2014-04-25 12:06:58'),
(49, 'hey..hello..how are u?', '2014-04-25 12:08:03'),
(50, 'bs fine.. :)', '2014-04-25 12:08:31'),
(51, 'fine...', '2014-04-25 12:08:36'),
(52, 'hi harsh..how are u.?', '2014-04-25 12:09:52'),
(53, 'hi harsh...', '2014-04-25 12:10:15'),
(54, 'fine how are both of u..?', '2014-04-25 12:10:39'),
(55, 'yah gud ... :)', '2014-04-26 01:16:59'),
(56, 'hi', '2014-04-26 01:19:22'),
(57, 'hi', '2014-04-26 01:21:50'),
(58, 'hi...', '2014-04-26 09:03:56'),
(59, 'hi', '2014-04-27 23:09:29'),
(60, 'hey', '2014-04-27 23:12:21'),
(61, 'G', '2014-04-29 01:41:10'),
(62, 'lolx', '2014-04-29 01:41:28'),
(63, 'hi', '2014-04-29 01:54:08'),
(64, 'hi', '2014-04-29 01:57:32'),
(65, 'hi', '2014-04-29 01:57:38'),
(66, 'hi', '2014-04-29 09:26:28'),
(67, 'hry', '2014-04-29 09:26:50'),
(68, 'hey', '2014-04-29 09:28:49'),
(69, 'hello..', '2014-04-29 09:32:19'),
(70, 'hey dre..', '2014-04-29 09:41:37'),
(71, 'hi...', '2014-04-29 11:54:36'),
(72, 'hi', '2014-05-01 16:12:11'),
(73, 'hi', '2014-05-01 16:12:27'),
(74, 'hu', '2014-05-01 22:38:52'),
(75, 'hi..', '2014-05-01 22:44:54'),
(76, 'heello..', '2014-05-01 22:45:01'),
(77, 'great yaar... :)', '2014-05-01 22:45:08'),
(78, 'dont know..wt happened....', '2014-05-01 22:45:22'),
(79, 'lolz.... saav minor change hato k su?', '2014-05-01 22:45:33'),
(80, 'dont know..', '2014-05-01 22:45:41'),
(81, 'hi', '2014-05-02 00:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `allday` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `title`, `start`, `end`, `url`, `allday`) VALUES
(1, 'we have a meeting today', '2014-04-16 00:00:00', '2014-04-16 00:00:00', '', ''),
(2, 'come to  my home', '2014-04-02 00:00:00', '0000-00-00 00:00:00', 'www.google.com', ''),
(3, 'classes of java', '2014-03-13 07:00:00', '2014-03-13 12:00:00', 'www.google.com', ''),
(4, 'MyEvent', '2014-04-04 00:00:00', '2014-04-04 00:00:00', 'xyz.com', ''),
(24, 'fdhfdhdfh', '2014-05-07 00:00:00', '2014-05-07 00:00:00', 'dfhdfh', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_tb`
--

CREATE TABLE IF NOT EXISTS `post_tb` (
  `post_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `post_type` int(1) NOT NULL,
  `post_text_content` longtext NOT NULL,
  `post_doc_name` varchar(200) NOT NULL,
  `time_of_post` datetime NOT NULL,
  `post_like_counter` mediumint(8) unsigned NOT NULL,
  `report_status` smallint(1) unsigned NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_id` (`post_id`),
  KEY `post_id_2` (`post_id`),
  KEY `post_id_3` (`post_id`),
  KEY `post_id_4` (`post_id`),
  KEY `post_id_5` (`post_id`),
  KEY `post_id_6` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `post_tb`
--

INSERT INTO `post_tb` (`post_id`, `post_type`, `post_text_content`, `post_doc_name`, `time_of_post`, `post_like_counter`, `report_status`) VALUES
(131, 1, 'hu', '', '2014-04-30 01:37:55', 0, 0),
(133, 1, 'asdfas                         <br/>sdfffffffffffffffffffffffffff                   sadfffffffffffffffff          faaaaaaaaaa       fffffff       ad<br/> <br/>asdf<br/>df<br/><br/> <br/>f<br/><br/>fs<br/>f<br/>f<br/>sdg<br/><br/><br/><br/><br/>ff<br/><br/><br/>', '', '2014-04-30 10:58:41', 1, 1),
(134, 2, '', 'images.jpg', '2014-05-01 16:28:16', 0, 0),
(136, 3, '', 'my_notes_css (1).docx', '2014-05-01 22:32:51', 0, 0),
(137, 6, '', 'information (1).txt', '2014-05-01 22:33:18', 0, 1),
(138, 2, '', '1000817_672376042776490_382319775_n.jpeg', '2014-05-01 22:33:41', 1, 0),
(139, 2, '', '1000817_672376042776490_382319775_n.jpeg', '2014-05-01 22:39:14', 0, 0),
(141, 1, 'hello... ', '', '2014-05-01 22:44:17', 0, 0),
(142, 6, '', 'information (1).txt', '2014-05-01 22:44:42', 0, 0),
(143, 1, 'bhavin`s first post...', '', '2014-05-01 22:47:59', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quote_tb`
--

CREATE TABLE IF NOT EXISTS `quote_tb` (
  `id` int(2) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_tb`
--

INSERT INTO `quote_tb` (`id`, `content`) VALUES
(1, 'A successful man is one who makes more money than his wife can spend. A successful woman is one who can find such a man.'),
(2, 'My grandmother started walking five miles a day when she was sixty. She''''s ninety-seven now, and we don''''t know where she is.'),
(3, 'If you see a guy opening a car door for a girl, it is one of two things, either a new girl, or a new car'),
(4, 'My doctor gave me six months to live, but when I couldn''t pay the bill he gave me six months more.'),
(5, 'The brain is the most outstanding organ. It works for 24 hours, 365 days, right from your birth, until you step in the exam hall.'),
(6, 'I am doing study and giving exam from my childhood but not yet addicted to studies. This is Self Control.'),
(7, 'Remember these two words. They will open up a lot of doors in your life. Push and Pull.');

-- --------------------------------------------------------

--
-- Table structure for table `report_tb`
--

CREATE TABLE IF NOT EXISTS `report_tb` (
  `report_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `report_type` smallint(1) unsigned NOT NULL,
  `report_name` varbinary(200) NOT NULL,
  `about_report` longtext NOT NULL,
  `time_of_post_report` datetime NOT NULL,
  `for_year` smallint(1) unsigned NOT NULL,
  PRIMARY KEY (`report_id`),
  KEY `post_id` (`report_id`),
  KEY `post_id_2` (`report_id`),
  KEY `post_id_3` (`report_id`),
  KEY `post_id_4` (`report_id`),
  KEY `post_id_5` (`report_id`),
  KEY `post_id_6` (`report_id`),
  KEY `report_id` (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `report_tb`
--

INSERT INTO `report_tb` (`report_id`, `report_type`, `report_name`, `about_report`, `time_of_post_report`, `for_year`) VALUES
(140, 1, 'Book1.xlsx', '', '2014-05-01 00:12:01', 0),
(147, 2, 'Book1.xlsx', 'This is Result of Ty', '2014-05-01 01:14:41', 0),
(148, 1, 'Book1.xlsx', '', '2014-05-01 02:51:19', 0),
(149, 1, 'Attendence_report.xlsx', '', '2014-05-01 13:19:28', 3),
(150, 1, 'Attendence_report.xlsx', 'Attendence Report For Third Year.', '2014-05-01 13:27:35', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_education_tb`
--

CREATE TABLE IF NOT EXISTS `user_education_tb` (
  `pattern_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `school_name` varchar(30) NOT NULL,
  `clg_name` varchar(30) NOT NULL,
  `stream` varchar(30) NOT NULL,
  `batch_year` mediumint(4) unsigned NOT NULL,
  PRIMARY KEY (`pattern_id`),
  KEY `pattern_id` (`pattern_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_education_tb`
--

INSERT INTO `user_education_tb` (`pattern_id`, `school_name`, `clg_name`, `stream`, `batch_year`) VALUES
(1, 'VishwaniKetan Vidhyvihar', 'K.S.School Of Business Managem', 'MSC', 2011),
(2, 'gls', 'ks', 'sy', 2013);

-- --------------------------------------------------------

--
-- Table structure for table `user_friends_tb`
--

CREATE TABLE IF NOT EXISTS `user_friends_tb` (
  `pattern_id` smallint(5) unsigned NOT NULL,
  `fpattern_id` smallint(5) unsigned NOT NULL,
  KEY `pattern_id` (`pattern_id`),
  KEY `fpattern_id` (`fpattern_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_friends_tb`
--

INSERT INTO `user_friends_tb` (`pattern_id`, `fpattern_id`) VALUES
(1, 2),
(2, 1),
(1, 3),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_friend_req_tb`
--

CREATE TABLE IF NOT EXISTS `user_friend_req_tb` (
  `pattern_id` smallint(5) unsigned NOT NULL,
  `fpattern_id` smallint(5) unsigned NOT NULL,
  KEY `pattern_id` (`pattern_id`),
  KEY `fpattern_id` (`fpattern_id`),
  KEY `fpattern_id_2` (`fpattern_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notification_tb`
--

CREATE TABLE IF NOT EXISTS `user_notification_tb` (
  `pattern_id` smallint(5) unsigned NOT NULL,
  `post_id` int(5) unsigned NOT NULL,
  `type_of_notification` smallint(1) unsigned NOT NULL,
  `notifier_id` smallint(5) unsigned NOT NULL,
  KEY `post_id` (`post_id`),
  KEY `notifier_id` (`notifier_id`),
  KEY `notifier_id_2` (`notifier_id`),
  KEY `notifier_id_3` (`notifier_id`),
  KEY `pattern_id` (`pattern_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_personal_tb`
--

CREATE TABLE IF NOT EXISTS `user_personal_tb` (
  `pattern_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nationality` varchar(30) NOT NULL,
  `skill` varchar(30) NOT NULL,
  `hobbie` varchar(30) NOT NULL,
  `interest` varchar(30) NOT NULL,
  `rel_status` varchar(20) NOT NULL,
  KEY `pattern_id` (`pattern_id`),
  KEY `pattern_id_2` (`pattern_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_personal_tb`
--

INSERT INTO `user_personal_tb` (`pattern_id`, `nationality`, `skill`, `hobbie`, `interest`, `rel_status`) VALUES
(1, 'indian', 'prgming.', 'music', 'guitar', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_comment_tb`
--

CREATE TABLE IF NOT EXISTS `user_post_comment_tb` (
  `post_id` int(5) unsigned NOT NULL,
  `comment_id` int(5) unsigned NOT NULL,
  `fpattern_id` smallint(5) unsigned NOT NULL,
  KEY `comment_id` (`comment_id`),
  KEY `post_id` (`post_id`),
  KEY `comment_id_2` (`comment_id`),
  KEY `fpattern_id` (`fpattern_id`),
  KEY `comment_id_3` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post_comment_tb`
--

INSERT INTO `user_post_comment_tb` (`post_id`, `comment_id`, `fpattern_id`) VALUES
(133, 72, 1),
(131, 73, 1),
(138, 74, 2),
(142, 75, 2),
(142, 76, 2),
(142, 77, 2),
(142, 78, 2),
(142, 79, 2),
(142, 80, 2),
(143, 81, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_post_liked_tb`
--

CREATE TABLE IF NOT EXISTS `user_post_liked_tb` (
  `fpattern_id` smallint(5) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  KEY `post_id` (`post_id`),
  KEY `post_id_2` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post_liked_tb`
--

INSERT INTO `user_post_liked_tb` (`fpattern_id`, `post_id`) VALUES
(1, 133),
(2, 138);

-- --------------------------------------------------------

--
-- Table structure for table `user_post_tb`
--

CREATE TABLE IF NOT EXISTS `user_post_tb` (
  `pattern_id` smallint(5) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  KEY `pattern_id` (`pattern_id`),
  KEY `post_id` (`post_id`),
  KEY `post_id_2` (`post_id`),
  KEY `post_id_3` (`post_id`),
  KEY `post_id_4` (`post_id`),
  KEY `pattern_id_2` (`pattern_id`),
  KEY `post_id_5` (`post_id`),
  KEY `pattern_id_3` (`pattern_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post_tb`
--

INSERT INTO `user_post_tb` (`pattern_id`, `post_id`) VALUES
(1, 131),
(1, 133),
(1, 134),
(1, 136),
(1, 137),
(2, 138),
(2, 139),
(2, 141),
(2, 142),
(1, 143);

-- --------------------------------------------------------

--
-- Table structure for table `user_reg_tb`
--

CREATE TABLE IF NOT EXISTS `user_reg_tb` (
  `pattern_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `enrollment_no` smallint(4) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `login_status` tinyint(1) NOT NULL,
  `on_off_user_status` tinyint(1) NOT NULL,
  `user_del_status` smallint(1) unsigned NOT NULL,
  `user_block_status` tinyint(3) unsigned NOT NULL,
  `privacy_status` tinyint(1) unsigned NOT NULL,
  `approve_status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`pattern_id`),
  KEY `pattern_id` (`pattern_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user_reg_tb`
--

INSERT INTO `user_reg_tb` (`pattern_id`, `user_id`, `password`, `first_name`, `last_name`, `enrollment_no`, `gender`, `dob`, `login_status`, `on_off_user_status`, `user_del_status`, `user_block_status`, `privacy_status`, `approve_status`) VALUES
(1, 'harshsoni111093@gmail.com', 'harshsoni', 'Harsh', 'Soni', 3160, 1, '1993-10-11', 0, 1, 0, 0, 2, 1),
(2, 'shah2010bhavin@gmail.com', 'bhavinshah', 'Bhavin', 'Shah', 3146, 1, '1993-10-26', 0, 1, 0, 1, 2, 1),
(3, 'aditfadia@gmail.com', 'aditfadia', 'Adit', 'Fadia', 3106, 1, '2013-11-04', 0, 1, 0, 0, 2, 0),
(4, 'sagartrivedi@gmail.com', 'sagar', 'Sagar', 'Trivedi', 3166, 1, '1993-10-26', 0, 1, 0, 0, 2, 0),
(5, 'sanjay@gmail.com', 'sanjayprajapati', 'Sanjay', 'Prajapati', 3140, 1, '1994-08-16', 0, 1, 0, 0, 2, 0),
(6, 'hardikdarji@gmail.com', 'hardikdarji', 'Hardik', 'Darji', 3099, 1, '1993-09-27', 0, 1, 0, 0, 2, 0),
(7, 'harsh@gmail.com', 'harsh', 'harsh', 'soni', 1234, 1, '2014-04-13', 0, 1, 0, 0, 2, 1),
(9, 'harsh1234@gmail.com', 'harsh', 'harsh', 'soni', 1234, 1, '2014-04-20', 0, 1, 0, 1, 2, 2),
(13, 'kedar@gmail.com', 'kedar', 'kedar', 'thakkar', 1234, 1, '2014-04-28', 0, 1, 0, 0, 2, 1),
(14, 'parth@gmail.com', 'parth', 'Parth', 'Seth', 3155, 1, '2014-04-15', 0, 1, 0, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_security_tb`
--

CREATE TABLE IF NOT EXISTS `user_security_tb` (
  `pattern_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `sec_que` varchar(30) NOT NULL,
  `ans` varchar(30) NOT NULL,
  `phono_no` bigint(10) unsigned NOT NULL,
  PRIMARY KEY (`pattern_id`),
  KEY `pattern_id` (`pattern_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_security_tb`
--

INSERT INTO `user_security_tb` (`pattern_id`, `sec_que`, `ans`, `phono_no`) VALUES
(1, ' Enter your Favourite Actor ', 'hu', 9712971767);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_post_tb`
--
ALTER TABLE `admin_post_tb`
  ADD CONSTRAINT `admin_post_tb_ibfk_1` FOREIGN KEY (`pattern_id`) REFERENCES `admin_login_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_post_tb_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `admin_post_det_tb` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_report_tb`
--
ALTER TABLE `admin_report_tb`
  ADD CONSTRAINT `admin_report_tb_ibfk_1` FOREIGN KEY (`reporter_id`) REFERENCES `admin_login_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_report_tb_ibfk_2` FOREIGN KEY (`report_id`) REFERENCES `report_tb` (`report_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_education_tb`
--
ALTER TABLE `user_education_tb`
  ADD CONSTRAINT `user_education_tb_ibfk_1` FOREIGN KEY (`pattern_id`) REFERENCES `user_reg_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_friends_tb`
--
ALTER TABLE `user_friends_tb`
  ADD CONSTRAINT `user_friends_tb_ibfk_1` FOREIGN KEY (`pattern_id`) REFERENCES `user_reg_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_friends_tb_ibfk_2` FOREIGN KEY (`fpattern_id`) REFERENCES `user_reg_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_friend_req_tb`
--
ALTER TABLE `user_friend_req_tb`
  ADD CONSTRAINT `user_friend_req_tb_ibfk_1` FOREIGN KEY (`pattern_id`) REFERENCES `user_reg_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_friend_req_tb_ibfk_2` FOREIGN KEY (`fpattern_id`) REFERENCES `user_reg_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_notification_tb`
--
ALTER TABLE `user_notification_tb`
  ADD CONSTRAINT `user_notification_tb_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_tb` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_notification_tb_ibfk_2` FOREIGN KEY (`notifier_id`) REFERENCES `user_reg_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_notification_tb_ibfk_3` FOREIGN KEY (`pattern_id`) REFERENCES `user_reg_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_personal_tb`
--
ALTER TABLE `user_personal_tb`
  ADD CONSTRAINT `user_personal_tb_ibfk_1` FOREIGN KEY (`pattern_id`) REFERENCES `user_reg_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_post_comment_tb`
--
ALTER TABLE `user_post_comment_tb`
  ADD CONSTRAINT `user_post_comment_tb_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_tb` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_post_comment_tb_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comment_tb` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_post_liked_tb`
--
ALTER TABLE `user_post_liked_tb`
  ADD CONSTRAINT `user_post_liked_tb_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_tb` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_post_tb`
--
ALTER TABLE `user_post_tb`
  ADD CONSTRAINT `user_post_tb_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_tb` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_post_tb_ibfk_2` FOREIGN KEY (`pattern_id`) REFERENCES `user_reg_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_security_tb`
--
ALTER TABLE `user_security_tb`
  ADD CONSTRAINT `user_security_tb_ibfk_1` FOREIGN KEY (`pattern_id`) REFERENCES `user_reg_tb` (`pattern_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
