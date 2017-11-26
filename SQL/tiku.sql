/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost
 Source Database       : tiku

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : utf-8

 Date: 11/19/2017 15:23:57 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `ks_category`
-- ----------------------------
DROP TABLE IF EXISTS `ks_category`;
CREATE TABLE `ks_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类ID',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1=生效 2=失效',
  `created_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
--  Records of `ks_category`
-- ----------------------------
BEGIN;
INSERT INTO `ks_category` VALUES ('1', '开发', '0', '1', '0', '0'), ('2', '营销', '0', '1', '0', '0'), ('3', 'php开发', '1', '1', '0', '0'), ('4', 'html', '1', '1', '0', '0'), ('5', '讲师', '2', '1', '0', '0'), ('6', '销售专员', '2', '1', '0', '0'), ('7', '测试', '0', '1', '0', '0'), ('8', 'app测试', '7', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `ks_course`
-- ----------------------------
DROP TABLE IF EXISTS `ks_course`;
CREATE TABLE `ks_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '' COMMENT '课程名称',
  `major_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类ID',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1=生效 2=失效',
  `collect_count` int(11) NOT NULL DEFAULT '0' COMMENT '收藏数',
  `doing_count` int(11) NOT NULL DEFAULT '0' COMMENT '做过数',
  `created_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='课程表';

-- ----------------------------
--  Records of `ks_course`
-- ----------------------------
BEGIN;
INSERT INTO `ks_course` VALUES ('1', 'php开发教程', '1', '1', '0', '0', '0', '0'), ('2', 'html从入门到精通', '1', '1', '0', '0', '0', '0'), ('3', 'lala', '2', '1', '0', '0', '0', '0'), ('4', 'lala', '2', '1', '0', '0', '0', '0'), ('5', 'lala', '2', '1', '0', '0', '0', '0'), ('6', '性能测试', '8', '1', '0', '0', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `ks_question`
-- ----------------------------
DROP TABLE IF EXISTS `ks_question`;
CREATE TABLE `ks_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '题干',
  `explain` varchar(200) NOT NULL DEFAULT '' COMMENT '解释',
  `level` tinyint(4) NOT NULL DEFAULT '1' COMMENT '难易程度 1简单 2中等 3难',
  `course_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '课程ID',
  `chapter` tinyint(4) NOT NULL DEFAULT '1' COMMENT '章节',
  `question_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '题型 1=单选 2=多选 3=简答',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 1=生效 2=失效',
  `created_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `admin_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '最后修改管理员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='题库表';

-- ----------------------------
--  Table structure for `ks_question_stem`
-- ----------------------------
DROP TABLE IF EXISTS `ks_question_stem`;
CREATE TABLE `ks_question_stem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属题干id',
  `stem_content` varchar(200) NOT NULL DEFAULT '' COMMENT '内容',
  `sn` tinyint(4) NOT NULL DEFAULT '0' COMMENT '编号',
  `is_true` tinyint(4) NOT NULL DEFAULT '2' COMMENT '是否为正确答案 1=是 2=否',
  `created_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='题库选项表';

SET FOREIGN_KEY_CHECKS = 1;
