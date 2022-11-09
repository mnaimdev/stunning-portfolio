-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 07:27 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration form`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desp` varchar(200) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `sub_title`, `title`, `desp`, `status`) VALUES
(9, 'Hello there,', 'Mohammad Naim', 'I am working as a Web Application Developer using PHP and JavaScript', 1),
(11, 'Magnam soluta ipsa ', 'Illo tenetur et est ', 'Aut ea et molestiae ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner_image`
--

CREATE TABLE `banner_image` (
  `id` int(50) NOT NULL,
  `banner_image` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_image`
--

INSERT INTO `banner_image` (`id`, `banner_image`, `status`) VALUES
(1, '1.png', 1),
(9, '9.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`) VALUES
(4, '4.png'),
(5, '5.png'),
(6, '6.png'),
(7, '7.png'),
(8, '8.png'),
(10, '10.jpg'),
(11, '11.png');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `location`, `address`, `phone`, `email`, `status`) VALUES
(7, 'Dhaka', 'Kamrangir Char, Dhaka', '+88 01794556889', 'mnaimdev@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `counts`
--

CREATE TABLE `counts` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `count` int(100) NOT NULL,
  `info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counts`
--

INSERT INTO `counts` (`id`, `icon`, `count`, `info`) VALUES
(8, 'fa-thumbs-up', 120, 'FEATURES'),
(9, 'fa-star', 300, 'REVIEWS'),
(10, 'fa-calendar', 500, 'PROJECTS'),
(11, 'fa-male', 150, 'CLIENTS');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `title`, `year`, `percentage`, `status`) VALUES
(8, 'Diploma in Engineering', 2022, 95, 1),
(9, 'SSC', 2018, 70, 1),
(10, 'JSC', 2015, 100, 1),
(11, 'PSC', 2012, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `introductions`
--

CREATE TABLE `introductions` (
  `id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desp` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `introductions`
--

INSERT INTO `introductions` (`id`, `title`, `desp`, `image`, `status`) VALUES
(17, 'ABOUT ME', 'Hello, I am Mohammad Naim. I am a Web Application Developer. I have already done some projects to improve my programming skill and coding ability', '17.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(50) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `status` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo`, `status`) VALUES
(13, '13.png', 1),
(19, '19.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `status`) VALUES
(13, 'Jasmine Mcgowan', 'byvogozi@mailinator.com', 'Est nostrud libero ', 1),
(14, 'Dakota Forbes', 'huvaxikasu@mailinator.com', 'Neque quo blanditiis', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desp` varchar(200) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `desp`, `icon`, `status`) VALUES
(3, 'CREATIVE DESIGN', 'I design many application with creativity', 'fa-code', 1),
(4, 'UNLIMITED FEATURES', 'I provide unlimited features', 'fa-free-code-camp', 1),
(5, 'ULTRA RESPONSIVE', 'My design is fully responsive', 'fa-desktop', 1),
(14, 'CREATIVE IDEA', 'I have done many projects with unique idea', 'fa-lightbulb-o', 1),
(15, 'CLIENT SATISFACTION', 'My client is satisfied with my work', 'fa-headphones', 1),
(16, 'FULLY CUSTOMIZABLE', 'My project is fully customizable', 'fa-edit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `icon`, `link`, `status`) VALUES
(9, 'fa-facebook-square', 'https://www.facebook.com/mohammad.naimkhan.1800/', 1),
(17, 'fa-linkedin-square', 'https://www.linkedin.com/in/mnaimdev/', 1),
(18, 'fa-github-square', 'https://www.github.com/mnaimdev', 1),
(19, 'fa-instagram', 'https://www.instagram.com/mohammadnaimkhan66/', 1),
(21, 'fa-twitter', 'https://www.twitter.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `review` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `review`, `name`, `designation`) VALUES
(4, '4.jpg', 'He is really a good developer. He is very passionate about his work.', 'Tanek Buchanan', 'New York, USA'),
(5, '5.jpg', 'He is a fantastic developer and has greatly developed my project.', 'Claudia Downs', 'Toronto, Canada'),
(6, '6.jpg', '\r\nHe does a good job at a low cost and in a very short time', 'John Smilga', 'London, United Kingdom'),
(7, '7.jpg', '\r\nHe works very well. He is well-behaved and honest', 'Uma Schultz', 'Wellington, Newzeland');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
(10, 'Mohammad Naim', 'naim@test.com', '$2y$10$BsVUYP3cuETdUIj4w86Sruxlbs/rOG0DsJznVcbQaqsEyZC49wmOK', '10.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `desp` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `category`, `sub_title`, `title`, `image`, `desp`, `user_id`) VALUES
(1, 'Design', 'Apple Website', 'Apple Website UI', '1.jpg', 'Apple, known for the iPhone, iMac and iPad to name a few, is one of the largest multinational technology companies in the world. It is therefore imperative that their website meets the modern day standards. You’d expect a technology company to have a well designed and responsive website, otherwise, how can you trust their products? I definitely don’t think Apple let themselves down with their website’s design.\r\n\r\nThe homepage is welcoming, modern, simple and clean, allowing the brand to really show its products off and make them the primary focus. This is actually the main purpose of their website, to sell and advertise their products. No one goes on the Apple site to find out who they are. Their global status means they are more popular than the apple you’d find in your fruit bowl.', 10),
(2, 'Food', 'Fresh Food', 'Restaurant Website Development', '2.jpg', 'There are so many options for website creation these days that it can seem like an overwhelming, difficult, and time-consuming task. But you don’t have to reinvent the wheel.\r\n\r\nInstead, why not get inspiration from businesses that are already doing it right? We’ve put together a list of restaurant websites, and the specific features they do well, so that you can generate ideas for your own online presence.', 10),
(3, 'Currency', 'Crypto Currency', 'Crypto Currency Development', '3.jpg', 'A cryptocurrency is a digital currency, which is an alternative form of payment created using encryption algorithms. The use of encryption technologies means that cryptocurrencies function both as a currency and as a virtual accounting system. To use cryptocurrencies, you need a cryptocurrency wallet. These wallets can be software that is a cloud-based service or is stored on your computer or on your mobile device. The wallets are the tool through which you store your encryption keys that confirm your identity and link to your cryptocurrency.', 10),
(4, 'Marketing', 'Social Media Marketing', 'Social Media Marketing Agency Website', '4.jpg', 'Social media marketing (SMM) uses social media and social networks—like Facebook, Twitter, and Instagram—to market products and services, engage with existing customers, and reach new ones.\r\nThe power of social media marketing comes from the unparalleled capacity of social media in three core marketing areas: connection, interaction, and customer data.', 10),
(5, 'Health', 'Medicine Website', 'Dhaka Health Care Website', '5.jpg', 'Medicine is the field of health and healing. It includes nurses, doctors, and various specialists. It covers diagnosis, treatment, and prevention of disease, medical research, and many other aspects of health.', 10),
(6, 'Hacking', 'Hackers World', 'Hackers World Application', '6.jpg', 'Hackers use different ways to obtain passwords. The trial and error method is known as a brute force attack, which involves hackers trying to guess every possible combination to gain access. Hackers may also use simple algorithms to generate different combinations for letters, numbers, and symbols to help them identify password combinations. Another technique is known as a dictionary attack, which is a program that inserts common words into password fields to see if one works.\r\n\r\nInfecting devices with malware\r\n\r\nHackers may infiltrate a user’s device to install malware. More likely, they will target potential victims via email, instant messages and websites with downloadable content or peer-to-peer networks.', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_image`
--
ALTER TABLE `banner_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counts`
--
ALTER TABLE `counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introductions`
--
ALTER TABLE `introductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `banner_image`
--
ALTER TABLE `banner_image`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `counts`
--
ALTER TABLE `counts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `introductions`
--
ALTER TABLE `introductions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
