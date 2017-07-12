#upper(string)
function upper(){
	echo $1 | tr '[a-z]' '[A-Z]'
}
#lower(string)
function lower(){
	echo $1 | tr '[A-Z]' '[a-z]'
}

#str_length(string)
function str_length(){
	str=$1
	echo ${#str}
}

#substr(string,start,length)
function substr(){
	str=$1
	echo ${str:$2:$3}
}

#echo_color_str
#string
#color
function echo_color_str(){
	if [[ "$2" == "" ]]; then
		echo $1
	else
		echo -e "`eval echo '$'\"$(upper $2)\"`$1${RES}"
	fi
}

##如果你想操作这些字符串的话，那么可以有以下方法
##shell中截取字符串的方法有很多中，
#${expression}一共有9种使用方法。
#${parameter:-word}
#${parameter:=word}
#${parameter:?word}
#${parameter:+word} 
##上面4种可以用来进行缺省值的替换。
#
#${#parameter}
## 上面这种可以获得字符串的长度。 
#
#${parameter%word} 最小限度从后面截取word
#${parameter%%word} 最大限度从后面截取word
#${parameter#word} 最小限度从前面截取word
#${parameter##word} 最大限度从前面截取word
