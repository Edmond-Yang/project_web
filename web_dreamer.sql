-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-12-25 16:32:09
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `web_dreamer`
--

-- --------------------------------------------------------

--
-- 資料表結構 `a@gmail.com`
--

CREATE TABLE `a@gmail.com` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `html` longtext NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`email`, `password`) VALUES
('ggu@gmail.com', '11049090'),
('bao@gmail.com', '11111111'),
('tt@gmail.com', '11111111'),
('qq@gmail.com', '11111111'),
('a@gmail.com', '11111111');

-- --------------------------------------------------------

--
-- 資料表結構 `bao@gmail.com`
--

CREATE TABLE `bao@gmail.com` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `html` longtext NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `ggu@gmail.com`
--

CREATE TABLE `ggu@gmail.com` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `html` longtext NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `ggu@gmail.com`
--

INSERT INTO `ggu@gmail.com` (`id`, `name`, `html`, `modify_time`) VALUES
(1, 'default', '', '2022-12-25 15:08:49');

-- --------------------------------------------------------

--
-- 資料表結構 `qq@gmail.com`
--

CREATE TABLE `qq@gmail.com` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `html` longtext NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `qq@gmail.com`
--

INSERT INTO `qq@gmail.com` (`id`, `name`, `html`, `modify_time`) VALUES
(8, 'default', '', '2022-12-25 14:46:26'),
(9, 'default', '', '2022-12-25 14:51:55');

-- --------------------------------------------------------

--
-- 資料表結構 `tt@gmail.com`
--

CREATE TABLE `tt@gmail.com` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `html` longtext NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `a@gmail.com`
--
ALTER TABLE `a@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bao@gmail.com`
--
ALTER TABLE `bao@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ggu@gmail.com`
--
ALTER TABLE `ggu@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `qq@gmail.com`
--
ALTER TABLE `qq@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `tt@gmail.com`
--
ALTER TABLE `tt@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `a@gmail.com`
--
ALTER TABLE `a@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bao@gmail.com`
--
ALTER TABLE `bao@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ggu@gmail.com`
--
ALTER TABLE `ggu@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `qq@gmail.com`
--
ALTER TABLE `qq@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tt@gmail.com`
--
ALTER TABLE `tt@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
