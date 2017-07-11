#Color
RED='\E[1;31m' #红
GREEN='\E[1;32m' #绿
YELOW='\E[1;33m' #黄
BLUE='\E[1;34m' #蓝
PINK='\E[1;35m' #粉
RES='\E[0m'

#test
function test(){
 echo 'test'
}

#echo_color_str
#string
#color
function echo_color_str(){
	if [[ "$2" == "" ]]; then
		echo $1
	else
		echo -e "`eval echo '$'\"$2\"`$1${RES}"
	fi
}
#upper
#string
function upper(){
	echo $1 | tr '[a-z]' '[A-Z]'
}
#lower
#string
function lower(){
	echo $1 | tr '[A-Z]' '[a-z]'
}