<?php
return array(
    //'配置项'=>'配置值'
    'MODULE_ALLOW_LIST'     =>    array('Home','Admin','Club'),  //设置允许访问的模块
    'LOAD_EXT_CONFIG'       =>    'rstatus,test',      // 载入扩展配置
    'DB_NAME'               =>  'club_app',           // 数据库名
    'DB_USER'               =>  'root',      		  // 用户名
    'DB_PWD'                =>  'root',          	  // 密码
    'DB_PORT'               =>  '3306',       		  // 端口
    'DB_PREFIX'             =>  'club_',    		  // 数据库表前缀
);