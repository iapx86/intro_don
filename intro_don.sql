-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016 年 10 朁E06 日 16:28
-- サーバのバージョン： 5.5.49-log
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intro_don`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL,
  `question1_correct_songid` int(11) NOT NULL,
  `question1_select1_songid` int(11) NOT NULL,
  `question1_select2_songid` int(11) NOT NULL,
  `question1_select3_songid` int(11) NOT NULL,
  `question1_select4_songid` int(11) NOT NULL,
  `question2_correct_songid` int(11) NOT NULL,
  `question2_select1_songid` int(11) NOT NULL,
  `question2_select2_songid` int(11) NOT NULL,
  `question2_select3_songid` int(11) NOT NULL,
  `question2_select4_songid` int(11) NOT NULL,
  `question3_correct_songid` int(11) NOT NULL,
  `question3_select1_songid` int(11) NOT NULL,
  `question3_select2_songid` int(11) NOT NULL,
  `question3_select3_songid` int(11) NOT NULL,
  `question3_select4_songid` int(11) NOT NULL,
  `question4_correct_songid` int(11) NOT NULL,
  `question4_select1_songid` int(11) NOT NULL,
  `question4_select2_songid` int(11) NOT NULL,
  `question4_select3_songid` int(11) NOT NULL,
  `question4_select4_songid` int(11) NOT NULL,
  `question5_correct_songid` int(11) NOT NULL,
  `question5_select1_songid` int(11) NOT NULL,
  `question5_select2_songid` int(11) NOT NULL,
  `question5_select3_songid` int(11) NOT NULL,
  `question5_select4_songid` int(11) NOT NULL,
  `question6_correct_songid` int(11) NOT NULL,
  `question6_select1_songid` int(11) NOT NULL,
  `question6_select2_songid` int(11) NOT NULL,
  `question6_select3_songid` int(11) NOT NULL,
  `question6_select4_songid` int(11) NOT NULL,
  `question7_correct_songid` int(11) NOT NULL,
  `question7_select1_songid` int(11) NOT NULL,
  `question7_select2_songid` int(11) NOT NULL,
  `question7_select3_songid` int(11) NOT NULL,
  `question7_select4_songid` int(11) NOT NULL,
  `question8_correct_songid` int(11) NOT NULL,
  `question8_select1_songid` int(11) NOT NULL,
  `question8_select2_songid` int(11) NOT NULL,
  `question8_select3_songid` int(11) NOT NULL,
  `question8_select4_songid` int(11) NOT NULL,
  `question9_correct_songid` int(11) NOT NULL,
  `question9_select1_songid` int(11) NOT NULL,
  `question9_select2_songid` int(11) NOT NULL,
  `question9_select3_songid` int(11) NOT NULL,
  `question9_select4_songid` int(11) NOT NULL,
  `question10_correct_songid` int(11) NOT NULL,
  `question10_select1_songid` int(11) NOT NULL,
  `question10_select2_songid` int(11) NOT NULL,
  `question10_select3_songid` int(11) NOT NULL,
  `question10_select4_songid` int(11) NOT NULL,
  `entry_user1` int(11) DEFAULT NULL,
  `entry_user2` int(11) DEFAULT NULL,
  `entry_user3` int(11) DEFAULT NULL,
  `entry_user4` int(11) DEFAULT NULL,
  `entry_user5` int(11) DEFAULT NULL,
  `gold_user` int(11) DEFAULT NULL,
  `silver_user` int(11) DEFAULT NULL,
  `bronze_user` int(11) DEFAULT NULL,
  `gold_score` int(11) DEFAULT NULL,
  `silver_score` int(11) DEFAULT NULL,
  `bronze_score` int(11) DEFAULT NULL,
  `host` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `games`
--

INSERT INTO `games` (`id`, `question1_correct_songid`, `question1_select1_songid`, `question1_select2_songid`, `question1_select3_songid`, `question1_select4_songid`, `question2_correct_songid`, `question2_select1_songid`, `question2_select2_songid`, `question2_select3_songid`, `question2_select4_songid`, `question3_correct_songid`, `question3_select1_songid`, `question3_select2_songid`, `question3_select3_songid`, `question3_select4_songid`, `question4_correct_songid`, `question4_select1_songid`, `question4_select2_songid`, `question4_select3_songid`, `question4_select4_songid`, `question5_correct_songid`, `question5_select1_songid`, `question5_select2_songid`, `question5_select3_songid`, `question5_select4_songid`, `question6_correct_songid`, `question6_select1_songid`, `question6_select2_songid`, `question6_select3_songid`, `question6_select4_songid`, `question7_correct_songid`, `question7_select1_songid`, `question7_select2_songid`, `question7_select3_songid`, `question7_select4_songid`, `question8_correct_songid`, `question8_select1_songid`, `question8_select2_songid`, `question8_select3_songid`, `question8_select4_songid`, `question9_correct_songid`, `question9_select1_songid`, `question9_select2_songid`, `question9_select3_songid`, `question9_select4_songid`, `question10_correct_songid`, `question10_select1_songid`, `question10_select2_songid`, `question10_select3_songid`, `question10_select4_songid`, `entry_user1`, `entry_user2`, `entry_user3`, `entry_user4`, `entry_user5`, `gold_user`, `silver_user`, `bronze_user`, `gold_score`, `silver_score`, `bronze_score`, `host`, `created`, `modified`) VALUES
(1, 90, 93, 37, 23, 90, 94, 94, 61, 99, 27, 53, 77, 53, 5, 78, 30, 30, 77, 1, 85, 17, 17, 45, 84, 10, 7, 15, 1, 7, 59, 71, 71, 72, 50, 94, 60, 60, 49, 76, 23, 22, 32, 77, 5, 22, 8, 55, 8, 100, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-10-05 07:32:23', '0000-00-00 00:00:00'),
(2, 55, 78, 55, 96, 2, 1, 64, 80, 1, 54, 41, 47, 41, 17, 75, 19, 9, 4, 25, 19, 20, 86, 20, 88, 13, 6, 62, 66, 6, 99, 48, 48, 72, 83, 91, 53, 99, 38, 49, 53, 17, 78, 83, 27, 17, 11, 98, 52, 77, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-10-05 07:35:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `botton_number` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `result` tinyint(1) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `game_id`, `score`, `botton_number`, `correct`, `result`, `created`, `modified`) VALUES
(1, 1, 1, 50, 1, 1, 1, '2016-10-06 05:09:38', '0000-00-00 00:00:00'),
(2, 2, 1, 30, 2, 2, 1, '2016-10-06 05:05:32', '0000-00-00 00:00:00'),
(3, 1, 3, 20, 4, 3, NULL, '2016-10-06 05:05:32', '0000-00-00 00:00:00'),
(4, 2, 2, 5, 2, 2, 1, '2016-10-06 06:50:00', '0000-00-00 00:00:00'),
(5, 1, 1, 100, 1, 1, 1, '2016-10-06 06:28:30', '0000-00-00 00:00:00'),
(6, 3, 3, 999, 3, 3, 1, '2016-10-06 06:50:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `rankings`
--

CREATE TABLE IF NOT EXISTS `rankings` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_score` int(11) NOT NULL,
  `start_event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_event` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifid` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL,
  `first_score` int(11) NOT NULL,
  `second_score` int(11) NOT NULL,
  `third_score` int(11) NOT NULL,
  `fourth_score` int(11) NOT NULL,
  `fifth_score` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `jacket_img` varchar(255) NOT NULL,
  `preview` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sum_answer` int(11) DEFAULT NULL,
  `sum_correct` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `sum_score` int(11) DEFAULT NULL,
  `gold_count` int(11) DEFAULT NULL,
  `silver_count` int(11) DEFAULT NULL,
  `blonze_count` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `sum_answer`, `sum_correct`, `rate`, `sum_score`, `gold_count`, `silver_count`, `blonze_count`, `created`, `modified`) VALUES
(1, 'test', '$2a$10$.4eENyBYACiwsirTT7cE4.GAs0lfynhFNOnk0qvUN5L08AMluqD0u', 3, 2, 0.67, 170, 1, 1, 1, '2016-10-05 07:13:59', '2016-10-05 07:13:59'),
(2, 'test21', '$2a$10$hNYDrLM72Nr8.abd3YUwH.Ys7nQzFwyX.31S56/E1JaLwjCci81Fy', 2, 2, 1, 35, NULL, NULL, NULL, '2016-10-05 07:12:07', '2016-10-05 07:12:07'),
(3, 'tete', '$2a$10$5qPx1ZK5x3fAguLINmAULOXr1Ix8sNUs7LDOCzH4eU0lGtS50Ppuu', 1, 1, 1, 999, NULL, NULL, NULL, '2016-10-05 07:08:39', '0000-00-00 00:00:00'),
(4, 'test', '$2a$10$i5qMeYL1qFn36AhtwtV.3ubOD5xtMPM7VZK2PfDtXEm6hJWeX/yB2', 0, 0, NULL, NULL, NULL, NULL, NULL, '2016-10-05 07:28:48', '0000-00-00 00:00:00'),
(5, 'benq', '$2a$10$iuW4iJvdEzEcTQ48P2ydDegSAQhWNVtyNpUh.7tu2/w3RXT/1k55e', 0, 0, NULL, NULL, NULL, NULL, NULL, '2016-10-06 05:37:37', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
