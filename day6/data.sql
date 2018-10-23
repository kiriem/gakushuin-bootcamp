-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 10 月 23 日 09:49
-- サーバのバージョン： 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sql-example`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `my_favorite_foods`
--

CREATE TABLE `my_favorite_foods` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `my_favorite_foods`
--

INSERT INTO `my_favorite_foods` (`id`, `food_name`, `reason`) VALUES
(1, 'うどん', '好き'),
(2, 'そば', '信州の味'),
(3, 'そば', '信州の味'),
(4, 'お寿司', '国民的料理'),
(5, 'お寿司', '国民的料理');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_favorite_foods`
--
ALTER TABLE `my_favorite_foods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_favorite_foods`
--
ALTER TABLE `my_favorite_foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
