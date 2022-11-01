-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 10:08 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issatech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `admin_pass` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_pass`) VALUES
(1, 'kamal', '123123'),
(2, 'jkhissa', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `bill_no`, `user_id`, `price`, `status`, `created_at`) VALUES
(6, 4, 1, 678, 0, '2020-11-21 20:51:15'),
(7, 0, 4, 3429.6, 0, '2020-11-21 21:20:02'),
(8, 0, 9, 5858.4, 0, '2020-11-25 01:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `user_id`, `image`, `created_at`) VALUES
(1, 'celeb celeb celeb celeb', 'Little Mix star Leigh-Anne Pinnock has landed her first solo project since Jesy Nelson went on an extended break.\r\n\r\nLittle Mix have rallied around Jesy, 29, after she has temporarily left the girl group - also made up of Perrie Edwards and Jade Thirlwall - because of \"private medical reasons\".\r\n\r\nLeigh-Anne, 29, has since teased her first ever movie role in upcoming British romantic comedy Boxing Day.\r\n\r\nThe singer-turn-actress has plenty of experience filming music videos.\r\n\r\nLittle Mix\'s Leigh-Anne joined an all-black cast for the Christmas comedy movie, according to Deadline. \r\nLittle Mix star Leigh-Anne Pinnock has landed her first solo project since Jesy Nelson went on an extended break.\r\n\r\nLittle Mix have rallied around Jesy, 29, after she has temporarily left the girl group - also made up of Perrie Edwards and Jade Thirlwall - because of \"private medical reasons\".\r\n\r\nLeigh-Anne, 29, has since teased her first ever movie role in upcoming British romantic comedy Boxing Day.\r\n\r\nThe singer-turn-actress has plenty of experience filming music videos.\r\n\r\nLittle Mix\'s Leigh-Anne joined an all-black cast for the Christmas comedy movie, according to Deadline.', 1, '4f4292c479684cc093a34dc928307f2a', '2020-11-25 07:09:02'),
(2, 'Celebirty', 'Little Mix star Leigh-Anne Pinnock has landed her first solo project since Jesy Nelson went on an extended break.\r\n\r\nLittle Mix have rallied around Jesy, 29, after she has temporarily left the girl group - also made up of Perrie Edwards and Jade Thirlwall - because of \"private medical reasons\".\r\n\r\nLeigh-Anne, 29, has since teased her first ever movie role in upcoming British romantic comedy Boxing Day.\r\n\r\nThe singer-turn-actress has plenty of experience filming music videos.\r\n\r\nLittle Mix\'s Leigh-Anne joined an all-black cast for the Christmas comedy movie, according to Deadline.\r\nLittle Mix star Leigh-Anne Pinnock has landed her first solo project since Jesy Nelson went on an extended break.\r\n\r\nLittle Mix have rallied around Jesy, 29, after she has temporarily left the girl group - also made up of Perrie Edwards and Jade Thirlwall - because of \"private medical reasons\".\r\n\r\nLeigh-Anne, 29, has since teased her first ever movie role in upcoming British romantic comedy Boxing Day.\r\n\r\nThe singer-turn-actress has plenty of experience filming music videos.\r\n\r\nLittle Mix\'s Leigh-Anne joined an all-black cast for the Christmas comedy movie, according to Deadline.\r\nLittle Mix star Leigh-Anne Pinnock has landed her first solo project since Jesy Nelson went on an extended break.\r\n\r\nLittle Mix have rallied around Jesy, 29, after she has temporarily left the girl group - also made up of Perrie Edwards and Jade Thirlwall - because of \"private medical reasons\".\r\n\r\nLeigh-Anne, 29, has since teased her first ever movie role in upcoming British romantic comedy Boxing Day.\r\n\r\nThe singer-turn-actress has plenty of experience filming music videos.\r\n\r\nLittle Mix\'s Leigh-Anne joined an all-black cast for the Christmas comedy movie, according to Deadline.\r\nLittle Mix star Leigh-Anne Pinnock has landed her first solo project since Jesy Nelson went on an extended break.\r\n\r\nLittle Mix have rallied around Jesy, 29, after she has temporarily left the girl group - also made up of Perrie Edwards and Jade Thirlwall - because of \"private medical reasons\".\r\n\r\nLeigh-Anne, 29, has since teased her first ever movie role in upcoming British romantic comedy Boxing Day.\r\n\r\nThe singer-turn-actress has plenty of experience filming music videos.\r\n\r\nLittle Mix\'s Leigh-Anne joined an all-black cast for the Christmas comedy movie, according to Deadline.', 1, 'b78273880c466fa3076bdef906851a61', '2020-11-25 07:08:35'),
(3, 'Yaba Daba', 'Test post lala sodos', 5, 'af08186427ced05cd4268de9fb8a20e4', '2020-11-20 21:32:04'),
(4, 'This is a test article', 'It would have been nice if the test article was available as a separate page instead of the bottom of all articles. ', 5, 'c2c582b112982f5c009c5c20b498e021', '2020-11-21 18:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `blog_id`, `comment`, `created_at`) VALUES
(1, 1, 1, 'sfdsdfa asf saf safd saf dsafds afdsafd sa', '2020-11-20 13:59:00'),
(2, 1, 1, 'sf s dg45y4thrth gh ffhgfh fh fh fhfgh fgh dfhg fhg fghf hfhg fhg fhgf hfh fh fh fhg fsf s dg45y4thrth gh ffhgfh fh fh fhfgh fgh dfhg fhg fghf hfhg fhg fhgf hfh fh fh fhg fsf s dg45y4thrth gh ffhgfh fh fh fhfgh fgh dfhg fhg fghf hfhg fhg fhgf hfh fh fh fhg fsf s dg45y4thrth gh ffhgfh fh fh fhfgh fgh dfhg fhg fghf hfhg fhg fhgf hfh fh fh fhg fsf s dg45y4thrth gh ffhgfh fh fh fhfgh fgh dfhg fhg fghf hfhg fhg fhgf hfh fh fh fhg fsf s dg45y4thrth gh ffhgfh fh fh fhfgh fgh dfhg fhg fghf hfhg fhg fhgf hfh fh fh fhg f', '2020-11-20 14:07:40'),
(3, 1, 1, 'rh dfg d', '2020-11-20 06:25:39'),
(4, 5, 3, 'Test comment ', '2020-11-20 21:41:52'),
(5, 5, 3, 'Comments look strange', '2020-11-20 21:42:51'),
(6, 5, 3, 'Test comment 2 ', '2020-11-21 18:06:11'),
(7, 5, 3, 'Test comment 3 - 123!\"£!\"£!£%\"$£%\"£$\"£%£$@!L£$!@£%<!M', '2020-11-21 18:06:28'),
(8, 4, 3, 'hello hello', '2020-11-21 21:48:06'),
(9, 8, 5, 'This post is awesome', '2020-11-23 02:53:03'),
(10, 1, 2, 'lala', '2020-11-23 23:51:25'),
(11, 1, 1, 'HELLO THIS ARTICLAE IS GOOD', '2020-11-25 01:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `purpose` varchar(20) COLLATE utf8_bin NOT NULL,
  `message` longtext COLLATE utf8_bin NOT NULL,
  `trn_date` date NOT NULL,
  `phone` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `purpose`, `message`, `trn_date`, `phone`) VALUES
(1, 'kamal ', 'kamal@gmail.com', 'help', 'hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello ', '2020-11-20', '+60183559602'),
(2, 'jamal', 'jama@email.com', 'assistance ', 'assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance assistance ', '2020-11-20', '+60111222333'),
(3, 'rtyr', 'tyrty', 'rtyr', 'rtyrty', '2020-11-20', 'tyrty'),
(4, 'sadfas', 'sssssfffffffffffffffffffff', 'dfasdf', 'sdf', '2020-11-20', 'dfas'),
(5, 'sdf', 'sdf', '', 'sdf', '2020-11-20', 'sdf'),
(6, 'rge', 'erge', 'grerg', 'rge', '2020-11-20', 'rge'),
(7, 'Jamal Issa', 'jkhissa@gmail.com', 'asdasd', 'asdasdasd', '2020-11-21', '07511625413');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quality` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quality`, `price`, `order_count`, `created_at`) VALUES
(35, 1, 8, 1, 59, 4, '2020-11-21 20:48:41'),
(36, 1, 7, 1, 506, 4, '2020-11-21 20:50:56'),
(37, 4, 6, 2, 1429, 0, '2020-11-21 21:19:37'),
(39, 9, 6, 2, 1429, 0, '2020-11-25 08:20:00'),
(40, 9, 7, 4, 506, 0, '2020-11-25 08:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` double(9,2) NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT 1,
  `discount_percentage` int(11) NOT NULL,
  `sell_count` int(11) NOT NULL,
  `instock` double NOT NULL,
  `image` varchar(250) NOT NULL,
  `detail_image` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modification_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `submittedby` varchar(100) NOT NULL,
  `editedby` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `description`, `price`, `is_new`, `discount_percentage`, `sell_count`, `instock`, `image`, `detail_image`, `creation_date`, `modification_date`, `submittedby`, `editedby`) VALUES
(6, 'LG Gram 2-in-1 Convertible Laptop: 14\" Full HD IPS Touchscreen Display, Intel 10th Gen Core i7-10510U CPU, 16GB RAM, 1TB (512GB x 2) M.2 MVMe SSD, Thunderbolt 3, 20.5 Hour Battery 14T90N (2020)', 'LG Gram 2-in-1 Convertible Laptop', '14” Full HD (1920 x 1080) IPS LCD Touchscreen with Corning Gorilla Glass 6\r\nWindows 10 Home (64bit)\r\nConverts to 14” Tablet - includes Stylus Pen\r\n16GB DDR4 RAM and 1TB (512GB x 2) NVMe SSD\r\nIntel 10th Generation Intel Core i7-10510U CPU\r\nUp to 20. 5 Hour Battery (72Wh)\r\nThunderbolt 3', 1428.79, 1, 0, 10, 100, 'product-2.jpg', 'product-details-img2.jpg', '2020-11-18 09:07:07', '2020-11-19 15:51:03', 'kamal', ''),
(7, 'MobileDemand Flex 10B Rugged Touchscreen Tablet | Ultra Lightweight | 10.1-in Display | Windows 10 Pro | MIL-STD-810G |3000mAh Battery| Quad Core Celeron N4100 for Enterprise Mobile Field Work', 'MobileDemand Flex 10B Rugged Touchscreen Tablet', 'ULTRA LIGHTWEIGHT & BUILT TOUGH - 10.1 inch display with capacitive multi-touch touchscreen is thin and lightweight at only 2.07 lbs. Easy to carry and hold in the field and at work with briefcase carrying handle & back hand strap. Enclosed in an extremely durable protective case with protective corner bumpers with and oleophobic scratch-resistant screen protector\r\nRUGGED TABLET FOR ENTERPRISE FIELD WORK - MIL-STD-810G, drop tested; 26 repeated drops to plywood over concrete at 4 feet & covered ports ideal for tough jobs in extreme conditions. Perfect for work in demanding industrial, outdoor & manufacturing environments. 7.4V/3000mAh battery for long days in the field.Law Enforcement Grade for Police, EMS, Firefighters, & First Responders\r\nMILITARY GRADE PERFORMANCE - Windows 10 Professional (64 bit) operating system, Intel Celeron N4100 Quad Core, 4GB RAM, 128GB eMMC, type A 3.0 USB, USB-C, Mini HDMI, 3.5mm standard headphone jack for superior performance. Front & rear facing camera, WLAN IEEE Wi-Fi (802.11 a/b/g/n/ac) & Bluetooth 4.2.Realtek Audio Speakers (x2)\r\nREADY TO MOUNT - Snap Mount Plate installed on back of case ready for quick release mobile or fixed mounting solutions. Great for field workers or mobile computing. Compatible with RAM Mounting hardware (all mounting solutions sold separately).\r\nWHAT YOU GET - Includes Power Adapter, briefcase handle, hand strap (already installed on back) & a 1 year manufacturer hardware warranty\r\n', 595.00, 1, 15, 5, 100, 'product-3.jpg', 'product-details-img3.jpg', '2020-11-18 09:08:09', '2020-11-19 15:51:03', 'kamal', ''),
(8, 'NVIDIA Jetson Nano 2GB Developer Kit', 'NVIDIA Jetson Nano', 'Discover the power of AI and robotics with NVIDIA Jetson Nano 2GB Developer Kit. It’s small, powerful, and priced for everyone. This means educators, students, and other enthusiasts can now easily create projects with fast and efficient AI using the entire GPU-accelerated NVIDIA software stack.\r\nLearning by doing is key for anyone new to AI and robotics, and the Jetson Nano 2GB Developer Kit is ideal for hands-on teaching and learning. Unlike online-only learning, you’ll see your work on the developer kit perceive and interact with the world around you in real time.\r\nThousands of Jetson Nano developers actively contribute videos, how-tos, and open-source projects in addition to the free and comprehensive tutorials offered by NVIDIA. These start with an introductory “Hello AI World,” continue to robotics projects such as the open-source NVIDIA JetBot AI robot platform, and lead to the next level of robotics development with NVIDIA Isaac.\r\nAll these resources are enabled by NVIDIA JetPack, which brings to each Jetson developer the same CUDA-X software and tools used by professionals around the world. JetPack includes a familiar Linux environment and simplifies the development process with support for cloud-native technologies such as containerization and orchestration.\r\nThe Jetson Nano 2GB Developer Kit delivers incredible AI performance at a low price. It makes the world of AI and robotics accessible to everyone with the exact same software and tools used to create breakthrough AI products across all industries. There’s no better way to start.\r\n', 59.00, 1, 0, 7, 100, 'product-4.jpg', 'product-details-img4.jpg', '2020-11-18 09:08:54', '2020-11-19 15:51:03', 'kamal', ''),
(9, 'HP 65 | Ink Cartridge | Black | N9K02AN', 'HP  N9K02AN', 'Make sure this fits by entering your model number.\r\nHP 65 ink cartridges work with: HP DeskJet 2622, 2625, 2635, 2636, 2652, 2655, 3720, 3722, 3752, 3755, 3758, 5025, 5055.\r\nHP ENVY 5010, 5012, 5020, 5052, 5030, 5032, 5034, 5055. HP AMP 100, 105, 120, 125, 130.\r\nUp to 2x more prints with Original HP ink vs refill cartridges.\r\nHP 65 ink cartridge yield (approx.): 120 pages\r\nOriginal HP ink cartridges: Genuine ink for your HP printer.\r\nWhats in the box: 1 New Original HP 65 ink cartridge (N9K02AN)\r\nColor: Black\r\nChoose an ink replenishment service - Let your printer track usage and have ink delivered before you run out. Either reorder HP Genuine ink cartridges only when you need them through Amazon Dash Replenishment, or save up to 50% by paying for pages printed through HP Instant Ink.\r\n', 23.40, 1, 5, 0, 100, 'product-5.jpg', 'product-details-img5.jpg', '2020-11-18 09:13:42', '2020-11-19 15:51:03', 'kamal', ''),
(10, 'Roku Express HD Streaming Media Player', 'Roku Express HD Streaming Media Player', 'New! Peacock is now streaming on all Roku devices\r\nStreaming made easy: Roku express lets you stream free, live and premium TV over the internet right to your TV; it’s perfect for new users, secondary TVs and easy gifting but powerful enough for seasoned pros\r\nQuick and easy setup: just plug it into your TV with the included high speed HDMI cable and connect to the internet to get started\r\nTons of power, tons of fun: compact and power-packed, you will stream your favorites with ease; from movies and series on apple TV, prime video, Netflix, Disney+, the Roku channel, HBO, show time and google play to cable alternative like Hulu with live TV, enjoy the most talked about TV Across free and paid channels\r\nLow cost, no extra fees: for under Dollar 30, Roku express streaming device includes a high speed HDMI cable and theres no monthly equipment fee; with access to free TV on hundreds of channels, there is plenty to stream without spending extra\r\nSimple remote: Incredibly easy to use, this remote features shortcut buttons to popular streaming channels\r\nEndless entertainment: stream it all, including free TV, live news, sports, and more; never miss award-winning shows, the latest blockbuster hits, and more; access 500, 000+ movies and TV episodes; stream what you love and cut back on cable TV bills\r\n', 24.99, 1, 0, 0, 100, 'product-6.jpg', 'product-details-img6.jpg', '2020-11-18 09:15:27', '2020-11-19 15:51:03', 'kamal', ''),
(11, 'TP-Link 5 Port Gigabit Ethernet Network Switch - Ethernet Splitter | Plug & Play | Fanless | Sturdy Metal w/ Shielded Ports | Traffic Optimization | Unmanaged | Limited Lifetime Protection(TL-SG105)', 'TP-Link 5 Port Switch TL-SG105', 'One Switch Made to Expand Network 5× 10/100/1000Mbps RJ45 Ports supporting Auto Negotiation and Auto MDI/MDIX\r\nGigabit that Saves Energy Latest innovative energy-efficient technology greatly expands your network capacity with much less power consumption and helps save money\r\nReliable and Quiet IEEE 802.3X flow control provides reliable data transfer and Fanless design ensures quiet operation\r\nPlug and Play Easy setup with no software installation or configuration needed\r\nAdvanced Software Features Prioritize your traffic and guarantee high quality of video or voice data transmission with Port-based 802.1p/DSCP QoS and IGMP Snooping\r\n', 16.99, 1, 0, 0, 100, 'product-7.jpg', 'product-details-img7.jpg', '2020-11-18 09:16:37', '2020-11-19 15:51:03', 'kamal', ''),
(12, 'ARRIS SURFboard SB8200 DOCSIS 3.1 Gigabit Cable Modem, Approved for Cox, Xfinity, Spectrum & others', 'SB8200 DOCSIS 3.1', 'Compatible with major U S Cable Internet Providers including Cox, Spectrum, Xfinity & others Not compatible with ATT, Verizon, CenturyLink or other DSL or Fiber internet providers\r\nDOCSIS 3 1 Cable Modem best for cable internet speed plans up to 2 Gbps. Note, a 2nd IP address is required from your cable internet provider to reach 2 Gbps\r\n32 downstream x 8 upstream DOCSIS 3 0 bonded channels, 2 downstream x 2 upstream OFDM DOCSIS 3 1 channels\r\nTwo 1-Gigabit Ethernet ports (Note, a 2nd IP address may be required by your cable internet provider to activate 2nd port)\r\nCable internet service required Does not inlcude Wi-Fi and does not support cable digital voice service\r\n', 149.00, 1, 0, 0, 100, 'product-8.jpg', 'product-details-img8.jpg', '2020-11-18 09:17:36', '2020-11-19 15:51:03', 'kamal', ''),
(13, 'UGREEN Ethernet Adapter USB 2.0 to 10/100 Network RJ45 LAN Wired Adapter Compatible for Nintendo Switch, Wii, Wii U, MacBook, Chromebook, Windows, Mac OS, Surface, Linux ASIX AX88772 Chipset (Black)', 'Adapter USB 2.0 AX88772', 'Fast Wired Network: Ugreen usb 2.0 to RJ45 Network Adapter connects your computer or tablet to a router,modem or network switch for network connection.\r\nAdd RJ45 Port: USB 2.0 Ethernet Adapter is a good solution for adding a standard RJ45 port to your Ultrabook, notebook, or Macbook Air for file transferring, video conferencing, gaming, and HD video streaming.\r\nFast Speed: Full 10/100 Mbps fast Ethernet performance over USB 2.0 s 480 Mbps bus, the usb network adapter converter is faster and more reliable than most wireless connections. Link and Activity LEDs. USB powered, no external power required.\r\nPractical Feature: USB to ethernet supports Wake-on-Lan (WoL), Full-Duplex (FDX) and Half-Duplex (HDX) Ethernet, Crossover Detection, Backpressure Routing, Auto-Correction (Auto MDIX). Support IPv4/IPv6 protocols and 10BASE-T and 100BASE-TX networks.\r\nWidely Compatible with Nintendo Switch, Nintendo Switch Lite, Wii and Wii U supported, more stable and faster network for gaming. The USB RJ45 Adapter is widely compatible with Windows, Mac OS, Linux kernel 3.x/2.6, and Chrome OS. Note: 1. Linux kernel 3.x/2.6.x, Windows 7/XP/Vista 32/64-bit require driver install via download or included disk. 2. Not supported on ARM-based Windows, including Surface RT and Surface 2.\r\n\r\n\r\n', 14.99, 1, 0, 1, 100, 'product-9.jpg', 'product-details-img9.jpg', '2020-11-18 09:39:16', '2020-11-19 15:51:03', 'kamal', ''),
(14, '1080P Business Webcam with Dual Microphone & Privacy Cover, 2020 [Upgraded] NexiGo USB FHD Web Computer Camera, Plug and Play, for Zoom/Skype/Teams Online Teaching, Laptop MAC PC Desktop', '1080P Business Webcam', '?1080P Full HD Webcam?Powered by the 1080p Full HD 2 Megapixel CMOS. The NexiGo PC Webcam can provide you with excellent video quality with live streaming and record up to 1080p at 30 frames per second. Focal length 3.6mm glass lens provides a sharper image. It is a great choice for callings, streaming, video conferencing, and recordings.\r\n?Plug and Play?No additional drivers or software required. You just plug the USB into your computer and it is ready to go! NO extra setup needed, which is compatible with most live streaming and recording software.\r\n[Privacy Cover for Security]The privacy cover for the NexiGo PC Webcam covers the lens when it is not in use which prevents web hackers from spying on you.\r\n?Built-in Microphone & Noise Cancelling?Built-in dual digital stereo microphone with auto noise cancellation and superior stereo audio for clear and natural sound recordings. Even in noisy surroundings you can capture the sounds you want. Great for webinars, video conferencing, live streaming, etc.\r\n?Widely Compatible & Multi Application?The NexiGo webcam is compatible with Skype, YouTube, Facebook, Xbox One, OBS, Mixer, Zoom, Hangouts, FaceTime, Twitter, Twitch, WhatsApp, Yahoo, MSN, Android, IPTV, and more. It is also compatible with MAC OS X 10.7 and higher/ Windows 7, 8, 10/ Android 4.0 or higher/ and more.\r\n', 39.99, 1, 5, 0, 100, 'product-10.jpg', 'product-details-img10.jpg', '2020-11-18 09:40:04', '2020-11-19 15:51:03', 'kamal', ''),
(15, 'L', 'L', 'Web camera specifically designed and optimized for professional quality video streaming on social gaming and entertainment sites like Twitch and YouTube\r\nStream and record vibrant, true to life HD 1080P video at 30Fps/ 720P at 60FPS. Compatibility Windows 7, Windows 8 or Windows 10, macOS X 10.9 or higher, XBox One, Chrome OS, Android v5.0 or above, USB port. FoV: 78 degree\r\nFull HD glass lens and premium autofocus deliver razor sharp, clear video in consistent high definition while 2 built in mics capture your voice in rich stereo audio\r\n', 2228.99, 1, 0, 0, 100, 'product-11.jpg', 'product-details-img11.jpg', '2020-11-18 09:40:28', '2020-11-25 01:28:47', 'kamal', 'kamal');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rate`, `comment`, `created_at`) VALUES
(1, 1, 6, 3, 'this is is si sis is si si sidf id fi sidfs idf sidf isd fis dfis idfs idfjsijvxicjvix vji weij wier iwejr iwjreiwjfidsjfix cvixjcivx icvjxi  cvijdgfiejr tiejrit eifjxif gidjfgi difdjgifjgd irtie rti jijg idfjig di fgdifj geijierjtd jfi idj vb', '2020-11-19 15:31:45'),
(10, 4, 7, 5, 'hello hello ', '2020-11-20 21:17:35'),
(47, 1, 5, 5, 'xdvfsdgfs', '2020-11-21 18:10:15'),
(48, 0, 8, 5, '1', '2020-11-22 07:08:49'),
(49, 0, 13, 5, '1', '2020-11-22 07:08:51'),
(50, 0, 13, 5, '1', '2020-11-22 07:09:43'),
(51, 0, 13, 5, '1', '2020-11-22 07:09:44'),
(52, 0, 13, 5, '1', '2020-11-22 07:09:45'),
(53, 0, 13, 5, '1', '2020-11-22 07:09:45'),
(54, 0, 13, 5, '1', '2020-11-22 07:09:46'),
(55, 0, 13, 1, '1', '2020-11-22 07:09:47'),
(56, 0, 13, 0, '1', '2020-11-22 07:09:48'),
(57, 0, 13, 5, '1 AND 5646=5646', '2020-11-22 07:09:50'),
(58, 0, 13, 5, '1', '2020-11-22 07:09:51'),
(59, 0, 13, 5, '1', '2020-11-22 07:09:52'),
(60, 0, 13, 5, '1\" AND \"QnJI\"=\"QnJI', '2020-11-22 07:09:53'),
(61, 0, 13, 5, '1\" AND \"QnJI\" LIKE \"QnJI', '2020-11-22 07:09:54'),
(62, 0, 13, 5, '1) AND (3965=3965', '2020-11-22 07:09:55'),
(63, 0, 13, 5, '1\") AND (\"CCXy\"=\"CCXy', '2020-11-22 07:09:57'),
(64, 0, 13, 5, '1\") AND (\"CCXy\" LIKE \"CCXy', '2020-11-22 07:09:58'),
(65, 0, 13, 5, '1)) AND ((2344=2344', '2020-11-22 07:09:59'),
(66, 0, 13, 5, '1\")) AND ((\"ykJy\"=\"ykJy', '2020-11-22 07:10:02'),
(67, 0, 13, 5, '1\")) AND ((\"ykJy\" LIKE \"ykJy', '2020-11-22 07:10:03'),
(68, 0, 13, 5, '1))) AND (((6773=6773', '2020-11-22 07:10:04'),
(69, 0, 13, 5, '1\"))) AND (((\"yIPM\"=\"yIPM', '2020-11-22 07:10:08'),
(70, 0, 13, 5, '1\"))) AND (((\"yIPM\" LIKE \"yIPM', '2020-11-22 07:10:08'),
(71, 0, 13, 1, '1', '2020-11-22 07:10:13'),
(72, 9, 7, 3, 'Hello this product is good', '2020-11-25 01:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(100) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `profileimg` varchar(250) COLLATE utf8_bin NOT NULL,
  `order_count` int(11) NOT NULL DEFAULT 0,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `profileimg`, `order_count`, `trn_date`) VALUES
(1, 'kamalios', 'kamal1', 'issa', 'kamaloissa1@gmail.com', '202cb962ac59075b964b07152d234b70', '73d5f440185251e02a59ab19d099e2b2', 5, '2019-12-16 11:24:43'),
(5, 'jkhissa', 'Jamal', 'Issa', 'jkhissa@gmail.com', 'e0639adc2feb5b1145d2bec46ac13a65', 'b53f69afe3904682f1f7623a2fe023d6', 0, '2020-11-20 14:19:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
