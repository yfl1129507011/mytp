CREATE TABLE `mt_member` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `username` char(16) NOT NULL DEFAULT '' COMMENT '名称',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` char(32) NOT NULL COMMENT '邮箱',
  `mobile` char(15) NOT NULL COMMENT '手机',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `loginNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `add_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '添加IP',
  `add_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '用户状态',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理表';