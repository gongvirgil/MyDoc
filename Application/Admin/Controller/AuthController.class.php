<?php
namespace Admin\Controller;
use Think\Controller;
class AuthController extends \Auth\Controller\AuthController {
    //Auth认证管理
    public function index() {
        $this->display(C('Template_path').'authIndex.html');
    }
    //修改用户组
    public function modifyAuthGroup() {
        $id     = I('id');
        $title  = I('title');
        $status = I('status');
        $rules  = I('rules');
        $data = array(
            'id'     => $id,
            'title'  => $title,
            'status' => $status,
            'rules'  => $rules,
        );
        $result = D('AuthGroup')->modifyAuthGroup($data);
        if($result===false) $this->fail('失败',U('Admin/Auth/index'));
        $this->success("成功",U('Admin/Auth/index'));
    }
    public function deleteAuthGroup(){

    }
    public function authGroupList(){
        $start     = I('start');
        $length    = I('length');
        $search    = I('search');
        $columns   = I('columns');
        $order     = I('order');

        $p = ceil($start/$length)+1;
        $row = $length;
        $searchStr = $search['value'];
        if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
        $param = array(
            'p'         => $p,
            'row'       => $row,
            'searchStr' => $searchStr,
            'orderBy'   => $orderBy,
            'fields'    => "*",
        );
        $data = D('AuthGroup')->authGroupList($param);
        $this->ajaxReturn($data,'JSON');
    }
    public function modifyAuthRule(){
        $id        = I('id');
        $name      = I('name');
        $title     = I('title');
        $type      = I('type');
        $status    = I('status');
        $condition = I('condition');
        $data = array(
            'id'        => $id,
            'name'      => $name,
            'title'     => $title,
            'type'      => $type,
            'status'    => $status,
            'condition' => $condition,
        );
        $result = D('AuthRule')->modifyAuthRule($data);
        if($result===false) $this->fail('失败',U('Admin/Auth/index'));
        $this->success("成功",U('Admin/Auth/index'));    
    }
    public function deleteAuthRule(){

    }
    public function authRuleList(){
        $start     = I('start');
        $length    = I('length');
        $search    = I('search');
        $columns   = I('columns');
        $order     = I('order');

        $p = ceil($start/$length)+1;
        $row = $length;
        $searchStr = $search['value'];
        if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
        $param = array(
            'p'         => $p,
            'row'       => $row,
            'searchStr' => $searchStr,
            'orderBy'   => $orderBy,
            'fields'    => "*",
        );
        $data = D('AuthRule')->authRuleList($param);
        $this->ajaxReturn($data,'JSON');
    }
    public function pageNodeList(){
        $start     = I('start');
        $length    = I('length');
        $search    = I('search');
        $columns   = I('columns');
        $order     = I('order');

        $p = ceil($start/$length)+1;
        $row = $length;
        $searchStr = $search['value'];
        if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
        $param = array(
            'p'         => $p,
            'row'       => $row,
            'searchStr' => $searchStr,
            'orderBy'   => $orderBy,
            'fields'    => "*",
        );
        $data = D('PageNode')->pageNodeList();
        $ret['recordsFiltered'] = count($data);
        $ret['recordsTotal']    = 1;
        $ret['data']            = $data;
        $this->ajaxReturn($ret,'JSON');
    }
    public function modifyPageNode(){
        $id       = I('id');
        $name     = I('name');
        $rulename = I('rulename');
        $level    = I('level');
        $pid      = I('pid');
        $status   = I('status');
        $url      = I('url');
        $data = array(
            'id'       => $id,
            'name'     => $name,
            'rulename' => $rulename,
            'level'    => $level,
            'pid'      => $pid,
            'status'   => $status,
            'url'      => $url,
        );
        $result = D('PageNode')->modifyPageNode($data);
        if($result===false) $this->fail('失败',U('Admin/Auth/index'));
        $this->success("成功",U('Admin/Auth/index'));    
    }
    //注册rule规则
    public function register() {
        $class_name = get_class();
        return register($class_name);
    }
}
