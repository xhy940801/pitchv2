-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2013 年 11 月 26 日 17:03
-- 服务器版本: 5.5.34-0ubuntu0.12.04.1
-- PHP 版本: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `pitchv2`
--

-- --------------------------------------------------------

--
-- 表的结构 `pitchv2_assignments`
--

DROP TABLE IF EXISTS `pitchv2_assignments`;
CREATE TABLE IF NOT EXISTS `pitchv2_assignments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `the_number_needed` int(10) NOT NULL,
  `date` date NOT NULL,
  `start_leisure` varchar(2) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `end_leisure` varchar(2) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pitchv2_departments`
--

DROP TABLE IF EXISTS `pitchv2_departments`;
CREATE TABLE IF NOT EXISTS `pitchv2_departments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `intro` text CHARACTER SET utf8 COLLATE utf8_bin,
  `message` text CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `pitchv2_departments`
--

INSERT INTO `pitchv2_departments` (`id`, `name`, `intro`, `message`) VALUES
(1, '技术部', '技术部主要负责对百步梯网站、软件的开发与维护。用键盘敲击精彩，用代码续写辉煌。', ''),
(2, '视频部', '用DV看世界，用影像记录一切。华工最前沿的新闻记者，最专业的视频制作团队，这里追踪时事热点，这里记录校园生活。“关注华工生活，反映同学心声”是我们永远的宗旨。只要你有热情，只要你有想法，只要你有理想，用小小视频拍出大大世界~~百步梯视频部，用DV来FUN转你的视界', ''),
(3, '节目部', '请打开耳朵，我们的声音之旅从这里起航。每天下午五点三十分，陪伴你的校园广播。或许你有好的声音，或许你有好的创意，或许你有好的文采，又或许，你认为这里需要你，而你也需要这里。百步梯节目部，期待你的加入，用声音与你分享生活。', ''),
(4, '外联部', '外联部是百步梯对外交流的窗口，我们本着勇于挑战、自信乐观的宗旨，力求以最完美的公关形象展现百步梯的风采。作为与社会联系最紧密的部门，我们主要负责与企业进行公关洽谈、高校间信息交流互通、与各大媒体紧密合作以及配合其他部门举办活动。我们是一支智慧与实干相结合的优秀公关团队，并始终以广阔的社会视角担任好百步梯的“外交使者”。', ''),
(5, '美工部', '想展示自己的才华？想挥洒热血的青春？想被更多的人认可自己的创意？这里是百步梯直接宣传推广的平台，我们喜欢有FEEL的海报，喜欢充满创意的绘板，一同学习一同成长。用你的细腻传递美的触感，我们期待你的加入。', ''),
(6, '新闻资讯部', '在这里的人们具有一流的人格素养和生活触觉，以及引以为豪的专业技术。当你像魔术师一样操控灵动的文字和照片的时候，你不仅仅在记录生活，更是在书写历史。', ''),
(7, '策划推广部', '我们负责策划、筹备和执行百步梯各品牌活动如“雕刻时光”电影盛典、光迹涂鸦和二手市场等。并成功让这些活动跻身于华园最受欢迎活动的行列中。此外，我们还肩负着统筹百步梯内部资源向师生推广百步梯的责任。我们是百步梯活动与推广的总设计师。相信自己，你的每一丝创意都将汇集成我们最具创意的活动！你能行！', ''),
(8, '综合管理部', '综合管理部以求是严谨、开拓创新为行为准则，在建立完善物资、财务、人力、行政会务四项制度的同时，肩负着百步梯内部活动的策划与组织的职责。我们是BBT庞大的根系，手手相牵，沟通各部门，深扎于彼此。而有了你，我们相信我们能在百步梯登上第101阶，综合管理部期待你的加入！', ''),
(9, '编辑部', '爱报纸的你？想编杂志的你？苦于没有展示平台的你？编辑部欢迎你！精美的杂志？专业的报纸？美幻的特色期刊？给力的网站运营？有趣的个性摄影？犀利的专题报道？没错，这是我们编辑部做的！加入我们！这也即将是你做的！', '');

-- --------------------------------------------------------

--
-- 表的结构 `pitchv2_groups`
--

DROP TABLE IF EXISTS `pitchv2_groups`;
CREATE TABLE IF NOT EXISTS `pitchv2_groups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `intro` text CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `pitchv2_groups`
--

INSERT INTO `pitchv2_groups` (`id`, `name`, `intro`) VALUES
(1, '超级管理员', ''),
(2, '管理员', ''),
(3, '常委', '这是百步梯的最高决策层和管理层，直接和学校的老师接触'),
(4, '部长', ''),
(5, '主管', ''),
(6, '干事', '');

-- --------------------------------------------------------

--
-- 表的结构 `pitchv2_matches`
--

DROP TABLE IF EXISTS `pitchv2_matches`;
CREATE TABLE IF NOT EXISTS `pitchv2_matches` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `signed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pitchv2_projects`
--

DROP TABLE IF EXISTS `pitchv2_projects`;
CREATE TABLE IF NOT EXISTS `pitchv2_projects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `remark` text CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `pitchv2_projects`
--

INSERT INTO `pitchv2_projects` (`id`, `name`, `remark`) VALUES
(1, 'asdf', NULL),
(2, 'asdf', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `pitchv2_timetables`
--

DROP TABLE IF EXISTS `pitchv2_timetables`;
CREATE TABLE IF NOT EXISTS `pitchv2_timetables` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `leisure` varchar(5) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `user_id` int(10) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- 转存表中的数据 `pitchv2_timetables`
--

INSERT INTO `pitchv2_timetables` (`id`, `leisure`, `user_id`, `checked`) VALUES
(62, 'b0', 1, 1),
(63, 'a1', 1, 1),
(64, 'a3', 1, 1),
(65, 'c3', 1, 1),
(101, 'b0', 1, 0),
(102, 'a1', 1, 0),
(103, 'c2', 1, 0),
(104, 'a3', 1, 0),
(105, 'b3', 1, 0),
(106, 'c3', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `pitchv2_users`
--

DROP TABLE IF EXISTS `pitchv2_users`;
CREATE TABLE IF NOT EXISTS `pitchv2_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` varchar(12) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `department_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `modified` datetime NOT NULL,
  `login_times` int(10) NOT NULL DEFAULT '1',
  `pitch_times` int(10) NOT NULL DEFAULT '0',
  `authority` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num` (`num`),
  KEY `group_id` (`group_id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=477 ;

--
-- 转存表中的数据 `pitchv2_users`
--

INSERT INTO `pitchv2_users` (`id`, `num`, `department_id`, `group_id`, `modified`, `login_times`, `pitch_times`, `authority`) VALUES
(1, '201010101010', 1, 1, '2013-11-23 01:44:41', 12, 0, 0),
(2, '201136031054', 8, 4, '2013-11-05 20:50:27', 1, 0, 0),
(3, '201230030113', 5, 5, '2013-11-05 20:50:27', 1, 0, 0),
(4, '201130030138', 8, 4, '2013-11-05 20:50:27', 1, 0, 0),
(5, '201230903134', 8, 5, '2013-11-05 20:50:27', 1, 0, 0),
(6, '201230730303', 8, 5, '2013-11-05 20:50:27', 1, 0, 0),
(7, '201130821132', 3, 4, '2013-11-05 20:50:27', 1, 0, 0),
(8, '201230501354', 8, 5, '2013-11-05 20:50:27', 1, 0, 0),
(9, '201230500432', 8, 5, '2013-11-05 20:50:27', 1, 0, 0),
(10, '201230541459', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(11, '201230641302', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(12, '201230030281', 8, 5, '2013-11-05 20:50:27', 1, 0, 0),
(13, '201230242189', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(14, '201230150354', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(15, '201230120272', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(16, '201230510028', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(17, '201230902458', 8, 5, '2013-11-05 20:50:27', 1, 0, 0),
(18, '201230221344', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(19, '201262770148', 8, 5, '2013-11-05 20:50:27', 1, 0, 0),
(20, '201230040259', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(21, '201230710428', 8, 5, '2013-11-05 20:50:27', 1, 0, 0),
(22, '201230702089', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(23, '201130740297', 8, 4, '2013-11-05 20:50:27', 1, 0, 0),
(24, '201230012331', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(25, '201130700062', 4, 4, '2013-11-05 20:50:27', 1, 0, 0),
(26, '201130651272', 2, 4, '2013-11-05 20:50:27', 1, 0, 0),
(27, '201130030053', 9, 4, '2013-11-05 20:50:27', 1, 0, 0),
(28, '201130790339', 9, 4, '2013-11-05 20:50:27', 1, 0, 0),
(29, '201130640276', 9, 4, '2013-11-05 20:50:27', 1, 0, 0),
(30, '201130031111', 9, 4, '2013-11-05 20:50:27', 1, 0, 0),
(31, '201130640016', 6, 4, '2013-11-05 20:50:27', 1, 0, 0),
(32, '201130720374', 5, 4, '2013-11-05 20:50:27', 1, 0, 0),
(33, '201136730070', 5, 4, '2013-11-05 20:50:27', 1, 0, 0),
(34, '201130671409', 5, 4, '2013-11-05 20:50:27', 1, 0, 0),
(35, '201130632394', 7, 4, '2013-11-05 20:50:27', 1, 0, 0),
(36, '201130630116', 7, 4, '2013-11-05 20:50:27', 1, 0, 0),
(37, '201133770277', 2, 4, '2013-11-05 20:50:27', 1, 0, 0),
(38, '201130580091', 1, 4, '2013-11-05 20:50:27', 1, 0, 0),
(39, '201230674263', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(40, '201230673440', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(41, '201230620109', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(42, '201230601252', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(43, '201230673068', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(44, '201230700108', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(45, '201230800457', 7, 5, '2013-11-05 20:50:27', 1, 0, 0),
(46, '201230031042', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(47, '201230070164', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(48, '201236320218', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(49, '201230673372', 7, 5, '2013-11-05 20:50:27', 1, 0, 0),
(50, '201230691468', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(51, '201236673314', 7, 5, '2013-11-05 20:50:27', 1, 0, 0),
(52, '201230301213', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(53, '201230840279', 7, 5, '2013-11-05 20:50:27', 1, 0, 0),
(54, '201230301138', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(55, '201230730174', 7, 5, '2013-11-05 20:50:27', 1, 0, 0),
(56, '201230221177', 7, 5, '2013-11-05 20:50:27', 1, 0, 0),
(57, '201230030182', 7, 5, '2013-11-05 20:50:27', 1, 0, 0),
(58, '201230790109', 7, 5, '2013-11-05 20:50:27', 1, 0, 0),
(59, '201230570053', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(60, '201230670111', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(61, '201230720496', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(62, '201237030499', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(63, '201230620437', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(64, '201230620499', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(65, '201237501043', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(66, '201230260268', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(67, '201230620048', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(68, '201230730358', 2, 5, '2013-11-05 20:50:27', 1, 0, 0),
(69, '201230830294', 2, 5, '2013-11-05 20:50:27', 1, 0, 0),
(70, '201230902328', 2, 5, '2013-11-05 20:50:27', 1, 0, 0),
(71, '201230461214', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(72, '201230760133', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(73, '201230290173', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(74, '201230570275', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(75, '201230250078', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(76, '201230390286', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(77, '201230270243', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(78, '201230611039', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(79, '201233840078', 3, 5, '2013-11-05 20:50:27', 1, 0, 0),
(80, '201230600156', 2, 5, '2013-11-05 20:50:27', 1, 0, 0),
(81, '201230672320', 2, 5, '2013-11-05 20:50:27', 1, 0, 0),
(82, '201230370233', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(83, '201230260176', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(84, '201230644112', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(85, '201230850087', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(86, '201236270100', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(87, '201230222471', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(88, '201230280396', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(89, '201230610155', 2, 5, '2013-11-05 20:50:27', 1, 0, 0),
(90, '201230301312', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(91, '201130650374', 4, 4, '2013-11-05 20:50:27', 1, 0, 0),
(92, '201130633285', 1, 4, '2013-11-05 20:50:27', 1, 0, 0),
(93, '201230670371', 4, 5, '2013-11-05 20:50:27', 1, 0, 0),
(94, '201230410113', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(95, '201230180108', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(96, '201236790080', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(97, '201230230100', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(98, '201236680084', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(99, '201230890397', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(100, '201230541176', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(101, '201230860130', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(102, '201230800242', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(103, '201230282482', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(104, '201230630290', 4, 5, '2013-11-05 20:50:27', 1, 0, 0),
(105, '201261330404', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(106, '201230580212', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(107, '201230643221', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(108, '201230730327', 4, 5, '2013-11-05 20:50:27', 1, 0, 0),
(109, '201230643276', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(110, '201230230063', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(111, '201230702157', 4, 5, '2013-11-05 20:50:27', 1, 0, 0),
(112, '201130780330', 2, 4, '2013-11-05 20:50:27', 1, 0, 0),
(113, '201230860161', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(114, '201230840033', 5, 5, '2013-11-05 20:50:27', 1, 0, 0),
(115, '201237840210', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(116, '201230031059', 5, 5, '2013-11-05 20:50:27', 1, 0, 0),
(117, '201230820059', 5, 5, '2013-11-05 20:50:27', 1, 0, 0),
(118, '201230674195', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(119, '201236730024', 5, 5, '2013-11-05 20:50:27', 1, 0, 0),
(120, '201230030168', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(121, '201230030205', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(122, '201230430227', 5, 5, '2013-11-05 20:50:27', 1, 0, 0),
(123, '201230530255', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(124, '201230240406', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(125, '201230711203', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(126, '201230450188', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(127, '201230030373', 5, 5, '2013-11-05 20:50:27', 1, 0, 0),
(128, '201230891011', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(129, '201230890113', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(130, '201230220279', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(131, '201230901178', 5, 5, '2013-11-05 20:50:27', 1, 0, 0),
(132, '201236040239', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(133, '201237222382', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(134, '201230541329', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(135, '201130490499', 4, 4, '2013-11-05 20:50:27', 1, 0, 0),
(136, '201136770090', 6, 4, '2013-11-05 20:50:27', 1, 0, 0),
(137, '201130780231', 3, 4, '2013-11-05 20:50:27', 1, 0, 0),
(138, '201130590212', 3, 4, '2013-11-05 20:50:27', 1, 0, 0),
(139, '201230860277', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(140, '201230643474', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(141, '201236830045', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(142, '201230830133', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(143, '201230860086', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(144, '201230740265', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(145, '201230030069', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(146, '201230580151', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(147, '201230570305', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(148, '201236251079', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(149, '201230440318', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(150, '201230222136', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(151, '201230850254', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(152, '201230411356', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(153, '201230900256', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(154, '201230720298', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(155, '201230640381', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(156, '201230251105', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(157, '201230671149', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(158, '201230673327', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(159, '201230701204', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(160, '201230901154', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(161, '201230200165', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(162, '201230590013', 4, 5, '2013-11-05 20:50:27', 1, 0, 0),
(163, '201230221245', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(164, '201230170109', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(165, '201230641401', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(166, '201230902144', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(167, '201230420365', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(168, '201230903028', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(169, '201236780197', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(170, '201230860031', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(171, '201230510073', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(172, '201230501385', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(173, '201230551212', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(174, '201230300438', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(175, '201230420334', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(176, '201230493208', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(177, '201236260033', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(178, '201261720069', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(179, '201230180078', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(180, '201230671057', 3, 5, '2013-11-05 20:50:27', 1, 0, 0),
(181, '201236600341', 3, 5, '2013-11-05 20:50:27', 1, 0, 0),
(182, '201230490078', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(183, '201236570200', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(184, '201236243067', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(185, '201230643115', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(186, '201230780292', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(187, '201230380058', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(188, '201230674072', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(189, '201230410403', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(190, '201230870405', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(191, '201230501293', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(192, '201230720489', 3, 5, '2013-11-05 20:50:27', 1, 0, 0),
(193, '201261830218', 3, 5, '2013-11-05 20:50:27', 1, 0, 0),
(194, '201230860284', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(195, '201230702126', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(196, '201230770330', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(197, '201230283403', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(198, '201239630208', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(199, '201230760119', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(200, '201230691048', 3, 5, '2013-11-05 20:50:27', 1, 0, 0),
(201, '201230860024', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(202, '201230860307', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(203, '201230510295', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(204, '201230830089', 3, 5, '2013-11-05 20:50:27', 1, 0, 0),
(205, '201230223157', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(206, '201230250030', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(207, '201230220248', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(208, '201230510226', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(209, '201230284226', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(210, '201230431262', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(211, '201230541213', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(212, '201230060141', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(213, '201230230179', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(214, '201230281393', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(215, '201230900188', 7, 5, '2013-11-05 20:50:27', 1, 0, 0),
(216, '201230283304', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(217, '201230674447', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(218, '201230380065', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(219, '201230692120', 8, 5, '2013-11-05 20:50:27', 1, 0, 0),
(220, '201230470018', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(221, '201230500487', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(222, '201330221497', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(223, '201330860337', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(224, '201230750127', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(225, '201330670417', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(226, '201230671125', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(227, '201230031066', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(228, '201330790122', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(229, '201230030274', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(230, '201230860222', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(231, '201230030090', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(232, '201230860147', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(233, '201330860276', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(234, '201230030250', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(235, '201230030120', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(236, '201336432460', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(237, '201230730136', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(238, '201230670104', 9, 5, '2013-11-05 20:50:27', 1, 0, 0),
(239, '201330221374', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(240, '201230850155', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(241, '201230241434', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(242, '201236850227', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(243, '201230493321', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(244, '201230800150', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(245, '201230360432', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(246, '201230411417', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(247, '201230800136', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(248, '201330870121', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(249, '201230830119', 6, 5, '2013-11-05 20:50:27', 1, 0, 0),
(250, '201230281140', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(251, '201239281059', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(252, '201230670340', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(253, '201230280082', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(254, '201230830157', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(255, '201230672252', 1, 5, '2013-11-05 20:50:27', 1, 0, 0),
(256, '201230420372', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(257, '201230891288', 3, 5, '2013-11-05 20:50:27', 1, 0, 0),
(258, '201221029690', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(259, '201236690366', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(260, '201130632189', 1, 4, '2013-11-05 20:50:27', 1, 0, 0),
(261, '201330610281', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(262, '201330670462', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(263, '201330583373', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(264, '201330690071', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(265, '201330371147', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(266, '201330180060', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(267, '201330680294', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(268, '201330460353', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(269, '201330612103', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(270, '201330480146', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(271, '201362630342', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(272, '201330760057', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(273, '201330230031', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(274, '201330660333', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(275, '201330310214', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(276, '201330520392', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(277, '201330810240', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(278, '201330950021', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(279, '201330661224', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(280, '201330641196', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(281, '201330670295', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(282, '201330860481', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(283, '201330861112', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(284, '201330530094', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(285, '201330170283', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(286, '201330780215', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(287, '201330631149', 4, 6, '2013-11-05 20:50:27', 1, 0, 0),
(288, '201335611378', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(289, '201330900026', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(290, '201330571059', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(291, '201330552218', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(292, '201330612097', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(293, '201336620140', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(294, '201330550320', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(295, '201330612141', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(296, '201330550252', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(297, '201330561159', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(298, '201330190090', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(299, '201330641288', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(300, '201330800036', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(301, '201330270150', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(302, '201330420043', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(303, '201336242151', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(304, '201330850154', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(305, '201330551303', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(306, '201330630169', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(307, '201330060300', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(308, '201330860085', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(309, '201330560190', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(310, '201330271034', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(311, '201330201130', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(312, '201330460322', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(313, '201330490169', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(314, '201330560268', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(315, '201330111446', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(316, '201330910087', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(317, '201369990111', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(318, '201330860108', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(319, '201330650129', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(320, '201330630176', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(321, '201330310016', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(322, '201320132013', 1, 6, '2013-11-05 20:50:27', 1, 0, 0),
(323, '201330070156', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(324, '201330790207', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(325, '201330250336', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(326, '201330584172', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(327, '201330420234', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(328, '201330350371', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(329, '201330581195', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(330, '201330220346', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(331, '201330493177', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(332, '201330641431', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(333, '201333670209', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(334, '201330254082', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(335, '201330800050', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(336, '201330240269', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(337, '201330390131', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(338, '201336810107', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(339, '201330841046', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(340, '201330320374', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(341, '201330340105', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(342, '201330700237', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(343, '201330340129', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(344, '201330221176', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(345, '201330040142', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(346, '201336780455', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(347, '201330841497', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(348, '201330630428', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(349, '201330040272', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(350, '201330780031', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(351, '201330560220', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(352, '201330390261', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(353, '201330780406', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(354, '201330830040', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(355, '201330380385', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(356, '201336800153', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(357, '201330390056', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(358, '201330750058', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(359, '201330202403', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(360, '201333790310', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(361, '201330480474', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(362, '201330271010', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(363, '201330221060', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(364, '201362401256', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(365, '201330700053', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(366, '201330271287', 8, 6, '2013-11-05 20:50:27', 1, 0, 0),
(367, '201339060325', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(368, '201330040265', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(369, '201330061437', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(370, '201330940237', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(371, '201330480276', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(372, '201330481098', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(373, '201330202274', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(374, '201330950045', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(375, '201330490077', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(376, '201330460360', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(377, '201330110487', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(378, '201330980172', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(379, '201330020380', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(380, '201336432194', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(381, '201330223408', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(382, '201330210071', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(383, '201330210224', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(384, '201330371048', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(385, '201330201338', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(386, '201330841091', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(387, '201330430493', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(388, '201330910209', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(389, '201330112122', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(390, '201330613506', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(391, '201330450033', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(392, '201330890143', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(393, '201330371109', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(394, '201337840310', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(395, '201337840301', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(396, '201335860288', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(397, '201330160109', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(398, '201330630312', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(399, '201330570304', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(400, '201330750362', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(401, '201330860016', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(402, '201337810304', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(403, '201330890259', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(404, '201330250282', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(405, '201330730111', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(406, '201330860269', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(407, '201330380248', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(408, '201330670486', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(409, '201330510164', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(410, '201330491098', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(411, '201330780130', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(412, '201336090363', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(413, '201330581157', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(414, '201336651281', 7, 6, '2013-11-05 20:50:27', 1, 0, 0),
(415, '201330561173', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(416, '201330380200', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(417, '201330223460', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(418, '201330220247', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(419, '201330582222', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(420, '201330253108', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(421, '201330222289', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(422, '201330800074', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(423, '201330251463', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(424, '201330780024', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(425, '201330381313', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(426, '201330680348', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(427, '201330530209', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(428, '201330582406', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(429, '201330583458', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(430, '201330451115', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(431, '201330061390', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(432, '201330920017', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(433, '201330770223', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(434, '201330492088', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(435, '201330690293', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(436, '201330510256', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(437, '201130770218', 6, 4, '2013-11-05 20:50:27', 1, 0, 0),
(438, '201330862076', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(439, '201330530223', 3, 6, '2013-11-05 20:50:27', 1, 0, 0),
(440, '201362651095', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(441, '201230902410', 7, 5, '2013-11-05 20:50:27', 1, 0, 0),
(442, '201330222081', 9, 6, '2013-11-05 20:50:27', 1, 0, 0),
(443, '201130580473', 7, 4, '2013-11-05 20:50:27', 1, 0, 0),
(444, '201330551266', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(445, '201330020144', 2, 6, '2013-11-05 20:50:27', 1, 0, 0),
(446, '201336850219', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(447, '201330890099', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(448, '201330612158', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(449, '201330790283', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(450, '201330650143', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(451, '201330160390', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(452, '201330842456', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(453, '201330841176', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(454, '201330381238', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(455, '201330330137', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(456, '201330011418', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(457, '201330890228', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(458, '201330860245', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(459, '201330860214', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(460, '201330480504', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(461, '201330570137', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(462, '201330160338', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(463, '201330810042', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(464, '201330860443', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(465, '201330780444', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(466, '201336790348', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(467, '201330050363', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(468, '201330430028', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(469, '201330350449', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(470, '201330011081', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(471, '201330430240', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(472, '201330680331', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(473, '201330451184', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(474, '201330222326', 6, 6, '2013-11-05 20:50:27', 1, 0, 0),
(475, '201330170269', 5, 6, '2013-11-05 20:50:27', 1, 0, 0),
(476, '201330223439', 5, 6, '2013-11-05 20:50:27', 1, 0, 0);

--
-- 触发器 `pitchv2_users`
--
DROP TRIGGER IF EXISTS `point_iogin_times`;
DELIMITER //
CREATE TRIGGER `point_iogin_times` BEFORE UPDATE ON `pitchv2_users`
 FOR EACH ROW BEGIN
SET new.login_times = old.login_times +1;
end
//
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
