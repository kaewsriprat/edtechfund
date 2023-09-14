/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : sampledb

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 30/08/2023 15:03:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for divisions
-- ----------------------------
DROP TABLE IF EXISTS `divisions`;
CREATE TABLE `divisions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `division_abbr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `parent` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hierarchy` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `province_id` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `has_child` int(11) NULL DEFAULT NULL,
  `active` int(11) NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_date` datetime(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 140 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of divisions
-- ----------------------------
INSERT INTO `divisions` VALUES (1, 'กระทรวงศึกษาธิการ', 'ศธ.', '1', '0', '0', '10', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (2, 'สำนักงานปลัดกระทรวงศึกษาธิการ', 'สป.ศธ.', '2', '1', '1', '10', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (3, 'สำนักงานคณะกรรมการการศึกษาขั้นพื้นฐาน', 'สพฐ.', '2', '1', '1', '10', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (4, 'สำนักงานคณะกรรมการการอาชีวศึกษา', 'สอศ.', '2', '1', '1', '10', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (5, 'สำนักงานคุรุสภา', 'สคส.', '2', '1', '1', '10', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (6, 'สำนักงานคณะกรรมการส่งเสริมการศึกษาเอกชน', 'สช.', '2', '1', '1', '10', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (7, 'กรมส่งเสริมการเรียนรู้', 'สกร.', '2', '1', '1', '10', 0, 0, NULL, '2023-06-27 17:43:08');
INSERT INTO `divisions` VALUES (8, 'สำนักงานศึกษาธิการภาค 1', 'ศธภ.1', '3', '2', '2,1', '13', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (9, 'สำนักงานศึกษาธิการภาค 2', 'ศธภ.2', '3', '2', '2,1', '16', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (10, 'สำนักงานศึกษาธิการภาค 3', 'ศธภ.3', '3', '2', '2,1', '24', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (11, 'สำนักงานศึกษาธิการภาค 4', 'ศธภ.4', '3', '2', '2,1', '70', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (12, 'สำนักงานศึกษาธิการภาค 5', 'ศธภ.5', '3', '2', '2,1', '76', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (13, 'สำนักงานศึกษาธิการภาค 6', 'ศธภ.6', '3', '2', '2,1', '90', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (14, 'สำนักงานศึกษาธิการภาค 7', 'ศธภ.7', '3', '2', '2,1', '83', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (15, 'สำนักงานศึกษาธิการภาค 8', 'ศธภ.8', '3', '2', '2,1', '95', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (16, 'สำนักงานศึกษาธิการภาค 9', 'ศธภ.9', '3', '2', '2,1', '20', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (17, 'สำนักงานศึกษาธิการภาค 10', 'ศธภ.10', '3', '2', '2,1', '41', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (18, 'สำนักงานศึกษาธิการภาค 11', 'ศธภ.11', '3', '2', '2,1', '47', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (19, 'สำนักงานศึกษาธิการภาค 12', 'ศธภ.12', '3', '2', '2,1', '40', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (20, 'สำนักงานศึกษาธิการภาค 13', 'ศธภ.13', '3', '2', '2,1', '34', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (21, 'สำนักงานศึกษาธิการภาค 14', 'ศธภ.14', '3', '2', '2,1', '30', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (22, 'สำนักงานศึกษาธิการภาค 15', 'ศธภ.15', '3', '2', '2,1', '50', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (23, 'สำนักงานศึกษาธิการภาค 16', 'ศธภ.16', '3', '2', '2,1', '57', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (24, 'สำนักงานศึกษาธิการภาค 17', 'ศธภ.17', '3', '2', '2,1', '65', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (25, 'สำนักงานศึกษาธิการภาค 18', 'ศธภ.18', '3', '2', '2,1', '62', 1, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (26, 'สำนักงานศึกษาธิการจังหวัดกรุงเทพมหานคร', 'ศธจ.กทม.', '5', '9', '9,2,1', '10', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (27, 'สำนักงานศึกษาธิการจังหวัดนนทบุรี', 'ศธจ.นนทบุรี', '5', '9', '9,2,1', '12', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (28, 'สำนักงานศึกษาธิการจังหวัดปทุมธานี', 'ศธจ.ปทุมธานี', '5', '9', '9,2,1', '13', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (29, 'สำนักงานศึกษาธิการจังหวัดพระนครศรีอยุธยา', 'ศธจ.พระนครศรีอยุธยา', '5', '8', '8,2,1', '14', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (30, 'สำนักงานศึกษาธิการจังหวัดสระบุรี', 'ศธจ.สระบุรี', '5', '8', '8,2,1', '19', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (31, 'สำนักงานศึกษาธิการจังหวัดชัยนาท', 'ศธจ.ชัยนาท', '5', '8', '8,2,1', '18', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (32, 'สำนักงานศึกษาธิการจังหวัดลพบุรี', 'ศธจ.ลพบุรี', '5', '8', '8,2,1', '16', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (33, 'สำนักงานศึกษาธิการจังหวัดสิงห์บุรี', 'ศธจ.สิงห์บุรี', '5', '8', '8,2,1', '17', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (34, 'สำนักงานศึกษาธิการจังหวัดอ่างทอง', 'ศธจ.อ่างทอง', '5', '8', '8,2,1', '15', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (35, 'สำนักงานศึกษาธิการจังหวัดฉะเชิงเทรา', 'ศธจ.ฉะเชิงเทรา', '5', '15', '15,2,1', '24', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (36, 'สำนักงานศึกษาธิการจังหวัดนครนายก', 'ศธจ.นครนายก', '5', '16', '16,2,1', '26', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (37, 'สำนักงานศึกษาธิการจังหวัดปราจีนบุรี', 'ศธจ.ปราจีนบุรี', '5', '16', '16,2,1', '25', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (38, 'สำนักงานศึกษาธิการจังหวัดสมุทรปราการ', 'ศธจ.สมุทรปราการ', '5', '9', '9,2,1', '11', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (39, 'สำนักงานศึกษาธิการจังหวัดสระแก้ว', 'ศธจ.สระแก้ว', '5', '16', '16,2,1', '27', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (40, 'สำนักงานศึกษาธิการจังหวัดกาญจนบุรี', 'ศธจ.กาญจนบุรี', '5', '10', '10,2,1', '71', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (41, 'สำนักงานศึกษาธิการจังหวัดนครปฐม', 'ศธจ.นครปฐม', '5', '9', '9,2,1', '73', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (42, 'สำนักงานศึกษาธิการจังหวัดราชบุรี', 'ศธจ.ราชบุรี', '5', '10', '10,2,1', '70', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (43, 'สำนักงานศึกษาธิการจังหวัดสุพรรณบุรี', 'ศธจ.สุพรรณบุรี', '5', '10', '10,2,1', '72', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (44, 'สำนักงานศึกษาธิการจังหวัดประจวบคีรีขันธ์', 'ศธจ.ประจวบคีรีขันธ์', '5', '11', '11,2,1', '77', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (45, 'สำนักงานศึกษาธิการจังหวัดสมุทรสาคร', 'ศธจ.สมุทรสาคร', '5', '11', '11,2,1', '74', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (46, 'สำนักงานศึกษาธิการจังหวัดเพชรบุรี', 'ศธจ.เพชรบุรี', '5', '11', '11,2,1', '76', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (47, 'สำนักงานศึกษาธิการจังหวัดสมุทรสงคราม', 'ศธจ.สมุทรสงคราม', '5', '11', '11,2,1', '75', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (48, 'สำนักงานศึกษาธิการจังหวัดชุมพร', 'ศธจ.ชุมพร', '5', '12', '12,2,1', '86', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (49, 'สำนักงานศึกษาธิการจังหวัดสุราษฎร์ธานี', 'ศธจ.สุราษฎร์ธานี', '5', '12', '12,2,1', '84', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (50, 'สำนักงานศึกษาธิการจังหวัดพัทลุง', 'ศธจ.พัทลุง', '5', '12', '12,2,1', '93', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (51, 'สำนักงานศึกษาธิการจังหวัดนครศรีธรรมราช', 'ศธจ.นครศรีธรรมราช', '5', '12', '12,2,1', '80', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (52, 'สำนักงานศึกษาธิการจังหวัดระนอง', 'ศธจ.ระนอง', '5', '13', '13,2,1', '85', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (53, 'สำนักงานศึกษาธิการจังหวัดกระบี่', 'ศธจ.กระบี่', '5', '13', '13,2,1', '81', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (54, 'สำนักงานศึกษาธิการจังหวัดพังงา', 'ศธจ.พังงา', '5', '13', '13,2,1', '82', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (55, 'สำนักงานศึกษาธิการจังหวัดภูเก็ต', 'ศธจ.ภูเก็ต', '5', '13', '13,2,1', '83', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (56, 'สำนักงานศึกษาธิการจังหวัดตรัง', 'ศธจ.ตรัง', '5', '13', '13,2,1', '92', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (57, 'สำนักงานศึกษาธิการจังหวัดนราธิวาส', 'ศธจ.นราธิวาส', '5', '14', '14,2,1', '96', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (58, 'สำนักงานศึกษาธิการจังหวัดปัตตานี', 'ศธจ.ปัตตานี', '5', '14', '14,2,1', '94', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (59, 'สำนักงานศึกษาธิการจังหวัดยะลา', 'ศธจ.ยะลา', '5', '14', '14,2,1', '95', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (60, 'สำนักงานศึกษาธิการจังหวัดสตูล', 'ศธจ.สตูล', '5', '13', '13,2,1', '91', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (61, 'สำนักงานศึกษาธิการจังหวัดสงขลา', 'ศธจ.สงขลา', '5', '12', '12,2,1', '90', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (62, 'สำนักงานศึกษาธิการจังหวัดชลบุรี', 'ศธจ.ชลบุรี', '5', '15', '15,2,1', '20', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (63, 'สำนักงานศึกษาธิการจังหวัดตราด', 'ศธจ.ตราด', '5', '16', '16,2,1', '23', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (64, 'สำนักงานศึกษาธิการจังหวัดระยอง', 'ศธจ.ระยอง', '5', '15', '15,2,1', '21', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (65, 'สำนักงานศึกษาธิการจังหวัดจันทบุรี', 'ศธจ.จันทบุรี', '5', '16', '16,2,1', '22', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (66, 'สำนักงานศึกษาธิการจังหวัดบึงกาฬ', 'ศธจ.บึงกาฬ', '5', '17', '17,2,1', '38', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (67, 'สำนักงานศึกษาธิการจังหวัดเลย', 'ศธจ.เลย', '5', '17', '17,2,1', '42', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (68, 'สำนักงานศึกษาธิการจังหวัดหนองคาย', 'ศธจ.หนองคาย', '5', '17', '17,2,1', '43', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (69, 'สำนักงานศึกษาธิการจังหวัดอุดรธานี', 'ศธจ.อุดรธานี', '5', '17', '17,2,1', '41', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (70, 'สำนักงานศึกษาธิการจังหวัดหนองบัวลำภู', 'ศธจ.หนองบัวลำภู', '5', '17', '17,2,1', '39', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (71, 'สำนักงานศึกษาธิการจังหวัดนครพนม', 'ศธจ.นครพนม', '5', '18', '18,2,1', '48', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (72, 'สำนักงานศึกษาธิการจังหวัดมุกดาหาร', 'ศธจ.มุกดาหาร', '5', '18', '18,2,1', '49', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (73, 'สำนักงานศึกษาธิการจังหวัดสกลนคร', 'ศธจ.สกลนคร', '5', '18', '18,2,1', '47', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (74, 'สำนักงานศึกษาธิการจังหวัดขอนแก่น', 'ศธจ.ขอนแก่น', '5', '19', '19,2,1', '40', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (75, 'สำนักงานศึกษาธิการจังหวัดมหาสารคาม', 'ศธจ.มหาสารคาม', '5', '19', '19,2,1', '44', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (76, 'สำนักงานศึกษาธิการจังหวัดร้อยเอ็ด', 'ศธจ.ร้อยเอ็ด', '5', '19', '19,2,1', '45', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (77, 'สำนักงานศึกษาธิการจังหวัดกาฬสินธุ์', 'ศธจ.กาฬสินธุ์', '5', '19', '19,2,1', '46', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (78, 'สำนักงานศึกษาธิการจังหวัดยโสธร', 'ศธจ.ยโสธร', '5', '21', '21,2,1', '35', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (79, 'สำนักงานศึกษาธิการจังหวัดศรีสะเกษ', 'ศธจ.ศรีสะเกษ', '5', '21', '21,2,1', '33', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (80, 'สำนักงานศึกษาธิการจังหวัดอำนาจเจริญ', 'ศธจ.อำนาจเจริญ', '5', '21', '21,2,1', '37', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (81, 'สำนักงานศึกษาธิการจังหวัดอุบลราชธานี', 'ศธจ.อุบลราชธานี', '5', '21', '21,2,1', '34', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (82, 'สำนักงานศึกษาธิการจังหวัดนครราชสีมา', 'ศธจ.นครราชสีมา', '5', '20', '20,2,1', '30', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (83, 'สำนักงานศึกษาธิการจังหวัดชัยภูมิ', 'ศธจ.ชัยภูมิ', '5', '20', '20,2,1', '36', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (84, 'สำนักงานศึกษาธิการจังหวัดบุรีรัมย์', 'ศธจ.บุรีรัมย์', '5', '20', '20,2,1', '31', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (85, 'สำนักงานศึกษาธิการจังหวัดสุรินทร์', 'ศธจ.สุรินทร์', '5', '20', '20,2,1', '32', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (86, 'สำนักงานศึกษาธิการจังหวัดเชียงใหม่', 'ศธจ.เชียงใหม่', '5', '22', '22,2,1', '50', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (87, 'สำนักงานศึกษาธิการจังหวัดลำพูน', 'ศธจ.ลำพูน', '5', '22', '22,2,1', '51', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (88, 'สำนักงานศึกษาธิการจังหวัดแม่ฮ่องสอน', 'ศธจ.แม่ฮ่องสอน', '5', '22', '22,2,1', '58', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (89, 'สำนักงานศึกษาธิการจังหวัดลำปาง', 'ศธจ.ลำปาง', '5', '22', '22,2,1', '52', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (90, 'สำนักงานศึกษาธิการจังหวัดเชียงราย', 'ศธจ.เชียงราย', '5', '23', '23,2,1', '57', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (91, 'สำนักงานศึกษาธิการจังหวัดน่าน', 'ศธจ.น่าน', '5', '23', '23,2,1', '55', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (92, 'สำนักงานศึกษาธิการจังหวัดพะเยา', 'ศธจ.พะเยา', '5', '23', '23,2,1', '56', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (93, 'สำนักงานศึกษาธิการจังหวัดแพร่', 'ศธจ.แพร่', '5', '23', '23,2,1', '54', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (94, 'สำนักงานศึกษาธิการจังหวัดตาก', 'ศธจ.ตาก', '5', '24', '24,2,1', '63', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (95, 'สำนักงานศึกษาธิการจังหวัดพิษณุโลก', 'ศธจ.พิษณุโลก', '5', '24', '24,2,1', '65', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (96, 'สำนักงานศึกษาธิการจังหวัดอุตรดิตถ์', 'ศธจ.อุตรดิตถ์', '5', '24', '24,2,1', '53', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (97, 'สำนักงานศึกษาธิการจังหวัดเพชรบูรณ์', 'ศธจ.เพชรบูรณ์', '5', '24', '24,2,1', '67', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (98, 'สำนักงานศึกษาธิการจังหวัดสุโขทัย', 'ศธจ.สุโขทัย', '5', '24', '24,2,1', '64', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (99, 'สำนักงานศึกษาธิการจังหวัดกำแพงเพชร', 'ศธจ.กำแพงเพชร', '5', '25', '25,2,1', '62', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (100, 'สำนักงานศึกษาธิการจังหวัดพิจิตร', 'ศธจ.พิจิตร', '5', '25', '25,2,1', '66', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (101, 'สำนักงานศึกษาธิการจังหวัดนครสวรรค์', 'ศธจ.นครสวรรค์', '5', '25', '25,2,1', '60', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (102, 'สำนักงานศึกษาธิการจังหวัดอุทัยธานี', 'ศธจ.อุทัยธานี', '5', '25', '25,2,1', '61', 0, 1, NULL, NULL);
INSERT INTO `divisions` VALUES (104, 'ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร', 'ศทก.สป.', '4', '2', '2,1', '10', 0, 1, '2023-06-08 10:41:10', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (105, 'กลุ่มตรวจสอบภายใน', 'ตสน.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:42:32');
INSERT INTO `divisions` VALUES (106, 'กลุ่มพัฒนาระบบบริหาร', 'กพร.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-28 10:29:32');
INSERT INTO `divisions` VALUES (107, 'ศูนย์ปฏิบัติการต่อต้านการทุจริต กระทรวงศึกษาธิการ', 'ศปท.ศธ.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:42:32');
INSERT INTO `divisions` VALUES (108, 'กรมส่งเสริมการเรียนรู้', 'สกร.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-28 09:07:36');
INSERT INTO `divisions` VALUES (109, 'สำนักงานคณะกรรมการข้าราชการครูและบุคลากรทางการศึกษา', 'ก.ค.ศ.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:42:32');
INSERT INTO `divisions` VALUES (110, 'สำนักงานคณะกรรมการส่งเสริมการศึกษาเอกชน', 'สช.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:42:32');
INSERT INTO `divisions` VALUES (111, 'สำนักอำนวยการ', 'สอ.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:42:32');
INSERT INTO `divisions` VALUES (112, 'สถาบันพัฒนาครู คณาจารย์ และบุคลากรทางการศึกษา', 'สคบศ.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (113, 'สำนักการลูกเสือ ยุวกาชาดและกิจการนักเรียน', 'สกก.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (114, 'สำนักความสัมพันธ์ต่างประเทศ', 'สต.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (115, 'สำนักตรวจราชการและติดตามประเมินผล', 'สตผ.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (116, 'สำนักนโยบายและยุทธศาสตร์', 'สนย.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (117, 'สำนักนิติการ', 'สน.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (118, 'กองส่งเสริมและพัฒนาการบริหารการศึกษาในภูมิภาค', 'สบศ.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (119, 'กลุ่มขับเคลื่อนการปฏิรูปประเทศ ยุทธศาสตร์ชาติ และการสร้างความสามัคคี (ป.ย.ป)', 'ป.ย.ป.ศธ.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (120, 'ศูนย์ขับเคลื่อนการศึกษาจังหวัดชายแดนภาคใต้', 'ศค.จชต.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (121, 'สำนักงานเลขานุการกองทุนเทคโนโลยีเพื่อการศึกษา', 'สกท.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (122, 'สำนักงานรัฐมนตรี', 'สร.', '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:43:51');
INSERT INTO `divisions` VALUES (123, 'สำนักงานปลัดกระทรวง', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (124, 'สำนักงานรองปลัดกระทรวง 1', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (125, 'สำนักงานรองปลัดกระทรวง 2', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (126, 'สำนักงานรองปลัดกระทรวง 3', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (127, 'สำนักงานผู้ช่วยปลัดกระทรวง', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (128, 'สำนักงานผู้ตรวจราชการ 1', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (129, 'สำนักงานผู้ตรวจราชการ 2', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (130, 'สำนักงานผู้ตรวจราชการ 3', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (131, 'สำนักงานผู้ตรวจราชการ 4', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (132, 'สำนักงานผู้ตรวจราชการ 5', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (133, 'สำนักงานผู้ตรวจราชการ 6', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (134, 'สำนักงานผู้ตรวจราชการ 7', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (135, 'สำนักงานผู้ตรวจราชการ 8', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (136, 'สำนักงานผู้ตรวจราชการ 9', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (137, 'สำนักงานผู้ตรวจราชการ 10', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (138, 'สำนักงานผู้ตรวจราชการ 11', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');
INSERT INTO `divisions` VALUES (139, 'สำนักงานผู้ตรวจราชการ 12', NULL, '4', '2', '2,1', '10', 0, 1, '2023-06-27 15:22:26', '2023-06-27 17:41:12');

-- ----------------------------
-- Table structure for levels
-- ----------------------------
DROP TABLE IF EXISTS `levels`;
CREATE TABLE `levels`  (
  `level_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of levels
-- ----------------------------
INSERT INTO `levels` VALUES ('1', 'กระทรวง', '1', '20/6/2022 10:09:07', '20/6/2022 10:09:07');
INSERT INTO `levels` VALUES ('2', 'กรม/ศูนย์/สำนัก', '1', '20/6/2022 10:09:07', '20/6/2022 10:09:07');
INSERT INTO `levels` VALUES ('3', 'กลุ่ม/กอง/ศูนย์', '1', '20/6/2022 10:09:07', '20/6/2022 10:09:07');
INSERT INTO `levels` VALUES ('4', 'ภาค/กลุ่มจังหวัด', '1', '20/6/2022 10:09:07', '20/6/2022 10:09:07');
INSERT INTO `levels` VALUES ('5', 'จังหวัด', '1', '20/6/2022 10:09:07', '20/6/2022 10:09:07');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_date` datetime(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `created_date` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'superadmin', '2023-08-29 10:40:23', '2023-08-29 10:40:23');
INSERT INTO `roles` VALUES (2, 'admin', '2023-08-29 10:40:31', '2023-08-29 10:40:31');
INSERT INTO `roles` VALUES (3, 'user', '2023-08-29 10:40:37', '2023-08-29 10:40:37');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `position` int(11) NULL DEFAULT NULL,
  `division` int(11) NULL DEFAULT NULL,
  `active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_login` datetime(6) NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_date` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 284 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'นาย', 'admin', 'admin', 'admin@moe.go.th', '46e44aa0bc21d8a826d79344df38be4b', 0, 104, '1', '2023-08-30 14:04:59.569609', '2023-07-04 09:49:20', '2023-07-04 09:49:20');

-- ----------------------------
-- Table structure for users_roles
-- ----------------------------
DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE `users_roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_roles
-- ----------------------------
INSERT INTO `users_roles` VALUES (1, 1, 1);
INSERT INTO `users_roles` VALUES (2, 1, 2);

SET FOREIGN_KEY_CHECKS = 1;
