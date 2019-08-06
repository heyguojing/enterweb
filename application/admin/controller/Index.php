<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\admin\model\IndexModel;
use think\facade\Session;
class Index extends Common
{
    public function index()
    {
        $username = Session::get('username');
        $this->view->assign('username',$username);
        return $this->fetch();
    }

    public function welcome($name = 'ThinkPHP5')
    {
        return $this->view->fetch();
    }
}
