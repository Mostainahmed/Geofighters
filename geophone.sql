-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 05:23 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geophone`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allowance_city_to_city_per_day`
--

CREATE TABLE `tbl_allowance_city_to_city_per_day` (
  `id` int(10) NOT NULL,
  `designation_id` int(10) NOT NULL,
  `designation_name` varchar(40) NOT NULL,
  `transport_mode` varchar(50) NOT NULL,
  `hotel_rent_dhaka` decimal(10,2) NOT NULL,
  `divisional_hotel_rent` decimal(10,2) NOT NULL,
  `other_hotel_rent` decimal(10,2) NOT NULL,
  `no_voucher_rent_inside_dhaka` decimal(10,2) NOT NULL,
  `no_voucher_house_rent_divisional` decimal(10,2) NOT NULL,
  `no_voucher_house_rent_others` decimal(10,2) NOT NULL,
  `daily_food_allowance_for_travel` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_allowance_city_to_city_per_day`
--

INSERT INTO `tbl_allowance_city_to_city_per_day` (`id`, `designation_id`, `designation_name`, `transport_mode`, `hotel_rent_dhaka`, `divisional_hotel_rent`, `other_hotel_rent`, `no_voucher_rent_inside_dhaka`, `no_voucher_house_rent_divisional`, `no_voucher_house_rent_others`, `daily_food_allowance_for_travel`) VALUES
(1, 1, 'RSM', 'AC Bus, AC Train, AC Steamer ', '1500.00', '1200.00', '800.00', '700.00', '500.00', '400.00', '400.00'),
(2, 2, 'ASM', 'Non AC Bus, AC Train', '1400.00', '1000.00', '800.00', '600.00', '500.00', '400.00', '250.00'),
(3, 3, 'TSE', 'Non AC Bus, Chair Coach Train', '1200.00', '800.00', '700.00', '500.00', '400.00', '300.00', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allowance_within_city`
--

CREATE TABLE `tbl_allowance_within_city` (
  `id` int(10) NOT NULL,
  `designation_id` int(10) NOT NULL,
  `designation_name` varchar(40) NOT NULL,
  `mode_of_transport` varchar(50) NOT NULL,
  `daily_food_allowance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_allowance_within_city`
--

INSERT INTO `tbl_allowance_within_city` (`id`, `designation_id`, `designation_name`, `mode_of_transport`, `daily_food_allowance`) VALUES
(1, 1, 'RSM', 'CNG, Bus', '120.00'),
(2, 2, 'ASM', 'Bus, Rikshaw', '100.00'),
(3, 3, 'TSE', 'City Bus, Rikshaw', '80.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asm`
--

CREATE TABLE `tbl_asm` (
  `id` int(10) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `phone_no` varchar(40) NOT NULL,
  `base_station` varchar(40) NOT NULL,
  `rsm_id` varchar(40) NOT NULL,
  `rsm_name` varchar(40) NOT NULL,
  `is_assigned` tinyint(1) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_asm`
--

INSERT INTO `tbl_asm` (`id`, `user_id`, `user_name`, `full_name`, `phone_no`, `base_station`, `rsm_id`, `rsm_name`, `is_assigned`, `createdby`, `created`) VALUES
(2, 'GEO-782184', 'shuvo', 'Shuvo Ghosh', '01810023056', '', '', '', 0, '', '2020-10-05 05:29:42'),
(3, 'GEO-659515', 'estiak', 'Estiak Ahmed', '01730868234', '', 'GEO-629009', 'Syed Mostain Ahmed', 1, '', '2020-10-20 09:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assigned_area`
--

CREATE TABLE `tbl_assigned_area` (
  `id` int(10) NOT NULL,
  `assigned_area_id` varchar(30) NOT NULL,
  `assigned_area_name` varchar(200) NOT NULL,
  `region_id` varchar(30) DEFAULT NULL,
  `sub_region_id` varchar(30) DEFAULT NULL,
  `rsm_id` varchar(40) DEFAULT NULL,
  `rsm_name` varchar(40) DEFAULT NULL,
  `asm_id` varchar(40) DEFAULT NULL,
  `asm_name` varchar(40) DEFAULT NULL,
  `tse_name` varchar(40) DEFAULT NULL,
  `tse_id` varchar(40) DEFAULT NULL,
  `is_mobile` tinyint(1) DEFAULT NULL,
  `accepted_status` tinyint(1) DEFAULT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_assigned_area`
--

INSERT INTO `tbl_assigned_area` (`id`, `assigned_area_id`, `assigned_area_name`, `region_id`, `sub_region_id`, `rsm_id`, `rsm_name`, `asm_id`, `asm_name`, `tse_name`, `tse_id`, `is_mobile`, `accepted_status`, `createdby`, `created`) VALUES
(20, 'AR-70694', 'Rajshahi', 'R-962', 'SR-9799', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:01:06'),
(21, 'AR-98998', 'Chapai', 'R-962', 'SR-9799', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:01:25'),
(22, 'AR-51834', 'Natore', 'R-962', 'SR-9799', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:02:07'),
(23, 'AR-20922', 'Pabna', 'R-962', 'SR-9799', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:02:24'),
(24, 'AR-48817', 'Sirajganj', 'R-962', 'SR-9799', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:02:57'),
(25, 'AR-51411', 'Bogra', 'R-962', 'SR-6846', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:03:21'),
(26, 'AR-79546', 'Naogaon', 'R-962', 'SR-6846', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:03:37'),
(27, 'AR-65671', 'Jaypurhat', 'R-962', 'SR-6846', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:04:03'),
(28, 'AR-49335', 'Gaibanda', 'R-962', 'SR-6846', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:04:26'),
(29, 'AR-17135', 'Dinajpur', 'R-962', 'SR-8266', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:04:53'),
(30, 'AR-55782', 'Panchagar', 'R-962', 'SR-8266', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:05:13'),
(31, 'AR-34325', 'Thakurga', 'R-962', 'SR-8266', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:05:32'),
(32, 'AR-63971', 'Saidpur', 'R-962', 'SR-8266', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:05:48'),
(33, 'AR-74350', 'Rangpur', 'R-962', 'SR-1773', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:06:12'),
(34, 'AR-65007', 'Kurigram', 'R-962', 'SR-1773', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:06:27'),
(35, 'AR-15741', 'Lalmonirhat', 'R-962', 'SR-1773', 'GEO-203312', 'Md. Asaduzzaman Romel', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:06:49'),
(36, 'AR-15495', 'Potuakhali', 'R-686', 'SR-7040', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:28:26'),
(37, 'AR-66846', 'Barishal', 'R-686', 'SR-7040', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:28:50'),
(38, 'AR-21175', 'Jhalokathi', 'R-686', 'SR-7040', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:29:06'),
(39, 'AR-68106', 'Bhola', 'R-686', 'SR-7040', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:29:22'),
(40, 'AR-85189', 'Borguna', 'R-686', 'SR-7040', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:29:36'),
(41, 'AR-81353', 'Pirojpur', 'R-686', 'SR-7040', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:29:53'),
(43, 'AR-68584', 'Jhenaidha', 'R-686', 'SR-3056', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:33:31'),
(44, 'AR-60892', 'Magura', 'R-686', 'SR-3056', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:33:52'),
(45, 'AR-31895', 'Kushtia', 'R-686', 'SR-3056', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:34:13'),
(46, 'AR-15398', 'Gangnee', 'R-686', 'SR-3056', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:34:30'),
(47, 'AR-67972', 'Chuadanga', 'R-686', 'SR-3056', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:34:49'),
(48, 'AR-39185', 'Khulna', 'R-686', 'SR-2061', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:35:05'),
(49, 'AR-26565', 'Jessore', 'R-686', 'SR-2061', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:35:20'),
(50, 'AR-43903', 'Narail', 'R-686', 'SR-2061', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:35:33'),
(51, 'AR-63174', 'Shatkhira', 'R-686', 'SR-2061', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:35:51'),
(52, 'AR-67697', 'Bagerhat', 'R-686', 'SR-2061', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:36:09'),
(53, 'AR-74808', 'Faridpur', 'R-686', 'SR-1924', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:36:31'),
(54, 'AR-77995', 'Madaripur', 'R-686', 'SR-1924', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:36:47'),
(55, 'AR-16412', 'Takerhat', 'R-686', 'SR-1924', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:37:08'),
(56, 'AR-88310', 'Shariatpur', 'R-686', 'SR-1924', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:37:28'),
(57, 'AR-15560', 'Rajbari', 'R-686', 'SR-1924', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:37:42'),
(58, 'AR-66583', 'Gopalganj', 'R-686', 'SR-1924', 'GEO-804146', 'Muhsin Uddin Ahmed', '', '', '', '', 0, 0, 'mostain', '2020-10-05 06:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_budget_claim_cost_details`
--

CREATE TABLE `tbl_budget_claim_cost_details` (
  `id` int(10) NOT NULL,
  `travel_plan_id` varchar(40) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `planned_date` date NOT NULL,
  `bus_fare` decimal(10,2) NOT NULL,
  `bus_location` varchar(40) NOT NULL,
  `rikshaw_fare` decimal(10,2) NOT NULL,
  `rikshaw_location` varchar(40) NOT NULL,
  `cng_fare` decimal(10,2) NOT NULL,
  `cng_location` varchar(40) NOT NULL,
  `bike_fare` decimal(10,2) NOT NULL,
  `bike_location` varchar(40) NOT NULL,
  `distance_type` varchar(40) NOT NULL,
  `city_type` varchar(40) NOT NULL,
  `voucher_status` varchar(40) NOT NULL,
  `food_allowance` decimal(10,2) NOT NULL,
  `food_location` varchar(40) NOT NULL,
  `hotel_rent_allowance` decimal(10,2) NOT NULL,
  `user_remarks` varchar(110) DEFAULT NULL,
  `admin_remarks` varchar(110) NOT NULL,
  `total_budget_claim` decimal(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `approvedby` varchar(40) NOT NULL,
  `approved_status` int(1) NOT NULL,
  `decline_status` int(1) NOT NULL,
  `declinedby` varchar(40) NOT NULL,
  `travel_end_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_budget_claim_cost_details`
--

INSERT INTO `tbl_budget_claim_cost_details` (`id`, `travel_plan_id`, `user_id`, `username`, `designation`, `planned_date`, `bus_fare`, `bus_location`, `rikshaw_fare`, `rikshaw_location`, `cng_fare`, `cng_location`, `bike_fare`, `bike_location`, `distance_type`, `city_type`, `voucher_status`, `food_allowance`, `food_location`, `hotel_rent_allowance`, `user_remarks`, `admin_remarks`, `total_budget_claim`, `created`, `updated`, `approvedby`, `approved_status`, `decline_status`, `declinedby`, `travel_end_status`) VALUES
(5, 'TRAV-430598', 'GEO-203312', 'romel', 'RSM', '2020-10-08', '250.00', 'Khulna-Dhaka, ', '0.00', '', '0.00', '', '0.00', '', 'City to City', 'Inside Dhaka', 'With Voucher', '0.00', '', '1500.00', '', 'ghhhh', '1750.00', '2020-10-08 07:16:26', '2020-10-10 11:22:36', 'mostain', 1, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_routes`
--

CREATE TABLE `tbl_daily_routes` (
  `id` int(10) NOT NULL,
  `region_id` varchar(40) NOT NULL,
  `region_name` varchar(40) NOT NULL,
  `sub_region_id` varchar(40) NOT NULL,
  `sub_region_name` varchar(40) NOT NULL,
  `assigned_area_id` varchar(40) NOT NULL,
  `assigned_area_name` varchar(100) NOT NULL,
  `assigned_date` date NOT NULL,
  `rsm_id` varchar(40) NOT NULL,
  `rsm_name` varchar(40) NOT NULL,
  `asm_id` varchar(40) NOT NULL,
  `asm_name` varchar(40) NOT NULL,
  `tse_id` varchar(40) NOT NULL,
  `tse_name` varchar(40) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `designation_id` int(10) NOT NULL,
  `designation` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_id`, `designation`) VALUES
(1, 'RSM'),
(2, 'ASM'),
(3, 'TSE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor`
--

CREATE TABLE `tbl_distributor` (
  `id` int(10) NOT NULL,
  `distributor_id` varchar(40) NOT NULL,
  `distributor_name` varchar(50) NOT NULL,
  `distributor_phone_no` varchar(40) NOT NULL,
  `dist_stock` int(11) NOT NULL,
  `region_id` varchar(40) NOT NULL,
  `sub_region_id` varchar(40) NOT NULL,
  `assigned_area_id` varchar(40) NOT NULL,
  `rsm_id` varchar(40) DEFAULT NULL,
  `rsm_name` varchar(40) DEFAULT NULL,
  `asm_id` varchar(40) DEFAULT NULL,
  `asm_name` varchar(40) DEFAULT NULL,
  `tse_id` varchar(40) DEFAULT NULL,
  `tse_name` varchar(40) DEFAULT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phone_model`
--

CREATE TABLE `tbl_phone_model` (
  `id` int(10) NOT NULL,
  `phone_id` varchar(20) NOT NULL,
  `phone_model` varchar(10) NOT NULL,
  `base_price` decimal(10,2) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_phone_model`
--

INSERT INTO `tbl_phone_model` (`id`, `phone_id`, `phone_model`, `base_price`, `createdby`, `created`) VALUES
(2, 'GPHN-1585', 'T-905', '2850.00', '', '2020-09-12 10:49:38'),
(3, 'GPHN-9257', 'T-15', '2850.00', '', '2020-09-16 08:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regions`
--

CREATE TABLE `tbl_regions` (
  `id` int(10) NOT NULL,
  `region_id` varchar(30) NOT NULL,
  `region_name` varchar(50) NOT NULL,
  `rsm_id` varchar(40) DEFAULT NULL,
  `rsm_name` varchar(40) DEFAULT NULL,
  `is_assigned` tinyint(1) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_regions`
--

INSERT INTO `tbl_regions` (`id`, `region_id`, `region_name`, `rsm_id`, `rsm_name`, `is_assigned`, `createdby`, `created_at`) VALUES
(10, 'R-780', 'D.Metro', NULL, NULL, 0, 'mostain', '2020-10-05 05:44:13'),
(11, 'R-507', 'D.Outer', NULL, NULL, 0, 'mostain', '2020-10-05 05:44:24'),
(12, 'R-575', 'CTG & Sylhet', NULL, NULL, 0, 'mostain', '2020-10-05 05:44:35'),
(13, 'R-686', ' South', 'GEO-804146', 'Muhsin Uddin Ahmed', 1, 'mostain', '2020-10-05 05:45:42'),
(14, 'R-962', 'North', 'GEO-203312', 'Md. Asaduzzaman Romel', 1, 'mostain', '2020-10-05 05:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rsm`
--

CREATE TABLE `tbl_rsm` (
  `id` int(11) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `phone_no` varchar(40) NOT NULL,
  `base_station_id` varchar(40) NOT NULL,
  `base_station` varchar(40) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rsm`
--

INSERT INTO `tbl_rsm` (`id`, `user_id`, `user_name`, `full_name`, `phone_no`, `base_station_id`, `base_station`, `createdby`, `created`) VALUES
(1, 'GEO-629009', 'mostain', 'Syed Mostain Ahmed', '01774137363', '', '', '', '2020-09-09 10:36:16'),
(4, 'GEO-203312', 'romel', 'Md. Asaduzzaman Romel', '01810023055', 'SR-1773', 'Rangpur', '', '2020-10-05 05:23:06'),
(5, 'GEO-570615', 'ripon', 'Ripon Kumar Sarkar', '01810023063', '', '', '', '2020-10-05 05:24:56'),
(6, 'GEO-804146', 'muhsin', 'Muhsin Uddin Ahmed', '01810023059', 'SR-2061', 'Khulna', '', '2020-10-05 05:26:55'),
(7, 'GEO-878650', 'anukul', 'Anukul Chandra Talukder', '01810023064', '', '', '', '2020-10-05 05:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saved_routes`
--

CREATE TABLE `tbl_saved_routes` (
  `id` int(10) NOT NULL,
  `route_id` varchar(40) NOT NULL,
  `route_no` varchar(15) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `region_id` varchar(40) NOT NULL,
  `sub_region_id` varchar(40) NOT NULL,
  `route_name` varchar(40) NOT NULL,
  `route_details` varchar(150) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_saved_routes`
--

INSERT INTO `tbl_saved_routes` (`id`, `route_id`, `route_no`, `user_id`, `username`, `designation`, `region_id`, `sub_region_id`, `route_name`, `route_details`, `createdby`, `created`) VALUES
(11, 'ROU-344', 'Route-11', 'GEO-203312', 'romel', 'RSM', 'R-962', 'SR-1773', 'My Route 1', 'Rangpur, Kurigram, Lalmonirhat', '', '2020-10-05 06:49:11'),
(12, 'ROU-925', 'Route-12', 'GEO-203312', 'romel', 'RSM', 'R-962', 'SR-1773', 'Dinajpur Route 2', 'Dinajpur, Panchagar, Thakurga', '', '2020-10-05 06:50:26'),
(13, 'ROU-586', 'Route-13', 'GEO-203312', 'romel', 'RSM', 'R-962', 'SR-1773', 'Rajshahi route', 'Rajshahi, Chapai, Pabna, Natore, Sirajganj', '', '2020-10-05 10:43:38'),
(14, 'ROU-920', 'Route-14', 'GEO-203312', 'romel', 'RSM', 'R-962', 'SR-1773', 'Route 2', 'Bogra, Jaypurhat, Naogaon, Gaibanda', '', '2020-10-06 05:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saved_route_details`
--

CREATE TABLE `tbl_saved_route_details` (
  `id` int(10) NOT NULL,
  `route_id` varchar(40) NOT NULL,
  `assigned_area_id` varchar(40) NOT NULL,
  `area_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_management`
--

CREATE TABLE `tbl_stock_management` (
  `id` int(11) NOT NULL,
  `phone_id` varchar(40) NOT NULL,
  `distributor_id` varchar(40) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `stock_cost` decimal(10,2) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_regions`
--

CREATE TABLE `tbl_sub_regions` (
  `id` int(10) NOT NULL,
  `sub_region_id` varchar(30) NOT NULL,
  `sub_region_name` varchar(50) NOT NULL,
  `region_id` varchar(30) NOT NULL,
  `region_name` varchar(40) NOT NULL,
  `rsm_name` varchar(40) DEFAULT NULL,
  `rsm_id` varchar(30) DEFAULT NULL,
  `asm_id` varchar(30) DEFAULT NULL,
  `asm_name` varchar(40) DEFAULT NULL,
  `createdby` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sub_regions`
--

INSERT INTO `tbl_sub_regions` (`id`, `sub_region_id`, `sub_region_name`, `region_id`, `region_name`, `rsm_name`, `rsm_id`, `asm_id`, `asm_name`, `createdby`, `created_at`) VALUES
(16, 'SR-8251', 'Hatirpul', 'R-780', 'D.Metro', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:46:23'),
(17, 'SR-9481', 'Uttara', 'R-780', 'D.Metro', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:46:35'),
(18, 'SR-6626', 'Mirpur', 'R-780', 'D.Metro', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:48:18'),
(19, 'SR-3191', 'Narayanganj', 'R-780', 'D.Metro', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:48:36'),
(20, 'SR-3838', 'Comilla', 'R-575', 'CTG & Sylhet', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:48:56'),
(21, 'SR-5451', 'CTG', 'R-575', 'CTG & Sylhet', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:49:09'),
(22, 'SR-5557', 'COX', 'R-575', 'CTG & Sylhet', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:49:22'),
(23, 'SR-5056', 'Feni', 'R-575', 'CTG & Sylhet', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:49:38'),
(24, 'SR-2320', 'Sylhet', 'R-575', 'CTG & Sylhet', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:50:11'),
(25, 'SR-9044', 'Shreemangal', 'R-575', 'CTG & Sylhet', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:50:31'),
(26, 'SR-8314', 'Gazipur', 'R-507', 'D.Outer', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:51:12'),
(27, 'SR-4749', 'Mymensing', 'R-507', 'D.Outer', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:52:18'),
(28, 'SR-3085', 'Tangail', 'R-507', 'D.Outer', NULL, NULL, NULL, NULL, 'mostain', '2020-10-05 05:52:30'),
(29, 'SR-7040', 'Barishal', 'R-686', ' South', 'Muhsin Uddin Ahmed', 'GEO-804146', NULL, NULL, 'mostain', '2020-10-05 05:53:09'),
(30, 'SR-3056', 'Kushtia', 'R-686', ' South', 'Muhsin Uddin Ahmed', 'GEO-804146', NULL, NULL, 'mostain', '2020-10-05 05:53:29'),
(31, 'SR-2061', 'Khulna', 'R-686', ' South', 'Muhsin Uddin Ahmed', 'GEO-804146', NULL, NULL, 'mostain', '2020-10-05 05:53:44'),
(32, 'SR-1924', 'Faridpur', 'R-686', ' South', 'Muhsin Uddin Ahmed', 'GEO-804146', NULL, NULL, 'mostain', '2020-10-05 05:53:58'),
(33, 'SR-9799', 'Rajshahi', 'R-962', 'North', 'Md. Asaduzzaman Romel', 'GEO-203312', NULL, NULL, 'mostain', '2020-10-05 05:54:30'),
(34, 'SR-6846', 'Bogra', 'R-962', 'North', 'Md. Asaduzzaman Romel', 'GEO-203312', NULL, NULL, 'mostain', '2020-10-05 05:54:45'),
(35, 'SR-8266', 'Dinajpur', 'R-962', 'North', 'Md. Asaduzzaman Romel', 'GEO-203312', NULL, NULL, 'mostain', '2020-10-05 05:55:08'),
(36, 'SR-1773', 'Rangpur', 'R-962', 'North', 'Md. Asaduzzaman Romel', 'GEO-203312', NULL, NULL, 'mostain', '2020-10-05 05:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_total_stock`
--

CREATE TABLE `tbl_total_stock` (
  `id` int(11) NOT NULL,
  `phone_id` varchar(40) NOT NULL,
  `stock` int(20) NOT NULL,
  `stock_cost` decimal(10,2) NOT NULL,
  `stock_date` date NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transportation_list`
--

CREATE TABLE `tbl_transportation_list` (
  `transport_id` int(10) NOT NULL,
  `transport_medium` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_transportation_list`
--

INSERT INTO `tbl_transportation_list` (`transport_id`, `transport_medium`) VALUES
(1, 'Bus'),
(2, 'Train');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_travel_bill_pics`
--

CREATE TABLE `tbl_travel_bill_pics` (
  `id` int(10) NOT NULL,
  `travel_plan_id` varchar(40) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `allowance_type` varchar(40) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_travel_bill_pics`
--

INSERT INTO `tbl_travel_bill_pics` (`id`, `travel_plan_id`, `user_id`, `username`, `allowance_type`, `filename`, `image`, `created`, `updated`) VALUES
(4, 'TRAV-430598', 'GEO-203312', 'romel', 'Hotel', 'TRAV-430598-GEO-203312-romel-20201008071627.jpg', 'iVBORw0KGgoAAAANSUhEUgAAArMAAAOZCAIAAACCxT+oAAAAAXNSR0IArs4c6QAAAANzQklUCAgI\n2+FP4AAAIABJREFUeJxsvd2ObcuSHhR/mTnGnLXW3rvd3eBbJN9Y2BIXlg3IgECNMFYLYzBGRiA/\nGo/AA/AeXCBxZ7D79Dl7r7Wq5pxjZGYEFzEzKqpO18VSrVljjpE/8fPFF5Ex8P/8P/73MYaImNkY\ng5kBAABU1T8EgDknAJgZM6uqqg5TAyXkX3/9ZsTD9Lfffrudx2/fv/2bf/N75Prj9WZmfnEpBZF7\n73NOKgKERIT+A2xmiKjE27YjMhIpElM5R9/3vbZtAFOppe4sdXL98uVnoDYJ9u06hpatAcB5f4xx\n9nEogKrejwcRvf14rbXO3n/3u9+9vLzMPh5vb+O8zfP4w+//em/44/f/n77dWE9VPe6PMYY0tnMM\n0yZiqnN2Zu69M5oIARAa/PT1cr3Q3/7b/35rhd', '2020-10-08 07:16:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_travel_plan`
--

CREATE TABLE `tbl_travel_plan` (
  `id` int(10) NOT NULL,
  `travel_plan_id` varchar(40) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `region_id` varchar(40) NOT NULL,
  `region_name` varchar(40) NOT NULL,
  `sub_region_id` varchar(40) NOT NULL,
  `sub_region_name` varchar(40) NOT NULL,
  `route_ids` varchar(40) NOT NULL,
  `planned_date` date NOT NULL,
  `distance_type` varchar(40) NOT NULL,
  `status` int(10) NOT NULL,
  `travel_start_status` int(1) NOT NULL,
  `travel_end_status` int(1) NOT NULL,
  `base_station` varchar(40) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `acceptedby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_travel_plan`
--

INSERT INTO `tbl_travel_plan` (`id`, `travel_plan_id`, `user_id`, `username`, `designation`, `region_id`, `region_name`, `sub_region_id`, `sub_region_name`, `route_ids`, `planned_date`, `distance_type`, `status`, `travel_start_status`, `travel_end_status`, `base_station`, `createdby`, `acceptedby`, `created`, `updated`) VALUES
(4, 'TRAV-430598', 'GEO-203312', 'romel', 'RSM', 'R-962', 'North', 'SR-1773', 'Rangpur', 'ROU-344,ROU-925', '2020-10-08', 'City To city', 1, 1, 1, 'Rangpur', 'romel', 'mostain', '2020-10-08 07:14:15', '2020-10-08 07:16:50'),
(5, 'TRAV-297493', 'GEO-203312', 'romel', 'RSM', 'R-962', 'North', 'SR-1773', 'Rangpur', 'ROU-344,ROU-925', '2020-10-10', 'Within city', 1, 0, 0, 'Rangpur', 'romel', 'mostain', '2020-10-10 11:23:05', '2020-10-10 11:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_travel_plan_details`
--

CREATE TABLE `tbl_travel_plan_details` (
  `id` int(10) NOT NULL,
  `travel_plan_id` varchar(40) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `planned_date` date NOT NULL,
  `route_id` varchar(40) NOT NULL,
  `route_no` varchar(40) NOT NULL,
  `route_name` varchar(40) NOT NULL,
  `route_details` varchar(200) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_travel_plan_details`
--

INSERT INTO `tbl_travel_plan_details` (`id`, `travel_plan_id`, `user_id`, `planned_date`, `route_id`, `route_no`, `route_name`, `route_details`, `createdby`, `created`, `updated`) VALUES
(8, 'TRAV-430598', 'GEO-203312', '2020-10-08', 'ROU-344', 'Route-11', 'My Route 1', 'Rangpur, Kurigram, Lalmonirhat', 'romel', '2020-10-08 07:14:15', NULL),
(9, 'TRAV-430598', 'GEO-203312', '2020-10-08', 'ROU-925', 'Route-12', 'Dinajpur Route 2', 'Dinajpur, Panchagar, Thakurga', 'romel', '2020-10-08 07:14:15', NULL),
(10, 'TRAV-297493', 'GEO-203312', '2020-10-10', 'ROU-344', 'Route-11', 'My Route 1', 'Rangpur, Kurigram, Lalmonirhat', 'romel', '2020-10-10 11:23:05', NULL),
(11, 'TRAV-297493', 'GEO-203312', '2020-10-10', 'ROU-925', 'Route-12', 'Dinajpur Route 2', 'Dinajpur, Panchagar, Thakurga', 'romel', '2020-10-10 11:23:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tse`
--

CREATE TABLE `tbl_tse` (
  `id` int(10) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `phone_no` varchar(40) NOT NULL,
  `base_station` varchar(40) NOT NULL,
  `rsm_id` varchar(40) NOT NULL,
  `rsm_name` varchar(40) NOT NULL,
  `asm_id` varchar(40) NOT NULL,
  `asm_name` varchar(40) NOT NULL,
  `is_assigned` tinyint(1) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tse`
--

INSERT INTO `tbl_tse` (`id`, `user_id`, `user_name`, `full_name`, `phone_no`, `base_station`, `rsm_id`, `rsm_name`, `asm_id`, `asm_name`, `is_assigned`, `createdby`, `created`) VALUES
(1, 'GEO-814382', 'chandan', 'Chandan Ghosh', '01810023060', '', '', '', '', '', 0, '', '2020-10-05 05:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `base_station_id` varchar(40) NOT NULL,
  `base_station` varchar(40) NOT NULL,
  `nid` varchar(40) NOT NULL,
  `nid_image` varchar(1000) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `level` int(10) NOT NULL,
  `createdby` varchar(40) NOT NULL,
  `updatedby` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_id`, `designation`, `username`, `fullname`, `email`, `password`, `phone_no`, `base_station_id`, `base_station`, `nid`, `nid_image`, `profile_pic`, `level`, `createdby`, `updatedby`, `created`, `updated`) VALUES
(5, 'GEO-629009', 'ADMIN', 'mostain', 'Syed Mostain Ahmed', 'mostainahmed@gmail.com', 'ebs1234', '01774137363', '', '', 'Needed', '', '', 1, 'mostain', 'mostain', '2020-09-09 10:36:16', '2020-11-01 09:39:26'),
(8, 'GEO-203312', 'RSM', 'romel', 'Md. Asaduzzaman Romel', 'asaduzzaman@geophonebd.com', 'ebs1234', '01810023055', 'SR-1773', 'Rangpur', 'Needed', '', '', 0, 'mostain', '', '2020-10-05 05:23:06', '2020-10-05 06:09:44'),
(9, 'GEO-570615', 'RSM', 'ripon', 'Ripon Kumar Sarkar', 'ripon.sarkar@geophonebd.com', 'ebs1234', '01810023063', '', '', 'Needed', '', '', 0, 'mostain', '', '2020-10-05 05:24:56', '0000-00-00 00:00:00'),
(10, 'GEO-804146', 'RSM', 'muhsin', 'Muhsin Uddin Ahmed', 'muhsin.uddin@geophonebd.com', 'ebs1234', '01810023059', 'SR-2061', 'Khulna', 'Needed', '', '', 0, 'mostain', '', '2020-10-05 05:26:55', '2020-10-05 06:51:11'),
(11, 'GEO-878650', 'RSM', 'anukul', 'Anukul Chandra Talukder', 'anukul.chandra@geophonebd.com', 'ebs1234', '01810023064', '', '', 'Needed', '', '', 0, 'mostain', '', '2020-10-05 05:28:35', '0000-00-00 00:00:00'),
(12, 'GEO-782184', 'ASM', 'shuvo', 'Shuvo Ghosh', 'shuvo.ghosh@geophonebd.com', 'ebs1234', '01810023056', '', '', 'Needed', '', '', 0, 'mostain', '', '2020-10-05 05:29:42', '0000-00-00 00:00:00'),
(13, 'GEO-814382', 'TSE', 'chandan', 'Chandan Ghosh', 'chandan.ghosh@geophonebd.com', 'ebs1234', '01810023060', '', '', 'Needed', '', '', 0, 'mostain', '', '2020-10-05 05:31:00', '0000-00-00 00:00:00'),
(14, 'GEO-659515', 'ASM', 'estiak', 'Estiak Ahmed', 'demouser@gmail.con', 'ebs1234', '01730868234', 'SR-3085', 'Tangail', '123456', '', '', 0, 'mostain', '', '2020-10-20 09:49:56', '2020-10-20 09:52:38'),
(15, 'GEO-702167', 'ADMIN', 'mike_halland', 'mike tyson', 'demo@demo.com', 'ebs1234', '01456987456', '', '', '8907687892345', '', '', 1, 'mostain', '', '2020-11-01 06:13:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_time_travel_tracking`
--

CREATE TABLE `tbl_user_time_travel_tracking` (
  `id` int(10) NOT NULL,
  `travel_plan_id` varchar(40) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `travel_date` varchar(40) NOT NULL,
  `start_day_status` int(1) NOT NULL,
  `day_start` varchar(40) NOT NULL,
  `day_end` varchar(40) NOT NULL,
  `day_end_status` int(1) NOT NULL,
  `start_lat` varchar(40) NOT NULL,
  `start_lng` varchar(40) NOT NULL,
  `end_lat` varchar(40) NOT NULL,
  `end_lng` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_time_travel_tracking`
--

INSERT INTO `tbl_user_time_travel_tracking` (`id`, `travel_plan_id`, `user_id`, `travel_date`, `start_day_status`, `day_start`, `day_end`, `day_end_status`, `start_lat`, `start_lng`, `end_lat`, `end_lng`, `created`, `updated`) VALUES
(4, 'TRAV-430598', 'GEO-203312', '2020-10-08', 1, '13:33:13', '13:35:06', 1, '23.7389348', '90.3787809', '23.7389348', '90.3787809', '2020-10-08 07:14:44', '2020-10-08 07:16:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_allowance_city_to_city_per_day`
--
ALTER TABLE `tbl_allowance_city_to_city_per_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_allowance_within_city`
--
ALTER TABLE `tbl_allowance_within_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_asm`
--
ALTER TABLE `tbl_asm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_assigned_area`
--
ALTER TABLE `tbl_assigned_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_budget_claim_cost_details`
--
ALTER TABLE `tbl_budget_claim_cost_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `travel_plan_id` (`travel_plan_id`);

--
-- Indexes for table `tbl_daily_routes`
--
ALTER TABLE `tbl_daily_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `distributor_id` (`distributor_id`);

--
-- Indexes for table `tbl_phone_model`
--
ALTER TABLE `tbl_phone_model`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_id` (`phone_id`);

--
-- Indexes for table `tbl_regions`
--
ALTER TABLE `tbl_regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `region_id` (`region_id`);

--
-- Indexes for table `tbl_rsm`
--
ALTER TABLE `tbl_rsm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_saved_routes`
--
ALTER TABLE `tbl_saved_routes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `route_id` (`route_id`);

--
-- Indexes for table `tbl_saved_route_details`
--
ALTER TABLE `tbl_saved_route_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock_management`
--
ALTER TABLE `tbl_stock_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_regions`
--
ALTER TABLE `tbl_sub_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_total_stock`
--
ALTER TABLE `tbl_total_stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_id` (`phone_id`);

--
-- Indexes for table `tbl_transportation_list`
--
ALTER TABLE `tbl_transportation_list`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `tbl_travel_bill_pics`
--
ALTER TABLE `tbl_travel_bill_pics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_travel_plan`
--
ALTER TABLE `tbl_travel_plan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `travel_plan_id` (`travel_plan_id`);

--
-- Indexes for table `tbl_travel_plan_details`
--
ALTER TABLE `tbl_travel_plan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tse`
--
ALTER TABLE `tbl_tse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_user_time_travel_tracking`
--
ALTER TABLE `tbl_user_time_travel_tracking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `travel_plan_id` (`travel_plan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_allowance_city_to_city_per_day`
--
ALTER TABLE `tbl_allowance_city_to_city_per_day`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_allowance_within_city`
--
ALTER TABLE `tbl_allowance_within_city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_asm`
--
ALTER TABLE `tbl_asm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_assigned_area`
--
ALTER TABLE `tbl_assigned_area`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_budget_claim_cost_details`
--
ALTER TABLE `tbl_budget_claim_cost_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_daily_routes`
--
ALTER TABLE `tbl_daily_routes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `designation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_phone_model`
--
ALTER TABLE `tbl_phone_model`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_regions`
--
ALTER TABLE `tbl_regions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_rsm`
--
ALTER TABLE `tbl_rsm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_saved_routes`
--
ALTER TABLE `tbl_saved_routes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_saved_route_details`
--
ALTER TABLE `tbl_saved_route_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stock_management`
--
ALTER TABLE `tbl_stock_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sub_regions`
--
ALTER TABLE `tbl_sub_regions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_total_stock`
--
ALTER TABLE `tbl_total_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transportation_list`
--
ALTER TABLE `tbl_transportation_list`
  MODIFY `transport_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_travel_bill_pics`
--
ALTER TABLE `tbl_travel_bill_pics`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_travel_plan`
--
ALTER TABLE `tbl_travel_plan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_travel_plan_details`
--
ALTER TABLE `tbl_travel_plan_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_tse`
--
ALTER TABLE `tbl_tse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user_time_travel_tracking`
--
ALTER TABLE `tbl_user_time_travel_tracking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
