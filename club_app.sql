-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 09 月 12 日 15:00
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='社团活动' AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `club_activity`
--

INSERT INTO `club_activity` (`id`, `club_id`, `club_name`, `theme`, `content`, `image`, `time`, `status`) VALUES
(1, 2, '鲁大学生网', '哦哟哈哈', '对方的不正式上线，原先的博客因为实在太难看，所以这次进行了全\n\n      新的页面布局，而且利用响应式布局做了手机端。这次上线的比较匆忙，遗留了很多问题，我也会尽量利用业余时\n       间抓紧完善，同时，为今天我的个人博客正式上线，原先的博客因为实在太难看，所以这次进行了全新的页面布局，，原先的博客因为实在太难看，所以这次进行了全新的页面布局，', '2015-08-03/55bf09f3cb440.png', 1438583283, 1),
(7, 2, '鲁大学生网', '都不会地方你', '都怪你都怪你带电脑都知道分割线你能够幸福把分享给你发给你发给你方向感女性购房o ', '2015-09-09/55f04e9e3088f.jpg', 1441812126, 0),
(12, 2, '鲁大学生网', 'uyjnuyt怒目恶搞突然很不认同', '头发遇见你郁今天加美女没有他们涂俊明闷容易ujtyujnuy', '2015-09-10/55f109e1ebba3.jpg', 1441860065, 3),
(14, 8, '鲁大在线', '的烦不烦', '个新的保险杠的南京下关多米尼加从银行附近每天面对你的烦恼提高 ', '2015-09-10/55f191ecda69d.png', 1441894892, 0);

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
  `email` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '社团名',
  `type` varchar(20) NOT NULL COMMENT '社团类型',
  `introduce` text NOT NULL COMMENT '介绍',
  `relation` varchar(50) NOT NULL COMMENT '挂靠院系',
  `teacher` varchar(20) NOT NULL COMMENT '指导老师',
  `leader` varchar(20) NOT NULL COMMENT '负责人名字',
  `qq` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL COMMENT '手机号',
  `image` varchar(255) NOT NULL COMMENT '社团图标',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `time` int(20) NOT NULL COMMENT '时间',
  `status` int(5) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='社团' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `club_club`
--

INSERT INTO `club_club` (`id`, `email`, `name`, `type`, `introduce`, `relation`, `teacher`, `leader`, `qq`, `phone`, `image`, `password`, `time`, `status`) VALUES
(2, '375373223@qq.com', '鲁大学生网', '院级社团', '哈哈你懂的erzaiyiqi哟', '天天', '', '杰哥', '375373223', '2147483647', '2015-07-26/55b44240ae111.png', 'e10adc3949ba59abbe56e057f20f883e', 123535353, 1),
(3, '', '哈哈测试的', '院级社团', '的额', '天一', '', '哦哦', '123456', '123456', '2015-07-26/55b448855e75a.png', 'c20ad4d76fe97759aa27a0c99bff6710', 2147483647, 1),
(4, '', '的', '院级社团', '哦', '', '', '哦', '1212', '11', '2015-07-26/55b45f2d54e21.png', 'c81e728d9d4c2f636f067f89cc14862c', 465263322, 3),
(5, '', '个', '院级社团', '个', '个', '个', '个', '44', '44', '2015-07-26/55b4602fd7323.png', 'fcea920f7412b5da7be0cf42b8c93759', 132313, 3),
(6, '', '大', '院级社团', '的', '方', '方', '方', '222', '22', '2015-07-26/55b463110a07a.png', '79d886010186eb60e3611cd4a5d0bcae', 123131516, 0),
(7, '', '啊', '院级社团', '啊', '啊', '啊', '啊', '22', '2147483647', '2015-07-26/55b46a827166f.png', '25d55ad283aa400af464c76d713c07ad', 322513531, 2),
(8, '871806783@qq.com', '鲁大在线', '校级社团', '辅导班消费观念不过分东南亚法国那个号码盖好被的宾夕法尼亚好你好高房价计划赴南非与寂寞姑妈搞一块，可以，模块，优酷辅导班消费观念不过分东南亚法国那个号码盖好被的宾夕法尼亚好你好高房价计划赴南非与寂寞姑妈搞一块，可以，模块，优酷', '团委', '方东', '方东', '871806783', '15552235713', '2015-09-10/55f1812fbcc5f.png', 'e10adc3949ba59abbe56e057f20f883e', 121313133, 0);

-- --------------------------------------------------------

--
-- 表的结构 `club_department`
--

CREATE TABLE IF NOT EXISTS `club_department` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `club_id` int(20) NOT NULL COMMENT '所属社团id',
  `name` varchar(20) NOT NULL COMMENT '部门名称',
  `introduce` varchar(225) NOT NULL COMMENT '部门介绍',
  `create_time` int(20) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='社团部门' AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `club_department`
--

INSERT INTO `club_department` (`id`, `club_id`, `name`, `introduce`, `create_time`) VALUES
(1, 3, '网络部', '', 0),
(31, 8, '估计', '与父母一个蘑菇酷酷', 1441894149),
(18, 2, '网络部', '阿哥合适就卖巨额赎金后恶化日hi哦身体后就饿哦回家iotjhsiortjhio投入及oh突然急后就三天回家哦i怀仁堂囧今天如何将哦it何炅介意哦加油', 1441773173),
(29, 2, '哦哦', 'uik每一i', 1441778765),
(28, 2, '编辑部', '霍芬海姆才搞好他毫不动摇奴役你非要见泥土寂寞图眉宇间看', 1441778222),
(30, 2, '风格和保护', '霍夫曼飞机 韩国记忆很美jyh每个月几号 ', 1441788889),
(32, 8, '才能才搞好 ', '法国飞过海 ', 1441896088),
(34, 8, '方避风港 ', '都搞好刚好 个 ', 1441896212);

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
  `stu_id` int(20) NOT NULL COMMENT '学生id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='申请加入社团' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `club_member`
--

INSERT INTO `club_member` (`id`, `club_id`, `department_id`, `name`, `sex`, `college`, `class`, `telephone`, `qq`, `email`, `hobby`, `reason`, `department_name`, `status`, `apply_time`, `stu_id`) VALUES
(3, 3, 0, '方东', '男', '信电', '', '15552235713', 375373223, '375373223@qq.com', '哦哦', 'uuuuu', '网络部', 1, 1438312598, 1),
(4, 2, 0, '方东测试', '男', '方的风格被低估', '是v', '15552235178', 375373223, '871806783@qq.com', '垫付部分的 ', '不敌法国牛粪个', '才', 0, 1439282691, 1),
(5, 4, 1, '发表您那地方', '男', '还好哥', '哥哥', '1565165542', 2147483647, '375373223@qq.com', '烽火话费换个', '人vsrbtgrnLZ自己举一反三啊，前景色不就是color么\n#test{\nbackground-color:#000}\n#test span{\ncolor:#fff;\nzoom:1 /*触发IE下块级元素*/\nfilter:alpha(opacity=50); \n-moz-opacity:0.5; \nopacity:0.5;', '刚好个', 1, 151511515, 3),
(6, 2, 1, '个', '女', '刚好', '525', '420404020', 50420404, 'fangdong@ldustu.com', '452地方vdfvdf', '人vsrbtgrnLZ自己举一反三啊，前景色不就是color么\n#test{\nbackground-color:#000}\n#test span{\ncolor:#fff;\nzoom:1 /*触发IE下块级元素*/\nfilter:alpha(opacity=50); \n-moz-opacity:0.5; \nopacity:0.5;', '好白虎膏 ', 1, 526526535, 1),
(8, 0, 0, '2', '男', '好', '2525', '15552235713', 375373225, '375373223@qq.com', '法国罢工风波', '与贸易', '2', 0, 1441093110, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='学生' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `club_student`
--

INSERT INTO `club_student` (`id`, `name`, `password`, `sex`, `email`, `image`, `signature`, `reg_time`) VALUES
(1, '方东', 'dc483e80a7a0bd9ef71d8cf973673924', '', '375373223@qq.com', '', '', 0),
(2, 'Jason', 'a6595d35152d563c4b30e5af89f14db6', '', '351192873@qq.com', '', '', 1439085662),
(3, '方东测试', 'e10adc3949ba59abbe56e057f20f883e', '', '871806783@qq.com', '', '', 1439279777),
(4, '测试来的', 'e10adc3949ba59abbe56e057f20f883e', '', '3375373223@qq.com', '', '', 1440950067);

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
