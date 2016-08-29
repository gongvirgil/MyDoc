//unix时间戳
function time(){
	return Math.round(new Date().getTime()/1000);
}
//unix时间戳转为date日期
function date(format='Y-m-d H:i:s',timestamp=0)   { 
	var   now    = timestamp?(new Date(parseInt(timestamp)*1000)):(new Date());
	var   year   = now.getFullYear();
	var   month  = (now.getMonth()+1)<10?'0'+(now.getMonth()+1):(now.getMonth()+1);
	var   date   = now.getDate()<10?'0'+now.getDate():now.getDate();     
	var   hour   = now.getHours()<10?'0'+now.getHours():now.getHours();     
	var   minute = now.getMinutes()<10?'0'+now.getMinutes():now.getMinutes();     
	var   second = now.getSeconds()<10?'0'+now.getSeconds():now.getSeconds(); 
	var   dateformat = format.toLowerCase().replace(/y/g,year).replace(/m/g,month).replace(/d/g,date).replace(/h/g,hour).replace(/i/g,minute).replace(/s/g,second);
	return  dateformat;     
} 
