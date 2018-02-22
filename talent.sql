/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : talent

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-02-22 17:56:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_cate
-- ----------------------------
DROP TABLE IF EXISTS `t_cate`;
CREATE TABLE `t_cate` (
  `cate_id` int(50) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cate_name` varchar(100) DEFAULT NULL COMMENT '分类名称',
  `pid` int(50) DEFAULT '0' COMMENT '父级分类id，0表示顶级',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_cate
-- ----------------------------
INSERT INTO `t_cate` VALUES ('1', '工程咨询类', '0');
INSERT INTO `t_cate` VALUES ('2', '勘察设计类', '0');
INSERT INTO `t_cate` VALUES ('3', '建筑设计类', '0');
INSERT INTO `t_cate` VALUES ('4', '工程造价类', '0');
INSERT INTO `t_cate` VALUES ('5', '工程监理类', '0');
INSERT INTO `t_cate` VALUES ('6', '工程施工类', '0');
INSERT INTO `t_cate` VALUES ('7', '建筑技工类', '0');
INSERT INTO `t_cate` VALUES ('8', '建筑BIM类', '0');

-- ----------------------------
-- Table structure for t_company
-- ----------------------------
DROP TABLE IF EXISTS `t_company`;
CREATE TABLE `t_company` (
  `comp_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '企业id',
  `comp_name` varchar(100) DEFAULT NULL COMMENT '企业名称',
  `comp_type` varchar(100) DEFAULT NULL COMMENT '企业类型，如:''国营，明英，事业单位等''',
  `comp_industry` varchar(50) DEFAULT NULL COMMENT '所属行业，如：''建筑设计，施工，。。''',
  `comp_scale` varchar(100) DEFAULT NULL COMMENT '企业规模',
  `comp_address` varchar(255) DEFAULT NULL COMMENT '企业所在地址',
  `comp_email` varchar(255) DEFAULT NULL COMMENT '企业邮箱',
  `comp_phone` varchar(255) DEFAULT NULL COMMENT '企业联系电话',
  `comp_pos_count` int(11) DEFAULT NULL COMMENT '发布的职位数量',
  `comp_desc` varchar(1000) DEFAULT NULL COMMENT '企业简介',
  PRIMARY KEY (`comp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_company
-- ----------------------------
INSERT INTO `t_company` VALUES ('1', '华蓝设计（集团）有限公司', '民营', '设计类', '1000-2000人', '广西南宁市', 'hualan888@h.com', '0771-888888', '5', '华蓝集团是以华蓝集团股份公司为核心的现代科技型企业，业务主要围绕工程咨询、工程总承包两大领域，华蓝集团秉承“绘华夏蓝图，筑百年基业”的企业宗旨，致力于成为卓越的城乡建设领域综合服务提供商');
INSERT INTO `t_company` VALUES ('2', '广西华蓝工程总承包管理有限公司', '民营', '工程类', '500-1000人', '广西南宁市', 'hualangongcheng888@h.com', '0771-666666', '0', '广西华蓝工程总承包管理有限公司成立于2012年12月25日，公司业务范围包括：工程总承包管理、工程项目管理、建设工程项目策划、工程技术咨询、工程投资控制管理。工程总承包业务在运作上，采取EPC、PPP、DB、BOT、BT及项目管理等方式，对工程项目的勘察设计、采购、施工、运营等实行全过程或若干阶段的承包。');
INSERT INTO `t_company` VALUES ('3', '广西中蓝审图有限责任公司', '民营', '设计类', '100人以上', '广西南宁市', 'zhonglanshentu888@h.com', '0771-555555', '0', '广西中蓝审图有限责任公司成立于2013年，由华蓝设计（集团）有限公司全额出资成立。公司延续广西建筑综合设计研究院和华蓝设计（集团）有限公司的施工图审查业务。公司具有施工图审查房屋建筑工程（含超限）、市政基础设施（道路、桥梁）工程一类、市政基础设施（给水、排水、风景园林）工程二类审查资格。');
INSERT INTO `t_company` VALUES ('4', '广西华蓝岩土工程有限公司', '民营', '勘察类', '500人以上', '广西南宁市', 'hualanyantu888@h.com', '0771-777777', '1', '广西华蓝岩土工程有限公司是由始建于1953年的原广西建筑综合设计研究院勘察分院改制而成，是广西工程勘察行业规模最大的以岩土工程勘察、岩土工程设计、水文地质勘察、地基基础施工、工程检测、工程测量为主的现代科技型企业，为全国工程勘察先进单位和全国工程勘察与岩土行业诚信单位。');
INSERT INTO `t_company` VALUES ('5', '广西华蓝建筑装饰工程有限公司', '民营', '设计类', '100人以上', '广西南宁市', 'jianzhuzhuangshi888@h.com', '0771-999999', '0', '广西华蓝建筑装饰工程有限公司成立于2007年3月,由广西新艺建筑装饰工程有限公司（成立于1994年）改制而成。公司拥有建筑装饰工程、风景园林工程、建筑幕墙工程等设计、施工资质。并通过ISO9001:2008质量管理体系、环境管理体系、职业健康安全管理体系三标一体认证。获得中国建筑装饰协会颁发的“中国建筑装饰三十年优秀装饰施工企业”、“企业信用等级证书（AAA）”。业务范围辐射广西区内、全国各省市及东南亚国家。');

-- ----------------------------
-- Table structure for t_position
-- ----------------------------
DROP TABLE IF EXISTS `t_position`;
CREATE TABLE `t_position` (
  `pos_id` int(50) NOT NULL AUTO_INCREMENT COMMENT '职位id',
  `pos_name` varchar(100) DEFAULT NULL COMMENT '职位名称',
  `pos_salary` varchar(100) DEFAULT NULL COMMENT '职位薪资',
  `pos_sex` varchar(10) DEFAULT NULL COMMENT '职位要求性别',
  `pos_type` varchar(50) DEFAULT NULL COMMENT '职位类型，可为''1实习，2兼职，3全职’',
  `pos_exp` varchar(100) DEFAULT NULL COMMENT '职位要求工作经验，如：‘不限，1-2年，3-5年等’',
  `pos_edu` varchar(50) DEFAULT NULL COMMENT '学历要求，比如：‘中专，大专，本科，。。。’',
  `work_address` varchar(100) DEFAULT NULL COMMENT '工作地区',
  `pos_age` varchar(50) DEFAULT NULL COMMENT '要求年龄',
  `pos_desc` varchar(1000) DEFAULT NULL COMMENT '职位描述',
  `contact` varchar(100) DEFAULT NULL COMMENT '联系方式',
  `comp_id` int(20) DEFAULT NULL COMMENT '企业的id',
  `pos_number` int(10) DEFAULT NULL COMMENT '招聘人数',
  `sendtime` int(11) DEFAULT NULL COMMENT '职位发布时间',
  `cate_id` int(10) NOT NULL,
  PRIMARY KEY (`pos_id`),
  KEY `fk_t_position_t_company_idx` (`comp_id`) USING BTREE,
  KEY `fk_t_position_t_cate_idx` (`cate_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_position
-- ----------------------------
INSERT INTO `t_position` VALUES ('1', '室内设计师', '6k-8k/月', '不限', '全职', '1-2年', '中专以上', '广西南宁市', '不限', '1、性别不限，年龄不限；<br >      2、专业不限，需精通电脑，熟悉3Dmax、 ps、视频制作、平面广告等，应届生亦可；<br >      3、具有团结合作、吃苦耐劳精神；<br >      4、周末双休，享正常节假日。', '0771-8888888', '1', '2', '1518054158', '3');
INSERT INTO `t_position` VALUES ('2', '设计师助理', '1.5k-3.5k/月', '不限', '全职', '不限', '中专以上', '广西南宁市', '不限', '1、性别不限，30岁以下；<br >      2、建筑设计相关专业，需精通电脑，熟悉3Dmax、 ps、视频制作、平面广告等，应届生亦可；<br >      3、具有团结合作、吃苦耐劳精神；<br >    4、周末双休，享正常节假日。', '0771-8888888', '1', '3', '1518054227', '3');
INSERT INTO `t_position` VALUES ('3', '注册建筑师', '面议', '不限', '全职', '8年以上', '本科以上', '广西南宁市', '不限', '1、性别不限，年龄不限；<br >      2、建筑相关专业，需精通电脑，熟悉3Dmax、 ps、视频制作、平面广告等，8年以上注册建筑师工作经验；<br >      3、具有团结合作、吃苦耐劳精神；<br >      4、周末双休，享正常节假日。', '0771-8888888', '1', '1', '1518054158', '8');
INSERT INTO `t_position` VALUES ('4', '结构设计工程师', '8k-10k/月', '不限', '全职', '1年以上', '本科以上', '广西南宁市', '不限', '1、性别不限，年龄不限，一年以上结构设计工程师工作经验；<br >      2、建筑结构学专业相关，需精通电脑，熟悉3Dmax、 ps、视频制作、平面广告等，应届生亦可；<br >      3、具有团结合作、吃苦耐劳精神；<br >      4、周末双休，享正常节假日。', '0771-8888888', '1', '1', '1518054158', '2');
INSERT INTO `t_position` VALUES ('6', '注册结构工程师', '10k-15k/月', '不限', '全职', '5年以上', '本科以上', '广西南宁市', '24岁以上', '1、性别不限，24以上；<br >      2、建筑、结构专业相关，5年以上结构工程师工作经验；<br  >      3、具有团结合作、吃苦耐劳精神；<br  >      4、周末双休，享正常节假日。', '0771-8888888', '1', '2', '1518054214', '4');
INSERT INTO `t_position` VALUES ('5', '注册岩土工程师', '7k-9k/月', '男', '全职', '2年以上', '本科以上', '广西南宁市', '25-40岁', '1、需要男性，25-40岁；<br >      2、建筑类专业相关，需精通电脑，熟悉3Dmax、 ps、视频制作、平面广告等,有优秀案例优先；<br >      3、具有团结合作、吃苦耐劳精神；<br >      4、周末双休，享正常节假日。', '0771-8888888', '4', '2', '1518054158', '6');

-- ----------------------------
-- Table structure for t_position_collect
-- ----------------------------
DROP TABLE IF EXISTS `t_position_collect`;
CREATE TABLE `t_position_collect` (
  `collect_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '收藏id',
  `user_id` int(10) DEFAULT NULL COMMENT '用户id',
  `pos_id` int(10) DEFAULT NULL COMMENT '职位id',
  `create_time` int(20) DEFAULT NULL COMMENT '收藏时间',
  PRIMARY KEY (`collect_id`),
  KEY `fk_t_collect_t_position_idx` (`pos_id`) USING BTREE,
  KEY `fk_t_collect_t_user_idx` (`user_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_position_collect
-- ----------------------------
INSERT INTO `t_position_collect` VALUES ('2', '1', '3', '1519266738');
INSERT INTO `t_position_collect` VALUES ('10', '1', '1', '1519286705');

-- ----------------------------
-- Table structure for t_position_delivery
-- ----------------------------
DROP TABLE IF EXISTS `t_position_delivery`;
CREATE TABLE `t_position_delivery` (
  `delivery_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '投递id',
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `pos_id` int(10) DEFAULT NULL COMMENT '职位id',
  `create_time` int(50) DEFAULT NULL COMMENT '投递时间',
  PRIMARY KEY (`delivery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_position_delivery
-- ----------------------------
INSERT INTO `t_position_delivery` VALUES ('1', '1', '1', '1519286705');
INSERT INTO `t_position_delivery` VALUES ('7', '1', '2', '1519291760');
INSERT INTO `t_position_delivery` VALUES ('9', '1', '3', '1519292361');
INSERT INTO `t_position_delivery` VALUES ('11', '1', '4', '1519293265');
INSERT INTO `t_position_delivery` VALUES ('12', '1', '5', '1519293337');

-- ----------------------------
-- Table structure for t_resume
-- ----------------------------
DROP TABLE IF EXISTS `t_resume`;
CREATE TABLE `t_resume` (
  `id` int(50) NOT NULL AUTO_INCREMENT COMMENT '简历id',
  `user_id` int(50) NOT NULL COMMENT '用户id',
  `realname` varchar(100) DEFAULT NULL COMMENT '真实姓名',
  `sex` varchar(100) DEFAULT NULL COMMENT '性别',
  `maxedu` varchar(100) DEFAULT NULL COMMENT '最高学历',
  `workexp` varchar(100) DEFAULT NULL COMMENT '工作经验',
  `nowaddress` varchar(100) DEFAULT NULL COMMENT '现居住地',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `workstate` varchar(20) DEFAULT NULL COMMENT '目前状态',
  `jobtype` varchar(20) DEFAULT NULL COMMENT '工作性质',
  `industry` varchar(50) DEFAULT NULL COMMENT '期待行业',
  `position` varchar(100) DEFAULT NULL COMMENT '期待职位',
  `salary` varchar(100) DEFAULT NULL COMMENT '期待薪资',
  `workarea` varchar(100) DEFAULT NULL COMMENT '工作地区',
  `update_time` int(20) DEFAULT NULL,
  `birthy` varchar(100) DEFAULT NULL COMMENT '出生年月',
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号',
  `age` int(50) DEFAULT NULL COMMENT '年龄',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_resume
-- ----------------------------
INSERT INTO `t_resume` VALUES ('1', '1', 'LYC888', '男', '硕士', '5年以上', '广西南宁市', '980469887@qq.com', '观望有好的机会再考虑', '全职', '设计类', '设计师', '7k-15k/月', '广西南宁', '1519259810', '1993-01-10', '18376640435', '25');
INSERT INTO `t_resume` VALUES ('2', '3', 'LYC456', '男', '本科', '3年以上', '广西南宁市', '980469887@qq.com', '观望有好的机会再考虑', '全职', '设计类', '建筑工程师', '7k-15k/月', '广西南宁', '1518074395', '1993-01-10', null, '25');

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '用户密码',
  `login_time` int(100) DEFAULT NULL,
  `type` int(10) DEFAULT NULL COMMENT '用户类型，1表示求职者，2表示企业',
  `create_time` int(20) DEFAULT NULL COMMENT '创建时间',
  `user_phone` varchar(100) DEFAULT NULL COMMENT '手机号',
  `user_email` varchar(100) DEFAULT NULL COMMENT '邮箱号',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', '18376640435', '39ee488c7696d8f3ee3456218666a3c9', '1518144846', '1', '1518144846', '18376640435', null);
INSERT INTO `t_user` VALUES ('2', '980469887@qq.com', 'zxc123456', '1518144888', '2', '1518144846', null, '980469887@qq.com');
INSERT INTO `t_user` VALUES ('3', '13838383388', 'zxc123456', '1518144888', '1', '1518144888', '13838383388', null);
INSERT INTO `t_user` VALUES ('22', '18376640436', 'zxc123456', null, null, '1518414456', '18376640436', null);
SET FOREIGN_KEY_CHECKS=1;
