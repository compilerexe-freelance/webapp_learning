--
-- Database: `db_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pass1234');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `category`) VALUES
(1, 'ฟิสิกส์'),
(2, 'วิศวะ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_course`
--

CREATE TABLE `tb_course` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `day` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_course`
--

INSERT INTO `tb_course` (`id`, `category`, `code`, `image`, `title`, `detail`, `price`, `day`) VALUES
(1, 'ฟิสิกส์', '1001', 'uploads/image_users/13517571d9ef1429af.png', 'มัธยมศึกษาตอนต้น', 'เข้าใจง่ายรับประกัน ...', '1000', 30),
(2, 'ฟิสิกส์', '1002', 'uploads/image_users/13517571d9ef1429af.png', 'มัธยมศึกษาปีที่ 4', 'เข้าใจง่ายรับประกัน ...', '1500', 30),
(3, 'ฟิสิกส์', '1003', 'uploads/image_users/13517571d9ef1429af.png', 'มัธยมศึกษาปีที่ 5', 'เข้าใจง่ายรับประกัน ...', '2000', 30),
(4, 'ฟิสิกส์', '1004', 'uploads/image_users/13517571d9ef1429af.png', 'มัธยมศึกษาปีที่ 6', 'เข้าใจง่ายรับประกัน ...', '2500', 30),
(5, 'ฟิสิกส์', '1005', 'uploads/image_users/13517571d9ef1429af.png', 'มหาวิทยาลัย', 'เข้าใจง่ายรับประกัน ...', '3000', 30),
(6, 'ฟิสิกส์', '1006', 'uploads/image_users/13517571d9ef1429af.png', 'สามัญ 7 วิชา', 'เข้าใจง่ายรับประกัน ...', '3500', 30),
(7, 'ฟิสิกส์', '1007', 'uploads/image_users/13517571d9ef1429af.png', 'เตรียมทหาร', 'เข้าใจง่ายรับประกัน ...', '4000', 30),
(8, 'วิศวะ', '2001', 'uploads/image_users/13517571d9ef1429af.png', 'พื้นฐานวิศวะ', 'เข้าใจง่ายรับประกัน ...', '4500', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tb_course_regis`
--

CREATE TABLE `tb_course_regis` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_code` int(4) UNSIGNED NOT NULL,
  `username` varchar(4) NOT NULL,
  `course_regis` date NOT NULL,
  `exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_session`
--

CREATE TABLE `tb_session` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `state_session` tinyint(1) UNSIGNED NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_session`
--

INSERT INTO `tb_session` (`id`, `username`, `state_session`, `lastupdate`) VALUES
(1, 'admin', 0, '2016-04-27 20:40:12'),
(2, 'admin1', 0, '2016-04-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `firstname`, `lastname`, `address`, `tel`, `email`, `image`, `username`, `password`) VALUES
(34, 'Prawared', 'Bowonphattharawadi', 'Chiang Mai', '0979499062', 'compilerexe@gmail.com', 'uploads/image_users/13517571d9ef1429af.png', 'admin', 'wwwwww'),
(35, 'compiler', 'exe', '1', '0979499062', 'compilerexe@gmail.com', 'compiler', 'admin1', '111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_course_regis`
--
ALTER TABLE `tb_course_regis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_session`
--
ALTER TABLE `tb_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_course`
--
ALTER TABLE `tb_course`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_course_regis`
--
ALTER TABLE `tb_course_regis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_session`
--
ALTER TABLE `tb_session`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
