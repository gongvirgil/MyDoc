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

	//邮件配置
	'SMTP' => array(
		'SMTP_HOST'  => 'smtp.qq.com', //SMTP服务器
		'SMTP_PORT'  => '465', //SMTP服务器端口
		'SMTP_USER'  => 'ppmoli@qq.com', //SMTP服务器用户名
		'SMTP_PASS'  => 'dehrlqcnklwgbbcg', //SMTP服务器密码
		'FROM_EMAIL' => 'ppmoli@qq.com', //发件人EMAIL
		'FROM_NAME'  => '莫离君', //发件人名称
	),

);