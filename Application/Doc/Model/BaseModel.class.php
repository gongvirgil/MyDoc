<?php
namespace Doc\Model;
use Think\Model;

class BaseModel extends Model {
    public function getPage(){
        $model = $this;//当前实例化

    }
    public function getpaged($where = '', $order = 'id') {
        //处理where 如果whre中有条件为空，则删除这个条件
        foreach ($where as $key => $vo) {
            if ($where[$key] === '') unset($where[$key]);
        }
        $User = $this; // 实例化User对象
        /* 条件组合 */
        $count = $User->where($where)->count(); // 查询满足要求的总记录数
        $Page = new ThinkPage($count, C('PAGE_LIST')); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->getpage = str_replace('<<', '<', str_replace('>>', '>', $show)); //赋值分页输出 ，在controller中可以使用D(表名)->getpage来获取
        $this->countpage = $count; //赋值统计页数,在controller中可以使用D(表名)->countpage
        //当前页初始记录
        $p = (int)I('get.p');
        if (!$p) $p = 1;
        //$this->assign('cp',($p-1)*(int)C('PAGE_LIST'));// 赋值虚拟页数（编号）
        $this->nowid = ($p - 1) * (int)C('PAGE_LIST'); //赋值虚拟页数（编号）,在controller中可以使用D(表名)->nowid
        return $User->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order($order . ' desc')->select();
    }
    function savelog($data = '') {
        //获取模块名+控制器名+方法名
        $mca = MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME;
        //发生时间
        $time = strtotime('now');
        //IP
        $ip = getIP();
        //操作
        $opera = M('auth_rule')->where('name="' . $mca . '"')->find();
        $data['userid'] = $_SESSION['uid'];
        $data['mca'] = $mca;
        $data['opera'] = $opera['title'];
        $data['time'] = $time;
        $data['ip'] = $ip;
        if ($data) $data['data'] = implode("|", $data); //如果有数据操作，则记录数据
        $this->addnewdata('log', $data);
    }
}

