-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2024 at 06:04 PM
-- Server version: 8.0.29
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Food', 'This is the description for food category.'),
(3, 'Science &amp; Technology', 'This is Science and Technology description.'),
(5, 'Art', 'This is Art Categoy Description'),
(6, 'Personal Information', 'Just personal information, that can only be shared to public. (;');

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(20, 'Introduction', 'Hello, <br />I am Jonas Kiwia. Welcome to my blog. You probably do know me by now since you are probably reading this in my computer.<br />Anyways, I am just a 21 year old guy turning 22 this july by the time I am writting this.<br />I wanted to introduce myself today but it looks like I don&#039;t have much to say.<br />I do have much to talk tho, but I&#039;d rather break them up into smaller categories and list em in here.<br />Thank you so much again for being able to access this.', '17127482721687536488blog1.jpg', '2024-03-06 21:40:28', 1, 12, 1),
(21, 'Hello World', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, \r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, \r\nbut also the leap into electronic typesetting, remaining essentially unchanged. \r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, \r\nand more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '17127472881689261965blog14.jpg', '2024-04-10 11:08:08', 5, 13, 0),
(22, 'Podcast', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, \r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, \r\nbut also the leap into electronic typesetting, remaining essentially unchanged. \r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, \r\nand more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '17127481251687539038blog11.jpg', '2024-04-10 11:22:05', 3, 13, 0);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(11, 'Juma', 'Mgunda', 'Mgunda', 'jumamgunda@gmail.com', '$2y$10$jOaobQeCcoOoDgpY4g6cbOR7zagx4p9TFkpkYV/1DEDnvf5/DjxCa', '16963332254.png', 0),
(12, 'JONAS', 'KIWIA', 'Kibali', 'jonaskiwia1@gmail.com', '$2y$10$pi62Q5UP5lvqPxRRGfKOouEmKs79jut2dsaqyvhkYaJlIFTpM9UBS', '1709760790IMG_20200625_143138_464.jpg', 1),
(13, 'Juma', 'Mgunda', 'JMgunda', 'mgunda@juma.com', '$2y$10$uGwNXQvmmjQGYGx2tCQFCeKSO/.kyCGmsOrjhEM.LBUj883KJGkUS', '17127471061687414398user_default.jpg', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
