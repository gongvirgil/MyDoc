#!/bin/bash
# start,stop,step
incmoingtime=1465992839
disconnecttime=1465992855
last=0
for (( id=$1; id<$2 ; id++ )); do
        let "incmoingtime += 4"
        let "disconnecttime += 4"
        rest=$(($id%$3))
        if [ $id -eq 1 ] || [ $rest -eq 0 ]; then
                mysql -uroot -p123456 pbx_00000003 <$last.sql
                last=$id
                echo "new"
                cp a.txt $id.sql
                echo " (${id},'0','902557926526','NULL','NULL','02557926526conf0_1465992839650','9','1','${incmoingtime}','0','${disconnecttime}','0','0','0','-1','NULL','0','NULL','NULL','0','0','0','0','0','0','1465993800','0')" >>$last.sql
        else
                echo " ,(${id},'0','902557926526','NULL','NULL','02557926526conf0_1465992839650','9','1','${incmoingtime}','0','${disconnecttime}','0','0','0','-1','NULL','0','NULL','NULL','0','0','0','0','0','0','1465993800','0')" >>$last.sql
        fi
done
echo "fin loop"
mysql -uroot -p123456 pbx_00000003 <$last.sql