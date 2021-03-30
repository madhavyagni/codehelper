-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 02:55 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `admin_id` int(2) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `pas` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admin_id`, `admin_email`, `pas`) VALUES
(1, 'madhavyagni01@gmail.com', '$2y$10$M2Y0YjUxMTVmODJjYmJiNuqqsRBoRQaTYaxRmfrJ/l5/smsGbmXtq');

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE `approve` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(400) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_code` text NOT NULL,
  `thread_catid` int(7) NOT NULL,
  `thread_userid` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `descp` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `descp`, `img`, `date`) VALUES
(1, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.', 'images/js.jpg', '2021-02-19 17:44:07'),
(2, 'php', 'PHP is a general-purpose scripting language especially suited to web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.', 'images/php.jpg', '2021-02-19 17:44:07'),
(3, 'HTML,CSS', 'Hypertext Markup Language is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', 'images/html.jpg', '2021-02-19 17:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_desc` text NOT NULL,
  `comment_code` text NOT NULL,
  `thcomment_id` int(8) NOT NULL,
  `user_name_id` int(7) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_desc`, `comment_code`, `thcomment_id`, `user_name_id`, `comment_time`) VALUES
(31, 'If you want to have automatic slide, you can easily use, setInterval() method :', '<xmp>setInterval(function(){\r\n    showNextSlide(); \r\n}, 2000);</xmp>', 25, 10, '2021-03-29 18:02:24'),
(32, 'Why not use already developed slider just as plugin', '', 25, 14, '2021-03-29 18:03:59'),
(33, 'nitialize your total variables to 0\r\n\r\nthis way totaldmg += value will not result in totaldmg = \"undefined + value;\r\n\r\nAlso, when reading the values from the DOM, convert them to numerics as string literals will concatenate', '<xmp>var totaldmg = 0;\r\nvar damagerate = 0;\r\nvar damagegrow = 0; \r\nvar furydmg = 0;\r\n\r\n//and\r\n\r\nfor(var i = 0; i <5; i++){\r\n  name[i] = parseInt(document.getElementById(\"ninja\" + (i +1)).value, 10);\r\n  dmg[i] = parseInt(document.getElementById(\"dmg\" + (i +1)).value, 10); \r\n  dmgrate[i] = parseInt(document.getElementById(\"dmgrate\" + (i +1)).value, 10); \r\n  dmggrow[i] = parseInt(document.getElementById(\"dmggrow\" + (i +1)).value, 10); \r\n  speed[i] = parseInt(document.getElementById(\"speed\" + (i +1)).value, 10); \r\n  fury[i] = 50;\r\n  ninja[i] = new ninjas(name[i],dmg[i],dmgrate[i],dmggrow[i],speed[i],fury[i]);\r\n}</xmp>', 27, 14, '2021-03-29 18:11:08'),
(34, 'nodeJs is server side scripting language\r\nmostly it is used for backend. ', '', 26, 10, '2021-03-29 18:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sno` int(7) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sno`, `name`, `email`, `message`, `datetime`) VALUES
(6, 'madhav', 'madhavyagni01@gmail.com', 'hai', '2021-03-29 01:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(400) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_code` text NOT NULL,
  `thread_catid` int(7) NOT NULL,
  `thread_userid` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_code`, `thread_catid`, `thread_userid`, `timestamp`) VALUES
(25, 'Javascript Basic Slider', 'Basically, I have no experience with Javascript whatsoever.\r\n\r\nI have to make a very simple image slider but I can\'t get it to show the next image automatically.', '<xmp>\r\nvar currentItem = $(\'#project-list li\').first();\r\n\r\nfunction showNextSlide()\r\n{\r\n    if(currentItem.length == 0){\r\n        currentItem = $(\'#project-list li\').first();\r\n    }\r\n\r\n    console.log(currentItem);\r\n    currentItem.css(\'display\', \'none\');\r\n    currentItem = currentItem.next();\r\n    currentItem.css(\'display\', \'block\');\r\n}\r\n\r\n\r\n//my images are loaded like this\r\n\r\n\r\n<ul class=\"project-list\" id=\"project-list\">\r\n    <li class=\"project current slide-1\">\r\n        <img src=\"http://lorempixel.com/600/300/animals/1\" />\r\n    </li>\r\n    <li class=\"project slide-2\">\r\n        <img src=\"http://lorempixel.com/600/300/animals/2\" />\r\n    </li>\r\n    <li class=\"project slide-3\">\r\n        <img src=\"http://lorempixel.com/600/300/animals/3\" />\r\n    </li>\r\n    <li class=\"project slide-4\">\r\n        <img src=\"http://lorempixel.com/600/300/animals/4\" />\r\n    </li>\r\n</ul></xmp>', 1, 11, '2021-03-29 17:49:06'),
(26, 'What is nodeJs', 'What is nodeJs where should i use it', '', 1, 11, '2021-03-29 17:53:11'),
(27, 'Javascript basic calculations always get NaN', 'Hello i am doing a basic calculator for a game but I am facing a problem I just started to learn this programming language read all tutorials I found and now I am just making some code and getting some experience , so I write a calculation code that I was written in a php before in a php was working perfect but I was using different technique there , so in javascript I create a function which will be called ones the calculate button will be pressed and create an object to store all data of 5 players take a look :', '<xmp>\r\nfunction count(){\r\n\r\n    function ninjas (name,dmg,dmgrate,dmggrow,speed,fury) {\r\n        this.name = name;\r\n        this.dmg = dmg;\r\n        this.dmgrate = dmgrate;\r\n        this.dmggrow = dmggrow;\r\n        this.speed = speed;\r\n        this.fury = fury;\r\n    }\r\n    var name = [];\r\n    var dmg = [];\r\n    var dmgrate = [];\r\n    var dmggrow = [];\r\n    var speed = [];\r\n    var fury = [];\r\n    var ninja = [];\r\n    for(var i = 0; i <5; i++){\r\n      name[name.length] = document.getElementById(\"ninja\" + (i +1)).value;\r\n        dmg[dmg.length] = document.getElementById(\"dmg\" + (i +1)).value; \r\n      dmgrate[dmgrate.length] = document.getElementById(\"dmgrate\" + (i +1)).value; \r\n        dmggrow[dmggrow.length] = document.getElementById(\"dmggrow\" + (i +1)).value; \r\n        speed[speed.length] = document.getElementById(\"speed\" + (i +1)).value; \r\n        fury[fury.length] = 50;\r\n        ninja[i] = new ninjas(name[i],dmg[i],dmgrate[i],dmggrow[i],speed[i],fury[i]);\r\n    }\r\n\r\n    ninja.sort(function(a, b){return b.speed - a.speed}); \r\n\r\n    var totaldmg;\r\n    var damagerate;\r\n    var damagegrow; \r\n    var furydmg;\r\n\r\n    for(var a = 0; a < 6; a++){ // 6 fight \r\n        for(var b = 0; b < 5; b++){ // 5 ninjas\r\n            if(ninja[b].name == \"Kabuto\"){\r\n                 if(ninja[b].fury == 100){\r\n                    damagerate = ninja[b].dmg / 100 * ninja[b].dmgrate;\r\n                    damagegrow = damagerate / 100 * ninja[b].dmggrow;\r\n                    furydmg = damagegrow + (damagegrow / 100) * ((ninja[b].fury - 100) / 0.25);\r\n                    totaldmg += furydmg;\r\n                    for(var c = 0; c < 5; c++){ // add fury each ninja by 25\r\n                        ninja[c].fury +=25;\r\n                    }\r\n                     ninja[b].fury -= 25;\r\n                     ninja[b].fury +=100;\r\n                 }else if(ninja[b].fury > 100){\r\n                    damagerate = ninja[b].dmg / 100 * ninja[b].dmgrate;\r\n                    damagegrow = damagerate / 100 * ninja[b].dmggrow;\r\n                    totaldmg += damagegrow;\r\n                    for(var c = 0; c < 5; c++){// add fury each ninja by 25\r\n                        ninja[c].fury +=25;\r\n                    }\r\n                     ninja[b].fury -= 25;\r\n                     ninja[b].fury +=100;\r\n                 }else {\r\n                    damagerate = ninja[b].dmg / 100 * ninja[b].dmgrate;\r\n                    totaldmg += damagerate;\r\n                    ninja[b].fury += 50;\r\n                 }\r\n            } else {\r\n                if(ninja[b].fury == 100){\r\n                    damagerate = ninja[b].dmg / 100 * ninja[b].dmgrate;\r\n                    damagegrow = damagerate / 100 * ninja[b].dmggrow;\r\n                    totaldmg += damagegrow;\r\n                    ninja[b].fury = 0;\r\n                }else if(ninja[b].fury > 100){\r\n                    damagerate = ninja[b].dmg / 100 * ninja[b].dmgrate;\r\n                    damagegrow = damagerate / 100 * ninja[b].dmggrow;\r\n                    furydmg = damagegrow + (damagegrow / 100) * ((ninja[b].fury - 100) / 0.25);\r\n                    totaldmg += furydmg;\r\n                    ninja[b].fury = 0;\r\n                }else {\r\n                    damagerate = ninja[b].dmg / 100 * ninja[b].dmgrate;\r\n                    totaldmg += damagerate;\r\n                    ninja[b].fury += 50;\r\n                }\r\n            }\r\n        }\r\n    }\r\n\r\n   document.getElementById(\"result\").innerHTML = totaldmg;\r\n};\r\n</xmp>', 1, 11, '2021-03-29 18:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_img` varchar(400) NOT NULL,
  `user_pas` varchar(300) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_img`, `user_pas`, `datetime`) VALUES
(6, 'Rohit', 'rohit@123.com', '', '$2y$10$N2NmNjJkY2IxMDhhZmNhYeitaeToHjuttt6jFpozcJQdU6nOjZKs2', '2021-03-11 23:21:05'),
(10, 'Madhav', 'madhavyagni01@gmail.com', 'images/user_imgs/new.png', '$2y$10$NjNmNTAxODEzMjViZmMxYOgjZFBwsZL4aBD35RcHxrXtXd5Emzb9y', '2021-03-13 19:49:44'),
(11, 'Test', 'test@123.com', '', '$2y$10$ZTg5YTgwYzk4OGRlYTE4Ze8vNyopfvbOQC.y76Bc/wwkcHmpIE0Ae', '2021-03-23 21:17:09'),
(14, 'Jack', 'jack0203@gmail.com', '', '$2y$10$MzJkN2ZiZGIwOTVjNTJmOO2EALV1Bkxvz.O7vhudKCXQavPWz2tqK', '2021-03-29 01:27:01'),
(15, 'tarun', 'tarun246@gmail.com', '', '$2y$10$NjcwYjEzMjgwZTNhZTIzM.r59Uray0SUuM5PnzrcQaaJoc2eULCau', '2021-03-29 17:45:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `approve`
--
ALTER TABLE `approve`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `approve`
--
ALTER TABLE `approve`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sno` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
