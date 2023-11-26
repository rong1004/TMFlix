-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 11:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountplan`
--

CREATE TABLE `accountplan` (
  `planID` int(1) NOT NULL,
  `planPrice` varchar(125) NOT NULL,
  `startAccess_Date` date NOT NULL,
  `endAccess_Date` date NOT NULL,
  `paymentmethod` varchar(25) NOT NULL,
  `Member_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountplan`
--

INSERT INTO `accountplan` (`planID`, `planPrice`, `startAccess_Date`, `endAccess_Date`, `paymentmethod`, `Member_ID`) VALUES
(63, 'RM17/MONTHLY (One device viewing)', '2021-06-22', '2021-07-22', 'FPX', 67),
(64, 'RM17/MONTHLY (One device viewing)', '2021-06-23', '2021-07-23', 'FPX', 72),
(65, 'RM17/MONTHLY (One device viewing)', '2023-11-26', '2023-12-26', 'FPX', 73);

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `Actors_ID` int(11) NOT NULL,
  `Actors_Name` varchar(50) NOT NULL,
  `Actors_Gender` varchar(6) NOT NULL,
  `Actors_Birthday` date NOT NULL,
  `Actors_Country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`Actors_ID`, `Actors_Name`, `Actors_Gender`, `Actors_Birthday`, `Actors_Country`) VALUES
(1, 'Eliza Taylor', 'female', '1989-10-24', 'AU'),
(2, 'Paige Turco', 'female', '1965-05-17', 'US'),
(3, 'Bob Morley', 'male', '1984-12-20', 'AU'),
(4, 'Alex Lawther', 'male', '1995-05-04', 'GB'),
(5, 'Jessica Barden', 'female', '1992-07-21', 'GB'),
(6, 'Molly Parker', 'female', '1972-06-30', 'CA'),
(7, 'Toby Stephens', 'male', '1969-04-21', 'GB'),
(8, 'Penn Badgley', 'male', '1986-11-01', 'US'),
(9, 'Elizabeth Lail', 'female', '1992-03-25', 'US'),
(10, 'Dylan Minnette', 'male', '1996-12-29', 'US'),
(11, 'Katherine Langford', 'female', '1996-04-29', 'AU'),
(12, 'Joel Kinnaman', 'male', '1979-11-25', 'SE'),
(13, 'James Purefoy', 'male', '1964-06-03', 'GB'),
(14, 'Katee Sackhoff', 'female', '1980-04-08', 'US'),
(15, 'Krysten Ritter', 'female', '1981-12-16', 'US'),
(16, 'Rachael Taylor', 'female', '1984-07-11', 'AU'),
(17, 'Joao Miguel', 'male', '1970-01-01', 'BR'),
(18, 'Ursula Corbero', 'female', '1989-08-11', 'ES'),
(19, 'Kiefer Sutherland', 'male', '1966-09-21', 'GB'),
(20, 'Brit Marling', 'female', '1982-08-07', 'US'),
(21, 'Emory Cohen', 'male', '1990-03-13', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `actors_tv`
--

CREATE TABLE `actors_tv` (
  `Actors_ID` int(11) NOT NULL,
  `TvSeries_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actors_tv`
--

INSERT INTO `actors_tv` (`Actors_ID`, `TvSeries_ID`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 3),
(7, 3),
(8, 4),
(9, 4),
(10, 5),
(11, 5),
(12, 6),
(13, 6),
(14, 7),
(15, 8),
(16, 8),
(17, 9),
(18, 10),
(19, 11),
(20, 12),
(21, 12);

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `Awards_ID` int(11) NOT NULL,
  `Awards_Title` varchar(100) NOT NULL,
  `Awards_Winners` varchar(100) NOT NULL,
  `Awards_Nominees` varchar(25) NOT NULL,
  `TvSeries_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`Awards_ID`, `Awards_Title`, `Awards_Winners`, `Awards_Nominees`, `TvSeries_ID`) VALUES
(1, 'Saturn Award', 'Best Youth-Oriented Series on TV', ' Andrew Orloff', 1),
(2, 'Primetime Emmy', 'Outstanding Special and Visual Effect', ' The 100', 1),
(3, 'Primetime Emmy', 'Outstanding Cinematography for a Single-Camera Series', ' Justin Brown', 2),
(4, 'Peabody Awards', 'Entertainment', ' ', 2),
(5, 'Primetime Emmy Awards', 'Outstanding Special Visual Effect', ' Jabbar Raisani', 3),
(6, 'Saturn Awards', 'Best Streaming Horror & Thriller Series', ' You', 4),
(7, 'Television Academy Honors', 'Television with Conscience', ' 13 Reasons Why', 5),
(8, '17th Visual Effect Societ', 'Outstanding Visual Effect in a Photoreal Episode', ' Everett Burrell', 6),
(9, 'TVLine’s Performer of the', 'Performance in “AKA You’re a Winner!\"', ' Krysten Ritter', 8),
(10, 'ABC Cinematography Award', 'TV – Best Cinematography', ' 3%', 9),
(11, 'Iris Award', 'Best Screenplay', ' Alex Pina', 10),
(12, 'TV Guide', 'Most Exciting TV Series', ' Designated Survivor', 11),
(13, 'Critics’ Choice Televisio', 'Most Exciting New Series', ' Designated Survivor', 11),
(14, 'GLAAD Media Awards', 'Outstanding Drama Series', ' The OA', 12),
(15, 'Writers Guild of America ', 'Episodic Drama', ' Brit Marling', 12);

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `Directors_ID` int(11) NOT NULL,
  `Directors_Name` varchar(50) NOT NULL,
  `Directors_Gender` varchar(6) NOT NULL,
  `Directors_Birthday` date NOT NULL,
  `Directors_Country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`Directors_ID`, `Directors_Name`, `Directors_Gender`, `Directors_Birthday`, `Directors_Country`) VALUES
(1, 'Jason Rothenberg', 'male', '1967-05-10', 'US'),
(2, 'Jonathan Entwistle', 'male', '1984-03-27', 'GB'),
(3, 'Neil Marshall', 'male', '1970-05-25', 'GB'),
(4, 'Gregory Berlanti', 'male', '1972-05-24', 'US'),
(5, 'Brian Yorkey', 'male', '1970-10-23', 'US'),
(6, 'John G. Lenic', 'male', '1974-10-11', 'GB'),
(7, 'Aaron Martin', 'male', '0000-00-00', 'US'),
(8, 'Melissa Rosenberg', 'female', '1962-08-28', 'US'),
(9, 'Pedro Aguilera', 'male', '0000-00-00', 'ES'),
(10, 'Alex Pina', 'male', '1967-06-23', 'ES'),
(11, 'David Guggenheim', 'male', '0000-00-00', 'US'),
(12, 'Brit Marling', 'female', '1982-08-07', 'US'),
(13, 'Zal Batmanglij', 'male', '1981-04-29', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `directors_tv`
--

CREATE TABLE `directors_tv` (
  `Directors_ID` int(11) NOT NULL,
  `TvSeries_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `directors_tv`
--

INSERT INTO `directors_tv` (`Directors_ID`, `TvSeries_ID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `Episodes_ID` int(11) NOT NULL,
  `Episodes_Title` varchar(50) NOT NULL,
  `Season_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`Episodes_ID`, `Episodes_Title`, `Season_ID`) VALUES
(1, 'episode1', 1),
(2, 'episode2', 1),
(3, 'episode3', 1),
(4, 'episode4', 1),
(5, 'episode5', 1),
(6, 'episode6', 1),
(7, 'episode7', 1),
(8, 'episode8', 1),
(9, 'episode1', 2),
(10, 'episode2', 2),
(11, 'episode3', 2),
(12, 'episode4', 2),
(13, 'episode5', 2),
(14, 'episode6', 2),
(15, 'episode1', 3),
(16, 'episode2', 3),
(17, 'episode3', 3),
(18, 'episode4', 3),
(19, 'episode5', 3),
(20, 'episode1', 4),
(21, 'episode2', 4),
(22, 'episode3', 4),
(23, 'episode4', 4),
(24, 'episode5', 4),
(25, 'episode6', 5),
(26, 'episode7', 4),
(27, 'episode1', 5),
(28, 'episode2', 5),
(29, 'episode3', 5),
(30, 'episode4', 5),
(31, 'episode5', 5),
(32, 'episode6', 5),
(33, 'episode1', 6),
(34, 'episode2', 6),
(35, 'episode3', 6),
(36, 'episode4', 6),
(37, 'episode5', 6),
(38, 'episode1', 7),
(39, 'episode2', 7),
(40, 'episode3', 7),
(41, 'episode4', 7),
(42, 'episode5', 7),
(43, 'episode1', 8),
(44, 'episode2', 8),
(45, 'episode3', 8),
(46, 'episode4', 8),
(47, 'episode5', 8),
(48, 'episode1', 9),
(49, 'episode2', 9),
(50, 'episode3', 9),
(51, 'episode4', 9),
(52, 'episode5', 9),
(53, 'episode1', 10),
(54, 'episode2', 10),
(55, 'episode3', 10),
(56, 'episode4', 10),
(57, 'episode5', 10),
(58, 'episode1', 11),
(59, 'episode2', 11),
(60, 'episode3', 11),
(61, 'episode4', 11),
(62, 'episode5', 11),
(63, 'episode1', 12),
(64, 'episode2', 12),
(65, 'episode3', 12),
(66, 'episode4', 12),
(67, 'episode5', 12),
(68, 'episode6', 12),
(69, 'episode1', 13),
(70, 'episode2', 13),
(71, 'episode3', 13),
(72, 'episode4', 13),
(73, 'episode5', 13),
(74, 'episode6', 13),
(75, 'episode1', 14),
(76, 'episode2', 14),
(77, 'episode3', 14),
(78, 'episode4', 14),
(79, 'episode5', 14),
(80, 'episode1', 15),
(81, 'episode2', 15),
(82, 'episode3', 15),
(83, 'episode4', 15),
(84, 'episode5', 15),
(85, 'episode1', 16),
(86, 'episode2', 16),
(87, 'episode3', 16),
(88, 'episode4', 16),
(89, 'episode5', 16),
(90, 'episode1', 17),
(91, 'episode2', 17),
(92, 'episode3', 17),
(93, 'episode4', 17),
(94, 'episode5', 17),
(95, 'episode6', 17),
(96, 'episode1', 18),
(97, 'episode2', 18),
(98, 'episode3', 18),
(99, 'episode4', 18),
(100, 'episode5', 18),
(101, 'episode1', 19),
(102, 'episode2', 19),
(103, 'episode3', 19),
(104, 'episode4', 19),
(105, 'episode5', 19),
(106, 'episode1', 20),
(107, 'episode2', 20),
(108, 'episode3', 20),
(109, 'episode4', 20),
(110, 'episode5', 20),
(111, 'episode1', 21),
(112, 'episode2', 21),
(113, 'episode3', 21),
(114, 'episode4', 21),
(115, 'episode5', 21),
(116, 'episode1', 22),
(117, 'episode2', 22),
(118, 'episode3', 22),
(119, 'episode4', 22),
(120, 'episode5', 22),
(121, 'episode1', 23),
(122, 'episode2', 23),
(123, 'episode3', 23),
(124, 'episode4', 23),
(125, 'episode5', 23),
(126, 'episode1', 25),
(127, 'episode2', 25),
(128, 'episode3', 25),
(129, 'episode4', 25),
(130, 'episode5', 25),
(131, 'episode1', 26),
(132, 'episode2', 26),
(133, 'episode3', 26),
(134, 'episode4', 26),
(135, 'episode5', 26),
(136, 'episode1', 27),
(137, 'episode2', 27),
(138, 'episode3', 27),
(139, 'episode4', 27),
(140, 'episode5', 27),
(141, 'episode1', 28),
(142, 'episode2', 28),
(143, 'episode3', 28),
(144, 'episode4', 28),
(145, 'episode5', 28),
(146, 'episode6', 28);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `Genre_ID` int(11) NOT NULL,
  `Genre_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`Genre_ID`, `Genre_Name`) VALUES
(1, 'Action'),
(2, 'Drama'),
(3, 'Dystopian'),
(4, 'Dark Comedy'),
(5, 'Adventure'),
(6, 'Science Fiction'),
(7, 'Thriller'),
(8, 'Mystery'),
(9, 'Dectective'),
(10, 'Heist'),
(11, 'Political');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_ID` int(8) NOT NULL,
  `Member_FirstName` varchar(50) NOT NULL,
  `Member_LastName` varchar(50) NOT NULL,
  `Member_Email` varchar(50) NOT NULL,
  `Member_Gender` varchar(6) NOT NULL,
  `Member_Birthday` date NOT NULL,
  `Member_Password` varchar(8) NOT NULL,
  `Member_Address` text NOT NULL,
  `userType` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_ID`, `Member_FirstName`, `Member_LastName`, `Member_Email`, `Member_Gender`, `Member_Birthday`, `Member_Password`, `Member_Address`, `userType`) VALUES
(67, 'Chor', 'Yong', 'jinchor0413@gmail.com', 'MALE', '1999-04-13', '1234', 'A-01-02, Ria Apartment 1, Jalan Cenderai 17, Taman Megah Ria', 'Paid Membership'),
(68, 'T', 'SS', '71827@siswa.unimas.my', 'MALE', '2001-01-01', '1234', 'test', 'Trial'),
(70, 'Chor', 'Yong', 'jinchor04133@gmail.com', 'FEMALE', '2001-01-01', '1234', 'A-01-02, Ria Apartment 1, Jalan Cenderai 17, Taman Megah Ria', 'Trial'),
(71, 'R', 'Yong', 'jinchor0133@gmail.com', 'MALE', '1999-04-13', '1234', 'A-01-02, Ria Apartment 1, Jalan Cenderai 17, Taman Megah Ria', 'Trial'),
(72, 'CHIN', 'XIAN RONG', 'chin@gmail.com', 'MALE', '1999-10-04', '1!aAaa', 'stapok', 'Paid Membership'),
(73, 'harry', 'potter', 'harryp@gmail.com', 'MALE', '1999-09-09', 'harry123', 'sarawak,malaysia', 'Paid Membership');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Rating_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL,
  `TvSeries_Rating` float NOT NULL,
  `TvSeries_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`Rating_ID`, `Member_ID`, `TvSeries_Rating`, `TvSeries_ID`) VALUES
(3, 68, 5, 1),
(4, 67, 9, 1),
(5, 67, 10, 8),
(6, 72, 10, 12),
(7, 72, 9, 2),
(8, 73, 10, 1),
(9, 73, 7, 12);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `Seasons_ID` int(11) NOT NULL,
  `TvSeries_ID` int(11) NOT NULL,
  `Season_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`Seasons_ID`, `TvSeries_ID`, `Season_Name`) VALUES
(1, 1, 'SEASON 1'),
(2, 1, 'SEASON 2'),
(3, 1, 'SEASON 3'),
(4, 1, 'SEASON 4'),
(5, 1, 'SEASON 5'),
(6, 1, 'SEASON 6'),
(7, 2, 'SEASON 1'),
(8, 2, 'SEASON 2'),
(9, 3, 'SEASON 1'),
(10, 3, 'SEASON 2'),
(11, 4, 'SEASON 1'),
(12, 4, 'SEASON 2'),
(13, 5, 'SEASON 1'),
(14, 5, 'SEASON 2'),
(15, 6, 'SEASON 1'),
(16, 6, 'SEASON 2'),
(17, 7, 'SEASON 1'),
(18, 7, 'SEASON 2'),
(19, 8, 'SEASON 1'),
(20, 8, 'SEASON 2'),
(21, 9, 'SEASON 1'),
(22, 9, 'SEASON 2'),
(23, 10, 'SEASON 1'),
(24, 10, 'SEASON 2'),
(25, 11, 'SEASON 1'),
(26, 11, 'SEASON 2'),
(27, 12, 'SEASON 1'),
(28, 12, 'SEASON 2');

-- --------------------------------------------------------

--
-- Table structure for table `tvseries`
--

CREATE TABLE `tvseries` (
  `TvSeries_ID` int(11) NOT NULL,
  `TvSeries_Title` varchar(50) NOT NULL,
  `TvSeries_Duration` int(11) NOT NULL,
  `Release_Date` date NOT NULL,
  `TvSeries_Country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tvseries`
--

INSERT INTO `tvseries` (`TvSeries_ID`, `TvSeries_Title`, `TvSeries_Duration`, `Release_Date`, `TvSeries_Country`) VALUES
(1, 'The 100', 41, '2014-03-19', 'US'),
(2, 'The End of the F**king World', 21, '2017-10-24', 'GB'),
(3, 'Lost in Space', 60, '2018-04-14', 'US'),
(4, 'YOU', 45, '2018-09-09', 'US'),
(5, '13 Reason Why', 50, '2017-03-31', 'US'),
(6, 'Altered Carbon', 60, '2018-02-02', 'US'),
(7, 'Another Life', 60, '2019-07-25', 'US'),
(8, 'Jessica Jones', 50, '2016-11-20', 'US'),
(9, '3%', 55, '2016-11-25', 'BR'),
(10, 'Money Heist', 51, '2017-05-02', 'ES'),
(11, 'Designated Survivor', 42, '2016-09-21', 'US'),
(12, 'The OA', 45, '2016-12-16', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `tvseries_genres`
--

CREATE TABLE `tvseries_genres` (
  `Genre_ID` int(11) NOT NULL,
  `TvSeries_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tvseries_genres`
--

INSERT INTO `tvseries_genres` (`Genre_ID`, `TvSeries_ID`) VALUES
(1, 1),
(1, 6),
(2, 1),
(2, 2),
(2, 5),
(2, 7),
(2, 9),
(2, 12),
(3, 1),
(4, 2),
(5, 3),
(6, 3),
(6, 7),
(6, 9),
(6, 12),
(7, 4),
(7, 5),
(7, 8),
(7, 9),
(7, 10),
(7, 11),
(8, 5),
(9, 8),
(10, 10),
(11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tvseries_watchcount`
--

CREATE TABLE `tvseries_watchcount` (
  `Member_ID` int(11) NOT NULL,
  `TvSeries_ID` int(11) NOT NULL,
  `Watch_Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tvseries_watchcount`
--

INSERT INTO `tvseries_watchcount` (`Member_ID`, `TvSeries_ID`, `Watch_Count`) VALUES
(68, 1, 3),
(68, 2, 1),
(68, 6, 1),
(67, 8, 1),
(68, 12, 1),
(67, 1, 5),
(72, 12, 1),
(72, 2, 1),
(73, 1, 2),
(73, 12, 2),
(73, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tvseries_watchlist`
--

CREATE TABLE `tvseries_watchlist` (
  `Member_ID` int(11) NOT NULL,
  `TvSeries_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tvseries_watchlist`
--

INSERT INTO `tvseries_watchlist` (`Member_ID`, `TvSeries_ID`) VALUES
(67, 8),
(68, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountplan`
--
ALTER TABLE `accountplan`
  ADD PRIMARY KEY (`planID`),
  ADD UNIQUE KEY `planID` (`planID`),
  ADD UNIQUE KEY `Member_ID` (`Member_ID`);

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`Actors_ID`);

--
-- Indexes for table `actors_tv`
--
ALTER TABLE `actors_tv`
  ADD PRIMARY KEY (`Actors_ID`,`TvSeries_ID`),
  ADD KEY `actors_tv_ibfk_2` (`TvSeries_ID`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`Awards_ID`),
  ADD KEY `awards_ibfk_1` (`TvSeries_ID`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`Directors_ID`);

--
-- Indexes for table `directors_tv`
--
ALTER TABLE `directors_tv`
  ADD PRIMARY KEY (`Directors_ID`,`TvSeries_ID`),
  ADD KEY `directors_tv_ibfk_2` (`TvSeries_ID`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`Episodes_ID`),
  ADD KEY `episodes_ibfk_1` (`Season_ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Genre_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_ID`),
  ADD UNIQUE KEY `Member_ID` (`Member_ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Rating_ID`),
  ADD KEY `Member_ID` (`Member_ID`),
  ADD KEY `TvSeries_ID` (`TvSeries_ID`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`Seasons_ID`),
  ADD KEY `TvSeries_ID` (`TvSeries_ID`);

--
-- Indexes for table `tvseries`
--
ALTER TABLE `tvseries`
  ADD PRIMARY KEY (`TvSeries_ID`);

--
-- Indexes for table `tvseries_genres`
--
ALTER TABLE `tvseries_genres`
  ADD PRIMARY KEY (`Genre_ID`,`TvSeries_ID`),
  ADD KEY `tvseries_genres_ibfk_2` (`TvSeries_ID`);

--
-- Indexes for table `tvseries_watchcount`
--
ALTER TABLE `tvseries_watchcount`
  ADD KEY `Member_ID` (`Member_ID`,`TvSeries_ID`) USING BTREE,
  ADD KEY `TvSeries_ID` (`TvSeries_ID`) USING BTREE;

--
-- Indexes for table `tvseries_watchlist`
--
ALTER TABLE `tvseries_watchlist`
  ADD KEY `Member_ID` (`Member_ID`,`TvSeries_ID`) USING BTREE,
  ADD KEY `TvSeries_ID` (`TvSeries_ID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountplan`
--
ALTER TABLE `accountplan`
  MODIFY `planID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `Actors_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `Awards_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `Directors_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `Episodes_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `Genre_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Member_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Rating_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `Seasons_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tvseries`
--
ALTER TABLE `tvseries`
  MODIFY `TvSeries_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors_tv`
--
ALTER TABLE `actors_tv`
  ADD CONSTRAINT `actors_tv_ibfk_1` FOREIGN KEY (`Actors_ID`) REFERENCES `actors` (`Actors_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actors_tv_ibfk_2` FOREIGN KEY (`TvSeries_ID`) REFERENCES `tvseries` (`TvSeries_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_ibfk_1` FOREIGN KEY (`TvSeries_ID`) REFERENCES `tvseries` (`TvSeries_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `directors_tv`
--
ALTER TABLE `directors_tv`
  ADD CONSTRAINT `directors_tv_ibfk_1` FOREIGN KEY (`Directors_ID`) REFERENCES `directors` (`Directors_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `directors_tv_ibfk_2` FOREIGN KEY (`TvSeries_ID`) REFERENCES `tvseries` (`TvSeries_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`Season_ID`) REFERENCES `seasons` (`Seasons_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`TvSeries_ID`) REFERENCES `tvseries` (`TvSeries_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `seasons_ibfk_1` FOREIGN KEY (`TvSeries_ID`) REFERENCES `tvseries` (`TvSeries_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tvseries_genres`
--
ALTER TABLE `tvseries_genres`
  ADD CONSTRAINT `tvseries_genres_ibfk_1` FOREIGN KEY (`Genre_ID`) REFERENCES `genre` (`Genre_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tvseries_genres_ibfk_2` FOREIGN KEY (`TvSeries_ID`) REFERENCES `tvseries` (`TvSeries_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tvseries_watchcount`
--
ALTER TABLE `tvseries_watchcount`
  ADD CONSTRAINT `tvseries_watchcount_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tvseries_watchcount_ibfk_2` FOREIGN KEY (`TvSeries_ID`) REFERENCES `tvseries` (`TvSeries_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tvseries_watchlist`
--
ALTER TABLE `tvseries_watchlist`
  ADD CONSTRAINT `tvseries_watchlist_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tvseries_watchlist_ibfk_2` FOREIGN KEY (`TvSeries_ID`) REFERENCES `tvseries` (`TvSeries_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
