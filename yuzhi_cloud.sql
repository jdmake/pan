-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-04-12 09:48:11
-- 服务器版本： 5.6.43A
-- PHP 版本： 5.6.27

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `yuzhi_cloud`
--

-- --------------------------------------------------------

--
-- 表的结构 `yuzhi_member`
--

CREATE TABLE `yuzhi_member` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL COMMENT '登录帐号',
  `password` varchar(255) DEFAULT NULL COMMENT '登录密码',
  `email` varchar(45) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(32) DEFAULT NULL COMMENT '手机号',
  `last_login_ip` varchar(45) DEFAULT NULL COMMENT '上次登录IP',
  `last_login_time` datetime DEFAULT NULL COMMENT '上次登录时间',
  `login_count` int(11) DEFAULT NULL COMMENT '登录次数',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  `group_id` int(11) DEFAULT NULL COMMENT '分组ID',
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `yuzhi_member`
--

INSERT INTO `yuzhi_member` (`id`, `username`, `password`, `email`, `mobile`, `last_login_ip`, `last_login_time`, `login_count`, `create_at`, `status`, `group_id`, `profile_id`) VALUES
(6, 'jdmake', '$2y$10$Jpglk/Y/D8PeUgPNZYL9pewD6bu4tGzs5XoyJwClVX3vCFbC3SM42', NULL, NULL, NULL, NULL, 0, '2019-04-12 16:59:55', 0, 1, 9),
(9, 'wjbhk', '$2y$10$sZVqAyZWY5sjPO7lFjn3nOEtm0FwpKeYxUzfcZxMe8YJbIyW1pevW', NULL, NULL, NULL, NULL, 0, '2019-04-12 17:01:23', 0, 1, 12);

-- --------------------------------------------------------

--
-- 表的结构 `yuzhi_member_credit`
--

CREATE TABLE `yuzhi_member_credit` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL COMMENT '名称',
  `total` int(11) DEFAULT NULL COMMENT '数量',
  `volume` int(11) DEFAULT NULL COMMENT '精度小数点位数',
  `frozen` int(11) DEFAULT NULL COMMENT '冻结'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `yuzhi_member_credit`
--

INSERT INTO `yuzhi_member_credit` (`id`, `uid`, `title`, `total`, `volume`, `frozen`) VALUES
(12, 6, '积分', 0, 0, 0),
(13, 6, '余额', 0, 100, 0),
(16, 9, '积分', 0, 0, 0),
(17, 9, '余额', 0, 100, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yuzhi_member_group`
--

CREATE TABLE `yuzhi_member_group` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL COMMENT '分组名称',
  `desc` varchar(200) DEFAULT NULL COMMENT '分组介绍',
  `is_default` int(11) DEFAULT NULL COMMENT '默认分组'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `yuzhi_member_group`
--

INSERT INTO `yuzhi_member_group` (`id`, `title`, `desc`, `is_default`) VALUES
(1, '普通会员', '一般的会员', 1);

-- --------------------------------------------------------

--
-- 表的结构 `yuzhi_member_profile`
--

CREATE TABLE `yuzhi_member_profile` (
  `id` int(11) NOT NULL,
  `nickname` varchar(45) DEFAULT NULL COMMENT '昵称',
  `portrait` varchar(256) DEFAULT NULL COMMENT '用户头像',
  `realname` varchar(45) DEFAULT NULL COMMENT '真实姓名',
  `gender` tinyint(1) DEFAULT NULL COMMENT '性别 1 男 2 女',
  `age` int(11) DEFAULT NULL COMMENT '年龄',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `birthyear` int(11) DEFAULT NULL COMMENT '出生年份',
  `birthmonth` int(11) DEFAULT NULL COMMENT '出生月份',
  `birthday` int(11) DEFAULT NULL COMMENT '出生日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `yuzhi_member_profile`
--

INSERT INTO `yuzhi_member_profile` (`id`, `nickname`, `portrait`, `realname`, `gender`, `age`, `address`, `birthyear`, `birthmonth`, `birthday`) VALUES
(9, 'jdmake\'', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'wjbhk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `yuzhi_menus`
--

CREATE TABLE `yuzhi_menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT '父ID',
  `title` varchar(45) DEFAULT NULL COMMENT '菜单名称',
  `icon` varchar(45) DEFAULT NULL COMMENT '菜单图标',
  `path` varchar(45) DEFAULT NULL COMMENT '连接地址URL',
  `is_delete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `yuzhi_menus`
--

INSERT INTO `yuzhi_menus` (`id`, `parent_id`, `title`, `icon`, `path`, `is_delete`) VALUES
(2, 0, '会员管理', 'linecons-user', '/admin/member/', 0),
(3, 0, '粉丝管理', 'linecons-heart', '/admin/member/fans', 0);

--
-- 转储表的索引
--

--
-- 表的索引 `yuzhi_member`
--
ALTER TABLE `yuzhi_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `idx_profile_id` (`profile_id`) USING BTREE,
  ADD KEY `idx_group_id` (`group_id`) USING BTREE;

--
-- 表的索引 `yuzhi_member_credit`
--
ALTER TABLE `yuzhi_member_credit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ipx_uid_title` (`title`,`uid`) USING BTREE;

--
-- 表的索引 `yuzhi_member_group`
--
ALTER TABLE `yuzhi_member_group`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `yuzhi_member_profile`
--
ALTER TABLE `yuzhi_member_profile`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `yuzhi_menus`
--
ALTER TABLE `yuzhi_menus`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `yuzhi_member`
--
ALTER TABLE `yuzhi_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `yuzhi_member_credit`
--
ALTER TABLE `yuzhi_member_credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `yuzhi_member_group`
--
ALTER TABLE `yuzhi_member_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `yuzhi_member_profile`
--
ALTER TABLE `yuzhi_member_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `yuzhi_menus`
--
ALTER TABLE `yuzhi_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 限制导出的表
--

--
-- 限制表 `yuzhi_member`
--
ALTER TABLE `yuzhi_member`
  ADD CONSTRAINT `foreign_group` FOREIGN KEY (`group_id`) REFERENCES `yuzhi_member_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `foreign_profile` FOREIGN KEY (`profile_id`) REFERENCES `yuzhi_member_profile` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
