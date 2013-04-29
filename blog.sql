-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 29 日 11:24
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `baike`
--

CREATE TABLE `baike` (
  `id` int(11) NOT NULL auto_increment,
  `sender_id` int(11) default NULL,
  `content` varchar(300) default NULL,
  `good` int(11) default '0',
  `share` int(11) default '0',
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `comment` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- 导出表中的数据 `baike`
--

INSERT INTO `baike` (`id`, `sender_id`, `content`, `good`, `share`, `time`, `comment`) VALUES
(25, 49, 'lzsb', 0, 0, '2013-02-26 22:14:19', 0),
(35, 44, ' 1\n', 0, 0, '2013-02-26 22:55:15', 0),
(36, 50, '123', 0, 0, '2013-02-27 22:00:25', 0),
(58, 44, '<a href="http://localhost/microblog/other_info.php?key=49">@test(49) </a>你为什么叫test呢？因为你就是用来测试的', 0, 0, '2013-03-01 17:09:05', 0),
(59, 44, '<a href="http://localhost/microblog/other_info.php?key=49">@test </a>现在没有id了', 0, 0, '2013-03-01 17:11:12', 1),
(60, 44, '我没有at人', 0, 0, '2013-03-01 17:14:48', 0),
(61, 44, '<a href="http://localhost/microblog/other_info.php?key=49">@test </a>', 0, 0, '2013-03-01 17:16:02', 0),
(62, 44, '我', 0, 0, '2013-03-01 17:16:26', 0),
(63, 44, '好吧', 0, 0, '2013-03-01 17:17:38', 0),
(137, 50, '为什么呢？', 0, 1, '2013-03-01 22:16:34', 0),
(138, 50, '好吧，为什么又好了呢？', 0, 0, '2013-03-01 22:16:49', 0),
(139, 50, '<a href="http://localhost/microblog/other_info.php?key=44">@wangdi </a>你好', 0, 0, '2013-03-01 22:16:59', 0),
(142, 50, '<a href="http://localhost/microblog/other_info.php?key=44">@wangdi </a>', 0, 0, '2013-03-01 22:19:11', 0),
(144, 44, '<img src="images\\upload\\blank_img.png"/>', 0, 0, '2013-03-01 23:41:01', 0),
(145, 44, '<img src="images\\upload\\blank_img.png"/>', 0, 0, '2013-03-01 23:45:49', 0),
(146, 44, '<img src="images\\upload\\blank_img.png"/>', 0, 0, '2013-03-01 23:47:01', 0),
(147, 44, '<img src="images\\upload\\browses.jpg"/>', 0, 0, '2013-03-01 23:51:54', 0),
(148, 44, '<img src="images\\upload\\design.jpg"/>', 0, 0, '2013-03-02 00:01:27', 0),
(149, 44, '<a href="http://localhost/microblog/other_info.php?key=50">@adivon </a>你好', 0, 0, '2013-03-02 13:36:17', 0),
(150, 44, '<img src="images\\upload\\国军.jpg"/>', 0, 0, '2013-03-02 13:59:29', 0),
(151, 44, '<img src="images\\upload\\blank_img.png"/>', 0, 0, '2013-03-02 14:00:12', 0),
(153, 44, '编码问题', 0, 0, '2013-03-02 14:01:52', 1),
(158, 44, '<img src="images\\upload\\haha.jpg"/>', 0, 0, '2013-03-02 14:24:29', 1),
(159, 44, '和肯德基轧空时间后的喀什', 0, 0, '2013-03-02 14:24:40', 0),
(160, 44, '<img src="images\\upload\\battles.jpg"/>\n\n<a href="http://localhost/microblog/other_info.php?key=49">@test </a>', 0, 0, '2013-03-02 15:15:09', 0),
(161, 44, 'wangdi', 1, 0, '2013-03-02 15:23:09', 1),
(162, 44, '分享自137:为什么呢？', 0, 0, '2013-03-02 15:24:26', 0),
(163, 44, '<a href="http://localhost/microblog/other_info.php?key=49">@test </a>', 0, 0, '2013-03-02 15:24:55', 0),
(164, 44, '<a href="http://localhost/microblog/other_info.php?key=49">@test </a>', 0, 0, '2013-03-02 15:26:28', 0),
(165, 49, '<img src="images\\upload\\battles.jpg"/>\n<a href="http://localhost/microblog/other_info.php?key=50">@adivon </a>', 0, 0, '2013-03-02 15:29:28', 0),
(166, 49, '<img src="images\\upload\\2EB6826C0E06FCF34A66EDA0CC210497_1280_960.jpg"/>', 0, 0, '2013-03-02 15:30:58', 0),
(167, 49, '<img src="images\\upload\\2EB6826C0E06FCF34A66EDA0CC210497_1280_960.jpg"/>', 0, 0, '2013-03-02 15:31:47', 0),
(168, 49, '<img src="images\\upload\\2EB6826C0E06FCF34A66EDA0CC210497_1280_960.jpg"/>', 0, 0, '2013-03-02 15:32:22', 0),
(169, 53, '<a href="http://localhost/microblog/other_info.php?key=49">@test </a>', 1, 0, '2013-03-02 15:54:29', 0),
(170, 54, '<a href="http://localhost/microblog/other_info.php?key=44">@wangdi </a>', 0, 0, '2013-03-04 19:12:45', 0),
(171, 44, '<img src="images\\upload\\battles.jpg"/>', 0, 0, '2013-03-04 19:18:28', 0);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL auto_increment,
  `baike_id` int(11) default NULL,
  `commenter_id` int(11) default NULL,
  `content` varchar(100) default NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 导出表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `baike_id`, `commenter_id`, `content`, `time`) VALUES
(1, 57, 44, '<a href="http://localhost/microblog/other_info.php?key=49">@test(49) </a>', '2013-03-01 17:06:08'),
(2, 109, 49, '1234', '2013-03-01 18:46:44'),
(3, 110, 49, '123', '2013-03-01 18:46:47'),
(4, 108, 49, '12345', '2013-03-01 18:46:59'),
(5, 109, 49, '1234', '2013-03-01 18:47:20'),
(6, 161, 44, 'q1231', '2013-03-02 15:23:23'),
(7, 59, 49, 'kljokljkljlk', '2013-03-02 15:28:11'),
(8, 158, 54, 'haoshuai', '2013-03-04 19:11:12'),
(9, 153, 54, '...', '2013-03-04 19:11:29');

-- --------------------------------------------------------

--
-- 表的结构 `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL auto_increment,
  `guanzhu` int(11) default NULL,
  `be_guanzhu` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 导出表中的数据 `friend`
--

INSERT INTO `friend` (`id`, `guanzhu`, `be_guanzhu`) VALUES
(2, 1, 2),
(4, 2, 1),
(6, 1, 8),
(7, 1, 10),
(8, 1, 7),
(9, 1, 11),
(10, 1, 6),
(11, 1, 5),
(14, 1, 9),
(15, 1, 3),
(16, 1, 4),
(18, 50, 44),
(19, 50, 49),
(21, 49, 50),
(22, 51, 50),
(24, 44, 50),
(25, 44, 49),
(26, 53, 49),
(27, 54, 44),
(28, 54, 50);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) default NULL,
  `password` varchar(32) default NULL,
  `msg` int(1) NOT NULL,
  `img` varchar(20) NOT NULL default '0.jpg',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- 导出表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `msg`, `img`) VALUES
(44, 'wangdi', '202cb962ac59075b964b07152d234b70', 0, '44.jpg'),
(49, 'test', '202cb962ac59075b964b07152d234b70', 1, '49.jpg'),
(50, 'adivon', '202cb962ac59075b964b07152d234b70', 1, '0.jpg'),
(51, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 0, '0.jpg'),
(52, '', 'd41d8cd98f00b204e9800998ecf8427e', 0, '0.jpg'),
(53, '123', '202cb962ac59075b964b07152d234b70', 0, '0.jpg'),
(54, 'test1', '202cb962ac59075b964b07152d234b70', 0, '54.jpg'),
(55, 'wsxxdwd', '0df1de2aff845dd4d45f77891740225a', 0, '0.jpg'),
(56, 'dwa', '202cb962ac59075b964b07152d234b70', 0, '0.jpg'),
(57, 'zhr', '202cb962ac59075b964b07152d234b70', 0, '0.jpg');
