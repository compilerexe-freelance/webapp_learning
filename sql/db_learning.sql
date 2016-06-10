-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2016 at 12:46 AM
-- Server version: 5.5.31
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rightbra_learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(11) NOT NULL,
  `text_about` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id`, `text_about`) VALUES
(1, '				ทดสอบเกี่ยวกับเรา <br> <h1> ทดสอบ ทดสอบ 			');

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
(1, 'ฟิสิกส์ สามัญ'),
(6, 'ฟิสิกส์เตรียมทหาร'),
(7, 'เรขาคณิต ประถม-ม.ต้น'),
(8, 'ฟิสิกส์ ม.3'),
(9, 'ฟิสิกส์กลศาสตร์'),
(10, 'ฟิสิกส์ไฟฟ้า'),
(11, 'ฟิสิกส์คลื่นแสงเสียง'),
(12, 'ฟิสิกส์ของไหลและความร้อน'),
(13, 'ฟิสิกส์อะตอมและนิวเครียร์'),
(14, 'ฟิสิกส์ ความถนัดทางวิศวะ'),
(15, 'คอร์สทดสอบระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_clip`
--

CREATE TABLE `tb_clip` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_clip`
--

INSERT INTO `tb_clip` (`id`, `title`, `code`, `url`) VALUES
(1, 'พื้นฐาน ฟิสิกส์', '1001', 'uploads/course/banner1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `text_contact` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `text_contact`) VALUES
(1, '					ทดสอบ ติดต่อเรา <br> <h1> ทดสอบ 				');

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
  `day` int(3) NOT NULL,
  `student_regis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_course`
--

INSERT INTO `tb_course` (`id`, `category`, `code`, `image`, `title`, `detail`, `price`, `day`, `student_regis`) VALUES
(19, 'ฟิสิกส์ สามัญ', '1001', 'template/images/242x200.svg', 'มัธยมศึกษาตอนต้น', 'เข้าใจง่าย ...', '1000', 30, 0),
(20, 'ฟิสิกส์ สามัญ', '1002', 'template/images/242x200.svg', 'มัธยมศึกษาปีที่ 4', 'เข้าใจง่าย ...', '1500', 30, 0),
(21, 'วิศวะ', '2001', 'template/images/242x200.svg', 'พื้นฐานวิศวะ', 'สอบติดแน่นอน ...', '2000', 30, 0),
(22, 'วิศวะ', '2011', 'template/images/242x200.svg', 'วิศวะขั้นสูง', 'เข้าใจไม่ยาก ...', '2500', 30, 0),
(23, 'คอร์สทดสอบระบบ', '9001', 'uploads/image_course/144316461157369cf34be00.jpg', 'พื้นฐานแรง ระดับ มต้น', 'ฟรี (อธิบายกฎของนิวตันและหลักการเขียน FBD )', '0', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_howto`
--

CREATE TABLE `tb_howto` (
  `id` int(11) NOT NULL,
  `text_howto` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_howto`
--

INSERT INTO `tb_howto` (`id`, `text_howto`) VALUES
(1, '																																	สามารถชำระเงินผ่านบัญชี 111-1111111		\r\nโดยทดสอบ <br> 11\r\n32<h1>232																							');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `day` int(3) NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `date_order`, `username`, `category`, `code`, `title`, `day`, `price`, `state`) VALUES
(96, '2016-05-14', 'ninu', 'คอร์สทดสอบระบบ', '9001', 'พื้นฐานแรง ระดับ มต้น', 30, '0', 1),
(93, '2016-05-12', 'test', 'วิศวะ', '2001', 'พื้นฐานวิศวะ', 30, '2,000', 1),
(94, '2016-05-12', 'test', 'วิศวะ', '2011', 'วิศวะขั้นสูง', 30, '2,500', 1),
(95, '2016-05-14', 'test', 'คอร์สทดสอบระบบ', '9001', 'พื้นฐานแรง ระดับ มต้น', 30, '0', 1),
(91, '2016-05-11', 'ninu', 'วิศวะ', '2001', 'พื้นฐานวิศวะ', 30, '2,000', 1),
(92, '2016-05-11', 'ninu', 'วิศวะ', '2011', 'วิศวะขั้นสูง', 30, '2,500', 1),
(89, '2016-05-10', 'user', 'วิศวะ', '2001', 'พื้นฐานวิศวะ', 30, '2,000', 1),
(90, '2016-05-10', 'user', 'วิศวะ', '2011', 'วิศวะขั้นสูง', 30, '2,500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_payment` date NOT NULL,
  `hour` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `minute` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `exp` date NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`id`, `username`, `bank`, `date_payment`, `hour`, `minute`, `price`, `code`, `exp`, `state`) VALUES
(81, 'test', 'ธ.กสิกรไทย - 0000000001', '2016-05-12', '14', '0', '2,000', 'ชำระเงินคอร์สทั้งหมด', '0000-00-00', 1),
(82, 'test', 'ธ.กสิกรไทย - 0000000001', '2016-05-12', '14', '0', '2,000', 'พื้นฐานวิศวะ', '2016-05-30', 1),
(83, 'test', 'ธ.กสิกรไทย - 0000000001', '2016-05-12', '14', '0', '2,500', 'วิศวะขั้นสูง', '2016-05-30', 1),
(84, 'test', 'ธ.กสิกรไทย - 0000000001', '2016-05-14', '21', '0', '0', 'ชำระเงินคอร์สทั้งหมด', '0000-00-00', 1),
(85, 'test', 'ธ.กสิกรไทย - 0000000001', '2016-05-14', '21', '0', '0', 'พื้นฐานแรง ระดับ มต้น', '2016-10-30', 1),
(80, 'ninu', 'ธ.กสิกรไทย - 0000000001', '2016-05-11', '4', '3', '2,500', 'วิศวะขั้นสูง', '2016-05-30', 1),
(79, 'ninu', 'ธ.กสิกรไทย - 0000000001', '2016-05-11', '4', '3', '2,000', 'พื้นฐานวิศวะ', '2016-05-30', 1),
(78, 'ninu', 'ธ.กสิกรไทย - 0000000001', '2016-05-11', '4', '3', '2,000', 'ชำระเงินคอร์สทั้งหมด', '0000-00-00', 1),
(77, 'user', 'ธ.กสิกรไทย - 0000000001', '2016-05-10', '10', '0', '2,500', 'วิศวะขั้นสูง', '2016-05-30', 1),
(76, 'user', 'ธ.กสิกรไทย - 0000000001', '2016-05-10', '10', '0', '2,000', 'พื้นฐานวิศวะ', '2016-05-30', 1),
(75, 'user', 'ธ.กสิกรไทย - 0000000001', '2016-05-10', '10', '0', '4,500', 'ชำระเงินคอร์สทั้งหมด', '0000-00-00', 1),
(86, 'ninu', 'ธ.กสิกรไทย - 0000000001', '2016-05-14', '17', '0', '0', 'ชำระเงินคอร์สทั้งหมด', '0000-00-00', 1),
(87, 'ninu', 'ธ.กสิกรไทย - 0000000001', '2016-05-14', '17', '0', '0', 'ชำระเงินคอร์สทั้งหมด', '0000-00-00', 1),
(88, 'ninu', 'ธ.กสิกรไทย - 0000000001', '2016-05-14', '17', '0', '0', 'พื้นฐานแรง ระดับ มต้น', '2016-05-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_promotion`
--

CREATE TABLE `tb_promotion` (
  `id` int(11) NOT NULL,
  `text_promotion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_promotion`
--

INSERT INTO `tb_promotion` (`id`, `text_promotion`) VALUES
(1, '					ทดสอบโปรโมชั่น 1233244  <br> <h1> ทดสอบ 					');

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
(1, 'user', 0, '2016-05-15 23:15:31'),
(4, 'ninu', 2, '2016-05-13 07:18:33'),
(5, 'ninu02', 0, '0000-00-00 00:00:00'),
(6, 'test', 0, '2016-05-14 19:03:10'),
(7, 'mac', 0, '2016-05-07 17:00:02'),
(8, 'ฝ้าย', 0, '2016-05-07 16:27:08'),
(9, 'Fai', 1, '2016-05-08 22:53:08'),
(10, 'test02', 0, '2016-05-10 09:15:57'),
(11, 'test03', 0, '2016-05-10 09:47:08'),
(12, 'A01neon', 1, '0000-00-00 00:00:00'),
(13, 'A01หมี่มิ', 1, '0000-00-00 00:00:00'),
(14, 'A01_Pim', 1, '0000-00-00 00:00:00'),
(15, 'A01carrot', 1, '0000-00-00 00:00:00'),
(16, 'A01momay', 2, '0000-00-00 00:00:00'),
(17, 'A01 TAN', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slide`
--

CREATE TABLE `tb_slide` (
  `id` int(11) NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `list` tinyint(4) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_slide`
--

INSERT INTO `tb_slide` (`id`, `url`, `list`, `state`) VALUES
(1, 'uploads/slide/slide_12.jpg', 1, 1),
(2, 'uploads/slide/banner1.jpg', 2, 0),
(3, 'uploads/slide/banner2.jpg', 3, 0),
(4, 'uploads/slide/slide_1.jpg', 4, 0),
(5, 'uploads/slide/slide_1.jpg', 5, 0),
(6, 'uploads/slide/slide_1.jpg', 6, 0),
(7, 'uploads/slide/slide_1.jpg', 7, 0),
(8, 'uploads/slide/slide_1.jpg', 8, 0),
(9, 'uploads/slide/slide_1.jpg', 9, 0),
(10, 'uploads/slide/slide_1.jpg', 10, 0);

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
(34, 'Prawared', 'Bowonphattharawadi', 'Chiang Mai', '0979499062', 'compilerexe@gmail.com', 'uploads/image_users/2034976404572b21246f416.jpg', 'user', 'wwwwww'),
(37, 'นาย อนุชา', 'ปุณะปุง', '298/63 ', '0836260036', 'semiconductor@hotmail.com', 'uploads/image_users/15685221675736c54e13c38.jpg', 'ninu', 'NiNu2524'),
(39, 'นาย ทดสอบ', 'ทดสอบ', 'ทดสอบ 45/422', '0876659523', 'test@hotmail.com', 'uploads/image_users/15359507875736c63dafdae.jpg', 'test', 'test123'),
(40, 'นาย แมค', 'ios', 'idsdsd', '090904', 'pdf@hotmail.com', 'uploads/image_users/1582158359572d9ef8f3108.jpg', 'mac', 'pass1234'),
(41, 'ฤทัยรัตน์', 'รักการศิลป์', '298/63  ถ.พญาเสือ ต.ในเมือง อ.เมือง จ.พิษณุโลก 65000', '0873067233', 'faiz_babygirlz@hotmail.com', NULL, 'ฝ้าย', '055304664'),
(42, 'ฤทัยรัตน์', 'รักการศิลป์', '298/63 ถ.พญาเสือ ต.ในเมือง อ.เมือง จ.พิษณุโลก65000', '0873067233', 'Faiz_babygirlz@hotmail.com', NULL, 'Fai', '055304664'),
(43, 'test02', 'test02', 'sas', '082556', 'se@hotmail.com', NULL, 'test02', 'test123'),
(44, 'test03', 'test', '1234', '0896263323', 'dsdse@fdfdf.com', NULL, 'test03', 'test1234'),
(45, 'ด.ญ.ธวัลรัตน์', 'ใจวีระวัฒนา', 'Line ID : mynameisnxxn\nFB : Thawanrat Jaiveerawattana\n', '0818878286', 'Thawanrat.094@gmail.com', NULL, 'A01neon', '0946190099'),
(46, 'ด.ญ. พิชญธิดา', 'สวัสดี', 'Line ID : Noodlebear2013\nFacebook : Noodle Bear', '0855939669', 'meimimumu@gmail.com', NULL, 'A01หมี่มิ', 'mumu2013'),
(47, 'เด็กหญิงพรชิตา', 'แจงทอง', 'LINE ID : iampim0881599945\nfacebook : Pornchita Jaengthong', '0897089777', 'pim.pornchita@gmail.com', NULL, 'A01_Pim', 'iampim0881599945'),
(48, 'ด.ญ.ปัณฑิตา', 'จันทร์มีเทศ', 'Lineid:carrot2544\nFackbook:carrot phantita', '0889058414', 'carrotcarrot2544', NULL, 'A01carrot', 'carrot2544'),
(49, 'ด.ญ.ชุติมา', 'คงอยู่เย็น', 'LINE ID: chutimamomay\nFacebook: Momay Chutima\n', '0988793831', 'chutima7354@gmail.com', NULL, 'A01momay', 'momaychutima'),
(50, 'ด.ช.ธนกฤต', 'พุ่มพวง', 'LINE ID : thanakrit2545\nfacebook : thanakrit phumpuang', '0932361235', 'thanakrit2545@gmail.com', NULL, 'A01TAN', 'thana2545');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tb_clip`
--
ALTER TABLE `tb_clip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_howto`
--
ALTER TABLE `tb_howto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_session`
--
ALTER TABLE `tb_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_slide`
--
ALTER TABLE `tb_slide`
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
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_clip`
--
ALTER TABLE `tb_clip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_course`
--
ALTER TABLE `tb_course`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_howto`
--
ALTER TABLE `tb_howto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_session`
--
ALTER TABLE `tb_session`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_slide`
--
ALTER TABLE `tb_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
