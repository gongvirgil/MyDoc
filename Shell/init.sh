#Color
RED='\E[1;31m' #红
GREEN='\E[1;32m' #绿
YELOW='\E[1;33m' #黄
BLUE='\E[1;34m' #蓝
PINK='\E[1;35m' #粉
RES='\E[0m'

function import(){
	if [[ $# -gt 1 ]]; then
		cd $1
		source $2
	else
		source $1
	fi
}

import function common.sh