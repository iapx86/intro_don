-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016 年 10 朁E21 日 10:55
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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--

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
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=473 DEFAULT CHARSET=utf8;

-
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
) ENGINE=InnoDB AUTO_INCREMENT=1432 DEFAULT CHARSET=utf8;

--
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=473;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1432;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
