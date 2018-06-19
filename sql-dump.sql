-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8mb4_unicode_ci,
  `depth` int(11) DEFAULT NULL,
  `parentID` longtext COLLATE utf8mb4_unicode_ci,
  `slug` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sortOder` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menus` (`id`, `name`, `depth`, `parentID`, `slug`, `created_at`, `updated_at`, `sortOder`) VALUES
(1,	'\n                                        Container 1\n                                    ',	1,	'-1',	'#',	NULL,	NULL,	0),
(2,	'\n                                         \n                                         \n                                         \n                                         \n                                         \n                                         \n                                         \n                                         Yet another post\n                                     \n                                     \n                                     \n                                     \n                                     \n                                     \n                                     \n                                     ',	1,	'1',	'\n                                         \n                                         \n                                         \n                                         \n                                         \n                                         \n                                         \n                                         http://localhost:8000/yet-another-post\n                                     \n                                     \n                                     \n                                     \n                                     \n                                     \n                                     \n                                     ',	NULL,	NULL,	0),
(3,	'\n                                        \n                                        \n                                        \n                                        \n                                        \n                                        \n                                        \n                                        Container 2\n                                    \n                                    \n                                    \n                                    \n                                    \n                                    \n                                    \n                                    ',	1,	'-1',	'#',	NULL,	NULL,	0),
(4,	'\n                                         \n                                         \n                                         \n                                         \n                                         \n                                         \n                                         \n                                         Yet another post\n                                     \n                                     \n                                     \n                                     \n                                     \n                                     \n                                     \n                                     ',	1,	'3',	'\n                                         \n                                         \n                                         \n                                         \n                                         \n                                         \n                                         \n                                         http://localhost:8000/yet-another-post\n                                     \n                                     \n                                     \n                                     \n                                     \n                                     \n                                     \n                                     ',	NULL,	NULL,	0),
(5,	'\n                                         \n                                         \n                                         \n                                         This is first post\n                                     \n                                     \n                                     \n                                     ',	1,	'3',	'\n                                         \n                                         \n                                         \n                                         http://localhost:8000/totaly-new-post-huyjyiuyi\n                                     \n                                     \n                                     \n                                     ',	NULL,	NULL,	0),
(6,	'\n                                         \n                                         \n                                         \n                                         This is first post\n                                     \n                                     \n                                     \n                                     ',	1,	'3',	'\n                                         \n                                         \n                                         \n                                         http://localhost:8000/totaly-new-post-huyjyiuyi\n                                     \n                                     \n                                     \n                                     ',	NULL,	NULL,	0);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2017_12_29_150639_create_posts_table',	1),
(4,	'2018_04_12_031225_create_users_types_table',	2),
(5,	'2018_04_12_034113_create_menus_table',	3),
(6,	'2018_05_28_164502_create_users_privilages_table',	4),
(7,	'2018_06_10_115215_add_user_types_table',	5);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `metaTitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaDescription` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `slug`, `metaTitle`, `metaDescription`, `created_at`, `updated_at`) VALUES
(4,	26,	'This is first post',	'<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>\r\n<p><img src=\"http://localhost:8000/storage/images/zvTvCDB0wg7SK6pna0CtgkwVN6WenDmpFmzhrj2y.jpeg\" /></p>\r\n<p><img src=\"http://localhost:8000/storage/images/rbwbunFJqij3tpPUqHD5T5Iad8cSdQ944KLR4nHg.jpeg\" /></p>',	'totaly-new-post-huyjyiuyi',	'Tytulik strony',	'opisik strony',	'2018-05-07 17:39:29',	'2018-06-16 09:21:09'),
(6,	26,	'This is second post',	'<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>',	'post',	NULL,	NULL,	'2018-05-07 18:54:13',	'2018-06-01 16:38:38'),
(14,	1,	'Yet another post',	'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',	'yet-another-post',	NULL,	NULL,	'2018-06-01 16:38:59',	'2018-06-01 16:38:59'),
(15,	1,	'editeddd',	'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. EDIT</p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"../../storage/images/zvTvCDB0wg7SK6pna0CtgkwVN6WenDmpFmzhrj2y.jpeg\" width=\"1920\" height=\"1080\" /></p>',	'you-know-what-another',	'tit edit',	'desc edit',	'2018-06-01 16:39:20',	'2018-06-09 15:36:31'),
(27,	1,	'image test',	'<p><img src=\"http://localhost:8000/storage/images/tZ6dCqcKduzSaOm0MGhwW1sT6SGLnyspboN01dIu.jpeg\" /></p>',	'image-test',	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `accountType`, `created_at`, `updated_at`, `remember_token`, `image`) VALUES
(1,	'volmarg Reiso',	'arisiel@arisiel.arisiel',	'$2y$10$yyLUD.Y8.h9tZio8fWh9lOrmCxweFb6y0Ltrds9YS63MqMTAhaKC.',	'superAdmin',	'2018-04-11 15:41:57',	'2018-06-08 02:25:45',	'IvDzDxiNue5YvnKKAzyNCUJSoUBL4G1fnyH2h0bfazP38bysyjag6HEtLu5R',	'http://i0.kym-cdn.com/photos/images/newsfeed/001/375/856/fcd.png'),
(2,	'cms',	'asdsa@dsada.pl',	'$2y$10$yyLUD.Y8.h9tZio8fWh9lOrmCxweFb6y0Ltrds9YS63MqMTAhaKC.',	'suspended',	'2018-04-11 15:49:59',	'2018-06-11 01:36:08',	NULL,	NULL),
(16,	'LXzeMIZFV0',	'PdnE4Jl7Ez@wp.pl',	'$2y$10$bjU8YW2AsI8WDTqjzuRNuu3cUNN64.OwIRcErdzhV3zlA0Ss/fNQq',	'admin',	NULL,	'2018-06-11 01:35:48',	NULL,	NULL),
(19,	'xacYFWJQhz',	'qugQ5Lm1cR@wp.pl',	'$2y$10$Wf0dO3.bU5zbI28ZMv29mOylz9oY19fmsHORW0MU4nzNJzonOTht.',	'suspended',	NULL,	'2018-06-11 01:37:42',	NULL,	NULL),
(22,	'admin',	'admin@admin.admin',	'$2y$10$bobP.SqClsJQxUaHZnzuquhBHRlKzvD3noMyFJJSvzvpPpAtacVZa',	'superAdmin',	'2018-06-06 02:58:37',	'2018-06-11 01:39:43',	'KSGfsIvMybEwjJWignsJLXoCSDKX7X6nMaolcgkKeN8nj0EhGQCyRy8mYHDQ',	NULL),
(47,	'111111',	'www@wp.pl',	'$2y$10$uKaFBgd1WcjcCmvAFv0a9.LgIktj6yL6MHTpMBjVMvzdJxKEyBUg.',	'admin',	'2018-06-11 15:05:59',	'2018-06-11 15:05:59',	NULL,	NULL),
(48,	'superAdmin',	'wp@wp.wp',	'$2y$10$nuWNi.w8O/YCGQOw5wGwNuEgSnVNzfNPmimIRliLzCMFz0kKufNsm',	'admin',	'2018-06-19 15:15:33',	'2018-06-19 15:15:49',	NULL,	'https://i.ytimg.com/vi/KhwHR9pkoao/maxresdefault.jpg');

DROP TABLE IF EXISTS `users_privilages`;
CREATE TABLE `users_privilages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned DEFAULT NULL,
  `privilege` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users_privilages` (`id`, `users_id`, `privilege`, `created_at`, `updated_at`) VALUES
(1,	1,	'{\"users\":\"enable\",\"posts\":\"enable\",\"menu\":\"enable\",\"media\":\"enable\"}',	NULL,	'2018-06-08 02:18:08'),
(2,	2,	'{\n                    \"users\":\"disabled\",\n                    \"posts\":\"disabled\",\n                    \"menu\":\"disabled\",\n                    \"media\":\"disabled\"\n                }',	NULL,	'2018-06-11 01:36:08'),
(3,	16,	'{\n                    \"users\":\"disabled\",\n                    \"posts\":\"enable\",\n                    \"menu\":\"enable\",\n                    \"media\":\"enable\"\n                }',	NULL,	'2018-06-11 01:35:48'),
(4,	19,	'{\n                \"users\":\"disabled\",\n                \"posts\":\"disabled\",\n                \"menu\":\"disabled\",\n                \"media\":\"disabled\"\n            }',	NULL,	'2018-06-11 01:37:42'),
(5,	22,	'{\n                    \"users\":\"enable\",\n                    \"posts\":\"enable\",\n                    \"menu\":\"enable\",\n                    \"media\":\"enable\"\n                }',	NULL,	'2018-06-11 01:39:43'),
(15,	47,	'{\n                    \"users\":\"disabled\",\n                    \"posts\":\"enable\",\n                    \"menu\":\"disabled\",\n                    \"media\":\"disabled\"\n                }',	NULL,	NULL),
(16,	48,	'{\n                    \"users\":\"enable\",\n                    \"posts\":\"enable\",\n                    \"menu\":\"enable\",\n                    \"media\":\"enable\"\n                }',	NULL,	NULL);

DROP TABLE IF EXISTS `users_types`;
CREATE TABLE `users_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privileges` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users_types` (`id`, `type`, `privileges`) VALUES
(1,	'admin',	'{\n                    \"users\":\"disabled\",\n                    \"posts\":\"enable\",\n                    \"menu\":\"enable\",\n                    \"media\":\"enable\"\n                }'),
(2,	'normal',	'{\n                    \"users\":\"disabled\",\n                    \"posts\":\"enable\",\n                    \"menu\":\"disabled\",\n                    \"media\":\"disabled\"\n                }'),
(3,	'superAdmin',	'{\n                    \"users\":\"enable\",\n                    \"posts\":\"enable\",\n                    \"menu\":\"enable\",\n                    \"media\":\"enable\"\n                }'),
(4,	'suspended',	'{\n                    \"users\":\"disabled\",\n                    \"posts\":\"disabled\",\n                    \"menu\":\"disabled\",\n                    \"media\":\"disabled\"\n                }');

-- 2018-06-19 17:26:05
