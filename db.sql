/*
 Navicat Premium Data Transfer

 Source Server         : lophocsieunhan
 Source Server Type    : MySQL
 Source Server Version : 80013
 Source Host           : 123.30.249.224:3306
 Source Schema         : lophocsieunhan

 Target Server Type    : MySQL
 Target Server Version : 80013
 File Encoding         : 65001

 Date: 01/04/2020 12:08:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `key` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `group_key` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'Ds giao dịch hôm nay', 'Quản Trị', 'get-transactions', 'financial', NULL, NULL);
INSERT INTO `permissions` VALUES (2, 'Ds giao dịch hôm nay', 'Quản Trị', 'add-transaction', 'financial', NULL, NULL);
INSERT INTO `permissions` VALUES (3, 'Ds giao dịch hôm nay', 'Quản Trị', 'del-transaction', 'financial', NULL, NULL);
INSERT INTO `permissions` VALUES (4, 'Thông báo', 'Thông báo', 'get-notifies', 'notify', NULL, NULL);
INSERT INTO `permissions` VALUES (5, 'Thông báo', 'Thông báo', 'add-notify', 'notify', NULL, NULL);
INSERT INTO `permissions` VALUES (6, 'Thông báo', 'Thông báo', 'del-notify', 'notify', NULL, NULL);

-- ----------------------------
-- Table structure for role_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `permission_id`) USING BTREE,
  INDEX `role_permission_permission_id_foreign`(`permission_id`) USING BTREE,
  CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role_permission
-- ----------------------------
INSERT INTO `role_permission` VALUES (1, 1);
INSERT INTO `role_permission` VALUES (1, 2);
INSERT INTO `role_permission` VALUES (1, 3);
INSERT INTO `role_permission` VALUES (1, 4);
INSERT INTO `role_permission` VALUES (1, 5);
INSERT INTO `role_permission` VALUES (1, 6);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'quyền admin', NULL, NULL);

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `user_id`) USING BTREE,
  INDEX `user_role_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NULL DEFAULT NULL,
  `gender` tinyint(1) UNSIGNED NULL DEFAULT 0 COMMENT '0: nữ, 1: nam',
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT NULL COMMENT '1: đã xóa',
  `type` tinyint(1) NULL DEFAULT 1 COMMENT '0: admin 1: giáo viên 2: phụ huynh 3: ng đón hộ',
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `student_id` int(10) NULL DEFAULT NULL COMMENT 'null: ko phải phụ huynh',
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `salary` int(10) UNSIGNED NULL DEFAULT 0 COMMENT 'chỉ giáo viên mới có lương',
  `start_date` timestamp(0) NULL DEFAULT NULL COMMENT 'ngày đi làm của giáo viên',
  `feedback` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'cô Hà siêu nhân', '1992-08-17', 0, '0349650088', '$2b$10$Ep4iGkIbQv/CUV/rgQ7BIulBvyjeO0Wxgp5BaNsKMADz5Mv5bGrsO', NULL, NULL, 0, 0, '2020-01-17 18:15:03', '2020-01-17 18:15:01', NULL, '', 0, NULL, 'dsfsdf');
INSERT INTO `users` VALUES (3, 'ho ten me', NULL, 0, '0998', '$2y$10$gfw2byQUpgCjsI8RZLbps.0HERnx4nVUtmT7PoeStZrUTAzbV6Lza', NULL, NULL, NULL, 2, '2019-11-25 15:56:04', '2019-11-25 15:56:04', 7, 'fb me', 0, NULL, NULL);
INSERT INTO `users` VALUES (4, 'ho ten bo', NULL, 1, '0111', '', NULL, NULL, NULL, 2, '2019-11-25 15:56:04', '2019-11-25 15:56:04', 7, 'fb bo', 0, NULL, NULL);
INSERT INTO `users` VALUES (5, 'k', NULL, 0, '234234', '$2y$10$SzuBT8yAV034PkDLiapkaOVOxXVMDcqqnNYuZmyYI7cQ6ENY2owZ6', NULL, NULL, NULL, 2, '2019-11-25 16:02:34', '2019-11-25 16:02:34', 9, 'k', 0, NULL, NULL);
INSERT INTO `users` VALUES (6, 'k', NULL, 1, '1233', '', NULL, NULL, NULL, 2, '2019-11-25 16:02:34', '2019-11-25 16:02:34', 9, 'k', 0, NULL, NULL);
INSERT INTO `users` VALUES (7, 'ewrewr', NULL, 0, '11233', '$2y$10$KvTAcdF/P83HaDCiZyje/ONF1yFiGgBg3dCu.6a5qEAEzBzD/e3UG', NULL, NULL, 0, 2, '2019-11-27 18:21:11', '2019-11-27 18:21:11', 10, 'fb me', 0, NULL, NULL);
INSERT INTO `users` VALUES (8, 'wewe', NULL, 1, '546546', '$2y$10$8lLvR8oS7pYDvfCvVK0pgOjjCYl/0psACyLkLdrkCdXTHDW3/knL.', NULL, NULL, NULL, 2, '2019-11-27 16:31:00', '2019-11-27 16:31:00', 10, 'fb bo', 0, NULL, NULL);
INSERT INTO `users` VALUES (9, 'giao vien 1', '2019-11-27', 1, '0865432', '', NULL, NULL, 0, 1, '2019-11-27 17:42:35', '2019-11-27 17:42:35', NULL, NULL, 0, '2019-11-27 00:00:00', NULL);
INSERT INTO `users` VALUES (10, 'giao vien 2', '1919-11-27', 1, '0088888', '', 'dia chi 2', 'lua.solution@gmail.com', NULL, 1, '2019-11-28 08:44:48', '2019-11-28 08:44:50', NULL, 'facebook 2', 10000000, '2019-11-27 00:00:00', NULL);
INSERT INTO `users` VALUES (11, 'gv 3', '1990-11-27', 0, '033333', '$2y$10$3M/Mcnl3txuCXTtj/Wopx.1zFTHEE2GABduX2oHQvkZ.HPjtSnA0.', 'dia chi 3', 'lua.solution@gmail.com', NULL, 1, '2019-11-27 20:42:52', '2019-11-27 20:42:55', NULL, 'fb 3', 33333000, '2009-11-27 00:00:00', NULL);
INSERT INTO `users` VALUES (12, 'gv 4', '2000-11-27', 0, '324234', '$2y$10$BOn2QSQSYzXWExuHOamAQuTDLY/lj4IA.wirhVvfhQRA0W0vjscnO', NULL, NULL, 0, 1, '2019-11-27 17:47:10', '2019-11-27 17:47:10', NULL, NULL, 0, '2019-11-27 00:00:00', NULL);
INSERT INTO `users` VALUES (13, 'zzzz', '2015-11-27', 1, '11111', '$2y$10$9cWrz/DZISvI2B9mpTFbgOQ4x2lhzi7tCZE02jkU1D9PSx17VHwfK', '23423a', 'lua.solution@gmail.com', NULL, 1, '2019-11-27 20:43:28', '2019-11-27 20:43:28', NULL, 'dasdasd', 234234, '2018-11-27 00:00:00', NULL);
INSERT INTO `users` VALUES (14, '2222', '1999-01-01', 0, '345345', '', NULL, NULL, NULL, 3, '2019-12-25 15:02:51', '2019-12-25 15:02:50', 10, NULL, 0, '1999-01-01 00:00:00', NULL);
INSERT INTO `users` VALUES (15, 'Đinh Thu Hà', NULL, 0, '0904329231', '$2y$10$bkW4XSPVLTAvvFRlT1XJhe5fGbtRJuzIj450VMsAvAT3u1Irz8JXK', NULL, NULL, NULL, 2, '2020-01-19 20:12:34', '2020-01-19 20:12:34', 13, 'https://www.facebook.com/dinh.thuha.374', 0, NULL, NULL);
INSERT INTO `users` VALUES (16, 'Ngô Đức Lâm', NULL, 1, '', '$2y$10$XFpOQDktbWZY9XproFsUjuyyTlEgGZafbsli8oMtw9rp.9hpLMZpy', NULL, NULL, NULL, 2, '2020-01-19 20:12:34', '2020-01-19 20:12:34', 13, 'https://www.facebook.com/profile.php?id=100045703084074', 0, NULL, NULL);
INSERT INTO `users` VALUES (17, 'Đinh Thu Hà', NULL, 0, '0904329231', '$2y$10$2kuNbSx1K0hDLAI7gpZq/udB8lrr7s4zXzVx5VWaE1TCJZR9wkTK6', NULL, NULL, NULL, 2, '2020-01-19 20:12:36', '2020-01-19 20:12:36', 14, 'https://www.facebook.com/dinh.thuha.374', 0, NULL, NULL);
INSERT INTO `users` VALUES (18, 'Ngô Đức Lâm', NULL, 1, '', '$2y$10$J80bWegvB29Ot1VOaFqkPOGpU4b1BCB2VsISGp0QjnLmRAUXTtme6', NULL, NULL, NULL, 2, '2020-01-19 20:12:36', '2020-01-19 20:12:36', 14, 'https://www.facebook.com/profile.php?id=100045703084074', 0, NULL, NULL);
INSERT INTO `users` VALUES (19, 'Nguyễn Thùy Linh', NULL, 0, '0983031084', '$2y$10$e.0eBHgLW1dpctaTjWuGVei5Mc1thqod8gah.EBKqEnxDVYP/RkKm', NULL, NULL, NULL, 2, '2020-01-19 20:18:32', '2020-01-19 20:18:32', 15, 'https://www.facebook.com/profile.php?id=100012681730114', 0, NULL, NULL);
INSERT INTO `users` VALUES (20, 'Nguyễn Đức Long', NULL, 1, '0983058158', '$2y$10$UPNWU.6npJnHnwNwtXqDcuvs.0.fnf5ir7bm03yMLNtdE.gN0Z8HK', NULL, NULL, NULL, 2, '2020-01-19 20:18:32', '2020-01-19 20:18:32', 15, 'https://www.facebook.com/longnd310', 0, NULL, NULL);
INSERT INTO `users` VALUES (21, 'Nguyễn Đức Long', NULL, 0, '0983058158', '$2y$10$0RZ/6WtWXnnW31jM40ByhO3Mgvyc10C2WMxP1/pBMaP8DmmfiPU/O', NULL, NULL, NULL, 3, '2020-01-19 20:18:33', '2020-01-19 20:18:33', 15, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (22, 'Phạm Thu Hoài', NULL, 0, '0963456689', '$2y$10$/i7SnjlfpEHjeiVma7ecaeu7yprikn5fQnhxpRtdIYMMo2JlFvDhm', NULL, NULL, NULL, 2, '2020-01-19 20:24:11', '2020-01-19 20:24:11', 16, 'https://www.facebook.com/thuhoai.pham.33', 0, NULL, NULL);
INSERT INTO `users` VALUES (23, 'Chu Thế Ninh', NULL, 1, '0915026531', '$2y$10$HQVO8Bhyh.yz0hYbK/NkTO4yr8D1ODekrF4t/r0m1bhut02joiHqG', NULL, NULL, NULL, 2, '2020-01-19 20:24:11', '2020-01-19 20:24:11', 16, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (24, 'Chu Thế Ninh', NULL, 0, '0915026531', '$2y$10$B./35MydtyBuC3QLUltGA.GtQK/UYeyCTQ80/UcvnK/N543KgWVci', NULL, NULL, NULL, 3, '2020-01-19 20:24:11', '2020-01-19 20:24:11', 16, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (25, 'Lê Minh Hạnh', NULL, 0, '0983886369', '$2y$10$..woDHmbvDBlfiqcacJsluIG.nJAwe8Iwy87Hfx71J/tFOryjQeNK', NULL, NULL, NULL, 2, '2020-01-19 20:27:07', '2020-01-19 20:27:07', 17, 'https://www.facebook.com/profile.php?id=100005522831154', 0, NULL, NULL);
INSERT INTO `users` VALUES (26, 'Lê Minh Hạnh', NULL, 0, '0983886369', '$2y$10$pYq9FGD.oaiHuE0ZmzREOOlyeLH7Bec8up5J.nLRxXHZNAHqAAVzS', NULL, NULL, NULL, 2, '2020-01-19 20:27:07', '2020-01-19 20:27:07', 18, 'https://www.facebook.com/profile.php?id=100005522831154', 0, NULL, NULL);
INSERT INTO `users` VALUES (27, 'Nguyễn Ngọc Khoa', NULL, 1, '0904144172', '$2y$10$qnMBlZgjEPt6IN0u4J3uTuk9sRrbxbXfVRyJ6dL7Kl1SRmU7BcD9e', NULL, NULL, NULL, 2, '2020-01-19 20:27:07', '2020-01-19 20:27:07', 17, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (28, 'Nguyễn Ngọc Khoa', NULL, 1, '0904144172', '$2y$10$EoMIYhWDx05wL/hnkC/xaekck0V/9w6jVIFCp0JML/bQmI.WvEKnW', NULL, NULL, NULL, 2, '2020-01-19 20:27:07', '2020-01-19 20:27:07', 18, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (29, 'Lê Minh Hạnh', NULL, 0, '0983886369', '$2y$10$qq15x14FEaDfNtlpvs3dAubcnhRx5mGZ9kmGCPu/tYrzazoRtrL0W', NULL, NULL, NULL, 3, '2020-01-19 20:27:08', '2020-01-19 20:27:08', 17, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (30, 'Lê Minh Hạnh', NULL, 0, '0983886369', '$2y$10$NWZz2nPL5kfvBrrzUFZmxuDD4pNGPnI5Amdi6QycNZxNX5pOjaAdq', NULL, NULL, NULL, 3, '2020-01-19 20:27:08', '2020-01-19 20:27:08', 18, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (31, 'Nguyễn Phương Dung', NULL, 0, '0904262977', '$2y$10$92/ckFRi4SOT7gPw.AVNsO5uMnEdnB5/XVrAnD1camKvJKQ46f/2u', NULL, NULL, NULL, 2, '2020-01-19 20:31:44', '2020-01-19 20:31:44', 19, 'https://www.facebook.com/phuongdung.nguyen.330', 0, NULL, NULL);
INSERT INTO `users` VALUES (32, 'Vũ Trọng Hiếu', NULL, 1, '0983262977', '$2y$10$Z2Domv7BTJLEWrvBSSgSyu/G/VIuQg939tVBKp4CZR3G9kDuiGOKa', NULL, NULL, NULL, 2, '2020-01-19 20:31:44', '2020-01-19 20:31:44', 19, 'https://www.facebook.com/hieu.vuhieu.98', 0, NULL, NULL);
INSERT INTO `users` VALUES (33, 'Nguyễn Phương Dung', NULL, 0, '0904262977', '$2y$10$jBqGePcVb07Zo3ey0oq0IupUnbQVKPcqkj0uIjUffQu/bGhpQQ8rO', NULL, NULL, NULL, 3, '2020-01-19 20:31:44', '2020-01-19 20:31:44', 19, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (34, 'Đặng Thị Huệ', NULL, 0, '0918857373', '$2y$10$qtEMMQQ///tjRgdoo2tMi.5oT95Bjn.7qTCqkiHDBr5RyZ6HCsZae', NULL, NULL, NULL, 2, '2020-01-19 20:35:46', '2020-01-19 20:35:46', 20, 'https://www.facebook.com/hue.dang.902604?sk=wall&fref=gs&dti=1510577542373186&hc_location=group_dialog', 0, NULL, NULL);
INSERT INTO `users` VALUES (35, 'Trần Quang Hòa', NULL, 1, '0918803136', '$2y$10$Y.gbT2I/h99sjIHANLB/oejhK2sKIAy4oJq1JApTw6EsNURWLKffO', NULL, NULL, NULL, 2, '2020-01-19 20:35:47', '2020-01-19 20:35:47', 20, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (36, 'Đặng Thị Huệ', NULL, 0, '0918857373', '$2y$10$3wIRleBKCGeVIFixh9.gv.NBf5e6U5wt/mBMLyhQmumbSySvsb4UC', NULL, NULL, NULL, 3, '2020-01-19 20:35:47', '2020-01-19 20:35:47', 20, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (37, 'Vũ Thị Hải', NULL, 0, '0977695094', '$2y$10$T0VMSTuPCTM6OdN8t4ivGuouC87wKvaDgs5zAZqqdjDOtncU51xlm', NULL, NULL, NULL, 2, '2020-01-19 20:40:50', '2020-01-19 20:40:50', 21, 'https://www.facebook.com/tieuho.ho.35', 0, NULL, NULL);
INSERT INTO `users` VALUES (38, 'Nguyễn Đình Huế', NULL, 1, '0833121000', '$2y$10$s5vQEBJNcM03ns74Yi/rCul2/23goBzXBYhRqxbNQN3lO3C/ixs/y', NULL, NULL, NULL, 2, '2020-01-19 20:40:50', '2020-01-19 20:40:50', 21, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (39, 'Nguyễn Đình Huế', NULL, 0, '0833121000', '$2y$10$rQleu7h8N8E3kO0h0lIv2.ag9ubHRNI8jrcjJ9rx8cf84siHSV4We', NULL, NULL, NULL, 3, '2020-01-19 20:40:50', '2020-01-19 20:40:50', 21, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (40, 'Nguyễn Thanh Trà', NULL, 0, '0982115025', '$2y$10$sN1cCshtjMUn/DpY63qKleyXbnmCfOqhtMgCJKTryvvO8hxI4s1ta', NULL, NULL, NULL, 2, '2020-01-19 20:43:04', '2020-01-19 20:43:04', 22, 'https://www.facebook.com/tra.nguyen.5895', 0, NULL, NULL);
INSERT INTO `users` VALUES (41, 'Nguyễn Thanh Trà', NULL, 0, '0982115025', '$2y$10$4e8NWCLYW5cJn/lzYi6maeAh0VznbUTpIM30OpgQq6sZnLL37sdE.', NULL, NULL, NULL, 3, '2020-01-19 20:43:04', '2020-01-19 20:43:04', 22, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (42, 'Nguyễn Thị Thanh Xuân', NULL, 0, '0387889910', '$2y$10$vTd/sDC6j/kj7Ea3e6KYduw83Cd3hjketcW3b/73nXxn2w80s8GRu', NULL, NULL, NULL, 2, '2020-01-19 20:45:16', '2020-01-19 20:45:16', 23, 'https://www.facebook.com/profile.php?id=100008489984688', 0, NULL, NULL);
INSERT INTO `users` VALUES (43, 'Đặng Văn Bằng', NULL, 1, '0989045507', '$2y$10$vo2OuK7lDb/hwvtGaBu/MOHaSDsVtuff6YVeS65XKPo5PO.TPaCS2', NULL, NULL, NULL, 2, '2020-01-19 20:45:16', '2020-01-19 20:45:16', 23, 'https://www.facebook.com/bang.dang.121', 0, NULL, NULL);
INSERT INTO `users` VALUES (44, 'Nguyễn Thị Thanh Xuân', NULL, 0, '0387889910', '$2y$10$oQzdXg7p/Ja./oK8jgK9/uj/F6T4/CPv21qfA6Io5BPvQgQhZbksC', NULL, NULL, NULL, 3, '2020-01-19 20:45:17', '2020-01-19 20:45:17', 23, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (45, 'Đặng Thu Trang', NULL, 0, '0946913456', '$2y$10$lOcwgu48PQQOdPCZ/wdQI.AYK2yZaO4tHsvacuQ9siGrrRWTFFMgq', NULL, NULL, NULL, 2, '2020-01-19 20:50:29', '2020-01-19 20:50:29', 24, 'https://www.facebook.com/dangthutrang2611', 0, NULL, NULL);
INSERT INTO `users` VALUES (46, 'Lã quý chính', NULL, 1, '0972563456', '$2y$10$77YgvbLypjK29jq32Zrsquo1QLEVFMRTPR222Tqsw2Z0pmV53qFLa', NULL, NULL, NULL, 2, '2020-01-19 20:50:29', '2020-01-19 20:50:29', 24, 'https://www.facebook.com/chinh.la87', 0, NULL, NULL);
INSERT INTO `users` VALUES (47, 'Đặng Thu Trang', NULL, 0, '0946913456', '$2y$10$C5KsfJ/TMdowihiC51zYs.lwde5WOBsO0yziOiC6t/f9NjnTBb77i', NULL, NULL, NULL, 3, '2020-01-19 20:50:29', '2020-01-19 20:50:29', 24, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (48, 'Mai Ly', NULL, 0, '0943837679', '$2y$10$/sJYh77IJilYe5vIX33BWe9LHIh/gM88i8foQHKd1aG527WvzBYA.', NULL, NULL, NULL, 2, '2020-01-19 20:54:12', '2020-01-19 20:54:12', 25, 'https://www.facebook.com/opalmaily', 0, NULL, NULL);
INSERT INTO `users` VALUES (49, 'Nguyễn Minh Quân', NULL, 1, '', '$2y$10$HMA4J9mLE9DKosGoRYC9GOv03pd5GHLNvb/2kBCicy14PeDHgBSjK', NULL, NULL, NULL, 2, '2020-01-19 20:54:13', '2020-01-19 20:54:13', 25, 'https://www.facebook.com/minhquan86', 0, NULL, NULL);
INSERT INTO `users` VALUES (50, 'Mai Ly', NULL, 0, '0943837679', '$2y$10$0w54WjkAZwd0Xfe2Oz/2Cu7YZFT3inz8GSRdisbLX.4tKzvQ94/Ju', NULL, NULL, NULL, 3, '2020-01-19 20:54:13', '2020-01-19 20:54:13', 25, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (51, 'Nguyễn Thanh Hà', NULL, 0, '0974116866', '$2y$10$O456.HSemAbp67CXmnBN2ei1vn85FsAYBllcI2zwhrGTVrUyJV7lW', NULL, NULL, NULL, 2, '2020-01-19 20:59:31', '2020-01-19 20:59:31', 26, 'https://www.facebook.com/profile.php?id=100004556430210', 0, NULL, NULL);
INSERT INTO `users` VALUES (52, 'Bùi Ngọc Thắng', NULL, 1, '0904958388', '$2y$10$i39xTAzzzx7BczeeM0MqDuu57rHRBbQg.kc29XMKitYyx0nwtARqi', NULL, NULL, NULL, 2, '2020-01-19 20:59:32', '2020-01-19 20:59:32', 26, 'https://www.facebook.com/ngocthang.bui.5', 0, NULL, NULL);
INSERT INTO `users` VALUES (53, 'Nguyễn Thanh Hà', NULL, 0, '0974116866', '$2y$10$WHWaVNmdChr/tALcAUKSrugDucJpy2oXx3dfgUHZHOQH/JTQFYM72', NULL, NULL, NULL, 3, '2020-01-19 20:59:32', '2020-01-19 20:59:32', 26, '', 0, NULL, NULL);
INSERT INTO `users` VALUES (54, 'Phạm Thị Kim Huệ', NULL, 0, '0982009053', '$2y$10$IrTahvqGfC/sHjqGNdLkNeXGvz02Q3zJ9a1Vmwm5c/kufjaqpnaxi', NULL, NULL, NULL, 2, '2020-01-19 21:03:00', '2020-01-19 21:03:00', 27, 'https://www.facebook.com/hue.beu.1', 0, NULL, NULL);
INSERT INTO `users` VALUES (55, 'Phạm Bá Chiến', NULL, 1, '0972062668', '$2y$10$i6PZt9iTqHh7Zwy3zR.PtuLiFyzdxKyuuTlqNQXLYygR/QC7219gC', NULL, NULL, NULL, 2, '2020-01-19 21:03:01', '2020-01-19 21:03:01', 27, 'https://www.facebook.com/bachien.phan', 0, NULL, NULL);
INSERT INTO `users` VALUES (56, 'Phạm Thị Kim Huệ', NULL, 0, '0982009053', '$2y$10$5vNSydnHqGdrh58qsEVLQuxB6Ob5fA65YjMxcVsXNd/DDAj0ZaHOS', NULL, NULL, NULL, 3, '2020-01-19 21:03:01', '2020-01-19 21:03:01', 27, '', 0, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
