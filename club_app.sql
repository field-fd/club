-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 08 月 07 日 23:16
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `club_app`
--

-- --------------------------------------------------------

--
-- 表的结构 `club_activity`
--

CREATE TABLE IF NOT EXISTS `club_activity` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `club_id` int(20) NOT NULL COMMENT '社团id',
  `club_name` varchar(50) NOT NULL COMMENT '社团名',
  `theme` varchar(50) NOT NULL,
  `content` text NOT NULL COMMENT '内容',
  `image` varchar(100) NOT NULL,
  `time` int(20) NOT NULL COMMENT '时间',
  `status` int(5) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='社团活动' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `club_activity`
--

INSERT INTO `club_activity` (`id`, `club_id`, `club_name`, `theme`, `content`, `image`, `time`, `status`) VALUES
(1, 2, '鲁大学生网', '好屌的光绘', '多年亏损年四季度房价降幅看不见苦难放进锅内纪念馆进口奶粉进口给你看看', '2015-08-03/55bf09f3cb440.png', 1438583283, 0);

-- --------------------------------------------------------

--
-- 表的结构 `club_admin`
--

CREATE TABLE IF NOT EXISTS `club_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL COMMENT '帐号',
  `password` varchar(50) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `club_admin`
--

INSERT INTO `club_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- 表的结构 `club_club`
--

CREATE TABLE IF NOT EXISTS `club_club` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '社团名',
  `type` varchar(20) NOT NULL COMMENT '社团类型',
  `introduce` text NOT NULL COMMENT '介绍',
  `relation` varchar(50) NOT NULL COMMENT '挂靠院系',
  `guidence` varchar(20) NOT NULL COMMENT '指导老师',
  `chief` varchar(20) NOT NULL COMMENT '负责人名字',
  `qq` int(20) NOT NULL,
  `phone` int(20) NOT NULL COMMENT '手机号',
  `image` varchar(50) NOT NULL COMMENT '社团图标',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `status` int(5) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='社团' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `club_club`
--

INSERT INTO `club_club` (`id`, `name`, `type`, `introduce`, `relation`, `guidence`, `chief`, `qq`, `phone`, `image`, `password`, `status`) VALUES
(2, '鲁大学生网', '院级社团', '哈哈你懂的erzaiyiqi哟', '天天', '', '杰哥', 375373223, 2147483647, '2015-07-26/55b44240ae111.png', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, '哈哈测试的', '院级社团', '的额', '天一', '', '哦哦', 123456, 123456, '2015-07-26/55b448855e75a.png', 'c20ad4d76fe97759aa27a0c99bff6710', 0),
(4, '的', '院级社团', '哦', '', '', '哦', 1212, 11, '2015-07-26/55b45f2d54e21.png', 'c81e728d9d4c2f636f067f89cc14862c', 0),
(5, '个', '院级社团', '个', '个', '个', '个', 44, 44, '2015-07-26/55b4602fd7323.png', 'fcea920f7412b5da7be0cf42b8c93759', 3),
(6, '大', '院级社团', '的', '方', '方', '方', 222, 22, '2015-07-26/55b463110a07a.png', '79d886010186eb60e3611cd4a5d0bcae', 2),
(7, '啊', '院级社团', '啊', '啊', '啊', '啊', 22, 2147483647, '2015-07-26/55b46a827166f.png', '25d55ad283aa400af464c76d713c07ad', 2);

-- --------------------------------------------------------

--
-- 表的结构 `club_department`
--

CREATE TABLE IF NOT EXISTS `club_department` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `club_id` int(20) NOT NULL COMMENT '所属社团id',
  `name` varchar(20) NOT NULL COMMENT '部门名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='社团部门' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `club_department`
--

INSERT INTO `club_department` (`id`, `club_id`, `name`) VALUES
(1, 3, '网络部'),
(5, 3, '呵呵哒');

-- --------------------------------------------------------

--
-- 表的结构 `club_images`
--

CREATE TABLE IF NOT EXISTS `club_images` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `activity_id` int(20) NOT NULL COMMENT '活动id',
  `image_url` varchar(50) NOT NULL COMMENT '地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='活动图片' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `club_member`
--

CREATE TABLE IF NOT EXISTS `club_member` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `club_id` int(20) NOT NULL COMMENT '申请加入社团id',
  `department_id` int(20) NOT NULL COMMENT '部门id',
  `name` varchar(20) NOT NULL COMMENT '名字',
  `sex` varchar(10) NOT NULL COMMENT '性别',
  `college` varchar(50) NOT NULL COMMENT '学院',
  `class` varchar(20) NOT NULL COMMENT '班级',
  `telephone` varchar(13) NOT NULL COMMENT '手机号',
  `qq` int(20) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `hobby` text NOT NULL COMMENT '爱好',
  `reason` text NOT NULL COMMENT '加入理由',
  `department_name` varchar(50) NOT NULL COMMENT '部门名字',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `apply_time` int(20) NOT NULL COMMENT '申请时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='申请加入社团' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `club_member`
--

INSERT INTO `club_member` (`id`, `club_id`, `department_id`, `name`, `sex`, `college`, `class`, `telephone`, `qq`, `email`, `hobby`, `reason`, `department_name`, `status`, `apply_time`) VALUES
(3, 3, 0, '方东', '男', '信电', '', '15552235713', 375373223, '375373223@qq.com', '哦哦', 'uuuuu', '网络部', 1, 1438312598);

-- --------------------------------------------------------

--
-- 表的结构 `club_members`
--

CREATE TABLE IF NOT EXISTS `club_members` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `club_id` int(20) NOT NULL COMMENT '社团id',
  `department_id` int(20) NOT NULL COMMENT '部门id',
  `stu_id` int(20) NOT NULL COMMENT '成员id',
  `member` varchar(20) NOT NULL COMMENT '成员名字',
  `join_time` int(20) NOT NULL COMMENT '加入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='社团部门成员' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `club_student`
--

CREATE TABLE IF NOT EXISTS `club_student` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(20) NOT NULL COMMENT '名字',
  `password` varchar(100) NOT NULL COMMENT '密码',
  `sex` varchar(10) NOT NULL COMMENT '性别',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `image` varchar(100) NOT NULL COMMENT '头像',
  `signature` varchar(200) NOT NULL COMMENT '个性签名',
  `reg_time` int(10) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='学生' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `club_student`
--

INSERT INTO `club_student` (`id`, `name`, `password`, `sex`, `email`, `image`, `signature`, `reg_time`) VALUES
(1, '方东', 'dc483e80a7a0bd9ef71d8cf973673924', '', '375373223@qq.com', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `club_suggestion`
--

CREATE TABLE IF NOT EXISTS `club_suggestion` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `club_id` int(20) NOT NULL COMMENT '社团id',
  `stu_id` int(20) NOT NULL COMMENT '学生id',
  `content` text NOT NULL COMMENT '内容',
  `stu_name` varchar(20) NOT NULL COMMENT '学生名字',
  `time` int(20) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='社团建议' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `club_trend`
--

CREATE TABLE IF NOT EXISTS `club_trend` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `club_id` int(20) NOT NULL COMMENT '社团id',
  `club_name` varchar(50) NOT NULL COMMENT '社团名',
  `conent` text NOT NULL COMMENT '内容',
  `time` int(20) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='社团动态' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
