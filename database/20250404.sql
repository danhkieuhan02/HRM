-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for hrm_system
CREATE DATABASE IF NOT EXISTS `hrm_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `hrm_system`;

-- Dumping structure for table hrm_system.candidates
CREATE TABLE IF NOT EXISTS `candidates` (
  `CandidateID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `CVFile` varchar(255) DEFAULT NULL,
  `PositionApplied` varchar(100) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `JobID` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CandidateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.candidates: ~0 rows (approximately)

-- Dumping structure for table hrm_system.contracts
CREATE TABLE IF NOT EXISTS `contracts` (
  `contract_code` varchar(20) NOT NULL,
  `ContractType` varchar(50) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `Note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`contract_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.contracts: ~2 rows (approximately)
INSERT INTO `contracts` (`contract_code`, `ContractType`, `StartDate`, `EndDate`, `Note`, `created_at`, `updated_at`) VALUES
	('CT001', 'Full-time', '2025-01-01', '2026-01-01', 'Hợp đồng 1 năm', '2025-03-28 10:24:48', '2025-03-28 10:24:48'),
	('CT002', 'Part-time', '2025-03-01', '2025-09-01', 'Hợp đồng 6 tháng', '2025-03-28 10:24:48', '2025-03-28 10:24:48');

-- Dumping structure for table hrm_system.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `department_code` varchar(20) NOT NULL,
  `DepartmentName` varchar(100) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`department_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.departments: ~2 rows (approximately)
INSERT INTO `departments` (`department_code`, `DepartmentName`, `Address`, `PhoneNumber`, `created_at`, `updated_at`) VALUES
	('DP001', 'Phòng Nhân sự', NULL, NULL, '2025-03-28 10:26:56', '2025-03-28 10:26:56'),
	('DP002', 'Phòng Kỹ thuật', NULL, NULL, '2025-03-28 10:26:56', '2025-03-28 10:26:56');

-- Dumping structure for table hrm_system.education_levels
CREATE TABLE IF NOT EXISTS `education_levels` (
  `education_level_code` varchar(20) NOT NULL,
  `education_level_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`education_level_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.education_levels: ~3 rows (approximately)
INSERT INTO `education_levels` (`education_level_code`, `education_level_name`, `created_at`, `updated_at`) VALUES
	('EDU001', 'Đại học', '2025-03-28 10:25:31', '2025-03-28 10:25:31'),
	('EDU002', 'Cao đẳng', '2025-03-28 10:25:31', '2025-03-28 10:25:31'),
	('EDU003', 'Trung cấp', '2025-03-28 10:25:31', '2025-03-28 10:25:31');

-- Dumping structure for table hrm_system.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_code` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `ethnic` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `department_code` varchar(20) DEFAULT NULL,
  `employee_position_code` varchar(20) DEFAULT NULL,
  `contract_code` varchar(20) DEFAULT NULL,
  `education_level_code` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`employee_code`),
  KEY `employees_department_code_foreign` (`department_code`),
  KEY `employees_employee_position_code_foreign` (`employee_position_code`),
  KEY `employees_contract_code_foreign` (`contract_code`),
  KEY `employees_education_level_code_foreign` (`education_level_code`),
  CONSTRAINT `employees_contract_code_foreign` FOREIGN KEY (`contract_code`) REFERENCES `contracts` (`contract_code`),
  CONSTRAINT `employees_department_code_foreign` FOREIGN KEY (`department_code`) REFERENCES `departments` (`department_code`),
  CONSTRAINT `employees_education_level_code_foreign` FOREIGN KEY (`education_level_code`) REFERENCES `education_levels` (`education_level_code`),
  CONSTRAINT `employees_employee_position_code_foreign` FOREIGN KEY (`employee_position_code`) REFERENCES `employee_positions` (`employee_position_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.employees: ~5 rows (approximately)
INSERT INTO `employees` (`employee_code`, `full_name`, `birthday`, `hometown`, `image`, `gender`, `ethnic`, `phone_number`, `status`, `department_code`, `employee_position_code`, `contract_code`, `education_level_code`, `created_at`, `updated_at`) VALUES
	('1111', 'Nguyễn Văn Tư', '1998-01-11', 'Cần Thơ', 'employee_images/1743182306_BTS Fanart.jpeg', 'Male', 'Kinh', '000099998777', '123123', 'DP001', 'POS003', 'CT001', 'EDU001', '2025-03-28 10:18:26', '2025-03-28 10:58:45'),
	('11111', 'Danh Kiều Hân', '2025-03-26', 'aaaaaaaaaaa', NULL, 'Male', 'ádas', '123123', NULL, 'DP001', 'POS003', 'CT001', 'EDU002', '2025-03-28 10:35:52', '2025-03-28 10:35:52'),
	('NV001', 'Nguyễn Văn A', '1990-05-15', 'Hà Nội', NULL, 'Nam', 'Kinh', '0912345678', 'Đang làm việc', 'DP001', 'POS001', 'CT001', 'EDU001', '2025-03-28 10:27:25', '2025-03-28 10:27:25'),
	('NV002', 'Trần Thị B', '1995-08-20', 'TP.HCM', NULL, 'Nữ', 'Kinh', '0987654321', 'Đang làm việc', 'DP002', 'POS002', 'CT002', 'EDU002', '2025-03-28 10:27:25', '2025-03-28 10:27:25'),
	('NV004', 'Nguyễn Văn  C', '2025-03-23', 'Cần Thơ', 'employee_images/1743221879_01d94d87fe3e26607f2f.jpg', 'Male', 'Kinh', '00009999888', 'Đang lam', 'DP001', 'POS001', 'CT002', 'EDU002', '2025-03-28 21:17:59', '2025-03-28 21:17:59');

-- Dumping structure for table hrm_system.employee_positions
CREATE TABLE IF NOT EXISTS `employee_positions` (
  `employee_position_code` varchar(20) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`employee_position_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.employee_positions: ~3 rows (approximately)
INSERT INTO `employee_positions` (`employee_position_code`, `employee_name`, `created_at`, `updated_at`) VALUES
	('POS001', 'Nhân viên', '2025-03-28 10:27:25', '2025-03-28 10:27:25'),
	('POS002', 'Quản lý', '2025-03-28 10:27:25', '2025-03-28 10:27:25'),
	('POS003', 'Trưởng phòng', '2025-03-28 10:27:25', '2025-03-28 10:27:25');

-- Dumping structure for table hrm_system.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table hrm_system.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.migrations: ~13 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(4, '2025_03_18_074642_candidate', 1),
	(5, '2025_03_18_075037_contract', 1),
	(6, '2025_03_18_075113_department', 1),
	(7, '2025_03_24_070716_role', 1),
	(8, '2025_03_24_080032_user', 1),
	(9, '2025_03_26_172310_permission', 1),
	(10, '2025_03_26_172519_role_permission', 1),
	(11, '2025_03_27_185523_employee_position', 1),
	(12, '2025_03_27_185621_education_level', 1),
	(13, '2025_03_27_190235_employee', 1);

-- Dumping structure for table hrm_system.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.password_resets: ~0 rows (approximately)

-- Dumping structure for table hrm_system.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PermissionName` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.permissions: ~0 rows (approximately)

-- Dumping structure for table hrm_system.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table hrm_system.role
CREATE TABLE IF NOT EXISTS `role` (
  `RoleID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`RoleID`),
  UNIQUE KEY `role_rolename_unique` (`RoleName`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.role: ~2 rows (approximately)
INSERT INTO `role` (`RoleID`, `RoleName`, `Description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Quản trị viên hệ thống', '2025-03-28 02:05:44', '2025-03-28 02:05:44'),
	(2, 'client', 'Người dùng thường', '2025-03-28 02:05:44', '2025-03-28 02:05:44');

-- Dumping structure for table hrm_system.role_permission
CREATE TABLE IF NOT EXISTS `role_permission` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_permission_role_id_foreign` (`role_id`),
  KEY `role_permission_permission_id_foreign` (`permission_id`),
  CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`RoleID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.role_permission: ~0 rows (approximately)

-- Dumping structure for table hrm_system.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `RoleID` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_roleid_foreign` (`RoleID`),
  CONSTRAINT `users_roleid_foreign` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrm_system.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `RoleID`, `name`, `email`, `email_verified_at`, `password`, `IsAdmin`, `created_at`, `updated_at`, `remember_token`) VALUES
	(1, 1, 'Admin', 'admin@example.com', NULL, '$2y$10$L3pdfXGJfQKOG8n9KEw/We636V0MG2osjHjT2xcA1bcpkuBUsNGgS', 1, '2025-03-28 02:05:45', '2025-03-28 02:05:45', NULL),
	(2, 2, 'Client', 'client@example.com', NULL, '$2y$10$R.yhw6nnkeB5q5/Ia8Xi1.q5DcDuTF6.UZz4Z47KITdoOnFIerBrW', 0, '2025-03-28 02:05:45', '2025-03-28 02:05:45', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
