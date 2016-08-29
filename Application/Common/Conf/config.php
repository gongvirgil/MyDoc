<?php
return array(
	//'配置项'=>'配置值'

	//数据库配置
	'DB_TYPE'    => 'mysql',
	'DB_HOST'    => 'localhost',
	'DB_NAME'    => 'mydoc',
	'DB_USER'    => 'root',
	'DB_PWD'     => '',
	'DB_PORT'    => 3306,
	'DB_PREFIX'  => 'mydoc_',
	'DB_CHARSET' => 'utf8',
	'DB_DEBUG'   => true,

    //允许访问的模块列表
	'MODULE_ALLOW_LIST' => array('Admin','Api','Auth','Doc','File'),
	'DEFAULT_MODULE'    => 'Admin', // 默认模块
	
	'URL_MODEL' => 2,

	//登录SESSION
	'USER_AUTH_KEY'         => 'login_user',
	'USER_AUTH_VERIFY_CODE' => 'verify',

	//模板
	'Template_path' => './Public/Templates/AdminLTE/html/',
);