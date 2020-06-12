SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_food
-- ----------------------------
DROP TABLE IF EXISTS `t_food`;
CREATE TABLE `t_food`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `food_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '菜谱类型：0其他，1猪肉，2鸡鸭鱼，3鸡蛋，4豆腐，5素菜',
  `food_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '菜谱名称',
  `food_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '菜谱首图',
  `food_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '教程URL',
  `is_show` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否显示：0隐藏，1显示',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '备注',
  `add_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '菜谱表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_food
-- ----------------------------
INSERT INTO `t_food` VALUES (1, 1, '丝瓜炒肉片', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (2, 1, '茄子炒肉片', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (3, 1, '手撕包菜炒肉片', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (4, 1, '冬瓜炒肉片', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (5, 1, '青瓜炒肉片', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (6, 1, '豇豆炒肉片', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (7, 2, '鸡腿菇炒鸡', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (8, 2, '玉米粒炒鸡', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (9, 2, '油焖大虾', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (10, 2, '清蒸鲈鱼', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (11, 3, '丝瓜炒鸡蛋', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (12, 3, '洋葱炒鸡蛋', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (13, 4, '西红柿焖水豆腐', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (14, 4, '油豆腐炒肉', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (15, 4, '炒空心菜', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (16, 4, '炒生菜', '/static/images/car.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (17, 1, '肥肥炒肉', '/static/images/default.png', '', 1, '看世纪东方', 1591928461);

SET FOREIGN_KEY_CHECKS = 1;
