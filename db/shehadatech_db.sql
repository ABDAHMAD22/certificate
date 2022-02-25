-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2022 at 03:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shehadatech_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_events`
--

CREATE TABLE `action_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionable_id` bigint(20) UNSIGNED NOT NULL,
  `target_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fields` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'running',
  `exception` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `original` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$G7FPyUt4AvgzHrKbBexTde1W1uk.FcWnJ0lqsLJJljt5yUE8p5qmy', 'OOdyKpIMov', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `admins_password_resets`
--

CREATE TABLE `admins_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer_about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attached_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_type` int(10) UNSIGNED DEFAULT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hours_no` int(11) DEFAULT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `target_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template_id` bigint(20) UNSIGNED DEFAULT NULL,
  `font_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `editor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads_contents`
--

CREATE TABLE `ads_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads_features`
--

CREATE TABLE `ads_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads_requests`
--

CREATE TABLE `ads_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads_times`
--

CREATE TABLE `ads_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads_types`
--

CREATE TABLE `ads_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads_types`
--

INSERT INTO `ads_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'شهادة معتمدة', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'اكسسوارات', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'سيارات', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `account_no`, `created_at`, `updated_at`) VALUES
(1, 'حساب راجحي', '100200', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'حساب أهلي', '200300', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `bank_transfers`
--

CREATE TABLE `bank_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_transfers`
--

INSERT INTO `bank_transfers` (`id`, `bank_id`, `user_id`, `account_holder`, `invoice`, `editor_id`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Ahmad Mahmoud', 'invoice-img1.jpeg', NULL, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_id` bigint(20) UNSIGNED DEFAULT NULL,
  `font_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `name`, `logo`, `address`, `created_at`, `updated_at`) VALUES
(1, 'مركز مسار للتدريب', 'masar-logo.png', 'الرياض - السعودبة', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'مركز القياس الوطني', 'qiyas-logo.png', 'الرياض - السعودبة', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'هيئة تقويم التعليم والتدريب', 'education-logo.png', 'الرياض - السعودبة', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(4, 'مركز اعتماد للتدريب', 'ncaaa-logo.png', 'الرياض - السعودبة', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(5, 'استثمار المرافق التعليمية', 'facilities-logo.png', 'الرياض - السعودبة', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `certificate_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT 0,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accreditation_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_type` int(10) UNSIGNED DEFAULT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days_no` int(11) DEFAULT NULL,
  `hours_no` int(11) DEFAULT NULL,
  `trainer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `editor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_requests`
--

CREATE TABLE `certificate_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `editor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_students`
--

CREATE TABLE `certificate_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_type` int(10) UNSIGNED DEFAULT NULL,
  `trainer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days_no` int(11) DEFAULT NULL,
  `hours_no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_types`
--

CREATE TABLE `certificate_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificate_types`
--

INSERT INTO `certificate_types` (`id`, `name`, `word`, `created_at`, `updated_at`) VALUES
(1, 'شهادة حضور', 'لحضور', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'شهادة اجتياز', 'لاجتياز', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'الرياض', 194, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'جدة', 194, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'غزة', 171, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'أفغانستان', NULL, NULL),
(2, 'ألبانيا', NULL, NULL),
(3, 'جزر آلاند', NULL, NULL),
(4, 'الجزائر', NULL, NULL),
(5, 'ساموا-الأمريكي', NULL, NULL),
(6, 'أندورا', NULL, NULL),
(7, 'أنغولا', NULL, NULL),
(8, 'أنغويلا', NULL, NULL),
(9, 'أنتاركتيكا', NULL, NULL),
(10, 'أنتيغوا وبربودا', NULL, NULL),
(11, 'الأرجنتين', NULL, NULL),
(12, 'أرمينيا', NULL, NULL),
(13, 'أروبه', NULL, NULL),
(14, 'أستراليا', NULL, NULL),
(15, 'النمسا', NULL, NULL),
(16, 'أذربيجان', NULL, NULL),
(17, 'الباهاماس', NULL, NULL),
(18, 'البحرين', NULL, NULL),
(19, 'بنغلاديش', NULL, NULL),
(20, 'بربادوس', NULL, NULL),
(21, 'روسيا البيضاء', NULL, NULL),
(22, 'بلجيكا', NULL, NULL),
(23, 'بيليز', NULL, NULL),
(24, 'بنين', NULL, NULL),
(25, 'سان بارتيلمي', NULL, NULL),
(26, 'جزر برمودا', NULL, NULL),
(27, 'بوتان', NULL, NULL),
(28, 'بوليفيا', NULL, NULL),
(29, 'البوسنة و الهرسك', NULL, NULL),
(30, 'بوتسوانا', NULL, NULL),
(31, 'جزيرة بوفيه', NULL, NULL),
(32, 'البرازيل', NULL, NULL),
(33, 'إقليم المحيط الهندي البريطاني', NULL, NULL),
(34, 'بروني', NULL, NULL),
(35, 'بلغاريا', NULL, NULL),
(36, 'بوركينا فاسو', NULL, NULL),
(37, 'بوروندي', NULL, NULL),
(38, 'كمبوديا', NULL, NULL),
(39, 'كاميرون', NULL, NULL),
(40, 'كندا', NULL, NULL),
(41, 'الرأس الأخضر', NULL, NULL),
(42, 'جزر كايمان', NULL, NULL),
(43, 'جمهورية أفريقيا الوسطى', NULL, NULL),
(44, 'تشاد', NULL, NULL),
(45, 'شيلي', NULL, NULL),
(46, 'الصين', NULL, NULL),
(47, 'جزيرة عيد الميلاد', NULL, NULL),
(48, 'جزر كوكوس', NULL, NULL),
(49, 'كولومبيا', NULL, NULL),
(50, 'جزر القمر', NULL, NULL),
(51, 'الكونغو', NULL, NULL),
(52, 'جزر كوك', NULL, NULL),
(53, 'كوستاريكا', NULL, NULL),
(54, 'كرواتيا', NULL, NULL),
(55, 'كوبا', NULL, NULL),
(56, 'قبرص', NULL, NULL),
(57, 'كوراساو', NULL, NULL),
(58, 'الجمهورية التشيكية', NULL, NULL),
(59, 'الدانمارك', NULL, NULL),
(60, 'جيبوتي', NULL, NULL),
(61, 'دومينيكا', NULL, NULL),
(62, 'الجمهورية الدومينيكية', NULL, NULL),
(63, 'إكوادور', NULL, NULL),
(64, 'مصر', NULL, NULL),
(65, 'إلسلفادور', NULL, NULL),
(66, 'غينيا الاستوائي', NULL, NULL),
(67, 'إريتريا', NULL, NULL),
(68, 'استونيا', NULL, NULL),
(69, 'أثيوبيا', NULL, NULL),
(70, 'جزر فوكلاند', NULL, NULL),
(71, 'جزر فارو', NULL, NULL),
(72, 'فيجي', NULL, NULL),
(73, 'فنلندا', NULL, NULL),
(74, 'فرنسا', NULL, NULL),
(75, 'غويانا الفرنسية', NULL, NULL),
(76, 'بولينيزيا الفرنسية', NULL, NULL),
(77, 'أراض فرنسية جنوبية وأنتارتيكية', NULL, NULL),
(78, 'الغابون', NULL, NULL),
(79, 'غامبيا', NULL, NULL),
(80, 'جيورجيا', NULL, NULL),
(81, 'ألمانيا', NULL, NULL),
(82, 'غانا', NULL, NULL),
(83, 'جبل طارق', NULL, NULL),
(84, 'غيرنزي', NULL, NULL),
(85, 'اليونان', NULL, NULL),
(86, 'جرينلاند', NULL, NULL),
(87, 'غرينادا', NULL, NULL),
(88, 'جزر جوادلوب', NULL, NULL),
(89, 'جوام', NULL, NULL),
(90, 'غواتيمال', NULL, NULL),
(91, 'غينيا', NULL, NULL),
(92, 'غينيا-بيساو', NULL, NULL),
(93, 'غيانا', NULL, NULL),
(94, 'هايتي', NULL, NULL),
(95, 'جزيرة هيرد وجزر ماكدونالد', NULL, NULL),
(96, 'هندوراس', NULL, NULL),
(97, 'هونغ كونغ', NULL, NULL),
(98, 'المجر', NULL, NULL),
(99, 'آيسلندا', NULL, NULL),
(100, 'الهند', NULL, NULL),
(101, 'جزيرة مان', NULL, NULL),
(102, 'أندونيسيا', NULL, NULL),
(103, 'إيران', NULL, NULL),
(104, 'العراق', NULL, NULL),
(105, 'إيرلندا', NULL, NULL),
(106, 'إسرائيل', NULL, NULL),
(107, 'إيطاليا', NULL, NULL),
(108, 'ساحل العاج', NULL, NULL),
(109, 'جيرزي', NULL, NULL),
(110, 'جمايكا', NULL, NULL),
(111, 'اليابان', NULL, NULL),
(112, 'الأردن', NULL, NULL),
(113, 'كازاخستان', NULL, NULL),
(114, 'كينيا', NULL, NULL),
(115, 'كيريباتي', NULL, NULL),
(116, 'كوريا الشمالية', NULL, NULL),
(117, 'كوريا الجنوبية', NULL, NULL),
(118, 'كوسوفو', NULL, NULL),
(119, 'الكويت', NULL, NULL),
(120, 'قيرغيزستان', NULL, NULL),
(121, 'لاوس', NULL, NULL),
(122, 'لاتفيا', NULL, NULL),
(123, 'لبنان', NULL, NULL),
(124, 'ليسوتو', NULL, NULL),
(125, 'ليبيريا', NULL, NULL),
(126, 'ليبيا', NULL, NULL),
(127, 'ليختنشتين', NULL, NULL),
(128, 'لتوانيا', NULL, NULL),
(129, 'لوكسمبورغ', NULL, NULL),
(130, 'سريلانكا', NULL, NULL),
(131, 'ماكاو', NULL, NULL),
(132, 'مقدونيا', NULL, NULL),
(133, 'مدغشقر', NULL, NULL),
(134, 'مالاوي', NULL, NULL),
(135, 'ماليزيا', NULL, NULL),
(136, 'المالديف', NULL, NULL),
(137, 'مالي', NULL, NULL),
(138, 'مالطا', NULL, NULL),
(139, 'جزر مارشال', NULL, NULL),
(140, 'مارتينيك', NULL, NULL),
(141, 'موريتانيا', NULL, NULL),
(142, 'موريشيوس', NULL, NULL),
(143, 'مايوت', NULL, NULL),
(144, 'المكسيك', NULL, NULL),
(145, 'مايكرونيزيا', NULL, NULL),
(146, 'مولدافيا', NULL, NULL),
(147, 'موناكو', NULL, NULL),
(148, 'منغوليا', NULL, NULL),
(149, 'الجبل الأسود', NULL, NULL),
(150, 'مونتسيرات', NULL, NULL),
(151, 'المغرب', NULL, NULL),
(152, 'موزمبيق', NULL, NULL),
(153, 'ميانمار', NULL, NULL),
(154, 'ناميبيا', NULL, NULL),
(155, 'نورو', NULL, NULL),
(156, 'نيبال', NULL, NULL),
(157, 'هولندا', NULL, NULL),
(158, 'جزر الأنتيل الهولندي', NULL, NULL),
(159, 'كاليدونيا الجديدة', NULL, NULL),
(160, 'نيوزيلندا', NULL, NULL),
(161, 'نيكاراجوا', NULL, NULL),
(162, 'النيجر', NULL, NULL),
(163, 'نيجيريا', NULL, NULL),
(164, 'ني', NULL, NULL),
(165, 'جزيرة نورفولك', NULL, NULL),
(166, 'جزر ماريانا الشمالية', NULL, NULL),
(167, 'النرويج', NULL, NULL),
(168, 'عمان', NULL, NULL),
(169, 'باكستان', NULL, NULL),
(170, 'بالاو', NULL, NULL),
(171, 'فلسطين', NULL, NULL),
(172, 'بنما', NULL, NULL),
(173, 'بابوا غينيا الجديدة', NULL, NULL),
(174, 'باراغواي', NULL, NULL),
(175, 'بيرو', NULL, NULL),
(176, 'الفليبين', NULL, NULL),
(177, 'بيتكيرن', NULL, NULL),
(178, 'بولونيا', NULL, NULL),
(179, 'البرتغال', NULL, NULL),
(180, 'بورتو ريكو', NULL, NULL),
(181, 'قطر', NULL, NULL),
(182, 'ريونيون', NULL, NULL),
(183, 'رومانيا', NULL, NULL),
(184, 'روسيا', NULL, NULL),
(185, 'رواندا', NULL, NULL),
(186, 'سانت كيتس ونيفس,', NULL, NULL),
(187, 'ساينت مارتن فرنسي', NULL, NULL),
(188, 'ساينت مارتن هولندي', NULL, NULL),
(189, 'سان بيير وميكلون', NULL, NULL),
(190, 'سانت فنسنت وجزر غرينادين', NULL, NULL),
(191, 'ساموا', NULL, NULL),
(192, 'سان مارينو', NULL, NULL),
(193, 'ساو تومي وبرينسيبي', NULL, NULL),
(194, 'المملكة العربية السعودية', NULL, NULL),
(195, 'السنغال', NULL, NULL),
(196, 'صربيا', NULL, NULL),
(197, 'سيشيل', NULL, NULL),
(198, 'سيراليون', NULL, NULL),
(199, 'سنغافورة', NULL, NULL),
(200, 'سلوفاكيا', NULL, NULL),
(201, 'سلوفينيا', NULL, NULL),
(202, 'جزر سليمان', NULL, NULL),
(203, 'الصومال', NULL, NULL),
(204, 'جنوب أفريقيا', NULL, NULL),
(205, 'المنطقة القطبية الجنوبية', NULL, NULL),
(206, 'السودان الجنوبي', NULL, NULL),
(207, 'إسبانيا', NULL, NULL),
(208, 'سانت هيلانة', NULL, NULL),
(209, 'السودان', NULL, NULL),
(210, 'سورينام', NULL, NULL),
(211, 'سفالبارد ويان ماين', NULL, NULL),
(212, 'سوازيلند', NULL, NULL),
(213, 'السويد', NULL, NULL),
(214, 'سويسرا', NULL, NULL),
(215, 'سوريا', NULL, NULL),
(216, 'تايوان', NULL, NULL),
(217, 'طاجيكستان', NULL, NULL),
(218, 'تنزانيا', NULL, NULL),
(219, 'تايلندا', NULL, NULL),
(220, 'تيمور الشرقية', NULL, NULL),
(221, 'توغو', NULL, NULL),
(222, 'توكيلاو', NULL, NULL),
(223, 'تونغا', NULL, NULL),
(224, 'ترينيداد وتوباغو', NULL, NULL),
(225, 'تونس', NULL, NULL),
(226, 'تركيا', NULL, NULL),
(227, 'تركمانستان', NULL, NULL),
(228, 'جزر توركس وكايكوس', NULL, NULL),
(229, 'توفالو', NULL, NULL),
(230, 'أوغندا', NULL, NULL),
(231, 'أوكرانيا', NULL, NULL),
(232, 'الإمارات العربية المتحدة', NULL, NULL),
(233, 'المملكة المتحدة', NULL, NULL),
(234, 'الولايات المتحدة', NULL, NULL),
(235, 'قائمة الولايات والمناطق الأمريكية', NULL, NULL),
(236, 'أورغواي', NULL, NULL),
(237, 'أوزباكستان', NULL, NULL),
(238, 'فانواتو', NULL, NULL),
(239, 'فنزويلا', NULL, NULL),
(240, 'فيتنام', NULL, NULL),
(241, 'الجزر العذراء الأمريكي', NULL, NULL),
(242, 'فنزويلا', NULL, NULL),
(243, 'والس وفوتونا', NULL, NULL),
(244, 'الصحراء الغربية', NULL, NULL),
(245, 'اليمن', NULL, NULL),
(246, 'زامبيا', NULL, NULL),
(247, 'زمبابوي', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `design_services`
--

CREATE TABLE `design_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `design_services`
--

INSERT INTO `design_services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'خدمات الهوية', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'خدمات الاعمال و التسويق', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `design_sub_services`
--

CREATE TABLE `design_sub_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `design_service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `design_sub_services`
--

INSERT INTO `design_sub_services` (`id`, `name`, `price`, `design_service_id`, `created_at`, `updated_at`) VALUES
(1, 'تصميم شعار', 10.00, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'ورق المراسلات', 20.00, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'كرت العمل', 10.00, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(4, 'ظرف', 10.00, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(5, 'مذكرات', 10.00, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(6, 'فواتير', 10.00, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(7, 'مكتبة صور الهوية', 10.00, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(8, 'سندات', 10.00, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(9, 'البطاقات البريدية', 10.00, 2, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(10, 'إعلانات المجلات', 10.00, 2, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(11, 'إعلانات', 10.00, 2, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(12, 'العروض التقدمية', 10.00, 2, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(13, 'شهادات', 10.00, 2, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(14, 'القوائم', 10.00, 2, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(15, 'مكتبة صور الهوية', 10.00, 2, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(16, 'الكاتلوجات', 10.00, 2, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `editors`
--

CREATE TABLE `editors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL,
  `reset_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `editor_permits`
--

CREATE TABLE `editor_permits` (
  `editor_id` bigint(20) UNSIGNED NOT NULL,
  `permit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `editor_requests`
--

CREATE TABLE `editor_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE `fonts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`id`, `name`, `file`, `created_at`, `updated_at`) VALUES
(1, 'SST Arabic', 'sst-arabic-medium.ttf', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'JF Flat', 'JFFlat.ttf', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'ae alarabiya', 'ae-alarabiya.ttf', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(4, 'Swissra', 'swissra-medium.otf', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(5, 'Cairo', 'cairo-bold.ttf', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(6, 'Montserrat', 'montserrat-medium.ttf', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(7, 'QFArabic', 'qfarabic-medium.otf', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(8, 'Arbfonts Somar', 'arbfonts-somar-medium.otf', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(9, 'FFShamel Family', 'ffshamelfamily-medium.ttf', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'العربية', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'الانجليزية', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'العربية والانجليزية', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Album', 1, 'cd06fd87-350d-4e88-a2b2-060aaa9e1b9a', 'images', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 472096, '\"[]\"', '\"[]\"', '\"[]\"', 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'App\\Album', 1, 'a6dd866e-8b3b-4cb0-b7fa-50d3a98f85d9', 'images', 'image2', 'image2.jpg', 'image/jpeg', 'public', 'public', 99521, '\"[]\"', '\"[]\"', '\"[]\"', 2, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'App\\Album', 1, '92e9d1f5-c7ce-469e-8c12-b51c0a3ed906', 'images', 'image3', 'image3.jpg', 'image/jpeg', 'public', 'public', 161339, '\"[]\"', '\"[]\"', '\"[]\"', 3, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(4, 'App\\Album', 2, '41eff7c6-c18e-46d0-927a-5b4fed5f3fa2', 'images', 'car1', 'car1.jpg', 'image/jpeg', 'public', 'public', 100839, '\"[]\"', '\"[]\"', '\"[]\"', 4, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(5, 'App\\Album', 2, '36b7567f-0ca7-467a-b651-d0d13b0b8157', 'images', 'car2', 'car2.jpg', 'image/jpeg', 'public', 'public', 66641, '\"[]\"', '\"[]\"', '\"[]\"', 5, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(6, 'App\\Album', 2, 'fdd9e4ba-4919-4758-b92f-a4aea202ace6', 'images', 'car3', 'car3.jpg', 'image/jpeg', 'public', 'public', 279097, '\"[]\"', '\"[]\"', '\"[]\"', 6, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000010_create_countries_table', 1),
(2, '2014_10_12_000020_create_cities_table', 1),
(3, '2014_10_12_000030_create_users_table', 1),
(4, '2018_01_01_000000_create_action_events_table', 1),
(5, '2018_08_08_100000_create_telescope_entries_table', 1),
(6, '2019_05_10_000000_add_fields_to_action_events_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_10_09_104240_add_trix_table', 1),
(9, '2020_02_20_185534_create_admins_table', 1),
(10, '2020_02_20_185540_create_admins_password_resets_table', 1),
(11, '2020_02_21_085712_create_contacts_table', 1),
(12, '2020_02_21_090014_create_settings_table', 1),
(13, '2020_02_24_181043_create_pages_table', 1),
(14, '2020_03_11_084035_create_sliders_table', 1),
(15, '2020_03_11_084126_create_services_table', 1),
(16, '2020_06_26_210430_create_centers_table', 1),
(17, '2020_06_26_210444_create_partners_table', 1),
(18, '2020_06_26_220458_create_trainers_table', 1),
(19, '2020_06_30_195320_create_types_table', 1),
(20, '2020_06_30_195410_create_fonts_table', 1),
(21, '2020_06_30_195415_create_languages_table', 1),
(22, '2020_06_30_195453_create_templates_table', 1),
(23, '2020_06_30_200100_create_editors_table', 1),
(24, '2020_06_30_200120_create_permits_table', 1),
(25, '2020_06_30_200140_create_editor_permits_table', 1),
(26, '2020_06_30_200150_create_user_permits_table', 1),
(27, '2020_06_30_200210_create_certificate_types_table', 1),
(28, '2020_06_30_200212_create_targets_table', 1),
(29, '2020_06_30_200223_create_certificates_table', 1),
(30, '2020_06_30_203245_add_parent_id_column_certificate_table', 1),
(31, '2020_06_30_203600_create_media_table', 1),
(32, '2020_06_30_203620_create_albums_table', 1),
(33, '2020_06_30_203700_create_ads_types_table', 1),
(34, '2020_06_30_203702_create_ads_table', 1),
(35, '2020_06_30_203710_create_ads_contents_table', 1),
(36, '2020_06_30_203720_create_ads_features_table', 1),
(37, '2020_06_30_203725_create_ads_times_table', 1),
(38, '2020_06_30_204046_create_cards_table', 1),
(39, '2020_08_18_192323_create_certificate_requests_table', 1),
(40, '2020_08_18_192340_create_ads_requests_table', 1),
(41, '2020_08_18_221455_create_certificate_students_table', 1),
(42, '2020_08_19_172605_create_jobs_table', 1),
(43, '2020_08_23_043020_create_editor_requests_table', 1),
(44, '2020_08_23_044818_create_special_design_requests_table', 1),
(45, '2020_08_23_183203_create_design_services_table', 1),
(46, '2020_08_23_184127_create_design_sub_services_table', 1),
(47, '2020_08_23_194323_create_special_designs_table', 1),
(48, '2020_08_23_194341_create_special_design_services_table', 1),
(49, '2020_08_24_042300_create_statuses_table', 1),
(50, '2020_08_24_042320_create_payment_types_table', 1),
(51, '2020_08_24_042452_create_packages_table', 1),
(52, '2020_08_24_050002_create_banks_table', 1),
(53, '2020_08_24_050118_create_bank_transfers_table', 1),
(54, '2020_08_24_050130_create_payment_cards_table', 1),
(55, '2020_08_24_050140_create_paypal_payments_table', 1),
(56, '2020_08_24_194242_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nova_pending_trix_attachments`
--

CREATE TABLE `nova_pending_trix_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `draft_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nova_trix_attachments`
--

CREATE TABLE `nova_trix_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `attachable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachable_id` int(10) UNSIGNED NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `certificates_no` int(11) DEFAULT NULL,
  `certificates_free_no` int(11) DEFAULT NULL,
  `ads_no` int(11) DEFAULT NULL,
  `cards_no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `certificates_no`, `certificates_free_no`, `ads_no`, `cards_no`, `created_at`, `updated_at`) VALUES
(1, 'باقة ذهبية', 200.00, 40000, 10, 60, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'باقة فضية', 150.00, 250, 10, 50, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'باقة توفير', 100.00, 200, 10, 40, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(4, 'باقة ميكس', 50.00, 100, 10, 30, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `slug`, `details`, `active`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"About Us\",\"ar\":\"\\u0645\\u0646 \\u0646\\u062d\\u0646\"}', NULL, 'about', '{\"en\":\"<p>Shehada Tech, is an electronic service that aims to serve training establishments, trainers and trainers by making it easy to design and issue training announcements and certificates for courses and programs.<\\/p>\\n                        <p>We put in a Shehada Tech that is affordable for everyone, you will not need to bother to design yourself, search for someone who designs for you, or delay issuing advertisements and certificates, we are here to serve you.<\\/p>\\n                        <p>Shehada Tech, a service provided by (Al Shawi Training and Consulting) that meets your needs and aims to your satisfaction.<\\/p>\",\"ar\":\"<p>\\u0634\\u0647\\u0627\\u062f\\u0629 \\u062a\\u0643 \\u060c \\u0647\\u064a \\u062e\\u062f\\u0645\\u0629 \\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\\u0629 \\u062a\\u0647\\u062f\\u0641 \\u0644\\u062e\\u062f\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0646\\u0634\\u0622\\u062a \\u0627\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0645\\u062f\\u0631\\u0628\\u064a\\u0646 \\u0648\\u0627\\u0644\\u0645\\u062f\\u0631\\u0628\\u0627\\u062a \\u0648\\u0630\\u0644\\u0643 \\u0639\\u0628\\u0631 \\u0625\\u062a\\u0627\\u062d\\u0629 \\u062a\\u0635\\u0645\\u064a\\u0645 \\u0648\\u0625\\u0635\\u062f\\u0627\\u0631 \\u0627\\u0644\\u0625\\u0639\\u0644\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0634\\u0647\\u0627\\u062f\\u0627\\u062a \\u0644\\u0644\\u062f\\u0648\\u0631\\u0627\\u062a \\u0648\\u0627\\u0644\\u0628\\u0631\\u0627\\u0645\\u062c \\u0628\\u0643\\u0644 \\u0633\\u0647\\u0648\\u0644\\u0629 .<\\/p>\\n                    <p>\\u0648\\u0636\\u0639\\u0646\\u0640\\u0627 \\u0641\\u064a \\u0634\\u0647\\u0627\\u062f\\u0629 \\u062a\\u0643 \\u0628\\u0627\\u0642\\u0627\\u062a \\u0641\\u064a \\u0645\\u062a\\u0646\\u0627\\u0648\\u0644 \\u0627\\u0644\\u062c\\u0645\\u064a\\u0639 \\u060c \\u0644\\u0646 \\u062a\\u062d\\u062a\\u0627\\u062c \\u0627\\u0644\\u0622\\u0646 \\u0625\\u0644\\u0649 \\u0639\\u0646\\u0627\\u0621 \\u0627\\u0644\\u062a\\u0635\\u0645\\u064a\\u0645 \\u0628\\u0646\\u0641\\u0633\\u0643 \\u060c \\u0623\\u0648 \\u0627\\u0644\\u0628\\u062d\\u062b \\u0639\\u0645\\u0646 \\u064a\\u0635\\u0645\\u0645 \\u0644\\u0643 \\u060c \\u0623\\u0648 \\u0627\\u0644\\u062a\\u0623\\u062e\\u0631 \\u0641\\u064a \\u0625\\u0635\\u062f\\u0627\\u0631 \\u0627\\u0644\\u0625\\u0639\\u0644\\u0627\\u0646\\u0627\\u062a \\u0648\\u0627\\u0644\\u0634\\u0647\\u0627\\u062f\\u0627\\u062a \\u060c \\u0646\\u062d\\u0646 \\u0647\\u0646\\u0640\\u0627 \\u0641\\u064a \\u062e\\u062f\\u0645\\u062a\\u0643 .<\\/p>\\n                    <p>\\u0634\\u0647\\u0627\\u062f\\u0629 \\u062a\\u0643 \\u060c \\u062e\\u062f\\u0645\\u0629 \\u0645\\u0642\\u062f\\u0645\\u0629 \\u0645\\u0646 ( \\u0627\\u0644\\u0634\\u0627\\u0648\\u064a \\u0644\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628 \\u0648\\u0627\\u0644\\u0627\\u0633\\u062a\\u0634\\u0627\\u0631\\u0627\\u062a ) \\u062a\\u0644\\u0628\\u064a \\u0627\\u062d\\u062a\\u064a\\u0627\\u062c\\u0627\\u062a\\u0643\\u0645 \\u0648\\u062a\\u0647\\u062f\\u0641 \\u0644\\u0631\\u0636\\u0627\\u0643\\u0645 .<\\/p>\"}', 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, '{\"en\":\"Terms\",\"ar\":\"\\u0627\\u0644\\u0634\\u0631\\u0648\\u0637 \\u0648\\u0627\\u0644\\u0623\\u062d\\u0643\\u0627\\u0645\"}', NULL, 'terms', '{\"en\":\"<h4>General Provisions<\\/h4>\\n                    <p>Tech certificate, is an electronic service that aims to serve training establishments, trainers and trainers by making it easy to design and issue training announcements and certificates for courses and programs.<\\/p>\\n                    <p>We put a certificate in the package, affordable packages for everyone, now you will not need to bother designing yourself, searching for someone who designs for you, or delaying issuing advertisements and certificates, we are here to serve you<\\/p>\\n                    <h4>Pledges and guarantees<\\/h4>\\n                    <ul>\\n                        <li>Comply with all laws, regulations and rules in force in the Kingdom of Saudi Arabia when using the site or services<\\/li>\\n                        <li>Provide complete and correct information according to what is required to fill in fields such as name, phone number, email and other required data. And pledge your full responsibility<\\/li>\\n                        <li>We are not responsible for any use of any content that has been created, stored or uploaded by any third party<\\/li>\\n                        <li>We do not guarantee that the functional aspects of the website or its content will be error free, without interruption or free from unauthorized access, or to meet your requirements, or that the website, its contents or the server it provides is free from viruses or other harmful components<\\/li>\\n                    <\\/ul>\",\"ar\":\"<h4>\\u0623\\u062d\\u0643\\u0627\\u0645 \\u0639\\u0627\\u0645\\u0629<\\/h4>\\n                    <p>\\u0634\\u0647\\u0627\\u062f\\u0629 \\u062a\\u0643 \\u060c \\u0647\\u064a \\u062e\\u062f\\u0645\\u0629 \\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\\u0629 \\u062a\\u0647\\u062f\\u0641 \\u0644\\u062e\\u062f\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0646\\u0634\\u0622\\u062a \\u0627\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0645\\u062f\\u0631\\u0628\\u064a\\u0646 \\u0648\\u0627\\u0644\\u0645\\u062f\\u0631\\u0628\\u0627\\u062a \\u0648\\u0630\\u0644\\u0643 \\u0639\\u0628\\u0631 \\u0625\\u062a\\u0627\\u062d\\u0629 \\u062a\\u0635\\u0645\\u064a\\u0645 \\u0648\\u0625\\u0635\\u062f\\u0627\\u0631 \\u0627\\u0644\\u0625\\u0639\\u0644\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0634\\u0647\\u0627\\u062f\\u0627\\u062a \\u0644\\u0644\\u062f\\u0648\\u0631\\u0627\\u062a \\u0648\\u0627\\u0644\\u0628\\u0631\\u0627\\u0645\\u062c \\u0628\\u0643\\u0644 \\u0633\\u0647\\u0648\\u0644\\u0629 .<\\/p>\\n                    <p>\\u0648\\u0636\\u0639\\u0646\\u0640\\u0627 \\u0641\\u064a \\u0634\\u0647\\u0627\\u062f\\u0629 \\u062a\\u0643 \\u0628\\u0627\\u0642\\u0627\\u062a \\u0641\\u064a \\u0645\\u062a\\u0646\\u0627\\u0648\\u0644 \\u0627\\u0644\\u062c\\u0645\\u064a\\u0639 \\u060c \\u0644\\u0646 \\u062a\\u062d\\u062a\\u0627\\u062c \\u0627\\u0644\\u0622\\u0646 \\u0625\\u0644\\u0649 \\u0639\\u0646\\u0627\\u0621 \\u0627\\u0644\\u062a\\u0635\\u0645\\u064a\\u0645 \\u0628\\u0646\\u0641\\u0633\\u0643 \\u060c \\u0623\\u0648 \\u0627\\u0644\\u0628\\u062d\\u062b \\u0639\\u0645\\u0646 \\u064a\\u0635\\u0645\\u0645 \\u0644\\u0643 \\u060c \\u0623\\u0648 \\u0627\\u0644\\u062a\\u0623\\u062e\\u0631 \\u0641\\u064a \\u0625\\u0635\\u062f\\u0627\\u0631 \\u0627\\u0644\\u0625\\u0639\\u0644\\u0627\\u0646\\u0627\\u062a \\u0648\\u0627\\u0644\\u0634\\u0647\\u0627\\u062f\\u0627\\u062a \\u060c \\u0646\\u062d\\u0646 \\u0647\\u0646\\u0640\\u0627 \\u0641\\u064a \\u062e\\u062f\\u0645\\u062a\\u0643 .<\\/p>\\n                    <h4>\\u0627\\u0644\\u062a\\u0639\\u0647\\u062f\\u0627\\u062a \\u0648\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646\\u0627\\u062a<\\/h4>\\n                    <ul>\\n                        <li>\\n                        <p>\\u0627\\u0644\\u0627\\u0645\\u062a\\u062b\\u0627\\u0644 \\u0644\\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0642\\u0648\\u0627\\u0646\\u064a\\u0646 \\u0648\\u0627\\u0644\\u0644\\u0648\\u0627\\u0626\\u062d \\u0648\\u0627\\u0644\\u0642\\u0648\\u0627\\u0639\\u062f \\u0627\\u0644\\u0645\\u0639\\u0645\\u0648\\u0644 \\u0628\\u0647\\u0627 \\u0641\\u064a \\u0627\\u0644\\u0645\\u0645\\u0644\\u0643\\u0629 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629 \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a\\u0629 \\u0639\\u0646\\u062f \\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \\u0623\\u0648 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a.<\\/p>\\n                        <\\/li>\\n                        <li>\\n                        <p>\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0643\\u0627\\u0645\\u0644\\u0629 \\u0648\\u0635\\u062d\\u064a\\u062d\\u0629 \\u0648\\u0641\\u0642\\u0627\\u064b \\u0644\\u0645\\u0627 \\u0647\\u0648 \\u0645\\u0637\\u0644\\u0648\\u0628 \\u0644\\u0645\\u0644\\u0623 \\u0627\\u0644\\u062d\\u0642\\u0648\\u0644 \\u0645\\u062b\\u0644 \\u0627\\u0644\\u0627\\u0633\\u0645 \\u0648\\u0631\\u0642\\u0645 \\u0627\\u0644\\u0647\\u0627\\u062a\\u0641 \\u0648\\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0648\\u063a\\u064a\\u0631\\u0647\\u0627 \\u0645\\u0646 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u0645\\u0637\\u0644\\u0648\\u0628\\u0629. \\u0648\\u062a\\u062a\\u0639\\u0647\\u062f\\u0628\\u0645\\u0633\\u0626\\u0648\\u0644\\u064a\\u062a\\u0643 \\u0627\\u0644\\u0643\\u0627\\u0645\\u0644\\u0629&nbsp;\\u0639\\u0646 \\u0623\\u064a \\u0623\\u062e\\u0637\\u0627\\u0621 \\u0641\\u064a \\u0647\\u0630\\u0647 \\u0627\\u0644\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a.<\\/p>\\n                        <\\/li>\\n                        <li>\\n                        <p>\\u0646\\u062d\\u0646 \\u0644\\u0627 \\u0646\\u062a\\u062d\\u0645\\u0644 \\u0623\\u064a\\u0629 \\u0645\\u0633\\u0624\\u0648\\u0644\\u064a\\u0629 \\u0639\\u0646 \\u0623\\u064a \\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645 \\u0644\\u0623\\u064a \\u0645\\u062d\\u062a\\u0648\\u0649 \\u062a\\u0645 \\u0648\\u0636\\u0639\\u0647 \\u0623\\u0648 \\u062a\\u062e\\u0632\\u064a\\u0646\\u0647 \\u0623\\u0648 \\u0631\\u0641\\u0639\\u0647 \\u0645\\u0646 \\u0642\\u0650\\u0628\\u0644 \\u0623\\u064a \\u0637\\u0631\\u0641 \\u062b\\u0627\\u0644\\u062b.<\\/p>\\n                        <\\/li>\\n                        <li>\\n                        <p>\\u0646\\u062d\\u0646 \\u0644\\u0627 \\u0646\\u0636\\u0645\\u0646 \\u0628\\u0623\\u0646 \\u0627\\u0644\\u062c\\u0648\\u0627\\u0646\\u0628 \\u0627\\u0644\\u0648\\u0638\\u064a\\u0641\\u064a\\u0629 \\u0644\\u0644\\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0623\\u0648 \\u0645\\u062d\\u062a\\u0648\\u0627\\u0647 \\u0633\\u062a\\u0643\\u0648\\u0646 \\u062e\\u0627\\u0644\\u064a\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0623\\u062e\\u0637\\u0627\\u0621\\u060c \\u062f\\u0648\\u0646 \\u0627\\u0646\\u0642\\u0637\\u0627\\u0639 \\u0623\\u0648 \\u062e\\u0627\\u0644\\u064a\\u0627\\u064b \\u0645\\u0646 \\u0627\\u0644\\u0648\\u0635\\u0648\\u0644 \\u063a\\u064a\\u0631 \\u0627\\u0644\\u0645\\u0635\\u0631\\u062d \\u0628\\u0647\\u060c \\u0623\\u0648 \\u0644\\u062a\\u0644\\u0628\\u064a\\u0629 \\u0645\\u062a\\u0637\\u0644\\u0628\\u0627\\u062a\\u0643\\u060c \\u0623\\u0648 \\u0623\\u0646 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0623\\u0648 \\u0645\\u062d\\u062a\\u0648\\u064a\\u0627\\u062a\\u0647 \\u0623\\u0648 \\u0627\\u0644\\u062e\\u0627\\u062f\\u0645 \\u0627\\u0644\\u0630\\u064a \\u064a\\u0639\\u0645\\u0644 \\u0639\\u0644\\u0649 \\u062a\\u0648\\u0641\\u064a\\u0631\\u0647 \\u062e\\u0627\\u0644\\u064d \\u0645\\u0646 \\u0627\\u0644\\u0641\\u064a\\u0631\\u0648\\u0633\\u0627\\u062a \\u0623\\u0648 \\u063a\\u064a\\u0631\\u0647\\u0627 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0643\\u0648\\u0646\\u0627\\u062a \\u0627\\u0644\\u0636\\u0627\\u0631\\u0629.<\\/p>\\n                        <\\/li>\\n                    <\\/ul>\"}', 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo`, `link`, `created_at`, `updated_at`) VALUES
(1, 'مركز مسار للتدريب', 'masar-logo.png', 'http://masar.sa', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'مركز القياس الوطني', 'qiyas-logo.png', NULL, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'هيئة تقويم التعليم والتدريب', 'education-logo.png', NULL, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(4, 'مركز اعتماد للتدريب', 'ncaaa-logo.png', NULL, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(5, 'الهيئة السعودية للمهندسين', 'ncsee-logo.png', NULL, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(6, 'استثمار المرافق التعليمية', 'facilities-logo.png', NULL, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentable_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `certificates_no` int(11) DEFAULT NULL,
  `certificates_free_no` int(11) DEFAULT NULL,
  `ads_no` int(11) DEFAULT NULL,
  `cards_no` int(11) DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `paymentable_type`, `paymentable_id`, `price`, `certificates_no`, `certificates_free_no`, `ads_no`, `cards_no`, `status_id`, `user_id`, `payment_type_id`, `created_at`, `updated_at`) VALUES
(1, 'App\\BankTransfer', 1, 200.00, 40000, 10, 60, 1, 2, 1, 1, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment_cards`
--

CREATE TABLE `payment_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `process_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `source_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `editor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'حوالة بنكية', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'بطاقة الكترونية', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'PayPal', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payments`
--

CREATE TABLE `paypal_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(10,2) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permits`
--

CREATE TABLE `permits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permits`
--

INSERT INTO `permits` (`id`, `name`, `key`, `type`, `created_at`, `updated_at`) VALUES
(1, 'إصدار شهادة', 'certificate', 'editor', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'إصدار إعلان', 'ads', 'editor', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'تجديد إشتراك', 'subscription', 'editor', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(4, 'تعديل شهادة', 'update_certificate', 'user', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `details`, `icon`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Lorem Ipsum1\",\"ar\":\"\\u0644\\u0648\\u0631\\u064a\\u0645 \\u0625\\u064a\\u0628\\u0633\\u0648\\u06451\"}', '{\"en\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry\",\"ar\":\"\\u0644\\u0648\\u0631\\u064a\\u0645 \\u0625\\u064a\\u0628\\u0633\\u0648\\u0645 \\u0647\\u0648 \\u0628\\u0628\\u0633\\u0627\\u0637\\u0629 \\u0646\\u0635 \\u0634\\u0643\\u0644\\u064a (\\u0628\\u0645\\u0639\\u0646\\u0649 \\u0623\\u0646 \\u0627\\u0644\\u063a\\u0627\\u064a\\u0629 \\u0647\\u064a \\u0627\\u0644\\u0634\\u0643\\u0644 \\u0648\\u0644\\u064a\\u0633 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649) \\u0648\\u064a\\u064f\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0641\\u064a \\u0635\\u0646\\u0627\\u0639\\u0627\\u062a \\u0627\\u0644\\u0645\\u0637\\u0627\\u0628\\u0639 \\u0648\\u062f\\u0648\\u0631 \\u0627\\u0644\\u0646\\u0634\\u0631\"}', '{\"en\":\"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry<\\/p>\",\"ar\":\"<p><\\/p>\"}', NULL, '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, '{\"en\":\"Lorem Ipsum2\",\"ar\":\"\\u0644\\u0648\\u0631\\u064a\\u0645 \\u0625\\u064a\\u0628\\u0633\\u0648\\u06452\"}', '{\"en\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout\",\"ar\":\"\\u0647\\u0646\\u0627\\u0643 \\u062d\\u0642\\u064a\\u0642\\u0629 \\u0645\\u062b\\u0628\\u062a\\u0629 \\u0645\\u0646\\u0630 \\u0632\\u0645\\u0646 \\u0637\\u0648\\u064a\\u0644 \\u0648\\u0647\\u064a \\u0623\\u0646 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0645\\u0642\\u0631\\u0648\\u0621 \\u0644\\u0635\\u0641\\u062d\\u0629 \\u0645\\u0627 \\u0633\\u064a\\u0644\\u0647\\u064a \\u0627\\u0644\\u0642\\u0627\\u0631\\u0626 \\u0639\\u0646 \\u0627\\u0644\\u062a\\u0631\\u0643\\u064a\\u0632 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0634\\u0643\\u0644 \\u0627\\u0644\\u062e\\u0627\\u0631\\u062c\\u064a \\u0644\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0634\\u0643\\u0644 \\u062a\\u0648\\u0636\\u0639 \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u062a\\u064a \\u064a\\u0642\\u0631\\u0623\\u0647\\u0627\"}', '{\"en\":\"<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout<\\/p>\",\"ar\":\"<p>\\u0647\\u0646\\u0627\\u0643 \\u062d\\u0642\\u064a\\u0642\\u0629 \\u0645\\u062b\\u0628\\u062a\\u0629 \\u0645\\u0646\\u0630 \\u0632\\u0645\\u0646 \\u0637\\u0648\\u064a\\u0644 \\u0648\\u0647\\u064a \\u0623\\u0646 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0645\\u0642\\u0631\\u0648\\u0621 \\u0644\\u0635\\u0641\\u062d\\u0629 \\u0645\\u0627 \\u0633\\u064a\\u0644\\u0647\\u064a \\u0627\\u0644\\u0642\\u0627\\u0631\\u0626 \\u0639\\u0646 \\u0627\\u0644\\u062a\\u0631\\u0643\\u064a\\u0632 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0634\\u0643\\u0644 \\u0627\\u0644\\u062e\\u0627\\u0631\\u062c\\u064a \\u0644\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0634\\u0643\\u0644 \\u062a\\u0648\\u0636\\u0639 \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u062a\\u064a \\u064a\\u0642\\u0631\\u0623\\u0647\\u0627<\\/p>\"}', NULL, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'text-field',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `section`, `key`, `value`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Contact', 'mobile', '+966-100200', 'Text', NULL, NULL, NULL),
(2, 'Contact', 'email', 'info@shahadatech.com', 'Text', NULL, NULL, NULL),
(3, 'Contact', 'address_en', '<p>Riyadh</p>\n                <p>Jeddah 1234</p>', 'Trix', NULL, NULL, NULL),
(4, 'Contact', 'address_ar', '<p>الرياض</p>\n                <p>جدة 1234</p>', 'Trix', NULL, NULL, NULL),
(5, 'Social', 'facebook', 'https://facebook.com', 'Text', NULL, NULL, NULL),
(6, 'Social', 'twitter', 'https://twitter.com/', 'Text', NULL, NULL, NULL),
(7, 'Social', 'instagram', 'https://instagram.com', 'Text', NULL, NULL, NULL),
(8, 'Social', 'youtube', NULL, 'Text', NULL, NULL, NULL),
(9, 'Social', 'linkedin', 'https://www.linkedin.com/', 'Text', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `button_text`, `button_icon`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'حين تكون التقنية بوابةً لخدمتك تكون شهادة تك', 'صدِّر شهاداتك وقم بتصميم إعلاناتك بخطواتٍ سهلة', 'slider-img1.svg', 'شاهد الفيديو', 'play-icon.svg', 'https://www.youtube.com/watch?v=hpp3WA5l_FY&list=PLdWcYbFFqZr2vNb2XC4LmsbbjneZnbSwo', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'حين تكون التقنية بوابةً لخدمتك تكون شهادة تك2', 'صدِّر شهاداتك وقم بتصميم إعلاناتك بخطواتٍ سهلة2', 'slider-img1.svg', NULL, NULL, NULL, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `special_designs`
--

CREATE TABLE `special_designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design_service_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_design_requests`
--

CREATE TABLE `special_design_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_design_services`
--

CREATE TABLE `special_design_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `special_design_id` bigint(20) UNSIGNED DEFAULT NULL,
  `special_design_sub_service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'قيد الانتظار', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'تم الدفع', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'فشل', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(4, 'حظر', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'رجال', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'نساء', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, 'رجال ونساء', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(4, 'بدون', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(5, 'آخرون', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telescope_entries`
--

INSERT INTO `telescope_entries` (`sequence`, `uuid`, `batch_id`, `family_hash`, `should_display_on_index`, `type`, `content`, `created_at`) VALUES
(1, '955ec016-5740-4de0-8f13-84fdcfc6344e', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.60\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(2, '955ec016-c6df-41de-9e0d-020ad86b1ab1', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `pages` where `slug` = \'about\' limit 1\",\"time\":\"0.72\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Http\\/Controllers\\/User\\/HomeController.php\",\"line\":26,\"hash\":\"968f4f4efe5299f975cf5da4a66ccb62\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(3, '955ec016-c970-4407-858e-edce1e8399de', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select count(*) as aggregate from `certificate_students`\",\"time\":\"4.27\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Http\\/Controllers\\/User\\/HomeController.php\",\"line\":29,\"hash\":\"ac80d1f3aff3a003e03edfffda02e2cf\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(4, '955ec016-d954-49c1-a943-2fb6c536f5e3', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select count(*) as aggregate from `users`\",\"time\":\"0.49\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Http\\/Controllers\\/User\\/HomeController.php\",\"line\":30,\"hash\":\"6c5274cfac96d79f6367317dfb756038\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(5, '955ec016-da26-4b38-8f16-64f284db8479', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `sliders` limit 10\",\"time\":\"0.41\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Http\\/Controllers\\/User\\/HomeController.php\",\"line\":31,\"hash\":\"9637eb28c9a21d32c2a26613e0e5b311\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(6, '955ec016-db0d-46e3-8986-d5dafe377c83', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `partners` limit 50\",\"time\":\"0.45\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Http\\/Controllers\\/User\\/HomeController.php\",\"line\":32,\"hash\":\"aef8eb71a8235829bf01b9605e235bf8\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(7, '955ec016-dbdc-49a8-8389-01bfefee5bd4', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `centers` limit 50\",\"time\":\"0.39\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Http\\/Controllers\\/User\\/HomeController.php\",\"line\":33,\"hash\":\"66279cd05b6b494099ff37a874b8dbd7\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(8, '955ec016-f570-499d-b681-7b1e1ce9286c', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'view', '{\"name\":\"site.index\",\"path\":\"\\/resources\\/views\\/site\\/index.blade.php\",\"data\":[\"activeClass\",\"about\",\"certificates_no\",\"users_no\",\"slider\",\"partners\",\"centers\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(9, '955ec016-fdf7-4152-85a1-854100ea122b', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'view', '{\"name\":\"site.partials.about\",\"path\":\"\\/resources\\/views\\/site\\/partials\\/about.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"about\",\"certificates_no\",\"users_no\",\"slider\",\"partners\",\"centers\",\"__currentLoopData\",\"item\",\"loop\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(10, '955ec016-ff17-486d-9dea-cefbbebf2632', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'view', '{\"name\":\"site.partials.contact\",\"path\":\"\\/resources\\/views\\/site\\/partials\\/contact.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"about\",\"certificates_no\",\"users_no\",\"slider\",\"partners\",\"centers\",\"__currentLoopData\",\"item\",\"loop\",\"key\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(11, '955ec017-0004-453e-a8c9-5621d0524848', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'view', '{\"name\":\"site.partials.special_design_request\",\"path\":\"\\/resources\\/views\\/site\\/partials\\/special_design_request.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"about\",\"certificates_no\",\"users_no\",\"slider\",\"partners\",\"centers\",\"__currentLoopData\",\"item\",\"loop\",\"key\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(12, '955ec017-00c6-4358-b209-66a458f441a4', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'view', '{\"name\":\"layouts.site\",\"path\":\"\\/resources\\/views\\/layouts\\/site.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"about\",\"certificates_no\",\"users_no\",\"slider\",\"partners\",\"centers\",\"__currentLoopData\",\"item\",\"loop\",\"key\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(13, '955ec017-021e-46fd-8b9f-1bd814ec1b7d', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'view', '{\"name\":\"layouts.partials.header_home\",\"path\":\"\\/resources\\/views\\/layouts\\/partials\\/header_home.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"about\",\"certificates_no\",\"users_no\",\"slider\",\"partners\",\"centers\",\"__currentLoopData\",\"item\",\"loop\",\"key\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(14, '955ec017-059d-4a6b-96a6-f63da74a338e', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'view', '{\"name\":\"layouts.partials.footer\",\"path\":\"\\/resources\\/views\\/layouts\\/partials\\/footer.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"about\",\"certificates_no\",\"users_no\",\"slider\",\"partners\",\"centers\",\"__currentLoopData\",\"item\",\"loop\",\"key\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:41'),
(15, '955ec017-0f75-4317-9f93-8019f02f4558', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'debugbar', '{\"requestId\":\"X3859f95abfbcb0388008cf852ee27280\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:42'),
(16, '955ec017-31d4-481b-b312-aa14e7b2873c', '955ec017-359d-4920-9bde-80effae55363', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/\",\"method\":\"GET\",\"controller_action\":\"App\\\\Http\\\\Controllers\\\\User\\\\HomeController@index\",\"middleware\":[\"web\",\"localeSessionRedirect\",\"localizationRedirect\",\"localeViewPath\"],\"headers\":{\"accept-language\":\"en-US,en;q=0.9,ar;q=0.8\",\"accept-encoding\":\"gzip, deflate\",\"purpose\":\"prefetch\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"user-agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\",\"upgrade-insecure-requests\":\"1\",\"connection\":\"keep-alive\",\"host\":\"shehada_tech.test\",\"content-length\":\"\",\"content-type\":\"\"},\"payload\":[],\"session\":{\"_token\":\"t32KzmnxDnNDiGf9dDo8xatOc53VVyk4fwL0lNwz\",\"_flash\":{\"old\":[],\"new\":[]},\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":200,\"response\":{\"view\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/resources\\/views\\/site\\/index.blade.php\",\"data\":{\"activeClass\":\"index\",\"about\":\"App\\\\Page:1\",\"certificates_no\":0,\"users_no\":1,\"slider\":{\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Collection\",\"properties\":[{\"id\":1,\"title\":\"\\u062d\\u064a\\u0646 \\u062a\\u0643\\u0648\\u0646 \\u0627\\u0644\\u062a\\u0642\\u0646\\u064a\\u0629 \\u0628\\u0648\\u0627\\u0628\\u0629\\u064b \\u0644\\u062e\\u062f\\u0645\\u062a\\u0643 \\u062a\\u0643\\u0648\\u0646 \\u0634\\u0647\\u0627\\u062f\\u0629 \\u062a\\u0643\",\"description\":\"\\u0635\\u062f\\u0651\\u0650\\u0631 \\u0634\\u0647\\u0627\\u062f\\u0627\\u062a\\u0643 \\u0648\\u0642\\u0645 \\u0628\\u062a\\u0635\\u0645\\u064a\\u0645 \\u0625\\u0639\\u0644\\u0627\\u0646\\u0627\\u062a\\u0643 \\u0628\\u062e\\u0637\\u0648\\u0627\\u062a\\u064d \\u0633\\u0647\\u0644\\u0629\",\"image\":\"slider-img1.svg\",\"button_text\":\"\\u0634\\u0627\\u0647\\u062f \\u0627\\u0644\\u0641\\u064a\\u062f\\u064a\\u0648\",\"button_icon\":\"play-icon.svg\",\"button_link\":\"https:\\/\\/www.youtube.com\\/watch?v=hpp3WA5l_FY&list=PLdWcYbFFqZr2vNb2XC4LmsbbjneZnbSwo\",\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"},{\"id\":2,\"title\":\"\\u062d\\u064a\\u0646 \\u062a\\u0643\\u0648\\u0646 \\u0627\\u0644\\u062a\\u0642\\u0646\\u064a\\u0629 \\u0628\\u0648\\u0627\\u0628\\u0629\\u064b \\u0644\\u062e\\u062f\\u0645\\u062a\\u0643 \\u062a\\u0643\\u0648\\u0646 \\u0634\\u0647\\u0627\\u062f\\u0629 \\u062a\\u06432\",\"description\":\"\\u0635\\u062f\\u0651\\u0650\\u0631 \\u0634\\u0647\\u0627\\u062f\\u0627\\u062a\\u0643 \\u0648\\u0642\\u0645 \\u0628\\u062a\\u0635\\u0645\\u064a\\u0645 \\u0625\\u0639\\u0644\\u0627\\u0646\\u0627\\u062a\\u0643 \\u0628\\u062e\\u0637\\u0648\\u0627\\u062a\\u064d \\u0633\\u0647\\u0644\\u06292\",\"image\":\"slider-img1.svg\",\"button_text\":null,\"button_icon\":null,\"button_link\":null,\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"}]},\"partners\":{\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Collection\",\"properties\":[{\"id\":1,\"name\":\"\\u0645\\u0631\\u0643\\u0632 \\u0645\\u0633\\u0627\\u0631 \\u0644\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\",\"logo\":\"masar-logo.png\",\"link\":\"http:\\/\\/masar.sa\",\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"},{\"id\":2,\"name\":\"\\u0645\\u0631\\u0643\\u0632 \\u0627\\u0644\\u0642\\u064a\\u0627\\u0633 \\u0627\\u0644\\u0648\\u0637\\u0646\\u064a\",\"logo\":\"qiyas-logo.png\",\"link\":null,\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"},{\"id\":3,\"name\":\"\\u0647\\u064a\\u0626\\u0629 \\u062a\\u0642\\u0648\\u064a\\u0645 \\u0627\\u0644\\u062a\\u0639\\u0644\\u064a\\u0645 \\u0648\\u0627\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\",\"logo\":\"education-logo.png\",\"link\":null,\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"},{\"id\":4,\"name\":\"\\u0645\\u0631\\u0643\\u0632 \\u0627\\u0639\\u062a\\u0645\\u0627\\u062f \\u0644\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\",\"logo\":\"ncaaa-logo.png\",\"link\":null,\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"},{\"id\":5,\"name\":\"\\u0627\\u0644\\u0647\\u064a\\u0626\\u0629 \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a\\u0629 \\u0644\\u0644\\u0645\\u0647\\u0646\\u062f\\u0633\\u064a\\u0646\",\"logo\":\"ncsee-logo.png\",\"link\":null,\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"},{\"id\":6,\"name\":\"\\u0627\\u0633\\u062a\\u062b\\u0645\\u0627\\u0631 \\u0627\\u0644\\u0645\\u0631\\u0627\\u0641\\u0642 \\u0627\\u0644\\u062a\\u0639\\u0644\\u064a\\u0645\\u064a\\u0629\",\"logo\":\"facilities-logo.png\",\"link\":null,\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"}]},\"centers\":{\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Collection\",\"properties\":[{\"id\":1,\"name\":\"\\u0645\\u0631\\u0643\\u0632 \\u0645\\u0633\\u0627\\u0631 \\u0644\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\",\"logo\":\"masar-logo.png\",\"address\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u0636 - \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u0628\\u0629\",\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"},{\"id\":2,\"name\":\"\\u0645\\u0631\\u0643\\u0632 \\u0627\\u0644\\u0642\\u064a\\u0627\\u0633 \\u0627\\u0644\\u0648\\u0637\\u0646\\u064a\",\"logo\":\"qiyas-logo.png\",\"address\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u0636 - \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u0628\\u0629\",\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"},{\"id\":3,\"name\":\"\\u0647\\u064a\\u0626\\u0629 \\u062a\\u0642\\u0648\\u064a\\u0645 \\u0627\\u0644\\u062a\\u0639\\u0644\\u064a\\u0645 \\u0648\\u0627\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\",\"logo\":\"education-logo.png\",\"address\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u0636 - \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u0628\\u0629\",\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"},{\"id\":4,\"name\":\"\\u0645\\u0631\\u0643\\u0632 \\u0627\\u0639\\u062a\\u0645\\u0627\\u062f \\u0644\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\",\"logo\":\"ncaaa-logo.png\",\"address\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u0636 - \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u0628\\u0629\",\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"},{\"id\":5,\"name\":\"\\u0627\\u0633\\u062a\\u062b\\u0645\\u0627\\u0631 \\u0627\\u0644\\u0645\\u0631\\u0627\\u0641\\u0642 \\u0627\\u0644\\u062a\\u0639\\u0644\\u064a\\u0645\\u064a\\u0629\",\"logo\":\"facilities-logo.png\",\"address\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u0636 - \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u0628\\u0629\",\"created_at\":\"2022-01-16T14:03:34.000000Z\",\"updated_at\":\"2022-01-16T14:03:34.000000Z\"}]}}},\"duration\":1659,\"memory\":2,\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:42'),
(17, '955ec017-fd1e-4917-b6b2-845200a77f22', '955ec018-5110-47a7-83ae-f2af3f9b4945', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.43\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:42'),
(18, '955ec018-eea8-41da-8e64-389114340369', '955ec019-6a7b-4ed1-8301-dfbc81630dff', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.46\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:43'),
(19, '955ec019-a82a-48a7-968c-b3e48ca92574', '955ec019-b576-44d9-81e5-7a139f86b4a9', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"2.00\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:43'),
(20, '955ec01d-19a6-446a-825e-2e83862b0b29', '955ec01d-80c8-4775-aa5c-d4059dd9804f', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.34\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:45'),
(21, '955ec01d-22d1-4a35-9508-03fe72f28604', '955ec01d-80c8-4775-aa5c-d4059dd9804f', NULL, 1, 'event', '{\"name\":\"Laravel\\\\Nova\\\\Events\\\\NovaServiceProviderRegistered\",\"payload\":null,\"listeners\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/PendingRouteRegistration.php[79:91]\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:45'),
(22, '955ec01d-6bf4-4a39-a84e-2fb617332966', '955ec01d-80c8-4775-aa5c-d4059dd9804f', NULL, 1, 'debugbar', '{\"requestId\":\"X0ec679ba82aa2aeaca5a6a9eff86dc76\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(23, '955ec01d-8037-4927-bdad-b875fdf0aa19', '955ec01d-80c8-4775-aa5c-d4059dd9804f', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\",\"method\":\"GET\",\"controller_action\":\"Laravel\\\\Nova\\\\Http\\\\Controllers\\\\RouterController@show\",\"middleware\":[\"web\",\"Laravel\\\\Nova\\\\Http\\\\Middleware\\\\Authenticate\",\"Laravel\\\\Nova\\\\Http\\\\Middleware\\\\DispatchServingNovaEvent\",\"Laravel\\\\Nova\\\\Http\\\\Middleware\\\\BootTools\",\"Laravel\\\\Nova\\\\Http\\\\Middleware\\\\Authorize\"],\"headers\":{\"cookie\":\"XSRF-TOKEN=eyJpdiI6ImxFSEFTbGxXYUxncTBWdk9LNm00c3c9PSIsInZhbHVlIjoicnlGS0RuYzJjUEF6NjFETDNCQjR3UWxObEd4czMvcFlrMWV0RWJLOEZFMWFkeExmWU5LU1ExM2RwVW9FOVJ6REdEdW1rQlRzQlNvejZQQk5aU3EyNHlJYmJwSGE5bEI0cVoxNXhzT29pTFg5ZFErdUxzR2QwUXlrd0cvMVV2MFoiLCJtYWMiOiIxNjU1Njc4YzI5ZDMzMDA1ZmVmZTdkMGNmMWI0NzRjNjg3ZmU0MWUyMDJiYzBiMWVjYzk4NTU2NWJjNmVmYTgxIn0%3D; shahada_tech_session=eyJpdiI6IjNFUkw2c012NDdWb1VNenY1bHlxWXc9PSIsInZhbHVlIjoiVWprYmFoSlRIbkVJYzhnbGNOSHRMUlo1RytzdkRBNjdBV3ZNZW56UHFMMHV4UUF1L0xwNDdTR0E4R0JMU2Q1ZkxhQUtZRVdzbHhOQ3pLaER1QkxBOGJhRVYrOExaSGxQbk5ZSmNjdWlwMkVRckUrNXRwMDZmcGNyRHRLMTNmUVUiLCJtYWMiOiJjNjVkNWZjZGM3M2EzMDg1MWUzOTFiZDZkNmYwYjIzZjQwZTIwMGVlOThhYzE3YWE4ODY0MGQzNjlhY2E3MGNiIn0%3D\",\"accept-language\":\"en-US,en;q=0.9,ar;q=0.8\",\"accept-encoding\":\"gzip, deflate\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"user-agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\",\"upgrade-insecure-requests\":\"1\",\"connection\":\"keep-alive\",\"host\":\"shehada_tech.test\",\"content-length\":\"\",\"content-type\":\"\"},\"payload\":[],\"session\":{\"_token\":\"t32KzmnxDnNDiGf9dDo8xatOc53VVyk4fwL0lNwz\",\"_flash\":{\"old\":[],\"new\":[]},\"url\":{\"intended\":\"http:\\/\\/shehada_tech.test\\/admin\"},\"_previous\":{\"url\":\"http:\\/\\/shehada_tech.test\\/admin\"},\"PHPDEBUGBAR_STACK_DATA\":{\"X0ec679ba82aa2aeaca5a6a9eff86dc76\":null}},\"response_status\":302,\"response\":\"Redirected to http:\\/\\/shehada_tech.test\\/admin\\/login\",\"duration\":280,\"memory\":10,\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(24, '955ec01d-b70d-4791-b504-3a26eee31438', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.53\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(25, '955ec01d-cbd4-4876-bc45-829fab1c142b', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'event', '{\"name\":\"Laravel\\\\Nova\\\\Events\\\\NovaServiceProviderRegistered\",\"payload\":null,\"listeners\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/PendingRouteRegistration.php[79:91]\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(26, '955ec01d-d1a1-4ebd-98e5-f54a64ce66d1', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'view', '{\"name\":\"nova::auth.login\",\"path\":\"\\/nova\\/src\\/..\\/resources\\/views\\/auth\\/login.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(27, '955ec01d-d3ad-49e1-bdc1-77d71547a16a', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'view', '{\"name\":\"nova::auth.partials.header\",\"path\":\"\\/nova\\/src\\/..\\/resources\\/views\\/auth\\/partials\\/header.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(28, '955ec01d-d446-49ba-bdd4-c85832a270b2', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'view', '{\"name\":\"nova::auth.partials.logo\",\"path\":\"\\/nova\\/src\\/..\\/resources\\/views\\/auth\\/partials\\/logo.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(29, '955ec01d-d4a7-4208-b545-0f2944abb401', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'view', '{\"name\":\"nova::partials.logo\",\"path\":\"\\/resources\\/views\\/vendor\\/nova\\/partials\\/logo.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"width\",\"height\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(30, '955ec01d-d864-4097-965d-97357f80cc34', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'view', '{\"name\":\"nova::auth.partials.heading\",\"path\":\"\\/nova\\/src\\/..\\/resources\\/views\\/auth\\/partials\\/heading.blade.php\",\"data\":[\"slot\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(31, '955ec01d-db2e-48b5-9d9e-42cc532e863a', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'view', '{\"name\":\"nova::auth.layout\",\"path\":\"\\/nova\\/src\\/..\\/resources\\/views\\/auth\\/layout.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(32, '955ec01d-dd8d-4b1d-9a32-a6e3109249c0', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'view', '{\"name\":\"nova::partials.meta\",\"path\":\"\\/resources\\/views\\/vendor\\/nova\\/partials\\/meta.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(33, '955ec01d-f1c7-492f-988e-f3bda7aa60b5', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'debugbar', '{\"requestId\":\"X86dc04488d3a9e7dcdfc5dad01d2c745\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(34, '955ec01d-f241-4983-859f-39d54702bb53', '955ec01d-f2d1-4cb1-9b8d-baf5e2d53f83', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\\/login\",\"method\":\"GET\",\"controller_action\":\"Laravel\\\\Nova\\\\Http\\\\Controllers\\\\LoginController@showLoginForm\",\"middleware\":[\"web\",\"nova.guest:admin\"],\"headers\":{\"cookie\":\"XSRF-TOKEN=eyJpdiI6IkxSQ2VROHQxbmVvOGs0VmszaTVoeUE9PSIsInZhbHVlIjoiYklPVEVuMzJSWkZCMU8rTERYaDFENlIwSGV3VzIvRmN6UjRNeVRTUUsyUlZOcDA3Z3RESHRjVjZYWUJScnhWZzRQZzJPNUk2YXZVOVFTSFc5OS9kQXdIUlkyYldkNXFXaS80U1hLUnBwT2hsVTNOek90Uk5TNlQ2Z1o5eHJHSU0iLCJtYWMiOiI1NWExNzc2Yzk0YzA2ZmIxYWEzZWM5NzM5ZWQyNmU4ZmNmZGQwNjM2YmViZWIxZDRmMzQwMjZkY2E0MmY4MjRjIn0%3D; shahada_tech_session=eyJpdiI6InVCYWVpQytKK3ZSMVduQm8xVUd1Znc9PSIsInZhbHVlIjoiOHdrcUFSOCtkQWxNeWFueDJFM0oyZnlzRmlNVXllMHRlRmFjam83MGFyUFZHZko3N2Z2S2FMMnFUOWpLSVB6emRwSUN5YkJmVHFnZXYzTTlNRVJyQ3NSazY3Z1p1dmxnZzZSS0FTNG81WU5rLzNzNDA4dTIzM21ubytyamNka2EiLCJtYWMiOiJjZDA3YjYzYmFmMDEwMWVjZjUzOTBmODI2MzRhMjhhNDg5M2Q3Y2E5NGYwMzViMDJjMWM2NDM5ZTZiOTcyMTE2In0%3D\",\"accept-language\":\"en-US,en;q=0.9,ar;q=0.8\",\"accept-encoding\":\"gzip, deflate\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"user-agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\",\"upgrade-insecure-requests\":\"1\",\"connection\":\"keep-alive\",\"host\":\"shehada_tech.test\",\"content-length\":\"\",\"content-type\":\"\"},\"payload\":[],\"session\":{\"_token\":\"t32KzmnxDnNDiGf9dDo8xatOc53VVyk4fwL0lNwz\",\"_flash\":{\"old\":[],\"new\":[]},\"url\":{\"intended\":\"http:\\/\\/shehada_tech.test\\/admin\"},\"_previous\":{\"url\":\"http:\\/\\/shehada_tech.test\\/admin\\/login\"},\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":200,\"response\":{\"view\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/..\\/resources\\/views\\/auth\\/login.blade.php\",\"data\":[]},\"duration\":278,\"memory\":8,\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:46'),
(35, '955ec02c-ca8b-4a17-a60b-5235449ddfe9', '955ec02d-6b8f-4af5-bcfb-c2c75043eafe', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.36\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:56'),
(36, '955ec02c-cecf-424c-a8bd-1b7096e0e036', '955ec02d-6b8f-4af5-bcfb-c2c75043eafe', NULL, 1, 'event', '{\"name\":\"Laravel\\\\Nova\\\\Events\\\\NovaServiceProviderRegistered\",\"payload\":null,\"listeners\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/PendingRouteRegistration.php[79:91]\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:56'),
(37, '955ec02d-36ab-4e88-8732-46571a13ddb4', '955ec02d-6b8f-4af5-bcfb-c2c75043eafe', NULL, 1, 'cache', '{\"type\":\"missed\",\"key\":\"admin@gmail.com|127.0.0.1\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:56'),
(38, '955ec02d-37ea-4e4d-99ac-917a1038457b', '955ec02d-6b8f-4af5-bcfb-c2c75043eafe', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `admins` where `email` = \'admin@gmail.com\' limit 1\",\"time\":\"0.69\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/Http\\/Middleware\\/RedirectIfAuthenticated.php\",\"line\":25,\"hash\":\"0b1e37fc6482f6b003de3251f34064ca\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:56'),
(39, '955ec02d-6ad1-4544-86be-e0e235097c3d', '955ec02d-6b8f-4af5-bcfb-c2c75043eafe', NULL, 1, 'debugbar', '{\"requestId\":\"X63892485211115258e6d8e126127dc58\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:56'),
(40, '955ec02d-6b3c-458b-9603-b7f250691d81', '955ec02d-6b8f-4af5-bcfb-c2c75043eafe', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\\/login\",\"method\":\"POST\",\"controller_action\":\"Laravel\\\\Nova\\\\Http\\\\Controllers\\\\LoginController@login\",\"middleware\":[\"web\",\"nova.guest:admin\"],\"headers\":{\"cookie\":\"XSRF-TOKEN=eyJpdiI6IkE4TzRCb0w4a05pZklCMWwzL05VUXc9PSIsInZhbHVlIjoiUUVISGU1dCtWR1RYQm1yUmRvWDBWaFd6KzJrSTg1N3VCejVINlZpckU3VGpML3JEQkRzejRjNi9kNDVMV3dOa2xva04wWXhyTEhOUGlxV2MvaFVjd3VsNWx5N2FtUnFoV2pnY1hrS1R2ZkFlcGRCdEpyNzdocnNVMmp1N2FaYlMiLCJtYWMiOiIxOGRkMWFlZTEzZjcwMjRmNzI1NjNiZWEwNmJkMGMwZTVkODFjZWRkMTkwOTkzNmNlNDhlZGZjNjkwODU5M2Q1In0%3D; shahada_tech_session=eyJpdiI6Ii9iVXBjVnkvbmFDQTFpZk9WVGFrT2c9PSIsInZhbHVlIjoiZkY5Ym8xWXM3enpscm1teXZFSzR5ZEN1Z0FGOUEreGNRYkxUaURRRlpWcmdNS0tRWW5qamVGenkyMFkxY1p1L1lnOUlqNDNBb2NXVEJNQ3pwWS8ycm54MmpQZnVBRlV3QWhNdy9qTE5UZmxxdk5yWmhvVHNFbGtXZDcyRmJiUUwiLCJtYWMiOiI4YjA2MjYwMWYzMmY2MjQ2ZGE0NDYxYmI0ZTk0MjI0OThhNWVjNzllZTlkNzdjNWM1ODc1ODEyODkzM2YwMGY2In0%3D\",\"accept-language\":\"en-US,en;q=0.9,ar;q=0.8\",\"accept-encoding\":\"gzip, deflate\",\"referer\":\"http:\\/\\/shehada_tech.test\\/admin\\/login\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"user-agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\",\"content-type\":\"application\\/x-www-form-urlencoded\",\"origin\":\"http:\\/\\/shehada_tech.test\",\"upgrade-insecure-requests\":\"1\",\"cache-control\":\"max-age=0\",\"content-length\":\"87\",\"connection\":\"keep-alive\",\"host\":\"shehada_tech.test\"},\"payload\":{\"_token\":\"t32KzmnxDnNDiGf9dDo8xatOc53VVyk4fwL0lNwz\",\"email\":\"admin@gmail.com\",\"password\":\"********\"},\"session\":{\"_token\":\"bInYhjH7wq4f8HecyKPkZUagl2FjXxFSnGf9zuUw\",\"_flash\":{\"old\":[],\"new\":[]},\"url\":[],\"_previous\":{\"url\":\"http:\\/\\/shehada_tech.test\\/admin\\/login\"},\"login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d\":1,\"PHPDEBUGBAR_STACK_DATA\":{\"X63892485211115258e6d8e126127dc58\":null}},\"response_status\":302,\"response\":\"Redirected to http:\\/\\/shehada_tech.test\\/admin\",\"duration\":435,\"memory\":6,\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:56'),
(41, '955ec02d-759b-4e92-ae62-ed2b594d20c2', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.44\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:56'),
(42, '955ec02d-78f7-405d-9259-08f3e1614ea7', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'event', '{\"name\":\"Laravel\\\\Nova\\\\Events\\\\NovaServiceProviderRegistered\",\"payload\":null,\"listeners\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/PendingRouteRegistration.php[79:91]\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:56'),
(43, '955ec02d-7e8d-45a2-9fcd-cbcb4786e8ac', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `admins` where `id` = 1 limit 1\",\"time\":\"0.61\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/Http\\/Middleware\\/Authenticate.php\",\"line\":31,\"hash\":\"7f9f4d7e04190956dac445c21d68a2d2\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:56'),
(44, '955ec02d-93a7-49fc-90d0-94f66289415c', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'event', '{\"name\":\"Laravel\\\\Nova\\\\Events\\\\ServingNova\",\"payload\":{\"request\":{\"class\":\"Illuminate\\\\Http\\\\Request\",\"properties\":{\"attributes\":[],\"request\":[],\"query\":[],\"server\":[],\"files\":[],\"cookies\":[],\"headers\":[]}}},\"listeners\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova-components\\/Settings\\/src\\/ToolServiceProvider.php[26:28]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/benjaminhirsch\\/nova-slug-field\\/src\\/FieldServiceProvider.php[21:24]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/davidpiesse\\/nova-audio\\/src\\/FieldServiceProvider.php[18:21]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/digital-creative\\/conditional-container\\/src\\/ConditionalContainerServiceProvider.php[20:22]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/digital-creative\\/custom-relationship-field\\/src\\/CustomRelationshipFieldServiceProvider.php[18:20]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/digital-creative\\/nova-json-wrapper\\/src\\/JsonWrapperServiceProvider.php[18:20]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/digitalcloud\\/multilingual-nova\\/src\\/FieldServiceProvider.php[27:31]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/dillingham\\/nova-attach-many\\/src\\/Providers\\/FieldServiceProvider.php[18:20]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/ebess\\/advanced-nova-media-library\\/src\\/AdvancedNovaMediaLibraryServiceProvider.php[22:24]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/ek0519\\/quilljs\\/src\\/FieldServiceProvider.php[34:37]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/emilianotisato\\/nova-tinymce\\/src\\/FieldServiceProvider.php[27:31]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/ericlagarda\\/novalinkresource\\/src\\/ToolServiceProvider.php[20:22]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/inspheric\\/nova-url-field\\/src\\/UrlFieldServiceProvider.php[18:20]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/jackabox\\/nova-duplicate-field\\/src\\/FieldServiceProvider.php[19:21]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/khalin\\/nova-link-field\\/src\\/FieldServiceProvider.php[18:21]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/kirschbaum-development\\/nova-inline-relationship\\/src\\/NovaInlineRelationshipServiceProvider.php[21:24]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/markrassamni\\/inline-boolean\\/src\\/FieldServiceProvider.php[18:21]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/mrmonat\\/nova-translatable\\/src\\/FieldServiceProvider.php[18:21]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/owenmelbz\\/nova-radio-field\\/src\\/FieldServiceProvider.php[18:21]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/saumini\\/count\\/src\\/FieldServiceProvider.php[18:21]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/timothyasp\\/nova-color-field\\/src\\/FieldServiceProvider.php[18:21]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/yassi\\/nova-nested-form\\/src\\/FieldServiceProvider.php[18:20]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/NovaApplicationServiceProvider.php[22:29]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/NovaServiceProvider.php[29:31]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/NovaServiceProvider.php[76:78]\",\"queued\":false},{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/NovaServiceProvider.php[158:175]\",\"queued\":false}],\"broadcast\":false,\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(45, '955ec02d-93f9-40df-a6d5-0eb83f47540d', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'view', '{\"name\":\"nova::router\",\"path\":\"\\/nova\\/src\\/..\\/resources\\/views\\/router.blade.php\",\"data\":[\"user\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(46, '955ec02d-9481-4717-93f2-79be918f345e', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'view', '{\"name\":\"nova::layout\",\"path\":\"\\/resources\\/views\\/vendor\\/nova\\/layout.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"user\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(47, '955ec02d-959e-4e92-a12d-ae2053f0b6f5', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'view', '{\"name\":\"nova::partials.meta\",\"path\":\"\\/resources\\/views\\/vendor\\/nova\\/partials\\/meta.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"user\",\"__currentLoopData\",\"path\",\"name\",\"loop\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(48, '955ec02d-95f7-4eac-aaf6-e9271905fdab', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'view', '{\"name\":\"nova::partials.logo\",\"path\":\"\\/resources\\/views\\/vendor\\/nova\\/partials\\/logo.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"user\",\"__currentLoopData\",\"path\",\"name\",\"loop\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(49, '955ec02d-9635-4177-b55b-f825c5507e1d', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'view', '{\"name\":\"nova::dashboard.navigation\",\"path\":\"\\/nova\\/src\\/..\\/resources\\/views\\/dashboard\\/navigation.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(50, '955ec02d-c1fe-43c0-a885-bfb3b1ac8a48', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'view', '{\"name\":\"nova::resources.navigation\",\"path\":\"\\/nova\\/src\\/..\\/resources\\/views\\/resources\\/navigation.blade.php\",\"data\":[\"navigation\",\"groups\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(51, '955ec02d-c306-46f1-b7a8-e0f3ad78e813', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'view', '{\"name\":\"settings::navigation\",\"path\":\"\\/nova-components\\/Settings\\/src\\/..\\/resources\\/views\\/navigation.blade.php\",\"data\":[],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(52, '955ec02d-c3ab-446e-8a38-1d75d2251fa0', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'view', '{\"name\":\"nova::partials.user\",\"path\":\"\\/resources\\/views\\/vendor\\/nova\\/partials\\/user.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"user\",\"__currentLoopData\",\"path\",\"name\",\"loop\",\"tool\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(53, '955ec02d-c435-4428-bcce-981785fb381a', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'view', '{\"name\":\"nova::partials.footer\",\"path\":\"\\/resources\\/views\\/vendor\\/nova\\/partials\\/footer.blade.php\",\"data\":[\"bodyClass\",\"activeClass\",\"authLayout\",\"withoutHeader\",\"settings\",\"user\",\"__currentLoopData\",\"path\",\"name\",\"loop\",\"tool\"],\"composers\":[{\"name\":\"Closure at \\/Volumes\\/Storage\\/projects\\/shehada_tech\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[210:215]\",\"type\":\"composer\"}],\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(54, '955ec02d-c952-4582-815b-935061bf2e29', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'debugbar', '{\"requestId\":\"Xf9f0c66e93f8d33ff2c9c1f5a1971352\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:56'),
(55, '955ec02d-c9d0-4a11-9b6e-3733c6efb492', '955ec02d-cab3-47f9-ac4b-9523ddf323c4', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/admin\",\"method\":\"GET\",\"controller_action\":\"Laravel\\\\Nova\\\\Http\\\\Controllers\\\\RouterController@show\",\"middleware\":[\"web\",\"Laravel\\\\Nova\\\\Http\\\\Middleware\\\\Authenticate\",\"Laravel\\\\Nova\\\\Http\\\\Middleware\\\\DispatchServingNovaEvent\",\"Laravel\\\\Nova\\\\Http\\\\Middleware\\\\BootTools\",\"Laravel\\\\Nova\\\\Http\\\\Middleware\\\\Authorize\"],\"headers\":{\"cookie\":\"XSRF-TOKEN=eyJpdiI6IjJxeWt5MkZPYTV3YnVnSlhKTU93RGc9PSIsInZhbHVlIjoiMDNtWlA4K0RwOWc5ZFR5dVA0UG5SanBJVEZsek56TGQ1RTJnUlJHZmx6R1pzNEErS1Znc2hXWm13OUExL1V0YWV6ZEpYL2V0cHV2VVdhckVZTTF0bmlpb0wxMU5HNkQ3M2FCS1k1bEVQSERFMU5pYTV1MEpOVDNkMjhYUjZoQ2EiLCJtYWMiOiJmN2FkMzNhM2U3Y2NlMzhmNzgyMDFlODY0MGJkYzgyNDUxZWRkMTI1YzZiZWIyZTUxMTliMDRhZmE4MTcyMjQxIn0%3D; shahada_tech_session=eyJpdiI6ImNUaXR1SGowTUw0S2wyaVUrTHVGZkE9PSIsInZhbHVlIjoiY0JOZkwwQnFJZmlIT1hwVkZuakJnYUFqZmhmeXVKWERtaDZYdzdicndHS3JSY0JGRzdXYk9mcHFLaUM5RVZRZ3hOdGpHSlBtWXFsN2dEdytkZ1k5cFdGNi9iSWRtY2xZT21JdUFNWW1QalNVNmNIV3hzV25uRm5qOVVFaGN3Uy8iLCJtYWMiOiJkYmY0NTg5NWMwMTAwMzA2NTc1N2MzNmZjYWIzNzcxY2I1MjExMTc5ZWViNjU3MmE1ODg4Njg3OTg4NDliMzdhIn0%3D\",\"accept-language\":\"en-US,en;q=0.9,ar;q=0.8\",\"accept-encoding\":\"gzip, deflate\",\"referer\":\"http:\\/\\/shehada_tech.test\\/admin\\/login\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"user-agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\",\"upgrade-insecure-requests\":\"1\",\"cache-control\":\"max-age=0\",\"connection\":\"keep-alive\",\"host\":\"shehada_tech.test\",\"content-length\":\"\",\"content-type\":\"\"},\"payload\":[],\"session\":{\"_token\":\"bInYhjH7wq4f8HecyKPkZUagl2FjXxFSnGf9zuUw\",\"_flash\":{\"old\":[],\"new\":[]},\"url\":[],\"_previous\":{\"url\":\"http:\\/\\/shehada_tech.test\\/admin\"},\"login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d\":1,\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":200,\"response\":{\"view\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/nova\\/src\\/..\\/resources\\/views\\/router.blade.php\",\"data\":{\"user\":\"App\\\\Admin:1\"}},\"duration\":232,\"memory\":10,\"hostname\":\"macbooks-MBP\",\"user\":{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}}', '2022-01-16 14:03:56'),
(56, '955ec02e-207d-4fed-974e-d9ad4a239340', '955ec02e-212b-47cd-ba17-6def20bdf9d7', NULL, 1, 'debugbar', '{\"requestId\":\"X6a73cda1741c568d13c2890703797ffa\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(57, '955ec02e-208c-4031-a7ab-e2fa45728557', '955ec02e-2138-47bb-bcd0-c8f72db3c580', NULL, 1, 'debugbar', '{\"requestId\":\"Xddc4a6cbd55ed9970dfe4aaf2004ec0e\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(58, '955ec02e-2096-4ab7-ab46-eb31bb44ff2e', '955ec02e-21c3-453c-ad72-16053b00a10f', NULL, 1, 'debugbar', '{\"requestId\":\"X77e07d5d9b46ebe10cd2f22fb8cf7227\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(59, '955ec02e-84f2-4348-a6c1-dc36b2ae804f', '955ec02e-9463-43a5-969b-a54aea1d1f41', NULL, 1, 'debugbar', '{\"requestId\":\"X4c903a7cd4435a88eb273ba2fb47279f\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(60, '955ec02e-84f1-436d-86f2-a70722e5b88b', '955ec02e-9463-4f6a-8fa9-ef3f06a76991', NULL, 1, 'debugbar', '{\"requestId\":\"X96a5849ae69961bb1ee0f134f1abb7f5\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(61, '955ec02e-84a0-4c03-9551-a24ccf85d1a8', '955ec02e-9472-408f-9585-6f6783e76b8e', NULL, 1, 'debugbar', '{\"requestId\":\"Xb12c34ae0ea115d3ee59c8200fa55835\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(62, '955ec02e-c55c-41ec-8be8-398a7c51fba9', '955ec02e-c5f7-47b2-9843-5318291abc64', NULL, 1, 'debugbar', '{\"requestId\":\"Xce679b16b8a6b086ce71067bbef64770\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(63, '955ec02e-c559-48c4-9522-e3b504438a55', '955ec02e-c5f7-42e4-9a02-ca7e40772121', NULL, 1, 'debugbar', '{\"requestId\":\"X26df97230847a50f683b461c731ed4ae\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(64, '955ec02e-c55c-4f0c-aa6b-1e9b9f6ff1a8', '955ec02e-c676-4aaa-a8a5-3a54d6643dd7', NULL, 1, 'debugbar', '{\"requestId\":\"Xa5f7e739ad71925925f4c2eee6b6004b\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(65, '955ec02e-e7e0-4e55-a8c6-39ea72c404eb', '955ec02e-f7fa-4e1a-a46e-ade697b6c7a8', NULL, 1, 'debugbar', '{\"requestId\":\"X17ef651997ec69296f0f6589c0ee6c8e\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(66, '955ec02e-e7f5-465c-b57d-e004390ac21f', '955ec02e-f800-47f7-994e-08b371d3d26c', NULL, 1, 'debugbar', '{\"requestId\":\"Xd2f9dd9b6eb30cb163b1f3f372e34b27\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(67, '955ec02e-e7c0-4d3b-94fa-1b331c1615ae', '955ec02e-f7fa-43b5-a1d5-842e2253f3ed', NULL, 1, 'debugbar', '{\"requestId\":\"X37bea476ce9c0886ae76b2ab43befe28\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(68, '955ec02f-07b3-4c04-93b6-94a0c8c87cba', '955ec02f-0836-4e3b-99f4-76b75218b6f5', NULL, 1, 'debugbar', '{\"requestId\":\"Xf3ab5794928d5067f6805978db95d640\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(69, '955ec02f-2305-4b4b-99fe-c9c34fa50e94', '955ec02f-26f1-4ac0-9a13-fdf629519a68', NULL, 1, 'debugbar', '{\"requestId\":\"Xb86487988dccce8eacaa93bdbf6b9f23\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(70, '955ec02f-3881-4f0e-9450-a94975f05a8a', '955ec02f-3b25-4ac5-9af7-26333c154a57', NULL, 1, 'debugbar', '{\"requestId\":\"X5e7c81e203e7682c585b0521903b47e0\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(71, '955ec02f-4a12-4a79-9ea5-9cff10ee47f3', '955ec02f-4d69-4ae2-963f-7218613f635d', NULL, 1, 'debugbar', '{\"requestId\":\"X996656933591496f6f1cf290358c340d\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(72, '955ec02f-2324-450b-857f-19bc10de8b61', '955ec02f-5d68-42ae-ac17-5b63839b668d', NULL, 1, 'debugbar', '{\"requestId\":\"Xa41e20061e47dc4985c32f0c7b45a456\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(73, '955ec02f-5d56-4f6d-99e4-a2a10548c3b7', '955ec02f-7d79-4246-b9f9-efef846eb7c9', NULL, 1, 'debugbar', '{\"requestId\":\"Xd8bf4b9b056a67e00a912da3912addd4\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(74, '955ec02f-6d8a-4427-b4e2-51af55c92b4a', '955ec02f-818a-4fb0-83d4-479155270ec2', NULL, 1, 'debugbar', '{\"requestId\":\"X94f04379c6f4f44574833e676bef50db\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57');
INSERT INTO `telescope_entries` (`sequence`, `uuid`, `batch_id`, `family_hash`, `should_display_on_index`, `type`, `content`, `created_at`) VALUES
(75, '955ec02f-bf5d-44be-ab90-d0787c9c8fd2', '955ec02f-c236-447a-bb9d-e746f8e610a1', NULL, 1, 'debugbar', '{\"requestId\":\"X32509083961d55ed4fe7445b2a97b85e\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(76, '955ec02f-49a2-4dba-9108-7aac59cd16eb', '955ec02f-c430-4178-94f5-c8dc06b12d83', NULL, 1, 'debugbar', '{\"requestId\":\"Xd57b7d56ab393e5fe4376bb441f085ed\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:57'),
(77, '955ec02f-bf5d-4bc4-b638-d319be5972f9', '955ec02f-c6bc-4baa-aaa8-648408cc627d', NULL, 1, 'debugbar', '{\"requestId\":\"X6afd12da9eb38456d516dc6779123623\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(78, '955ec02f-dfe9-415b-ba94-a6888a36c009', '955ec02f-f831-4383-9d6c-8493f807c85d', NULL, 1, 'debugbar', '{\"requestId\":\"X1e754869d50e972f8202dfb269ab8146\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(79, '955ec02f-f327-41ad-80c1-c51da54f1fa3', '955ec030-17f5-4de5-8746-71987b117615', NULL, 1, 'debugbar', '{\"requestId\":\"Xd559cf1b3133e7a399597b6b95ea719c\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(80, '955ec02f-dea1-4b48-b987-bb7a9c19da37', '955ec030-287c-42c5-b2b5-bb40dab2c8fc', NULL, 1, 'debugbar', '{\"requestId\":\"Xf7ed31e75aa91ef6ac74b8421c51233b\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(81, '955ec030-4486-4247-91c6-7cb6efcfccc1', '955ec030-58fb-4ee9-bd47-80b03348a028', NULL, 1, 'debugbar', '{\"requestId\":\"Xe2553e49d3470dcf4cd59861db478f1e\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(82, '955ec030-6bbc-466a-a719-1442d49c6cba', '955ec030-6f62-47eb-b8d0-3f525a4c3a33', NULL, 1, 'debugbar', '{\"requestId\":\"X61187e6f54a079a8bd3d9767850416e3\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(83, '955ec030-4627-4fa5-af1d-097d3ae8fde5', '955ec030-8a90-4964-93ad-7c5f7b670800', NULL, 1, 'debugbar', '{\"requestId\":\"X008149b48c1bac738c440c41d74ae4ec\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(84, '955ec030-859b-4adf-8896-722142f6262a', '955ec030-aa68-4de7-abad-dd78a82833e8', NULL, 1, 'debugbar', '{\"requestId\":\"X5cef16f504350f119d982bf7e83a4262\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(85, '955ec030-bc76-4b2d-a79d-837e27e4e08c', '955ec030-bd1d-4102-8015-84abf07cce30', NULL, 1, 'debugbar', '{\"requestId\":\"X84167a3d3641cc60a4bc9a0f0228a939\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(86, '955ec030-8789-4767-be6f-cf28186c4643', '955ec030-dc66-4832-8eba-2b9d3303d7af', NULL, 1, 'debugbar', '{\"requestId\":\"X2903b21a7d79ab25c15c06d4b22a5e49\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(87, '955ec030-ebf2-4f0b-b4e1-73e16af54436', '955ec030-f43f-4e83-855b-a865533b8121', NULL, 1, 'debugbar', '{\"requestId\":\"Xbd70718a9bfc5b2751c089fe9f881cbc\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(88, '955ec031-07f6-48a2-8027-150317e707f5', '955ec031-0a1a-4403-a4f4-502141e21106', NULL, 1, 'debugbar', '{\"requestId\":\"Xc8789fbe76b4a03f9083fc7233596f1c\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(89, '955ec031-0823-45d6-bca3-e0cd6821a573', '955ec031-1660-488a-88f4-71ac61f84178', NULL, 1, 'debugbar', '{\"requestId\":\"X4d6cad33e2c4c9507e6dc55fcc60774e\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(90, '955ec031-07ba-4853-9a41-1d2966def97f', '955ec031-1710-4022-ba29-c7ae1717800f', NULL, 1, 'debugbar', '{\"requestId\":\"X03b5fdae5773674f79d7259fda25e582\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(91, '955ec030-d6a7-4add-99c1-8dd77fedae0c', '955ec031-3317-4469-9ab7-08c22d1f5e8f', NULL, 1, 'debugbar', '{\"requestId\":\"Xb7d2a608203b02349edecf20d9022e9f\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:58'),
(92, '955ec031-431a-4114-af66-661c18d2df92', '955ec031-48b1-48c5-9535-16fe57f82a35', NULL, 1, 'debugbar', '{\"requestId\":\"X912bb46b62a8f876b458041ba60c55fe\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(93, '955ec031-4434-4647-9de4-94094d9ffeb4', '955ec031-4c0a-42d2-b194-70b502bc2c48', NULL, 1, 'debugbar', '{\"requestId\":\"Xdd88b8fa0cb1212f44c07f4294cfbac0\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(94, '955ec031-2229-486e-b335-a2fdb9a4de72', '955ec031-5172-478a-a072-f110a84aaca6', NULL, 1, 'debugbar', '{\"requestId\":\"Xc4fcd3656a07f67a2c56402d6a7e5833\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(95, '955ec031-4349-4fe5-ae33-9f3acf9861d8', '955ec031-6669-4a81-b348-f47294638f16', NULL, 1, 'debugbar', '{\"requestId\":\"X6b3e266d84f6a7ff8777e4c5e4871e3a\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(96, '955ec031-4659-40f8-90f2-00eace60f039', '955ec031-702e-4f73-ab23-c8028a580be9', NULL, 1, 'debugbar', '{\"requestId\":\"X5ac39ae1ac227eac1b38e41e6bc07cfd\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(97, '955ec031-aa8b-4ed5-9fba-93c9bc11610f', '955ec031-abb0-4e52-9c98-a7d2d5b63b56', NULL, 1, 'debugbar', '{\"requestId\":\"Xfbed8b6333bf64328238625327ac0d0a\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(98, '955ec031-ab00-47a0-b39c-2251b405b0e0', '955ec031-adaf-4ddf-8e44-f605966cdcdf', NULL, 1, 'debugbar', '{\"requestId\":\"X375876a92b01a4e4373bafc57de2032c\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(99, '955ec031-aa6b-480a-8ddd-ea10b949e0ea', '955ec031-ae5f-4e2c-83cd-70feb83ce78b', NULL, 1, 'debugbar', '{\"requestId\":\"X9944fc19cff84fd4385e605ec8d124a3\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(100, '955ec031-aaf2-4b80-9581-00e5fb7c40fd', '955ec031-b230-4abf-9e5e-4b35840b07dc', NULL, 1, 'debugbar', '{\"requestId\":\"Xc495c2982db46546d6c8a8d5416e9b2d\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(101, '955ec031-ab69-4918-8f5d-a3ed3679b6c7', '955ec031-b3ca-467f-8260-4ec4e88f64bf', NULL, 1, 'debugbar', '{\"requestId\":\"X0747dc277feb22f767d6d8ab56e69828\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(102, '955ec031-c6d8-4eae-84a5-18589bec904b', '955ec031-d0b3-47cc-98b5-371d43e34ea7', NULL, 1, 'debugbar', '{\"requestId\":\"Xad7fcb101c78364199657e531e6c00c0\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(103, '955ec031-de05-4e41-b98a-678b3a2e2027', '955ec031-df9f-48a7-abe5-cdac26d43421', NULL, 1, 'debugbar', '{\"requestId\":\"X56f748472dee1c994be7ada5c3f6553c\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(104, '955ec031-ebd0-419f-9f46-e6a1bee7e17e', '955ec031-ef13-43eb-9e6f-54ae2c7d32a7', NULL, 1, 'debugbar', '{\"requestId\":\"X50c6bf7dee535d1a5dc7e6bf01b978b6\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(105, '955ec031-caa9-47ec-8220-9fb3b6212bbc', '955ec032-0a0b-47a8-9d09-23ec3593627f', NULL, 1, 'debugbar', '{\"requestId\":\"Xd45da722464150957f885ad8eed56289\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(106, '955ec031-cab1-4201-8806-9b01f4caca74', '955ec032-1b15-49e7-a112-9c11972cae37', NULL, 1, 'debugbar', '{\"requestId\":\"Xf37973b6b6e27ded82c5d2a7b32aed2b\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(107, '955ec032-2d09-4603-8a48-53e603b3b0ac', '955ec032-3369-43d8-9257-e2504578a1e0', NULL, 1, 'debugbar', '{\"requestId\":\"X1a39d1439959bd77e650cec10255cd39\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(108, '955ec032-2cb7-4ccd-943c-ab6b916ff95c', '955ec032-33ce-4898-b871-7001ec154b92', NULL, 1, 'debugbar', '{\"requestId\":\"X59642bef44e0bcd2d0ade2da33b82859\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(109, '955ec032-2ab6-4a63-8c6a-185e0e13661c', '955ec032-3b05-4209-be34-a409a8db0116', NULL, 1, 'debugbar', '{\"requestId\":\"X02a3fd3da441e6f684ceaa1aec5f434c\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(110, '955ec032-2cc4-4d35-b0e4-00eb4bafac7b', '955ec032-4443-4dd8-9cbf-c2f5ab0a549d', NULL, 1, 'debugbar', '{\"requestId\":\"X968280dd26aaabaa0ebb3a37bb64721d\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(111, '955ec032-5fbd-4a54-8179-8f0d1f22f94c', '955ec032-64fb-4e5b-bb81-8aab6fb25463', NULL, 1, 'debugbar', '{\"requestId\":\"X831ab63e55b2467f1653059bcce03ea4\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(112, '955ec032-5fb4-447d-b25c-5b8b2ef64113', '955ec032-6b54-41f4-b075-e073d354ede0', NULL, 1, 'debugbar', '{\"requestId\":\"Xf909510274e0312c7e05ca50001ae3d8\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:03:59'),
(113, '955ec032-d923-4cec-8d3c-44a8df44fab0', '955ec032-da27-438e-bc3c-8973456ddd04', NULL, 1, 'debugbar', '{\"requestId\":\"Xd092fe30e96fad4d12d244cd339d23c8\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:00'),
(114, '955ec033-3909-4cb6-bdc2-67140dfcdae6', '955ec033-3ad5-40f4-bf84-e7fefdc2d3a2', NULL, 1, 'debugbar', '{\"requestId\":\"Xd1b5fdab2724c99d3f441ff711f958c6\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:00'),
(115, '955ec033-3982-4584-9ae0-a08a1f4671ad', '955ec033-3ae4-4400-aae2-0965b31c7a2f', NULL, 1, 'debugbar', '{\"requestId\":\"Xaa58082b26d424a20a005c368e1e7c80\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:00'),
(116, '955ec033-38f7-4d83-9bbb-f79e9f81d408', '955ec033-3b08-4cee-bab5-70bde4001ade', NULL, 1, 'debugbar', '{\"requestId\":\"X4bf0f2776b5367b8e369273dcb936ab7\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:00'),
(117, '955ec033-5e9f-4cc3-af9a-db19a8ca1793', '955ec033-7bfc-480a-a0a4-3c50ee766a73', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.74\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:00'),
(118, '955ec033-5cba-4f81-a0fc-e0e9934924e4', '955ec033-7c3a-4fed-837e-492a6e923a04', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.52\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:00'),
(119, '955ec033-5cbd-4676-b0c2-18800e1a227d', '955ec033-7c3c-49b5-838f-925fc7cc0b53', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.52\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:00'),
(120, '955ec033-cf2a-464f-b0a1-41d0d9da3fbf', '955ec033-cfac-4515-b972-91d2d0ff39c9', NULL, 1, 'debugbar', '{\"requestId\":\"Xc7bb9ee69ae0d5ce9381c9d5c07671bd\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:00'),
(121, '955ec033-db1c-48f6-9b30-1bef0fe24cfa', '955ec033-ddf7-452d-b749-eab843ef17fe', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.56\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:00'),
(122, '955ec036-f7eb-439e-83d0-e364b2775e31', '955ec037-8195-4555-a5d4-6952d4b27927', NULL, 1, 'debugbar', '{\"requestId\":\"X0299ffd14122ca756939369be4424e3f\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:02'),
(123, '955ec038-3d1d-4cd2-9ff7-61983e8e6a7e', '955ec038-438e-49dd-adf4-bbd027c1d4c5', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.58\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:03'),
(124, '955ec037-e399-47b4-a299-121c3f8b0017', '955ec039-1cad-4553-8029-0190f83b2447', NULL, 1, 'debugbar', '{\"requestId\":\"Xcb67b96bc825fafe3c852fda11a4a60f\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:03'),
(125, '955ec039-4dee-4431-8b18-cb9600697c3b', '955ec039-56ae-4d6d-bcc5-129d22c1b8ab', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.49\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:04'),
(126, '955ec039-a972-483e-a3db-571ff52f5719', '955ec039-aa65-40d0-a44e-f28a0d237ce1', NULL, 1, 'debugbar', '{\"requestId\":\"X652c7806e868a58a514c090d52651a2b\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:04'),
(127, '955ec039-b8c4-4d6a-8d7f-900f8ae043b2', '955ec039-bd12-4466-8b77-cb300214114a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.41\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:04'),
(128, '955ec039-dec8-4b67-98c5-ea9efdb84876', '955ec039-ea49-4051-a011-a4ff7576ce5f', NULL, 1, 'debugbar', '{\"requestId\":\"X4170ffdcaa7e1a78ddff5d7186c7701a\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:04'),
(129, '955ec039-ee5f-4daf-86ce-d26883803b6a', '955ec039-f588-4822-9ed8-4f16210ead13', NULL, 1, 'debugbar', '{\"requestId\":\"Xf19d84c5b69feb2d230f70b92658697d\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:04'),
(130, '955ec039-f8ab-48c8-95bf-7216d3fea938', '955ec039-fcf8-4621-944a-c2025bd09ece', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.38\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:04'),
(131, '955ec03a-0336-4e24-bc4f-f1b004c0d28f', '955ec03a-068a-4119-9349-035978704d18', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.63\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:04'),
(132, '955ec03a-3759-42e3-a9b8-e1a60e473c6b', '955ec03a-38ea-4ad0-943c-1416951957d5', NULL, 1, 'debugbar', '{\"requestId\":\"X8c9a1a3f3a21ef5eb02b23bcebb6a847\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:05'),
(133, '955ec03a-4e5f-4fee-afa4-4b58a4843068', '955ec03a-54c1-437b-b318-f1e05b7faaa5', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.59\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:05'),
(134, '955ec03e-3eb0-4fd5-b912-7d2c438d02e7', '955ec03e-6bd6-4ae1-a331-07200c161f86', NULL, 1, 'debugbar', '{\"requestId\":\"X5cd6f145818c4bae149a1c63b40946f7\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:07'),
(135, '955ec03e-8136-4ce4-95f6-41f28266b7d2', '955ec03e-88bc-426c-a763-8ddea50b4c0c', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.59\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:07'),
(136, '955ec03e-5f87-4ccc-b28f-609af79b3a60', '955ec03e-8b1f-43a5-8ec5-519609864ca0', NULL, 1, 'debugbar', '{\"requestId\":\"X42537313536606d3e2e868ab7c1b4fbb\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:07'),
(137, '955ec03e-bbcc-4ab0-83a8-85fd01b25d9e', '955ec03e-c531-473b-a0fb-4aaee1705ab6', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.60\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:08'),
(138, '955ec03f-5c1b-4aa1-8326-7c98675e8f7f', '955ec03f-a961-4325-b357-85b5740110fb', NULL, 1, 'debugbar', '{\"requestId\":\"Xe2113810b8eb668bcb553cae93e46b55\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:08'),
(139, '955ec03f-6ccc-4ed6-8eeb-108d79a1a0b5', '955ec03f-b91d-4b1f-a2a0-a7621903abad', NULL, 1, 'debugbar', '{\"requestId\":\"Xd98235490b5f23f5779b842dd83fb8aa\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:08'),
(140, '955ec03f-c602-449d-bc8e-1362c2f0b526', '955ec03f-ccd7-4157-896c-b52b22b11c60', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.59\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:08'),
(141, '955ec03f-d93a-4aa6-9734-c1598cef5d44', '955ec03f-f33f-4645-9b63-2d012393c633', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.66\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:08'),
(142, '955ec041-15e7-4fe7-925a-2299abf9d4a1', '955ec041-4ef6-4503-bfd9-32fe391fd8b8', NULL, 1, 'debugbar', '{\"requestId\":\"X1db2be90d40bac76211c9214a1cff51e\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:09'),
(143, '955ec041-6021-483c-8984-bf0dd630016f', '955ec041-6747-4a1c-944c-ad769ab6f135', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.53\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:09'),
(144, '955ec041-b18f-47c4-a88e-084b54d00c18', '955ec041-fe57-42a4-a67e-2daf80413af9', NULL, 1, 'debugbar', '{\"requestId\":\"X35e479a8f45b44907a642552455e7388\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:09'),
(145, '955ec042-1310-4536-b966-949b5ea86922', '955ec042-1924-4abb-bfc0-5ae160af3fc4', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.78\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:10'),
(146, '955ec044-9510-4763-9595-4daec82ba26c', '955ec044-f5bc-47e2-ab99-874f76725696', NULL, 1, 'debugbar', '{\"requestId\":\"X645caddae681720c1cc205aeb0ee8bfa\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:11'),
(147, '955ec044-c54a-46f2-8e72-9945ee5f6223', '955ec045-3068-4222-b658-02727f4cab5a', NULL, 1, 'debugbar', '{\"requestId\":\"X97809848e549d108574dd605e1c7b698\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:11'),
(148, '955ec045-7663-4a84-af54-b4bc5eec860e', '955ec045-7ce3-4b37-a8b4-977b6c89333e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.82\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:12'),
(149, '955ec045-9014-4246-b89b-9a7b300280ca', '955ec045-9792-4fcc-9b64-e5c085463be5', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.55\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:12'),
(150, '955ec045-b0cb-4db3-a0c0-233f78de5770', '955ec046-1dd3-4e8c-8a0d-bbad2564c507', NULL, 1, 'debugbar', '{\"requestId\":\"X560eb65de33d090a438f0c8ef4f19284\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:12'),
(151, '955ec046-2d10-4654-888b-8a125996f8b1', '955ec046-322d-466b-ad50-46d48e332057', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.55\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:12'),
(152, '955ec045-de3f-4b32-aba7-d82ff9d509d1', '955ec046-6b33-46ea-8086-5036926d1d53', NULL, 1, 'debugbar', '{\"requestId\":\"X009ff59828de046e55389a2d37311278\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:12'),
(153, '955ec046-7ab2-4256-8c7f-14a8cb419a84', '955ec046-7fad-440c-aa31-7acae1da6160', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.56\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:13'),
(154, '955ec050-dd49-4efc-b929-5bd01c34add7', '955ec051-55b9-4351-b9bd-9bc60e8e3a7d', NULL, 1, 'debugbar', '{\"requestId\":\"Xf206f20608368d2cad7ad9d8bf0c61fa\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:19'),
(155, '955ec051-71f4-47b6-b49a-4a70899f5e3e', '955ec051-7293-42db-9997-9ad7787c2221', NULL, 1, 'debugbar', '{\"requestId\":\"X558fda31de4fa58eae0a8427ad6eb1da\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:20'),
(156, '955ec050-dd4e-4587-a209-839bd736bb40', '955ec051-76f1-4e8b-98b5-0f5d1f1da696', NULL, 1, 'debugbar', '{\"requestId\":\"Xccdd60ec17e23778956944b3fd8ef202\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:19'),
(157, '955ec052-1ad6-4aa9-a030-ca4a48a71eea', '955ec052-1ea6-4f54-a565-ae11e19e4119', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.51\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:20'),
(158, '955ec052-2681-4634-8744-fe693a43b016', '955ec052-2bb9-4968-8dee-4984c9333ec0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.39\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:20'),
(159, '955ec052-3596-46b2-abb2-f9abcfb1e369', '955ec052-3b0c-4025-b16f-c56b7ee881f7', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.55\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:20'),
(160, '955ec052-432e-4196-b0a7-8d26aa22d2ed', '955ec052-d2c5-498a-9270-013d7b75bf1f', NULL, 1, 'debugbar', '{\"requestId\":\"X3304eb6d8466fedc766e9be911894f73\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:20'),
(161, '955ec052-5333-43f2-89dd-5967e6113d51', '955ec053-259e-4e78-b08a-2c072d6eae36', NULL, 1, 'debugbar', '{\"requestId\":\"Xf8d0284aa3a439bc4b29a766d4f8f4a1\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:20'),
(162, '955ec053-39d0-49b1-94cc-227c5c0131ed', '955ec053-3eae-4543-b23b-e9a1d12dbe8d', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.81\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:21'),
(163, '955ec053-b3a6-4f8f-9eb5-03bfad676272', '955ec053-b681-4a92-89ac-696767afc298', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.47\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:21'),
(164, '955ec052-f13d-4630-a4d0-c73eccecc384', '955ec053-fbc7-4b8e-9db7-3ad7a605c13b', NULL, 1, 'debugbar', '{\"requestId\":\"Xf808ebbdb7fdb89d0deef372a8e6755f\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:21'),
(165, '955ec054-0614-47ec-b12f-8e3c3db108eb', '955ec054-090f-40e7-865a-04de0a73468b', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.49\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:21'),
(166, '955ec053-bdb9-4c78-bd29-9cd26201a274', '955ec054-9a42-4a9d-834d-ba7b7025f9f5', NULL, 1, 'debugbar', '{\"requestId\":\"X391d0c078070707ea557d281db54988f\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:21'),
(167, '955ec053-dcdf-4c51-b79b-a43c1462c533', '955ec054-b968-40b7-845b-0dda911c1481', NULL, 1, 'debugbar', '{\"requestId\":\"X694c2183ab1eb57089badd8722850007\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:21'),
(168, '955ec054-cdee-44b9-892b-a26e48257375', '955ec054-d3b2-4eec-be2f-0cff94220e7d', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.52\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:22'),
(169, '955ec054-b259-49fd-b09c-e81ad8380a07', '955ec055-4706-4acc-a35b-d45da0bfb675', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.41\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:22'),
(170, '955ec055-a974-4091-82fb-ab7ed4d4d9f7', '955ec056-0521-4dba-b097-4a44a59d653c', NULL, 1, 'debugbar', '{\"requestId\":\"X2e5192b94c00ac70f081356bc21b041b\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:23'),
(171, '955ec056-0e69-4808-81b0-4273e565f6c6', '955ec056-1269-4fd9-9429-3853e4ca0bff', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.44\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:23'),
(172, '955ec055-a974-45fb-972b-4014bb4b1c58', '955ec056-24ff-473b-96c1-7fe10b17e79e', NULL, 1, 'debugbar', '{\"requestId\":\"X45c5d66383f6c296f60ff4b2b22636cb\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:23'),
(173, '955ec056-9adc-47f7-a494-999e74338489', '955ec056-9d4b-4132-89d9-c9048abdefba', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.37\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:23'),
(174, '955ec056-8621-4056-baf0-45cac9630d03', '955ec057-11a8-41db-8ef0-ccfce60eb090', NULL, 1, 'debugbar', '{\"requestId\":\"Xbf749b67fc4354be76e3e62fa48799ee\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:23'),
(175, '955ec057-3e27-4d84-8572-eeda8448b1be', '955ec057-45c5-4511-ab43-8f2406552159', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.81\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:24'),
(176, '955ec057-d8ba-4874-bf73-d139c331deaf', '955ec058-3da8-43a8-828b-048f84cccd49', NULL, 1, 'debugbar', '{\"requestId\":\"Xb5e9d0c0fc788eba1d56d2906ea53de9\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:24'),
(177, '955ec058-496a-4495-9c80-f571295dfc65', '955ec058-4d4b-4946-9f76-d43a30eb04b3', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.49\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:24'),
(178, '955ec058-0f4f-4bd8-a504-83166766b22c', '955ec058-8e4e-46cc-9f0d-aea990f401c1', NULL, 1, 'debugbar', '{\"requestId\":\"Xc7b99b426ca5592a6a7e8a30d13d53a8\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:24'),
(179, '955ec058-9973-4d00-9b39-2209c2a2854a', '955ec058-9d5f-4f50-9842-9d85746971e4', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.38\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:24'),
(180, '955ec058-bcf3-4556-94c6-0b0e1a63fff6', '955ec059-4be9-4a16-a621-a94eeadcf863', NULL, 1, 'debugbar', '{\"requestId\":\"X4c1e711fae4c2e509954970867be348a\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:25'),
(181, '955ec059-61c2-4a57-b5e4-43c39d76bbb8', '955ec059-675d-4824-8451-30f44dca4b45', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.43\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:25'),
(182, '955ec059-2b9d-449b-84eb-502d15e60eb8', '955ec059-a810-45d1-be2f-ed34943e724d', NULL, 1, 'debugbar', '{\"requestId\":\"Xd219daf9fdaef033e35b8110d2a2f90c\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:25'),
(183, '955ec059-b804-47a8-8b7d-c409d91a5da2', '955ec059-bd25-419c-9196-c9e63503bd63', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.61\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:25'),
(184, '955ec058-cce3-47b0-931b-3a174d8e8a10', '955ec059-d701-40cd-ba26-6883ef7b0e9b', NULL, 1, 'debugbar', '{\"requestId\":\"X885394265d5991c479d7b76112977926\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:25'),
(185, '955ec059-e8a3-41e6-a4f1-4022df6b65c2', '955ec059-eb92-48cf-8d6c-ab3a5289a6d0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.48\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:25'),
(186, '955ec059-f8b9-4835-97bd-4185debe3a66', '955ec05a-93d1-4d76-ae2c-adbba4679dae', NULL, 1, 'debugbar', '{\"requestId\":\"X30e9557f107f79de2a284797c435d4f3\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:25'),
(187, '955ec05a-9ffc-48c4-9f75-8dfde26a7bfa', '955ec05a-a421-4a75-b95d-306404a4ea32', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.54\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:26'),
(188, '955ec05a-16e7-414d-a04a-9c883476a4f3', '955ec05a-a6ca-4dc4-b2e1-b1e4efc67243', NULL, 1, 'debugbar', '{\"requestId\":\"Xe128397674f7b7da1bc878c8e52f37ab\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:25'),
(189, '955ec05a-c083-4703-997c-9fbbcb1f1969', '955ec05a-c44c-4f9a-a775-24758cfe114b', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.49\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:26'),
(190, '955ec05a-466e-4823-867d-d64c2458aeda', '955ec05a-d382-4fe4-a725-375a3e406c03', NULL, 1, 'debugbar', '{\"requestId\":\"X7d8eeedb3eef35dc1f402927bd4718c0\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:26'),
(191, '955ec05a-e075-4212-8088-f73e6e67371f', '955ec05a-e31b-48d9-bfb0-7e885fedf40d', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.49\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:26'),
(192, '955ec05b-4226-4454-a5de-3b5a8ec4a429', '955ec05b-b07b-456d-81f8-f7efe7354885', NULL, 1, 'debugbar', '{\"requestId\":\"X42d7de328e4e37b4c0b513a07ff2926b\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:26'),
(193, '955ec05b-ba6b-4a15-8ef0-ab7081f7933b', '955ec05b-bdcf-4a9d-a770-70afcc40d88a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings`\",\"time\":\"0.39\",\"slow\":false,\"file\":\"\\/Volumes\\/Storage\\/projects\\/shehada_tech\\/app\\/Providers\\/AppServiceProvider.php\",\"line\":41,\"hash\":\"9a0c1b1878c6704a2df2ae90c2a24cef\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:27'),
(194, '955ec05e-725b-40c0-82bb-497d5c793048', '955ec05f-0633-41c5-954f-a75a93cdd1f1', NULL, 1, 'debugbar', '{\"requestId\":\"Xb91c35879c7057a9a7b4c84d0ce27916\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:28'),
(195, '955ec05e-d8ae-4bf4-b1c1-74c7237724ac', '955ec05f-9504-4efa-9a6b-bfb5c9e74fde', NULL, 1, 'debugbar', '{\"requestId\":\"Xff9a3f31d24781e00c052eb689a98f82\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:29'),
(196, '955ec05e-f82f-429b-889d-70573351d387', '955ec05f-a413-480c-b69a-2e6f015ae4a6', NULL, 1, 'debugbar', '{\"requestId\":\"X63b56e666af9186da87485e65e76da90\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:29'),
(197, '955ec060-42ba-436f-8377-20e365123193', '955ec060-ded5-4b74-b9e2-2ed4512207fd', NULL, 1, 'debugbar', '{\"requestId\":\"X212ccd1cbb2a51600d65da3f4b5a0e15\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:29'),
(198, '955ec060-626f-4338-ae80-69db863c55a4', '955ec061-2d5f-47d6-aab2-f413e0fcf522', NULL, 1, 'debugbar', '{\"requestId\":\"X3482ebc6cb07ae2f787f0da7d0a3ce70\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:30'),
(199, '955ec060-817a-4062-a702-8f216fa51d7a', '955ec061-5174-4993-8060-2eaf64c8286f', NULL, 1, 'debugbar', '{\"requestId\":\"X1d77bb9660d4294f4ab6b2b7dbaf9038\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:30'),
(200, '955ec061-000b-49c4-8b89-9026e4abc135', '955ec061-cae2-4016-af84-3f8408dc2740', NULL, 1, 'debugbar', '{\"requestId\":\"X2a7aa054e644ecd4af64522f9261017f\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:30'),
(201, '955ec061-eb2d-4394-9bc0-4b76c237f2d9', '955ec062-dce2-4454-b94e-fda93f254f35', NULL, 1, 'debugbar', '{\"requestId\":\"Xdf88a6a2c1bc8e4aa558cb4a24e2d987\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:31'),
(202, '955ec062-0a31-4f32-b9cf-8046bde11868', '955ec062-f7e2-4f4b-bda1-966853b2f2fc', NULL, 1, 'debugbar', '{\"requestId\":\"Xa51ac0050cb74f583d7f3623c7a0daca\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:31'),
(203, '955ec062-58ed-482a-9906-7104d2e3dbee', '955ec063-46d1-416b-bcd8-26bd14cff4c1', NULL, 1, 'debugbar', '{\"requestId\":\"X14cd69ed2f8bc9e27dd92112ddf1f996\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:31'),
(204, '955ec062-89ca-4114-bdde-4bdde8b7429b', '955ec063-7306-4c2b-8a7a-92c9a35508e4', NULL, 1, 'debugbar', '{\"requestId\":\"X28db61a6fdc67527ce7052800aa0eeac\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:31'),
(205, '955ec062-bd5e-4e8b-978e-1302d77e1874', '955ec063-a1e1-44ad-8b99-2254a5151843', NULL, 1, 'debugbar', '{\"requestId\":\"Xadc0dab991c494784c1863bd40793e40\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:31'),
(206, '955ec063-e450-4013-95ee-296b2d2b24fd', '955ec064-8f06-4ced-a077-81e8fbb5d3a2', NULL, 1, 'debugbar', '{\"requestId\":\"Xe9c2ce600599bccacdbd9a83755d4bac\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:32'),
(207, '955ec067-fb9d-4979-b86a-600fbb024790', '955ec068-497e-4cb8-a501-ad8d1c1043df', NULL, 1, 'debugbar', '{\"requestId\":\"X21d9dfce42f6153b60cd5c33d8b3561f\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:35'),
(208, '955ec067-fc2f-4ff3-b915-67311414c8d4', '955ec068-680d-4912-930f-633a760c8436', NULL, 1, 'debugbar', '{\"requestId\":\"X593367d5e456388f8dad49a170cf0aaa\",\"hostname\":\"macbooks-MBP\"}', '2022-01-16 14:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telescope_entries_tags`
--

INSERT INTO `telescope_entries_tags` (`entry_uuid`, `tag`) VALUES
('955ec02d-93a7-49fc-90d0-94f66289415c', 'Auth:1'),
('955ec02d-93f9-40df-a6d5-0eb83f47540d', 'Auth:1'),
('955ec02d-9481-4717-93f2-79be918f345e', 'Auth:1'),
('955ec02d-959e-4e92-a12d-ae2053f0b6f5', 'Auth:1'),
('955ec02d-95f7-4eac-aaf6-e9271905fdab', 'Auth:1'),
('955ec02d-9635-4177-b55b-f825c5507e1d', 'Auth:1'),
('955ec02d-c1fe-43c0-a885-bfb3b1ac8a48', 'Auth:1'),
('955ec02d-c306-46f1-b7a8-e0f3ad78e813', 'Auth:1'),
('955ec02d-c3ab-446e-8a38-1d75d2251fa0', 'Auth:1'),
('955ec02d-c435-4428-bcce-981785fb381a', 'Auth:1'),
('955ec02d-c9d0-4a11-9b6e-3733c6efb492', 'Auth:1');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `font_id` bigint(20) UNSIGNED DEFAULT NULL,
  `settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`settings`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `name`, `image`, `status`, `type_id`, `font_id`, `settings`, `created_at`, `updated_at`) VALUES
(1, NULL, 'certificate_img1.jpg', NULL, 1, 1, '{\"type_x\":1000,\"type_y\":380,\"type_size\":100,\"type_color\":\"#0F7B62\",\"type_word_x\":1150,\"type_word_y\":925,\"type_word_size\":58,\"type_word_color\":\"#5f605f\",\"student_name_x\":1000,\"student_name_y\":702,\"student_name_size\":100,\"student_name_color\":\"#0F7B62\",\"trainer_name_x\":0,\"trainer_name_y\":0,\"trainer_name_size\":50,\"trainer_name_color\":\"#0F7B62\",\"accreditation_no_x\":1550,\"accreditation_no_y\":835,\"accreditation_no_size\":35,\"accreditation_no_color\":\"#5f605f\",\"id_no_x\":590,\"id_no_y\":835,\"id_no_size\":35,\"id_no_color\":\"#5f605f\",\"title_x\":1000,\"title_y\":1060,\"title_size\":75,\"title_color\":\"#0F7B62\",\"subtitle_y\":1120,\"date_x\":1000,\"date_y\":1210,\"date_size\":42,\"date_color\":\"#5f605f\",\"days_x\":1358,\"days_y\":1278,\"days_size\":35,\"days_color\":\"#0F7B62\",\"hours_x\":1100,\"hours_y\":1278,\"hours_size\":42,\"hours_color\":\"#0F7B62\"}', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, NULL, 'certificate_img2.jpeg', NULL, 1, 2, '{\"type_x\":1000,\"type_y\":380,\"type_size\":100,\"type_color\":\"#0F7B62\",\"type_word_x\":1150,\"type_word_y\":925,\"type_word_size\":58,\"type_word_color\":\"#5f605f\",\"student_name_x\":1000,\"student_name_y\":702,\"student_name_size\":100,\"student_name_color\":\"#0F7B62\",\"trainer_name_x\":0,\"trainer_name_y\":0,\"trainer_name_size\":50,\"trainer_name_color\":\"#0F7B62\",\"accreditation_no_x\":1550,\"accreditation_no_y\":835,\"accreditation_no_size\":35,\"accreditation_no_color\":\"#5f605f\",\"id_no_x\":590,\"id_no_y\":835,\"id_no_size\":35,\"id_no_color\":\"#5f605f\",\"title_x\":1000,\"title_y\":1060,\"title_size\":75,\"title_color\":\"#0F7B62\",\"subtitle_y\":1120,\"date_x\":1000,\"date_y\":1210,\"date_size\":42,\"date_color\":\"#5f605f\",\"days_x\":1358,\"days_y\":1278,\"days_size\":35,\"days_color\":\"#0F7B62\",\"hours_x\":1100,\"hours_y\":1278,\"hours_size\":42,\"hours_color\":\"#0F7B62\"}', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(3, NULL, 'certificate_img3.png', NULL, 1, 1, '{\"type_x\":0,\"type_y\":0,\"type_size\":0,\"type_color\":\"#000000\",\"type_word_x\":0,\"type_word_y\":0,\"type_word_size\":0,\"type_word_color\":\"#000000\",\"student_name_x\":1000,\"student_name_y\":1130,\"student_name_size\":110,\"student_name_color\":\"#007b76\",\"trainer_name_x\":0,\"trainer_name_y\":0,\"trainer_name_size\":0,\"trainer_name_color\":\"#000000\",\"accreditation_no_x\":0,\"accreditation_no_y\":0,\"accreditation_no_size\":0,\"accreditation_no_color\":\"#000000\",\"id_no_x\":1655,\"id_no_y\":1285,\"id_no_size\":45,\"id_no_color\":\"#000000\",\"title_x\":0,\"title_y\":0,\"title_size\":0,\"title_color\":\"#007b76\",\"subtitle_y\":0,\"date_x\":0,\"date_y\":0,\"date_size\":0,\"date_color\":\"#000000\",\"days_x\":0,\"days_y\":0,\"days_size\":0,\"days_color\":\"#000000\",\"hours_x\":0,\"hours_y\":0,\"hours_size\":0,\"hours_color\":\"#000000\"}', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(4, NULL, 'ads_img1.png', NULL, 2, 1, '{\"title_size\":\"40\",\"trainer_size\":\"30\",\"trainer_about_size\":\"25\",\"price_size\":\"50\",\"currency_size\":\"40\",\"type_size\":\"16\",\"mobile_size\":\"22\",\"whatsapp_size\":\"22\",\"hours_no_size\":\"22\",\"date_size\":\"16\",\"place_size\":\"18\",\"axes_size\":\"18\",\"features_size\":\"18\",\"time_size\":\"18\"}', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(5, NULL, 'ads_img2.png', NULL, 2, 2, '{\"title_size\":\"40\",\"trainer_size\":\"30\",\"trainer_about_size\":\"25\",\"price_size\":\"50\",\"currency_size\":\"40\",\"type_size\":\"16\",\"mobile_size\":\"22\",\"whatsapp_size\":\"22\",\"hours_no_size\":\"22\",\"date_size\":\"16\",\"place_size\":\"18\",\"axes_size\":\"18\",\"features_size\":\"18\",\"time_size\":\"18\"}', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'شهادة', '2022-01-16 12:03:34', '2022-01-16 12:03:34'),
(2, 'اعلان', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_licence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_register` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_licence_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_register_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_manager` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_manager_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_manager_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL,
  `reset_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT NULL,
  `social_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social_links`)),
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `name_en`, `email`, `email_verified_at`, `password`, `mobile`, `member_no`, `country_id`, `city_id`, `region`, `manager_name`, `training_licence`, `commercial_register`, `training_licence_no`, `commercial_register_no`, `account_manager`, `account_manager_mobile`, `account_manager_email`, `image`, `logo`, `status`, `reset_code`, `is_completed`, `social_links`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'التقنية للمعلومات', 'Techno', 'user@gmail.com', '2022-01-16 12:03:34', '$2y$10$WyeMhu6UwD35hch95fholeR.njiuyl068/mf6n8OPFsIqfKRU4.Ey', '0599100200', NULL, 171, 3, 'Gaza', 'Ahmad', 'license.jpg', 'license.jpg', '112233', '102030', 'Ahmad', '0599100200', 'ahmad@gmail.com', 'user-img1.jpg', NULL, 1, NULL, 1, '{\"website\":\"http:\\/\\/google.com\",\"twitter\":\"http:\\/\\/twitter.com\"}', 'pb1ADCzqCY', '2022-01-16 12:03:34', '2022-01-16 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_permits`
--

CREATE TABLE `user_permits` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permits`
--

INSERT INTO `user_permits` (`user_id`, `permit_id`, `created_at`, `updated_at`) VALUES
(1, 4, '2022-01-16 12:03:34', '2022-01-16 12:03:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_events`
--
ALTER TABLE `action_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_events_actionable_type_actionable_id_index` (`actionable_type`,`actionable_id`),
  ADD KEY `action_events_batch_id_model_type_model_id_index` (`batch_id`,`model_type`,`model_id`),
  ADD KEY `action_events_user_id_index` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admins_password_resets`
--
ALTER TABLE `admins_password_resets`
  ADD KEY `admins_password_resets_email_index` (`email`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_media_id_foreign` (`media_id`),
  ADD KEY `ads_ads_type_id_foreign` (`ads_type_id`),
  ADD KEY `ads_target_id_foreign` (`target_id`),
  ADD KEY `ads_template_id_foreign` (`template_id`),
  ADD KEY `ads_font_id_foreign` (`font_id`),
  ADD KEY `ads_user_id_foreign` (`user_id`),
  ADD KEY `ads_editor_id_foreign` (`editor_id`);

--
-- Indexes for table `ads_contents`
--
ALTER TABLE `ads_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_contents_ads_id_foreign` (`ads_id`);

--
-- Indexes for table `ads_features`
--
ALTER TABLE `ads_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_features_ads_id_foreign` (`ads_id`);

--
-- Indexes for table `ads_requests`
--
ALTER TABLE `ads_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `ads_times`
--
ALTER TABLE `ads_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_times_ads_id_foreign` (`ads_id`);

--
-- Indexes for table `ads_types`
--
ALTER TABLE `ads_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_transfers_bank_id_foreign` (`bank_id`),
  ADD KEY `bank_transfers_user_id_foreign` (`user_id`),
  ADD KEY `bank_transfers_editor_id_foreign` (`editor_id`),
  ADD KEY `bank_transfers_package_id_foreign` (`package_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cards_template_id_foreign` (`template_id`),
  ADD KEY `cards_font_id_foreign` (`font_id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_language_id_foreign` (`language_id`),
  ADD KEY `certificates_certificate_type_id_foreign` (`certificate_type_id`),
  ADD KEY `certificates_template_id_foreign` (`template_id`),
  ADD KEY `certificates_user_id_foreign` (`user_id`),
  ADD KEY `certificates_editor_id_foreign` (`editor_id`);

--
-- Indexes for table `certificate_requests`
--
ALTER TABLE `certificate_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificate_requests_user_id_foreign` (`user_id`),
  ADD KEY `certificate_requests_editor_id_foreign` (`editor_id`);

--
-- Indexes for table `certificate_students`
--
ALTER TABLE `certificate_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificate_students_certificate_id_foreign` (`certificate_id`),
  ADD KEY `certificate_students_user_id_foreign` (`user_id`);

--
-- Indexes for table `certificate_types`
--
ALTER TABLE `certificate_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_services`
--
ALTER TABLE `design_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_sub_services`
--
ALTER TABLE `design_sub_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `design_sub_services_design_service_id_foreign` (`design_service_id`);

--
-- Indexes for table `editors`
--
ALTER TABLE `editors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `editors_user_id_foreign` (`user_id`);

--
-- Indexes for table `editor_permits`
--
ALTER TABLE `editor_permits`
  ADD PRIMARY KEY (`editor_id`,`permit_id`),
  ADD KEY `editor_permits_permit_id_foreign` (`permit_id`);

--
-- Indexes for table `editor_requests`
--
ALTER TABLE `editor_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `editor_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fonts`
--
ALTER TABLE `fonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_pending_trix_attachments`
--
ALTER TABLE `nova_pending_trix_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nova_pending_trix_attachments_draft_id_index` (`draft_id`);

--
-- Indexes for table `nova_trix_attachments`
--
ALTER TABLE `nova_trix_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nova_trix_attachments_attachable_type_attachable_id_index` (`attachable_type`,`attachable_id`),
  ADD KEY `nova_trix_attachments_url_index` (`url`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_paymentable_type_paymentable_id_index` (`paymentable_type`,`paymentable_id`),
  ADD KEY `payments_status_id_foreign` (`status_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_payment_type_id_foreign` (`payment_type_id`);

--
-- Indexes for table `payment_cards`
--
ALTER TABLE `payment_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_cards_package_id_foreign` (`package_id`),
  ADD KEY `payment_cards_user_id_foreign` (`user_id`),
  ADD KEY `payment_cards_editor_id_foreign` (`editor_id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permits`
--
ALTER TABLE `permits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_designs`
--
ALTER TABLE `special_designs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `special_designs_design_service_id_foreign` (`design_service_id`),
  ADD KEY `special_designs_user_id_foreign` (`user_id`);

--
-- Indexes for table `special_design_requests`
--
ALTER TABLE `special_design_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `special_design_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `special_design_services`
--
ALTER TABLE `special_design_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `special_design_services_special_design_id_foreign` (`special_design_id`),
  ADD KEY `special_design_services_special_design_sub_service_id_foreign` (`special_design_sub_service_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `templates_type_id_foreign` (`type_id`),
  ADD KEY `templates_font_id_foreign` (`font_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_city_id_foreign` (`city_id`);

--
-- Indexes for table `user_permits`
--
ALTER TABLE `user_permits`
  ADD PRIMARY KEY (`user_id`,`permit_id`),
  ADD KEY `user_permits_permit_id_foreign` (`permit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_events`
--
ALTER TABLE `action_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads_contents`
--
ALTER TABLE `ads_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads_features`
--
ALTER TABLE `ads_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads_requests`
--
ALTER TABLE `ads_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads_times`
--
ALTER TABLE `ads_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads_types`
--
ALTER TABLE `ads_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_requests`
--
ALTER TABLE `certificate_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_students`
--
ALTER TABLE `certificate_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_types`
--
ALTER TABLE `certificate_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `design_services`
--
ALTER TABLE `design_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `design_sub_services`
--
ALTER TABLE `design_sub_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `editors`
--
ALTER TABLE `editors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `editor_requests`
--
ALTER TABLE `editor_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fonts`
--
ALTER TABLE `fonts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `nova_pending_trix_attachments`
--
ALTER TABLE `nova_pending_trix_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nova_trix_attachments`
--
ALTER TABLE `nova_trix_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_cards`
--
ALTER TABLE `payment_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permits`
--
ALTER TABLE `permits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `special_designs`
--
ALTER TABLE `special_designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special_design_requests`
--
ALTER TABLE `special_design_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special_design_services`
--
ALTER TABLE `special_design_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ads_type_id_foreign` FOREIGN KEY (`ads_type_id`) REFERENCES `ads_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ads_editor_id_foreign` FOREIGN KEY (`editor_id`) REFERENCES `editors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ads_font_id_foreign` FOREIGN KEY (`font_id`) REFERENCES `fonts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ads_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ads_target_id_foreign` FOREIGN KEY (`target_id`) REFERENCES `targets` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ads_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `ads_contents`
--
ALTER TABLE `ads_contents`
  ADD CONSTRAINT `ads_contents_ads_id_foreign` FOREIGN KEY (`ads_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ads_features`
--
ALTER TABLE `ads_features`
  ADD CONSTRAINT `ads_features_ads_id_foreign` FOREIGN KEY (`ads_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ads_requests`
--
ALTER TABLE `ads_requests`
  ADD CONSTRAINT `ads_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `ads_times`
--
ALTER TABLE `ads_times`
  ADD CONSTRAINT `ads_times_ads_id_foreign` FOREIGN KEY (`ads_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  ADD CONSTRAINT `bank_transfers_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bank_transfers_editor_id_foreign` FOREIGN KEY (`editor_id`) REFERENCES `editors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bank_transfers_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bank_transfers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_font_id_foreign` FOREIGN KEY (`font_id`) REFERENCES `fonts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cards_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_certificate_type_id_foreign` FOREIGN KEY (`certificate_type_id`) REFERENCES `certificate_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `certificates_editor_id_foreign` FOREIGN KEY (`editor_id`) REFERENCES `editors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `certificates_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `certificates_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `certificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `certificate_requests`
--
ALTER TABLE `certificate_requests`
  ADD CONSTRAINT `certificate_requests_editor_id_foreign` FOREIGN KEY (`editor_id`) REFERENCES `editors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `certificate_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `certificate_students`
--
ALTER TABLE `certificate_students`
  ADD CONSTRAINT `certificate_students_certificate_id_foreign` FOREIGN KEY (`certificate_id`) REFERENCES `certificates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificate_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `design_sub_services`
--
ALTER TABLE `design_sub_services`
  ADD CONSTRAINT `design_sub_services_design_service_id_foreign` FOREIGN KEY (`design_service_id`) REFERENCES `design_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `editors`
--
ALTER TABLE `editors`
  ADD CONSTRAINT `editors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `editor_permits`
--
ALTER TABLE `editor_permits`
  ADD CONSTRAINT `editor_permits_editor_id_foreign` FOREIGN KEY (`editor_id`) REFERENCES `editors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `editor_permits_permit_id_foreign` FOREIGN KEY (`permit_id`) REFERENCES `permits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `editor_requests`
--
ALTER TABLE `editor_requests`
  ADD CONSTRAINT `editor_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_payment_type_id_foreign` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payments_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `payment_cards`
--
ALTER TABLE `payment_cards`
  ADD CONSTRAINT `payment_cards_editor_id_foreign` FOREIGN KEY (`editor_id`) REFERENCES `editors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payment_cards_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payment_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `special_designs`
--
ALTER TABLE `special_designs`
  ADD CONSTRAINT `special_designs_design_service_id_foreign` FOREIGN KEY (`design_service_id`) REFERENCES `design_services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `special_designs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `special_design_requests`
--
ALTER TABLE `special_design_requests`
  ADD CONSTRAINT `special_design_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `special_design_services`
--
ALTER TABLE `special_design_services`
  ADD CONSTRAINT `special_design_services_special_design_id_foreign` FOREIGN KEY (`special_design_id`) REFERENCES `special_designs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `special_design_services_special_design_sub_service_id_foreign` FOREIGN KEY (`special_design_sub_service_id`) REFERENCES `design_sub_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;

--
-- Constraints for table `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `templates_font_id_foreign` FOREIGN KEY (`font_id`) REFERENCES `fonts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `templates_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_permits`
--
ALTER TABLE `user_permits`
  ADD CONSTRAINT `user_permits_permit_id_foreign` FOREIGN KEY (`permit_id`) REFERENCES `permits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_permits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
