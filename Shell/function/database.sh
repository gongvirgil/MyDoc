#mysql_backup(user,pwd,path,database)
function mysql_backup(){
	if [[ "$4" == "" ]]; then
		dbs=(`mysql -u"$1" -p"$2" -N -e "show databases" | grep -v mysql | grep -v information_schema | grep -v performance_schema`)
		for dbname in "${dbs[@]}"; do 
			echo $dbname
			echo $(mysql_backup $1 $2 $3 $dbname)
		done
	else
		echo "mysqldump -u\"$1\" -p\"$2\" $4 > $3$4.sql --- start"
		mysqldump -u"$1" -p"$2" $4 > $3$4.sql
		echo "mysqldump -u\"$1\" -p\"$2\" $4 > $3$4.sql --- end"
	fi
}
#query(user,pwd,sql)
function query(){
	echo `mysql -u"$1" -p"$2" -N -e "$3"`
}
