/*
 Navicat Premium Data Transfer

 Source Server         : ubuntu vultr
 Source Server Type    : MySQL
 Source Server Version : 100038
 Source Host           : 139.180.195.15:3306
 Source Schema         : balance

 Target Server Type    : MySQL
 Target Server Version : 100038
 File Encoding         : 65001

 Date: 01/04/2020 15:06:20
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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

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
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT NULL COMMENT '1: đã xóa',
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 67 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '1992-08-17', 0, '0918274973', '$2b$10$Ep4iGkIbQv/CUV/rgQ7BIulBvyjeO0Wxgp5BaNsKMADz5Mv5bGrsO', NULL, 0, '2020-04-01 07:34:12', '2020-04-01 07:34:12');
INSERT INTO `users` VALUES (43, 'Đặng Văn Bằng', NULL, 1, '0989045507', '$2y$10$vo2OuK7lDb/hwvtGaBu/MOHaSDsVtuff6YVeS65XKPo5PO.TPaCS2', NULL, NULL, '2020-01-19 20:45:16', '2020-01-19 20:45:16');
INSERT INTO `users` VALUES (59, 'test', NULL, 0, '0922224345', '$2y$10$sxxRY6onKBpuWvoU.zA3H.GqY86DvtlCn2oVDWulsMzbMFEyxkTLS', 'a@gmail.com', NULL, '2020-04-01 07:53:05', '2020-04-01 07:53:05');
INSERT INTO `users` VALUES (60, 'test', NULL, 0, '0922224345', '$2y$10$J.Hns1AJBNQPhbqbKX985.tQHBXp97v//SagLbLR3KrFcJh6nYjeS', 'a@gmail.com', NULL, '2020-04-01 07:54:25', '2020-04-01 07:54:25');
INSERT INTO `users` VALUES (61, 'test', NULL, 0, '0922224345', '$2y$10$vS8XkBmdoLVI5rom0eNA5OOq62bad176p6..jzwRCy9bK6Lj2yLDm', 'a@gmail.com', NULL, '2020-04-01 07:54:37', '2020-04-01 07:54:37');
INSERT INTO `users` VALUES (62, 'test', NULL, 0, '0922224345', '$2y$10$ywZwLSvcveJwDTbe0DQ.uebcMmw4gkRzNN/6Hbl22sngnkE.VGkwS', 'a@gmail.com', NULL, '2020-04-01 07:54:54', '2020-04-01 07:54:54');
INSERT INTO `users` VALUES (63, 'test', NULL, 0, '0922224345', '$2y$10$xNzVTu0pCJq2cqcwML8ADuiAZZ18dmHA6LJ0pwaB8Wa2B53Euhq7.', 'a@gmail.com', NULL, '2020-04-01 07:55:13', '2020-04-01 07:55:13');
INSERT INTO `users` VALUES (64, 'test', NULL, 0, '0922224345', '$2y$10$3PJRvcvHVYC/ceApeVYvV.XT.0LVW4Cv4TkhwQQvjiiSISeYm8dIy', 'a@gmail.com', NULL, '2020-04-01 07:55:26', '2020-04-01 07:55:26');
INSERT INTO `users` VALUES (65, 'test', NULL, 0, '0922224345', '$2y$10$k47OshgPn8a/df7944PnUOL7XfXnLMp5d1ZcXdkiU5Vm5C0dB4cAS', 'a@gmail.com', NULL, '2020-04-01 07:55:35', '2020-04-01 07:55:35');
INSERT INTO `users` VALUES (66, 'test', NULL, 0, '0922224345', '$2y$10$RiN1QrkJn5jO8/tiVQ/LMOeLtUaG4GgCtvfGpXezM/LvCZX66nsQ.', 'a@gmail.com', NULL, '2020-04-01 07:57:43', '2020-04-01 07:57:43');

SET FOREIGN_KEY_CHECKS = 1;
