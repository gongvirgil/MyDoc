#Document of gong_web
##datatables_demo
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
id|int(10)||NO|PRI||auto_increment|select,insert,update,references|
first_name|varchar(250)|utf8_general_ci|NO||||select,insert,update,references|
last_name|varchar(250)|utf8_general_ci|NO||||select,insert,update,references|
position|varchar(250)|utf8_general_ci|NO||||select,insert,update,references|
email|varchar(250)|utf8_general_ci|NO||||select,insert,update,references|
office|varchar(250)|utf8_general_ci|NO||||select,insert,update,references|
start_date|datetime||YES||||select,insert,update,references|
age|int(8)||YES||||select,insert,update,references|
salary|int(8)||YES||||select,insert,update,references|
seq|int(8)||YES|MUL|||select,insert,update,references|
extn|varchar(8)|utf8_general_ci|NO||||select,insert,update,references|
##gong_admin_login_error
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
error_id|int(9)||NO|PRI||auto_increment|select,insert,update,references|id
input_manager_name|varchar(30)|utf8_general_ci|NO||||select,insert,update,references|用户名
input_manager_pwd|varchar(30)|utf8_general_ci|NO||||select,insert,update,references|密码
os|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|操作系统
time|int(12)||NO||||select,insert,update,references|登录时间
ip|varchar(18)|utf8_general_ci|NO||||select,insert,update,references|登录ip
##gong_admin_manager
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
manager_id|tinyint(3) unsigned||NO|PRI||auto_increment|select,insert,update,references|uid
manager_name|varchar(30)|utf8_general_ci|NO||||select,insert,update,references|用户名
manager_pwd|varchar(42)|utf8_general_ci|NO||||select,insert,update,references|密码
manager_email|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|email
role_id|smallint(5)||NO||||select,insert,update,references|管理员角色
login_ip|varchar(18)|utf8_general_ci|NO||||select,insert,update,references|登录ip
login_os|varchar(30)|utf8_general_ci|NO||||select,insert,update,references|操作系统
login_time|int(13)||NO||||select,insert,update,references|登录时间
login_count|int(6)||NO||||select,insert,update,references|登录次数
status|int(1)||NO||||select,insert,update,references|状态
access|char(50)|utf8_general_ci|NO||||select,insert,update,references|管理的站点(1,2)逗号分割
##gong_admin_menu
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
menu_id|int(2)||NO|PRI||auto_increment|select,insert,update,references|id
menu_name|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|栏目名
menu_method|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|
isshow|int(1)||NO||0||select,insert,update,references|
father_id|int(3)||NO||||select,insert,update,references|父id
sort|smallint(3)||NO||0||select,insert,update,references|排序
description|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
##gong_admin_menu11
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
menu_id|int(2)||NO|PRI||auto_increment|select,insert,update,references|id
menu_name|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|栏目名
menu_method|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|
isshow|int(1)||NO||0||select,insert,update,references|
father_id|int(3)||NO||||select,insert,update,references|父id
sort|smallint(3)||NO||0||select,insert,update,references|排序
description|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
##gong_admin_role
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
role_id|tinyint(3) unsigned||NO|PRI||auto_increment|select,insert,update,references|id
role_name|varchar(50)|utf8_general_ci|NO||||select,insert,update,references|角色名称
description|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|角色描述
enable|tinyint(1)||NO||||select,insert,update,references|是否显示
##gong_admin_role_access
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
role_id|int(20)||NO||||select,insert,update,references|
menu_id|int(20)||NO||||select,insert,update,references|
##gong_article
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
aid|int(7)||NO|PRI||auto_increment|select,insert,update,references|
title|varchar(55)|utf8_general_ci|NO|MUL|||select,insert,update,references|
short_title|varchar(55)|utf8_general_ci|YES||||select,insert,update,references|简略标题
keywords|varchar(55)|utf8_general_ci|YES||||select,insert,update,references|关键字
weight|int(6)||NO||0||select,insert,update,references|权重
comment_open|int(2)||NO||||select,insert,update,references|(1-允许评论,0-不允许评论)
titlecolor|varchar(55)|utf8_general_ci|NO||||select,insert,update,references|
author|varchar(55)|utf8_general_ci|NO||||select,insert,update,references|
tags|varchar(100)|utf8_general_ci|NO||||select,insert,update,references|
description|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
from|varchar(55)|utf8_general_ci|NO||||select,insert,update,references|
create_time|int(15)||NO||||select,insert,update,references|创建日期
update_time|int(15)||NO||||select,insert,update,references|发布日期
pic|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
attributes|set('a','b','c','d','e','f','g','h','i')|utf8_general_ci|NO||||select,insert,update,references|
content|longtext|utf8_general_ci|NO||||select,insert,update,references|
hits|int(11)||NO||||select,insert,update,references|
column_id|int(3)||NO||||select,insert,update,references|
ischeck|int(2)||NO||0||select,insert,update,references|
site_id|int(5)||NO||||select,insert,update,references|
article_img|varchar(200)|utf8_general_ci|YES||||select,insert,update,references|图片
##gong_column
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
column_id|mediumint(5) unsigned||NO|PRI||auto_increment|select,insert,update,references|
column_name|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|
keywords|char(40)|utf8_general_ci|NO||||select,insert,update,references|
description|text|utf8_general_ci|NO||||select,insert,update,references|
is_showdesc|int(2)||NO||0||select,insert,update,references|
html_file|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|
ismenu|tinyint(1) unsigned||NO||1||select,insert,update,references|
islink|tinyint(1) unsigned||NO||0||select,insert,update,references|
url|char(255)|utf8_general_ci|NO||||select,insert,update,references|
sort|mediumint(5) unsigned||NO||||select,insert,update,references|
irank|mediumint(5)||NO||||select,insert,update,references|
father_id|mediumint(5) unsigned||NO||||select,insert,update,references|
isshow|int(2)||NO||0||select,insert,update,references|
site_id|int(2)||NO||||select,insert,update,references|所属站点(webconfig)
lm_title|varchar(300)|utf8_general_ci|YES||||select,insert,update,references|栏目标题
##gong_data
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
id|int(8) unsigned||NO|PRI||auto_increment|select,insert,update,references|
data|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
##gong_form
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
id|smallint(4) unsigned||NO|PRI||auto_increment|select,insert,update,references|
username|varchar(60)|utf8_general_ci|NO||||select,insert,update,references|
title|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
content|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
create_time|int(11) unsigned||NO||||select,insert,update,references|
##gong_friend
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
uid|int(10)||NO||||select,insert,update,references|
fid|int(10)||NO||||select,insert,update,references|
##gong_member
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
uid|int(10) unsigned||NO|PRI||auto_increment|select,insert,update,references|
username|varchar(30)|utf8_general_ci|NO|UNI|||select,insert,update,references|
password|char(32)|utf8_general_ci|NO||||select,insert,update,references|
email|varchar(32)|utf8_general_ci|YES||||select,insert,update,references|
nickname|varchar(30)|utf8_general_ci|NO||||select,insert,update,references|
sex|varchar(2)|utf8_general_ci|NO||||select,insert,update,references|
reg_time|int(13)||NO||||select,insert,update,references|
last_login_time|int(13)||NO||||select,insert,update,references|
ifadmin|int(2)||NO||||select,insert,update,references|
salt|int(4)||NO||||select,insert,update,references|
reg_ip|varchar(15)|utf8_general_ci|NO||||select,insert,update,references|
last_login_ip|varchar(15)|utf8_general_ci|NO||||select,insert,update,references|
##gong_pic
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
pid|int(10)||NO|PRI||auto_increment|select,insert,update,references|
pic_name|text|utf8_general_ci|NO||||select,insert,update,references|
pic_url|varchar(100)|utf8_general_ci|YES||||select,insert,update,references|
content|longtext|utf8_general_ci|YES||||select,insert,update,references|
uid|int(10)||NO||||select,insert,update,references|
upload_time|datetime||NO||||select,insert,update,references|
isshow|int(1)||NO||1||select,insert,update,references|
##gong_poetry_dynasty
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
d_dynasty|varchar(50)|utf8_general_ci|NO|PRI|||select,insert,update,references|
d_intro|longtext|utf8_general_ci|YES||||select,insert,update,references|
d_intro2|longtext|utf8_general_ci|YES||||select,insert,update,references|
d_num|int(11)||YES||||select,insert,update,references|
##gong_push
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
id|int(9)||NO|PRI||auto_increment|select,insert,update,references|
sendno|int(64)||NO||1||select,insert,update,references|
n_title|varchar(120)|utf8_general_ci|YES||||select,insert,update,references|
n_content|char(120)|utf8_general_ci|NO||||select,insert,update,references|
errcode|char(64)|utf8_general_ci|NO||||select,insert,update,references|
errmsg|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
total_user|int(20)||NO||||select,insert,update,references|
send_cnt|int(25)||NO||||select,insert,update,references|
created|datetime||NO||||select,insert,update,references|
##gong_site
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
site_id|int(11)||NO|PRI||auto_increment|select,insert,update,references|id
site_name|varchar(100)|utf8_general_ci|NO|MUL|||select,insert,update,references|站点名称
site_title|varchar(100)|utf8_general_ci|NO||||select,insert,update,references|站点副标题
template|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|
domain|varchar(35)|utf8_general_ci|NO|MUL|||select,insert,update,references|网站域名
keywords|varchar(200)|utf8_general_ci|NO||||select,insert,update,references|关键词
description|varchar(200)|utf8_general_ci|NO||||select,insert,update,references|网站描述
sort|int(1)||NO||0||select,insert,update,references|
favicon|varchar(200)|utf8_general_ci|NO||||select,insert,update,references|网站图标
url_model|int(1)||NO||||select,insert,update,references|url模式
url_suffix|varchar(10)|utf8_general_ci|NO||||select,insert,update,references|URL 后缀
isshow|int(1)||NO||||select,insert,update,references|是否开启网站
close_notice|text|utf8_general_ci|NO||||select,insert,update,references|
openreg|int(1)||NO||||select,insert,update,references|是否开启注册
logo|varchar(200)|utf8_general_ci|NO||||select,insert,update,references|logo地址
watermark|char(50)|utf8_general_ci|YES||||select,insert,update,references|水印图片
gzip|smallint(1)||NO||0||select,insert,update,references|gzip
flash_model|int(1)||NO||0||select,insert,update,references|
save_uselog|int(1)||NO||0||select,insert,update,references|是否保存登录日志
save_errorlog|int(1)||NO||0||select,insert,update,references|保存错误日志 	
max_error|int(3)||NO||5||select,insert,update,references|错误日志预警大小
social_login|int(1)||NO||0||select,insert,update,references|后台最大登陆失败次数
appid|varchar(50)|utf8_general_ci|NO||||select,insert,update,references|appid
appkey|varchar(50)|utf8_general_ci|NO||||select,insert,update,references|appkey
mail_server|varchar(30)|utf8_general_ci|NO||||select,insert,update,references|邮件服务器
mail_port|int(6)||NO||||select,insert,update,references|邮件端口
mail_from|varchar(40)|utf8_general_ci|NO||||select,insert,update,references|发件人地址
mail_user|varchar(40)|utf8_general_ci|NO||||select,insert,update,references|邮件用户名
mail_password|varchar(40)|utf8_general_ci|NO||||select,insert,update,references|邮件密码
uc_key|int(2)||YES||||select,insert,update,references|uc_key
uc_password|varchar(40)|utf8_general_ci|YES||||select,insert,update,references|uc_密码
uc_api|varchar(100)|utf8_general_ci|YES||||select,insert,update,references|uc_api
is_html|smallint(1)||NO||1||select,insert,update,references|是否静态化
point_to|int(10)||NO||100||select,insert,update,references|积分兑换比例
icp|varchar(50)|utf8_general_ci|YES||||select,insert,update,references|icp证
wenww|varchar(50)|utf8_general_ci|YES||||select,insert,update,references|文网文
beian|varchar(50)|utf8_general_ci|YES||||select,insert,update,references|备案号
statistic_code|varchar(255)|utf8_general_ci|YES||||select,insert,update,references|统计代码
is_sdk|smallint(2)||NO||||select,insert,update,references|开启sdk(1-开启 0-关闭)
fujian_ip|char(60)|utf8_general_ci|YES||||select,insert,update,references|服务附件地址
server_open|int(2)||NO||||select,insert,update,references|附件服务器(1-开启,0-关闭)
server_ip|char(50)|utf8_general_ci|YES||||select,insert,update,references|附件服务器ip
server_port|char(50)|utf8_general_ci|YES||||select,insert,update,references|附件服务器端口
server_username|char(50)|utf8_general_ci|YES||||select,insert,update,references|附件服务器用户名
server_password|char(50)|utf8_general_ci|YES||||select,insert,update,references|服务附件密码
isduanxin|int(2)||NO||0||select,insert,update,references|短信平台是否开启(1-开启,0-关闭)
app_id|char(20)|utf8_general_ci|NO||||select,insert,update,references|短信平台(app_id)
app_secret|char(50)|utf8_general_ci|NO||||select,insert,update,references|短信平台(app_secret)
access_token|char(50)|utf8_general_ci|NO||||select,insert,update,references|短信平台(access_token)
dx_url|char(50)|utf8_general_ci|NO||||select,insert,update,references|短信平台返回页面
isweixin|int(2)||NO||0||select,insert,update,references|是否开启微信(1-开启,0-关闭)
token|char(30)|utf8_general_ci|NO||||select,insert,update,references|微信(token)
ucconfig|text|utf8_general_ci|NO||||select,insert,update,references|
is_score|int(2)||NO||0||select,insert,update,references|积分兑换(1-开启,0-关闭)
is_recharge|int(2)||NO||0||select,insert,update,references|平台充值币充值(1-开启,0-关闭)
is_watermark|int(2)||NO||0||select,insert,update,references|水印是否开启(1-开启,0-关闭)
dx_id|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|短信模板ID
is_fsdxms|int(2)||NO||0||select,insert,update,references|短信模式(0-免费,1-收费)
popularize_name|int(6)||NO||0||select,insert,update,references|默认推广帐号
##gong_web_not_allow_ip
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
id|int(5)||NO|PRI||auto_increment|select,insert,update,references|
ip|varchar(18)|utf8_general_ci|NO||||select,insert,update,references|
##satq_commentmeta
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
meta_id|bigint(20) unsigned||NO|PRI||auto_increment|select,insert,update,references|
comment_id|bigint(20) unsigned||NO|MUL|0||select,insert,update,references|
meta_key|varchar(255)|utf8_general_ci|YES|MUL|||select,insert,update,references|
meta_value|longtext|utf8_general_ci|YES||||select,insert,update,references|
##satq_comments
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
comment_ID|bigint(20) unsigned||NO|PRI||auto_increment|select,insert,update,references|
comment_post_ID|bigint(20) unsigned||NO|MUL|0||select,insert,update,references|
comment_author|tinytext|utf8_general_ci|NO||||select,insert,update,references|
comment_author_email|varchar(100)|utf8_general_ci|NO|MUL|||select,insert,update,references|
comment_author_url|varchar(200)|utf8_general_ci|NO||||select,insert,update,references|
comment_author_IP|varchar(100)|utf8_general_ci|NO||||select,insert,update,references|
comment_date|datetime||NO||0000-00-00 00:00:00||select,insert,update,references|
comment_date_gmt|datetime||NO|MUL|0000-00-00 00:00:00||select,insert,update,references|
comment_content|text|utf8_general_ci|NO||||select,insert,update,references|
comment_karma|int(11)||NO||0||select,insert,update,references|
comment_approved|varchar(20)|utf8_general_ci|NO|MUL|1||select,insert,update,references|
comment_agent|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
comment_type|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|
comment_parent|bigint(20) unsigned||NO|MUL|0||select,insert,update,references|
user_id|bigint(20) unsigned||NO||0||select,insert,update,references|
##satq_links
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
link_id|bigint(20) unsigned||NO|PRI||auto_increment|select,insert,update,references|
link_url|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
link_name|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
link_image|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
link_target|varchar(25)|utf8_general_ci|NO||||select,insert,update,references|
link_description|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
link_visible|varchar(20)|utf8_general_ci|NO|MUL|Y||select,insert,update,references|
link_owner|bigint(20) unsigned||NO||1||select,insert,update,references|
link_rating|int(11)||NO||0||select,insert,update,references|
link_updated|datetime||NO||0000-00-00 00:00:00||select,insert,update,references|
link_rel|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
link_notes|mediumtext|utf8_general_ci|NO||||select,insert,update,references|
link_rss|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
##satq_options
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
option_id|bigint(20) unsigned||NO|PRI||auto_increment|select,insert,update,references|
option_name|varchar(64)|utf8_general_ci|NO|UNI|||select,insert,update,references|
option_value|longtext|utf8_general_ci|NO||||select,insert,update,references|
autoload|varchar(20)|utf8_general_ci|NO||yes||select,insert,update,references|
##satq_postmeta
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
meta_id|bigint(20) unsigned||NO|PRI||auto_increment|select,insert,update,references|
post_id|bigint(20) unsigned||NO|MUL|0||select,insert,update,references|
meta_key|varchar(255)|utf8_general_ci|YES|MUL|||select,insert,update,references|
meta_value|longtext|utf8_general_ci|YES||||select,insert,update,references|
##satq_posts
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
ID|bigint(20) unsigned||NO|PRI||auto_increment|select,insert,update,references|
post_author|bigint(20) unsigned||NO|MUL|0||select,insert,update,references|
post_date|datetime||NO||0000-00-00 00:00:00||select,insert,update,references|
post_date_gmt|datetime||NO||0000-00-00 00:00:00||select,insert,update,references|
post_content|longtext|utf8_general_ci|NO||||select,insert,update,references|
post_title|text|utf8_general_ci|NO||||select,insert,update,references|
post_excerpt|text|utf8_general_ci|NO||||select,insert,update,references|
post_status|varchar(20)|utf8_general_ci|NO||publish||select,insert,update,references|
comment_status|varchar(20)|utf8_general_ci|NO||open||select,insert,update,references|
ping_status|varchar(20)|utf8_general_ci|NO||open||select,insert,update,references|
post_password|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|
post_name|varchar(200)|utf8_general_ci|NO|MUL|||select,insert,update,references|
to_ping|text|utf8_general_ci|NO||||select,insert,update,references|
pinged|text|utf8_general_ci|NO||||select,insert,update,references|
post_modified|datetime||NO||0000-00-00 00:00:00||select,insert,update,references|
post_modified_gmt|datetime||NO||0000-00-00 00:00:00||select,insert,update,references|
post_content_filtered|longtext|utf8_general_ci|NO||||select,insert,update,references|
post_parent|bigint(20) unsigned||NO|MUL|0||select,insert,update,references|
guid|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
menu_order|int(11)||NO||0||select,insert,update,references|
post_type|varchar(20)|utf8_general_ci|NO|MUL|post||select,insert,update,references|
post_mime_type|varchar(100)|utf8_general_ci|NO||||select,insert,update,references|
comment_count|bigint(20)||NO||0||select,insert,update,references|
##satq_term_relationships
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
object_id|bigint(20) unsigned||NO|PRI|0||select,insert,update,references|
term_taxonomy_id|bigint(20) unsigned||NO|PRI|0||select,insert,update,references|
term_order|int(11)||NO||0||select,insert,update,references|
##satq_term_taxonomy
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
term_taxonomy_id|bigint(20) unsigned||NO|PRI||auto_increment|select,insert,update,references|
term_id|bigint(20) unsigned||NO|MUL|0||select,insert,update,references|
taxonomy|varchar(32)|utf8_general_ci|NO|MUL|||select,insert,update,references|
description|longtext|utf8_general_ci|NO||||select,insert,update,references|
parent|bigint(20) unsigned||NO||0||select,insert,update,references|
count|bigint(20)||NO||0||select,insert,update,references|
##satq_terms
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
term_id|bigint(20) unsigned||NO|PRI||auto_increment|select,insert,update,references|
name|varchar(200)|utf8_general_ci|NO|MUL|||select,insert,update,references|
slug|varchar(200)|utf8_general_ci|NO|MUL|||select,insert,update,references|
term_group|bigint(10)||NO||0||select,insert,update,references|
##satq_usermeta
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
umeta_id|bigint(20) unsigned||NO|PRI||auto_increment|select,insert,update,references|
user_id|bigint(20) unsigned||NO|MUL|0||select,insert,update,references|
meta_key|varchar(255)|utf8_general_ci|YES|MUL|||select,insert,update,references|
meta_value|longtext|utf8_general_ci|YES||||select,insert,update,references|
##satq_users
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
ID|bigint(20) unsigned||NO|PRI||auto_increment|select,insert,update,references|
user_login|varchar(60)|utf8_general_ci|NO|MUL|||select,insert,update,references|
user_pass|varchar(64)|utf8_general_ci|NO||||select,insert,update,references|
user_nicename|varchar(50)|utf8_general_ci|NO|MUL|||select,insert,update,references|
user_email|varchar(100)|utf8_general_ci|NO||||select,insert,update,references|
user_url|varchar(100)|utf8_general_ci|NO||||select,insert,update,references|
user_registered|datetime||NO||0000-00-00 00:00:00||select,insert,update,references|
user_activation_key|varchar(60)|utf8_general_ci|NO||||select,insert,update,references|
user_status|int(11)||NO||0||select,insert,update,references|
display_name|varchar(250)|utf8_general_ci|NO||||select,insert,update,references|
##think_access
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
role_id|smallint(6) unsigned||NO|MUL|||select,insert,update,references|
node_id|smallint(6) unsigned||NO|MUL|||select,insert,update,references|
level|tinyint(1)||NO||||select,insert,update,references|
pid|smallint(6)||NO||||select,insert,update,references|
module|varchar(50)|utf8_general_ci|YES||||select,insert,update,references|
##think_form
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
id|smallint(4) unsigned||NO|PRI||auto_increment|select,insert,update,references|
title|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
content|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
create_time|int(11) unsigned||NO||||select,insert,update,references|
status|tinyint(1) unsigned||NO||||select,insert,update,references|
##think_group
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
id|smallint(3) unsigned||NO|PRI||auto_increment|select,insert,update,references|
name|varchar(25)|utf8_general_ci|NO||||select,insert,update,references|
title|varchar(50)|utf8_general_ci|NO||||select,insert,update,references|
create_time|int(11) unsigned||NO||||select,insert,update,references|
update_time|int(11) unsigned||NO||0||select,insert,update,references|
status|tinyint(1) unsigned||NO||0||select,insert,update,references|
sort|smallint(3) unsigned||NO||0||select,insert,update,references|
show|tinyint(1) unsigned||NO||0||select,insert,update,references|
##think_node
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
id|smallint(6) unsigned||NO|PRI||auto_increment|select,insert,update,references|
name|varchar(20)|utf8_general_ci|NO|MUL|||select,insert,update,references|
title|varchar(50)|utf8_general_ci|YES||||select,insert,update,references|
status|tinyint(1)||YES|MUL|0||select,insert,update,references|
remark|varchar(255)|utf8_general_ci|YES||||select,insert,update,references|
sort|smallint(6) unsigned||YES||||select,insert,update,references|
pid|smallint(6) unsigned||NO|MUL|||select,insert,update,references|
level|tinyint(1) unsigned||NO|MUL|||select,insert,update,references|
type|tinyint(1)||NO||0||select,insert,update,references|
group_id|tinyint(3) unsigned||YES||0||select,insert,update,references|
##think_role
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
id|smallint(6) unsigned||NO|PRI||auto_increment|select,insert,update,references|
name|varchar(20)|utf8_general_ci|NO||||select,insert,update,references|
pid|smallint(6)||YES|MUL|||select,insert,update,references|
status|tinyint(1) unsigned||YES|MUL|||select,insert,update,references|
remark|varchar(255)|utf8_general_ci|YES||||select,insert,update,references|
ename|varchar(5)|utf8_general_ci|YES|MUL|||select,insert,update,references|
create_time|int(11) unsigned||NO||||select,insert,update,references|
update_time|int(11) unsigned||NO||||select,insert,update,references|
##think_role_user
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
role_id|mediumint(9) unsigned||YES|MUL|||select,insert,update,references|
user_id|char(32)|utf8_general_ci|YES|MUL|||select,insert,update,references|
##think_user
field|type|collation|null|key|default|extra|privileges|comment
---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---
id|smallint(5) unsigned||NO|PRI||auto_increment|select,insert,update,references|
account|varchar(64)|utf8_general_ci|NO|UNI|||select,insert,update,references|
nickname|varchar(50)|utf8_general_ci|NO||||select,insert,update,references|
password|char(32)|utf8_general_ci|NO||||select,insert,update,references|
bind_account|varchar(50)|utf8_general_ci|NO||||select,insert,update,references|
last_login_time|int(11) unsigned||YES||0||select,insert,update,references|
last_login_ip|varchar(40)|utf8_general_ci|YES||||select,insert,update,references|
login_count|mediumint(8) unsigned||YES||0||select,insert,update,references|
verify|varchar(32)|utf8_general_ci|YES||||select,insert,update,references|
email|varchar(50)|utf8_general_ci|NO||||select,insert,update,references|
remark|varchar(255)|utf8_general_ci|NO||||select,insert,update,references|
create_time|int(11) unsigned||NO||||select,insert,update,references|
update_time|int(11) unsigned||NO||||select,insert,update,references|
status|tinyint(1)||YES||0||select,insert,update,references|
type_id|tinyint(2) unsigned||YES||0||select,insert,update,references|
info|text|utf8_general_ci|NO||||select,insert,update,references|
