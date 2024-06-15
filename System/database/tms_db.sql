-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 02:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `products_Price` varchar(50) NOT NULL,
  `Products_Name` varchar(100) NOT NULL,
  `total_Price` varchar(100) NOT NULL,
  `Customer_Id` int(11) NOT NULL,
  `single_price` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `category_name`, `category_description`) VALUES
(1, 'Software', 'software for sale'),
(3, 'Gift Card', ''),
(12, 'Games', '');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `date_registered` date DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `card_expiry_date` text DEFAULT NULL,
  `card_cvv` varchar(4) DEFAULT NULL,
  `preferred_payment_method` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `Address` varchar(255) NOT NULL,
  `Cardholder_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `user_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `country`, `address_line2`, `city`, `state`, `zip_code`, `date_registered`, `is_admin`, `card_number`, `card_expiry_date`, `card_cvv`, `preferred_payment_method`, `date_of_birth`, `gender`, `Address`, `Cardholder_name`) VALUES
(16, 49, 'client', 'client', 'client@gmail.com', '202cb962ac59075b964b07152d234b70', '0777777777', 'France', '-', 'Amman', 'Amman', '19990', '2023-05-28', NULL, '9999-9999-9999-9999', '04/24', 'e744', NULL, '2014-04-03', 'male', 'istqlal st', 'Elmer Funk'),
(18, 51, 'mohannad', 'ajamyh', 'mohannad@gmail.com', '202cb962ac59075b964b07152d234b70', '0799999999', 'AF', '', 'Amman', 'Amman', '19990', '2023-05-29', NULL, '3333-3333-3333-3333', '08/24', '846', NULL, '2014-03-05', 'male', 'al yasmeen', 'mohannad');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `ID` int(11) NOT NULL,
  `navbar` text NOT NULL,
  `background_home` text NOT NULL,
  `F_name_comp` varchar(55) NOT NULL,
  `L_name_comp` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`ID`, `navbar`, `background_home`, `F_name_comp`, `L_name_comp`) VALUES
(2, 'gg_Logo1_NEW (1).png', '', 'GG', 'Site');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `Company` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Country` varchar(55) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `REMARKS` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `Products` varchar(255) NOT NULL,
  `Amount_Paid` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `Name`, `Email`, `Phone`, `address`, `Products`, `Amount_Paid`, `customer_id`, `product_id`, `quantity`) VALUES
(89, 'client client', 'client@gmail.com', '0777777777', 'istqlal st', 'Diablo IV | Ultimate Edition (Xbox Series X/S)  (48 3)', '240', 49, 48, 3),
(90, 'client client', 'client@gmail.com', '0777777777', 'istqlal st', 'Resident Evil 4 Remake (PC) (47 2)', '113.6', 49, 47, 2);

-- --------------------------------------------------------

--
-- Table structure for table `page_about`
--

CREATE TABLE `page_about` (
  `id` int(11) NOT NULL,
  `section_header` varchar(255) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_about`
--

INSERT INTO `page_about` (`id`, `section_header`, `about_title`, `description`) VALUES
(1, 'GG Site', 'With many years of experience we at GG Company pride ourselves on delivering high-quality and customized software solutions in line with our clients requirements. ', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `old_price` decimal(10,2) NOT NULL,
  `new_price` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `review_number` int(11) NOT NULL,
  `Offer_date` text DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `product_name`, `old_price`, `new_price`, `discount`, `review_number`, `Offer_date`, `id_category`) VALUES
(14, 'Microsoft Windows 11 Home.png', 'Microsoft Windows 11 Home', 189.98, 129.99, 31, 2548, 'Jun 9 2023', 1),
(30, 'razer.png', 'Razer Gold 20 USD - Razer Key - GLOBAL', 23.90, 19.12, 20, 20000, 'Jun 1 2022', 1),
(31, 'Gta.png', 'Grand Theft Auto V: Premium Online Edition (PC)', 30.00, 18.00, 40, 11352, 'Jun 28 2023', 1),
(37, '5d67c1ce46177c23cb6dcf28.png', 'Windows 7 OEM Professional PC Microsoft Key GLOBAL', 9.08, 8.44, 9, 58621, 'Jun 19 2023', 1),
(47, 'Resident_Evil_4_Remake.jpg', 'Resident Evil 4 Remake (PC)', 44.80, 56.80, 20, 258, 'Hun 1 2024', 12),
(48, '1b19f37be20642a1bdd15fb8.jpg', 'Diablo IV | Ultimate Edition (Xbox Series X/S) ', 90.00, 80.00, 10, 4230, 'Jun 20 2023', 12),
(49, '5c1b599dae653a12cd11fac2.png', 'McAfee AntiVirus PC 1 Device 3 Years', 34.00, 27.20, 20, 259, 'Jun 28 2023', 1),
(50, '202a62e65a5c456ebf44c92e.png', 'Microsoft Office Professional Plus 2021 ', 58.00, 46.40, 20, 589, 'Jun 24 2023', 1),
(51, 'iTunes_100_800x.png', 'Apple iTunes Gift Card 5000 JPY - iTunes Key - JAPAN', 48.90, 44.25, 20, 548, 'Jun 17 2023', 1),
(52, 'Amazon.png', 'Amazon Gift Card 100 EUR Amazon GERMANY', 117.89, 106.10, 9, 456, 'Jun 2 2022', 1),
(53, 'Dying Light 2.png', 'Dying Light 2 (PC) - Steam Key - GLOBAL', 75.50, 56.65, 25, 8977, 'Jun 18 2023', 12),
(54, 'Netflix Gift Card .png', 'Netflix Gift Card 200 TL - Netflix Key - TURKEY', 15.89, 12.40, 22, 798, 'Jun 22 2024', 3),
(57, 'Call of Duty Modern Warfare.png', 'Call of Duty: Modern Warfare II (PC) - Steam Account - GLOBAL', 76.00, 49.40, 35, 7879, '-', 1),
(61, '9d50cd4a1dc9472ba749aeef (1).png', 'Kaspersky Internet Security 2021 1 Device 1  GLOBAL', 27.00, 20.79, 23, 2568, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_details`
--

CREATE TABLE `products_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `can_activate_in` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `version` varchar(50) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `key_features` longtext DEFAULT NULL,
  `system_requirements_version` varchar(20) DEFAULT NULL,
  `system_requirements_cpu` varchar(100) DEFAULT NULL,
  `system_requirements_ram` text DEFAULT NULL,
  `system_requirements_storage` text DEFAULT NULL,
  `system_requirements_gpu` varchar(100) DEFAULT NULL,
  `reviews_date` text DEFAULT NULL,
  `reviews_name` varchar(100) DEFAULT NULL,
  `reviews_text` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_details`
--

INSERT INTO `products_details` (`id`, `product_id`, `platform`, `can_activate_in`, `type`, `version`, `details`, `key_features`, `system_requirements_version`, `system_requirements_cpu`, `system_requirements_ram`, `system_requirements_storage`, `system_requirements_gpu`, `reviews_date`, `reviews_name`, `reviews_text`) VALUES
(2, 14, 'Microsoft', 'Jordan', '1', 'GLOBAL', 'Microsoft Windows 11 Home Edition is a new operating system for PC, released for users looking for modern solutions and convenience. It is a fresh OS for personal computers and mobile devices, ensuring speed, security, and easy access to the most-needed features. Try Win 11 Home and see how natural the most advanced technology can be.', 'Device encryption - If you turn on device encryption, only authorized individuals will be able to access your device and data.', '----', '-', '-', '-', '-', '', '', ''),
(5, 30, 'Razer', 'Jordan', '1', 'Global', 'Use Razer Gold to buy games and in-game content to get more bang for your buck - including getting rewarded with Razer Silver and exclusive game deals. Important Note: Global USD pin can ONLY be used to reload into The Razer Gold wallet of the ', 'Razer Silver is the only loyalty rewards program for gamers, backed by Razer. Earn Razer Silver simply by using Razer Gold to make your game purchases or by participating in our software and services. Utilize your Razer Silver in exclusive events or use them to redeem exciting rewards.  When you rack up enough Razer Silver, you get to redeem a suite of great rewards—from Razer hardware to digital rewards such as Steam games and exclusive discount vouchers on various lifestyle brands. Stay updated on exclusive Razer Silver events and monthly rewards at silver.razer.com.', '-', '-', '-', '-', '-', 'nice', 'sami', 'Lorem ipsum dolor sit. amet consectetur adipisicing elit. Desernut sapoinet qui harum dignissimos. Lorem'),
(6, 31, 'Rockstar', 'Jordan', '1', 'GLOBAL', 'The Criminal Enterprise Starter Pack is the fastest way for new Grand Theft Auto Online players to jumpstart their criminal empires. Get access to a huge range of the most exciting and popular content in GTA Online including properties, businesses, weapons, vehicles and more – all content valued at over GTA 10,000,000 if purchased separately. Launch business ventures from your Maze Bank West Executive Office, research powerful weapons technology from your underground Paleto Forest Bunker or tear through the streets with a range of vehicles, including a Supercar, Motorcycles the weaponized Dune FAV and more.  In addition, you’ll get GTA 1,000,000 along with powerful weapons, all to help launch your reign over Los Santos and Blaine County.', 'Pump your online business with additional content worth over 10 million in-game cash', '-', 'Intel Core 2 Quad CPU@ 2.40GHz / AMD Quad-Core@ 2.5GHz', '8 GB RAM', '72 GB available space', 'NVIDIA 9800 GT 1GB / AMD HD 4870 1GB ', '5/2/2022', 'Noor Ahmed', 'Nice Games'),
(8, 37, 'Microsoft', 'Jordan', '1', 'GLOBAL', 'Windows 7 makes your life easier. Get a sleek, simplified Operating System from the industry leader. Browsing is faster, connecting is simpler, and the interface has never been more user friendly.Your OS should be designed to support your work and cooperate with your lifestyle. This is the perfect choice for the business-minded and the game-crazy. Your computer will run fast, smooth, and efficient with either the 32 bit or 64 bit version. Windows 7 is designed to improve the performance of your PC and to keep it secure. Make your computer feel like home with Windows 7 Pro.', 'New features, great feel - This is an Operating System that feels good to use. Developer is committed to delivering a transcendent computing experience when they released Windows 7 Pro.', '-', '-', '-', '-', '-', '20/9/2023', 'Samera', 'Perfect Product!'),
(9, 30, 'Razer', 'Jordan', '1', 'Global', 'Use Razer Gold to buy games and in-game content to get more bang for your buck - including getting rewarded with Razer Silver and exclusive game deals. Important Note: Global USD pin can ONLY be used to reload into The Razer Gold wallet of the ', 'Razer Silver is the only loyalty rewards program for gamers, backed by Razer. Earn Razer Silver simply by using Razer Gold to make your game purchases or by participating in our software and services. Utilize your Razer Silver in exclusive events or use them to redeem exciting rewards.  When you rack up enough Razer Silver, you get to redeem a suite of great rewards—from Razer hardware to digital rewards such as Steam games and exclusive discount vouchers on various lifestyle brands. Stay updated on exclusive Razer Silver events and monthly rewards at silver.razer.com.', '-', '-', '-', '-', '-', 'nice', 'sami', 'Lorem ipsum dolor sit. amet consectetur adipisicing elit. Desernut sapoinet qui harum dignissimos. Lorem'),
(10, 30, 'Razer', 'Jordan', '1', 'Global', 'Use Razer Gold to buy games and in-game content to get more bang for your buck - including getting rewarded with Razer Silver and exclusive game deals. Important Note: Global USD pin can ONLY be used to reload into The Razer Gold wallet of the ', 'Razer Silver is the only loyalty rewards program for gamers, backed by Razer. Earn Razer Silver simply by using Razer Gold to make your game purchases or by participating in our software and services. Utilize your Razer Silver in exclusive events or use them to redeem exciting rewards.  When you rack up enough Razer Silver, you get to redeem a suite of great rewards—from Razer hardware to digital rewards such as Steam games and exclusive discount vouchers on various lifestyle brands. Stay updated on exclusive Razer Silver events and monthly rewards at silver.razer.com.', '-', '-', '-', '-', '-', 'nice', 'sami', 'Lorem ipsum dolor sit. amet consectetur adipisicing elit. Desernut sapoinet qui harum dignissimos. Lorem'),
(18, 47, 'Steam', 'Jordan', '12', 'GLOBAL', 'Resident Evil 4 Remake is a survival horror video game developed and released by Capcom in 2023. The title is a refreshed version of the legendary game from 2005, introducing many graphical improvements and adapting it to the latest generation consoles. You can also expect modifications to the story and gameplay that make the whole experience smooth and connected. This remake focuses entirely on delivering the deepest immersion and feeling of solitude in a strange place, making it the perfect choice for all fans of the games in the series.', 'Use it as a replacement for your credit card', NULL, 'AMD Ryzen 3 1200 / Intel Core i5-7500', '8 gb ram', '60 GB', 'AMD Radeon 4GB VRAM / NVIDIA GeForce  4GB VRAM', '2/2/2023', 'Mohammad', 'Nice Game'),
(19, 48, 'Xbox Live', 'GLOBAL', '12', 'GLOBAL', 'Hell is waiting for you. Choose your favorite character class from the five available: Barbarian, Sorceress, Druid, Rogue, and Necromancer, and fight evil by developing skills and gathering the necessary resources beforehand.    Diablo 4 delivers what everyone loves most about the series. This action role-playing game of the hack and slash genre will be filled with re-playable, generated dungeons and character-building systems that we already know from previous parts of this series produced by Blizzard Entertainment.', 'The game refers to the climate of Diablo II, so longtime fans of the production will be satisfied Play in five locations from Diablo’s world: Sanctuary: Scosglen, Fractured Peaks, Dry Steppes, Hawezar, and Kehjistan', NULL, 'AMD Ryzen 3 1200 / Intel Core i5-7500', '8 GB RAM', '60 GB', 'AMD Radeon 4GB VRAM / NVIDIA GeForce  4GB VRAM', '12/3/2021', 'SARAH', 'XBOX For Life'),
(20, 49, 'McAfee', 'Jordan', '1', 'GLOBAL', 'Complete computer protection McAfee will protect your computer against viruses, the most dangerous software, and hacker attacks. You can be sure that your PC is free of bots and rootkits. And all this with the highest performance! Not only does McAfee run in the background to keep you safe at all times, but it also employs a range of tools and features to speed up your computer. ', 'Choose a McAfee® Antivirus 3-years subscription for one device and see how easy it is to use your computer with the best antivirus.', NULL, '-', '-', '-', '-', '25/4/2023', 'Ahmed Ali', 'Good'),
(21, 50, 'Microsoft', 'Jordan', '1', 'GLOBAL', 'Office Plus 21 - a reliable partner This package is a suite of flagship software from Microsoft - designed for your productivity. Create and edit documents in Office Word to free your creativity. Manage your spreadsheets in Office Excel, and you will soon find out that the most challenging calculations and planning are your natural talent. Are you planning to create an impressive presentation?  In this case, your irreplaceable friend is Microsoft PowerPoint - perfect for creating and editing slides for any occasion, with a wide range of animations, fonts, and objects to choose from. And if you are looking for a program that will support data resource management, try Office Access. Office 2021 also offers Microsoft Publisher for effortless content publishing. And what if you want to keep in touch? The answer is Office Outlook. It will help you manage your e-mails and inform you about any scheduled tasks for the day.', '-', NULL, '1 gigahertz (GHz)', '4 GB RAM', '64 GB or larger storage device.', 'Compatible with DirectX 12 ', '-', '-', '-'),
(22, 51, 'iTunes', 'Japan', '1', 'Japan', 'When you give iTunes Gift Cards to friends and family, they can choose whatever they want on the iTunes Store, App Store, iBooks Store, and Mac App Store.  iTunes Gift Cards are easy to give, and you can buy them from Apple and from thousands of other retailers in a range of denominations. And every card works in the iTunes Store, App Store, iBooks Store, and Mac App Store — so your recipients can get exactly what they want.', '-', NULL, '-', '-', '-', '-', '24/4/2023', 'Hadeel', 'Good Price'),
(23, 52, 'Amazon', 'Germany', '1', 'Germany', 'Amazon Gift Card 100 Euro Germany 100 Euro Germany Amazon Card can be a great gift for your family, friends, or yourself! The €100 Gift Card represents the exact value of real €100, which can be spent on anything from the Amazon online store. After buying the digital Gift Card, it will be instantly delivered to you, ready to use! German Amazon Gift Card can be activated and used only in Germany.', 'An easy way to buy thousands of items from amazon.com', NULL, '-', '-', '-', '-', '', '', ''),
(24, 53, 'Steam', 'Jordan', '12', 'GLOBAL', 'Dying Light 2 is an upcoming survival horror action role-playing video game developed by Techland and set to be released in 2022 by Techland Publishing. It is the sequel to the Dying Light from 2015 and it takes place 15 years after the story presented in its predecessor. As an infected survivor, you will be tasked with bringing back the order and ensuring peace in the city – you are the last hope of the society being on the brink of the collapse.', 'Craft your own unique gameplay experience by making dozens of tough decisions throughout the game', NULL, 'Intel Core i3-9100 / AMD Ryzen 3 2300X', '16 GB RAM', '60 GB available space', 'NVIDIA® GeForce® GTX 1050 Ti / AMD Radeon™ RX 560 (4GB VRAM)', '', '', ''),
(25, 54, 'Netflix', 'Turkey', '3', 'TURKEY', 'Nowadays entertainment is one of the easiest things, that people can get. With streaming services such as Netflix you can watch your favorite TV shows and movies, without being interrupted by popping ads or limited access to the Internet. With this 200 TL Netflix gift card you can free yourself from annoying ads, that pop off every single time when you want to watch your favorite movie, or you can give it to someone as a gift, so you can experience this rich collection of TV shows and movies together.', 'Give it to someone as a gift, and let them dive into great collection of even greater movies and TV shows', NULL, '-', '-', '-', '-', '', '', ''),
(26, 57, 'Steam ', 'Jordan', '1', 'GLOBAL', 'Call of Duty: Modern Warfare 2 - is a bundle of four extraordinary items that make up the unique Sasquatch operator set for your favorite first-person shooter gameplay in iconic Call of Duty: Modern Warfare II. Get just one or all four items and boost your style in this brutal online competition.', 'An action-packed and exciting single-player campaign', NULL, 'intel® Core™ i5-6600K / vs AMD Ryzen™ 5 1400', '12 GB RAM', '125 GB available space', 'NVIDIA® GeForce® GTX 1060 or AMD Radeon™ RX 580', '-', '-', '--'),
(27, 61, 'Kaspersky', 'Jordan', '1', 'GLOBAL', 'Kaspersky Internet Security 2021 is the best protection suite guarding your device against threats lurking in the dark corners of the web. Thanks to tried and tested solutions, the engineers at Kaspersky Lab created software that safeguards all your online operations – from browsing the web to online payments.', 'A perfect tool for protecting the users internet connection.', NULL, '-', '-', '-', '-', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'GG Site', 'info@GG.com', '+962787001466', 'Abdel Rahim Al-Waked Street, Shmeisani, Amman, Jordan', '');

-- --------------------------------------------------------

--
-- Table structure for table `system_settingss`
--

CREATE TABLE `system_settingss` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `cover_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settingss`
--

INSERT INTO `system_settingss` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Taji Company', 'info@TajiSoft.com', '+962787001466', 'Abdel Rahim Al-Waked', ''),
(1, 'Taji Company', 'info@TajiSoft.com', '+962787001466', 'Abdel Rahim Al-Waked', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `avatar` varchar(250) NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `Salary` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `avatar`, `date_created`, `Salary`) VALUES
(8, 'sami', 'ramiz', 'sami@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '1682680620_icons8-github-50.png', '2023-04-28 14:17:30', 0),
(48, 'admin', 'admin', 'admin@gg.com', '202cb962ac59075b964b07152d234b70', 1, '1685283660_159470802-jurist-avatar-icon-flat-style.jpg', '2023-05-28 17:21:05', 0),
(49, 'client', 'client', 'client@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 'no-image-available.png', '2023-05-28 17:25:05', 0),
(51, 'mohannad', 'ajamyh', 'mohannad@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 'no-image-available.png', '2023-05-29 18:48:23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_product` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `page_about`
--
ALTER TABLE `page_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `products_details`
--
ALTER TABLE `products_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `products_details`
--
ALTER TABLE `products_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`categories_id`);

--
-- Constraints for table `products_details`
--
ALTER TABLE `products_details`
  ADD CONSTRAINT `products_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;