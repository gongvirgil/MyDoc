#!/bin/bash

RED='\E[1;31m' #红
GREEN='\E[1;32m' #绿
YELOW='\E[1;33m' #黄
BLUE='\E[1;34m' #蓝
PINK='\E[1;35m' #粉
RES='\E[0m'

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

path=$1
today=`date +%Y-%m-%d`
lastweek=`date -d last-week +%Y-%m-%d`
lastmonth=`date -d last-month +%Y-%m-%d`
lastweekTimestamp=`date -d $lastweek +%s`
lastmonthTimestamp=`date -d $lastmonth +%s`

for element in `ls -l $path | grep ^d | awk '{print $9}'`
do
	dirTimestamp=`date -d $element +%s`
	if [ "$dirTimestamp" != "" ] && [ $dirTimestamp \< $lastweekTimestamp ]
	then
	    rm -rf $path$element
	    status=$?
	    echo "delete $element [$(getStatusStr $status)]"
	fi
done