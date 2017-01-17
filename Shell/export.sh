#!/bin/bash

user = $1
pwd = $2
db = $3
sql = $4
file = $5

mysql -A -uroot -p123456 -e "" | sed 's/\\t/\",\"/g;s/^/\"/;s/$/\"/;s/\\n//g' > 


		$cmdLine = sprintf("mysql -A -u %s -p%s -e \"use %s;set names utf8;%s;\"|sed 's/\\t/\",\"/g;s/^/\"/;s/$/\"/;s/\\n//g' > %s",$dbUser,$dbPwd,$dbName,$sql,$file);
		ExLog::log("执行导出sql到指定文件命令:".$cmdLine,log::INFO);