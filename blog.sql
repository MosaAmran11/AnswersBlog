-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2024 at 01:53 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
CREATE TABLE IF NOT EXISTS `about_us` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `about_text` text NOT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_text`) VALUES
(1, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus nulla ad eos similique, laboriosam impedit provident earum commodi neque perferendis magni animi perspiciatis eligendi atque. Consequuntur molestias ea itaque inventore? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo ullam et voluptatum labore, iste corrupti, porro enim deleniti tempora recusandae error obcaecati in quam facere necessitatibus amet officia praesentium animi?'),
(2, 'موقع <strong>حلول تكنولوجيا</strong> هو عبارة عن مدونة لتحميل وشرح التطبيقات والألعاب المجانية وعرض جميع المشاكل والحلول الخاصة بالكمبيوتر والجوال بالإضافة إلى تقديم العديد من الشروحات المُصوَّرة والتي يبحث عنها جميع المستخدمين في الوطن العربي.\r\n<br><br>\r\nبرجاء زيارة صفحة اتصل بنا للتواصل والاقتراحات في تطوير الموقع.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_user_name` varchar(255) NOT NULL,
  `cont_user_email` varchar(255) NOT NULL,
  `cont_user_text` text NOT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_text` text NOT NULL,
  `post_type` varchar(20) NOT NULL,
  `post_img` varchar(255) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_date`, `post_text`, `post_type`, `post_img`) VALUES
(1, 'ساعة أونور MagicWatch 2 الجديدة', '2019-11-27 15:10:21', 'عرضت شركة Honor مواصفات لساعتها الجديدة Band 5 وكان من ابرزها: \r\n\r\n\r\n\r\nشاشة لمس AMOLED كبيرة\r\n\r\nشاشة اللمس AMOLED الخاصة بـ HONOR Band 5 تظهر النص المُرمّز بالألوان وأيضاً ايقونات الاتصال، لاتصال سريع وسهل، وتأتي بزجاج منحني 2.5D، وتصل عدد البكسلات ما يصل إلى 282 بكسل لكل بوصة.', 'أخبار تقنية', ''),
(2, 'خطوات ضرورية ومهمة قبل إعادة الهاتف إلى ضبط المصنع', '2019-12-01 13:23:40', 'الكثير من مستخدمي هواتف الأندرويد الحديثة يقومون بإعادة ضبط المصنع للهاتف، ويندهش بعدها ان الهاتف يطلب حساب جوجل الذي كان في الهاتف في السابق، وأغلب المستخدمين لا يتذكرون حساباتهم السابق الذي كان في الهاتف.\r\n<br><br>\r\nإذا كان إصدار نظام الأندرويد 5.0.1 فما فوق فمن الضروري إتباع الخطوات قبل إعادة الهاتف إلى ضبط المصنع.', 'أنظمة تشغيل', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_country` varchar(15) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
