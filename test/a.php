<?php

$R = new \Lib\Virgil\Random();
echo $R->color();
exit();
/*
class netstat {
    public $PortsInUse = 0;
    public $AvailablePorts = 0;
    public $TotalPorts = 0;
    public $Ports = array();
    //this is which port you want to monitor.
    public $find_port = '80';
    public $count = 0;
    public function __construct() {
        // $p = popen('netsh int ipv4 show dynamicport tcp', 'r');
        // $this->TotalPorts = rtrim(trim(explode("Number of Ports : ", stream_get_contents($p))[1]));
        // pclose($p);
        //Windows 服务器与Linux 服务器命令稍微不同
        //for Windows Server run
        // $netstat = popen('netstat -no', 'r');
        //for Linux Server
        $netstat = popen('netstat -ntu', 'r');
        $log = stream_get_contents($netstat);
        pclose($netstat);
        $this->Ports = array_slice(explode("\n", $log) , 4);
        array_pop($this->Ports);
        foreach ($this->Ports as & $port) {
            $port = explode(" ", $port);
            foreach ($port as $k => $p) {
                if ($p == '') unset($port[$k]);
            }
            // $port = array_values($port);
            // $port = (object)array(
            //     "LocalAddress" => $port[0],
            //     "ForeignAddress" => $port[1],
            //     "Status" => $port[2],
            //     "ProcessId" => $port[3]
            // );
            $j = 0;
            $bz = 0;
            $port_array = array();
            //打印每个端口
            var_dump($port);
            //this is for windows server
            // foreach ($port as $key =>$value){
            //         #when count how many port, then only calculate once if local port or remote port when in one line.
            //         if ($j==1){
            //                 $port_array['LocalAddress'] = $value;
            //                 if (stristr($value,$this->find_port)&& $bz==0){
            //                    $this->count++;
            //                    $bz=1;
            //   }
            //         }
            //         else if ($j==2){
            //                 $port_array['ForeignAddress'] = $value;
            //                 if (stristr($value,$this->find_port)&& $bz==0){
            //                           $this->count++;
            //                           $bz =1;
            //                 }
            //         }
            //         else if ($j==3){
            //                 $port_array['Status'] =$value;
            //         }
            //         else if($j==4){
            //                 $port_array['ProcessId'] =$value;
            //         }
            //         $j++;
            // }
            //this is for Linux server, var_dump($port) 后，根据数组，可能需要改变$j 坐标
            foreach ($port as $key => $value) {
                //when count how many port, then only calculate once if local port or remote port when in one line.
                if ($j == 3) {
                    $port_array['LocalAddress'] = $value;
                    if (stristr($value, $this->find_port) && $bz == 0) {
                        $this->count++;
                        $bz = 1;
                    }
                } else if ($j == 4) {
                    $port_array['ForeignAddress'] = $value;
                    if (stristr($value, $this->find_port) && $bz == 0) {
                        $this->count++;
                        $bz = 1;
                    }
                } else if ($j == 5) {
                    $port_array['Status'] = $value;
                }
                $j++;
            }
            //只打印，本地ip, 远程访问ip，状态
            var_dump($port_array);
            $port_array = array();
            $bz = 0;
        }
        $this->PortsInUse = count($this->Ports);
        $this->AvailablePorts = $this->TotalPorts - count($this->Ports);
    }
}
$netstat = new netstat();
echo "there are $netstat->count connectings in server $netstat->find_port port<br> ";
exit();
*/

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    /*
    for ($i=1000; $i < 9999; $i++) { 
        $redis->lpush("list", $i);
    }
    */
    $un = $redis->lpop("list");
    file_put_contents("/var/www/mydoc/a.txt", $un."\r\n", FILE_APPEND | LOCK_EX);
    exit();
   //连接本地的 Redis 服务
   $redis = new Redis();
   $redis->connect('127.0.0.1', 6379);
   echo "Connection to server sucessfully";
   //存储数据到列表中
   $redis->lpush("tutorial-list", "Redis");
   $redis->lpush("tutorial-list", "Mongodb");
   $redis->lpush("tutorial-list", "Mysql");
   // 获取存储的数据并输出
   $arList = $redis->lrange("tutorial-list", 0 ,5);
   echo "Stored string in redis";
   print_r($arList);



    exit();
    $id = getmypid();
    file_put_contents("/var/www/mydoc/a.txt", $id."\r\n",FILE_APPEND | LOCK_EX);
    exit();