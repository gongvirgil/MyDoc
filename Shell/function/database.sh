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
#create_db_doc(user,pwd,dir,title)
function create_db_doc(){
	user=$1
	pwd=$2
	path=$3
	if [ -e $path ]; then
		rm -rf $path*
		echo $path*
	else
		mkdir $path
	fi
	cp ../extend/mdwiki/index.html $path
	file_config="$path"config.json
	file_navigation="$path"navigation.md
	file_index="$path"index.md
	if [[ "$4" == "" ]]; then
		title="Doc of DB"
	else
		title=$4
	fi
	touch $file_config
	touch $file_navigation
	touch $file_index
	echo '{"useSideMenu": true, "lineBreaks": "gfm", "additionalFooterText": "", "anchorCharacter": "&#x2693;", "title": "'$title'"}' > $file_config
	echo "#" $title > $file_navigation
	echo "#" $title > $file_index
	echo "[DB]()" >> $file_navigation
	echo "" >> $file_navigation
	echo "" >> $file_index
	dbs=(`mysql -u"$user" -p"$pwd" -N -e "show databases" | grep -v mysql | grep -v information_schema | grep -v performance_schema`)
	for dbname in "${dbs[@]}"; do 
		#echo $dbname
		file_db="$path$dbname".md
		touch $file_db
		echo "* [$dbname]($dbname.md)" >> $file_navigation
		echo "##" $dbname >> $file_index
		echo "---" >> $file_index
		echo "#" $dbname > $file_db
		tables=(`mysql -u"$user" -p"$pwd" -N -e "show tables from $dbname"`)
		for tablename in "${tables[@]}"; do
			echo "* " $tablename >> $file_index
			echo "##" $tablename >> $file_db
			echo "---" >> $file_db
			echo "" >> $file_db
			echo "|Field|Type|Collation|Null|Key|Default|Extra|Privileges|Comment|" >> $file_db
			echo "|---|---|---|---|---|---|---|---|---|" >> $file_db
			results=(`mysql -u"$user" -p"$pwd" -N -e "use $dbname;select COLUMN_NAME, COLUMN_TYPE,if(COLLATION_NAME='','&nbsp;',COLLATION_NAME),IS_NULLABLE,if(COLUMN_KEY='','&nbsp;',COLUMN_KEY),if(COLUMN_DEFAULT='','&nbsp;',COLUMN_DEFAULT),if(EXTRA='','&nbsp;',EXTRA),PRIVILEGES,if(COLUMN_COMMENT='','&nbsp;',COLUMN_COMMENT) from information_schema.COLUMNS where table_name ='$tablename'" | sed 's/ /\&nbsp;/g' | awk '{print "|"$1"|"$2"|"$3"|"$4"|"$5"|"$6"|"$7"|"$8"|"$9"|"}'`)
			for line in "${results[@]}"; do
				echo $line >> $file_db
			done
			echo "" >> $file_db
		done
		echo "" >> $file_index
	done
}
