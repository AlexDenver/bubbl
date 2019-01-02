-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2019 at 04:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubbl`
--

-- --------------------------------------------------------

--
-- Table structure for table `bio`
--

CREATE TABLE `bio` (
  `username` varchar(129) NOT NULL,
  `display` varchar(500) NOT NULL DEFAULT 'user.png ',
  `intro` text,
  `city` varchar(24) NOT NULL DEFAULT ' ',
  `skill` varchar(24) NOT NULL DEFAULT ' ',
  `gender` varchar(10) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bio`
--

INSERT INTO `bio` (`username`, `display`, `intro`, `city`, `skill`, `gender`) VALUES
('AlexDenver', 'AlexDenver.png', 'This is supposed to be my bio i guess.', 'World', 'Random Stuff', 'Male'),
('Doe', 'Doe.jpg', 'A Bio', 'Japan', 'Drama Artist', ' '),
('Joan', 'Joan.png', 'Hey, Im Joan.I am cool!', 'World', 'Skilled', ' '),
('Karen', 'Karen.jpg', 'Hey, Im Joan.I am cool!', 'World', 'Skilled', ' '),
('Mary', 'user.png', ' ', ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(120) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `pid`, `text`, `author`, `time`) VALUES
(1, 6, 'An amazing comment!', 'Joan', '2019-01-01 16:15:38'),
(2, 6, 'An amazing comment!', 'AlexDenver', '2019-01-01 16:15:38'),
(3, 6, 'Another Comment', 'AlexDenver', '2019-01-01 17:06:25'),
(4, 6, 'Whoooo Hoooo We Area a Go!', 'Mary', '2019-01-02 02:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `mfrom` varchar(120) NOT NULL,
  `mto` varchar(120) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `mfrom`, `mto`, `time`, `last`) VALUES
(1, 'Joan', 'AlexDenver', '2018-12-30 04:52:19', 'Are you sure about how the world Woks?'),
(4, 'AlexDenver', 'Karen', '2018-12-30 13:38:43', 'Weird'),
(5, 'Doe', 'AlexDenver', '2019-01-01 19:14:46', 'Whats up?'),
(6, 'Mary', 'AlexDenver', '2019-01-02 02:53:52', 'Hey');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `sid` varchar(120) NOT NULL,
  `did` varchar(120) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `sid`, `did`, `date`, `status`) VALUES
(2, 'Karen', 'AlexDenver', '2018-12-26 04:53:36', 'friend'),
(3, 'AlexDenver', 'Joan', '2019-01-01 18:16:19', 'friend'),
(4, 'AlexDenver', 'Doe', '2019-01-01 19:00:10', 'friend'),
(5, 'Mary', 'AlexDenver', '2019-01-02 02:46:20', 'friend');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` longtext NOT NULL,
  `mfrom` varchar(120) NOT NULL,
  `mto` varchar(120) NOT NULL,
  `isread` tinyint(1) NOT NULL DEFAULT '0',
  `isnotified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `tid`, `time`, `text`, `mfrom`, `mto`, `isread`, `isnotified`) VALUES
(1, 1, '2018-12-26 10:13:42', 'Hey', 'Joan', 'AlexDenver', 0, 0),
(2, 1, '2018-12-26 10:13:45', 'Hello', 'AlexDenver', 'Joan', 0, 0),
(3, 1, '2018-12-26 10:13:47', 'Hey', 'AlexDenver', 'Joan', 0, 0),
(7, 1, '2018-12-26 10:17:10', 'Are you There?', 'AlexDenver', 'Joan', 0, 0),
(8, 1, '2018-12-26 10:18:27', 'Are you There?', 'AlexDenver', 'Alex', 0, 0),
(9, 0, '2018-12-26 10:19:36', 'Are you There?', 'AlexDenver', 'Alex', 0, 0),
(10, 2, '2018-12-26 10:19:58', 'Are you There?', 'AlexDenver', 'Alex', 0, 0),
(11, 3, '2018-12-26 10:21:47', 'Are you There?', 'AlexDenver', 'Alex', 0, 0),
(12, 1, '2018-12-26 10:22:19', 'Heyy?', 'AlexDenver', 'Joan', 0, 0),
(13, 1, '2018-12-26 16:07:16', 'Whats Up?', 'AlexDenver', 'Joan', 0, 0),
(14, 1, '2018-12-26 16:07:32', 'Whats Up?', 'AlexDenver', 'Joan', 0, 0),
(15, 1, '2018-12-26 16:11:23', 'Where you At?', 'AlexDenver', 'Joan', 0, 0),
(16, 1, '2018-12-26 16:12:16', 'What you upto?', 'AlexDenver', 'Joan', 0, 0),
(17, 1, '2018-12-26 16:12:35', 'Test', 'AlexDenver', 'Joan', 0, 0),
(18, 1, '2018-12-26 16:12:42', 'this\\', 'AlexDenver', 'Joan', 0, 0),
(19, 1, '2018-12-26 16:13:11', 'her', 'AlexDenver', 'Joan', 0, 0),
(20, 1, '2018-12-26 16:15:27', 'What you upto?', 'AlexDenver', 'Joan', 0, 0),
(21, 1, '2018-12-26 16:16:28', 'and this', 'AlexDenver', 'Joan', 0, 0),
(22, 1, '2018-12-26 16:17:58', 'adwdaw', 'AlexDenver', 'Joan', 0, 0),
(23, 1, '2018-12-26 16:18:30', 'wad', 'AlexDenver', 'Joan', 0, 0),
(24, 1, '2018-12-26 16:19:33', 'adwwa', 'AlexDenver', 'Joan', 0, 0),
(25, 1, '2018-12-26 16:20:01', 'and im here', 'AlexDenver', 'Joan', 0, 0),
(26, 1, '2018-12-26 16:23:47', 'and this test', 'AlexDenver', 'Joan', 0, 0),
(27, 1, '2018-12-26 16:24:06', 'here', 'AlexDenver', 'Joan', 0, 0),
(28, 1, '2018-12-30 04:04:53', 'crazy test', 'Joan', 'AlexDenver', 0, 0),
(29, 1, '2018-12-30 04:05:25', 'crazy test 2', 'Joan', 'AlexDenver', 0, 0),
(30, 1, '2018-12-30 04:06:26', 'And there!', 'Joan', 'AlexDenver', 0, 0),
(31, 1, '2018-12-30 04:07:23', 'WoooHooo!', 'AlexDenver', 'Joan', 0, 0),
(32, 1, '2018-12-30 04:08:41', 'You know what!', 'AlexDenver', 'Joan', 0, 0),
(33, 1, '2018-12-30 04:10:04', 'Yes!', 'Joan', 'AlexDenver', 0, 0),
(34, 1, '2018-12-30 04:38:52', 'Are you Sure?', 'AlexDenver', 'Joan', 0, 0),
(35, 1, '2018-12-30 04:39:25', 'Probably', 'Joan', 'AlexDenver', 0, 0),
(36, 1, '2018-12-30 04:52:19', 'Are you sure about how the world Woks?', 'Joan', 'AlexDenver', 0, 0),
(37, 4, '2018-12-30 05:13:07', 'New Thread', 'AlexDenver', 'Karen', 0, 0),
(38, 4, '2018-12-30 05:28:58', 'Amazing Chat ', 'Karen', 'AlexDenver', 0, 0),
(39, 4, '2018-12-30 05:30:38', 'Try this maybe? ', 'Karen', 'AlexDenver', 0, 0),
(40, 4, '2018-12-30 05:34:28', 'Seems legit', 'AlexDenver', 'Karen', 0, 0),
(41, 4, '2018-12-30 05:34:38', 'What\'s going on? ', 'Karen', 'AlexDenver', 0, 0),
(42, 4, '2018-12-30 05:56:41', 'Hey', 'Karen', 'AlexDenver', 0, 0),
(43, 4, '2018-12-30 05:56:59', 'Are you Okay?', 'AlexDenver', 'Karen', 0, 0),
(44, 4, '2018-12-30 05:57:09', 'Guess so.', 'Karen', 'AlexDenver', 0, 0),
(45, 4, '2018-12-30 06:19:02', 'Alright cool!', 'Karen', 'AlexDenver', 0, 0),
(46, 4, '2018-12-30 06:19:14', 'Why did you say that?', 'AlexDenver', 'Karen', 0, 0),
(47, 4, '2018-12-30 06:19:29', 'Testing this again!', 'AlexDenver', 'Karen', 0, 0),
(48, 4, '2018-12-30 06:19:35', 'ðŸ‘» ', 'Karen', 'AlexDenver', 0, 0),
(49, 4, '2018-12-30 06:19:44', 'Cool', 'Karen', 'AlexDenver', 0, 0),
(50, 4, '2018-12-30 13:38:43', 'Weird', 'AlexDenver', 'Karen', 0, 0),
(51, 5, '2019-01-01 19:13:50', 'Hey', 'Doe', 'AlexDenver', 0, 0),
(52, 5, '2019-01-01 19:14:46', 'Whats up?', 'AlexDenver', 'Doe', 0, 0),
(53, 6, '2019-01-02 02:53:52', 'Hey', 'Mary', 'AlexDenver', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `originator` varchar(120) NOT NULL,
  `target` varchar(120) NOT NULL,
  `notified` tinyint(1) NOT NULL,
  `viewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifier`
--

CREATE TABLE `notifier` (
  `username` varchar(120) NOT NULL,
  `new_msg` tinyint(1) NOT NULL,
  `new_request` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` longtext NOT NULL,
  `author` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `time`, `text`, `author`) VALUES
(1, '2018-12-26 03:28:27', 'Hello Bubbl', 'AlexDenver'),
(2, '2018-12-26 03:43:28', 'Hell Bubbl 2', 'AlexDenver'),
(3, '2018-12-26 04:54:29', 'Heyy, Whats Up ? Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Joan'),
(4, '2018-12-26 04:54:29', 'This is a Test Karen Post', 'Karen'),
(5, '2019-01-01 13:08:40', 'Amazing Post!', 'AlexDenver'),
(6, '2019-01-01 13:09:09', 'Amazing Post 2', 'AlexDenver'),
(7, '2019-01-01 19:15:30', 'My First Status Here!', 'Doe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(129) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `first_name`, `last_name`, `email`, `password`) VALUES
('AlexDenver', 'Alex', 'Denver', 'dnvr.dsz@gmail.com', 'd250d6d2d09c083b2c8dfb432e3d1c2af9b51f24'),
('Doe', 'John', 'Doe', 'doe@mail.com', 'd0be2dc421be4fcd0172e5afceea3970e2f3d940'),
('Joan', 'Joan', 'McKinzie', 'joan@mail.com', 'd250d6d2d09c083b2c8dfb432e3d1c2af9b51f24'),
('Karen', 'Karen', 'Rodes', 'rodes@mail.com', 'd250d6d2d09c083b2c8dfb432e3d1c2af9b51f24'),
('Mary', 'Mary', 'Doe', 'mary@mail.com', 'd0be2dc421be4fcd0172e5afceea3970e2f3d940');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bio`
--
ALTER TABLE `bio`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
