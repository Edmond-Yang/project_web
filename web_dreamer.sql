-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-12-28 05:05:32
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
-- 資料表結構 `ab@gmail.com`
--

CREATE TABLE `ab@gmail.com` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `html` longtext NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `ab@gmail.com`
--

INSERT INTO `ab@gmail.com` (`id`, `name`, `html`, `modify_time`) VALUES
(2, 'default', '', '2022-12-27 13:44:49'),
(3, 'default', '', '2022-12-27 13:44:52');

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`email`, `password`, `image`) VALUES
('ggu@gmail.com', '11049090', 0),
('bao@gmail.com', '11111111', 0),
('tt@gmail.com', '11111111', 0),
('qq@gmail.com', '11111111', 0),
('a@gmail.com', '11111111', 0),
('r@gmail.com', '00000000', 0),
('t@gmail.com', '11111111', 2),
('dudu1234@gmail.com', '00000000', 3),
('ab@gmail.com', '12345678', 0);

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
-- 資料表結構 `dudu1234@gmail.com`
--

CREATE TABLE `dudu1234@gmail.com` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `html` longtext NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `dudu1234@gmail.com`
--

INSERT INTO `dudu1234@gmail.com` (`id`, `name`, `html`, `modify_time`) VALUES
(1, 'default', '', '2022-12-26 13:31:14'),
(2, 'default', '', '2022-12-26 15:48:55');

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
(13, 'default', '', '2022-12-26 10:53:29');

-- --------------------------------------------------------

--
-- 資料表結構 `image`
--

CREATE TABLE `image` (
  `email` text DEFAULT NULL,
  `projectid` int(11) DEFAULT NULL,
  `blockid` int(11) DEFAULT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `image`
--

INSERT INTO `image` (`email`, `projectid`, `blockid`, `filename`, `path`) VALUES
(NULL, 1, 2, 'tubingen.jpg', 'C:xampp	mpphp6E29.tmp'),
(NULL, 1, 2, 'm.jpg', 'C:xampp	mpphp8F4E.tmp'),
(NULL, 1, 2, 'm.jpg', 'C:xampp	mpphpF8D7.tmp'),
(NULL, 1, 2, 'tubingen.jpg', 'C:xampp	mpphp2864.tmp'),
(NULL, 1, 2, 'tubingen.jpg', 'C:xampp	mpphpADA9.tmp'),
(NULL, 1, 2, 'o.jpg', 'C:xampp	mpphp3D77.tmp'),
(NULL, 1, 2, 'o.jpg', 'C:xampp	mpphpFFA.tmp'),
(NULL, 1, 2, 'the_scream.jpg', 'C:xampp	mpphp3229.tmp'),
(NULL, 1, 2, 'the_scream.jpg', 'C:xampp	mpphp843.tmp'),
(NULL, 1, 2, 'tubingen.jpg', 'C:xampp	mpphp4C81.tmp'),
(NULL, 1, 2, 'tubingen.jpg', 'C:xampp	mpphpCEB2.tmp'),
(NULL, 1, 2, 'tubingen.jpg', 'C:xampp	mpphpFAC4.tmp'),
(NULL, 1, 2, 'tubingen.jpg', 'C:xampp	mpphp350F.tmp'),
(NULL, 1, 2, 'tubingen.jpg', 'C:xampp	mpphp771A.tmp'),
(NULL, 1, 2, 'tubingen.jpg', 'C:xampp	mpphp88A0.tmp'),
(NULL, 1, 2, 'm.jpg', 'C:xampp	mpphpB176.tmp'),
(NULL, 1, 2, 'm.jpg', 'C:xampp	mpphp189D.tmp'),
(NULL, 1, 2, 'o.jpg', 'C:xampp	mpphp3B78.tmp'),
(NULL, 1, 2, 'o.jpg', 'C:xampp	mpphp82BE.tmp'),
(NULL, 1, 2, 'tubingen.jpg', 'C:xampp	mpphpA645.tmp'),
(NULL, 1, 2, 'tubingen.jpg', NULL),
(NULL, 1, 2, 'tubingen.jpg', NULL),
(NULL, 1, 2, 'tubingen.jpg', NULL),
(NULL, 1, 2, 'o.jpg', NULL);

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
-- 資料表結構 `r@gmail.com`
--

CREATE TABLE `r@gmail.com` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `html` longtext NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `t@gmail.com`
--

CREATE TABLE `t@gmail.com` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `html` longtext NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `t@gmail.com`
--

INSERT INTO `t@gmail.com` (`id`, `name`, `html`, `modify_time`) VALUES
(2, 'default', '', '2022-12-26 12:17:44'),
(6, 'default', '', '2022-12-26 12:33:20'),
(8, 'default', '', '2022-12-26 12:37:25');

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
-- 資料表索引 `ab@gmail.com`
--
ALTER TABLE `ab@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bao@gmail.com`
--
ALTER TABLE `bao@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `dudu1234@gmail.com`
--
ALTER TABLE `dudu1234@gmail.com`
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
-- 資料表索引 `r@gmail.com`
--
ALTER TABLE `r@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `t@gmail.com`
--
ALTER TABLE `t@gmail.com`
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
-- 使用資料表自動遞增(AUTO_INCREMENT) `ab@gmail.com`
--
ALTER TABLE `ab@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bao@gmail.com`
--
ALTER TABLE `bao@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `dudu1234@gmail.com`
--
ALTER TABLE `dudu1234@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ggu@gmail.com`
--
ALTER TABLE `ggu@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `qq@gmail.com`
--
ALTER TABLE `qq@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `r@gmail.com`
--
ALTER TABLE `r@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `t@gmail.com`
--
ALTER TABLE `t@gmail.com`
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
