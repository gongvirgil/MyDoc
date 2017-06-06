<?php
$db_array = require_once('db_config.php');//数据库配置
$smtp_array = require_once('smtp_config.php');//SMTP配置
$array = array(
	//'配置项'=>'配置值'

	//命名空间配置
	'AUTOLOAD_NAMESPACE' => array(
	    'Lib'     => PATH.'Lib',
	),

    //允许访问的模块列表
	'MODULE_ALLOW_LIST' => array('Admin','Api','Auth','Doc','Test'),
	'DEFAULT_MODULE'    => 'Admin', // 默认模块
	
	'URL_MODEL' => 2,
	'URL_CASE_INSENSITIVE' => true,//不区分大小写

	//登录SESSION
	'USER_AUTH_ON'          => true,
	'USER_AUTH_KEY'         => 'login_user_id',
	'USER_AUTH_VERIFY_CODE' => 'verify',

	//Auth免验证模块
	'NO_AUTH_CHECK' => array(
		'Admin' => '',
		'Test'  => '',
	),

	//模板
	'Template_path'      => './Public/Templates/AdminLTE/html/',
	'MailTemplate_path'  => './Public/Templates/MailTemplate/',
	'ExcelTemplate_path' => './Public/Templates/ExcelTemplate/',

	//Redis缓存
	/*
	'REDIS_HOST'      => "127.0.0.1",
	'REDIS_PORT'      => "6379",
	'DATA_CACHE_TIME' => false,//超时时间
	'persistent'      => false,//长连接
	*/
	//邮件配置
	'SMTP' => $smtp_array,

);
return array_merge($array,$db_array);
