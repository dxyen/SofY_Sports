/*
 Navicat Premium Data Transfer

 Source Server         : XAMPP
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : sports

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 20/12/2021 20:49:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id_item` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`id_item`, `id_user`) USING BTREE,
  INDEX `fk_users_cart`(`id_user`) USING BTREE,
  CONSTRAINT `fk_items_cart` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_users_cart` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES (3, 15, 2);
INSERT INTO `cart` VALUES (11, 15, 2);

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `id_item` int(10) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_item_comment`(`id_item`) USING BTREE,
  INDEX `fk_user_comment`(`id_user`) USING BTREE,
  CONSTRAINT `fk_item_comment` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_comment` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (7, 22, 12, 'Giày đẹp gê hồn');
INSERT INTO `comment` VALUES (26, 33, 11, 'cũng đẹp');
INSERT INTO `comment` VALUES (28, 33, 11, 'Khá đẹp đó mọi người');
INSERT INTO `comment` VALUES (29, 34, 11, 'giày đc nhe mn');
INSERT INTO `comment` VALUES (30, 33, 4, 'khá hoàn hảo.');
INSERT INTO `comment` VALUES (31, 15, 3, 'Áo đẹp');
INSERT INTO `comment` VALUES (32, 15, 13, 'nhìn cũng được đó nhe quý zị');
INSERT INTO `comment` VALUES (33, 40, 13, 'Khá ổn');
INSERT INTO `comment` VALUES (34, 15, 23, 'đẹp z');
INSERT INTO `comment` VALUES (35, 43, 2, 'đẹp');

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10, 0) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_sport_type` int(10) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_sport_type_items`(`id_sport_type`) USING BTREE,
  CONSTRAINT `fk_sport_type_items` FOREIGN KEY (`id_sport_type`) REFERENCES `sport_type` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES (1, 'Áo đấu Việt Nam', 95000, 'Một diện mạo hoàn toàn mới, có thiết kế bắt mắt và khác thường, lấy cảm hứng từ chính huy hiệu CLB.\r\n\r\nSofY sports cam kết giao hàng đúng mẫu đúng size ,đúng hẹn. Cam kết đổi trả miễn phí nếu có bất cứ sai sót nào từ shop, từ chất lượng sản phẩm.\r\nBộ sản phẩm gồm 1 áo và 1 quần.', 1, '1639284932.jpg');
INSERT INTO `items` VALUES (2, 'Áo đấu Đức', 95000, 'Một diện mạo hoàn toàn mới, có thiết kế bắt mắt và khác thường, lấy cảm hứng từ chính huy hiệu CLB.\r\n\r\nSofY sports cam kết giao hàng đúng mẫu đúng size ,đúng hẹn. Cam kết đổi trả miễn phí nếu có bất cứ sai sót nào từ shop, từ chất lượng sản phẩm.\r\nBộ sản phẩm gồm 1 áo và 1 quần.', 1, 'aoduc.jpg');
INSERT INTO `items` VALUES (3, 'Áo đấu Argentina', 95000, 'Một diện mạo hoàn toàn mới, có thiết kế bắt mắt và khác thường, lấy cảm hứng từ chính huy hiệu CLB.\r\n\r\nSofY sports cam kết giao hàng đúng mẫu đúng size ,đúng hẹn. Cam kết đổi trả miễn phí nếu có bất cứ sai sót nào từ shop, từ chất lượng sản phẩm.\r\nBộ sản phẩm gồm 1 áo và 1 quần.', 1, 'aomessi.jpg');
INSERT INTO `items` VALUES (4, 'Áo đấu PSG', 95000, 'Một diện mạo hoàn toàn mới, có thiết kế bắt mắt và khác thường, lấy cảm hứng từ chính huy hiệu CLB.\r\n\r\nSofY sports cam kết giao hàng đúng mẫu đúng size ,đúng hẹn. Cam kết đổi trả miễn phí nếu có bất cứ sai sót nào từ shop, từ chất lượng sản phẩm.\r\nBộ sản phẩm gồm 1 áo và 1 quần.', 1, 'aopsg.jpg');
INSERT INTO `items` VALUES (5, 'Áo đấu Bayern', 90000, 'Một diện mạo hoàn toàn mới, có thiết kế bắt mắt và khác thường, lấy cảm hứng từ chính huy hiệu CLB.\r\n\r\nSofY sports cam kết giao hàng đúng mẫu đúng size ,đúng hẹn. Cam kết đổi trả miễn phí nếu có bất cứ sai sót nào từ shop, từ chất lượng sản phẩm.\r\nBộ sản phẩm gồm 1 áo và 1 quần.', 1, 'aobayern.jpg');
INSERT INTO `items` VALUES (6, 'Áo đấu Manchester United', 90000, 'Một diện mạo hoàn toàn mới, có thiết kế bắt mắt và khác thường, lấy cảm hứng từ chính huy hiệu CLB.\r\n\r\nSofY sports cam kết giao hàng đúng mẫu đúng size ,đúng hẹn. Cam kết đổi trả miễn phí nếu có bất cứ sai sót nào từ shop, từ chất lượng sản phẩm.\r\nBộ sản phẩm gồm 1 áo và 1 quần.', 1, 'mu.jpg');
INSERT INTO `items` VALUES (7, 'Áo đấu Manchester City', 90000, 'Một diện mạo hoàn toàn mới, có thiết kế bắt mắt và khác thường, lấy cảm hứng từ chính huy hiệu CLB.\r\n\r\nSofY sports cam kết giao hàng đúng mẫu đúng size ,đúng hẹn. Cam kết đổi trả miễn phí nếu có bất cứ sai sót nào từ shop, từ chất lượng sản phẩm.\r\nBộ sản phẩm gồm 1 áo và 1 quần.', 1, 'mc.jpg');
INSERT INTO `items` VALUES (8, 'Áo đấu Barcalona', 90000, 'Một diện mạo hoàn toàn mới, có thiết kế bắt mắt và khác thường, lấy cảm hứng từ chính huy hiệu CLB.\r\n\r\nSofY sports cam kết giao hàng đúng mẫu đúng size ,đúng hẹn. Cam kết đổi trả miễn phí nếu có bất cứ sai sót nào từ shop, từ chất lượng sản phẩm.\r\nBộ sản phẩm gồm 1 áo và 1 quần.', 1, 'barcalona.jpg');
INSERT INTO `items` VALUES (9, 'Áo đấu Chelsea', 90000, 'Một diện mạo hoàn toàn mới, có thiết kế bắt mắt và khác thường, lấy cảm hứng từ chính huy hiệu CLB.\r\n\r\nSofY sports cam kết giao hàng đúng mẫu đúng size ,đúng hẹn. Cam kết đổi trả miễn phí nếu có bất cứ sai sót nào từ shop, từ chất lượng sản phẩm.\r\nBộ sản phẩm gồm 1 áo và 1 quần.', 1, 'ches.jpg');
INSERT INTO `items` VALUES (10, 'Áo đấu Real Madrid', 90000, 'Một diện mạo hoàn toàn mới, có thiết kế bắt mắt và khác thường, lấy cảm hứng từ chính huy hiệu CLB.\r\n\r\nSofY sports cam kết giao hàng đúng mẫu đúng size ,đúng hẹn. Cam kết đổi trả miễn phí nếu có bất cứ sai sót nào từ shop, từ chất lượng sản phẩm.\r\nBộ sản phẩm gồm 1 áo và 1 quần.', 1, 'real.jpg');
INSERT INTO `items` VALUES (11, 'Giày Nike Phantom 3D', 8219000, 'Bạn đâu cần chiếm trọn sự chú ý. Bạn chỉ cần đúng một khoảnh khắc. Một phút giây duy để kết thúc trận đấu. Nâng tầm cảm giác bóng với đôi giày bóng đá này. Đường khâu trên mũi giày bằng da mềm giúp giữ bóng trong tầm kiểm soát. Má giày bằng lưới co giãn cùng lưỡi giày thích ứng ôm chân chắc chắn.', 1, 'Nike phanton3D.jpg');
INSERT INTO `items` VALUES (12, 'Giày Nike Mercurial 14', 4109000, '\r\nSofY cam kết, hình ảnh sản phẩm là ảnh thật do shop tự chụp, hàng có sẵn, giao hàng ngay khi nhận được đơn. Hoàn tiền nếu sản phẩm không giống với mô tả, chấp nhận đổi hàng khi size không vừa, giao hàng trên toàn quốc, nhận hàng trả tiền.', 1, 'Nike Mercurial.jpg');
INSERT INTO `items` VALUES (13, 'Giày Nike Men\'s Footbal Shoes', 3709000, '\r\nSofY cam kết, hình ảnh sản phẩm là ảnh thật do shop tự chụp, hàng có sẵn, giao hàng ngay khi nhận được đơn. Hoàn tiền nếu sản phẩm không giống với mô tả, chấp nhận đổi hàng khi size không vừa, giao hàng trên toàn quốc, nhận hàng trả tiền.', 1, 'nikemen.jpg');
INSERT INTO `items` VALUES (14, 'Giày Adidas Speedflow 1', 3825000, '\r\nSofY cam kết, hình ảnh sản phẩm là ảnh thật do shop tự chụp, hàng có sẵn, giao hàng ngay khi nhận được đơn. Hoàn tiền nếu sản phẩm không giống với mô tả, chấp nhận đổi hàng khi size không vừa, giao hàng trên toàn quốc, nhận hàng trả tiền.', 1, 'speedflow.1.jpg');
INSERT INTO `items` VALUES (15, 'Giày Adidas Predator Freak 1', 5000000, '\r\nSofY cam kết, hình ảnh sản phẩm là ảnh thật do shop tự chụp, hàng có sẵn, giao hàng ngay khi nhận được đơn. Hoàn tiền nếu sản phẩm không giống với mô tả, chấp nhận đổi hàng khi size không vừa, giao hàng trên toàn quốc, nhận hàng trả tiền.', 1, 'predator-freak.1.jpg');
INSERT INTO `items` VALUES (16, 'Vợt cầu lông Yonex AsTrox 88D', 3190000, '\r\nSofY cam kết, hình ảnh sản phẩm là ảnh thật do shop tự chụp, hàng có sẵn, giao hàng ngay khi nhận được đơn. Hoàn tiền nếu sản phẩm không giống với mô tả, chấp nhận đổi hàng khi size không vừa, giao hàng trên toàn quốc, nhận hàng trả tiền.', 2, 'yonex1.jpg');
INSERT INTO `items` VALUES (17, 'Vợt cầu lông Yonex 700', 2100000, 'Hàng real authentic 100% đảm bảo không fake', 2, 'yonex2.jpg');
INSERT INTO `items` VALUES (18, 'Vợt cầu lông Yonex Astrox FB', 1500000, '\r\nSofY cam kết, hình ảnh sản phẩm là ảnh thật do shop tự chụp, hàng có sẵn, giao hàng ngay khi nhận được đơn. Hoàn tiền nếu sản phẩm không giống với mô tả, chấp nhận đổi hàng khi size không vừa, giao hàng trên toàn quốc, nhận hàng trả tiền.', 2, 'yonex3.jpg');
INSERT INTO `items` VALUES (19, 'Vợt cầu lông Fleet Advance A', 2400000, 'Hàng real authentic 100% đảm bảo không fake', 2, 'fleet1.jpg');
INSERT INTO `items` VALUES (20, 'Vợt cầu lông Fleet Sense 1200', 1200000, 'Hàng real authentic 100% đảm bảo không fake', 2, 'fleet2.jpg');
INSERT INTO `items` VALUES (21, 'Bóng chuyền Động Lực 210M3', 300000, 'Hàng real authentic 100% đảm bảo không fake', 3, 'bong-chuyendl1.jpg');
INSERT INTO `items` VALUES (22, 'Bóng chuyền Thăng Long', 500000, '\r\nSofY cam kết, hình ảnh sản phẩm là ảnh thật do shop tự chụp, hàng có sẵn, giao hàng ngay khi nhận được đơn. Hoàn tiền nếu sản phẩm không giống với mô tả, chấp nhận đổi hàng khi size không vừa, giao hàng trên toàn quốc, nhận hàng trả tiền.', 3, 'Thang-Long1.jpg');
INSERT INTO `items` VALUES (23, 'Bóng chuyền DE 240M3', 250000, 'Hàng real authentic 100% đảm bảo không fake', 3, 'bong-chuyenebete.jpg');
INSERT INTO `items` VALUES (24, 'Bóng chuyền DE 250C', 150000, 'Hàng real authentic 100% đảm bảo không fake', 3, 'vtv.jpg');
INSERT INTO `items` VALUES (25, 'Vợt tennis Babolat Z 105', 5320000, '\r\nSofY cam kết, hình ảnh sản phẩm là ảnh thật do shop tự chụp, hàng có sẵn, giao hàng ngay khi nhận được đơn. Hoàn tiền nếu sản phẩm không giống với mô tả, chấp nhận đổi hàng khi size không vừa, giao hàng trên toàn quốc, nhận hàng trả tiền.', 4, 'tennis1.jpg');
INSERT INTO `items` VALUES (26, 'Vợt tennis Babolat Lite GT', 6000000, 'Hàng real authentic 100% đảm bảo không fake', 4, 'tennis2.jpg');
INSERT INTO `items` VALUES (27, 'Vợt Tennis Babolat Drive GT', 3420000, 'Hàng real authentic 100% đảm bảo không fake', 4, 'tennis3.jpg');
INSERT INTO `items` VALUES (28, 'Máy chạy bộ phòng Gym V9', 43000000, 'Hàng real authentic 100% đảm bảo không fake', 5, 'may-chay-bo-sakura-v9-1.jpg');
INSERT INTO `items` VALUES (29, 'Giàn tạ Impulse ES3000', 82000000, 'Hàng real authentic 100% đảm bảo không fake', 5, 'Gian-ta-da-nang-Impulse-ES3000.jpg');
INSERT INTO `items` VALUES (30, 'Ghế đẩy tạ ngực dưới IT7016', 16000000, 'Hàng real authentic 100% đảm bảo không fake', 5, 'Ghe-day-ta-nguc-duoi-Impulse-IT7016.jpg');
INSERT INTO `items` VALUES (31, 'Kính bơi Aquafeel Leader', 1100000, 'Hàng real authentic 100% đảm bảo không fake', 6, 'kinh-boi-Aquafeel-Leader-Mirrored.jpg');
INSERT INTO `items` VALUES (32, 'Kính bơi trẻ em View V760', 210000, 'Hàng real authentic 100% đảm bảo không fake', 6, 'kinh-boi-tre-em-view-v760.jpg');
INSERT INTO `items` VALUES (33, 'Kính bơi View V540SA', 750000, 'Hàng real authentic 100% đảm bảo không fake', 6, 'kinh-boi-view-v540sa.jpg');
INSERT INTO `items` VALUES (34, 'Mũ bơi vải Yingfa', 210000, 'Hàng real authentic 100% đảm bảo không fake', 6, 'Mu-boi-vai-Yingfa-xanh.jpg');
INSERT INTO `items` VALUES (35, 'Bịt tai bơi Yingfa', 122000, 'Hàng real authentic 100% đảm bảo không fake', 6, 'bit-tai-yingfa.jpg');

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `id_order` int(10) NOT NULL,
  `id_item` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `price_item` int(10) NOT NULL,
  PRIMARY KEY (`id_order`, `id_item`) USING BTREE,
  INDEX `fk_items_order_details`(`id_item`) USING BTREE,
  CONSTRAINT `fk_items_order_details` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_orders_order_details` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (34, 11, 1, 8219000);
INSERT INTO `order_details` VALUES (35, 2, 1, 95000);
INSERT INTO `order_details` VALUES (35, 11, 1, 8219000);
INSERT INTO `order_details` VALUES (37, 11, 1, 8219000);
INSERT INTO `order_details` VALUES (62, 3, 1, 95000);
INSERT INTO `order_details` VALUES (62, 11, 1, 8219000);
INSERT INTO `order_details` VALUES (63, 4, 1, 95000);
INSERT INTO `order_details` VALUES (63, 11, 1, 8219000);
INSERT INTO `order_details` VALUES (64, 11, 6, 8219000);
INSERT INTO `order_details` VALUES (65, 25, 1, 5320000);
INSERT INTO `order_details` VALUES (65, 26, 1, 6000000);
INSERT INTO `order_details` VALUES (65, 29, 1, 82000000);
INSERT INTO `order_details` VALUES (65, 30, 4, 16000000);
INSERT INTO `order_details` VALUES (66, 26, 4, 6000000);
INSERT INTO `order_details` VALUES (66, 28, 1, 43000000);
INSERT INTO `order_details` VALUES (66, 29, 1, 82000000);
INSERT INTO `order_details` VALUES (69, 11, 1, 8219000);
INSERT INTO `order_details` VALUES (69, 12, 2, 4109000);
INSERT INTO `order_details` VALUES (69, 22, 2, 500000);
INSERT INTO `order_details` VALUES (69, 29, 1, 82000000);
INSERT INTO `order_details` VALUES (70, 4, 1, 95000);
INSERT INTO `order_details` VALUES (70, 11, 2, 8219000);
INSERT INTO `order_details` VALUES (70, 12, 1, 4109000);
INSERT INTO `order_details` VALUES (71, 32, 3, 210000);
INSERT INTO `order_details` VALUES (71, 33, 2, 750000);
INSERT INTO `order_details` VALUES (72, 11, 2, 8219000);
INSERT INTO `order_details` VALUES (72, 16, 1, 3190000);
INSERT INTO `order_details` VALUES (72, 28, 1, 43000000);
INSERT INTO `order_details` VALUES (73, 11, 1, 8219000);
INSERT INTO `order_details` VALUES (73, 23, 2, 250000);
INSERT INTO `order_details` VALUES (73, 33, 1, 750000);
INSERT INTO `order_details` VALUES (75, 11, 2, 8219000);
INSERT INTO `order_details` VALUES (75, 26, 1, 6000000);
INSERT INTO `order_details` VALUES (76, 2, 2, 95000);
INSERT INTO `order_details` VALUES (76, 26, 1, 6000000);
INSERT INTO `order_details` VALUES (76, 29, 1, 82000000);
INSERT INTO `order_details` VALUES (77, 4, 1, 95000);
INSERT INTO `order_details` VALUES (77, 29, 1, 82000000);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `delivery_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  `id_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_users_orders`(`id_user`) USING BTREE,
  INDEX `fk_status_orders`(`id_status`) USING BTREE,
  CONSTRAINT `fk_status_orders` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_users_orders` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 78 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (34, '02-11-2021 22:15:06', '02-11-2021', 15, 'DG', 'Giồng Riềng, Kiên Giang');
INSERT INTO `orders` VALUES (35, '02-11-2021 22:15:06', '2021-11-05', 15, 'DG', 'Giồng Riềng, Kiên Giang');
INSERT INTO `orders` VALUES (37, '02-11-2021 22:15:06', NULL, 15, 'DG', 'Giồng Riềng, Kiên Giang');
INSERT INTO `orders` VALUES (62, '02-11-2021 22:15:06', NULL, 33, 'CXL', 'Hẻm 1, Cần Thơ');
INSERT INTO `orders` VALUES (63, '02-11-2021 22:16:52', '2021-12-15', 33, 'DG', 'Giồng Riềng, Kiên Giang');
INSERT INTO `orders` VALUES (64, '02-11-2021 22:33:02', NULL, 33, 'CXL', 'Hẻm 1, Cần Thơ');
INSERT INTO `orders` VALUES (65, '04-11-2021 9:31:55', NULL, 15, 'CXL', 'Hưng Lợi, Ninh Kiều, Cần Thơ');
INSERT INTO `orders` VALUES (66, '04-11-2021 11:44:06', NULL, 34, 'CXL', 'Hòa Thuận, Giồng Riềng, Kiên Giang');
INSERT INTO `orders` VALUES (69, '05-11-2021 21:33:36', '2021-11-10', 15, 'DCB', 'Giồng Riềng, Kiên Giang');
INSERT INTO `orders` VALUES (70, '11-12-2021 18:28:56', NULL, 15, 'CXL', 'Hưng Lợi, Ninh Kiều, Cần Thơ');
INSERT INTO `orders` VALUES (71, '12-12-2021 14:03:04', NULL, 39, 'CXL', 'Hưng Lợi, Ninh Kiều, Cần Thơ');
INSERT INTO `orders` VALUES (72, '13-12-2021 16:38:53', '2021-12-17', 41, 'DGH', 'Ninh Kiều, Cần Thơ');
INSERT INTO `orders` VALUES (73, '13-12-2021 18:42:47', '2021-12-17', 42, 'DG', 'Sóc Trăng');
INSERT INTO `orders` VALUES (75, '14-12-2021 9:17:18', NULL, 43, 'CXL', 'Giồng Riềng, Kiên Giang');
INSERT INTO `orders` VALUES (76, '14-12-2021 10:40:22', '2021-12-18', 43, 'DCB', 'Hẻm 1, Cần Thơ');
INSERT INTO `orders` VALUES (77, '18-12-2021 21:21:29', '2021-12-20', 22, 'DCB', 'Hẻm 1, Ninh Kiều, Cần Thơ');

-- ----------------------------
-- Table structure for sport_type
-- ----------------------------
DROP TABLE IF EXISTS `sport_type`;
CREATE TABLE `sport_type`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sport_type
-- ----------------------------
INSERT INTO `sport_type` VALUES (1, 'Bóng đá', '1639277954.jpg', 'Các dụng cụ bóng đá: áo đấu, giày, bóng, ...');
INSERT INTO `sport_type` VALUES (2, 'Cầu lông', 'dmcaulong.jpg', 'Các dụng cụ cầu lông: áo đấu, giày, vợt, ...');
INSERT INTO `sport_type` VALUES (3, 'Bóng chuyền', 'dmbongchuyen.jpg', 'Các dụng cụ bóng chuyền: giày, bóng chuyền, ...');
INSERT INTO `sport_type` VALUES (4, 'Tennis', 'dmtennis.jpg', 'Các dụng cụ Tennis: áo đấu, giày, vợt, ...');
INSERT INTO `sport_type` VALUES (5, 'Gym', 'dmgym.jpg', 'Các dụng cụ Gym: Giày, tạ, ...');
INSERT INTO `sport_type` VALUES (6, 'Bơi lội', 'dmboiloi.jpg', 'Các dụng cụ bơi lội: đồ bơi, kính bơi, ...');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('CXL', 'Chưa xử lý');
INSERT INTO `status` VALUES ('DCB', 'Đang chuẩn bị đơn hàng');
INSERT INTO `status` VALUES ('DG', 'Đã giao');
INSERT INTO `status` VALUES ('DGH', 'Đang giao hàng');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` int(2) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin_sofy', '0338697256', '0', '$2y$10$xQ4c8XG7T8yR032dsQQIt.DGHNLOPXZkIikA9i/iP/hyAMp3G3xuy', 'admin', 0, NULL, 'Đỗ Xuân Yên', NULL);
INSERT INTO `users` VALUES (2, 'admin_sofy2', '0', '0', '$2y$10$xQ4c8XG7T8yR032dsQQIt.DGHNLOPXZkIikA9i/iP/hyAMp3G3xuy', 'admin', 0, NULL, 'Võ Thị Thanh Trúc', NULL);
INSERT INTO `users` VALUES (3, 'admin_sofy3', '0', '0', '$2y$10$On8HpcDk5GexgwF1y810ZOnNP.TZrHpWvRGBXmSPhI7r8FPSmPW86', 'admin', 0, NULL, 'Đỗ Thị Xuân Quỳnh', NULL);
INSERT INTO `users` VALUES (4, 'admin_sofy4', '0', '0', '$10$On8HpcDk5GexgwF1y810ZOnNP.TZrHpWvRGBXmSPhI7r8FPSmPW86', 'admin', 0, NULL, 'Đỗ Thị Thúy Ngân', NULL);
INSERT INTO `users` VALUES (15, 'yen123', '0338697256', 'Hưng Lợi, Ninh Kiều, Cần Thơ', '$2y$10$xQ4c8XG7T8yR032dsQQIt.DGHNLOPXZkIikA9i/iP/hyAMp3G3xuy', 'dxyen3333@gmail.com', 1, '1636187639.jpg', 'Đỗ Xuân Yên', 'Giồng Riềng, Kiên Giang');
INSERT INTO `users` VALUES (22, 'truc', '0338697256', 'Hẻm 1, Ninh Kiều, Cần Thơ', '$2y$10$w369dFccbI0gSwldxh25j.ybXjtFghzt5GPWLMw0LPTKcUCtGm0ne', 'truc@gmail.com', 1, '1636011251.jpg', 'Võ Thị Thanh Trúc', 'Giồng Riềng, Kiên Giang');
INSERT INTO `users` VALUES (33, 'yen', '0338697256', 'Hẻm 1, Cần Thơ', '$2y$10$On8HpcDk5GexgwF1y810ZOnNP.TZrHpWvRGBXmSPhI7r8FPSmPW86', 'yen@gmail.com', 1, '1639395545.jpg', 'Đỗ Yên', 'Giồng Riềng, Kiên Giang');
INSERT INTO `users` VALUES (34, 'ngan', '0338697256', 'Hẻm 1, Cần Thơ', '$2y$10$ngTy8GW1bufEfPEoGkNqjue65n/a7MKTqJ1kf1gVOBB1sfhVoU1Ci', 'ngan@gmail.com', 1, '1636011220.jpg', 'Đỗ Thị Thúy Ngân', 'Hòa Thuận, Giồng Riềng, Kiên Giang');
INSERT INTO `users` VALUES (35, 'thong123', '0338697256', 'Hẻm 1, Cần Thơ', '$2y$10$nGOYmSi6qjZik2utg2V.oe5IHh3.aV/mWGWTK7ivypzhorN1v9NFm', 'thong@gmail.com', 1, '1639291302.jpg', 'Nguyễn Hoàng Thông', 'Hòa Thuận, Giồng Riềng, Kiên Giang');
INSERT INTO `users` VALUES (36, 'lam123', '0338697256', 'Hẻm 1, Cần Thơ', '$2y$10$9Z43td6TaD283i1zHns3Kem13CAzLIRLFfCxMJpksXKGz6hcYKuk2', 'lam@gmail.com', 1, NULL, 'Nguyễn Tùng Lâm', 'Hòa Thuận, Giồng Riềng, Kiên Giang');
INSERT INTO `users` VALUES (39, 'khanh123', '0338697256', 'Hưng Lợi, Ninh Kiều, Cần Thơ', '$2y$10$UZEZyRFzgMYqdnRoYAdudegUfi3DxCSOLRUP80O/1uRmpIqwCP93W', 'khanh@gmail.com', 1, NULL, 'Bảo Khánh', 'Giồng Riềng, Kiên Giang');
INSERT INTO `users` VALUES (40, 'hao123', '0338697256', 'Hẻm 1, Hậu Giang', '$2y$10$TmDek9Bdk36NRS9TAQtDB.gdgtPtGtVwJkDTr.Mn0zCA2bymEdWWi', 'hao@gmail.com', 1, '1639294101.jpg', 'Huỳnh Thanh Hào', 'Hòa Thuận, Giồng Riềng, Kiên Giang');
INSERT INTO `users` VALUES (41, 'a123', '0338697256', 'Ninh Kiều, Cần Thơ', '$2y$10$Buy0e41ybFZwKp2EAiE69utFokE1yGa7vTt9pRLeq5vRjncPKxoDq', 'a@gmail.com', 1, '1639388259.jpg', 'Nguyễn Văn An', 'Giồng Riềng, Kiên Giang');
INSERT INTO `users` VALUES (42, 'xung123', '0338697256', 'Hưng Lợi, Ninh Kiều, Cần Thơ', '$2y$10$Xt7aVL.O31CHbzGAhVW8qe0uBFgIA2yT2b8psdFVSuVnhj4l5k4iO', 'xung@gmail.com', 1, NULL, 'Hầu Xưng', 'Sóc Trăng');
INSERT INTO `users` VALUES (43, 'binh123', '0338697256', 'Hẻm 1, Cần Thơ', '$2y$10$118j2EmuDviSOXa1JQT2UuxHaAfWgcwulAgQDyaXiEi2NXHgj.lXi', 'binh@gmail.com', 1, '1639453118.jpg', 'Đỗ Bình Yên', 'Giồng Riềng, Kiên Giang');

-- ----------------------------
-- Procedure structure for getItemByIdOrder
-- ----------------------------
DROP PROCEDURE IF EXISTS `getItemByIdOrder`;
delimiter ;;
CREATE PROCEDURE `getItemByIdOrder`(orderID int)
begin
	select OD.amount as amount, I.id as iditem, I.`name` as itemname, OD.price_item as price, I.image as image
	from orders O join users U	on O.id_user	= U.id
								join `status`	T on O.id_status = T.id
								join order_details OD on o.id = OD.id_order
								join items I on OD.id_item = I.id
	where O.id = orderID;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getItemInCartByUser
-- ----------------------------
DROP PROCEDURE IF EXISTS `getItemInCartByUser`;
delimiter ;;
CREATE PROCEDURE `getItemInCartByUser`(iduser int)
BEGIN
	SELECT i.id, i.image, i.`name`, i.price, i.description, c.amount
	FROM users u JOIN cart c	ON u.id = c.id_user
			JOIN items i ON i.id = c.id_item
	WHERE iduser = u.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getItemUserByIdOrder
-- ----------------------------
DROP PROCEDURE IF EXISTS `getItemUserByIdOrder`;
delimiter ;;
CREATE PROCEDURE `getItemUserByIdOrder`(orderID int)
begin
	select O.id as id, T.name as item, OD.amount as amount, T.price as price, T.image as image
	from orders O join order_details OD on O.id = OD.id_order
								join items T on OD.id_item = T.id
	where O.id = orderID;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getUserByIdOrder
-- ----------------------------
DROP PROCEDURE IF EXISTS `getUserByIdOrder`;
delimiter ;;
CREATE PROCEDURE `getUserByIdOrder`(orderID int)
begin
	select O.id as id, U.fullname as fullname, O.order_date as orderdate, O.delivery_date as deliverydate, T.`name` as `status`
	from orders O join users U	on O.id_user	= U.id
								join `status`	T on O.id_status = T.id
	where O.id = orderID;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getUserItemByIdOrder
-- ----------------------------
DROP PROCEDURE IF EXISTS `getUserItemByIdOrder`;
delimiter ;;
CREATE PROCEDURE `getUserItemByIdOrder`(orderID int)
begin
	select OD.amount as amount, I.id as iditem, I.`name` as itemname, I.price as price
	from orders O join users U	on O.id_user	= U.id
								join `status`	T on O.id_status = T.id
								join order_details OD on o.id = OD.id_order
								join items I on OD.id_item = I.id
	where O.id = orderID;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for itemsBookByUser
-- ----------------------------
DROP PROCEDURE IF EXISTS `itemsBookByUser`;
delimiter ;;
CREATE PROCEDURE `itemsBookByUser`(userID int, address VARCHAR(255), orderdate VARCHAR(255))
begin
	INSERT INTO orders(id_user, address, order_date, id_status)
	values(userID, address, orderdate, "CXL");
	
	select max(id)	as id_max
	from orders
	where id_user = userID;
end
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
