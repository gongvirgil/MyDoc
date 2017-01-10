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

