<?php
return array(
	//'配置项'=>'配置值'

	//数据库配置
	'DB_TYPE'    => 'mysql',
	'DB_HOST'    => 'localhost',
	'DB_NAME'    => 'mydoc',
	'DB_USER'    => 'root',
	'DB_PWD'     => '123456',
	'DB_PORT'    => 3306,
	'DB_PREFIX'  => 'mydoc_',
	'DB_CHARSET' => 'utf8',
	'DB_DEBUG'   => true,

    //允许访问的模块列表
	'MODULE_ALLOW_LIST' => array('Admin','Api','Auth','Article','Doc','File','Mail'),
	'DEFAULT_MODULE'    => 'Admin', // 默认模块
	
	'URL_MODEL' => 2,
	'URL_CASE_INSENSITIVE' => true,//不区分大小写

	//登录SESSION
	'USER_AUTH_ON'          => true,
	'USER_AUTH_KEY'         => 'login_user_id',
	'USER_AUTH_VERIFY_CODE' => 'verify',

	//模板
	'Template_path' => './Public/Templates/AdminLTE/html/',
	'MailTemplate_path' => './Public/Templates/MailTemplate/',
);