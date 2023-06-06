-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 23-06-06 11:11
-- 서버 버전: 8.0.32
-- PHP 버전: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `lilarcor277`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `account`
--

INSERT INTO `account` (`id`, `username`, `pw`) VALUES
(1, 'junyeong', '111'),
(2, 'yeongjae', '111');

-- --------------------------------------------------------

--
-- 테이블 구조 `log`
--

CREATE TABLE `log` (
  `id` int NOT NULL,
  `time` time NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `page_content`
--

CREATE TABLE `page_content` (
  `person` varchar(255) NOT NULL,
  `id` int NOT NULL,
  `page_num` int NOT NULL,
  `file1` varchar(255) NOT NULL,
  `file2` varchar(255) NOT NULL,
  `file3` varchar(255) NOT NULL,
  `content1` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content2` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content3` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `page_information` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `page_content`
--

INSERT INTO `page_content` (`person`, `id`, `page_num`, `file1`, `file2`, `file3`, `content1`, `content2`, `content3`, `page_information`) VALUES
('junyeong', 1, 1, '5.jpg', '', '', 'I\'m enjoying', '', '', 'h'),
('junyeong', 2, 2, '9.jpg', '6.jpg', '8.jpg', '', 'If I were asked to choose a friend for my life, I would choose a computer. When I was in kindergarten, I tried to make a StarCraft map, I started making flash games in elementary school, and I started making game with programming in middle school, and I tried to develop an app in high school. and I was the top of computer club in high school. I loved computers so much, but after I decided to choose studying between studying and computer in high school, the computer wasn\'t important for me. In the meantime, I met someone in New Zealand who\'s enlightened, also he affect me. and I managed to try my computer again.', '', 'c'),
('junyeong', 3, 3, '13.jpg', '15.jpg', '', 'In fact, my goal is to make 10 billion won (NZD 13 Million). I had a conflict in high school with real problems and what I wanted to do, and I thought it would continue to come to my life. So I got away from the problem of living and I had that goal in mind because I wanted to do what I wanted to do. For other reasons, I want to contribute to others. It\'s hard for everyone around us to live, and it makes me happy to think that I can give them a little happiness. For these two reasons, I want to make 10 billion won.', 'The picture above is Maldives, the place I want to visit the most. I would be very happy if I went to Maldives with my loved ones.', 'So when I thought about how to make a lot of money, I came up with three answers in Korea. Stocks, real estate sales, and business. Among them, I\'m studying stocks that are easy to access and can start with with less money.\r\n\r\nFirst of all, in order to make big money, my stock skills must be supported. So I decided to make NZD1000 with NZD350 as a short term goal and I am in the process now.', 'c');

-- --------------------------------------------------------

--
-- 테이블 구조 `reply`
--

CREATE TABLE `reply` (
  `id` int NOT NULL,
  `reply_status` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `content_index` int NOT NULL,
  `date` date NOT NULL,
  `ip` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `page_content`
--
ALTER TABLE `page_content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
