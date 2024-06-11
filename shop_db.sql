-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Jun 11, 2024 at 04:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_code` int(10) NOT NULL COMMENT 'کد کتاب',
  `book_name` varchar(200) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام کتاب',
  `book_author` varchar(200) COLLATE utf8_persian_ci NOT NULL COMMENT 'نویسنده کتاب',
  `book_publisher` varchar(200) COLLATE utf8_persian_ci NOT NULL COMMENT 'ناشر کتاب',
  `book_qty` int(10) NOT NULL COMMENT 'تعداد موجودی کتاب',
  `book_about` varchar(800) COLLATE utf8_persian_ci NOT NULL COMMENT 'درباره کتاب',
  `book_price` float NOT NULL COMMENT 'قیمت کتاب',
  `book_image` varchar(100) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام پرونده تصویر کتاب'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_code`, `book_name`, `book_author`, `book_publisher`, `book_qty`, `book_about`, `book_price`, `book_image`) VALUES
(101, 'شب‌های روشن', 'فئودور داستایفسکی', 'کتاب کوچه', 7, 'رمانی کوتاه و عاشقانه از دنیای مردی خیال‌پرداز که بعد از مواجهه با دختری به‌نام ناستنکا زندگی‌اش از این رو به آن رو می‌شود. این کتاب، روایت چندین شب دیدار این دو و مرور احوالاتشان است.', 850000, 'shabhayeroshan.jpg'),
(102, 'اثر مرکب', 'دارن هاردی', 'نگاه نوین', 14, 'کتابی در حوزه موفقیت که به بررسی انتخاب‌های کوچک و کم‌اهمیت در زندگیمان می‌پردازد. در این کتاب گام‌هایی برای اصلاح سیستم عاملی که زندگی ما را اداره می‌کند و آن را اثر مرکب می‌خواند پیشنهاد می‌کند. نویسنده کتاب تمامی نکات کتاب را از تجربیات خود به‌عنوان مشاور حوزه‌ی موفقیت استخراج کرده است.', 1600000, 'asaremorakab.jpg'),
(103, 'هر دو در نهایت می‌میرند', 'آدام سیلورا', 'نشر نون', 2, 'داستان دو پسر نوجوان که متوجه می‌شوند تنها یک روز به پایان زندگی‌شان باقی‌ست و باید آخرین روز خود را به‌معنای واقعی زندگی کنند. آن‌ها از طریق نرم‌افزاری به‌نام آخرین دوست که ویژه روز آخری‌هاست با یکدیگر آشنا می‌شوند.', 600000, 'hardodarnahayatmimirand.jpg'),
(104, 'مغازه جادویی', 'جیمز رابرت داتی', 'رمانو', 10, 'این داستان واقعی، گویی دریچه‌ای به سوی روح انسان می‌گشاید و خواننده را به سفری عمیق در اعماق وجود خویش رهنمون می‌کند. آردوتی در این اثر، پرده از خاطرات دوران کودکی خود در محله‌ای فقیرنشین در نیویورک برمی‌دارد. او با ظرافت و صداقت، تصویری ملموس از رنج‌ها و سختی‌هایی که در آن دوران با آنها دست و پنجه نرم کرده، به تصویر می‌کشد. فقر، خشونت و ناامیدی، سایه‌های سنگینی بودند که بر زندگی او سایه افکنده بودند.', 650000, 'maghazeyejadooei.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `username` varchar(20) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام کاربری',
  `message` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'متن پیام'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`username`, `message`) VALUES
('mohsenelahifard', ' سلام. ممنون از سایت خوبتون.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL COMMENT 'کد سفارش',
  `username` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام کاربری سفارش‌دهنده کتاب',
  `book_code` int(10) NOT NULL COMMENT 'کد کتاب سفارش داده شده',
  `book_qty` int(10) NOT NULL COMMENT 'تعداد سفارش کتاب',
  `book_price` int(11) NOT NULL COMMENT 'قیمت پایه کتاب',
  `mobile` varchar(11) COLLATE utf8_persian_ci NOT NULL COMMENT 'شماره تماس خریدار',
  `address` varchar(400) COLLATE utf8_persian_ci NOT NULL COMMENT 'نشانی دریافت کتاب',
  `trackcode` varchar(24) COLLATE utf8_persian_ci NOT NULL COMMENT 'کد مرسوله پستی',
  `state` int(1) NOT NULL COMMENT 'وضعیت سفارش'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `book_code`, `book_qty`, `book_price`, `mobile`, `address`, `trackcode`, `state`) VALUES
(6, 'mohsenelahifard', 102, 5, 1600000, '09162539821', 'قم، قم، 19 دی، کوی 28، پلاک 38', '000000000000000000000000', 0),
(7, 'mohsenelahifard', 101, 5, 850000, '09326258584', 'تهران، تقاطع جمهوری و حافظ، سرای دانشجویی دانشگاه تربیت دبیر شهید رجایی', '000000000000000000000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `realname` varchar(80) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام واقعی کاربر',
  `username` varchar(30) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام کاربری',
  `password` varchar(20) COLLATE utf8_persian_ci NOT NULL COMMENT 'گذرواژه',
  `email` varchar(60) COLLATE utf8_persian_ci NOT NULL COMMENT 'ایمیل',
  `type` tinyint(1) NOT NULL COMMENT 'نوع کاربر'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`realname`, `username`, `password`, `email`, `type`) VALUES
('abolfazl', 'abolfazlmasih', '192', 'am@ac.ir', 0),
('alireza', 'alirezamahmoudi', '1234', 'alirezam@yahoo.com', 0),
('hamid', 'hamidghorbani', '12345', 'hamidrg@sru.ac.ir', 0),
('mohsen', 'mohsenelahifard', '123', 'mohsen@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'کد سفارش', AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
