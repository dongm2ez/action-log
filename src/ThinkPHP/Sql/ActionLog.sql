CREATE TABLE `bs_action_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `user_name` varchar(50) DEFAULT NULL COMMENT '用户名冗余',
  `type` varchar(50) NOT NULL DEFAULT '' COMMENT '操作类型：模型自动记录auto 手动记录manual',
  `action_type` varchar(255) DEFAULT NULL COMMENT '动作类型',
  `ip` varchar(50) NOT NULL DEFAULT '' COMMENT '操作者ip',
  `browser` varchar(150) NOT NULL DEFAULT '' COMMENT '浏览器',
  `system` varchar(50) NOT NULL DEFAULT '' COMMENT '操作系统',
  `content` text COMMENT '操作内容',
  `remark` text COMMENT '备注',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COMMENT='操作表';
