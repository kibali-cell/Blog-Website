-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 03:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Food', 'This is the description for food category.'),
(3, 'Science & Technology', 'This is Science and Technology description.'),
(5, 'Art', 'This is Art Categoy Description'),
(6, 'Personal Information', 'Just personal information, that can only be shared to public. (;');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(0, 'The Science Behind Consistency', '**The Power of Consistency: How Small Daily Actions Lead to Big Results**&lt;br /&gt;<br />&lt;br /&gt;<br />In a world that celebrates overnight success stories, it&rsquo;s easy to overlook the true driving force behind most achievements: consistency. Whether in fitness, business, or personal development, small daily actions compound over time to create massive results.&lt;br /&gt;<br />&lt;br /&gt;<br />## The Science Behind Consistency&lt;br /&gt;<br />&lt;br /&gt;<br />Psychologists and neuroscientists agree that repetition strengthens neural pathways in the brain, making habits easier to maintain. When you commit to a daily routine, your brain adapts, making tasks feel more automatic and less burdensome.&lt;br /&gt;<br />&lt;br /&gt;<br />Take fitness, for example. A single workout won&rsquo;t transform your body, but exercising regularly over weeks and months leads to noticeable changes. The same principle applies to learning a new skill, growing a business, or improving relationships.&lt;br /&gt;<br />&lt;br /&gt;<br />## The Compound Effect&lt;br /&gt;<br />&lt;br /&gt;<br />Darren Hardy, in his book *The Compound Effect*, explains how small, seemingly insignificant actions accumulate to produce substantial outcomes. Consider saving money: putting aside just $5 a day may not seem like much, but over time, with interest, it grows into a significant sum. The same applies to reading a few pages of a book daily&mdash;eventually, you&rsquo;ll have read dozens of books in a year.&lt;br /&gt;<br />&lt;br /&gt;<br />## Building Consistency in Your Life&lt;br /&gt;<br />&lt;br /&gt;<br />To harness the power of consistency, follow these simple strategies:&lt;br /&gt;<br />&lt;br /&gt;<br />### 1. **Start Small**&lt;br /&gt;<br />   Many people fail because they try to take on too much at once. Instead of aiming for an hour-long workout daily, start with 10-minute sessions and build up over time.&lt;br /&gt;<br />&lt;br /&gt;<br />### 2. **Set Clear Goals**&lt;br /&gt;<br />   Define your objectives clearly. Instead of saying, &ldquo;I want to get fit,&rdquo; specify, &ldquo;I will exercise for 30 minutes five times a week.&rdquo;&lt;br /&gt;<br />&lt;br /&gt;<br />### 3. **Track Your Progress**&lt;br /&gt;<br />   Keeping a journal or using habit-tracking apps helps you stay accountable and see how far you&rsquo;ve come.&lt;br /&gt;<br />&lt;br /&gt;<br />### 4. **Eliminate Excuses**&lt;br /&gt;<br />   Plan for obstacles in advance. If you know you&rsquo;ll be busy, schedule your tasks earlier in the day.&lt;br /&gt;<br />&lt;br /&gt;<br />### 5. **Stay Patient**&lt;br /&gt;<br />   Results take time. Trust the process and keep going, even when progress feels slow.&lt;br /&gt;<br />&lt;br /&gt;<br />## Conclusion&lt;br /&gt;<br />&lt;br /&gt;<br />Success isn&rsquo;t about making giant leaps&mdash;it&rsquo;s about taking small steps consistently. By focusing on steady, daily improvements, you&rsquo;ll be amazed at the transformation over time. Start today, and watch how consistency shapes your future!&lt;br /&gt;<br />&lt;br /&gt;<br />', '1740149102Beige Minimalist Fashion Product Promotion Facebook Ad.png', NULL, 1, 11, 1),
(20, 'Introduction', 'Hello, <br />I am Jonas Kiwia. Welcome to my blog. You probably do know me by now since you are probably reading this in my computer.<br />Anyways, I am just a 21 year old guy turning 22 this july by the time I am writting this.<br />I wanted to introduce myself today but it looks like I don\'t have much to say.<br />I do have much to talk tho, but I\'d rather break them up into smaller categories and list em in here.<br />Thank you so much again for being able to access this.', '17127482721687536488blog1.jpg', '2024-03-06 21:40:28', 1, 12, 0),
(21, 'Hello World', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, \r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, \r\nbut also the leap into electronic typesetting, remaining essentially unchanged. \r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, \r\nand more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '17127472881689261965blog14.jpg', '2024-04-10 11:08:08', 5, 13, 0),
(22, 'Podcast', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, \r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, \r\nbut also the leap into electronic typesetting, remaining essentially unchanged. \r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, \r\nand more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '17127481251687539038blog11.jpg', '2024-04-10 11:22:05', 3, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(0, 'Juma', 'Kiwia', 'JumaK', 'KiwiaJuma@gmail.com', '$2y$10$m9xcW8ad3qKl.uCkLw8rXuMLWGtjPfkK.kH3H3wEvf1AhQluqYFje', '1740149204arm-chair-01.jpg', 0),
(11, 'Juma', 'Mgunda', 'Mgunda', 'jumamgunda@gmail.com', '$2y$10$jOaobQeCcoOoDgpY4g6cbOR7zagx4p9TFkpkYV/1DEDnvf5/DjxCa', '16963332254.png', 1),
(12, 'JONAS', 'KIWIA', 'Kibali', 'jonaskiwia1@gmail.com', '$2y$10$pi62Q5UP5lvqPxRRGfKOouEmKs79jut2dsaqyvhkYaJlIFTpM9UBS', '1709760790IMG_20200625_143138_464.jpg', 1),
(13, 'Juma', 'Mgunda', 'JMgunda', 'mgunda@juma.com', '$2y$10$uGwNXQvmmjQGYGx2tCQFCeKSO/.kyCGmsOrjhEM.LBUj883KJGkUS', '17127471061687414398user_default.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
