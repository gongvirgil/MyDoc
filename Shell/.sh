#!/bin/bash



source ./init.sh

echo $(test)
echo $(upper $(test))
echo `str_length $(upper $(test))`
echo $(echo_color_str $(upper $(test)) RED)

echo $(substr 123456 0 3)$(echo_color_str $(upper $(test)) RED)
echo $(substr aaabbbcccdefg -1 10)
echo $(now)
echo $(unixtime)

user='root'
pwd='C1oudP8x&2017'
path='/home/cxl/MyDoc/Shell/DB/'

#mysql_backup $user $pwd $path

echo $(now) >> ${path}a.txt
#>写入，覆盖掉原有的；
#>>继续添加，原来的还存在。

#生成数据库MD文档
create_db_doc $user $pwd $path

