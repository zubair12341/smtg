-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 12:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_tour_guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE `driver_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL DEFAULT 25,
  `cnic` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `driver_personal_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`driver_personal_info`)),
  `price_per_day` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `model` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`id`, `user_id`, `age`, `cnic`, `address`, `location`, `driver_personal_info`, `price_per_day`, `vehicle_type`, `availability`, `model`, `manufacturer`, `created_at`, `updated_at`) VALUES
(1, 5, 22, '21312312312', 'test adrress', 'test location', '\"hey this is my info\"', 1000, 'Sedan', 1, '2013', 'toyota', '2023-11-27 14:30:43', '2023-11-27 14:30:43'),
(2, 10, 18, '4240197804289', 'D 32 block 5 metroville site karachi', 'my world my world', '\"my world my world my world my world my world my world\"', 1200, 'Sedan', 1, '2015', 'toyota', '2023-11-27 18:38:38', '2023-11-27 18:38:38'),
(3, 15, 29, '4240197804289', 'D 32 block 5 metroville site karachi', 'public_html/logo-design-offer/assets/images', '\"I love to drive crazzy\"', 7000, 'Sedan', 1, '2023', 'Toyota', '2023-12-13 01:49:01', '2023-12-13 01:49:01'),
(4, 16, 40, '4240197804289', 'D 32 block 5 metroville site karachi', 'malamjaba swat', '\"i like to drive above 200 km\\/h\"', 9000, 'Hatchback', 1, '2024', 'BMW', '2023-12-13 02:03:09', '2023-12-13 02:03:09'),
(5, 18, 35, '4127123871283', 'D 32 block 5 metroville site karachi', 'D 31 block 5 metroville site karachi', '\"hey I love to drive fast\"', 1500, 'SUV', 1, '2015', 'toyota', '2024-01-22 10:02:23', '2024-01-22 10:02:23'),
(8, 26, 33, '23', 'dha', 'dha 7', '\"dsdsd\"', 23, 'Sedan', 1, '2024', '2001', '2024-02-26 15:35:15', '2024-02-26 15:35:15'),
(9, 27, 16, '725', 'xyz', 'dha', '\"hsdh\"', 9999, 'Hatchback', 1, '2024', '2024', '2024-02-26 16:27:50', '2024-02-26 16:27:50'),
(10, 28, 45, '79323', 'dha 7', 'dha 7', '\"Sunt doloribus atque\"', 8999, 'Sedan', 1, '2024', '2024', '2024-02-26 16:30:20', '2024-02-26 16:30:20'),
(11, 29, 32, '2322332', 'xyz', 'xyz', '\"xyz\"', 10000, 'Sedan', 1, '2024', '2024', '2024-02-26 16:31:59', '2024-02-26 16:31:59'),
(12, 30, 56, '333', 'lahore', 'lahore', '\"Aut a dolore dolore\"', 2999, 'Hatchback', 1, '2000', '2000', '2024-02-26 16:33:32', '2024-02-26 16:33:32'),
(13, 31, 56, '877', 'mianwali', 'mianwali', '\"Maiores nihil exerci\"', 196, 'Sedan', 1, '2007', '2007', '2024-02-26 16:35:37', '2024-02-26 16:35:37'),
(14, 32, 830, '369', 'ss', 'ss', '\"Amet fugit minus d\"', 5232, 'Minivan', 1, '2009', '2009', '2024-02-26 16:37:23', '2024-02-26 16:37:23'),
(15, 33, 70, '335', 'sjja', 'adk', '\"In voluptas aperiam\"', 581, 'Minivan', 1, '2010', '2010', '2024-02-26 16:38:52', '2024-02-26 16:38:52'),
(16, 34, 89, '823', '+1 (409) 562-2635', '+1 (428) 284-8173', '\"Ea sunt fuga Magnam\"', 391, 'Minivan', 1, '+1 (188) 665-3708', '+1 (789) 847-9962', '2024-02-26 16:40:35', '2024-02-26 16:40:35'),
(17, 35, 87, '483', '+1 (272) 196-7074', '+1 (804) 251-8072', '\"Dolor assumenda cum\"', 431, 'SUV', 1, '+1 (922) 426-5883', '+1 (506) 707-6167', '2024-02-26 16:41:05', '2024-02-26 16:41:05'),
(18, 37, 580, '788', '+1 (518) 992-4608', '+1 (273) 932-6941', '\"Aperiam consequatur\"', 682, 'Hatchback', 1, '+1 (559) 881-7963', '+1 (789) 349-8863', '2024-02-26 16:42:40', '2024-02-26 16:42:40'),
(19, 38, 435, '9', '+1 (144) 223-1062', '+1 (845) 698-3378', '\"Facere enim perferen\"', 585, 'Sedan', 1, '+1 (241) 489-2308', '+1 (491) 987-6881', '2024-02-26 16:43:01', '2024-02-26 16:43:01'),
(20, 39, 284, '192', '+1 (676) 729-6933', '+1 (118) 781-4241', '\"Et omnis at rerum ma\"', 393, 'Minivan', 1, '+1 (678) 603-7804', '+1 (886) 887-4595', '2024-02-26 16:43:20', '2024-02-26 16:43:20'),
(21, 40, 260, '668', '+1 (908) 928-7184', '+1 (916) 242-7352', '\"Dignissimos optio l\"', 71, 'Minivan', 1, '+1 (649) 811-3316', '+1 (264) 114-9266', '2024-02-26 16:43:38', '2024-02-26 16:43:38'),
(22, 41, 804, '698', '+1 (935) 594-1262', '+1 (111) 984-9053', '\"Recusandae Similiqu\"', 304, 'Sedan', 1, '+1 (545) 596-7648', '+1 (476) 402-8077', '2024-02-26 16:44:02', '2024-02-26 16:44:02'),
(23, 42, 191, '702', '+1 (211) 141-3528', '+1 (539) 623-4171', '\"Totam labore Nam id\"', 868, 'Sedan', 1, '+1 (574) 279-1135', '+1 (695) 169-6728', '2024-02-26 16:44:22', '2024-02-26 16:44:22'),
(24, 43, 697, '597', '+1 (732) 942-8586', '+1 (863) 306-1851', '\"Modi sequi elit do\"', 315, 'Hatchback', 1, '+1 (361) 946-4131', '+1 (785) 381-2777', '2024-02-26 16:45:09', '2024-02-26 16:45:09'),
(25, 44, 581, '265', '+1 (819) 119-1217', '+1 (768) 878-7803', '\"Placeat et vitae ut\"', 585, 'Sedan', 1, '+1 (148) 433-1417', '+1 (882) 556-1615', '2024-02-26 16:45:40', '2024-02-26 16:45:40'),
(26, 45, 900, '65', '+1 (592) 487-8477', '+1 (681) 627-7477', '\"Rem vero cupidatat c\"', 912, 'SUV', 1, '+1 (621) 256-6145', '+1 (589) 294-9258', '2024-02-26 16:46:18', '2024-02-26 16:46:18'),
(27, 46, 229, '915', '+1 (577) 709-6174', '+1 (886) 178-1608', '\"Molestiae doloremque\"', 683, 'Minivan', 1, '+1 (904) 292-8436', '+1 (194) 311-2123', '2024-02-26 16:46:48', '2024-02-26 16:46:48'),
(28, 47, 846, '333', '+1 (404) 631-1634', '+1 (721) 854-4269', '\"Sed adipisci delectu\"', 960, 'SUV', 1, '+1 (752) 318-9456', '+1 (354) 222-5664', '2024-02-26 16:47:12', '2024-02-26 16:47:12'),
(29, 48, 160, '102', '+1 (716) 492-1893', '+1 (945) 694-8587', '\"Eos aspernatur expl\"', 357, 'Minivan', 1, '+1 (733) 366-1844', '+1 (716) 418-1854', '2024-02-26 16:47:32', '2024-02-26 16:47:32'),
(30, 49, 712, '784', '+1 (933) 999-6513', '+1 (927) 487-8987', '\"Fuga In nemo molest\"', 133, 'SUV', 1, '+1 (663) 305-4666', '+1 (729) 826-1821', '2024-02-26 16:47:56', '2024-02-26 16:47:56'),
(31, 50, 101, '474', '+1 (449) 545-9264', '+1 (916) 339-1074', '\"Odit voluptate delen\"', 535, 'Sedan', 1, '+1 (709) 192-6476', '+1 (997) 762-3023', '2024-02-26 16:48:13', '2024-02-26 16:48:13'),
(32, 51, 676, '707', '+1 (628) 398-9456', '+1 (989) 173-7532', '\"Dolor veniam ipsam\"', 632, 'Hatchback', 1, '+1 (823) 647-6324', '+1 (526) 947-2247', '2024-02-26 16:48:28', '2024-02-26 16:48:28'),
(33, 52, 971, '867', '+1 (148) 582-4386', '+1 (181) 409-8431', '\"Sint mollitia esse\"', 566, 'Hatchback', 1, '+1 (203) 542-6769', '+1 (907) 409-2128', '2024-02-26 16:48:45', '2024-02-26 16:48:45'),
(34, 53, 113, '389', '+1 (444) 688-4909', '+1 (972) 338-7192', '\"Similique eos eiusmo\"', 93, 'Minivan', 1, '+1 (218) 753-3548', '+1 (464) 756-6866', '2024-02-26 16:49:01', '2024-02-26 16:49:01'),
(36, 57, 103, '813', '+1 (241) 239-7358', '+1 (402) 663-2493', '\"Amet natus nesciunt\"', 399, 'Sedan', 1, '+1 (243) 854-3863', '+1 (944) 862-5727', '2024-02-27 16:26:07', '2024-02-27 16:26:07'),
(37, 60, 461, '897', '+1 (252) 611-1466', '+1 (228) 111-4556', '\"Ipsum aliqua Quam c\"', 304, 'Sedan', 1, '+1 (558) 341-9188', '+1 (816) 904-4332', '2024-02-27 16:30:17', '2024-02-27 16:30:17'),
(38, 61, 19, '599', 'dha 7', 'dha 7', '\"Quas modi esse ut v\"', 11000, 'Minivan', 1, '2009', '2010', '2024-02-27 16:33:23', '2024-02-27 16:33:23'),
(39, 63, 25, '92392382', 'dha 7', 'dha 7', '\"xyz\"', 3000, 'SUV', 1, '2024', '2024', '2024-02-28 12:25:05', '2024-02-28 12:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(15, '2023_11_01_210601_create_user_details_table', 3),
(16, '2023_11_27_185115_create_driver_details_table', 4),
(18, '2023_11_27_224841_add_column_into_users_table', 5),
(19, '2023_11_27_222319_create_trips_table', 6),
(20, '2023_11_27_223157_create_trip_itineraries_table', 6),
(21, '2023_12_13_005100_create_trip_comments_table', 7),
(22, '2023_12_20_221903_add_column_to_trips_table', 8),
(23, '2024_01_04_010214_add_column_status_by_driver_to_trips', 9),
(24, '2024_02_14_232055_create_complains_table', 10),
(25, '2024_02_27_220343_create_ratings_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `trip_id`, `message`, `image`, `created_at`, `updated_at`) VALUES
(3, 19, 28, '\nExperience the thrill of adventure amidst the snow-capped peaks of Malam Jabba. Our tour packages offer the perfect blend of skiing, breathtaking views, and cozy accommodations in this picturesque mountain getaway.', 'http://127.0.0.1:8000/storage/images/k5nyDpYAZXo3qERvY63XvFNc9p7betqI1hnGdp7a.jpg', '2024-02-28 12:18:27', '2024-02-28 12:18:27'),
(4, 62, 29, 'Discover the tranquil charm of Kalam with our meticulously crafted tour packages. Embark on a journey filled with awe-inspiring landscapes and cultural immersion in the heart of the Swat Valley.', 'http://127.0.0.1:8000/storage/images/Bbb11hKefUH6zLDJGJusma9YWV5x545Aawo2LGLw.jpg', '2024-02-28 12:38:21', '2024-02-28 12:38:21'),
(5, 64, 31, 'Ascend to the mystical heights of Peer Chinasi with our tailored tour packages. Immerse yourself in the serene ambiance and panoramic vistas that await atop this sacred peak in Kashmir.', 'http://127.0.0.1:8000/storage/images/l2A4QcT33xaN2lXmG7JEe4nxisTB5RFCvyxz7DQb.webp', '2024-02-28 12:51:45', '2024-02-28 12:51:45'),
(6, 65, 32, 'Escape to the tranquil beauty of Murree with our meticulously planned tour packages. Explore charming hillside streets and revel in the scenic splendor of this beloved hill station nestled in the Himalayan foothills.', 'http://127.0.0.1:8000/storage/images/NDecCa2Uql73h1Ki0qCJeH2Yp4MH7Zy0vi9Uu24u.jpg', '2024-02-28 12:58:59', '2024-02-28 12:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `driver_id` varchar(255) DEFAULT NULL,
  `budget` varchar(255) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `status_by_driver` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `driver_id`, `budget`, `departure`, `status_by_driver`, `destination`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(23, '19', '61', '200000', 'Karachi', 'pending', 'Islamabad, Pakistan', '2024-07-17', '2024-07-19', '2024-02-27 19:27:11', '2024-02-27 19:27:11'),
(24, '19', '61', '100000', 'Karachi', 'accepted', 'Murree, Pakistan', '2024-03-02', '2024-03-06', '2024-02-27 19:58:31', '2024-02-27 19:59:50'),
(25, '19', '61', '200000', 'Karachi', 'pending', 'Balakot, Pakistan', '2024-04-07', '2024-04-20', '2024-02-28 11:51:36', '2024-02-28 11:51:36'),
(26, '19', '61', '55000', 'Karachi', 'pending', 'Mansehra, Pakistan', '2024-04-28', '2024-05-03', '2024-02-28 11:53:52', '2024-02-28 11:53:52'),
(28, '19', '61', '60000', 'Karachi', 'complete', 'Malam Jabba, Pakistan', '2024-02-07', '2024-02-11', '2024-02-28 11:59:36', '2024-02-28 12:16:07'),
(29, '62', '63', '40000', 'Islamabad', 'complete', 'Kalam, Pakistan', '2024-02-19', '2024-02-24', '2024-02-28 12:28:54', '2024-02-28 12:29:25'),
(30, '62', '63', '20000', 'Islamabad', 'accepted', 'Murree, Pakistan', '2024-03-07', '2024-03-09', '2024-02-28 12:42:44', '2024-02-28 12:45:46'),
(31, '64', '61', '110000', 'Karachi', 'complete', 'Muzaffarabad', '2024-02-15', '2024-02-22', '2024-02-28 12:49:28', '2024-02-28 12:49:45'),
(32, '65', '61', '50000', 'Karachi', 'complete', 'Murree, Pakistan', '2024-02-22', '2024-02-25', '2024-02-28 12:56:38', '2024-02-28 12:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `trip_comments`
--

CREATE TABLE `trip_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trip_itineraries`
--

CREATE TABLE `trip_itineraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip_itineraries`
--

INSERT INTO `trip_itineraries` (`id`, `trip_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(99, 21, 'point_of_interest', 'Sadhu ka Bagh,Lok Virsa Heritage Museum', '2024-02-26 19:29:09', '2024-02-26 19:29:09'),
(100, 21, 'hotel', 'Grand Islamabad Hotel', '2024-02-26 19:29:09', '2024-02-26 19:29:09'),
(101, 21, 'foods', 'Shah G Foods,Savour Foods', '2024-02-26 19:29:09', '2024-02-26 19:29:09'),
(103, 19, 'hotel', 'Green valley Hotel', '2024-02-26 19:52:03', '2024-02-26 19:52:03'),
(104, 19, 'foods', 'Pir Chanasi,Shah G Restaurant,Tourism Tuck shop', '2024-02-26 19:52:03', '2024-02-26 19:52:03'),
(105, 20, 'point_of_interest', 'Green Top (Kalam view point),Kalam View', '2024-02-26 19:53:16', '2024-02-26 19:53:16'),
(106, 20, 'hotel', 'Regal One Hotel Kalam', '2024-02-26 19:53:16', '2024-02-26 19:53:16'),
(107, 20, 'foods', 'Kalam River View - Desi Food Point,Aroma Restaurant Kalam', '2024-02-26 19:53:16', '2024-02-26 19:53:16'),
(108, 22, 'point_of_interest', 'Murree Point Mall,Pindi Point Chair Lift Murree', '2024-02-27 18:02:11', '2024-02-27 18:02:11'),
(109, 22, 'hotel', 'Maisonette Firhill Villas Murree', '2024-02-27 18:02:11', '2024-02-27 18:02:11'),
(110, 22, 'foods', 'Usmania Restaurant and Hotel Murree,Murree Tabaq Restaurant,Terrace Grill Restaurant', '2024-02-27 18:02:11', '2024-02-27 18:02:11'),
(112, 23, 'point_of_interest', 'Lok Virsa Heritage Museum,Pakistan Monument Museum', '2024-02-27 19:27:11', '2024-02-27 19:27:11'),
(113, 23, 'hotel', 'Grand Islamabad Hotel', '2024-02-27 19:27:11', '2024-02-27 19:27:11'),
(114, 23, 'foods', 'Savour Foods,Shah G Foods', '2024-02-27 19:27:11', '2024-02-27 19:27:11'),
(115, 23, 'driver', '61', '2024-02-27 19:27:11', '2024-02-27 19:27:11'),
(116, 24, 'point_of_interest', 'Murree Point Mall,Pindi Point Chair Lift Murree,PIA Park Murree', '2024-02-27 19:58:31', '2024-02-27 19:58:31'),
(117, 24, 'hotel', 'Mount Heaven Hotel Murree', '2024-02-27 19:58:31', '2024-02-27 19:58:31'),
(118, 24, 'foods', 'Usmania Restaurant and Hotel Murree,Food Mall', '2024-02-27 19:58:31', '2024-02-27 19:58:31'),
(119, 24, 'driver', '61', '2024-02-27 19:58:31', '2024-02-27 19:58:31'),
(120, 25, 'point_of_interest', 'Balakot Hill Top,PTDC Motel Balakot', '2024-02-28 11:51:36', '2024-02-28 11:51:36'),
(121, 25, 'hotel', 'Pine View Hotel & Dera Inn Restaurant', '2024-02-28 11:51:36', '2024-02-28 11:51:36'),
(122, 25, 'foods', 'New Lahore Broast Balakot,The pizza hut,Agosh Balakot Restaurant', '2024-02-28 11:51:36', '2024-02-28 11:51:36'),
(123, 25, 'driver', '61', '2024-02-28 11:51:36', '2024-02-28 11:51:36'),
(124, 26, 'point_of_interest', 'Lughmani Hill View Point,Global Family Park,Mansehra Point', '2024-02-28 11:53:52', '2024-02-28 11:53:52'),
(125, 26, 'foods', 'Food Land Mansehra,Food Hut', '2024-02-28 11:53:52', '2024-02-28 11:53:52'),
(126, 26, 'driver', '61', '2024-02-28 11:53:52', '2024-02-28 11:53:52'),
(131, 28, 'point_of_interest', 'Malam Jabba Ski Resort by Samsons Group,Malam jabba Tourism,Zipline Malam Jabba,Malam Jabba Chair Lifts,Pearl-Continental Hotel Malam Jabba,Fizagat,Frontier Tower Hotel.,Amluk-dara Stupa,Jarogo Waterfall Swat Valley,Swat Museum', '2024-02-28 11:59:36', '2024-02-28 11:59:36'),
(132, 28, 'hotel', 'Three star hotel', '2024-02-28 11:59:36', '2024-02-28 11:59:36'),
(133, 28, 'foods', 'FOOD ZILLA,Pearl-Continental Hotel Malam Jabba', '2024-02-28 11:59:37', '2024-02-28 11:59:37'),
(134, 28, 'driver', '61', '2024-02-28 11:59:37', '2024-02-28 11:59:37'),
(135, 29, 'point_of_interest', 'Green Top (Kalam view point),Kalam View,Ushu Forest,Kooh Lake,Dhamaka Lake,Saifullah Lake', '2024-02-28 12:28:54', '2024-02-28 12:28:54'),
(136, 29, 'hotel', 'The Nature Resort Hotel Kalam', '2024-02-28 12:28:54', '2024-02-28 12:28:54'),
(137, 29, 'foods', 'Kalam River View - Desi Food Point,Facefood,Kandol Eatery& fast food,The brands,Kalam Restaurant,Kamal resturant kalam,Aroma Restaurant Kalam,Pizza Delight swat kalam', '2024-02-28 12:28:54', '2024-02-28 12:28:54'),
(138, 29, 'driver', '63', '2024-02-28 12:28:54', '2024-02-28 12:28:54'),
(142, 30, 'driver', '63', '2024-02-28 12:42:44', '2024-02-28 12:42:44'),
(143, 30, 'point_of_interest', 'Pindi Point Chair Lift Murree,Murree Point Mall', '2024-02-28 12:43:08', '2024-02-28 12:43:08'),
(144, 30, 'hotel', 'Grand Taj Hotel', '2024-02-28 12:43:08', '2024-02-28 12:43:08'),
(145, 30, 'foods', 'KFC Murree,Fri Chiks Murree', '2024-02-28 12:43:08', '2024-02-28 12:43:08'),
(146, 31, 'point_of_interest', 'Red Fort Muzaffarabad,Valleys of kashmir,Domail Point (Neelum Jhelum Concurrence),Children\'s Park,Jalalabad Garden,Muzaffarabad,Pir Chinasi,Al Najaf Restaurant Muzaffarabad,Pearl Continental Muzaffarabad,Neelum View Restaurant,AJ&K Tourism Department', '2024-02-28 12:49:28', '2024-02-28 12:49:28'),
(147, 31, 'hotel', 'Hotel Kashmir Lodge Muzaffarabad', '2024-02-28 12:49:28', '2024-02-28 12:49:28'),
(148, 31, 'foods', '3 Brothers Fast Food,Al Najaf Restaurant Muzaffarabad,Muzaffarabad Savour Foods', '2024-02-28 12:49:28', '2024-02-28 12:49:28'),
(149, 31, 'driver', '61', '2024-02-28 12:49:28', '2024-02-28 12:49:28'),
(150, 32, 'point_of_interest', 'Pindi Point Chair Lift Murree,Murree Point Mall,Sangrela Natural Water Park', '2024-02-28 12:56:38', '2024-02-28 12:56:38'),
(151, 32, 'hotel', 'Grand Taj Hotel', '2024-02-28 12:56:38', '2024-02-28 12:56:38'),
(152, 32, 'foods', 'KFC Murree,Fri Chiks Murree', '2024-02-28 12:56:38', '2024-02-28 12:56:38'),
(153, 32, 'driver', '61', '2024-02-28 12:56:38', '2024-02-28 12:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'Tourist',
  `provider_id` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `state`, `city`, `country`, `phone`, `user_type`, `provider_id`, `provider`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@example.com', NULL, '$2y$12$TWP/8qdcb3HuLI.HQhsN1ugwaIe.IgogGBKQruWMn0lSy17NXcU5i', 'http://127.0.0.1:8000/storage/images/uzTXYMVksaTlni81k4sAMWTpxPCwuDbZJ7fDkYAp.jpg', 'Sindh', 'Karachi', 'Pakistan', '0423541254323', 'Admin', NULL, NULL, NULL, 0, '2023-11-01 16:53:28', '2024-02-27 16:12:47'),
(5, 'Abid', 'abid@test.com', NULL, '$2y$12$KySaG5xzmxeaOFfbAyvEvuvhR6uHEmi7cWFsqEe83ba26xckoptuK', NULL, NULL, 'Islamabad', 'Pakistan', '0423541254323', 'Driver', NULL, NULL, NULL, 0, '2023-11-27 14:30:42', '2023-11-27 17:41:10'),
(10, 'Hassan Asif', 'hassassif@gmail.com', NULL, '$2y$12$KySaG5xzmxeaOFfbAyvEvuvhR6uHEmi7cWFsqEe83ba26xckoptuK', 'profile_image/NKF8w0X2iJ81aMAutnUKooNGSvnjkxA6PtzJi38t.png', 'Sindh', 'Karachi', 'Pakistan', '0423541254323', 'Driver', NULL, NULL, NULL, 0, '2023-11-27 18:38:38', '2023-11-28 14:53:08'),
(14, 'jannat tauqir', 'jannat.12783@iqra.edu.pk', NULL, '$2y$12$NQXpJz9pRSCDzDZWv9Ysj.m.rRzkolZpDXFXod5vs/gF71j2kCGCe', NULL, NULL, NULL, 'Pakistan', NULL, 'Tourist', NULL, NULL, NULL, 0, '2023-12-13 01:40:39', '2023-12-13 01:40:39'),
(15, 'Hussain Alam', 'hussain@gmail.com', NULL, '$2y$12$rlc/ddm4V2IMV5APymHI/.M0.Y4ul8mKqLevz7Mae4gv1jL3fMGZm', NULL, 'KPK', NULL, 'Pakistan', '32723', 'Driver', NULL, NULL, NULL, 0, '2023-12-13 01:49:01', '2024-02-27 16:45:25'),
(16, 'asad khan', 'asad123@gmail.com', NULL, '$2y$12$aUfTaXJPBzv6aUN0Mj5XfOMnqXHs.jwAIqEGEQFIiFtQdhX4CnGKO', NULL, 'KPK', 'Swat', 'Pakistan', NULL, 'Driver', NULL, NULL, NULL, 0, '2023-12-13 02:03:08', '2023-12-13 02:03:08'),
(17, 'haris khan', 'haris@test.com', NULL, '$2y$12$R1kw2INK0bIlVDZl149RyOSbtiGsmNMuTjJgZWGCqYBxkkcChqHIe', NULL, NULL, NULL, 'Pakistan', NULL, 'Tourist', NULL, NULL, NULL, 0, '2024-01-22 10:00:33', '2024-01-22 10:00:33'),
(18, 'Adil', 'adil@test.com', NULL, '$2y$12$czrBn/7b9.G.kvH3dVkG4.7om0ifaePz1sQ0dqkNYwzEvxEJabkZC', NULL, NULL, NULL, 'Pakistan', NULL, 'Driver', NULL, NULL, NULL, 0, '2024-01-22 10:02:22', '2024-01-22 10:02:22'),
(19, 'Umer', 'umer.farooq@themetroweb.com', NULL, '$2y$12$qgGQbNsj7h8eslwlfDlTOOCowhbscDcPcX5CZty9UhccGIvYa7h4m', 'http://127.0.0.1:8000/storage/images/LL82cHsOs61WDhE7vLzOF4ZuBMnNXKYhftZsEIUL.png', 'Sindh', 'Karachi', 'Pakistan', '723782378', 'Tourist', NULL, NULL, NULL, 0, '2024-02-13 13:08:59', '2024-02-27 18:04:16'),
(25, 'Sylvester Dale', 'wahakojy@mailinator.com', NULL, '$2y$12$i0iDaXxpMnF21M.Xp18UvOzVzk3NIhbDXuvUmJOPDnaM8m8EyXu9m', NULL, '+1 (695) 599-9948', 'Shahdadkot', 'Pakistan', '446', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 15:34:40', '2024-02-26 15:34:40'),
(26, 'Neil Barnes', 'kezuqazy@mailinator.com', NULL, '$2y$12$74NblNMPOgUh6uE8Llvzqezx1AbROZ45grtPpkEZbDW49n.FPDYUO', NULL, '+1 (465) 209-7395', 'Tangi', 'Pakistan', '143', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 15:35:15', '2024-02-26 15:35:15'),
(27, 'Iris Trujillo', 'qune@mailinator.com', NULL, '$2y$12$aSFA21rWiErNWrTBqUxVWuArR6RDm/KQegKC8ckwpLSietqLQArgq', NULL, 'Sindh', 'Rohri', 'Pakistan', '4587887', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:27:50', '2024-02-26 16:27:50'),
(28, 'Karyn Crawford', 'kopipuhu@mailinator.com', NULL, '$2y$12$BCEmtqC.K9lE6Ws87yELeOXktT17MTL5NPhNDeqbc8D0aMX2be6ja', NULL, 'Sindh', 'Bahawalpur', 'Pakistan', '782378', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:30:20', '2024-02-26 16:30:20'),
(29, 'Erich Baldwin', 'xycumobot@mailinator.com', NULL, '$2y$12$1ch4ByBn.z.efVQ/R/7qjemJqEX97MSRcz/21qHjiqB4QU2akbIpO', NULL, 'Sindh', 'Gujranwala', 'Pakistan', '44523', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:31:59', '2024-02-26 16:31:59'),
(30, 'Rinah Castaneda', 'vibizag@mailinator.com', NULL, '$2y$12$/9aphhed2fIEz/ybQ.1p4eBuf8kT.EfOS9RFfRS1BnHBqOKkhvr5a', NULL, '+1 (818) 885-4612', 'Lahore', 'Pakistan', '661', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:33:32', '2024-02-26 16:33:32'),
(31, 'Zia Blackwell', 'watiresu@mailinator.com', NULL, '$2y$12$qaPCBZqm7vMulr/gFoTp3eLKiW1dJvhA04MG7.N3TKGYPiD46q7sm', NULL, 'Sindh', 'Mianwali', 'Pakistan', '279', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:35:37', '2024-02-26 16:35:37'),
(32, 'Elvis Hays', 'qimegaleg@mailinator.com', NULL, '$2y$12$QaDHIWJboDQL5WaziI89zeJyYSJHiGOurJsSdCbhJrNaTye9IDJky', NULL, 'Sindh', 'Murree', 'Pakistan', '466', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:37:23', '2024-02-26 16:37:23'),
(33, 'Orson Christensen', 'conehibum@mailinator.com', NULL, '$2y$12$ohXYFsCELx3n/3PE9cx3oerWj1Z0onudwtGJczdDt4XtpTnDxHzY.', NULL, 'punjab', 'Multan', 'Pakistan', '939', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:38:52', '2024-02-26 16:38:52'),
(34, 'Cody Barrera', 'gocizo@mailinator.com', NULL, '$2y$12$8NASkb.8YHJGKN4a0be8Uu9aFCtk/q1bjrGOmAiR6jQTL1G813VPm', NULL, 'Sindh', 'Murree', 'Pakistan', '7', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:40:35', '2024-02-26 16:40:35'),
(35, 'Colin Hogan', 'nynomyfune@mailinator.com', NULL, '$2y$12$X3fsHBk7KylrsJsdOxZdQuNiB2B9HQpRug6DMPUzuGqgVASlh9vKu', NULL, '+1 (164) 216-1273', 'Murree', 'Pakistan', '454', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:41:05', '2024-02-26 16:41:05'),
(36, 'Rigel Goodman', 'kesem@mailinator.com', NULL, '$2y$12$cziBJfgZjuJG7Ka4RXPGaOhzRM9n311CH/ZnSjhQ5/EsbXqGQdF5K', NULL, '+1 (407) 686-1947', 'Sargodha', 'Pakistan', '866', 'Tourist', NULL, NULL, NULL, 0, '2024-02-26 16:41:21', '2024-02-26 16:41:21'),
(37, 'Pandora Nichols', 'ditarotil@mailinator.com', NULL, '$2y$12$XW6hIzpuavXmhqLF5O9h/.dHOtbNJi19206Ft9DDHTHJJBaTqzIsu', NULL, '+1 (621) 705-5255', 'Sialkot', 'Pakistan', '392', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:42:40', '2024-02-26 16:42:40'),
(38, 'Gretchen Richmond', 'pibu@mailinator.com', NULL, '$2y$12$ghvzNIMON8NJrrcaTa8Q6eyN9e7OQ4iQqHbzvxDscNao.XhxY1p.i', NULL, '+1 (748) 445-7996', 'Wazirabad', 'Pakistan', '801', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:43:01', '2024-02-26 16:43:01'),
(39, 'Kim Rowland', 'zolyzeziza@mailinator.com', NULL, '$2y$12$fGmG7pxflOzQj7eb3ga8mevT/psON1d2KcjAiyVTltNoYXzIdF.nq', NULL, '+1 (684) 282-3249', 'Gujranwala', 'Pakistan', '216', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:43:20', '2024-02-26 16:43:20'),
(40, 'Lucian Green', 'jedymowuk@mailinator.com', NULL, '$2y$12$Js45lybET1L1Q5npIYimC.ce2N90yexCXmFrTJZ/2gC2kbtMHQ8ry', NULL, '+1 (231) 357-2605', 'Hyderabad', 'Pakistan', '879', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:43:38', '2024-02-26 16:43:38'),
(41, 'Jackson Rivera', 'saqame@mailinator.com', NULL, '$2y$12$vP8aM/C9YGX.p8D5p/BHtudWapQBaLf1Bl.Gz/FtL/Ilmtg8buHlm', NULL, '+1 (291) 883-5637', 'Karachi', 'Pakistan', '225', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:44:02', '2024-02-26 16:44:02'),
(42, 'Elaine Fuller', 'fajo@mailinator.com', NULL, '$2y$12$hMpIZfhevWTaWAO67I79W.hAPx9VgvydzIX/mHXCLsN5qy6CDlfBO', NULL, '+1 (437) 811-1793', 'Mirpur Khas', 'Pakistan', '800', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:44:22', '2024-02-26 16:44:22'),
(43, 'Keane Holman', 'vewukajifa@mailinator.com', NULL, '$2y$12$TvOq65h9sn3.Mf8bjFU6auU8RS73Zgyv3PkCQOTDso8yhkiblFeAm', NULL, '+1 (281) 312-7338', 'Mirpur Khas', 'Pakistan', '895', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:45:09', '2024-02-26 16:45:09'),
(44, 'Audrey Carey', 'rapojede@mailinator.com', NULL, '$2y$12$yv7lZh.TePt3o9jB4FRPR.zv.1ZX2H/Nf38.2i0UC5Ki3CzZGUpiq', NULL, '+1 (251) 732-8077', 'Nawabshah', 'Pakistan', '341', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:45:40', '2024-02-26 16:45:40'),
(45, 'Marcia Rice', 'ruwit@mailinator.com', NULL, '$2y$12$sQp5MaeoV36WXBz8hOSUuebjyLXoyGyamsEXQVtsXb/XZY.y9qWY6', NULL, '+1 (821) 746-5695', 'Rohri', 'Pakistan', '300', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:46:18', '2024-02-26 16:46:18'),
(46, 'Alfonso Mcmillan', 'wumaleda@mailinator.com', NULL, '$2y$12$3.SC/k6Ptl2Nl.jeiV.uSe9rx..TgKVzaCzDS2dJe4kDL8YdlKe3e', NULL, '+1 (388) 186-9878', 'Sukkur', 'Pakistan', '788', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:46:48', '2024-02-26 16:46:48'),
(47, 'Denise Gaines', 'cofobud@mailinator.com', NULL, '$2y$12$fZM0l4cLq1knJuVTCIBvOeM50mMOUb8lCS9URk4DLaXxCjzahvVtq', NULL, '+1 (571) 212-1582', 'Abbottabad', 'Pakistan', '899', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:47:12', '2024-02-26 16:47:12'),
(48, 'Keaton Haney', 'zivajuc@mailinator.com', NULL, '$2y$12$Cz93bdU/C6JEaHhbj1us8u1v4Uy2mGYozDNnPl5Yac6Us/O3p3SMi', NULL, '+1 (817) 861-4529', 'Dera Ismail Khan', 'Pakistan', '522', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:47:32', '2024-02-26 16:47:32'),
(49, 'Tate Mills', 'hodecek@mailinator.com', NULL, '$2y$12$3pMlF1ox1JDNVcE9HoZLd.ZHxzsBIOEYUVfd.8ZSlevdGfaAcaRxq', NULL, '+1 (434) 271-5229', 'Mansehra', 'Pakistan', '69', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:47:56', '2024-02-26 16:47:56'),
(50, 'Seth Gilliam', 'cajujaceb@mailinator.com', NULL, '$2y$12$UPavpW78YzXLYmbVb1efM.qoPORhAC.xOAi9rtTcQM2xPYpjAqXR6', NULL, '+1 (209) 771-9181', 'Peshawar', 'Pakistan', '994', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:48:13', '2024-02-26 16:48:13'),
(51, 'Knox Hudson', 'lenaryxeni@mailinator.com', NULL, '$2y$12$s9NlsDMBQzFAtXta41vxHuhoyZdvVsdOK8ue3EXnVBG57CsAWJAP2', NULL, '+1 (328) 873-1387', 'Gwadar', 'Pakistan', '580', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:48:28', '2024-02-26 16:48:28'),
(52, 'Preston Silva', 'lozecequ@mailinator.com', NULL, '$2y$12$Pj3KOMNqbUIz/l7EyeD9E.5JPC7SCol6Fpwosa28HTuQNQE6KkEL.', NULL, '+1 (666) 257-9849', 'Quetta', 'Pakistan', '858', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:48:45', '2024-02-27 12:52:13'),
(53, 'Allegra Andrews', 'hekus@mailinator.com', NULL, '$2y$12$PcDi9J0XJq1TiiR2PxgcqOArqZY7/0wSO50NIaF0nizu01Esrxk42', NULL, '+1 (763) 928-7612', 'Ziarat', 'Pakistan', '548', 'Driver', NULL, NULL, NULL, 0, '2024-02-26 16:49:01', '2024-02-26 16:49:01'),
(55, 'Grady Talley', 'dujyziju@mailinator.com', NULL, '$2y$12$66XlNSdydBb7gS/eYCzNs.tyhotnjIUKJKXIz4rG.8Bn2eoPFHGni', NULL, '+1 (256) 456-5176', 'Bahawalpur', 'Pakistan', '221', 'Tourist', NULL, NULL, NULL, 0, '2024-02-27 16:24:19', '2024-02-27 16:24:19'),
(57, 'Jelani Pittman', 'tyvymyw@mailinator.com', NULL, '$2y$12$X6wUQpQ.im3SMrPdrl1K.OVvZOLn.6Fks8PkT/myzXDrDR4tEluy6', NULL, '+1 (216) 112-8048', 'Rohri', 'Pakistan', '570', 'Driver', NULL, NULL, NULL, 0, '2024-02-27 16:26:07', '2024-02-27 16:26:07'),
(58, 'Leandra Mills', 'pyjax@mailinator.com', NULL, '$2y$12$n95DzT/9LWhSAVB/QLBrP.PFHG.cAwetXa4Rsq1J13B.cUJ4PIxeW', NULL, '+1 (666) 946-1494', 'Sargodha', 'Pakistan', '40', 'Tourist', NULL, NULL, NULL, 0, '2024-02-27 16:27:15', '2024-02-27 16:27:15'),
(59, 'Tatum Chandler', 'vifigosezy@mailinator.com', NULL, '$2y$12$a.N3W1IRolkeajPrg9jum.ADn2JAaDvLUOo1iAdyGMzU2mY6jWx26', 'http://127.0.0.1:8000/storage/images/2XfNu3tvYKD4XPFIBVXG1rRgkx4PPjBFxxuYkGBT.png', '+1 (689) 545-7416', 'Ziarat', 'Pakistan', '350', 'Driver', NULL, NULL, NULL, 0, '2024-02-27 16:29:06', '2024-02-27 16:29:07'),
(60, 'Kelsie Randolph', 'lywizubymi@mailinator.com', NULL, '$2y$12$gMoZzXX6pXh.bAUJygqgpegrR5sYOZnUwn0Ru/3ft8V7vSs0kgvAS', 'http://127.0.0.1:8000/storage/images/ZpVT2HWQZjrA6jEjKT0KY0wUF8pn4ajbsn19Qmym.png', '+1 (967) 237-8843', 'Abbottabad', 'Pakistan', '332', 'Driver', NULL, NULL, NULL, 0, '2024-02-27 16:30:17', '2024-02-27 20:01:13'),
(61, 'Umer Farooq', 'umer2109d01@aptechgdn.net', NULL, '$2y$12$qgGQbNsj7h8eslwlfDlTOOCowhbscDcPcX5CZty9UhccGIvYa7h4m', 'https://lh3.googleusercontent.com/a/ACg8ocJj7UciL1_JRFORdnh0BDOGK_-83GQ3_zbV_tA2iJiE=s96-c', 'Sindh', 'Karachi', 'Pakistan', '190', 'Driver', NULL, NULL, NULL, 0, '2024-02-27 16:33:23', '2024-02-27 16:42:09'),
(62, 'Zubair', 'zubair@gmail.com', NULL, '$2y$12$ulJKxF5327hkjnz5Syfq/.7GIAKaLujIL5fR.j0zbU0uGSnHVatum', NULL, 'Sindh', 'Karachi', 'Pakistan', '773278923923', 'Tourist', NULL, NULL, NULL, 0, '2024-02-28 12:22:56', '2024-02-28 12:22:56'),
(63, 'Lala Driver', 'lala@gmail.com', NULL, '$2y$12$7ZzWJompicu/lSPatC5Ne.CHpEsjsanwcKU9OgvZUiJkzIMbKAaI6', NULL, 'Punjab', 'Islamabad', 'Pakistan', '2344334', 'Driver', NULL, NULL, NULL, 0, '2024-02-28 12:25:05', '2024-02-28 12:25:05'),
(64, 'Haris', 'haris@gmail.com', NULL, '$2y$12$MXje2DmFWpMj1SB1KPCvw.Zht0N69exgVtMDQ1XpCMfXNN5jfDnE2', NULL, 'Sindh', 'Karachi', 'Pakistan', '72372372', 'Tourist', NULL, NULL, NULL, 0, '2024-02-28 12:46:51', '2024-02-28 12:46:51'),
(65, 'Fatima Qureshi', 'fatima@gmail.com', NULL, '$2y$12$CVjEcmCCr.VWmmxqkKOOVuPzdN8VOEMqTcAA/iJnkLD/YsW5ujAai', NULL, 'Sindh', 'Islamabad', 'Pakistan', '34343432', 'Tourist', NULL, NULL, NULL, 0, '2024-02-28 12:54:30', '2024-02-28 12:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `place_type` varchar(255) DEFAULT NULL,
  `food_type` varchar(255) DEFAULT NULL,
  `accomodation_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `place_type`, `food_type`, `accomodation_type`, `created_at`, `updated_at`) VALUES
(3, 17, 'Religious', 'Desi Food', 'Average Rated', '2024-01-22 10:00:33', '2024-01-22 10:00:33'),
(4, 19, 'Nature', 'Desi Food', 'High Rated', '2024-02-13 13:08:59', '2024-02-13 13:08:59'),
(6, 36, 'Nature', 'Italian', 'High Rated', '2024-02-26 16:41:21', '2024-02-26 16:41:21'),
(7, 55, 'Religious', 'Desi Food', 'Average Rated', '2024-02-27 16:24:19', '2024-02-27 16:24:19'),
(8, 62, 'Nature', 'Desi Food', 'High Rated', '2024-02-28 12:22:56', '2024-02-28 12:22:56'),
(9, 64, 'Nature', 'Desi Food', 'High Rated', '2024-02-28 12:46:51', '2024-02-28 12:46:51'),
(10, 65, 'Nature', 'Desi Food', 'High Rated', '2024-02-28 12:54:30', '2024-02-28 12:54:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complains_user_id_foreign` (`user_id`),
  ADD KEY `complains_driver_id_foreign` (`driver_id`),
  ADD KEY `complains_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `driver_details`
--
ALTER TABLE `driver_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_comments`
--
ALTER TABLE `trip_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trip_comments_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `trip_itineraries`
--
ALTER TABLE `trip_itineraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `trip_comments`
--
ALTER TABLE `trip_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trip_itineraries`
--
ALTER TABLE `trip_itineraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complains`
--
ALTER TABLE `complains`
  ADD CONSTRAINT `complains_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complains_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complains_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `driver_details`
--
ALTER TABLE `driver_details`
  ADD CONSTRAINT `driver_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trip_comments`
--
ALTER TABLE `trip_comments`
  ADD CONSTRAINT `trip_comments_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
