#!/bin/bash

#Color
RED='\E[1;31m' #红
GREEN='\E[1;32m' #绿
YELOW='\E[1;33m' #黄
BLUE='\E[1;34m' #蓝
PINK='\E[1;35m' #粉
RES='\E[0m'

#Time
today=`date +%Y-%m-%d`
lastweek=`date -d last-week +%Y-%m-%d`
lastmonth=`date -d last-month +%Y-%m-%d`
timestamp=`date -d $today +%s`
lastweekTimestamp=`date -d $lastweek +%s`
lastmonthTimestamp=`date -d $lastmonth +%s`

function checkUser(){
	if [ $(whoami) != "www-data" ]
	then
	     echo "do patch fail,no permission to su www-data"
	     exit 1
	fi
}

function getStatusStr(){
    if [ "$status" == "" ]
    then
       status=$?
    fi
    if [ $status -gt 0 ] 
    then 
        echo -e "${RED}NOTOK${RES}"
    else
        echo -e "${GREEN}OK${RES}"
    fi
    return 0
}

function copyFile(){
   cp $1 $2
   status=$?
   echo "** cp $1 $2 ------- [$(getStatusStr $status)] **"
}

# 运算
a=1
b=2
c=`expr $a + $b` #加
c=`expr $a - $b` #减
c=`expr $a \* $b` #乘
c=`expr $a / $b` #除
c=`expr $a % $b` #取余
c=[ $a == $b ] #等于 true/false
c=[ $a != $b ] #不等于 true/false
c=[ $a -eq $b ] #等于 true/false
c=[ $a -ne $b ] #不等于 true/false
c=[ $a -gt $b ] #大于 true/false
c=[ $a -lt $b ] #小于 true/false
c=[ $a -ge $b ] #大于等于 true/false
c=[ $a -le $b ] #小于等于 true/false
c=[ ! false ] #非
c=[ true -o false ] #或
c=[ true -a false ] #与
c=[[ true && false ]] #AND
c=[[ true || false ]] #OR
c=[ -z $a ] # is_len0_str
c=[ -n $a ] # not_len0_str
c=[ $a ] # not_empty_str
let "a += 1" #自增
let "a -= 1" #自减
