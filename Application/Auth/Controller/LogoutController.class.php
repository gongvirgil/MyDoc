<?php
namespace Auth\Controller;
use Think\Controller;

class LogoutController extends Controller {
    //注销
    public function index(){
    	unset($_SESSION[C('USER_AUTH_KEY')]);
    	$this->success("注销成功");
    }
}