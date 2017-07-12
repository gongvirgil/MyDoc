#now()
function now(){
	echo `date +%Y-%m-%d" "%H:%M:%S`
}
#date_format()
function date_format(){
	echo 1
}
#unixtime()
function unixtime(){
	echo `date -d "$(now)" +%s`
}
