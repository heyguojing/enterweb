<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;

class Common  extends Controller
{   
    public function __construct()
    {
        parent::__construct();
        if(!Session::has('username')){
            $this->error('你还未登陆哦，请登陆!','Login/login');
        }
    }
}