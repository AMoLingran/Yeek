-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-06-07 17:23:15
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yeek`
--
CREATE DATABASE IF NOT EXISTS `yeek` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `yeek`;

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL COMMENT 'uid',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '课程名',
  `callname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '简称',
  `techer` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '老师',
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公共/专业'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='科目表';

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `name`, `callname`, `techer`, `type`) VALUES
(1, 'JavaSE', 'java', '陈鹏', '专业课'),
(2, 'Android', 'android', '姚宏', '专业课'),
(3, 'SQL Server', 'sql', '郑倩如', '专业课');

-- --------------------------------------------------------

--
-- 表的结构 `log_upwork_upload`
--

CREATE TABLE `log_upwork_upload` (
  `id` int(11) NOT NULL COMMENT 'uid',
  `fileName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件名',
  `date` datetime NOT NULL COMMENT '上传日期',
  `uploader` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '上传人',
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '科目',
  `workId` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '作业id',
  `fileSize` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件大小'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='upwork上传日志';

--
-- 转存表中的数据 `log_upwork_upload`
--

INSERT INTO `log_upwork_upload` (`id`, `fileName`, `date`, `uploader`, `subject`, `workId`, `fileSize`) VALUES
(1, '0718035莫奕基.doc', '2019-05-27 05:18:23', '07180935', 'sql', '1', '23MB'),
(2, '0718035莫奕基.doc', '2019-05-27 05:18:23', '07180935', NULL, '4', '23MB'),
(3, '0718035莫奕基.doc', '2019-05-27 05:18:23', '071809352', NULL, '2', '23MB'),
(4, '0718035莫奕基.doc', '2019-05-27 05:18:23', '071809352', NULL, '2', '23MB'),
(5, '123123123.doc', '2019-05-27 05:18:23', '123123123', NULL, '4', '23MB'),
(6, 'https设置.txt', '2019-06-03 22:27:49', 'unknown', NULL, '1', '0'),
(7, 'linux指令.txt', '2019-06-03 22:30:15', 'unknown', NULL, '1', '0'),
(8, '07180935莫奕基.txt', '2019-06-03 22:30:51', '07180935', NULL, '1', '0'),
(9, '常用密码字典.txt', '2019-06-03 22:47:04', 'unknown', NULL, '1', '9.56 KB'),
(10, 'https设置.txt', '2019-06-05 00:30:17', 'unknown', NULL, '1', '1.07 KB'),
(11, '07180935莫奕基.txt', '2019-06-05 00:32:04', '07180935', NULL, '5', '370 B');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL COMMENT 'uid',
  `studentId` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学号',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓名',
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '性别',
  `dorm` int(11) NOT NULL COMMENT '宿舍号'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='学生表';

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `studentId`, `name`, `sex`, `dorm`) VALUES
(1, '07180901', '蔡德发', '男', 715),
(2, '07180902', '陈焕波', '男', 718),
(3, '07180903', '陈慧君', '女', 244),
(4, '07180904', '陈俊杰', '男', 715),
(5, '07180905', '陈喜志', '男', 714),
(6, '07180906', '范键沛', '男', 720),
(7, '07180907', '甘秀霞', '女', 226),
(8, '07180908', '高梵', '男', 716),
(9, '07180909', '何奇聪', '男', 713),
(10, '07180910', '何文立', '男', 715),
(11, '07180911', '黄伟杰', '男', 713),
(12, '07180912', '黄颖', '男', 715),
(13, '07180913', '黄勇新', '男', 714),
(14, '07180914', '黄泽楷', '男', 714),
(15, '07180915', '黄政钧', '男', 718),
(16, '07180916', '纪晓聪', '男', 713),
(17, '07180917', '邝丽媚', '女', 244),
(18, '07180918', '李素明', '女', 244),
(19, '07180919', '梁恒德', '男', 715),
(20, '07180920', '梁丽思', '女', 244),
(21, '07180921', '梁云潇', '男', 719),
(22, '07180922', '林宏炜', '男', 718),
(23, '07180923', '林钦炯', '男', 720),
(24, '07180924', '林瑞霖', '男', 716),
(25, '07180925', '林少杰', '男', 720),
(26, '07180926', '林越欣', '男', 718),
(27, '07180927', '林梓航', '男', 715),
(28, '07180928', '凌宇', '男', 716),
(29, '07180929', '凌泽真', '男', 717),
(30, '07180930', '鲁涛', '男', 719),
(31, '07180931', '罗崟', '女', 244),
(32, '07180932', '罗卓滢', '女', 244),
(33, '07180933', '吕洪钦', '男', 713),
(34, '07180934', '麦乔晖', '男', 713),
(35, '07180935', '莫奕基', '男', 717),
(36, '07180936', '潘洋', '男', 719),
(37, '07180937', '王土胜', '男', 714),
(38, '07180938', '王一凡', '男', 716),
(39, '07180939', '王子熙', '男', 718),
(40, '07180940', '吴威龙', '男', 719),
(41, '07180941', '吴宇基', '男', 717),
(42, '07180942', '吴泽桐', '男', 713),
(43, '07180943', '严智鹏', '男', 719),
(44, '07180944', '杨浩泉', '男', 717),
(45, '07180945', '杨远炜', '男', 714),
(46, '07180946', '姚润枝', '男', 717),
(47, '07180947', '叶家癸', '男', 716),
(48, '07180948', '易嘉庆', '男', 717),
(49, '07180949', '郑钢锐', '男', 714),
(50, '07180950', '钟官汉', '男', 719),
(51, '07180951', '钟文宇', '男', 720),
(52, '07180952', '周振鸿', '男', 716),
(53, '07180953', '朱胜辉', '男', 720),
(54, '07180954', '朱祥运', '男', 718),
(55, '06181248', '余深南', '男', 720),
(56, '05180842', '朱誉开', '男', 544);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `view_log_upload`
-- (See below for the actual view)
--
CREATE TABLE `view_log_upload` (
`name` varchar(30)
,`subject` varchar(20)
,`uploader` varchar(50)
,`fileName` varchar(200)
,`date` datetime
,`fileSize` varchar(50)
);

-- --------------------------------------------------------

--
-- 表的结构 `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL COMMENT 'uid',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '作业名',
  `subject` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '科目',
  `start` date DEFAULT NULL COMMENT '开始日期',
  `annex` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '课件名',
  `remarks` text COLLATE utf8mb4_unicode_ci COMMENT '备注',
  `end` date DEFAULT NULL COMMENT '上交日期',
  `need_upload` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='作业表';

--
-- 转存表中的数据 `work`
--

INSERT INTO `work` (`id`, `name`, `subject`, `start`, `annex`, `remarks`, `end`, `need_upload`) VALUES
(1, '第十章上机实验一', 'sql', '2019-05-01', '第十章上机实验一.doc', '测试列', '2019-05-09', b'1'),
(4, '第十章上机实验一2', 'sql', '2019-05-01', '第十章上机实验一.doc', '测试列', '2019-06-20', b'0'),
(5, 'lab3', 'android', '2019-06-02', '', '', '2019-06-17', b'1'),
(6, 'lab4', 'android', '2019-06-07', '', '', '2019-06-24', b'1'),
(7, '第十一章上机实验', 'sql', '2019-06-07', '', '测试列', '2019-06-24', b'1');

-- --------------------------------------------------------

--
-- 视图结构 `view_log_upload`
--
DROP TABLE IF EXISTS `view_log_upload`;

CREATE ALGORITHM=UNDEFINED DEFINER=`moreant`@`%` SQL SECURITY DEFINER VIEW `view_log_upload`  AS  select `work`.`name` AS `name`,`work`.`subject` AS `subject`,`log_upwork_upload`.`uploader` AS `uploader`,`log_upwork_upload`.`fileName` AS `fileName`,`log_upwork_upload`.`date` AS `date`,`log_upwork_upload`.`fileSize` AS `fileSize` from (`work` join `log_upwork_upload`) where (`log_upwork_upload`.`workId` = `work`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `techer` (`techer`),
  ADD UNIQUE KEY `techer_2` (`techer`),
  ADD UNIQUE KEY `name_2` (`name`);

--
-- Indexes for table `log_upwork_upload`
--
ALTER TABLE `log_upwork_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentId` (`studentId`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'uid', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `log_upwork_upload`
--
ALTER TABLE `log_upwork_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'uid', AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'uid', AUTO_INCREMENT=57;
--
-- 使用表AUTO_INCREMENT `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'uid', AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
