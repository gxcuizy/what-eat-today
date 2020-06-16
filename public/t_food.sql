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
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '菜谱表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_food
-- ----------------------------
INSERT INTO `t_food` VALUES (1, 1, '青瓜炒肉片', '/static/images/1.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (2, 1, '丝瓜炒肉片', '/static/images/2.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (3, 1, '苦瓜炒肉片', '/static/images/3.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (4, 1, '青椒炒肉片', '/static/images/4.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (5, 1, '芹菜炒肉片', '/static/images/5.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (6, 1, '手撕包菜炒肉片', '/static/images/6.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (7, 1, '腐竹炒肉片', '/static/images/7.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (8, 1, '豇豆炒肉片', '/static/images/8.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (9, 1, '荷兰豆炒肉片', '/static/images/9.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (10, 1, '洋葱青椒炒肉片', '/static/images/10.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (11, 1, '莴笋炒肉片', '/static/images/11.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (12, 1, '肉末茄子', '/static/images/12.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (13, 1, '茄子炒肉片', '/static/images/13.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (14, 1, '西兰花炒肉片', '/static/images/14.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (15, 1, '冬瓜炒肉片', '/static/images/15.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (16, 2, '苦瓜炒牛肉', '/static/images/16.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (17, 2, '洋葱青椒炒牛肉', '/static/images/17.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (18, 2, '鸡腿菇炒鸡', '/static/images/18.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (19, 2, '平菇炒鸡', '/static/images/19.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (20, 2, '玉米粒炒鸡', '/static/images/20.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (21, 2, '可乐鸡翅', '/static/images/21.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (22, 2, '油焖大虾', '/static/images/22.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (23, 2, '酸菜鱼', '/static/images/23.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (24, 2, '清蒸鲈鱼', '/static/images/24.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (25, 2, '清蒸鲳鱼', '/static/images/25.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (26, 2, '红烧福寿鱼炖豆腐', '/static/images/26.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (27, 2, '红烧罗非鱼', '/static/images/27.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (28, 3, '西红柿炒鸡蛋', '/static/images/28.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (29, 3, '韭菜炒鸡蛋', '/static/images/29.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (30, 3, '丝瓜炒鸡蛋', '/static/images/30.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (31, 3, '火腿青椒炒鸡蛋', '/static/images/31.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (32, 3, '青瓜炒鸡蛋', '/static/images/32.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (33, 3, '洋葱炒鸡蛋', '/static/images/33.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (34, 4, '香煎水豆腐', '/static/images/34.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (35, 1, '油豆腐炒肉', '/static/images/35.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (36, 4, '肉末豆腐', '/static/images/36.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (37, 4, '西红柿焖水豆腐', '/static/images/37.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (38, 4, '炒空心菜', '/static/images/38.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (39, 4, '炒生菜', '/static/images/39.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (40, 4, '炒白菜', '/static/images/40.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (41, 0, '土豆炖排骨', '/static/images/41.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (42, 0, '莲藕炖排骨', '/static/images/42.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (43, 0, '花生炖猪脚', '/static/images/43.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (44, 0, '玉米炖猪脚', '/static/images/44.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (45, 0, '萝卜西红柿炖牛腩', '/static/images/45.jpg', '', 1, '', 0);
INSERT INTO `t_food` VALUES (46, 0, '熟食-烧鸭', '/static/images/46.jpg', '', 1, '', 0);

SET FOREIGN_KEY_CHECKS = 1;
