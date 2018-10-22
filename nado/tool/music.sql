-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 03:18 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `name` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `time` varchar(12) COLLATE utf8mb4_bin NOT NULL,
  `public` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `id` int(8) NOT NULL,
  `lyric` varchar(5000) COLLATE utf8mb4_bin NOT NULL,
  `subfix` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `publicTime` varchar(12) COLLATE utf8mb4_bin NOT NULL,
  `playNum` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`name`, `time`, `public`, `id`, `lyric`, `subfix`, `publicTime`, `playNum`) VALUES
('〔大哥〕爱情买卖', '2018.10.19', '无名网友', 1544985544, '            ', 'mp3', '2018.10.19', 9),
('Alan Walker,Noah Cyrus,Digital Farm Animals - All Falls Down', '2018.10.19', '我', 1547971593, '123\r\n1234\r\n12345\r\n1234556\r\n21423\r\n2423\r\n32423\r\n32423\r\n43342\r\n2\r\n324\r\n34\r\n342\r\n342\r\n324\r\n342\r\n324\r\n342\r\n342\r\n342 ', 'mp3', '2000.1.1', 3),
('上里与手抄卷 - 双笙,闫东炜', '2018.10.20', '无名网友', 1553013544, '            ', 'mp3', '2018.10.20', 2),
('Alan Walker,Iselin Solheim - Faded', '2018.10.21', '无名网友', 1548669147, '            ', 'mp3', '2018.10.21', 0),
('Alan Walker,Noah Cyrus,Digital Farm Animals - All Falls Down', '2018.10.21', '无名网友', 1548130875, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔刀妹〕 千秋月别西楚将', '2018.10.21', '无名网友', 1546601658, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔纳豆〕Song # 1', '2018.10.21', '无名网友', 1544489497, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔纳豆〕起风了', '2018.10.21', '无名网友', 1547592464, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔纳豆〕贼', '2018.10.21', '无名网友', 1545431207, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大刀素豆〕九九八十一 四连', '2018.10.21', '无名网友', 1561006437, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕大花轿', '2018.10.21', '无名网友', 1545341383, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕高贵与丑', '2018.10.21', '无名网友', 1545962958, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕嫁妆', '2018.10.21', '无名网友', 1545247002, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕浪费 (1)', '2018.10.21', '无名网友', 1552817706, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕梦回还', '2018.10.21', '无名网友', 1550153361, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕你敢我就敢', '2018.10.21', '无名网友', 1546349320, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕骗赖', '2018.10.21', '无名网友', 1543942663, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕杀破狼', '2018.10.21', '无名网友', 1544420373, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕玩老贾', '2018.10.21', '无名网友', 1543370476, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕小半', '2018.10.21', '无名网友', 1547383611, '            ', 'mp3', '2018.10.21', 0),
('JayeLu - 〔大豆〕小棋童', '2018.10.21', '无名网友', 1545409013, '            ', 'mp3', '2018.10.21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `updateTime` int(10) NOT NULL,
  `musicList` varchar(10000) COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`updateTime`, `musicList`) VALUES
(1540114923, ':1544985544:〔大哥〕爱情买卖:mp3:无名网友:1547971593:Alan Walker,Noah Cyrus,Digital Farm Animals - All Falls Down:mp3:我:1553013544:上里与手抄卷 - 双笙,闫东炜:mp3:无名网友:1545247002:JayeLu - 〔大豆〕嫁妆:mp3:无名网友:1547383611:JayeLu - 〔大豆〕小半:mp3:无名网友:1543370476:JayeLu - 〔大豆〕玩老贾:mp3:无名网友:1544420373:JayeLu - 〔大豆〕杀破狼:mp3:无名网友:1543942663:JayeLu - 〔大豆〕骗赖:mp3:无名网友:1546349320:JayeLu - 〔大豆〕你敢我就敢:mp3:无名网友:1550153361:JayeLu - 〔大豆〕梦回还:mp3:无名网友:1552817706:JayeLu - 〔大豆〕浪费 (1):mp3:无名网友:1545341383:JayeLu - 〔大豆〕大花轿:mp3:无名网友:1545962958:JayeLu - 〔大豆〕高贵与丑:mp3:无名网友:1561006437:JayeLu - 〔大刀素豆〕九九八十一 四连:mp3:无名网友:1545431207:JayeLu - 〔纳豆〕贼:mp3:无名网友:1547592464:JayeLu - 〔纳豆〕起风了:mp3:无名网友:1544489497:JayeLu - 〔纳豆〕Song # 1:mp3:无名网友:1546601658:JayeLu - 〔刀妹〕 千秋月别西楚将:mp3:无名网友:1548130875:Alan Walker,Noah Cyrus,Digital Farm Animals - All Falls Down:mp3:无名网友:1548669147:Alan Walker,Iselin Solheim - Faded:mp3:无名网友');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `collect` varchar(16000) COLLATE utf8mb4_bin NOT NULL,
  `open_id` varchar(30) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `collect`, `open_id`) VALUES
(1249492317, '', ':1544985544:〔大哥〕爱情买卖:mp3:无名网友:1547971593:Alan Walker,Noah Cyrus,Digital Farm Animals - All Falls Down:mp3:我:', 'oqPob5HBgiPvz4gcH7lCxmfKplvU');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
